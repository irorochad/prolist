<?php
include "./includes/header.inc.php";
include "./includes/db/db.inc.php";
include "function.php";


// HEader Meta tags
$page_title = "Reset your password";
$page_description = "Prolist helps you find and discover crypto projects with accurate informations";

?>


<?php
if (!isset($_GET['email']) && !isset($_GET['token'])) {
    // header("Location: login");
    $invalidRequest = false;
}



$token = '059de0e19b38eb70c08ac920f85fa2657f618f121b187756ffecd9a7ec5124dc48be89aa3daf4faf5f1513cbdcbb04fa2b25';
$id = 2;

$query = "SELECT id, email, token from users WHERE `token` = '$token'";
$queryRun = mysqli_query($db_connection, $query);

// while($row = mysqli_fetch_assoc($queryRun)){
//     $email = $row['email'];
//     echo "<p class='text-white'>$email</p>";
// }

// if the email and token passes in the URl does not match what's in our DB, then redirect user!
// if (($_GET['email'] !== '$email') || $_GET['token'] !== '$token') {
//     echo "You're not supposed to be here";
// }


if (isset($_POST['resetBtn'])) {
    $pass =  mysqli_real_escape_string($db_connection, $_POST['passwordID']);
    $passConfirm = mysqli_real_escape_string($db_connection, $_POST['passwordConfirm']);

    // if the form has any error, I'm using a session to pass an error 
    // the function to unset/clear the session is in the functons.php
    if (strlen($pass) < 5) {
        $_SESSION['formError'] = "Password must be at least 6 characters long";
    }
    if ($pass !== $passConfirm) {
        $_SESSION['formError'] = "Password doesn't match!";
    } else {
        $hashedPassword = password_hash($passConfirm, PASSWORD_BCRYPT, array('cost'  => 12));
        $query = "UPDATE `users` SET `password` = '$hashedPassword', `token` = '' WHERE `id` = '$id'";
        $runQuery = mysqli_query($db_connection, $query);

        if ($runQuery) {
            echo "It's affected";
        } else {
            echo "Something went wrong - please try again.";
        }
    }
}


?>


<main class="min-h-screen flex flex-col items-center justify-center bg-gray-50 dark:bg-slate-900 space-y-10 py-12 px-4 sm:px-6 lg:px-8">
    <form action="" method="post" class="w-full">
        <div class="max-w-md w-full mx-auto bg-white dark:bg-[#77325f2d] rounded-lg shadow-xl p-7 space-y-6">
            <?php if (!isset($invalidRequest)) : // end the if. The next line is to show the error msg.
                formErrorMsg(); ?>
                <div class="flex flex-col">
                    <label class="text-sm font-bold text-gray-600 dark:text-gray-300 mb-1" for="password">Password *</label>
                    <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="password" name="passwordID" id="password" placeholder="Enter your Password" />
                </div>
                <div class="flex flex-col">
                    <label class="text-sm font-bold text-gray-600 dark:text-gray-300 mb-1" for="passwordconfirm">Confirm Password *</label>
                    <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="password" name="passwordConfirm" id="passwordconfirm" placeholder="Confirm your Password" />
                </div>
                <div>
                    <button name="resetBtn" class="w-full bg-indigo-600 text-white rounded-md p-2">Reset Password</button>
                </div>
            <?php else : ?>
                <div>
                    <p class="text-gray-600 dark:text-gray-200">Invalid reset data passed. Please, go <a href="login" class="text-blue-600">back and try requesting a reset link again!</a></p>
                </div>
            <?php endif; ?>
        </div>
    </form>
</main>

<?php include "./includes/footer.inc.php"; ?>