<?php include "./includes/header.inc.php";
include "./includes/sidebar.inc.php";
include "./includes/navbar.inc.php";
include "./../includes/db/db.inc.php";
?>

<!-- Include the function in the root folder of the account folder -->
<?php include "functions.php"; ?>



<div class="container px-6 mx-auto grid">
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Account Profile</h2>
        <?php

        $the_user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE id = '$the_user_id' ";
        $fetch_user_info = mysqli_query($db_connection, $query);
        while ($row = mysqli_fetch_assoc($fetch_user_info)) {
            $name = $row['name'];
            $email = $row['email'];
            $passowrd = $row['password'];
            $joined_date = $row['created_at'];
        ?>
            <!-- <h4 class="mb-3 font-semibold text-gray-700 dark:text-gray-200">Project Details</h4> -->

            <div class="grid grid-cols-1 lg:grid-cols-4 ">
                <!-- Left Item -->
                <div class="w-full flex flex-col lg:col-start-1 lg:col-end-1">
                    <div class="w-full max-w-sm bg-white drop-shadow-2xl rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pt-4 pb-5 font-Poppins">
                            <img class="mb-3 w-24 h-24 rounded-full shadow-lg" <?php echo "src='/prolist/assets/img/user/profile.png' "; ?> alt="Project Logo">
                            <h5 class="mb-1 text-xl font-medium  text-gray-900 dark:text-white"><?php echo $name; ?></h5>
                            <p class="mb-1 text-sm text-gray-900 dark:text-white"><?php echo "Registered on: $joined_date" ?></p>
                        </div>
                    </div>


                    <!-- Button to show modal to edit password -->
                    <div class="mt-3">
                        <button type="submit" name="passwordModal" id="passwordBtn" class="w-full bg-indigo-600 text-white rounded-md p-2">Change Password</button>
                    </div>
                    <!-- End Button to show modal to edit password -->

                </div> <!-- End Left Item -->

                <div class="w-full flex flex-col lg:col-start-2 lg:col-end-5 lg:ml-8">
                    <!-- Modal to change password -->
                    <div id="editpasswordModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-10 mx-auto z-50 w-full md:h-full">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" id="hidepassModal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="py-6 px-6 lg:px-8">
                                    <form class="space-y-6" action="" method="POST">
                                        <div>
                                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Old Password</label>
                                            <input type="password" name="oldPass" id="oldPassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="............" required>
                                        </div>
                                        <div>
                                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">New password</label>
                                            <input type="password" name="newPass" id="newPassword" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                        </div>

                                        <button type="submit" name="updatePassBTN" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">UPDATE PASSWORD</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal to change password -->
                    <div class="mt-10 lg:mt-0 drop-shadow-2xl rounded p-4 bg-white dark:bg-gray-800">
                        <?php
                        actionsMsg(); // After any update query, the success msg will be displayed here from the function
                        updatePassword();
                        ?>
                        <h2 class="text-black dark:text-white text-xl">User Information</h2>
                        <hr class="mt-4" />

                        <?php
                        // call functions from here

                        if (isset($_POST['update_user_info'])) {
                            $user_idUpdate = $_POST['update_user_info'];
                            $user_nameUpdate = mysqli_real_escape_string($db_connection, $_POST['user_name']);
                            $user_email_Update = mysqli_real_escape_string($db_connection, $_POST['user_email']);

                            $errorMsg = [
                                'name' => '',
                                'email' => ''
                            ];

                            // check if name is empty
                            if ($user_nameUpdate == '') {
                                $errorMsg['name'] = 'Name cannot be empty';
                            }

                            // check if name is less than 3 characters
                            if (strlen($user_nameUpdate) < 3) {
                                $errorMsg['name'] = 'Please provide your full name. ';
                            }

                            // Validate name if it's only letters and white space
                            if (!preg_match("/^[a-zA-Z-' ]*$/", $user_nameUpdate)) {
                                $errorMsg['name'] = 'Only letters and white space allowed';
                            }
                            // cehck if email is empty
                            if ($user_email_Update == '') {
                                $errorMsg['email'] = 'Email field cannot be empty,';
                            }
                            // check if e-mail address is well-formed
                            if (!filter_var($user_email_Update, FILTER_VALIDATE_EMAIL)) {
                                $errorMsg['email'] = 'Something is wrong with that email.';
                            }
                            // Check if the email is already taken.
                            if (email_exists($user_email_Update)) {
                                $errorMsg['email'] = 'Somehow, that email already exsits';
                            }

                            // Loop through the $errorMsg array, if it's emtpty, unset the error msgs and update the users info!

                            foreach ($errorMsg as $key => $value) {
                                if (empty($value)) {
                                    unset($errorMsg[$key]);
                                }

                                if (empty($errorMsg)) {
                                    updateUserDetails();
                                }
                            }
                        }

                        ?>


                        <form method="POST" action="">
                            <div class="grid md:grid-cols-2 md:gap-6 mt-4">
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="name" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                                    <input type="text" name="user_name" id="name" value="<?php echo $name; ?>" class=" block p-2 w-full text-gray-900 dark:text-gray-100  bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 sm:text-xs ">
                                    <p class="text-red-700"><?php echo isset($errorMsg['name']) ? $errorMsg['name'] : ''; ?></p>
                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                                    <input type="text" name="user_email" id="email" value="<?php echo $email ?>" class=" block p-2 w-full text-gray-900 dark:text-gray-100  bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 sm:text-xs  ">
                                    <p class="text-red-700"><?php echo isset($errorMsg['email']) ? $errorMsg['email'] : '' ?></p>
                                </div>
                            </div>
                            <div>
                                <button type="submit" name="update_user_info" class="w-full bg-indigo-600 text-white rounded-md p-2">Update Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-20">
                <!-- This div is just to get some margin bottom -->

            </div>
        <?php } ?>
    </div>
</div>










<?php include "./includes/footer.inc.php" ?>