<?php include "./includes/db/db.inc.php"; ?>


<?php
function searchResult()
{
    global $db_connection;
    global $searchData;
    $query = "SELECT * FROM projects_info WHERE project_name LIKE '%$searchData%' OR project_tags LIKE  '%$searchData%'";

    $fetch_all_posts_data = mysqli_query($db_connection, $query);

    if (!$fetch_all_posts_data) {
        die("Unable to fetch data - please try again or contact support.");
    }
    $count = mysqli_num_rows($fetch_all_posts_data);
    if ($count <= 0) {
?>
        <div class="mx-auto h-fit bg-gray-100 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 mb-5 md:mb-0">
            <div class="p-5">
                <p class="mb-3 font-normal text-left text-gray-700 dark:text-gray-400"><?php echo "Ummm! We couldn't find any profiles or project for your keyword: <b>" . $searchData . "</b> Please try something else. "; ?></p>
            </div>
        </div>

    <?php
    } else {
        while ($row = mysqli_fetch_assoc($fetch_all_posts_data)) {
            $project_logo = $row['project_logo'];
            $project_name = $row['project_name'];
            $project_content = $row['project_content'];
        }


    ?>

        <div class="max-w-sm md:min-w-[30%] mx-auto h-fit w-fit bg-white rounded-lg border border-gray-200 shadow-md  dark:bg-gray-800 dark:border-gray-700">

            <div class="flex flex-row justify-between items-center">

                <?php echo "<img class='w-1/3' src='./assets/img/$project_logo' alt='LOGO'>" ?>

                <h5 class="mb-2 text-2xl font-bold  text-gray-800 dark:text-gray-100  mr-5"><?php echo htmlspecialchars($project_name); ?></h5>

            </div>

            <div class="p-5">

                <div class="mb-3 font-normal text-left text-gray-700 dark:text-gray-400"><?php echo $project_content; ?></div>

                <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Explore
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>

<?php
    }
} ?>