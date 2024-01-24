<?php
    include 'inc/header.php';
?>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
<?php
    include 'inc/nav1.php';
?>

<main class="bg-white">

    <div class="flex flex-col md:flex-row">
            <?php
                include 'inc/nav2.php';
            ?>
        <section class="md:w-full">
            <div id="main" class="main-content flex-1 bg-gray-100 mt-0 md:mt-2 pb-24 md:pb-5">

                <div class="bg-gray-800">
                    <div class="bg-gradient-to-r from-blue-900 to-gray-800 p-4 md:p-4 shadow text-2xl text-white">
                        <h6 class="font-normal pl-2 text-base">Notifications</h6>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-full xl:w-full p-2 md:p-5 ">


                            <div role="alert" class="sm:mr-6 mt-1 sm:mt-1 mb-1 sm:mb-0 xl:w-5/12 mx-auto relative left-0 sm:left-auto right-0 sm:top-0 w-full bg-white dark:bg-gray-800 shadow-lg rounded flex pr-4 py-4 transition duration-150 ease-in-out" id="notification">
                            
                                <button aria-label="close" class="absolute right-0 mr-4 text-gray-500 dark:text-gray-100 dark:hover:text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out cursor-pointer focus:ring-2 focus:outline-none focus:ring-gray-500 rounded" onclick="closeModal()">
                                    <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                </button>
                                <div class="pr-3 pl-4">
                                    <!-- <div class="h-12 w-12 sm:h-10 sm:w-10 rounded-full">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/notifications/n_1.png" alt="Avatar display" role="img" class="h-full w-full object-cover rounded-full shadow" />
                                    </div> -->
                                </div>
                                <div>
                                    <p class="text-sm text-gray-800 dark:text-gray-100 font-semibold">Ashley Wilson</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 font-normal">Has requested to follow you.</p>
                                    <div class="flex items-center pt-2">
                                        <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 bg-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-5 py-1 text-xs">Accept</button>
                                        <button class="bg-gray-200 dark:bg-gray-700 dark:text-indigo-600 dark:hover:bg-gray-600 transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-300 hover:bg-gray-300 rounded text-indigo-700 px-5 py-1 text-xs ml-2" onclick="closeModal()">Decline</button>
                                    </div>
                                </div>
                            </div>  
            
                    
                    

                    </div>                       
                    
                </div>



            </div>

        </section>
    </div>
</main>


 <?php
    include 'inc/footer.php';
?>