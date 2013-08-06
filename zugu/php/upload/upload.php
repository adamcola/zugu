<table width="100%" height="100%" border="0">
  <tr>
    <td width="100%" height="100%" align="center" valign="middle"><div align="center">
      <?php 

//error_reporting(0);

 
 

$upl_path = ""; // Change this to the directory you wish the uploaded file(s) to be placed in.

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

                if($copy) { echo (""); }
                if(!$copy && $file_name != '') { echo ("<b>An error occoured while uploading the files!<br />\n"); }
        
        } // end foreach



} // end if (isset($_POST["bc_upload"])) {







?>
    </div></td>
  </tr>
</table>
