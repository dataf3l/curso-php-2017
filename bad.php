<!doctype html>
<html>
<meta charset="utf8" />
<body>
<h1></h1>

</body>
</html>

<?php
$s = "hola mamá &#10157;";
$s2 = utf8_encode($s);
#$s2 = iconv("ISO-8859-1","UTF-8", $s);

echo($s2);
die();
$s = array(65,66,66,65);
$s = "HOLA ";

$exp = chr(32);
$exp2 = ord(" ");
$cadena = "HOLA hola";
for($c = 0;$c<strlen($cadena);$c++){
	echo("$c: ${cadena[$c]} ".ord($cadena[$c])."\n");
}

/**
chr		Return a specific character
htmlentities	Convert all applicable characters to HTML entities
md5		Calculate the md5 hash of a string
nl2br		Inserts HTML line breaks before all newlines in a string
ord		Return ASCII value of character
sha1		Calculate the sha1 hash of a string
str_repeat	Repeat a string
str_replace	Replace all occurrences of the search string with the replacement string
strip_tags	Strip HTML and PHP tags from a string
strlen		Get string length
substr		Return part of a string
trim		Strip whitespace (or other characters) from the beginning and end of a string
 * */
