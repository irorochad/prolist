  <!-- This is a Desktop  Menu -->
  <nav class="relative mx-auto p-4 drop-shadow-1xl font-Poppins tracking-wide">
      <!-- Start Main Menu -->
      <div class="hidden md:block bg-white dark:bg-slate-800 py-2 px-4">
          <div class=" mx-auto flex items-center justify-between">
              <!-- Logo -->
              <div class="flex items-center gap-10">
                  <a href="/prolist" class="flex items-center">
                      <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-8" alt="Logo">
                      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-gray-100">Listing</span>
                  </a>
                  <div class="space-x-6 md:flex">
                      <a href="/prolist/projects" class="text-gray-800 dark:text-gray-100">Explore Projects</a>
                      <a href="#" class="text-gray-800 dark:text-gray-100">Explore Jobs</a>
                      <a href="#" class="text-gray-800 dark:text-gray-100">Resources</a>
                  </div>
              </div>
              <div class="flex items-center">
                  <a href="">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 text-blue-600 dark:text-blue-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  </a>
                  <a href="/prolist/register" class="ml-2 p-2 px-2 pt-2 rounded-lg baseline font-semibold text-white bg-brandBlue">Add project</a>
              </div>

          </div>
      </div>
  </nav> <!-- End Deskop Nav -->

  <!-- Start mobile Nav -->
  <nav class="px-4 mt-4 flex justify-between md:hidden font-Poppins tracking-wide">
      <!-- Hamburger Icon -->
      <div class="">
          <a href="/prolist" class="flex items-center">
              <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-8" alt="Logo">
              <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-gray-100">Listing</span>
          </a>
      </div>

      <!-- Mobile Menu -->
      <div class="md:hidden">
          <div id="menu" class="bg-white dark:bg-slate-800 absolute flex-col items-center hidden self-end py-8 mt-10 space-y-6 font-bold b sm:w-auto sm:self-center left-6 right-6 drop-shadow-md z-40">
              <a href="./projects" class="text-gray-800 dark:text-gray-200">Explore Projects</a>
              <a href="#" class="text-gray-800 dark:text-gray-200">Explore Jobs</a>
              <a href="#" class="text-gray-800 dark:text-gray-200">Resources</a>
              <a href="login.php" class="text-gray-800 dark:text-gray-200">Login</a>
              <a href="#" class="ml-2 p-3 px-6 pt-2  rounded-full baseline font-semibold text-white bg-brandBlue">List for Free</a>
          </div>
      </div>

      <button id="menu-btn" class="block hamburger md:hidden focus:outline-none">
          <span class="hamburger-top bg-slate-800 dark:bg-white"></span>
          <span class="hamburger-middle bg-slate-800 dark:bg-white"></span>
          <span class="hamburger-bottom bg-slate-800 dark:bg-white"></span>
      </button>
  </nav>