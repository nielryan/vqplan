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
$theWholeText = str_replace("<br />","<br>",$queryDecodedWithLines);


header("Content-type: application/vnd.ms-word");
header('Content-Disposition: attachment;Filename='.$theTitleForFileName.'.doc');
echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
echo $theWholeText;
echo "</body>";
echo "</html>";


?>

