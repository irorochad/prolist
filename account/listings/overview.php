<?php include "../includes/header.inc.php"; ?>
<?php include "../includes/sidebar.inc.php"; ?>
<?php include "../includes/navbar.inc.php"; ?>
<?php include "../includes/db_includes/db.inc.php"
?>



<?php
if (!isset($_GET['p_id'])) {
    header("Location: ./");
} else {
    $the_p_id = $_GET['p_id'];
    $query = "SELECT * FROM projects_info WHERE id = '$the_p_id' ";
    $check_for_project = mysqli_query($db_connection, $query);

    if (mysqli_num_rows($check_for_project) <= 0) {
        echo "<h1 class='text-center mt-10 text-gray-600 dark:text-gray-300'>Admin calm down, No project containing that ID was found, please go  <a href='index' class='text-blue-600'>back to the project page again.</a></h1>";
    } else { ?>
        <div class="container px-6 mx-auto grid mt-20">
            <div class="w-full rounded-lg ">
                <h4 class="mb-3 font-semibold text-gray-700 dark:text-gray-200">Project Details</h4>
                <div class="grid grid-cols-1 lg:grid-cols-4 overflow-x-auto">
                    <!-- Left Item -->
                    <div class="w-full overflow-hidden flex flex-col lg:col-start-1 lg:col-end-1">
                        <?php
                        $query = "SELECT * FROM projects_info WHERE id = '$the_p_id' ";
                        $fetch_All_Posts = mysqli_query($db_connection, $query);
                        while ($row = mysqli_fetch_assoc($fetch_All_Posts)) {
                            $projectLogo = $row['project_logo'];
                            $projectName = $row['project_name'];
                            $projectcategory = $row['categories'];
                        ?>

                            <div class="w-full max-w-sm bg-white drop-shadow-2xl rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <div class="flex flex-col items-center pt-4 pb-5 font-Poppins">
                                    <img class="mb-3 w-24 h-24 rounded-full shadow-lg" <?php echo "src='prolist_admin/public/assets/img/static/$projectLogo' ";?> alt="Project Logo">
                                    <h5 class="mb-1 text-xl font-medium  text-gray-900 dark:text-white"> <?php echo $projectName; ?></h5>
                                    <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo $projectcategory; ?></span>
                                    <div class="flex mt-4 space-x-3 md:mt-6">
                                        <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 ">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 mt-20 max-w-sm bg-blue-700 drop-shadow-2xl rounded-lg border border-gray-200 shadow-md  dark:border-gray-700">
                                <div class="flex flex-col  pt-4 ">
                                    <svg class="mb-2 w-10 h-10 text-white dark:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd"></path>
                                        <path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z"></path>
                                    </svg>

                                    <h2 class="font-semibold text-gray-100 ">Project Actions</h2>
                                    <div class="flex mt-4 justify-between space-x-3 md:mt-6">
                                        <?php echo "<a href='overview?p_id&approve=$the_p_id' class='inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-700 bg-white rounded-lg '>Approve</a>" ?>

                                        <?php echo " <a href='overview?p_id&reject=$the_p_id' class='inline-flex items-center py-2 px-4 text-sm font-medium text-center  bg-red-700 text-white rounded-lg border border-red-700  dark:border-red-700'>Reject</a>" ?>
                                    </div>
                                    <div class="flex mt-4 items-center space-x-3 md:mt-6">
                                        <?php echo " <a href='overview?p_id&featured=$the_p_id' class='items-center py-2 px-4 text-sm font-semibold text-center text-gray-700 bg-white rounded-lg'>Mark As Featured</a>"; ?>
                                        <?php echo " <a href='overview?p_id&unfeatured=$the_p_id' class='items-center py-2 px-4 text-sm font-semibold text-center text-gray-700 bg-white rounded-lg'>Remove Featured</a>"; ?>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div> <!-- End Left Item -->

                    <!-- Start Right Item -->
                    <div class="w-full flex flex-col lg:col-start-2 lg:col-end-5 lg:ml-10">
                        <div class="mt-10 lg:mt-0 overflow-x-auto drop-shadow-2xl rounded p-4 bg-white dark:bg-gray-800">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Website
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Status
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Verified
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            is_featured
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Date Founded
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM projects_info WHERE id = '$the_p_id' ";
                                    $fetch_All_Posts = mysqli_query($db_connection, $query);
                                    while ($row = mysqli_fetch_assoc($fetch_All_Posts)) {

                                        $id = $row['id'];
                                        $website = $row['project_mainsite'];
                                        $projectStatus = $row['project_status'];
                                        $project_verified = $row['is_verified'];
                                        $isFeatured = $row['is_featured'];
                                        $project_date = $row['date_founded'];
                                    ?>
                                        <tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600'>
                                            <th scope='row' class='py-4 px-6 font-medium'>
                                                <?php echo "<a target='_blank' href='http://$website'>$website</a> " ?>
                                            </th>
                                            <td class='py-4 px-6'>
                                                <?php echo "$projectStatus"; ?>
                                            </td>
                                            <td class='py-4 px-6'>
                                                <?php echo "$project_verified"; ?>
                                            </td>
                                            <td class='py-4 px-6'>
                                                <?php echo "$isFeatured"; ?>
                                            </td>
                                            <td class='py-4 px-6'>
                                                <?php echo $project_date; ?>
                                            </td>
                                        </tr> <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- About Project Content -->
                        <div class="mt-20  drop-shadow-2xl rounded p-4 bg-white dark:bg-gray-800">
                            <h2 class="text-black dark:text-white text-xl">About Project</h2>
                            <?php
                            $query = "SELECT * FROM projects_info WHERE id = '$the_p_id' ";
                            $fetch_All_Posts = mysqli_query($db_connection, $query);
                            while ($row = mysqli_fetch_assoc($fetch_All_Posts)) {
                                $project_content = $row['project_content']; ?>
                                <div class="mt-5 font-Poppins "><?php echo "$project_content"; ?></div>
                            <?php } ?>
                        </div>
                        <!-- End About Project Content -->
                    </div> <!-- End Right Items -->
                </div>
            </div>
        </div>

<?php }
} ?>




<!-- Query to Approve Project -->

<?php
if (isset($_GET['approve'])) {
    $the_p_id = $_GET['approve'];

    $queryApprove = "UPDATE projects_info SET project_status = 'Approved' WHERE id = $the_p_id";
    $query_approve = mysqli_query($db_connection, $queryApprove);
    if (!$query_approve) {
        die("Error Approving this project");
    } else {
        header("Location: overview?p_id=$the_p_id");
    }
}

?>
<!-- End Query To Approve -->

<!-- Query to Reject project -->
<?php
if (isset($_GET['reject'])) {
    $the_project_id = $_GET['reject'];

    $query = "UPDATE projects_info SET project_status = 'Rejected' WHERE id = $the_project_id ";
    $query_rejected = mysqli_query($db_connection, $query);
    if (!$query_rejected) {
        die("Error Rejecting this project");
    } else {
        header("Location: overview?p_id=$the_project_id");
    }
}
?>
<!-- End Query to Reject project -->

<!-- Query to Mark as Featured -->
<?php
if (isset($_GET['featured'])) {
    $the_project_id = $_GET['featured'];

    $query = "UPDATE projects_info SET is_featured = 'true' WHERE id = $the_project_id ";
    $query_featured = mysqli_query($db_connection, $query);
    if (!$query_featured) {
        die("Error Marking this project as featured");
    } else {
        header("Location: overview?p_id=$the_project_id");
    }
}
?>
<!-- End Query to Mark as Featured -->

<!-- Query to Mark as Not Featured -->
<?php
if (isset($_GET['unfeatured'])) {
    $the_project_id = $_GET['unfeatured'];

    $query = "UPDATE projects_info SET is_featured = 'false' WHERE id = $the_project_id ";
    $query_Notfeatured = mysqli_query($db_connection, $query);
    if (!$query_Notfeatured) {
        die("Error Marking this project as NOT featured");
    } else {
        header("Location: overview?p_id=$the_project_id");
    }
}
?>
<!-- End Query to Mark as Not Featured -->



<?php include "/opt/lampp/htdocs/prolist_admin/public/includes/footer.inc.php"; ?>