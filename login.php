<html>
<head>
<title>Please authorize!</title>
<link href="admin.css" rel="stylesheet">
</head>
<body>
<center><P><BR><BR>
<form method="post">

<table border="0" cellpadding="5" bgcolor="#FFFFA4">
    <tr class="head">
        <td colspan="2">
	<img src="yellow.gif" width="8" height="8"> 
	Please login to the system:</td>
    </tr>
    <tr>
        <td>Username:</td>
        <td><P class="text2"><input type="text" size="20" name="login" maxlength="8"></P></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><P class="text2"><input type="password" size="20" name="password"></P></td>
    </tr>
<?php
if (isset($loginerror))
{
echo '<tr><td colspan="2" align="center">' . $loginerror . '</td></tr>';
}
?>
    <tr>
        <td colspan="2"><p class="submit" align="right"><input type="submit" value="Login"></p></td>
    </tr>
</table>

</form>
</center>
</body>
</html>

