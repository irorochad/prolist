<!-- This is a Desktop  Menu -->
<nav class="relative mx-auto drop-shadow-1xl font-Poppins tracking-wide">
  <!-- Topbar Menu -->
  <div class="flex justify-end gap-3 mx-auto py-2 px-4">
    <!-- Lang translator -->
    <select class="bg-transparent text-gray-800 dark:text-gray-100">
      <option>English</option>
      <option>Spanish</option>
      <option>German</option>
      <option>Pidgin</option>
    </select>
    <!-- End Lang translator -->
    <button id="theme-toggle" type="button" class=" text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
      <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
      </svg>
      <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
      </svg>
    </button>

    <!-- If a session is set, then the dashboard link is shown, else the login and register btn is shown -->
    <?php if (isset($_SESSION['user_id'])) : ?>
      <div class="py-2 hidden md:block">
        <a href="/prolist/account" class="text-blue-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </a>
      </div>
    <?php else : ?>
      <div class="py-2 hidden md:block">
        <a href="/prolist/login" class="text-gray-800 dark:text-gray-100">Login</a>
        <a href="/prolist/register" class="ml-2 p-2 px-2 pt-2 rounded-lg baseline font-semibold text-white bg-brandBlue">List for Free</a>
      </div>
    <?php endif; ?>





  </div> <!-- End Topbar Menu -->

  <hr class="mb-3 border-gray-200 sm:mx-auto dark:border-gray-700">

  <!-- Start Main Menu -->
  <div class="hidden md:block bg-white dark:bg-slate-800 py-2 px-4">
    <div class=" mx-auto flex items-center justify-between">
      <!-- Logo -->
      <div class="flex items-center gap-10">
        <a href="/prolist" class="flex items-center">
          <img src="/prolist/assets/img/logo.svg" class="mr-3 h-8" alt="Logo">
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-gray-100">Listing</span>
        </a>
        <div class="space-x-6 md:flex">
          <a href="/prolist/projects" class="text-gray-800 dark:text-gray-100">Explore Projects</a>
          <a href="#" class="text-gray-800 dark:text-gray-100">Explore Jobs</a>
          <a href="#" class="text-gray-800 dark:text-gray-100">Resources</a>
        </div>
      </div>
      <!-- The Search Box -->
      <form method="GET" action="/prolist/search">
        <div class="relative">
          <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </div>
          <input type="search" id="searchtab" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg  dark:bg-gray-700  dark:text-white " name="SearchValue" placeholder="I'm lookin' for..." required>
          <button type="submit" name="searchBTN" class="text-gray-100 absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
      </form>
      <!-- End Search Box -->
    </div>
  </div>
</nav> <!-- End Deskop Nav -->

<!-- Start mobile Nav -->
<nav class="px-4 mt-4 flex justify-between md:hidden font-Poppins tracking-wide">
  <!-- Hamburger Icon -->
  <div class="">
    <a href="/prolist" class="flex items-center">
      <img src="/prolist/assets/img/logo.svg" class="mr-3 h-8" alt="Logo">
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-gray-100">Listing</span>
    </a>
  </div>

  <!-- Mobile Menu -->
  <div class="md:hidden">
    <div id="menu" class="bg-white dark:bg-slate-800 absolute flex-col items-center hidden self-end py-8 mt-10 space-y-6 font-bold b sm:w-auto sm:self-center left-6 right-6 drop-shadow-md z-40">
      <a href="/prolist/projects" class="text-gray-800 dark:text-gray-200">Explore Projects</a>
      <a href="#" class="text-gray-800 dark:text-gray-200">Explore Jobs</a>
      <a href="#" class="text-gray-800 dark:text-gray-200">Resources</a>

      <!-- If a session is set, then the dashboard link is shown, else the login and register btn is shown -->
      <?php if (isset($_SESSION['user_name'])) : ?>
          <a href="/prolist/account" class="text-blue-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </a>
      <?php else : ?>
        <a href="/prolist/login" class="text-gray-800 dark:text-gray-200">Login</a>
      <a href="/prolist/register" class="ml-2 p-3 px-6 pt-2  rounded-full baseline font-semibold text-white bg-brandBlue">List for Free</a>
      <?php endif; ?>
    </div>
  </div>

  <button id="menu-btn" class="block hamburger md:hidden focus:outline-none">
    <span class="hamburger-top bg-slate-800 dark:bg-white"></span>
    <span class="hamburger-middle bg-slate-800 dark:bg-white"></span>
    <span class="hamburger-bottom bg-slate-800 dark:bg-white"></span>
  </button>
</nav>