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
                      <a href="/prolist/projects" class="text-gray-800 dark:text-gray-100">Explore</a>
                      <a href="#" class="text-gray-800 dark:text-gray-100">My projects</a>
                      <!-- <a href="#" class="text-gray-800 dark:text-gray-100">Resources</a> -->
                  </div>
              </div>
              <div class="flex items-center">
                  <div class="">
                      <div class="group inline-block relative">
                          <button class=" text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                              <span class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 dark:text-white">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                  </svg>
                              </span>
                              <svg class="fill-current h-4 w-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                  <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                              </svg>
                          </button>
                          <ul class="absolute hidden text-gray-100 bg-blue-700 pt-1  group-hover:block">
                              <li class="">
                                  <a class="rounded-t  py-2 px-4 block whitespace-no-wrap" href="#">One</a>
                              </li>
                              <li class="">
                                  <a class=" py-2 px-4 block whitespace-no-wrap" href="#">Two</a>
                              </li>
                              <li>
                                  <button id="theme-toggle" type="button" class=" text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                                      <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                      </svg>
                                      <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                      </svg>
                                  </button>
                              </li>
                          </ul>
                      </div>
                  </div>
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
              <a href="./projects" class="text-gray-800 dark:text-gray-200">Explore</a>
              <a href="#" class="text-gray-800 dark:text-gray-200">My Projects</a>
              <!-- <a href="#" class="text-gray-800 dark:text-gray-200">Resources</a> -->
              <a href="/prolist/register" class="ml-2 p-2 px-2 pt-2 rounded-lg baseline font-semibold text-white bg-brandBlue">Add project</a>
          </div>
      </div>

      <button id="menu-btn" class="block hamburger md:hidden focus:outline-none">
          <span class="hamburger-top bg-slate-800 dark:bg-white"></span>
          <span class="hamburger-middle bg-slate-800 dark:bg-white"></span>
          <span class="hamburger-bottom bg-slate-800 dark:bg-white"></span>
      </button>
  </nav>