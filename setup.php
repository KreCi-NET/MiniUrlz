<?php

include('conf.inc.php');
include('functions.inc.php');

function ok($file) {
  echo "<span style=\"font-weight: bold;\">$file:</span> <span class=\"ok\">OK!</span><br />";
}
function warn($file) {
  echo "<span style=\"font-weight: bold;\">$file:</span> <span class=\"warn\">ERROR! Please CHMOD!</span><br />";
}

function fileperm($array) {
  foreach ($array as $file) {
    if (is_writable($file)) {
      ok($file);
    } else {
      warn($file);
      $error = 1;
    }
  }
  if(isset($error)){return false;}else{return true;}
}

function update_htaccess() {
  $fp = @fopen(".htaccess", "r");
  $htaccess = "";
  if ($fp) {
    while (!feof($fp)) {
      $buffer = fgets($fp, 4096);
      if (strpos($buffer, "RewriteBase") !== false) {
        $dirname = dirname($_SERVER["PHP_SELF"]);
        $dirname .= (substr($dirname, -1)=="/") ? "\r\n" : "/\r\n";
        $htaccess .= "RewriteBase ".$dirname;
      } else {
        $htaccess .= $buffer;
      }
    }
    fclose($fp);
    $fp = @fopen(".htaccess", 'w');
    if ($fp)fwrite($fp, $htaccess, strlen($htaccess));
    fclose($fp);
    return true;
  } else {
    return false;
  }
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <title>MiniUrlz - SETUP</title>
  <link rel="stylesheet" href="admin.css" type="text/css" charset="utf-8" />
</head>
<body>

<?php
if (isset($_POST['save'])) {
?>
  <h2>Updating files:</h2>
  <p>
    <?php (update_config($_POST['conf'], $conf)) ? ok("conf.inc.php") : warn("conf.inc.php"); ?>
    <?php (update_htaccess()) ? ok(".htaccess") : warn(".htaccess"); ?>
  </p>
  <p>Setup is done! <span class="warn">Please remove "setup.php" for security reasons!</span></p>
<?php
} elseif (isset($_GET['user'])) {
  ?>
  <form method="post">
    <h2>Set your administrator username and password:</h2>
    <p>
      Username: <br />
      <input type="text" name="conf[adm_user]" class="text" /><br />
      Password: <br />
      <input type="password" name="conf[adm_password]" class="text" /><br />
    </p>
    <p>
      Click continue to update config files.
    </p>
    <p>
      <input type="submit" value="Continue" name="save" class="submit" />
    </p>
  </form>
<?php

} elseif (isset($_GET['files'])) {
  echo "<h2>File permissions:</h2>";
  $files = array('conf.inc.php', '.htaccess', 'store');
  if (!fileperm($files)) {
  ?>
    <p class="warn">Wrong files permissions. Fix the errors and try again!</p>
    <p><input type="button" value="Try again" onclick="document.location.href='<?php echo $_SERVER['PHP_SELF'] ?>?files=1'"></p>
  <?php
  } else {
  ?>
    <p>File permissions are looking good. Click below to set administrator password.</p>
    <p><input type="button" value="Continue" onclick="document.location.href='<?php echo $_SERVER['PHP_SELF'] ?>?user=1'"></p>
  <?php
  }
} else {
  ?>
  <h2>MiniUrlz setup:</h2>

  <p>Welcome in MiniUrlz setup script. Click button below to check files permissions.</p>
  <p><input type="button" value="Start!" onclick="document.location.href='<?php echo $_SERVER['PHP_SELF'] ?>?files=1'"></p>
  <?php
}
?>
</body>
</html>
