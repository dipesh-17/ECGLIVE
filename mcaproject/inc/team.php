<?php
  $sql = "SELECT * from qwert_doctors";
  $result = mysqli_query($conn, $sql); 

?>
<div class="team">
    <div class="container">
        <h2 class="section-title">Our Experts Team</h2>
        <div class="media-scroller">
            <?php
                if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
            ?>                  
            <div class="a-box">
                <div class="img-container">
                    <div class="img-inner">
                        <div class="inner-skew">
                            <img src="https://ecglive.com/assets/team/<?php echo $rows['profile-pic']; ?> " width="100%" height="100%">
                        </div>
                    </div>
                </div>
                <div class="text-container">
                <p class="name">Dr. <?php echo $rows['fname']; ?> <?php echo $rows['lname']; ?></p>

                <p class="qf"><?php echo $rows['qualification']; ?> (<?php echo $rows['spe']; ?>)</p>
                </div>
            </div> 
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>