<?php include "./includes/header.inc.php"; ?>
<?php include "./includes/navbar.inc.php"; ?>
<?php include "./includes/db/db.inc.php";
include "function.php"; ?>



<section id="hero" class="">
  <!-- Flex Container -->
  <div class="container flex flex-col md:flex-row items-center px-6 mx-auto pt-20 space-y-0 md:space-y-0">
    <!-- Left Item Text -->
    <div class="flex flex-col  mb-10 md:mb-32 space-y-5 font-Poppins text-left md:w-1/2 md:pt-12 ">
      <h1 class="text-4xl md:text-5xl font-bold  text-brandBlue dark:to-blue-700 md:text-left">
        Discover Crypto Project and profiles.
      </h1>
      <p class="max-w-sm text-gray-800 dark:text-gray-200 md:text-left">
        Find the correct data of a crypto project here.
      </p>
      <!-- Search and Button -->
      <form method="GET" action="./search">
        <label for="searchtab" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
        <div class="relative drop-shadow-2xl md:w-2/3">
          <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </div>
          <input type="search" id="searchtab" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg  dark:bg-gray-700  dark:text-white " name="SearchValue" placeholder="I'm lookin' for..." required>

          <button type="submit" name="searchBTN" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
      </form>
      <!-- trending keywords -->
      <div class="">
        <p class="text-gray-800 dark:text-gray-200 ">Trending: <a href="/index.php">aurox, coinprofit, CMC</a></p>
      </div>
    </div>
    <!-- Right Item Image -->
    <div class="pb-10 md:w-1/3">
      <img src="assets/img/heroIndexImg.png" alt="An Explainer Image is supposed to be here." class="md:translate-x-20 md:-translate-y-13" />
    </div>
  </div>
</section>


<!-- Featured Section -->

<section>
  <div class="container mt-8 md:mt-12 mx-auto px-5 md:px-0">
    <h1 class="text-4xl md:text-5xl mb-5 font-bold text-center text-brandBlue dark:to-blue-700 ">
      Featured Profiles <span class="text-red-700">/</span> Projects
    </h1>
    <p class="text-gray-700 dark:text-gray-100 mb-20 text-center">This can be a sub header that makes sense.</p>

    
      <!-- Search the db for projects that are marked as featured -->
      <?php 
      $query = "SELECT * FROM projects_info WHERE `is_featured` = 'true' ";
      $featured_project = mysqli_query($db_connection, $query);
      $count = mysqli_num_rows($featured_project);
      if($count <= 0) {
        echo "<h1 class='text-center text-gray-700 dark:text-gray-200'>No Featured Project Yet!</h1>";
      } else {
        isFeatured();
      }
      ?>
      <!-- End featured loop -->
    
  </div>
</section> <!-- End Featured Section -->



<!-- Start Features Sectino -->

<section class="mt-20 bg-white dark:bg-[#21434E] md:py-5">
  <div class="container max-w-6xl mx-auto flex flex-col md:flex-row items-center px-6 space-y-0 md:space-y-0">
    <!-- Left Item Text -->
    <div class="flex flex-col  mb-10 md:mb-32 space-y-5 font-Poppins text-left md:w-1/2 md:pt-12 ">
      <h1 class="text-4xl md:text-5xl font-bold  text-brandBlue dark:to-blue-700 md:text-left">
        100% Accurate Information
      </h1>
      <p class="max-w-sm text-gray-800 dark:text-gray-200 md:text-left">
        Looking for correct information about any project?
        Every single piece of information is provided by project owners.
      </p>


    </div>
    <!-- Right Item Image -->
    <div class="pb-10 md:w-1/3">
      <img src="assets/img/feature1.png" alt="An Explainer Image is supposed to be here." class="md:translate-x-20 md:-translate-y-13" />
    </div>
  </div>
</section> <!-- End Features Section -->

<?php include "./includes/footer.inc.php"; ?>