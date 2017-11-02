<?php


$usuario = $_GET["nombre"];

$usuario = htmlentities($usuario);
echo("<h1>hola, $usuario</h1>");



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
