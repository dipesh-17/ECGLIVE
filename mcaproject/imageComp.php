
<?php
  ini_set('memory_limit', -1);
  function save_pdf($tmpFileName, $saveName){
    $res = move_uploaded_file($tmpFileName, 'Reports/PDF/'.$saveName);
    if($res){ return $saveName;} 
  }
?>