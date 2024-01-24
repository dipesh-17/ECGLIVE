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
                <div id="main" class="main-content flex-1 bg-gray-100 mt-0 md:mt-2 pb-24 md:pb-5 ">

                    <div class="bg-gray-800">
                        <div class="bg-gradient-to-r from-blue-900 to-gray-800 p-4 md:p-4 shadow text-2xl text-white">
                            <h6 class="font-normal pl-2 text-base">My Activity</h6>
                        </div>
                    </div>
                    <div class="flex flex-row flex-wrap flex-grow mt-2 ">
                        <div class="w-full p-2 max-w-4xl m-auto">
                            <!--Table Card-->
                            <?php
                                $dtid=2;
                                $sql = "SELECT * from qwert_ecgs WHERE assign_dt='$dtid' AND status='Reviewed' ORDER BY create_date DESC";
                                $result = mysqli_query($conn, $sql);                                
                            ?>

                            <div id='recipients' class="p-1 lg:mt-0 rounded shadow bg-white">
                                <table id="example" class="stripe hover"
                                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">ID</th>
                                            <th data-priority="2">Test</th>
                                            <th data-priority="3">Date</th>
                                            <th data-priority="4">Action</th>
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
                                            <td class="flex text-center"><a href="view_activity.php?ecgid=<?php echo $rows['ecgid'];?>" class="mx-auto"><i class="fa fa-eye"></i></a> </td>

                                        </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--TableCard-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function () {

            var table = $('#example').DataTable({
                responsive: true
            })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>


<?php
    include 'inc/footer.php';
?>