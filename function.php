<?php ob_start();

include "./includes/db/db.inc.php";



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
            $projectLogo = $row['project_logo'];
            $project_name = $row['project_name'];
            $project_content = substr($row['project_content'], 0, 100);
            $slugUrl = $row['slug_url'];
        }


    ?>

        <div class="max-w-sm md:min-w-[30%] mx-auto h-fit w-fit mb-4 md:mb-0 bg-white rounded-lg border hover:border-gray-200 hover:shadow-lg dark:bg-gray-800 dark:border-gray-700">

            <div class="flex flex-row justify-between items-center">

                <?php echo "<img class='p-3 w-1/3 rounded-full shadow-lg' src='/prolist_admin/public/assets/img/static/$projectLogo' alt='LOGO'>" ?>

                <h5 class="mb-2 text-2xl font-bold  text-gray-800 dark:text-gray-100  mr-5"><?php echo $project_name; ?></h5>

            </div>

            <div class="p-5">

                <div class="mb-3 font-normal text-left font-Poppins text-gray-700 dark:text-gray-400"><?php echo $project_content; ?>...</div>

                <a href="<?php echo "projects/" . $slugUrl; ?>" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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


<?php
function projectNotFound()
{ ?>
    <div class="container md:w-1/2 mx-auto p-10">
        <img class="" src="../assets/img/404Img.png" />
        <div class="flex flex-col items-center">
            <h3 class="mb-5 font-bold text-center text-gray-700 dark:text-gray-400 ">
                No, this is not an issue, it simply means the project you&apos;re searching for is no longer available or wasn&apos;t at all.
            </h3>
            <a href="/prolist/projects" class=" p-4  rounded-lg baseline font-semibold text-white bg-brandBlue">Explore More Projects</a>
        </div>

    </div>
<?php }

?>




<?php

function projectIsListed()
{
    global $db_connection;
    $the_project_slug = $_GET['p_slug'];
    $query = "SELECT * FROM projects_info WHERE `slug_url` = '$the_project_slug' ";



    $fetch_project_data = mysqli_query($db_connection, $query);


    while ($row = mysqli_fetch_assoc($fetch_project_data)) {
        $projectLogo = $row['project_logo'];
        $project_name = $row['project_name'];
        $project_content = $row['project_content'];
        $categories = $row['categories'];
        $project_website = $row['project_mainsite'];
        $project_dateFounded = $row['date_founded'];

?>

        <div class="mt-20 mb-20 px-4 font-Montserrat">
            <!-- Main Project Header -->
            <div class=" grid grid-cols-1 md:grid-cols-2  items-center w-full">
                <!-- Left Header -->
                <div class="flex justify-start items-center w-full">
                    <!-- Logo Container -->

                    <?php echo "<img class='p-3 w-1/3 md:w-1/5 rounded-full shadow-xl' src='/prolist_admin/public/assets/img/static/$projectLogo' alt='LOGO'>" ?>

                    <!-- End Logo Container -->
                    <div class="flex flex-col pl-4 text-gray-800 dark:text-gray-100">
                        <h1 class="md:text-4xl font-bold"><?php echo $project_name; ?></h1>
                        <div class="flex flex-row">
                            <h3 class="mt-3"><?php echo $categories; ?></h3>
                            <p class="ml-2 mt-3 text-blue-600 dark:text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </p>
                        </div>
                    </div>
                </div> <!-- End Left Header -->

                <!-- Right Header -->
                <div class="flex mt-5 md:mt-0 md:justify-end">
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
            <div class="flex flex-col md:col-start-1 md:col-end-3 w-full text-left p-4">
                <h1 class="text-3xl md:text-2xl font-bold font-Poppins mb-4 text-gray-800 dark:text-gray-200">About Project</h1>
                <div class="font-Poppins text-gray-600 dark:text-gray-200">
                    <?php echo $project_content; ?>
                </div>
            </div>
            <!-- Right Item -->
            <div class="flex flex-col md:col-start-4 md:col-end-5 w-full ">
                <div class="drop-shadow-md bg-white dark:bg-[#101313] text-gray-600 dark:text-gray-200 rounded-md p-4">
                    <h1 class="text-gray-800 dark:text-gray-200 text-3xl md:text-2xl font-bold font-Poppins md:text-right">Useful Data</h1>
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
                    <div class="flex flex-row justify-between font-Poppins  mt-5">
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
<?php
    }
}

?>

<?php
function isFeatured()
{
    global $featured_project; ?>
    <div class="owl-carousel ">
        <?php
        while ($row = mysqli_fetch_assoc($featured_project)) {
            $projectLogo = $row['project_logo'];
            $project_name = $row['project_name'];
            $project_content = substr($row['project_content'], 0, 100);
            $slugUrl = $row['slug_url']; ?>


            <div class="max-w-sm mx-auto mb-5 md:mr-5  h-fit w-fit bg-white rounded-lg border hover:border-gray-200 hover:shadow-lg dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-row justify-between items-center">
                    <?php echo "<img class='p-3 w-1/3  rounded-full shadow-xl' src='/prolist_admin/public/assets/img/static/$projectLogo' alt='LOGO'>" ?>
                    <h5 class="mb-2 text-2xl font-bold  text-gray-800 dark:text-gray-100  mr-5"><?php echo $project_name; ?></h5>

                </div>

                <div class="p-5">
                    <div class="mb-3 font-normal text-left font-Poppins text-gray-700 dark:text-gray-400"><?php echo $project_content; ?>...</div>
                    <a href="<?php echo "projects/" . $slugUrl; ?>" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        <?php } ?>
        <div><?php
            }
                ?>

<?php

    function username_exists($username)

        {
            global $db_connection;

            $usernameQuery = "SELECT username FROM users WHERE `username` = '$username'";
            $runUsernameQuery = mysqli_query($db_connection, $usernameQuery);

            if (mysqli_num_rows($runUsernameQuery) > 0) {
                return true;
            } else {
                return false;
            }
        }


    // check if email already exsits

    function email_exists($emailId)

    {
        global $db_connection;

        $emailQuery = "SELECT email FROM users WHERE `email` = '$emailId'";
        $runemailQuery = mysqli_query($db_connection, $emailQuery);

        if (mysqli_num_rows($runemailQuery) > 0) {
            $_SESSION['message'] = "Somehow, that email is taken";
        }
    }




?>