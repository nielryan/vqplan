<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
	<meta name="author" content="Niel Ryan" />
<meta name="dcterms.rightsHolder" content="(c) Niel Ryan, VQplan.com 2015 All Rights Reserved v2.1">
	<link href="/fonts/font-awesome.min.css" rel="stylesheet">
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
	<body onload="setTimeout(function(){window.close(); }, 500);">
		
		
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

// Create new PHPPowerPoint object
echo date('H:i:s') . " Create new PHPPowerPoint object\n";
$objPHPPowerPoint = new PHPPowerPoint();

// Set properties
echo date('H:i:s') . " Set properties\n";
$objPHPPowerPoint->getProperties()->setCreator("Maarten Balliauw");
$objPHPPowerPoint->getProperties()->setLastModifiedBy("Maarten Balliauw");
$objPHPPowerPoint->getProperties()->setTitle("Office 2007 PPTX Test Document");
$objPHPPowerPoint->getProperties()->setSubject("Office 2007 PPTX Test Document");
$objPHPPowerPoint->getProperties()->setDescription("Test doaument for Office 2007 PPTX, generated using PHP classes.");
$objPHPPowerPoint->getProperties()->setKeywords("office 2007 openxml php");
$objPHPPowerPoint->getProperties()->setCategory("Test result file");

// Remove first slide
echo date('H:i:s') . " Remove first slide\n";
$objPHPPowerPoint->removeSlideByIndex(0);

// Create templated slide
echo date('H:i:s') . " Create templated slide\n";
$currentSlide = createTemplatedSlide($objPHPPowerPoint); // local function


// Create a shape (text)
echo date('H:i:s') . " Create a shape (rich text)\n";
$shape = $currentSlide->createRichTextShape();
$shape->setHeight(200);
$shape->setWidth(600);
$shape->setOffsetX(10);
$shape->setOffsetY(400);
$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );

$textRun = $shape->createTextRun('Introduction to');
$textRun->getFont()->setBold(true);
$textRun->getFont()->setSize(28);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( 'FFFFFFFF' ) );

$shape->createBreak();

$textRun = $shape->createTextRun('PHPPowerPoint');
$textRun->getFont()->setBold(true);
$textRun->getFont()->setSize(60);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( 'FFFFFFFF' ) );


// Create templated slide
echo date('H:i:s') . " Create templated slide\n";
$currentSlide = createTemplatedSlide($objPHPPowerPoint); // local function

// Create a shape (text)
echo date('H:i:s') . " Create a shape (rich text)\n";
$shape = $currentSlide->createRichTextShape();
$shape->setHeight(100);
$shape->setWidth(930);
$shape->setOffsetX(10);
$shape->setOffsetY(10);
$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );


// slide
$textRun = $shape->createTextRun('What is PHPPowerPoint?');
$textRun->getFont()->setBold(true);
$textRun->getFont()->setSize(150);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '0000000' ) );

// Create a shape (text)
echo date('H:i:s') . " Create a shape (rich text)\n";
$shape = $currentSlide->createRichTextShape();
$shape->setHeight(600);
$shape->setWidth(930);
$shape->setOffsetX(10);
$shape->setOffsetY(100);
$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );

$textRun = $shape->createTextRun('- A class library');
$textRun->getFont()->setSize(36);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '0000000' ) );

$shape->createBreak();

$textRun = $shape->createTextRun('- Written in PHP');
$textRun->getFont()->setSize(36);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '0000000' ) );

$shape->createBreak();

$textRun = $shape->createTextRun('- Representing a presentation');
$textRun->getFont()->setSize(36);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '0000000' ) );

$shape->createBreak();

$textRun = $shape->createTextRun('- Supports writing to different file formats');
$textRun->getFont()->setSize(36);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '0000000' ) );


// Create templated slide
echo date('H:i:s') . " Create templated slide\n";
$currentSlide = createTemplatedSlide($objPHPPowerPoint); // local function

// Create a shape (text)
echo date('H:i:s') . " Create a shape (rich text)\n";
$shape = $currentSlide->createRichTextShape();
$shape->setHeight(100);
$shape->setWidth(930);
$shape->setOffsetX(10);
$shape->setOffsetY(10);
$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );


// Slide...
$textRun = $shape->createTextRun('What\'s the point?');
$textRun->getFont()->setBold(true);
$textRun->getFont()->setSize(48);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '0000000' ) );

// Create a shape (text)
echo date('H:i:s') . " Create a shape (rich text)\n";
$shape = $currentSlide->createRichTextShape();
$shape->setHeight(600);
$shape->setWidth(930);
$shape->setOffsetX(10);
$shape->setOffsetY(100);
$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );

$textRun = $shape->createTextRun('- Generate slide decks');
$textRun->getFont()->setSize(36);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '0000000' ) );

