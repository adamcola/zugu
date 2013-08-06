<?php # mysql.inc.php
$dbc = @mysql_connect ('localhost', 'root', '');
if (!$dbc OR !mysql_select_db ('test')) {
  echo '<p class="error">The site is ruined.</p>';
  exit();
}
?> 

                         