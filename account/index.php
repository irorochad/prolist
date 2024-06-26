<?php include "./includes/header.inc.php";
include "./includes/sidebar.inc.php";
include "./includes/navbar.inc.php";
include "./../includes/db/db.inc.php";


// Include the function in the root folder of the account folder 
include "functions.php";
?>



<main class="h-full overflow-y-auto">
  <!-- Main Dashboard aside nav and sidebar -->
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Dashboard
    </h2>
    
    <h4 class="mb-3 font-light text-gray-700 dark:text-gray-200">Welcome <span class="font-bold"><?php echo $_SESSION['user_name']; ?></span></h4>
    
    <!-- Information Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
      <!-- Card  -->
      <div class="flex items-center justify-between  p-4 w-full bg-white rounded-lg transition-shadow ease-in-out delay-150 hover:shadow-xl dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            My Listed Project 
            
          </p>
          <p class="text-lg font-normal text-gray-700 dark:text-gray-200">
            <?php myProjectCounts(); ?>
          </p>

        </div>
        <a type="button" href="./my_listing" class="text-white bg-gray-700 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-1 mr-2 mb-2 dark:bg-gray-700  dark:focus:ring-gray-700 dark:border-gray-700">View</a>
      </div>
      <!-- Card -->

      <!-- Card -->
      <div class="flex items-center justify-between  p-4 bg-white rounded-lg transition-shadow ease-in-out delay-150 hover:shadow-xl dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
          </svg>
        </div>
        <div>
          <p class="text-lg font-normal text-gray-700 dark:text-gray-200">
            44
          </p>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            My Job Listing
          </p>

        </div>
        <a type="button" href="public/categories" class="text-white bg-gray-700 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-1 mr-2 mb-2 dark:bg-gray-700  dark:focus:ring-gray-700 dark:border-gray-700">View</a>
      </div>
      <!-- Card -->
    </div>

    <!-- Charts -->
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Charts
    </h2>
    <div class="grid gap-6 mb-8 md:grid-cols-2">
      <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
          Traffic
        </h4>
        <canvas id="line"></canvas>
        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
          <!-- Chart legend -->
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
            <span>Organic</span>
          </div>
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
            <span>Featured</span>
          </div>
        </div>
      </div>

      <!-- ENd first item - chart -->
      <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Another Box or something can be here!
        </h2>
      </div>
    </div>
  </div>



  </div>
</main>

<?php include "./includes/footer.inc.php" ?>