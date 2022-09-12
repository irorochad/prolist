<!-- Include Db Connections and db functions -->
<?php include "./includes/db/db.inc.php";
include "function.php";
?>
<!-- End Db Connections and functions -->

<?php include "./includes/header.inc.php"; ?>

<!-- Navbar -->
<?php include "./includes/navbar.inc.php"; ?>
<!-- End Navbar -->

<?php

// This is the project page, so if the following URL is not passed in the browser,
//  the page will display lists of all the  listed projects. Scroll donw to see what happned next!


if (!isset($_GET['p_slug'])) { ?>
    <div class="container  mx-auto flex flex-col md:flex-row px-4 pt-20 md:px-0">
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
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Categories</label>
                        <select id="categories" name="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
            <?php $query = "SELECT * FROM projects_info";

            $fetch_all_posts_data = mysqli_query($db_connection, $query);

            while ($row = mysqli_fetch_assoc($fetch_all_posts_data)) {
                $project_id = $row['id'];
                $project_name = $row['project_name'];
                $project_slug = $row['slug_url'];
                $project_logo = $row['project_logo'];
                $project_content = substr($row['project_content'], 0, 100);
            ?>

                <div class="max-w-sm md:min-w-[30%] mx-auto h-fit w-fit bg-white rounded-lg border border-gray-200 shadow-md  dark:bg-gray-800 dark:border-gray-700">

                    <div class="flex flex-row justify-between items-center">

                        <?php echo "<img class='w-1/3' src='./assets/img/$project_logo' alt='LOGO'>" ?>

                        <h5 class="mb-2 text-2xl font-bold  text-gray-800 dark:text-gray-100  mr-5"><?php echo $project_name; ?></h5>

                    </div>

                    <div class="p-5">

                        <div class="mb-3 font-normal text-left text-gray-700 dark:text-gray-400"><?php echo $project_content; ?>...</div>

                        <a href="<?php echo "?p_slug=" . getSlugUrl($project_name); ?>" class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
                            Explore
                            <svg aria-hidden='true' class='ml-2 -mr-1 w-4 h-4' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                <path fill-rule='evenodd' d='M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z' clip-rule='evenodd'></path>
                            </svg></a>
                    </div>
                </div>

            <?php
            } ?>

        </div> <!-- End Right Items -->
    </div>
    <?php } else {
    // If a get Url containg our para was passed, then the
    // Following url gets followed by a / returns the project main page.

    $the_project_slug = $_GET['p_slug'];
    $query = "SELECT * FROM projects_info WHERE `slug_url` = '$the_project_slug' ";

    $fetch_project_data = mysqli_query($db_connection, $query);

    while ($row = mysqli_fetch_assoc($fetch_project_data)) {
        $project_logo = $row['project_logo'];
        $project_name = $row['project_name'];
        $project_content = $row['project_content'];
        $categories = $row['categories'];
        $project_website = $row['project_mainsite'];
        $project_dateFounded = $row['date_founded'];

    ?>

        <div class="mt-20 mb-20 px-4 font-Montserrat">
            <!-- Main Project Header -->
            <div class=" grid grid-cols-2  items-center w-full">
                <!-- Left Header -->
                <div class="flex justify-start items-center w-full">

                    <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/8616.png" class="w-1/2 md:w-1/3" alt="Logo" />

                    <div class="flex flex-col pl-4 text-gray-800 dark:text-gray-100">
                        <h1 class="md:text-4xl font-bold"><?php echo $project_name; ?></h1>
                        <span class="flex flex-row">
                            <h3 class="mt-3"><?php echo $categories; ?></h3>
                            <p class="ml-2 mt-3 text-blue-600 dark:text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </p>
                        </span>
                    </div>
                </div> <!-- End Left Header -->

                <!-- Right Header -->
                <div class="flex justify-end">
                    <!-- <p class="text-gray-800 dark:text-gray-200 ">Visit Site</p> -->
                    <?php echo "<a href='http://$project_website' target='_blank' class='inline-flex items-center py-2 px-3 text-md font-semibold text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 '>
                       Website
                    <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6 ml-5' style='fill: rgba(255, 255, 255, 1);'>
                        <path d='m13 3 3.293 3.293-7 7 1.414 1.414 7-7L21 11V3z'></path>
                        <path d='M19 19H5V5h7l-2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-5l-2-2v7z'></path>
                    </svg>
                </a>" ?>
                </div> <!-- End Right Header -->
            </div>
            <!-- End Project Header -->
        </div>
        <!-- Project Hero-->
        <div class="grid grid-cols-1 md:grid-cols-4 mt-10 mb-10 px-4 mx-auto">
            <!-- Left Item -->
            <div class="flex flex-col md:col-start-1 md:col-end-3 w-full text-left text-gray-800 dark:text-gray-200 p-4">
                <h1 class="text-3xl md:text-4xl font-bold font-Montserrat mb-4">About Project</h1>
                <p class="">
                    <?php echo $project_content; ?>
                </p>
            </div>
            <!-- Right Item -->
            <div class="flex flex-col md:col-start-4 md:col-end-5 w-full ">
                <div class="text-gray-800 dark:text-gray-200 drop-shadow-md bg-white dark:bg-[#101313] rounded-md p-4">
                    <h1 class="text-3xl md:text-4xl font-bold font-Montserrat md:text-right">Useful Data</h1>
                    <div class="flex flex-row justify-between mt-5">
                        <p>Website:</p>
                        <?php echo "<p> <a href='http://$project_website' target='_blank' class='inline-flex items-center  text-blue-600 dark:text-blue-500 hover:underline'>
                       $project_website
                        <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6 ml-3' style='fill: rgba(90, 43, 224, 1);'>
                            <path d='m13 3 3.293 3.293-7 7 1.414 1.414 7-7L21 11V3z'></path>
                            <path d='M19 19H5V5h7l-2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-5l-2-2v7z'></path>
                        </svg>
                    </a></p>" ?>
                    </div>
                    <div class="flex flex-row justify-between font-Poppins mt-5">
                        <h1 class="">Founded:</h1>
                        <?php echo "<P>$project_dateFounded</P>"; ?>
                    </div>
                    <div class="flex flex-row justify-between font-Poppins mt-5">
                        <p>Num. Of Investors:</p>
                        <P>5</P>
                    </div>
                    <div class="flex flex-row justify-between font-Poppins mt-5">
                        <p>Num. Of Employee:</p>
                        <P>5-10</P>
                    </div>
                </div>
            </div>

        </div>

<?php }
}
?>

<hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">


<section class="mt-10"></section>
<?php include "./includes/footer.inc.php"; ?>