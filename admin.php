<?php

session_start();

///// Include all functions /////

require_once 'functions.inc.php';

///// Login and Logout functions ///////

if (isset($_GET['logout']))logout('loginidadmin2121');

authorize('loginidadmin2121');

/////////////////////////////////
?>
<html>
<head>

<title>MiniUrlz 1.5 - administrator panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="admin.css" rel="stylesheet">
</head>
<body>

<table border="0"  cellpadding="5" width="790" class="maintable">
    <tr>
        <td align="right" colspan="2">
          <div id="navcontainer">
          <ul id="navlist">
            <li><a href="?manage=1">Manage</a></li>
            <li><a href="?configure=1">Configure</a></li>
            <li><a href="?logout=1">Logout</a></li>
          </ul>
          </div>
        </td>
    </tr>
    <tr>
        <td align="right" width="15%" class="head"><img src="yellow.gif" width="8" height="8"> System info: </td>
        <td id="sysinfo" width="85%" bgcolor="#6b96e7">
<?php
if (isset($_POST['delete'])) {
  echo delete($_POST['id']);
} elseif (isset($_POST['save'])) {
  echo save($_POST['id'],$_POST['urlf']);
} elseif (isset($_POST['add'])) {
  echo addlinkmain($_POST['url']);
} elseif (isset($_POST['saveconfig'])) {
  include("conf.inc.php");
  echo (update_config($_POST['conf'], $conf)) ? "Configuration have been saved!" : "Some error occured. Please check your CHMOD!";
} else {
  echo "System ready!";
}
?>
        </td>
    </tr>
<?php if (!isset($_GET['configure'])): ?>
    <tr>
        <td align="right" class="head"><img src="yellow.gif" width="8" height="8"> New Url:</td>
        <form method="POST">
        <td class="tablea">
	<P class="submit">
	Url: <input type="text" size="113" name="url" id="url">
        <input type="submit" name="add" value="Add" />
	</P>
        </td>
        </form>
    </tr>
<?php endif; ?>
    <tr>
        <td colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
        <td id="mainarea" colspan="2" align="center">

<?php if (isset($_GET['configure'])): ?>
<?php include("conf.inc.php"); ?>
  <form method="post">
  <table border="0" cellpadding="5">
    <tr class="head">
      <td colspan="2"><img src="yellow.gif" width="8" height="8"> Change login details:</td>
    </tr>
    <tr>
      <td>New login:</td>
      <td>
        <input type="text" size="20" name="conf[adm_user]" value="<?php echo $conf["adm_user"]; ?>">
      </td>
    </tr>
    <tr>
      <td>New password:</td>
      <td>
        <input type="password" size="20" name="conf[adm_password]" value="<?php echo $conf["adm_password"]; ?>">
      </td>
    </tr>
    <tr class="head">
      <td colspan="2"><img src="yellow.gif" width="8" height="8"> Redirect traffic from deleted & no existing shortcuts:</td>
    </tr>
    <tr>
      <td>URL:</td>
      <td>
        <?php if(empty($conf["redirect"]))$conf["redirect"] = curPageURL(); ?>
        <input type="text" size="60" name="conf[redirect]" value="<?php echo $conf["redirect"]; ?>"><br />
      </td>
    </tr>
    <tr class="head">
      <td colspan="2"><img src="yellow.gif" width="8" height="8"> Front page footer:</td>
    </tr>
    <tr>
      <td>Footer:</td>
      <td>
         <a href="http://blog.kreci.net/code/url-shortening-script/" target="_blank">Read here for more info.</a>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <p align="center" class="submit">
          <input type="submit" name="saveconfig" value="Save" />
        </p>
      </td>
    </tr>
  </table>
  </form>

<?php else: ?>
<?php
if (isset($_POST['edit'])) {
  echo edit($_POST['id']);
} else {
  if (isset($_GET['start'])) {
    echo listing('blah',$_GET['start']);
  } else {
    echo listing('blah');
  }
}

?>
<?php endif; ?>
        </td>
    </tr>

</table>

<div id="footer" style="padding: 15px 7px;">
<div id="feedcontainer" style="float: left; width: 250px;">
  <?php getFeed("http://feeds.kreci.net/KreCiBlogger"); ?>
</div>
<div id="foot" style="float: left; width: 500px;">

<h2>Follow me!</h2>
For script updates, tips & freebies please <a href="http://www.twitter.com/KreCiDev">follow me</a> on twitter.

<h2>Script customization</h2>
If you want this script to be customized for your website please <a href="http://blog.kreci.net/contact-me/">contact me</a>.

<h2>Donations are welcome</h2>

<a href="http://blog.kreci.net/code/url-shortening-script/">MiniUrlz</a> is free of charge but your donations help to pay some hosting bills and 
motivate me to continue my work.
<p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="TSA3SY523BSQC">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="KreCi.net">
<input type="hidden" name="item_number" value="MiniUrlz">
<input type="hidden" name="currency_code" value="EUR">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHosted">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay
online!">
<img alt="" border="0" src="https://www.paypal.com/pl_PL/i/scr/pixel.gif" width="1" height="1">
</form>
</p>

</div>
</div>

</div>

</body>
</html>
