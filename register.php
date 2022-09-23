<?php session_start();
$page_title = "Register an Account - prolists";
$page_description = "Register an acconut today and get get your project listed for FREE!";
$page_keywords = "crypto, crypto listing, crypto projects, find new crypto projects, btc";
?>

<?php
include "./includes/header.inc.php";
include "./includes/navbar.inc.php";
include "./includes/db/db.inc.php";
include "function.php"; ?>

<!-- php code to register -->
<?php
if (isset($_POST['regBtn'])) {
    $name =  mysqli_real_escape_string($db_connection, $_POST['name']);
    $email =  mysqli_real_escape_string($db_connection, $_POST['emailId']);
    $passwordID =  mysqli_real_escape_string($db_connection, $_POST['passwordID']);
    $passwordConfirm =  mysqli_real_escape_string($db_connection, $_POST['passwordConfirm']);

    if (!empty($name) && !empty($email) && !empty($passwordID) && !empty($passwordConfirm)) {
        $hashedPassword = password_hash($passwordID, PASSWORD_BCRYPT, array('cost'  => 12));

        $queryInsert = "INSERT INTO users(name, email, password) VALUES('{$name}', '{$email}', '{$hashedPassword}')";
        $runInsert = mysqli_query($db_connection, $queryInsert);
        if (!$runInsert) {
            die("Something went wrong");
        }
        $message = "Account Created";
    } else {
        $message = "All fields are required";
    }
} else {
    $message = "";
}
?>
<!-- eNd php code to register -->


<main class="min-h-screen flex flex-col items-center justify-center bg-gray-100 dark:bg-slate-900 space-y-10 py-12 px-4 sm:px-6 lg:px-8">
    <div>
        <h1 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-gray-100">Register your FREE account </h1>
        <p class="mt-2 text-center text-sm text-gray-600">
            Or
            <a href="./login" class="font-medium text-indigo-600 border-b border-indigo-600"> Sign in to your account </a>
        </p>
    </div>

    <form action="register" method="post" class="w-full">
        <p class="text-center"><?php echo $message; ?></p>
        <div class="max-w-md w-full mx-auto bg-white dark:bg-[#77325f2d] rounded-lg p-7 space-y-7 ">

            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 dark:text-gray-100  mb-1" for="name">Name *</label>
                <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="text" name="name" id="name" placeholder="e.g: mrDoe" required />
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 dark:text-gray-100  mb-1" for="email">Email Address *</label>
                <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="text" name="emailId" id="email" placeholder="Enter your Email Address" required />

            </div>
            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 dark:text-gray-100 mb-1" for="password">Password *</label>
                <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="password" name="passwordID" id="password" placeholder="Enter your Password" />
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 dark:text-gray-100 mb-1" for="passwordconfirm">Password *</label>
                <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="password" name="passwordConfirm" id="passwordconfirm" placeholder="Confirm your Password" />
            </div>
            <div class="flex justify-between text-sm">
                <div class="flex items-center space-x-2">
                    <input class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" type="checkbox" id="remember" required />
                    <label for="remember" class="text-gray-600 dark:text-gray-100 ">Agree to TOS</label>
                </div>
                <!-- <div>
                    <a href="#" class="text-indigo-600">Forgot your Password?</a>
                </div> -->
            </div>
            <div>
                <button name="regBtn" class="w-full bg-indigo-600 text-white rounded-md p-2">Create Account</button>
            </div>
        </div>
    </form>
</main>

<?php include "./includes/footer.inc.php" ?>