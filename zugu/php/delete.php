<?php
   if (isset($_GET['action']) && isset($_GET['file'])) {
  if ($_GET['action'] == "delete") {
    unlink($_GET['file']);
  }
} else {
  echo "" ;
}
?>

<!--
  
   ?file=devil.png&action=delete  //link to delete item
   
   -->



