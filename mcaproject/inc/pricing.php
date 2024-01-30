      <div class="row bnm">
      <u><h2 class="section-title pb-2">Plans</h2></u>
 
        <div class="col-lg-4 col-md-6 col-sm-6 mb-4 pcardw">
          <div class=" pcard h-100 card_bs">
            <div class=" pcard-body">
              <div class="text-center p-3">
                <h5 class=" pcard-title">Basic</h5>              
             
                <span class="h2">₹19</span>/Report
                
              </div>
              <p class=" pcard-text text-center" >Pay for the single report </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
              </svg> 1 ECG Review & Advice</li>
              <!-- <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
              </svg> Free Cunsaltation</li> -->
              <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
              </svg>Report PDF</li>
              <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
              </svg>Review in 15 Min</li>
            </ul>
            <div class=" pcard-body text-center">
            <form>
                <?php 
                    if (!isset($_SESSION["fname"]) || !isset($_SESSION['userid'])) {
                ?>
                    <input type="button" class="btn btn-outline-warning btn-md" style="border-radius:30px" name="btn" id="btn" value="Buy Now" onclick="loginplease()"/>
                <?php
                    }else{
                ?>
                <input type="button" class="btn btn-outline-warning btn-md" style="border-radius:30px" name="btn" id="btn" value="Buy Now" onclick="pay_now(19,19)"/>
                <?php
                    }  
                ?>
            </form>


              <!-- <button class="btn btn-outline-warning btn-md" style="border-radius:30px" >Buy Now</button> -->
            </div>
          </div>
        </div>
			 <div class="col-lg-4 col-md-6 col-sm-6 mb-4 pcardw">
          <div class=" pcard h-100 card_bs">
            <div class=" pcard-body">
              <div class="text-center p-3">
                <h5 class=" pcard-title">Standard</h5>              
             
                <span class="h2">₹199</span>/Year 
                
              </div>
              <p class=" pcard-text text-center">Yearly Plan with 12 ECG Reviews</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> 12 ECG Review & Advice</li>
                <!-- <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> Free Cunsaltation</li> -->
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg>Report PDF</li>
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg>Review in 15 Min</li>
            </ul>
            <div class=" pcard-body text-center"> 
              <form>
                <?php 
                    if (!isset($_SESSION["fname"]) || !isset($_SESSION['userid'])) {
                ?>
                    <input type="button" class="btn btn-outline-warning btn-md" style="border-radius:30px" name="btn" id="btn" value="Buy Now" onclick="loginplease()"/>
                <?php
                    }else{
                ?>
                <input type="button" class="btn btn-outline-warning btn-md" style="border-radius:30px" name="btn" id="btn" value="Buy Now" onclick="pay_now(199,199)"/>
                <?php
                    }  
                ?>
              </form>             
              <!-- <button class="btn btn-outline-warning btn-md" style="border-radius:30px">Buy Now</button> -->
            </div>
          </div>
        </div>

      </div>  
<script>
function loginplease(){
    window.location.replace("login.php");
}
</script>   
