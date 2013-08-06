<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Insert Image</title>

<script type="text/javascript" src="../../popups/popup.js"></script>
<link rel="stylesheet" type="text/css" href="../../popups/popup.css" />

<script type="text/javascript">
    //<![CDATA[
      function init() {
	document.getElementById('file_upload_form').onsubmit=function() {
                                  //'upload_target' is the name of the iframe
	  document.getElementById('file_upload_form').target = 'upload_target'; 
	  }
  }
  window.onload=init;
    //]]>
    </script>

<script type="text/javascript">


Xinha = window.opener.Xinha;
function i18n(str) {
  return (Xinha._lc(str, 'Xinha'));
}

function Init() {
  __dlg_translate('Xinha');
  __dlg_init(null,{width:410,height:400});
  // Make sure the translated string appears in the drop down. (for gecko)
  document.getElementById("f_align").selectedIndex = 1;
  document.getElementById("f_align").selectedIndex = 5;
  var param = window.dialogArguments;
  if (param["f_base"]) {
      document.getElementById("f_base").value = param["f_base"];
  }
  document.getElementById("f_url").value    = param["f_url"] ? param["f_url"] : "";
  document.getElementById("f_alt").value    = param["f_alt"] ? param["f_alt"] : "";
  document.getElementById("f_border").value = (typeof param["f_border"]!="undefined") ? param["f_border"] : "";
  document.getElementById("f_align").value  = param["f_align"] ? param["f_align"] : "";
  document.getElementById("f_vert").value   = (typeof param["f_vert"]!="undefined") ? param["f_vert"] : "";
  document.getElementById("f_horiz").value  = (typeof param["f_horiz"]!="undefined") ? param["f_horiz"] : "";
  if (param["f_url"]) {
      window.ipreview.location.replace(Xinha._resolveRelativeUrl(param.f_base, param.f_url));
  }
  document.getElementById("f_url").focus();
}

function onOK() {
  var required = {
    "f_url": i18n("You must enter the URL")
  };
  for (var i in required) {
    var el = document.getElementById(i);
    if (!el.value) {
      alert(required[i]);
      el.focus();
      return false;
    }
  }
  // pass data back to the calling window
  var fields = ["f_url", "f_alt", "f_align", "f_border",
                "f_horiz", "f_vert"];
  var param = new Object();
  for (var i in fields) {
    var id = fields[i];
    var el = document.getElementById(id);
    param[id] = el.value;
  }
  __dlg_close(param);
  return false;
}

function onCancel() {
  __dlg_close(null);
  return false;
}

function onPreview() {
  var f_url = document.getElementById("f_url");
  var url = f_url.value;
  var base = document.getElementById("f_base").value;
  if (!url) {
    alert(i18n("You must enter the URL"));
    f_url.focus();
    return false;
  }
  window.ipreview.location.replace(Xinha._resolveRelativeUrl(base, url));
  return false;
}
</script>

</head>

<body class="dialog" onload="Init()">

<div class="title"><?php 

error_reporting(0);

 echo ("<style type='text/css' media='all'>@import 'style.css';body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style> \n");
 

$upl_path = "../../../images/"; // Change this to the directory you wish the uploaded file(s) to be placed in.

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



} // end if (isset($_POST["bc_upload"])) {





 // end if (isset($_POST["bc_upload"])) {

if (!isset($_POST["bc_upload"])) {

        echo ("<form action='". $_SERVER["PHP_SELF"] ."' method='post' enctype='multipart/form-data'>\n");
        echo ("<input name='file[]' type='file' id='txt-input' />\n");
        echo ("<input name='bc_upload' type='submit' value='go' id='submit' />\n");
        echo ("</form>\n");

}

?>
  <!-- <form id="file_upload_form" method="post" enctype="multipart/form-data" action="file_upload.php"> 
  <input name='file[]' type='file' size='3' id='txt-input'>
      
      <input name='bc_upload' type='submit' value='Go' id='submit' />
      </form> -->
