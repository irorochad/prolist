<?php
$page_title = "Login - prolists";
$page_description = "Prolist helps you find and discover crypto projects with accurate informations";
$page_keywords = "crypto, crypto listing, crypto projects, find new crypto projects, btc";
?>

<?php include "./includes/header.inc.php";
include "./includes/navbar.inc.php";
include "./includes/db/db.inc.php";
include "function.php"; ?>

<?php
// If a user_name session is set, and the user wants to go back to login page,
//  he'll be redirected to account
if(isset($_SESSION['user_name'])){
  header("location: /prolist/account");
}
if (isset($_POST['loginBtn'])) {
  // user_login($_POST['email'], $_POST['password']);

  $email = mysqli_real_escape_string($db_connection, $_POST['email']);
  $password = mysqli_real_escape_string($db_connection, $_POST['password']);

  $errorMsg = [
    'email' => '',
    'password' => ''
  ];

  // check if the email doesn't exsits
  if (!email_exists($email)) {
    $errorMsg['email'] = 'We couldn\'t find that email. ' . " " . "<a href='register'>Create Account here</a>";
  }
 

  // check if email is empty
  if ($email == '') {
    $errorMsg['email'] = 'Email is required!';
  }

  // check if password is empty
  if ($password == '') {
    $errorMsg['password'] = 'Password is required!';
  }

  // Loop through the forom if there's any error.
  foreach ($errorMsg as $key => $value) {
    if (empty($value)) {
      // If the error messages is empty, unset the error keys.
      unset($errorMsg[$key]);
    }

    if (empty($errorMsg)) {
      // If the error msg is empty, login the user with the function.
      user_login($_POST['email'], $_POST['password']);
    }
  }
}

?>


<main class="min-h-screen flex flex-col items-center justify-center bg-gray-50 dark:bg-slate-900 space-y-10 py-12 px-4 sm:px-6 lg:px-8">
  <div>
    <h1 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-gray-100">Log in to your account </h1>
    <p class="mt-2 text-center text-sm text-gray-600">
      Or
      <a href="register" class="font-medium text-indigo-600 border-b border-indigo-600"> create your FREE account </a>
    </p>
  </div>
  <form action="" method="post" class="w-full">
    <div class="max-w-md w-full mx-auto bg-white dark:bg-[#77325f2d] rounded-lg p-7 space-y-6">

      <div class="flex flex-col">
        <label class="text-sm font-bold text-gray-600 mb-1" for="email">Email Address</label>
        <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="email" name="email" id="email" value="<?php echo isset($email) ? $email : '' ?>" placeholder="Enter your Email Address" />
        <p class="text-red-700"><?php echo isset($errorMsg['email']) ? $errorMsg['email'] : '' ?></p>
      </div>
      <div class="flex flex-col">
        <label class="text-sm font-bold text-gray-600 mb-1" for="password">Password</label>
        <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="password" name="password" id="password" placeholder="Enter your Password" />
        <p class="text-red-700"><?php echo isset($errorMsg['password']) ? $errorMsg['password'] : '' ?></p>
        <!-- If password doens't match, call this function to show an incoorect passcode -->
        <?php inccorectPass(); ?>
      </div>
      <div class="flex justify-between text-sm">
        <div class="flex items-center space-x-2">
          <input class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" type="checkbox" name="remember" id="remember" />
          <label for="remember" class="text-gray-600">Stay Logged In</label>
        </div>
        <div>
          <a href="#" class="text-indigo-600">Forgot your Password?</a>
        </div>
      </div>
      <div>
        <button name="loginBtn" class="w-full bg-indigo-600 text-white rounded-md p-2">Take me Home</button>
      </div>

    </div>
  </form>
</main>

<?php include "./includes/footer.inc.php"; ?>