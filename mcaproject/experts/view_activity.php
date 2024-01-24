<?php
    include 'inc/header.php';
    require 'inc/dbconn.php';
    if (!isset($_SESSION["1wdvhi0"]) || !isset($_SESSION["1wdvhi1"])) {
        header("location:login.php");
    }
?>

<body class="bg-gray-800 font-sans leading-normal tracking-normal">
<?php
    // include 'inc/nav1.php';
?>
    <main class="bg-white">
        <div class="flex flex-col md:flex-row">
            <?php
                // include 'inc/nav2.php';
                $dtid=$_SESSION["1wdvhi1"];

                $ecg_id = $_GET['ecgid'];
                $sql = "SELECT * from qwert_ecgs where ecgid='$ecg_id' and assign_dt='$dtid'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) < 1){
                    header("location:activity.php");
                }                                 
                              

            ?>
            <section class="md:w-full">
                <div id="main" class="main-content flex-1 bg-gray-100 mt-0 md:mt-2 pb-24 md:pb-5 ">


                    <div class="bg-gray-800">
                        <div
                            class="w-full inline-flex bg-gradient-to-r from-blue-900 to-gray-800 p-3 md:p-4 shadow text-2xl text-white">
                            <button onclick="history.back()" id="button" type="submit"
                                class=" hover:bg-indigo-500 text-white font-bold rounded-full p-1 w-9"><i
                                    class="fa fa-arrow-left"></i></button>
                            <h6 class="font-normal self-center text-base mx-auto">ECG Report</h6>
                        </div>
                    </div>

                    <div class="flex flex-row flex-wrap flex-grow mt-2 ">
                        <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    $userid=$rows['userid'];
                                    $sql1 = "SELECT first_name, last_name, gender, dob, phone, city from qwert_users where userid='$userid'";
                                    $result1 = mysqli_query($conn, $sql1);
                                    while ($userdata = mysqli_fetch_assoc($result1)) {
                                        $fname = $userdata['first_name'];
                                        $lname = $userdata['last_name'];
                                        $gender = $userdata['gender'];
                                        if ($gender=="Male") {
                                            $gender="M";
                                        } else {
                                            $gender="F";
                                        }
                                        
                                       $age = date_diff(date_create($userdata['dob']), date_create('now'))->y;
                                        $phone = $userdata['phone'];
                                        $city = $userdata['city'];

                                    }


                        ?>
                        <div class="w-full p-2 md:p-6">
                            <div class="md:mt-10 sm:mt-0">
                                <div class="md:grid md:grid-cols-1 md:gap-6">
                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="shadow overflow-hidden sm:rounded-md">
                                            <div class="px-4 py-5 bg-white sm:p-6">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-6 md:col-span-2">
                                                        <h5 class=" font-bold text-base">Patient Details:</h5>
                                                        <p><?php echo $fname;?> <?php echo $lname;?></p>
                                                        <p><?php echo $gender;?>/<?php echo $age;?></p>
                                                        <p>+91 <?php echo $phone;?></p>
                                                    </div>
                                                    <div class="col-span-3 md:col-span-2">
                                                        <?php 
                                                            $sympt= array();
                                                            $sympt = explode(',',$rows['symptoms']);
                                                            $count_sympt=count($sympt);                                            
                                                        ?>
                                                        <h5 class=" font-bold text-base">Clinical Symptoms:</h5>

                                                        <?php for ($i = 0; $i < $count_sympt; $i++) { ?>
                                                        <p><?php echo $sympt[$i]; ?>,</p>
                                                        <?php } ?>

     
                                                    </div>
                                                    <div class="col-span-3 md:col-span-2">
                                                        <?php 
                                                            $preill= array();
                                                            $preill = explode(',',$rows['pre_illness']);
                                                            $count_preill=count($preill);                                            
                                                        ?>
                                                        <h5 class=" font-bold text-base">Previous Illness:</h5>
                                                        <?php for ($i = 0; $i < $count_preill; $i++) { ?>
                                                        <p><?php echo $preill[$i]; ?>,</p>
                                                        <?php } ?>
                                                                             

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 sm:mt-0">
                                <div class="md:grid md:grid-cols-1 md:gap-6">
                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="shadow overflow-hidden sm:rounded-md">
                                            <?php 
                                                $imgurls= array();
                                                $imgurls = explode(',',$rows['images']);
                                                $count_imgurls=count($imgurls);                                                                                 
                                            ?>
                                            <div class=" p-1 bg-white md:p-5 flex float-left cursor-pointer md:w-full" id="ecgimages">
                                                <?php for ($i = 0; $i < $count_imgurls; $i++) { ?>
                                                <img src="../Reports/Images/<?php echo $imgurls[$i]; ?>" alt="ECG Image <?php echo $i; ?>" class="w-1/3 mx-1 image max-w-xs" >
                                                <?php } ?>
                                            </div>
     
                                            <!-- <a href="" target="blank">ECG Pdf file</a> -->
                                            <div class=" p-1 bg-white md:p-5 flex w-full">
                                                <?php $pdf = $rows['pdf']; 
                                                if (!$pdf=="") {
                                                    ?>
                                                    <iframe src="../Reports/PDF/<?php echo $rows['pdf']; ?>" width="100%" height="400px"></iframe>
                                                    <?php
                                                   
                                                }else {
   
                                                }
                                                
                                                ?>                                                
                                            

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }
                                }
                            ?>

                            <div class="hidden sm:block" aria-hidden="true">
                                <div class="py-5">
                                    <div class="border-t border-gray-200"></div>
                                </div>
                            </div>


                            <div class="md:grid md:grid-cols-1 md:gap-6">
                                <!-- <div class="md:col-span-1">
                                    <div class="px-4 sm:px-0">
                                      <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                                      <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
                                    </div>
                                  </div> -->
                                  <?php
                                    // $dtid=$_SESSION["dtid"];
                                    $sql = "SELECT * from f_reports where ecgid='$ecg_id'";
                                    $result = mysqli_query($conn, $sql);
                                        while ($rdata = mysqli_fetch_assoc($result)) {
                                    
                                    ?>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <form action="#" method="POST" id="c_report">
                                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                                <h4 class="text-base font-bold">Documentation</h4>
                                                <div class="grid sm:grid-cols-2 sm:gap-6">
                                                    <div class="relative z-0 mb-6 w-full group">
                                                        <input type="number" value="<?php echo $rdata['h_rate']; ?>" name="rate" id="rate"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " disabled />
                                                        <label for="rate"
                                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Heart
                                                            Rate:</label>
                                                    </div>
                                                    <div class="relative z-0 mb-6 w-full group">
                                                        <input type="text" value="<?php echo $rdata['rhytham']; ?>" name="rhythm" id="rhythm"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " disabled />
                                                        <label for="rhythm"
                                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rhythm:</label>
                                                    </div>

                                                    <div class="relative z-0 mb-6 w-full group">
                                                        <input type="text" value="<?php echo $rdata['axis']; ?>" name="Axis" id="Axis"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " disabled />
                                                        <label for="Axis"
                                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Axis:</label>
                                                    </div>
                                                    <div class="relative z-0 mb-6 w-full group">
                                                        <input type="number" value="<?php echo $rdata['pr_inte']; ?>" name="pr" id="pr"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " disabled />
                                                        <label for="pr"
                                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PR
                                                            Interval:</label>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="grid sm:grid-cols-2 sm:gap-6">
                                                    <div class="relative z-0 mb-6 w-full group">
                                                        <input type="number" value="<?php echo $rdata['qrs_compl']; ?>" name="qrs" id="qrs"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " disabled />
                                                        <label for="qrs"
                                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">QRS
                                                            Complex:</label>
                                                    </div>
                                                    <div class="relative z-0 mb-6 w-full group">
                                                        <input type="number" value="<?php echo $rdata['qt_inte']; ?>" name="qt" id="qt"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " disabled />
                                                        <label for="qt"
                                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">QT
                                                            Interval:</label>
                                                    </div>

                                                    <div class="relative z-0 mb-6 w-full group">
                                                        <input type="text" value="<?php echo $rdata['st_seg']; ?>" name="st" id="st"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " disabled />
                                                        <label for="st"
                                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ST
                                                            Segment:</label>
                                                    </div>
                                                    <div class="relative z-0 mb-6 w-full group">
                                                        <input type="text" value="<?php echo $rdata['t_waves']; ?>" name="tw" id="tw"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " disabled />
                                                        <label for="tw"
                                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">T
                                                            Waves:</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="shadow overflow-hidden sm:rounded-md">

                                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                                    <div class="relative z-0 mb-6 w-full group">
                                                        <input type="text" value="<?php echo $rdata['impression']; ?>" name="status" id="imp"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " disabled />
                                                        <label for="status"
                                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Overall Report Status</label>
                                                    </div>
                                                    <fieldset>
                                                        <legend class="text-base font-medium text-gray-900">Suggestions:
                                                        </legend>
                                                        <div class="mt-4 space-y-4">
                                                            <?php
                                                                $sugs= array();
                                                                $sugs = explode(',',$rdata['sug']);
                                                                $count_sugs=count($sugs);

                                                                for ($i = 0; $i < $count_sugs; $i++) { 
                                                                
                                                                $sql = "SELECT * from qwert_suggestions where s_id=$sugs[$i]";
                                                                $result = mysqli_query($conn, $sql);
                                                                $sugdata = mysqli_fetch_assoc($result)           
                                                                
                                                            ?>


                                                            <div class="flex items-start">
                                                                <div class="flex items-center h-5">
                                                                    <input id="sugg" value="<?php //echo $rows['s_id']; ?>" name="sugg[]" type="checkbox"
                                                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked disabled>
                                                                </div>
                                                                <div class="ml-3 text-sm">
                                                                    <label for="s1"
                                                                        class="font-medium text-gray-700"><?php echo $sugdata['desc']; ?></label>
                                                                </div>
                                                            </div>

                                                            <?php } ?>


                                                            <div class="">
                                                                <label class="font-medium text-gray-700">Extra Suggestion:</label>
                                                                <p><?php echo $rdata['r_desc']; ?></p>
                                                                
                                                                <!-- <textarea id="sugtext" value="<?php //echo $rdata['r_desc']; ?>" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none text-sm" rows="4"></textarea>
              -->
                                                            </div>

                                                        </div>
                                                    </fieldset>

                                                </div>
                                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                                    <input type="button" value="Submit Report" id="submitreport" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" disabled>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                                <?php } ?>
                            </div>


                            <div class="hidden sm:block" aria-hidden="true">
                                <div class="py-5">
                                    <div class="border-t border-gray-200"></div>
                                </div>
                            </div>
                            <!-- <div class="mt-10 sm:mt-0">
                                <div class="md:grid md:grid-cols-1 md:gap-6">
                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <form action="#" method="POST">

                                        </form>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </main>

  
    <!-- Image Zoom -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/scripts/ezoom.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            ezoom.onInit($('#ecgimages img'), {
                hideControlBtn: false,
                onClose: function (result) {
                    console.log(result);
                },
                onRotate: function (result) {
                    console.log(result);
                },
            });

        });
    </script>
    <!-- Image Zoom -->



<?php
     include 'inc/footer.php';
?>