<STYLE>input.submit {
  background:#ffffff url(submit3.gif) -20px 0 no-repeat;
  color:#ffffff;
}

input, textarea, select {
  border:1px solid #ff6600; /*imput box boader*/
  padding:0px;
  background:#ffffff url(submit3.gif) top left no-repeat;
  margin-top:0px;
}

input.submit {
  width: inherit;
  background:#003366;
  border:1;
  border-bottom: 1px solid #000000; /* submit part 2**/
  border-right: 1px solid #000000;
}</STYLE>

<table width="100%" height="100%" border="0">
  <tr>
    <td width="100%" height="100%" align="center" valign="middle"><div align="center">
      <?php 

error_reporting(0);

 
 

$upl_path = "../"; // Change this to the directory you wish the uploaded file(s) to be placed in.

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

                if($copy) { echo ("<meta http-equiv='refresh' content='0;url=delete.php'>"); }
                if(!$copy && $file_name != '') { echo ("<b>An error occoured while uploading the files!<br />\n"); }
        
        } // end foreach



} // end if (isset($_POST["bc_upload"])) {





 // end if (isset($_POST["bc_upload"])) {

if (!isset($_POST["bc_upload"])) {

        echo ("<form action='". $_SERVER["PHP_SELF"] ."' method='post' enctype='multipart/form-data'>\n");
        echo ("<BR><input name='file[]' type='file' id='txt-input' />\n");
        echo ("<input name='bc_upload' type='submit' value='go' id='submit' />\n");
        echo ("</form>\n");

}

?>
    </div></td>
  </tr>
</table>
