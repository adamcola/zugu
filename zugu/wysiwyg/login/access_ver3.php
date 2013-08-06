<?php 
session_start();
if(!isset($_SESSION['username']) || !isset($_SESSION['sid']) ||!isset($_SESSION['ip'])) {
	header("Location: login.php");
	exit;
}
echo "<FONT COLOR=#ffffff>Welcome, " . $_SESSION['username'] . "</FONT><br>";
echo "<FONT COLOR=#ffffff>You are logged in.</FONT>";
?>

<HTML><HEAD><script type="text/javascript" src="../gradualfader.js"></script><style type="text/css">
<!--
body {
	background-image: url(http://www.showroom.me.uk/imp/bg.png);
	background-repeat: repeat-x;
	margin-top: 0px;
}
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
}
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #FFFFFF; }
.style4 {color: #CBCB2E}

a{text-decoration:none}

body{
	background-image:url(bg.png);
	background-attachment:fixed;
	background-repeat: repeat-x;
}
.style6 {color: #FFFFFF; font-weight: bold; font-size: 14px; }
.style7 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style8 {
	color: #FFFFFF;
	font-size: 9px;
}
.style9 {color: #1C1D77}


-->
</style>
<!-- ONE STEP TO INSTALL PAGE VIEWED DATE:

   1.  Paste the coding into the BODY of your HTML document  -->

<!-- STEP ONE: Copy this code into the BODY of your HTML document  -->

<BODY>

<CENTER>
<SCRIPT LANGUAGE="JavaScript">

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
var now = new Date();
document.write("<BR><CENTER><FONT COLOR=800000>");
document.write("<B>Page viewed at: </B></FONT> <B>"+now+"</B><BR>");
// End -->
</SCRIPT>
</CENTER>

<p><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">



<title>Institute of Place Management</title>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<body bgcolor="#00125c">
<table width="152" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="572" height="67" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="155" height="67" background="logo.gif">&nbsp;</td>
        <td width="417" background="head.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="573" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="4" bgcolor="#cbcb2e"></td>
        <td height="4" valign="top" bgcolor="#cbcb2e"></td>
      </tr>
      <tr>
        <td width="50" height="20" valign="top"><table width="113" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150" height="29" background="bluebuts.gif"><span class="style1">&nbsp;<span class="style2"><A HREF="main.php">Micro Site</A></span></span></td>
            </tr>
            <tr>
              <td><div style="width: 113px; height: 20px; border: 0px solid gray; background: #bebfdd" class="gradualfader"> <span class="style1"><a href="stage1.php"><font color="#000000"><B>&nbsp;Stage 1 </B></font></a></span></div></td>
            </tr>
            <tr>
              <td><div style="width: 113px; height: 20px; border: 0px solid gray; background: #bebfdd" class="gradualfader"> <span class="style1"><a href="stage2.php"><font color="#000000"><B>&nbsp;Stage 2 </B></font></a></span></div></td>
            </tr>
            <tr>
              <td><div style="width: 113px; height: 20px; border: 0px solid gray; background: #bebfdd" class="gradualfader"> <span class="style1"><a href="stage3.php"><font color="#000000"><B>&nbsp;Stage 3 </B></font></a></span></div></td>
            </tr>
            <tr>
              <td><div style="width: 113px; height: 20px; border: 0px solid gray; background: #bebfdd" class="gradualfader"> <span class="style1"><a href="stage4.php"><font color="#000000"><B>&nbsp;Stage 4 </B></font></a></span></div></td>
            </tr>
            <tr>
              <td><div style="width: 113px; height: 20px; border: 0px solid gray; background: #bebfdd" class="gradualfader"> <span class="style1"><a href="stage5.php"><font color="#000000"><B>&nbsp;Stage 5 </B></font></a></span></div></td>
            </tr>
            <tr>
              <td><div style="width: 113px; height: 20px; border: 0px solid gray; background: #bebfdd" class="gradualfader"> <span class="style1"><a href="stage6.php"><font color="#000000"><B>&nbsp;Stage 6 </B></font></a></span></div></td>
            </tr>
            <tr>
              <td><div style="width: 113px; height: 20px; border: 0px solid gray; background: #bebfdd" class="gradualfader"> <span class="style1"><a href="stage7.php"><font color="#000000"><B>&nbsp;Stage 7 </B></font></a></span></div></td>
            </tr>
            <tr>
              <td><div style="width: 113px; height: 20px; border: 0px solid gray; background: #bebfdd" class="gradualfader"> <span class="style1"><a href="stage8.php"><font color="#000000"><B>&nbsp;Stage 8 </B></font></a></span></div></td>
            </tr>
            <tr>
              <td><div style="width: 113px; height: 20px; border: 0px solid gray; background: #bebfdd" class="gradualfader"> <span class="style1"><a href="stage9.php"><font color="#000000"><B>&nbsp;Stage 9 </B></font></a></span></div></td>
            </tr>
            <tr>
              <td><div style="width: 113px; height: 20px; border: 0px solid gray; background: #bebfdd" class="gradualfader"> <span class="style1"><a href="stage10.php"><font color="#000000"><B>&nbsp;Stage 10 </B></font></a></span></div></td>
            </tr>
            <tr>
              <td height="40" background="bluebutl.gif"><span class="style6">&nbsp;<span class="style7">Help</span></span></td>
            </tr>
            <tr>
              <td><div style="width: 113px; height: 20px; border: 0px solid gray; background: #bebfdd" class="gradualfader"> <span class="style1"><a href="http://sleepcatcher.co.uk/ipm/microsite/newbie.php?page=how"><font color="#000000"><B>&nbsp;Using this site </B></font></a></span></div></td>
            </tr>
            <tr>
              <td><div style="width: 113px; height: 20px; border: 0px solid gray; background: #bebfdd" class="gradualfader"> <span class="style1"><a href="../index.php"><font color="#000000"><B>&nbsp;Log out </B></font></a></span></div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
        </table></td>
        <td width="482" height="83" align="left" valign="top" bgcolor="#FFFFFF">
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top" bgcolor="#000000"><div align="right" class="style3"><span class="style4">Where am I?</span> <a href="javascript:self.close();"><FONT COLOR="#FFFFFF"">HOME</FONT></a>&nbsp;</div></td>
              </tr>
              <tr>
                <td><?php include dbinclude; ?>
                  <p class="style1">&nbsp;</p>
                <p class="style1">&nbsp;</p>
                <p class="style1">&nbsp;</p>
                <p class="style1">&nbsp;</p>
                <p class="style1">&nbsp; </p></td>
              </tr>
            </table>
           
          </td>
      </tr>
    </table></td>
  </tr>
</table><BR>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-485197-13";
urchinTracker();
</script>
<div id="footer">
  <div class="style8" id="footerownertext">
    <div align="center">
      &copy; design and architecture copyright MyKnowledgeMap - &copy; content copyright Institute of Place Management<BR>
    <span class="style9">.    </span></div>
  </div>
  <div id="footerimage"> 
    <div align="center"><a href="http://www.mmu.ac.uk/" target="_blank"><img src="http://www.placemanagement.org/files/footerimage/mmu_logo.jpg" alt="Manchester Metropolitan University" border="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><img src="http://www.placemanagement.org/files/footerimage/agora.gif" alt="AGORA" border="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.esf.gov.uk" target="_blank"><img src="http://www.placemanagement.org/files/footerimage/esf_new.gif" alt="European Social Fund" border="0"></a><a href="http://www.equal.ecotec.co.uk/" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="http://www.placemanagement.org/files/footerimage/equal_logo.gif" alt="Equal" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.atcm.org/" target="_blank"><img src="http://www.placemanagement.org/files/footerimage/atcm_logo.jpg" alt="Association of Town Centre Managers" border="0"></a> </div>
  </div>
</div>
</body><script type="text/javascript">
gradualFader.init() //activate gradual fader
</script>
</html>
<center>
<font face="arial, helvetica" size="-2">Frefdsided<br>
by <a href="http://javascriptsource.com">The fdsrce</a></font>
</center><p>

<!-- Script Size:  0.60 KB  -->
</HEAD><BODY></BODY></HTML>