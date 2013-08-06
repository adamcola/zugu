<?php


// Get the page name from the query string
$page = $_GET['page'] . '.html';

if (!$_GET['page']) {
  echo("");
  
  exit;
}

if ($_POST['page']) {
  $handle = fopen("$page", 'w');
  fwrite($handle, $_POST['page']);
  fclose($handle);
  include("$page");
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

echo "";

$page = $_GET['page'] . '.html';
$a = $_GET['page'];





$a = 1; //$_SERVER['PHP_SELF'];

$this_page = $_SERVER['PHP_SELF'];
$query_string = $_SERVER['QUERY_STRING'];
echo("<form method='post' action='$this_page?$query_string'>");
echo("<textarea id='page' name='page' rows=25 cols=80>");
echo(htmlspecialchars($text));
echo("</textarea><script language='JavaScript'>
  generate_wysiwyg('page');
</script>");
echo("<input type='submit' value='Save'>");
echo("</form>"); 


?> 