</div>
<!--- new stuff --->
<form action="" method="get">
<input type="hidden" name="base" id="f_base"/>
<table border="0" width="100%" style="padding: 0px; margin: 0px">
  <tbody>
  <tr>
    <td style="width: 7em; text-align: right">Image URL:</td>
    <td><?php

	$fixed_root = "../../../images/";	// Security Feature
	
	$dir_root = $_GET['dir_root'];	// The place to begin the parse, relative to the fixed root.

	$dir_root = preg_replace ( "-(\.\./)*-", "", $dir_root );	// Just so no one sneaks any nasties in.

	$div_id = $_GET['div_id'];	// The ID of the enclosing <div>, <dt> or <dd> tag.
		
	$item_name = $_GET['item_name'];	// The name of the enclosing directory.
		
	$collapse = $_GET['collapse'];	// Set to 1 if the directory is open, and needs to be closed.
		
	$posix_root = $fixed_root.$dir_root;

	$item_count = 0;
	
	
 	if ( is_dir ( $posix_root ) )
 		{
 		// Make sure that it is a directory.
		if ( $dh = opendir ( $posix_root ) )
			{
			rewinddir ( $dh );
			// If we will be displaying it closed, we use one class. These are for the main definition term element (<dt>).
			if ( $collapse )
				{
				$collapse = "";
				$d_class = "dt_class_dir_closed";
				}
			else	// If open, we use another.
				{
				$collapse = 1;
				$d_class = "dt_class_dir_open";
				}
			
			// A directory is always displayed as a definition list, even if there is only one element (closed directory).
			echo "<form id='form1' name='form1' method='post' action=''>
<select name='url' id='f_url'><dl class=\'dl_class_dir_tree\'>
<dt class=\'$d_class\'>";
			// If we have an item that rates a link.
			if ( $item_name )
				{
				echo "<option value='1'><a href='javascript:callout('collapse=$collapse&amp;dir_root='.urlencode($dir_root).'&amp;div_id=$div_id&amp;item_name='.urlencode($item_name).'', '$div_id')\' class=\''";
				
				// Again, we assign different classes, based upon the "open" or "closed" state of the directory. These are for the links.
				if ( $collapse )
					{
					echo "a_class_dir_link_open";
					}
				else
					{
					echo "a_class_dir_link_closed";
					}
				
				echo "\">".htmlspecialchars ( $item_name )."</a></dt></option>\n";
				}
			
			// If the directory is open, we list its contents here.
			while ( $collapse && ($item = readdir ( $dh )) )
				{
				if ( !preg_match ( "/^\./", $item ) )
					{
					$this_div = $div_id."_".$item_count;
					$item_count++;
					$viable_link = true;
					// We check to see if nested subdirectories have contents (they can be opened, if so).
					if ( is_dir ( $posix_root."/".$item ) )
						{
						$viable_link = false;
						if ( $dh2 = opendir ( $posix_root."/".$item ) )
							{
							rewinddir ( $dh2 );
							while ( $item2 = readdir ( $dh2 ) )
								{
								if ( !preg_match ( "/^\./", $item2 ) )
									{
									$viable_link = true;
									break;
									}
								}
							closedir ( $dh2 );
							}
						}
					
					// Nested contents are always in <dd> tags.
					echo "<dd id=\"$this_div\"";
					if ( is_dir ( $posix_root."/".$item ) )	// If it is a directory, then we allow an AJAX call to open it.
						{
						if ( $viable_link )	// If the directory contains files or subdirectories, it can be opened.
							{
							echo " class=\"dd_class_dir_closed\">";
							echo "<option value='2'><a class=\"a_class_dir_link_closed\" href=\"javascript:callout('dir_root=".urlencode($dir_root."/".$item)."&amp;div_id=$this_div&amp;item_name=".urlencode($item)."', '$this_div')\">";
							}
						else	// If not, it is "dead."
							{
							echo " class=\"dd_class_dir_empty\">";
							}
						}
					else	// If it is a file, then we just provide a URI to that file.
						{
						echo " class=\'dd_class_file\'>";
					echo "</OPTION><option value='images/$item'><a class=\'a_class_file_link\' href=\''.htmlspecialchars($posix_root.'/'.$item).'\'>"; //relative
						}
					
					echo $item;
					
					if ( $viable_link )
						{
						echo "</a>";
						}
					echo "</dd>\n";
					}
				}
			closedir ( $dh );
			}
		echo "</dl></OPTION></SELECT>\n";
		}
?>
      <button name="preview" onclick="return onPreview();"
      title="Preview the image in a new window">Preview</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="../../../images/seepics/delete.php" target="_blank">view folder</a>  </td>
  </tr>
  <tr>
    <td style="width: 7em; text-align: right">Alternate text:</td>
    <td><input type="text" name="alt" id="f_alt" style="width:100%"
      title="For browsers that don't support images" /></td>
  </tr>
  </tbody>
</table>

<fieldset style="float: left; margin-left: 5px;">
<legend>Layout</legend>

<div class="space"></div>

<div class="fl">Alignment:</div>
<select size="1" name="align" id="f_align"
  title="Positioning of this image">
  <option value=""                             >Not set</option>
  <option value="left"                         >Left</option>
  <option value="right"                        >Right</option>
  <option value="texttop"                      >Texttop</option>
  <option value="absmiddle"                    >Absmiddle</option>
  <option value="baseline" selected="selected" >Baseline</option>
  <option value="absbottom"                    >Absbottom</option>
  <option value="bottom"                       >Bottom</option>
  <option value="middle"                       >Middle</option>
  <option value="top"                          >Top</option>
</select>

<br />

<div class="fl">Border thickness:</div>
<input type="text" name="border" id="f_border" size="5"
title="Leave empty for no border" />

<div class="space"></div>

</fieldset>

<fieldset>
<legend>Spacing</legend>

<div class="space"></div>

<div class="fr">Horizontal:</div>
<input type="text" name="horiz" id="f_horiz" size="5"
title="Horizontal padding" />

<br />

<div class="fr">Vertical:</div>
<input type="text" name="vert" id="f_vert" size="5"
title="Vertical padding" />

<div class="space"></div>

</fieldset>
<div class="space" style="clear:all"></div>
<div>
Image Preview:<br />
    <iframe name="ipreview" id="ipreview" frameborder="0" style="border : 1px solid gray;" 
	height="200" width="100%" src="../../popups/blank.html"></iframe>
</div>
<div id="buttons">
<button type="submit" name="ok" onclick="return onOK();">OK</button>
<button type="button" name="cancel" onclick="return onCancel();">Cancel</button>
</div>
</form>
</body>
</html>