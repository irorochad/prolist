<?php include "./includes/header.inc.php" ?>
<?php include "./includes/navbar.inc.php" ?>


<div class="mt-20 mb-20 px-4 font-Montserrat">
    <!-- Main Project Header -->
    <div class=" grid grid-cols-2  items-center w-full">
        <!-- Left Header -->
        <div class="md:w-1/2">
            <div class="flex justify-start items-center ">
                <div class="">
                    <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/8616.png" class="md:w-full" alt="Logo" />
                </div>
                <div class="flex flex-col pl-4 md:pl-4 text-gray-800 dark:text-gray-100">
                    <h1 class="md:text-4xl font-bold">Binance</h1>
                    <span class="flex flex-row">
                        <h3>Category</h3>
                        <p class="ml-2 text-blue-600 dark:text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                        </p>
                    </span>
                </div>
            </div>
        </div> <!-- End Left Header -->


        <!-- Right Header -->
        <div class="flex justify-end">
            <!-- <p class="text-gray-800 dark:text-gray-200 ">Visit Site</p> -->
            <a href="#" target="_blank" class="inline-flex items-center py-2 px-3 text-md font-semibold text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 ">
                Website
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-5" style="fill: rgba(255, 255, 255, 1);">
                    <path d="m13 3 3.293 3.293-7 7 1.414 1.414 7-7L21 11V3z"></path>
                    <path d="M19 19H5V5h7l-2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-5l-2-2v7z"></path>
                </svg>
            </a>
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
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce turpis ante, eleifend vitae turpis ultricies, eleifend ullamcorper ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam egestas, metus id tempor elementum, libero libero consectetur tortor, nec auctor odio purus eget urna. Ut iaculis hendrerit leo in fringilla. Fusce euismod arcu tortor, sed rhoncus quam semper et. Vestibulum facilisis gravida nisi a commodo. Aenean tempus accumsan lectus, eget dapibus felis aliquet vel. Donec aliquet massa quis augue ullamcorper posuere.

        </p>
    </div>
    <!-- Right Item -->
    <div class="flex flex-col md:col-start-4 md:col-end-5 w-full text-gray-800 dark:text-gray-200 drop-shadow-md bg-white dark:bg-[#101313] rounded-md p-4">
        <h1 class="text-3xl md:text-4xl font-bold font-Montserrat md:text-right">Useful Data</h1>
        <div class="flex flex-row justify-between mt-5">
            <p>Website:</p>
            <p> <a href="https://example.com" target="_blank" class="inline-flex items-center  text-blue-600 dark:text-blue-500 hover:underline">
                    www.example.com
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-3" style="fill: rgba(90, 43, 224, 1);">
                        <path d="m13 3 3.293 3.293-7 7 1.414 1.414 7-7L21 11V3z"></path>
                        <path d="M19 19H5V5h7l-2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-5l-2-2v7z"></path>
                    </svg>
                </a></p>
        </div>
        <div class="flex flex-row justify-between font-Poppins mt-5">
            <h1 class="">Founded:</h1>
            <P>2019</P>
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
<!-- End Project Hero -->








<?php include "./includes/footer.inc.php" ?>