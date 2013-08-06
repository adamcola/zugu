<?php 
// login2.php

// Start a session. Session is explained below.
session_start();
include("connection.php");

// Same checking stuff all over again.
if(isset($_POST['submit'])) {
	if(empty($_POST['username']) || empty($_POST['password'])) {
		echo "<table width='100%' height='600' border='0'>
  <tr>
    <td align='center' valign='middle'><table width='76' border='0'>
      <tr>
        <td width='42'><a href='login.php'><font color='#FFFFFF'><img src='../../icons_and_zip_files/backmediumdark.gif' title='back' border='0'></font></a></td>
        <td width='51'><a href='http://www.mozilla.com/en-US/firefox/'><a href='mailto:d.chipchase@mmu.ac.uk'><img src='../../icons_and_zip_files/maildarkmedium.gif' title='mail dan to register' border='0'></a></td>
      </tr>
    </table>
        <BR>
        <table width='273' height='146' border='0' >
          <tr>
            <td width='263' height='140' align='center' valign='top' style='background-image: url(../../icons_and_zip_files/boxs.gif); background-repeat: no-repeat;'><form method='post' action='login2.php'>
                <label for='username'></label>
               
                <a href='login.php'><img src='../../icons_and_zip_files/submit3.gif' width='50' height='69' border='0'></a><br><br>
                <font size='1'><FONT COLOR='#FFFFFF'></font><br>
              <br>
            </form></td>
          </tr>
      </table></td>
  </tr>
</table>
";
		header("Location: login.php");
		exit;
	}
	// Create the variables again.
	$username = $_POST['username'];
	$password = $_POST['password'];
	// Encrypt the password again with the md5 hash. 
	// This way the password is now the same as the password inside the database.
	$password = md5($password);
	
	// Store the SQL query inside a variable. 
	// ONLY the username you have filled in is retrieved from the database.
	$query = "SELECT username,password 
			  FROM	 `users`
			  WHERE	 username='$username'";
	
	$result = mysql_query($query);
	if(!$result) { 
		// Gives an error if the username given does not exist.
		// or if something else is wrong.
		echo "The query failed " . mysql_error();
	} else {
		// Now create an object from the data you've retrieved.
		$row = mysql_fetch_object($result);
		// You've now created an object containing the data.
		// You can call data by using -> after $row.
		// For example now the password is checked if they're equal.
		if($row->password != $password) {
			echo "<table width='100%' height='600' border='0'>
  <tr>
    <td align='center' valign='middle'><table width='76' border='0'>
      <tr>
        <td width='42'><a href='login.php'><font color='#FFFFFF'><img src='../../icons_and_zip_files/backmediumdark.gif' title='back' border='0'></font></a></td>
        <td width='51'><a href='http://www.mozilla.com/en-US/firefox/'><a href='mailto:d.chipchase@mmu.ac.uk'><img src='../../icons_and_zip_files/maildarkmedium.gif' title='mail dan to register' border='0'></a></td>
      </tr>
    </table>
        <BR>
        <table width='273' height='146' border='0' >
          <tr>
            <td width='263' height='140' align='center' valign='top' style='background-image: url(../../icons_and_zip_files/boxs.gif); background-repeat: no-repeat;'><form method='post' action='login2.php'>
                <label for='username'></label>
               
                <a href='login.php'><img src='../../icons_and_zip_files/submit3.gif' width='50' height='69' border='0'></a><br>
                <br>
                <font size='1'><FONT COLOR='#FFFFFF'></font><br>
              <br>
            </form></td>
          </tr>
      </table></td>
  </tr>
</table>
";
			header("Location: login.php");
			exit;
		}
		// By storing data inside the $_SESSION superglobal,
		// you stay logged in until you close your browser.
		$_SESSION['username'] = $username;
		$_SESSION['sid'] = session_id(); 
		// Make it more secure by storing the user's IP address.
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		// Now give the success message.
		// $_SESSION['username'] should print out your username.
		echo "<meta http-equiv='refresh' content='0;url=access_nav.php'>" . $_SESSION['username'];
		echo "<a href='access_nav.php'><table width='100%' height='100%' border='0'>
  <tr>
    <td align='center' valign='middle'><img src='../../icons_and_zip_files/key.gif' width='179' height='175' border='0'/></td>
  </tr>
</table></a>";
	}
}
?>
