<?php
include "./includes/header.inc.php";
include "./includes/db/db.inc.php";
include "function.php";


// HEader Meta tags
$page_title = "Reset your password";
$page_description = "Prolist helps you find and discover crypto projects with accurate informations";

?>


<?php
// if the email and token param was passed from the email, do this;
if (isset($_GET['email']) && isset($_GET['token'])) {

    $token = $_GET['token'];
    $email = $_GET['email'];


    /*
        I'm unable to make this happen - Do a check to see if the email and token is in our database,

        Currently, It's not working, I'm getting an erro if the email is found in the DB but the token is not
        
    */ 
    $query = "SELECT email, token from users WHERE `token` = '$token'";
    $queryRun = mysqli_query($db_connection, $query);

    while ($row = mysqli_fetch_assoc($queryRun)) {
        $DB_email = $row['email'];
        $DB_token = $row['token'];
    }
    // if the email and token passes in the URl does not match what's in our DB, show invalidRequest!
    if ($email != $DB_email || $token != $DB_token) {
        $invalidRequest = false;
    }


    // If the reset button is pressed;
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
            // if there are no errors, do this;
            $hashedPassword = password_hash($passConfirm, PASSWORD_BCRYPT, array('cost'  => 12));
            $query = "UPDATE `users` SET `password` = '$hashedPassword', `token` = '' WHERE `email` = '$email'";
            $runQuery = mysqli_query($db_connection, $query);

            if ($runQuery) {
                /* redirect the user to login page.
                the login function is in the functions.php
                */
                user_login($emailId, $password);
            } else {
                // Show an error msg using sessions that something is wrong.
                $_SESSION['formError'] = "Something went wrong, please try again!";
            }
        }
    }
} else {
    // header("Location: login");
    $invalidRequest = false;
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
                    <p class="text-gray-600 dark:text-gray-200">Invalid reset parameter passed. Please, go <a href="login" class="text-blue-600">back and try requesting a reset link again!</a></p>
                </div>
            <?php endif; ?>
        </div>
    </form>
</main>

<?php include "./includes/footer.inc.php"; ?>