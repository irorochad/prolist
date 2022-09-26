<?php include "./includes/header.inc.php";
include "./includes/sidebar.inc.php";
include "./includes/navbar.inc.php";
include "./../includes/db/db.inc.php";
?>

<!-- Include the function in the root folder of the account folder -->
<?php include "functions.php"; ?>



<div class="container px-6 mx-auto grid">
    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class=" relative shadow-md sm:rounded-lg">

            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Account Profile</h2>

            <hr class="mb-5 h-px bg-gray-700 border-0 dark:bg-gray-400">
            <div class="container px-6 mx-auto grid mt-20">
                <div class="w-full rounded-lg ">
                    <h4 class="mb-3 font-semibold text-gray-700 dark:text-gray-200">Project Details</h4>
                    <div class="grid grid-cols-1 lg:grid-cols-4 ">
                        <!-- Left Item -->
                        <div class="w-full flex flex-col lg:col-start-1 lg:col-end-1">
                            <div class="w-full max-w-sm bg-white drop-shadow-2xl rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <div class="flex flex-col items-center pt-4 pb-5 font-Poppins">
                                    <img class="mb-3 w-24 h-24 rounded-full shadow-lg" <?php echo "src='/prolist_admin/public/assets/img/static/btc.png' "; ?> alt="Project Logo">
                                    <h5 class="mb-1 text-xl font-medium  text-gray-900 dark:text-white"><?php echo $_SESSION['user_name']; ?></h5>
                                    <p class="mb-1 text-sm text-gray-900 dark:text-white"><?php echo "Registered on: 20/20/22" ?></p>

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

                                    <h2 class="font-semibold text-gray-100 ">Users Actions</h2>
                                    <div class="flex mt-4 justify-between space-x-3 md:mt-6">
                                        <?php echo "<a href='#' class='inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-700 bg-white rounded-lg '>Approve</a>" ?>

                                        <?php echo " <a href='#' class='inline-flex items-center py-2 px-4 text-sm font-medium text-center  bg-red-700 text-white rounded-lg border border-red-700  dark:border-red-700'>Delete </a>" ?>
                                    </div>
                                    <div class="flex mt-4 items-center space-x-3 md:mt-6">
                                        <?php echo " <a href='#' class='items-center py-2 px-4 text-sm font-semibold text-center text-gray-700 bg-white rounded-lg'>Appoint as Admin</a>"; ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Left Item -->

                        <!-- Start Right Item -->
                        <div class="w-full flex flex-col lg:col-start-2 lg:col-end-5 lg:ml-10">
                            <!-- About Project Content -->
                            <div class=" mt-10 md:mt-0 drop-shadow-2xl rounded p-4 bg-white dark:bg-gray-800">
                                <h2 class="text-black dark:text-white text-xl">About User</h2>
                                <div class="mt-5 font-Poppins text-gray-800 dark:text-gray-200"><?php echo "Some Details about the user" ?></div>
                            </div>
                            <!-- End About Project Content -->
                            
                        </div> <!-- End Right Items -->
                    </div>
                    <div class="mt-20"> <!-- This div is just to get some margin bottom -->

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>










<?php include "./includes/footer.inc.php" ?>