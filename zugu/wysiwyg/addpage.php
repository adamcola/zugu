<?php
	$fixed_root = "./";	// Security Feature
	
	$dir_root = $_GET['dir_root'];	// The place to begin the parse, relative to the fixed root.

	$dir_root = preg_replace ( "-(\.\./)*-", "", $dir_root );	// Just so no one sneaks any nasties in.

	$div_id = $_GET['div_id'];	// The ID of the enclosing <div>, <dt> or <dd> tag.
		
	$item_name = $_GET['item_name'];	// The name of the enclosing directory.
		
	$collapse = $_GET['collapse'];	// Set to 1 if the directory is open, and needs to be closed.
		
	$posix_root = $fixed_root.$dir_root;

	$item_count = 0;
		
	if (isset($_GET['action']) && isset($_GET['file'])) {
  if ($_GET['action'] == "delete") {
    unlink($_GET['file']);
	echo "<IMG SRC='images/recycle_orange_whiteoutline.gif' border='0'><meta http-equiv='refresh' content='2;url=addpage.php'>";
  }
} else {
  echo "" ;
}
 
	?>
	
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style6 {color: #FFFFFF; font-weight: bold; font-size: 14px; }
.style7 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style8 {
	font-family: Arial;
	font-size: xx-small;
}
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>

<body>
<table width="963" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="181" height="71" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="782" align="center" valign="middle" bgcolor="#FFFFFF"><script> 
function converturl() { 
document.go.url.value = document.go.url.value.replace( /\s/g, ""); 
var url = document.getElementsByName( "url")[0]; 
var fullurl = document.getElementsByName( "fullurl")[0]; 
fullurl.value = "addpage.php?page="+ url.value +".html"; 
//msg = document.go.url.value +".html, create this page by clicking save" 
//return confirm(msg); 
} 
</script> 

<form name= "go" onsubmit='converturl();location.href=fullurl.value;return false'> 
  <span class="style8"><FONT COLOR='#ff6600'>newpage: </FONT>  </span>
  <input name='url' type='text' /> <input name='fullurl' type='hidden' /> 
<input type='submit' value="Go" /> 
<a href="javascript:history.go(-1)" target="_self"><img src="images/back.gif" border="0" /></a>
</form></td>
  </tr>
  <tr>
    <td align="left" valign="top"><IFRAME SRC="seelinks.php" width="200" height="500" frameborder="0" scrolling="auto"></IFRAME></td>
    <td valign="top">
	
	
	<?php

// SRC: http://ca3.php.net/magic_quotes
//Prevent Magic Quotes from affecting scripts, regardless of server settings
//Make sure when reading file data,
//PHP doesn't "magically" mangle backslashes!
set_magic_quotes_runtime(FALSE);
if (get_magic_quotes_gpc()) {
    /*
    All these global variables are slash-encoded by default,
    because    magic_quotes_gpc is set by default!
    (And magic_quotes_gpc affects more than just $_GET, $_POST, and $_COOKIE)
    */
    $_SERVER = stripslashes_array($_SERVER);
    $_GET = stripslashes_array($_GET);
    $_POST = stripslashes_array($_POST);
    $_COOKIE = stripslashes_array($_COOKIE);
    $_FILES = stripslashes_array($_FILES);
    $_ENV = stripslashes_array($_ENV);
    $_REQUEST = stripslashes_array($_REQUEST);
    $HTTP_SERVER_VARS = stripslashes_array($HTTP_SERVER_VARS);
    $HTTP_GET_VARS = stripslashes_array($HTTP_GET_VARS);
    $HTTP_POST_VARS = stripslashes_array($HTTP_POST_VARS);
    $HTTP_COOKIE_VARS = stripslashes_array($HTTP_COOKIE_VARS);
    $HTTP_POST_FILES = stripslashes_array($HTTP_POST_FILES);
    $HTTP_ENV_VARS = stripslashes_array($HTTP_ENV_VARS);
    if (isset($_SESSION)) {    #These are unconfirmed (?)
        $_SESSION = stripslashes_array($_SESSION, '');
        $HTTP_SESSION_VARS = stripslashes_array($HTTP_SESSION_VARS, '');
    }
    /*
    The $GLOBALS array is also slash-encoded, but when all the above are
    changed, $GLOBALS is updated to reflect those changes.  (Therefore
    $GLOBALS should never be modified directly).  $GLOBALS also contains
    infinite recursion, so it's dangerous...
    */
}
function stripslashes_array($data) {
    if (is_array($data)){
        foreach ($data as $key => $value){
            $data[$key] = stripslashes_array($value);
        }
        return $data;
    }else{
        return stripslashes($data);
    }
}
//if(get_magic_quotes_gpc())   ///basically, everything in yellow is to see the if the shit is on or off and above is to take off the bulshit auto format they call magic quotes!!! ///
//	echo "Magic quotes are enabled";
//else
//	echo "Magic quotes are disabled";
	
//	echo "Removed Slashes: ";
// Remove those slashes

echo ("<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
    'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
<head>
  <title>Xinha Newbie Guide</title>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  
  <script type='text/javascript'>
    _editor_url  = 'xinha/'  // (preferably absolute) URL (including trailing slash) where Xinha is installed
    _editor_lang = 'en';      // And the language we need to use in the editor.
    _editor_skin = 'silva';   // If you want use skin, add the name here
  </script>
  <script type='text/javascript' src='xinha/XinhaLoader.js'></script>
  <script type='text/javascript' src='xinha/examples/XinhaConfig.js'>
 
</head>

<script type='text/javascript'>
function delayedRedirect(){
    window.location = 'addpage.php'
}
</script>
<BODY>
") ;

?>

<?php
 

// Get the page name from the query string
// Set $page to "home.txt" if a parameter isn't passed
  if ($_GET['page']) {
    $page = $_GET['page'] . '.html';
  } else {
    $page = 'test.html';
  }

// Check to see if file exists and include it in.
  if (file_exists("$page")) {
    include("$page");

  if (preg_match("/^(.*_page)(\d+)/", $page, $matches)) {
    $prev_page = $matches[2] - 1;
    $next_page = $matches[2] + 1;
    echo("<p style=\"text-align: center\">");

    if (file_exists("" . $matches[1] . $prev_page . ".html")) {
      echo("<a href=\"{$_SERVER['PHP_SELF']}" .
           "?page={$matches[1]}$prev_page\">Previous Page</a>");
      $prev = 1;
    }
    if (file_exists("" . $matches[1] . $next_page . ".html")) {
      if ($prev) {
        echo("&nbsp;&nbsp;&nbsp;");
      }
      echo("<a href=\"{$_SERVER['PHP_SELF']}" .
           "?page={$matches[1]}$next_page\">Next Page</a>");
    }
    echo("</p>");
  } 


// If page doesn't exist, give an error message.
  } else {
    echo("");
  }



?>


<?php



// Get the page name from the query string
$page = $_GET['page'] . '';

if (!$_GET['page']) {
  echo("");
  exit;
}

if ($_POST['page']) {
  $handle = fopen("$page", 'w');
  fwrite($handle, $_POST['page']);
  fclose($handle);
  include("$page");
  include("footer.html");
  exit;
} 

if (file_exists("$page")) {
  $FILE = fopen("$page", "rt");
  while (!feof($FILE)) {
    $text .= fgets($FILE);
  }
  fclose($FILE);
} else {
   echo("<small><small><FONT COLOR='#ff6600'>New Page: $page</font></small></small>\n");
  $text = "";
}



$page = $_GET['page'] . '.html';
$a = $_GET['page'];





$a = 1; //$_SERVER['PHP_SELF'];

$this_page = $_SERVER['PHP_SELF'];
$query_string = $_SERVER['QUERY_STRING'];
echo("<form method=\"post\" action=\"$this_page?$query_string\">\n"); //newbie and the new text           	//onclick=\"setTimeout('history.go(addpage.php);',3);\"
echo("<textarea id=\"page\" name=\"page\" rows=\"40%\" cols=\"100%\">\n"); //rows=5 cols=79 
echo(htmlspecialchars($text));
echo("</textarea>\n");
echo("<input type=\"image\" src=\"images/tick.gif\" onclick=\"submit\" value=\"Go\">\n"); //onclick=\"setTimeout('delayedRedirect()', 163);\"
echo("</form>\n"); 
echo("</body>\n"); 
echo("</html>\n"); 

?></td>
  </tr>
</table>
</body>
</html>
