<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
	<meta name="author" content="Niel Ryan" />
<meta name="dcterms.rightsHolder" content="(c) Niel Ryan, VQplan.com 2015 All Rights Reserved v2.1">
	<link href="/1sys/fonts/font-awesome.min.css" rel="stylesheet">
	<title>.pptx</title>
	
	<style>
				body,html
		{
			font-family:courier;
			height:100%;
			width: 100%;
			min-width: 100%;
			max-width:100%;
			margin:0;
			padding: 0;
			color: transparent;
		}
		</style>
		
	
	</head>
	<body onload="setTimeout(function(){window.close();},1500);">
		
		
		<div id="idDivBodyWrapper" style="position:relative;text-align:center;height:100%;background:white;vertical-align:middle;">
<?php
/**
vqplan all rights reserved. 
//javascript:settimeout('window.close()',5000);
//
/** Error reporting */
error_reporting(E_ALL);

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . '../Classes/');

/** PHPPowerPoint */
include 'PHPPowerPoint.php';

/** PHPPowerPoint_IOFactory */
include 'PHPPowerPoint/IOFactory.php';


//find the string in the url and decode it. Then find the title. Then create a filename. 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$query = parse_url($actual_link, PHP_URL_QUERY);
parse_str($query, $params);
$queryDecodedWithLines = nl2br(urldecode($query));
$theTitle = strtok($queryDecodedWithLines,"\n");
$theTitle =str_replace("<br />","",$theTitle);
//shorten the file name and remove *? etc.
$theTitleForFileName = substr($theTitle,0,15);
$theTitleForFileName =preg_replace('/[^A-Za-z0-9\-]/', '', $theTitleForFileName);

$theFileName = date("Y.m.d_H.i.s_D_").$theTitleForFileName.".pptx";
$theWholeText = str_replace("<br />","",$queryDecodedWithLines);

// Create new PHPPowerPoint object
echo date('H:i:s') . " Create new PHPPowerPoint object\n";
$objPHPPowerPoint = new PHPPowerPoint();

// Set properties
echo date('H:i:s') . " Set properties\n";
$objPHPPowerPoint->getProperties()->setCreator("Author");
$objPHPPowerPoint->getProperties()->setLastModifiedBy("Author");
$objPHPPowerPoint->getProperties()->setTitle("");
$objPHPPowerPoint->getProperties()->setSubject("");
$objPHPPowerPoint->getProperties()->setDescription("");
$objPHPPowerPoint->getProperties()->setKeywords("");
$objPHPPowerPoint->getProperties()->setCategory("");

// Remove first slide
echo date('H:i:s') . " Remove first slide\n";
$objPHPPowerPoint->removeSlideByIndex(0);

// Create templated slide
echo date('H:i:s') . " Create templated slide\n";
$currentSlide = createTemplatedSlide($objPHPPowerPoint); // local function


// Create a shape (text)
echo date('H:i:s') . " Create a shape (rich text)\n";
$shape = $currentSlide->createRichTextShape();
$shape->setHeight(700);
$shape->setWidth(930);
$shape->setOffsetX(10);
$shape->setOffsetY(10);
$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );

$textRun = $shape->createTextRun('');
$textRun->getFont()->setBold(true);
$textRun->getFont()->setSize(48);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '0000000' ) );

$shape->createBreak();

$textRun = $shape->createTextRun($theTitle);
$textRun->getFont()->setBold(true);
$textRun->getFont()->setSize(60);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '0000000' ) );


// Create templated slide
echo date('H:i:s') . " Create templated slide\n";
$currentSlide = createTemplatedSlide($objPHPPowerPoint); // local function

// Create a shape (text)
echo date('H:i:s') . " Create a shape (rich text)\n";
$shape = $currentSlide->createRichTextShape();
$shape->setHeight(700);
$shape->setWidth(930);
$shape->setOffsetX(10);
$shape->setOffsetY(10);
$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );

// slide
$textRun = $shape->createTextRun($theWholeText);
$textRun->getFont()-<setBold(true);
$textRun->getFont()->setSize(70);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '0000000' ) );


// Create templated slide
echo date('H:i:s') . " Create templated slide\n";
$currentSlide = createTemplatedSlide($objPHPPowerPoint); // local function


// Create a shape (text)
echo date('H:i:s') . " Create a shape (rich text)\n";
$shape = $currentSlide->createRichTextShape();
$shape->setHeight(700);
$shape->setWidth(930);
$shape->setOffsetX(10);
$shape->setOffsetY(10);
$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );

$textRun = $shape->createTextRun('');
$textRun->getFont()->setSize(70);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '0000000' ) );





// Save PowerPoint 2007 file
echo date('H:i:s') . " Write to PowerPoint2007 format\n";
$objWriter = PHPPowerPoint_IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
//$objWriter->save(str_replace('.php', '.pptx', __FILE__));
//$objWriter->save(str_replace('index', 'hahaha', __FILE__));




//save it
$objWriter->save(str_replace(__FILE__, $theFileName, __FILE__));

// Echo memory peak usage
echo date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";

// Echo done
echo date('H:i:s') . " Done writing file.\r\n";



/**
 * Creates a templated slide
 * 
 * @param PHPPowerPoint $objPHPPowerPoint
 * @return PHPPowerPoint_Slide
 */
function createTemplatedSlide(PHPPowerPoint $objPHPPowerPoint)
{
	// Create slide
	$slide = $objPHPPowerPoint->createSlide();
	/*
	// Add background image
    $shape = $slide->createDrawingShape();
    $shape->setName('Background');
    $shape->setDescription('Background');
    $shape->setPath('./images/realdolmen_bg.jpg');
    $shape->setWidth(950);
    $shape->setHeight(720);
    $shape->setOffsetX(0);
    $shape->setOffsetY(0);
    */
    // Add logo
//     $slide->setBackgroundColor('#000000');
    $shape = $slide->createDrawingShape();
  //  $shape->setName('My School Logo');
  //  $shape->setDescription('My School Logo');
    $shape->setPath('./myschool.png');
//    $shape->setPath('');
    $shape->setHeight(50);
    $shape->setOffsetX(10);
    $shape->setOffsetY(720 - 10 - 50);
    
    // Return slide
    return $slide;
}

//create a download link
echo '<br><a href="'.$theFileName.'" download="'.$theTitle.'.pptx"><i style="color:#ef4b0f;font-size:30vmin;" class="fa fa-download fa-fw fa-3x"></i><br>Download: '.$theTitle.'.pptx</a><br>';

//echo '<i style="color:silver;font-size:30vmin;" onclick="window.close();" class="fa fa-close fa-fw fa-3x"></i><p>close</p>';



echo '<meta http-equiv="Refresh" Content="1; URL=http://vqplan.com/1sys/file/pptx/'.$theFileName.'"  download="'.$theTitle.'.pptx">';
//echo "<script>window.close();</script>";

//echo '<script>setTimeout(window.close(),2000)</script>';
//echo '<script type="text/javascript">self.close();</script>';
?>
<br><br>

<div style="right:0!important;bottom:0!important;position:absolute;text-align:right;clear:both;">vqplan.com ©2012-<?php echo date("Y")?></div>

</div><!--end idDivBodyWrapper-->

</body>
</html>