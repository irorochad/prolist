<?php include "../includes/header.inc.php" ?>
<?php include "../includes/sidebar.inc.php" ?>
<?php include "../includes/navbar.inc.php" ?>

<!-- Includes db_functions -->
<?php include "../../includes/db/db.inc.php"; ?>
<!-- End db_functions -->

<!-- Include function for form -->
<?php include "add_projFunc.php" ?>
<!-- End Include function for form -->

<main class="h-full overflow-y-auto">
    <!-- Main Dashboard aside nav and sidebar -->
    <div class="container px-6 mx-auto grid">

        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Add Projects
        </h2>
        <h4 class="mb-3 font-light text-gray-700 dark:text-gray-200">You can start adding projects here.</h4>
        <!-- multistep form -->
        <div class="Formwrapper w-full bg-white mt-4 mx-auto p-3 rounded-md dark:bg-gray-800">
            <div class="header flex mb-5 justify-center">
                <ul class="flex">
                    <li class="active form_1_progessbar">
                        <div>
                            <p>1</p>
                        </div>
                    </li>
                    <li class="form_2_progessbar">
                        <div>
                            <p>2</p>
                        </div>
                    </li>
                    <li class="form_3_progessbar">
                        <div>
                            <p>3</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="form_wrap mb-14">
                <?php
                if (isset($_POST['submitFormBtn'])) {
                    // $submitBtn = $_POST['submitFormBtn'];
                    sendData();
                }
                ?>

                <form method="POST" action="" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form_1 data_info">
                            <h2 class="my-6 text-2xl text-center font-light text-gray-700 dark:text-gray-200">
                                BASIC INFO
                            </h2>

                            <div class="form_container">
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <label for="project-name" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Project Name *</label>
                                        <input type="text" name="project_name" id="project-name" placeholder="example-name" class="formInputOne block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <P class=" ml-2 text-sm text-gray-500 dark:text-gray-400">
                                            It should be perfect - You won&apos;t be able to change it.
                                        </P>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <label for="project-website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Website *</label>
                                        <input type="text" id="project-website" name="project_mainsite" placeholder="https://www.examplelink.com" class="formInputOne block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <label for="project-start-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Project Launched On *</label>
                                        <input type="date" id="project-start-date" name="projectLauncDate" class="formInputOne block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <label for="project-cates" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Choose A Category *</label>
                                        <select id="project-cates" name="Projectcategories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <?php $query = "SELECT * FROM project_categories";

                                            $fetch_all_categories = mysqli_query($db_connection, $query);

                                            while ($row = mysqli_fetch_assoc($fetch_all_categories)) {
                                                $cats_title = $row['cats_title'];
                                            ?>
                                                <option><?php echo $cats_title; ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="about_txt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Project Description **</label>

                                    <textarea id="about-wysiwyg" name="about_txt" class="formInputOne"></textarea>
                                    <div class="flex flex-row mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 dark:text-gray-300">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                        </svg>
                                        <P class=" ml-2 text-sm text-gray-500 dark:text-gray-400">
                                            Please Provide as much info as possible.</P>
                                    </div>
                                </div>
                            </div>

                            <div class="btns_wrap">
                                <div class="m-5 ">
                                    <p class="formOneErroMsg hidden text-gray-700 dark:text-gray-100">All Fields are required!</p>
                                </div>
                                <div class="common_btns form_1_btns">
                                    <button type="button" class="btn_next">Next <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                            </svg>
                                        </span></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form_2 data_info" style="display: none;">
                            <h2 class="my-6 text-2xl text-center font-light text-gray-700 dark:text-gray-200">
                                MORE INFO
                            </h2>
                            <div class="form_container">
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <!-- Start Project logo and socials -->
                                    <div class="relative z-0 mb-6 w-full group">
                                        <div class="project-logo-input">
                                            <div class="project-logo-preview">
                                                <img id="logoPreviewBox" src="https://placehold.co/250x150">
                                            </div>
                                            <label for="logoPreview">Upload Logo</label>
                                            <input type="file" id="logoPreview" name="project_logo" accept="image/*" onchange="showPreview(event);">
                                        </div>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <!-- Start social Links -->
                                        <div class="flex flex-row items-center mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" style="fill: rgba(109, 35, 216, 1);">
                                                <path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path>
                                            </svg>

                                            <input type="text" placeholder="https://twitter.com/project" class="project-socials block p-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>

                                        <div class="flex flex-row items-center mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" style="fill: rgba(206, 117, 212, 1);">
                                                <path d="m20.665 3.717-17.73 6.837c-1.21.486-1.203 1.161-.222 1.462l4.552 1.42 10.532-6.645c.498-.303.953-.14.579.192l-8.533 7.701h-.002l.002.001-.314 4.692c.46 0 .663-.211.921-.46l2.211-2.15 4.599 3.397c.848.467 1.457.227 1.668-.785l3.019-14.228c.309-1.239-.473-1.8-1.282-1.434z"></path>
                                            </svg>

                                            <input type="text" placeholder="https://t.me/project" class="project-socials block p-2  text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>

                                        <div class="flex flex-row items-center mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" style="fill: rgba(187, 17, 17, 1);">
                                                <path d="M21.593 7.203a2.506 2.506 0 0 0-1.762-1.766C18.265 5.007 12 5 12 5s-6.264-.007-7.831.404a2.56 2.56 0 0 0-1.766 1.778c-.413 1.566-.417 4.814-.417 4.814s-.004 3.264.406 4.814c.23.857.905 1.534 1.763 1.765 1.582.43 7.83.437 7.83.437s6.265.007 7.831-.403a2.515 2.515 0 0 0 1.767-1.763c.414-1.565.417-4.812.417-4.812s.02-3.265-.407-4.831zM9.996 15.005l.005-6 5.207 3.005-5.212 2.995z"></path>
                                            </svg>
                                            <input type="text" placeholder="https://youtube.com/channel" class="project-socials block p-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                    </div> <!-- End social Links -->
                                </div> <!-- End Project logo and socials -->

                                <div>
                                    <h2 class="my-6 text-2xl text-center font-bold text-gray-700 dark:text-gray-200">
                                        Who Are You?
                                    </h2>
                                    <div class="flex flex-row items-center justify-center mb-5">
                                        <p class="text-gray-700 dark:text-gray-200 font-light">Are you part of the team member?</p>

                                        <!-- Rounded switch -->
                                        <label class="toggle_switch ml-5">
                                            <input type="checkbox" id="checkbox">
                                            <span class="toggle_slider round"></span>
                                        </label>
                                    </div>
                                    <!-- Start the form for the project owners sections. 
                                    It'll be hidden by default and shown when the checkbox above is checked -->
                                    <div class="hidden" id="role_form">
                                        <p class="text-gray-700 dark:text-gray-200 font-light text-center mb-10">The following information help us verify your relationship with the project, and won't be public.</p>
                                        <div class="grid md:grid-cols-2 md:gap-6">
                                            <div class="relative z-0 mb-6 w-full group">
                                                <label for="user-role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your Role *</label>
                                                <select id="user-role" name="user-role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option>CEO/Founder</option>
                                                    <option>Manager</option>
                                                </select>
                                            </div>

                                            <div class="relative z-0 mb-6 w-full group">
                                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your Name *</label>
                                                <input type="text" id="your-name" name="your-name" placeholder="John Mark" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>

                                        <div class="grid md:grid-cols-2 md:gap-6">
                                            <div class="relative z-0 mb-6 w-full group">
                                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Business Email *</label>
                                                <input type="email" id="your-email" name="your-email" placeholder="John@project.com" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>

                                            <div class="relative z-0 mb-6 w-full group">
                                                <label for="user-twitter-url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Twitter URL *</label>
                                                <input type="text" id="user-twitter-url" name="user-twitter-url" placeholder="https://twitter.com/your-name" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btns_wrap">
                                <div class="common_btns form_2_btns" style="display: none;">
                                    <button type="button" class="btn_back"><span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                                            </svg>

                                        </span>Back</button>
                                    <button type="button" class="btn_next">Next <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                            </svg>

                                        </span></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>


                    <fieldset>
                        <div class="form_3 data_info" style="display: none;">
                            <h2 class="my-6 text-2xl text-center font-light text-gray-700 dark:text-gray-200">
                                You're Almost Done!
                            </h2>

                            <div class="form_container">
                                <p class="text-gray-700 dark:text-gray-200 text-center mb-5">Clicking on the &lsquo; ADD &rsquo; button, means you agree to our <a href="#" target="_blank" class="text-blue-600">terms of conditions</a> - Which state that project can&apos;t be deleted. Upon Clicking on it, this project will be added and ready for manual review. </p>

                                <div class="btns_wrap">
                                    <div class="common_btns form_3_btns" style="display:none;">
                                        <button type="button" class="btn_back"><span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                                                </svg>

                                            </span>Back</button>
                                        <button type="submit" name="submitFormBtn" class="btn_done text-center w-full p-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">


                                            ADD <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg></span></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
        <!-- Add form Success Modal -->

        <!-- End Form Success Modal -->

    </div>
</main>

<?php include "../includes/footer.inc.php"; ?>