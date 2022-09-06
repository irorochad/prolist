<nav class=" mx-auto drop-shadow-1xl hidden md:block"> <!-- This is a Desktop  Menu -->
  <div class="relative p-2 ">
    <!-- Topbar Menu -->
    <div class="flex justify-end gap-3 container mx-auto ">
      <!-- Lang translator -->
      <select class="bg-transparent text-gray-800 dark:text-gray-200">
        <option >English</option>
        <option>Spanish</option>
        <option>German</option>
        <option>Pidgin</option>
      </select>
      <!-- End Lang translator -->
      <button id="theme-toggle" type="button" class="text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
        </svg>
        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
        </svg>
      </button>
      <div class="py-2">
        <a href="./login.php" class="text-gray-800 dark:text-gray-200">Login</a>
        <a href="./register.php" class="ml-2 p-3 px-6 pt-2  rounded-full baseline font-semibold text-white bg-brandBlue">List for Free</a>
      </div>
    </div> <!-- End Topbar Menu -->
    <hr class="my-2 bg-slate-800 dark:bg-white">
    <!-- Start Main Menu -->
    <div class=" bg-white dark:bg-slate-800 py-2">
      <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-10">
          <a href="/prolist" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-8" alt="Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Listing</span>
          </a>
          <div class="space-x-6 md:flex">
            <a href="explore-project.php" class="text-gray-800 dark:text-gray-200">Explore Projects</a>
            <a href="#" class="text-gray-800 dark:text-gray-200">Explore Jobs</a>
            <a href="#" class="text-gray-800 dark:text-gray-200">Resources</a>
          </div>
        </div>
        <!-- The Search Box -->
        <form method="GET" action="./searchresult.php">
          <div class="relative drop-shadow-2xl">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
            <input type="search" id="searchtab" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg  dark:bg-gray-700  dark:text-white " name="SearchValue" placeholder="I'm lookin' for..." required>
            <button type="submit" name="searchBTN" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
          </div>
        </form>
        <!-- End Search Box -->
      </div>
    </div>
  </div>
</nav> <!-- End Deskop Nav -->