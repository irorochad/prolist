<?php 
  $page_title = "Login - prolists";
  $page_description = "Prolist helps you find and discover crypto projects with accurate informations";
  $page_keywords = "crypto, crypto listing, crypto projects, find new crypto projects, btc";
?>

<?php include "./includes/header.inc.php" ?>
<?php include "./includes/navbar.inc.php" ?>

<main class="min-h-screen flex flex-col items-center justify-center bg-gray-50 dark:bg-slate-900 space-y-10 py-12 px-4 sm:px-6 lg:px-8">
    <div>
      <h1 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-gray-100">Log in to your account </h1>
      <p class="mt-2 text-center text-sm text-gray-600">
        Or
        <a href="register.php" class="font-medium text-indigo-600 border-b border-indigo-600"> create your FREE account </a>
      </p>
    </div>
    <form action="login.php" method="post" class="w-full">
    <div class="max-w-md w-full mx-auto bg-white dark:bg-[#77325f2d] rounded-lg p-7 space-y-6">
      
        <div class="flex flex-col">
          <label class="text-sm font-bold text-gray-600 mb-1" for="email">Email Address</label>
          <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="text" name="email" id="email" placeholder="Enter your Email Address" />
        </div>
        <div class="flex flex-col">
          <label class="text-sm font-bold text-gray-600 mb-1" for="password">Password</label>
          <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="password" name="password" id="password" placeholder="Enter your Password" />
        </div>
        <div class="flex justify-between text-sm">
          <div class="flex items-center space-x-2">
            <input class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" type="checkbox" name="remember" id="remember" />
            <label for="remember" class="text-gray-600">Agree to TOS</label>
          </div>
          <div>
            <a href="#" class="text-indigo-600">Forgot your Password?</a>
          </div>
        </div>
        <div>
          <button class="w-full bg-indigo-600 text-white rounded-md p-2">Take me Home</button>
        </div>
      
    </div>
    </form>
  </main>

  <?php include "./includes/footer.inc.php" ?>