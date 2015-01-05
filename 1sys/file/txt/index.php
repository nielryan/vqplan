<?php

	//find the string in the url and decode it. Then find the title. Then create a filename. 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$query = parse_url($actual_link, PHP_URL_QUERY);
parse_str($query, $params);
$queryDecodedWithLines = nl2br(urldecode($query));
$theTitle = strtok($queryDecodedWithLines,"\n");
$theTitle =str_replace("<br />","",$theTitle);
//shorten the file name and remove *? etc.
$theTitleForFileName = substr($theTitle,0,15);
$theTitleForFileName =preg_replace('/[^A-Za-z0-9\-]/',' ', $theTitleForFileName);

$theFileName = date("Y.m.d_H.i.s_D_").$theTitleForFileName;
$theWholeText = str_replace("<br />","",$queryDecodedWithLines);

header('Content-Disposition: attachment; filename="'.$theTitleForFileName.'"');
header('Content-Type: text/plain'); # Don't use application/force-download - it's not a real MIME type, and the Content-Disposition header is sufficient
header('Content-Length: ' . strlen($theWholeText));
header('Connection: close');


echo $theWholeText;

?>