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
  <script type='text/javascript' src='xinha/examples/XinhaConfig.js'></script>
</head>
<body>") ;

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
        echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
      }
      echo("<a href=\"{$_SERVER['PHP_SELF']}" .
           "?page={$matches[1]}$next_page\">Next Page</a>");
    }
    echo("</p>");
  } 


// If page doesn't exist, give an error message.
  } else {
    echo("<h1 align=\"center\">Page cannot be found</h1>\n");
  }



?>


<?php

// Get the page name from the query string
$page = $_GET['page'] . '.html';

if (!$_GET['page']) {
  echo("<h1>Page name not specified</h1>\n");
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
   echo("<h1>New Page: $page</h1>\n");
  $text = "<p></p>";
}



$page = $_GET['page'] . '.html';
$a = $_GET['page'];





$a = 1; //$_SERVER['PHP_SELF'];

$this_page = $_SERVER['PHP_SELF'];
$query_string = $_SERVER['QUERY_STRING'];
echo("<form method=\"post\" action=\"$this_page?$query_string\">\n"); //newbie and the new text
echo("<textarea id=\"page\" name=\"page\" rows=30 cols=55>\n"); //rows=25 cols=80
echo(htmlspecialchars($text));
echo("</textarea>\n");
echo("<input type=\"submit\" value=\"Save\">\n");
echo("</form>\n"); 
echo("</body>\n"); 
echo("</html>\n"); 

?>