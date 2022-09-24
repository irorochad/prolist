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

    // Error Msg should be empty by default. 
    // However, if a user doens't meet our form requirement, an error msg is then appended to the $errorMsg array.
    $errorMsg = [
        'name' => '',
        'email' => '',
        'password' => '',
        'passwordConfirm' => ''
    ];

    // check if name is less than 3 characters
    if (strlen($name) < 3) {
        $errorMsg['name'] = 'Please provide your full name. ';
    }
    // check if name is empty
    if ($name == '') {
        $errorMsg['name'] = 'Name cannot be empty';
    }
    // cehck if email is empty
    if ($email == '') {
        $errorMsg['email'] = 'Email field cannot be empty, please.  ';
    }
    // Check if the email is already taken, if yes we show them a link to login.
    if (email_exists($email)) {
        $errorMsg['email'] = 'Somehow, that email already exsits' . " " . "<a href='login'>Login Here</a>";
    }
    // Check if the passowrd is less then 5 characters
    if (strlen($passwordID) < 5) {
        $errorMsg['password'] = 'Password cannot be less than 4 characters.';
    }

    // Check if the passowrd is empty;
    if ($passwordID == '') {
        $errorMsg['password'] = 'How do you intend to login without a password?';
    }

    // Check if the passowrd doesn't match confirm password.
    if ($passwordID !== $passwordConfirm) {
        $errorMsg['passwordConfirm'] = "Password needs match";
    }
    // Loop through the $errorMsg array, if it's emtpty, unset the error msgs and register the users and then login em in!
    // The functions to register and login are in the functions.php
    foreach ($errorMsg as $key => $value) {
        if (empty($value)) {
            unset($errorMsg[$key]);
        }

        if (empty($errorMsg)) {
            user_registration($name, $email, $passwordID);
            user_login($emailId, $password);
        }
    }
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
        <div class="max-w-md w-full mx-auto bg-white dark:bg-[#77325f2d] rounded-lg p-7 space-y-7 ">

            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 dark:text-gray-100  mb-1" for="name">Full Name *</label>
                <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="text" name="name" id="name" value="<?php echo isset($name) ? $name : '' ?>" placeholder="e.g: mrDoe" />
                <p><?php echo isset($errorMsg['name']) ? $errorMsg['name'] : '' ?></p>
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 dark:text-gray-100  mb-1" for="email">Email Address *</label>
                <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="text" name="emailId" id="email" value="<?php echo isset($email) ? $email : '' ?>" placeholder="Enter your Email Address" />
                <p><?php echo isset($errorMsg['email']) ? $errorMsg['email'] : '' ?></p>
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 dark:text-gray-100 mb-1" for="password">Password *</label>
                <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="password" name="passwordID" id="password" placeholder="Enter your Password" />
                <p><?php echo isset($errorMsg['password']) ? $errorMsg['password'] : '' ?></p>
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 dark:text-gray-100 mb-1" for="passwordconfirm">Password *</label>
                <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="password" name="passwordConfirm" id="passwordconfirm" placeholder="Confirm your Password" />
                <p><?php echo isset($errorMsg['passwordConfirm']) ? $errorMsg['passwordConfirm'] : '' ?></p>

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

<?php include "./includes/footer.inc.php"; ?>