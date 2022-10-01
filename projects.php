<?php
$page_title = "projects - prolists";
$page_description = "Prolist helps you find and discover crypto projects with accurate informations";
$page_keywords = "crypto, crypto listing, crypto projects, find new crypto projects, btc";
?>


<?php
//  Include Db Connections and db functions 
include "./includes/db/db.inc.php";
include "function.php";

// End Db Connections and functions
?>


<?php include "./includes/header.inc.php"; ?>

<!-- Navbar -->
<?php include "./includes/navbar.inc.php"; ?>
<!-- End Navbar -->

<?php

// This is the project page, so if the following URL is not passed in the browser,
//  the page will display lists of all the  listed projects. Scroll donw to see what happned next!


if (!isset($_GET['p_slug'])) { ?>
    <div class="container mx-auto px-4 pt-10 md:px-0">

        <?php
        //  Pagination to show only 60 projects 
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            // To avoid errors, $page will be set to empty value
            $page = "";
        }

        if ($page == "" || $page == 1) {
            // If the page is empty or = 0, that's page 1
            $page_1 = 0;
        } else {
            // if we're in another page
            $page_1 = ($page * 2) - 2;
        }


        $query = "SELECT * FROM projects_info WHERE project_status = 'approved'";

        $total_projects = mysqli_query($db_connection, $query);
        $total_project_Count = mysqli_num_rows($total_projects);

        $total_project_Count = ceil($total_project_Count / 2)
        //  End Pagination to show only 60 projects 
        ?>


        <hr class="mb-10 border-gray-200 sm:mx-auto dark:border-gray-700">
        <!--Project pages -->
        <div class=" mx-auto  grid gap-4 grid-rows-1 md:grid-cols-2 lg:grid-cols-4 items-center md:items-start">
            <?php $query = "SELECT * FROM projects_info WHERE project_status = 'approved' LIMIT $page_1, 2";

            $fetch_all_posts_data = mysqli_query($db_connection, $query);

            while ($row = mysqli_fetch_assoc($fetch_all_posts_data)) {
                $project_id = $row['id'];
                $project_name = $row['project_name'];
                $slugUrl = $row['slug_url'];
                $projectLogo = $row['project_logo'];
                $project_content = substr($row['project_content'], 0, 100);
            ?>

                <div class="max-w-sm md:min-w-[30%] mx-auto h-fit w-fit bg-white rounded-lg border hover:border-gray-200 hover:shadow-lg  dark:bg-gray-800 dark:border-gray-700">

                    <div class="flex flex-row justify-between items-center">

                        <?php echo "<img class='p-3 w-1/3  rounded-full shadow-xl' src='/prolist_admin/public/assets/img/static/$projectLogo' alt='LOGO'>" ?>

                        <h5 class="mb-2 text-2xl font-bold  text-gray-800 dark:text-gray-100  mr-5"><?php echo $project_name; ?></h5>

                    </div>

                    <div class="p-5">

                        <div class="mb-3 font-normal text-left font-Poppins text-gray-700 dark:text-gray-400"><?php echo $project_content; ?>...</div>

                        <a href="<?php echo "projects/" . $slugUrl; ?>" class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
                            Explore
                            <svg aria-hidden='true' class='ml-2 -mr-1 w-4 h-4' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                <path fill-rule='evenodd' d='M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z' clip-rule='evenodd'></path>
                            </svg></a>
                    </div>
                </div>

            <?php
            } ?>

        </div>
        <!-- Start Pagination -->
        <div class="grid px-4 py-3 mt-10 text-xs font-semibold tracking-wide text-gray-500 uppercase rounded-md dark:border-gray-700 bg-gray-100 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                Showing 21-30 of 100
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        <!-- <li>
                            <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </li> -->
                        <?php
                        for ($i = 1; $i <= $total_project_Count; $i++) {
                            echo "<li><a href='projects?page={$i}' class='px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple'>
                                {$i}
                            </a></li>";
                        }


                        ?>

                        <!-- <li>
                            <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </li> -->
                    </ul>
                </nav>
            </span>
        </div> <!-- End Pagination. -->
    </div>
<?php } else {

    // If a get Url containg our para was passed, then the
    // Following url gets followed by a / returns the project main page.

    $the_project_slug = $_GET['p_slug'];
    $query = "SELECT * FROM projects_info WHERE `slug_url` = '$the_project_slug'  AND `project_status` = 'Approved' ";
    $check_for_project = mysqli_query($db_connection, $query);

    if (mysqli_num_rows($check_for_project) <= 0) {
        projectNotFound();
    } else {
        projectIsListed();
    }
}
?>



<section class="mt-10"></section>
<?php include "./includes/footer.inc.php"; ?>