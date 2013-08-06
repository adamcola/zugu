<?php 
session_start();
if(!isset($_SESSION['username']) || !isset($_SESSION['sid']) ||!isset($_SESSION['ip'])) {
	header("Location: login.php");
	exit;
}


?>

<HTML><HEAD><script type="text/javascript" src="../gradualfader.js"></script><style type="text/css">
<!--
body {
    background-image: url();
	background-repeat: repeat-x;
	margin-top: 0px;
}
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #FFFFFF; }
.style4 {color: #CBCB2E}

a{text-decoration:none}

body{
	background-image:url();
	background-attachment:fixed;
	background-repeat: repeat;
	margin-left: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style6 {color: #FFFFFF; font-weight: bold; font-size: 14px; }
.style7 {font-family: Verdana, Arial, Helvetica, sans-serif}


-->
</style>
<!-- ONE STEP TO INSTALL PAGE VIEWED DATE:

   1.  Paste the coding into the BODY of your HTML document  -->

<!-- STEP ONE: Copy this code into the BODY of your HTML document  -->

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><BODY>

<CENTER>
<SCRIPT LANGUAGE="JavaScript">

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
//var now = new Date();
//document.write("<BR><CENTER><FONT COLOR=800000>");
//document.write("<B>Page viewed at: </B></FONT> <B>"+now+"</B><BR>");
// End -->
</SCRIPT>







<BODY bgcolor="#FF6600">
<table width="152" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td><table width="573" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="4" bgcolor="#cbcb2e"></td>
        <td height="4" valign="top" bgcolor="#cbcb2e"></td>
      </tr>
      <tr>
        <td width="50" height="20" valign="top"><?php include dbinclude2; ?></td>
        <td width="482" height="83" align="left" valign="top" bgcolor="#FFFFFF">
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top" bgcolor="#000000"><div align="right" class="style3"><span class="style4">Where am I?</span> <a href="javascript:self.close();"><FONT COLOR="#FFFFFF"">HOME</FONT></a>&nbsp;</div></td>
              </tr>
              <tr>
                <td><?php include dbinclude; ?>
                 
            </td>
              </tr>
            </table>
           
          </td>
      </tr>
    </table></td>
  </tr>
</table>


   
 
</body><script type="text/javascript">
gradualFader.init() //activate gradual fader
</script>
</html>


</HEAD><BODY></BODY></HTML>