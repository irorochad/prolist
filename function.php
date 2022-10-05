<?php
include "./includes/db/db.inc.php";


// OR project_tags =  '%$searchData%'

function searchResult()
{
    global $db_connection;
    global $searchData;
    $query = "SELECT * FROM projects_info WHERE project_name LIKE '%$searchData%' AND `project_status` = 'Approved' ";

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
    } // End Loop and else statement
} ?>


<?php
function projectNotFound()
{ ?>
    <div class="container md:w-1/2 mx-auto p-10">
        <img class="" src="../assets/img/404Img.png" />
        <div class="flex flex-col items-center">
            <h3 class="mb-5 font-bold text-center text-gray-700 dark:text-gray-400 ">
                It seems the project you&apos;re searching for is no longer available or wasn&apos;t at all.
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
        <div class="grid grid-cols-1 lg:grid-cols-4  mt-10 mb-10 px-4 mx-auto ">
            <!-- Left Item -->
            <div class="flex flex-col md:col-start-1 md:col-end-3 w-full text-left p-4">
                <h1 class="text-3xl md:text-2xl font-bold font-Poppins mb-4 text-gray-800 dark:text-gray-200">About Project</h1>
                <div class="font-Poppins text-gray-600 dark:text-gray-200">
                    <?php echo $project_content; ?>
                </div>
                <div class="flex flex-row items-center">
                    <h3 class="mt-4 text-1xl font-bold mb-4 text-gray-800 dark:text-gray-200 mr-3">Help Share this Project:</h3>
                    <div class="flex flex-row gap-2">
                        <!--Share Icons --->
                        <button onclick="copyLinkToClipBoard()" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M18.97 3.659a2.25 2.25 0 00-3.182 0l-10.94 10.94a3.75 3.75 0 105.304 5.303l7.693-7.693a.75.75 0 011.06 1.06l-7.693 7.693a5.25 5.25 0 11-7.424-7.424l10.939-10.94a3.75 3.75 0 115.303 5.304L9.097 18.835l-.008.008-.007.007-.002.002-.003.002A2.25 2.25 0 015.91 15.66l7.81-7.81a.75.75 0 011.061 1.06l-7.81 7.81a.75.75 0 001.054 1.068L18.97 6.84a2.25 2.25 0 000-3.182z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- End Copy to clipboard -->

                        <!-- <a target="_blank" href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button text-blue-500" data-text="Hey, checkout this crypto project. You&#39;ll love to see it" data-show-count="false"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7" fill="currentColor">
                                <path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path>
                            </svg>
                            <span class="sr-only">Share to Twitter</span>
                        </a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> -->
                        <!-- End Twitter share -->


                        <!-- Load Facebook SDK for JavaScript -->
                        <!-- <div id="fb-root"></div>
                        <script>
                            (function(d, s, id) {
                                let postUrl = encodeURI(document.location.href);
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script> -->

                        <!-- Your share button code -->
                        <!-- <div class="fb-share-button" data-href="https://localhost.com/prolist/projects" data-layout="button_count">
                        </div> -->
                        <!-- End Share to Facebook -->

                    </div>
                </div>
            </div>
            <!-- Right Item -->
            <div class="flex flex-col md:col-start-4 md:col-end-5 w-full">
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
                    <div class="flex flex-row justify-between font-Poppins mt-5">
                        <p>Socials</p>
                        <div class="flex flex-row gap-2">
                            <a href="#" class="text-[#1da1f2] hover:text-gray-700 dark:hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7" fill="currentColor">
                                    <path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path>
                                </svg>
                                <span class="sr-only">Twitter</span>
                            </a>
                            <a href="#" class="text-[#1877f2] hover:text-gray-700 dark:hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"></path>
                                </svg>
                                <span class="sr-only">Facebook</span>
                            </a>
                            <a href="#" class="text-[#0088cc] hover:text-gray-700 dark:hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="m20.665 3.717-17.73 6.837c-1.21.486-1.203 1.161-.222 1.462l4.552 1.42 10.532-6.645c.498-.303.953-.14.579.192l-8.533 7.701h-.002l.002.001-.314 4.692c.46 0 .663-.211.921-.46l2.211-2.15 4.599 3.397c.848.467 1.457.227 1.668-.785l3.019-14.228c.309-1.239-.473-1.8-1.282-1.434z"></path>
                                </svg>
                                <span class="sr-only">Telegram</span>
                            </a>
                            <a href="#" class="text-[#ff0000] hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M21.593 7.203a2.506 2.506 0 0 0-1.762-1.766C18.265 5.007 12 5 12 5s-6.264-.007-7.831.404a2.56 2.56 0 0 0-1.766 1.778c-.413 1.566-.417 4.814-.417 4.814s-.004 3.264.406 4.814c.23.857.905 1.534 1.763 1.765 1.582.43 7.83.437 7.83.437s6.265.007 7.831-.403a2.515 2.515 0 0 0 1.767-1.763c.414-1.565.417-4.812.417-4.812s.02-3.265-.407-4.831zM9.996 15.005l.005-6 5.207 3.005-5.212 2.995z"></path>
                                </svg>
                                <span class="sr-only">Youtube</span>
                            </a>
                        </div>
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


            <div class="max-w-sm mx-auto mb-5 mr-2 md:mr-5  h-fit w-fit bg-white rounded-lg border hover:border-gray-200 hover:shadow-lg dark:bg-gray-800 dark:border-gray-700">
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

        // User Registration

        // check if email already exsits

        function email_exists($email)

        {
            global $db_connection;

            $emailQuery = "SELECT email FROM users WHERE `email` = '$email'";
            $runemailQuery = mysqli_query($db_connection, $emailQuery);

            if (mysqli_num_rows($runemailQuery) > 0) {
                return true;
            } else {
                return false;
            }
        }

        function user_registration($name, $email, $passwordID)
        {
            global $db_connection;

            // $name =  mysqli_real_escape_string($db_connection, $_POST['name']);
            // $email =  mysqli_real_escape_string($db_connection, $_POST['emailId']);
            // $passwordID =  mysqli_real_escape_string($db_connection, $_POST['passwordID']);

            $hashedPassword = password_hash($passwordID, PASSWORD_BCRYPT, array('cost'  => 12));

            $queryInsert = "INSERT INTO users(name, email, password) VALUES('{$name}', '{$email}', '{$hashedPassword}')";
            $runInsert = mysqli_query($db_connection, $queryInsert);
            if (!$runInsert) {
                die("Something went wrong");
            } else {
                header("Location: login");
            }
        }

        // show an inccorrect password if the password doesn't match while logging in, 
        //and show email not found when reseting account pssword
        function formErrorMsg()
        {
            if (isset($_SESSION['formError'])) { ?>

                <h4 class="text-red-600"><?= $_SESSION['formError']; ?></h4>
        <?php
                unset($_SESSION['formError']);
            }
        }
        // Functons to login user

        function user_login($emailId, $password)
        {

            global $db_connection;

            $emailId = mysqli_real_escape_string($db_connection, $_POST['email']);
            $password = mysqli_real_escape_string($db_connection, $_POST['password']);

            $query = "SELECT * FROM users WHERE `email` = '{$emailId}' ";
            $queryRun = mysqli_query($db_connection, $query);

            while ($row = mysqli_fetch_array($queryRun)) {
                $db_id = $row['id'];
                $db_name = $row['name'];
                $db_password = $row['password'];
                $db_email = $row['email'];
                $db_role = $row['role'];
            }


            // Check if the inputed password matched with the password in the database.

            if (password_verify($password, $db_password)) {

                $_SESSION['user_id'] =  $db_id;
                $_SESSION['user_name'] = $db_name;
                $_SESSION['user_password'] = $db_password;
                $_SESSION['user_email'] = $db_email;
                $_SESSION['user_role'] = $db_role;
                header("Location: /prolist/account");
            } else {
                $_SESSION['formError'] = "Incorrect Password";
                // echo "password is not correct";
                // $errorMsg['password'] = 'Password is not correct';
                // header("Location: login");
                // $errorMsg['password'] = 'Password is not correct.';
            }
        }

        // Password Reset Function!

        function passwordReset()
        {
            global $db_connection;

            $email = $_POST['email'];
            $length = 50;
            $reset_token = bin2hex(openssl_random_pseudo_bytes($length));

            if (!email_exists($email)) {
                // if the email is not found, use the $session to show an erorr msg. 
                $_SESSION['formError'] = "We couldn't find that email.";
            } else {
                $query = "UPDATE users SET `reset_token` = '{$reset_token}' WHERE email = '{$email}'";
                $runquery = mysqli_query($db_connection, $query);
            }
        }
        ?>