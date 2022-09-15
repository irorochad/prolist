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
    <div class="container mx-auto px-4 pt-10 md:px-0">  
    <hr class="mb-10 border-gray-200 sm:mx-auto dark:border-gray-700">
        <!--Project pages -->
        <div class=" mx-auto  grid gap-4 grid-rows-1 md:grid-cols-2 lg:grid-cols-4 items-center md:items-start">
            <?php $query = "SELECT * FROM projects_info WHERE project_status = 'approved' ";

            $fetch_all_posts_data = mysqli_query($db_connection, $query);

            while ($row = mysqli_fetch_assoc($fetch_all_posts_data)) {
                $project_id = $row['id'];
                $project_name = $row['project_name'];
                $slugUrl = $row['slug_url'];
                $project_logo = $row['project_logo'];
                $project_content = substr($row['project_content'], 0, 100);
            ?>

                <div class="max-w-sm md:min-w-[30%] mx-auto h-fit w-fit bg-white rounded-lg border border-gray-200 shadow-md  dark:bg-gray-800 dark:border-gray-700">

                    <div class="flex flex-row justify-between items-center">

                        <?php echo "<img class='w-1/3' src='./assets/img/$project_logo' alt='LOGO'>" ?>

                        <h5 class="mb-2 text-2xl font-bold  text-gray-800 dark:text-gray-100  mr-5"><?php echo $project_name; ?></h5>

                    </div>

                    <div class="p-5">

                        <div class="mb-3 font-normal text-left text-gray-700 dark:text-gray-400"><?php echo $project_content;?>...</div>

                        <a href="<?php echo "projects?p_slug=" . $slugUrl; ?>" class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
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