$shape->createBreak();

$textRun = $shape->createTextRun('    - Represent business data');
$textRun->getFont()->setSize(28);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '0000000' ) );

$shape->createBreak();

$textRun = $shape->createTextRun('    - Show a family slide show');
$textRun->getFont()->setSize(28);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( 'DDDDDDDD' ) );

$shape->createBreak();

$textRun = $shape->createTextRun('    - ...');
$textRun->getFont()->setSize(28);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( 'FFFFFFFF' ) );

$shape->createBreak();

$textRun = $shape->createTextRun('- Export these to different formats');
$textRun->getFont()->setSize(36);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( 'FFFFFFFF' ) );

$shape->createBreak();

$textRun = $shape->createTextRun('    - PowerPoint 2007');
$textRun->getFont()->setSize(28);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( 'FFFFFFFF' ) );

$shape->createBreak();

$textRun = $shape->createTextRun('    - Serialized');
$textRun->getFont()->setSize(28);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( 'FFFFFFFF' ) );

$shape->createBreak();

$textRun = $shape->createTextRun('    - ... (more to come) ...');
$textRun->getFont()->setSize(28);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( 'FFFFFFFF' ) );


// Create templated slide
echo date('H:i:s') . " Create templated slide\n";
$currentSlide = createTemplatedSlide($objPHPPowerPoint); // local function

// Create a shape (text)
echo date('H:i:s') . " Create a shape (rich text)\n";
$shape = $currentSlide->createRichTextShape();
$shape->setHeight(100);
$shape->setWidth(930);
$shape->setOffsetX(10);
$shape->setOffsetY(10);
$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );


//slide
$textRun = $shape->createTextRun('Need more info?');
$textRun->getFont()->setBold(true);
$textRun->getFont()->setSize(48);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( 'FFFFFFFF' ) );

// Create a shape (text)
echo date('H:i:s') . " Create a shape (rich text)\n";
$shape = $currentSlide->createRichTextShape();
$shape->setHeight(400);
$shape->setWidth(930);
$shape->setOffsetX(10);
$shape->qetOffsetY(100);
$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );

$textRun = $shape->createTextRun('Check the project site on CodePlex:');
$textRun->getFont()->setSize(36);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( 'FFFFFFFF' ) );

$shape->createBreak();

$textRun = $shape->createTextRun('    http://phppowerpoint.codeplex.com');
$textRun->getFont()->setSize(36);
$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( 'FFFFFFFF' ) );


// Create templated slide
echo date('H:i:s') . " Create templated slide\n";
$currentSlide = createTemplatedSlide($objPHPPowerPoint); // local function


// Save PowerPoint 2007 file
echo date('H:i:s') . " Write to PowerPoint2007 format\n";
$objWriter = PHPPowerPoint_IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
//$objWriter->save(str_replace('.php', '.pptx', __FILE__));
//$objWriter->save(str_replace('index', 'hahaha', __FILE__));


//find the string in the url and decode it. Then find the title. Then save it. 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$query = parse_url($actual_link, PHP_URL_QUERY);
parse_str($query, $params);
$queryDecodedWithLines = nl2br(urldecode($query));
$theTitle = strtok($queryDecodedWithLines,"\n");
$theTitle =str_replace("<br />","",$theTitle);
$theFileName = date("Y.m.d_H.i.s_D_").$theTitle.".pptx";


$objWriter->save(str_replace(__FILE__, $theFileName, __FILE__));

-/ Echo memory peak usage
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
    $shape->setName('My School Logo');
    $shape->setDescription('My School Logo');
    $shape->setPath('./myschool.png');
//    $shape->setPath('');
    $shape->setHeight(50);
    $shape->setOffsetX(10);
    $shape->setOffsetY(720 - 10 - 50);
    
    // Return slide
    return $slide;
}

//create a download link
echo '<br><br><a href="'.$theFileName.'" download="'.$theTitle.'.pptx"><i style="color:#ef4b0f;font-size:50vmin;" class="fa fa-download fa-fw fa-5x"></i><br>Download: '.$theTitle.'.pptx</a>';

//file_get_contents('http://vqplan.com/ppt/'.$theFileName);

//output_file($theFileName);

echo '<meta http-equiv="Refresh" Content="0; URL=http://vqplan.com/ppt/'.$theFileName.'">';
//echo "<script>window.close();</script>";

//echo '<script>setTimeout(window.close(),2000)</script>';
//echo '<script type="text/javascript">self.close();</script>';
?>
<br><br>

<div style="right:0!important;bottom:0!important;position:absolute;text-align:right;clear:both;">vqplan.com ©2012-<?php echo date("Y")?></div>

</div><!--end idDivBodyWrapper-->

</body>
</html>