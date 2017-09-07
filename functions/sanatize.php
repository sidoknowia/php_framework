<?php

function escapeInsert($string){
	return strip_tags(htmlentities($string,ENT_QUOTES,'UTF-8'));
}

function escape($string){
	return mysql_real_escape_string(strip_tags($string));
}


?>