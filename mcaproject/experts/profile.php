<?php
    include 'inc/header.php';
?>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
<?php
    include 'inc/nav1.php';
    require 'inc/dbconn.php';
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
                    <h6 class="font-normal pl-2 text-base">My Profile</h6>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="container mx-auto my-0 p-5">
                    <?php
                    $dtid=$_SESSION["1wdvhi1"];
                    $sql = "SELECT * from qwert_doctors where dtid='$dtid'";
                    $result = mysqli_query($conn, $sql); 
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                         $status=$rows['status'];
                         if ($status==1) {
                            $status="Active";
                         } else {
                            $status="InActive";
                         }                        
                                         
                    ?>
                    <div class="md:flex no-wrap md:-mx-2 ">
                        <!-- Left Side -->
                        <div class="w-full md:w-3/12 md:mx-2">
                            <!-- Profile Card -->
                            <div class="bg-white p-3 border-t-4 border-green-400">
                                <div class="image overflow-hidden">
                                    <img class="h-auto w-1/2 mx-auto rounded-full"
                                        src="https://ecglive.com/assets/team/<?php echo $rows['profile-pic']; ?>"
                                        alt="">
                                </div>
                                <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Dr. <?php echo $rows['fname']; ?> <?php echo $rows['lname']; ?></h1>
                                <h3 class="text-gray-600 font-lg text-semibold leading-6">Expert adviser at ECGLive.</h3>
                                <p class="text-sm text-gray-500 hover:text-gray-600 leading-6 hidden">para</p>
                                <ul
                                    class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                    <li class="flex items-center py-3">
                                        <span>Status</span>
                                        <span class="ml-auto"><span
                                                class="bg-green-500 py-1 px-2 rounded text-white text-sm"><?php echo $status; ?></span></span>
                                    </li>
                                    <li class="flex items-center py-3">
                                        <span>Member since</span>
                                        <span class="ml-auto"><?php echo $rows['joindate']; ?></span>
                                    </li>
                                </ul>
                            </div>
                            <!-- End of profile card -->
                            <div class="my-4"></div>
                        </div>
                        <!-- Right Side -->
                        <div class="w-full md:w-9/12 mx-2 h-64">
                            <!-- Profile tab -->
                            <!-- About Section -->
                            <div class="bg-white p-3 shadow-sm rounded-sm">
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">About</span>
                                </div>
                                <div class="text-gray-700">
                                    <div class="grid md:grid-cols-2 text-sm">
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Name</div>
                                            <div class="px-4 py-2"><?php echo $rows['fname']; ?> <?php echo $rows['lname']; ?></div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Birthday</div>
                                            <div class="px-4 py-2"><?php echo $rows['dob']; ?></div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Contact No.</div>
                                            <div class="px-4 py-2"><?php echo $rows['contact_no']; ?></div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Email.</div>
                                            <div class="px-4 py-2">
                                                <a class="text-blue-800" href="mailto:<?php echo $rows['email']; ?>"><?php echo $rows['email']; ?></a>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Gender</div>
                                            <div class="px-4 py-2"><?php echo $rows['gender']; ?></div>
                                        </div>

                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Qualification</div>
                                            <div class="px-4 py-2"><?php echo $rows['qualification']; ?></div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Specialization</div>
                                            <div class="px-4 py-2"><?php echo $rows['spe']; ?></div>
                                        </div>

                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Current Address</div>
                                            <div class="px-4 py-2"><?php echo $rows['caddress']; ?></div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Permanant Address</div>
                                            <div class="px-4 py-2"><?php echo $rows['paddress']; ?></div>
                                        </div>


                                    </div>
                                </div>
                                <button
                                    class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Edit Info.</button>
                            </div>
                            <!-- End of about section -->

                            <div class="my-4"></div>

                        </div>
                    </div>
                    <?php
                        }
                    }

                    ?>
                </div>


            </div>



        </div>

    </section>
</div>
</main>


<?php
   include 'inc/footer.php';
?>