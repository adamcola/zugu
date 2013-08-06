<?php 

error_reporting(0);

 echo ("<style type='text/css' media='all'>@import 'style.css';body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style> \n");
 

$upl_path = "img"; // Change this to the directory you wish the uploaded file(s) to be placed in.

if (isset($_POST["bc_upload"])) {

$files = $_FILES['file'];

foreach ($files['name'] as $idx=>$file)
        {

                $file_name = $files['name'][$idx];
                $file_name = strtolower($file_name);
                $file_name = preg_replace('/[^a-z0-9_.]/i', '', $file_name);
                $file_size= intval($files['size'][$idx]);
                $tmp_file = $files['tmp_name'][$idx];

                $copy = copy($tmp_file,$upl_path.$file_name);

                if($copy) { echo ("image<br />\n"); }
                if(!$copy && $file_name != '') { echo ("<b>An error occoured while uploading the files!<br />\n"); }
        
        } // end foreach

        echo ("<a href='". $_SERVER["PHP_SELF"] ."'>Continue...</a>");

} // end if (isset($_POST["bc_upload"])) {



if (!isset($_POST["bc_upload"])) {
    
}
 
?>