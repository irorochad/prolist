<!-- Include Db Connections and db functions -->
<?php include "./includes/db/db.inc.php"; ?>

<?php include "./includes/db/db.func.inc.php"; ?>
<!-- End Db Connections and functions -->

<?php include "./includes/header.inc.php"; ?>

<!-- Navbar -->
<?php include "./includes/navbar.inc.php"; ?>
<!-- End Navbar -->


<section id="mainexplore" class="bg-[#F5F8FF] dark:bg-slate-900">

    <div class="container mx-auto flex flex-col-reverse md:flex-row px-4 pt-10 md:pt-20">
        <!-- Left Item Search Box -->
        <div class="flex flex-col mx-auto md:w-1/5">


            <div class="p-4 max-w-sm md:min-w-[50%]  bg-white rounded-lg border border-gray-200 shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-6" action="./search.php" method="GET">
                    <h5 class="text-xl font-medium text-gray-900 dark:text-white">Search Filter</h5>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Enter Keywords</label>
                        <input type="text" name="SearchValue" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="seach something" required="">
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Categories</label>

                        <select id="categories" name="categories"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php $query = "SELECT * FROM project_categories";

                            $fetch_all_posts_categories = mysqli_query($db_connection, $query);

                            while ($row = mysqli_fetch_assoc($fetch_all_posts_categories)) {
                                $cats_title = $row['cats_title'];


                            ?>

                                <option selected><?php echo $cats_title; ?></option>

                            <?php
                            } ?>

                        </select>


                    </div>

                    <button type="submit" name="searchBTN" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>

                </form>

            </div>

            <div class="p-6 mt-20 max-w-sm bg-blue-700 rounded-lg border border-gray-200 shadow-md  dark:border-gray-700">
                <svg class="mb-2 w-10 h-10 text-white dark:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd"></path>
                    <path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z"></path>
                </svg>

                <h6 class="mb-3 font-normal text-gray-100 ">Have a project? We've got visitors.
                    Get Listed Today!</h6>
                <button type="submit" class="w-full text-blue-800 font-bold bg-white focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm px-5 py-2.5 text-center  hover:bg-gray-200 ">Get Listed!</button>

            </div>


        </div> <!-- End Left Item -->

        <!-- Right Items Project pages -->


        <div class=" md:w-3/4 mx-auto mt-20 md:mt-0  grid gap-4 grid-rows-1 md:grid-cols-2 lg:grid-cols-3 items-center md:items-start">

            <?php

            if (isset($_GET['searchBTN'])) {
                $searchData = $_GET['SearchValue'];
                searchResult();
            }

            ?>

        </div> <!-- End Right Items -->

    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
</section>

<section class="mt-10">

</section>


<?php include "./includes/footer.inc.php"; ?>