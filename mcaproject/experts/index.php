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
               
                $dtid=$_SESSION["1wdvhi1"];
                $sql = "SELECT reports_created from qwert_doctors where dtid='$dtid'";
                $result = mysqli_query($conn, $sql);               
                $analytics = mysqli_fetch_assoc($result);

                $sql1 = "SELECT userid from qwert_users";
                $res1 = mysqli_query($conn, $sql1);
                $usercount= mysqli_num_rows($res1);

                $sql2 = "SELECT COUNT(status) as pending_reports FROM qwert_ecgs where status='Submitted For Review'";
                $result = mysqli_query($conn, $sql2); 

            ?>
            <section class="md:w-full">
                <div id="main" class="main-content flex-1 bg-gray-100 mt-0 md:mt-2 pb-24 md:pb-5">
                    <div class="bg-gray-800">
                        <div class="bg-gradient-to-r from-blue-900 to-gray-800 p-4 md:p-4 shadow text-2xl text-white">
                            <h6 class="font-normal pl-2 text-base">Analytics</h6>
                        </div>
                    </div>
                    <div class="flex flex-wrap">
                    <div class="w-1/2 xl:w-1/4 p-2 md:p-5">
                            <!--Metric Card-->
                            <div
                                class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-2 md:p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-2 md:p-6 bg-yellow-600"><i
                                                class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600 text-xs md:text-base">Users
                                        </h2>
                                        <p class="font-bold text-xl md:text-2xl"><?php echo $usercount; ?><span class="text-yellow-600"><i
                                                    class="fas fa-caret-up"></i></span></p>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-1/2 xl:w-1/4 p-2 md:p-5">
                            <!--Metric Card-->
                            <div
                                class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-2 md:p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-2 md:p-6 bg-indigo-600"><i
                                                class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center ">
                                        <h2 class="font-bold uppercase text-gray-600 text-xs md:text-base">Pending Reports</h2>
                                        <p class="font-bold text-xl md:text-2xl"><?php echo $analytics['reports_created']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>

                        <div class="w-1/2 xl:w-1/4 p-2 md:p-5">
                            <!--Metric Card-->
                            <div
                                class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-2 md:p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-2 md:p-6 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center ">
                                        <h2 class="font-bold uppercase text-gray-600 text-xs md:text-base">Reviewed Reports</h2>
                                        <p class="font-bold text-xl md:text-2xl">0 </p>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>

                        <div class="w-1/2 xl:w-1/4 p-2 md:p-5">
                            <!--Metric Card-->
                            <div
                                class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-2 md:p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-2 md:p-6 bg-green-600"><i
                                                class="fa fa-wallet fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600 text-xs md:text-base">Earnings</h2>
                                        <p class="font-bold text-xl md:text-2xl">₹<?php echo $analytics['reports_created']*10; ?> <span class="text-green-500"><i
                                                    class="fas fa-caret-up"></i></span> </p>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                    </div>
                    <?php
                        $sql = "SELECT * from qwert_ecgs WHERE status='Submitted For Review'";
                        $result = mysqli_query($conn, $sql);
                                
                    ?>
                    <div class="flex flex-row flex-wrap flex-grow mt-2">
                        <div class="w-full md:w-1/2 p-6">
                            <!--Graph Card-->
                            <div class="bg-white border-transparent rounded-lg shadow-xl">
                        <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                            <h2 class="font-bold uppercase text-gray-600">Pending Reports</h2>
                        </div>
                        <div class="p-5">
                            <table class="w-full p-5 text-gray-700">
                                
                                        <thead>
                                            <tr>
                                                <th class="text-left text-blue-900">Id</th>
                                                <th class="text-left text-blue-900">Test</th>
                                                <th class="text-left text-blue-900">Date</th>
                                                <th class="text-left text-blue-900">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if (mysqli_num_rows($result) > 0) {
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                if ($rows['rp_type']==1) {
                                                    $rp_type="ECG";
                                                }elseif ($rows['rp_type']==2) {
                                                    $rp_type="Blood Test";
                                                }                                                  
                                               
                                        ?> 
                                        <tr>
                                            <td class="text-center"><?php echo $rows['ecgid']; ?></td>
                                            <td class="text-center"><?php echo $rp_type; ?></td>
                                            <td class="text-center"><?php echo $rows['create_date']; ?></td>
                                            <td class="flex text-center"><a href="view_report.php?ecgid=<?php echo $rows['ecgid'];?>" class="mx-auto"><i class="fa fa-eye"></i></a> </td>

                                        </tr>

                                        <?php
                                            }
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                    <p class="py-2"><a href="reports.php">See More Reports...</a></p>

                        </div>
                    </div>
                            <!--/Graph Card-->
                        </div>

                        <div class="w-full md:w-1/2 p-6">
                            <!-- Table Card-->
                            <!-- <div class="bg-white border-transparent rounded-lg shadow-xl">
                                <div
                                    class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                    <h2 class="font-bold uppercase text-gray-600">Pending Uploads</h2>
                                </div>
                                <div class="p-5">
                                    <table class="w-full p-5 text-gray-700">
                                        <thead>
                                            <tr>
                                                <th class="text-left text-blue-900">Id</th>
                                                <th class="text-left text-blue-900">Upload Date</th>
                                                <th class="text-left text-blue-900">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1002</td>
                                                <td>2022-08-07 13:48:30</td>
                                                <td>View</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <p class="py-2"><a href="#">See More issues...</a></p>
                                </div>
                            </div> -->
                            <!--/table Card -->
                        </div>

                        <div class="w-full md:w-1/2 p-6">
                            <!--Advert Card-->
                            <!-- <div class="bg-white border-transparent rounded-lg shadow-xl">
                                <div
                                    class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                    <h2 class="font-bold uppercase text-gray-600">Empty</h2>
                                </div>
                                <div class="p-5 text-center">
                                    
                                </div>
                            </div> -->
                            <!--/Advert Card-->
                        </div>
                    </div>
                    
                </div>
            </section>
        </div>     
 </main>


<?php
    include 'inc/footer.php';
?>