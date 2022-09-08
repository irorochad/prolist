<div class="flex items-center justify-between ">
<!-- Logo -->
<div class="pt-2">
  <!-- <a href="../index.php"><img src="assets/img/logo.svg" alt="Logo" /></a> -->
  <a href="/prolist" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-8" alt="Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Listing</span>
        </a>
</div>
<!-- Menu Items -->
<div class="hidden space-x-6 md:flex">
  <a href="explore-project.php" class="text-gray-800 dark:text-gray-200">Explore Projects</a>
  <a href="#" class="text-gray-800 dark:text-gray-200">Explore Jobs</a>
  <a href="#" class="text-gray-800 dark:text-gray-200">Resources</a>
</div>

<button id="theme-toggle" type="button" class="text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
  <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
  </svg>
  <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
  </svg>
</button>
<div class="hidden  md:block">
  <!-- Button -->
  <a href="./login.php" class="text-gray-800 dark:text-gray-200 hover:underline">Login</a>
  <a href="./register.php" class="ml-2 p-3 px-6 pt-2  rounded-full baseline font-semibold text-white bg-brandBlue">List for Free</a>
</div>


<!-- Hamburger Icon -->
<button id="menu-btn" class="block hamburger md:hidden focus:outline-none">
  <span class="hamburger-top bg-slate-800 dark:bg-white"></span>
  <span class="hamburger-middle bg-slate-800 dark:bg-white"></span>
  <span class="hamburger-bottom bg-slate-800 dark:bg-white"></span>
</button>
</div>

<!-- Mobile Menu -->
<div class="md:hidden">
<div id="menu" class="bg-white dark:bg-slate-800 absolute flex-col items-center hidden self-end py-8 mt-10 space-y-6 font-bold b sm:w-auto sm:self-center left-6 right-6 drop-shadow-md z-40">
  <a href="explore-project.php" class="text-gray-800 dark:text-gray-200">Explore Projects</a>
  <a href="#" class="text-gray-800 dark:text-gray-200">Explore Jobs</a>
  <a href="#" class="text-gray-800 dark:text-gray-200">Resources</a>
  <a href="login.php" class="text-gray-800 dark:text-gray-200">Login</a>
  <a href="#" class="ml-2 p-3 px-6 pt-2  rounded-full baseline font-semibold text-white bg-brandBlue">List for Free</a>
</div>
</div>