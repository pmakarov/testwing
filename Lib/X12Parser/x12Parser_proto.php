<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>x12 Parser</title>
		<!-- Bootstrap -->
	    <link href="css/bootstrap.min.css" rel="stylesheet"/>
	    <link href="css/bootstrap-responsive.min.css" rel="stylesheet"/>
	    <link href='css/custom-theme/jquery-ui-1.10.0.custom.css' rel="stylesheet"/>
	    <link href='css/datepicker.css' rel="stylesheet" />
		<link href='css/bootstrap-timepicker.css' rel="stylesheet" />
	    <link href="css/select2.css" rel="stylesheet"/>
		<link href='css/timepicker.css' rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />
		
	</head>
	<body>
		<h1>Parsed:</h1>
		<pre>
<?php 
require_once("HTML/Table.php");
require_once("Map.class.php");		

$file = "reports/test.x12";
$list = $part = array();
$lineCount = 1;
$delimiter;
$map = new Map();


$tab = '';
$tab_pane = '<div style="margin-top:-30px;" class="tab-content">';				


foreach ( file($file) as $line ) {
    //$line = trim($line);
    /*if (strpos($line, "|") === false) {
        continue;
    }*/
    //$line = explode("|", $line) and $line = end($line);
	//$line = $line = end($line);
	
	//Analyse ISA segment to find x12 Segment and Data markers
	if($lineCount=== 1){
		echo "***************************************************************\n";
		$delimiter = substr($line, 3,1);
		echo "*\tSegment Separator: " . $delimiter. "\n";
		//$isa16 = substr_count($line,  substr($line, 3,1));
		
		//$xit = explode($delimiter, $line);
		//print_r($xit);
		//echo bin2hex($xit[11]) . "\n";
		//find ISA16 and take the element after
		$foo = strrpos($line, $delimiter);
		echo "*\tComponent (Sub) Element Separator: " . bin2hex(substr($line, $foo+1, 1)) . "\n";
		echo "*\tSegment Terminator: " . bin2hex(substr($line, 105, 1)) . "\n";
		echo "***************************************************************\n";
	}
	else {
		//map($line);
	}
	$lineCount++;
	
}



$fileString = file_get_contents($file);
$segments = explode(hex2bin("0a"),$fileString);
//print_r($segments);
$cnt = count($segments);
echo '<div id="main" class="container">
	<div class="row">
	<div class="span2"><div id="blam" style="overflow:scroll;width:100px;height:400px;" class="tabbable tabs-left"><ul class="nav nav-tabs">';

for($i =0; $i < $cnt; $i++){
	handleSegments($segments[$i]);
}

echo $tabs.'</ul></div>';
echo '</div>';

echo '<div class="span10">'.$tab_pane . '</div></div></div>';

function handleSegments($string) {
	global $delimiter;
	$face = explode($delimiter, $string);
	
	handleDataElements($face);
	
}
$tabCount = 0;
function handleDataElements($string) {
	global $map, $lineCount, $delimiter;
	$attrs = array( "cellspacing" => 0, "border" => 0, "style" => "", "class" => "table table-striped table-bordered" );
	$table = new HTML_Table($attrs);
	$segment = $string[0];
	$lineCount++;
	$arr2 = array();
	$arr2[0] = $segment;
	$arr2[1] = $map->getElementMap($segment);
	$table->addRow(array(implode($string,$delimiter)), "colspan='3'");
	
	$table->addRow(array($segment,"Value", "Element"), null, "th");
	for($i = 1; $i < count($string); $i++){
		
		if($map->getElementMap($segment)){
			$arr = $map->getElementMap($segment);
			if(!is_array($arr[$i])){
				$table->addRow(array(sprintf("%02s", $i), $string[$i], $arr[$i]));
			}
			else {
				if(isset($arr[$i][$string[$i]])){
					
					$table->addRow(array(sprintf("%02s", $i),  $string[$i] . ' => '. $arr[$i][$string[$i]], $arr[$i]["title"]));
				}
				else {
					
						if(isset($arr[$i]["Usage"]) && $arr[$i]["Usage"]==="NA")
						{
							
						}
						else {
							$table->addRow(array(sprintf("%02s", $i),  $string[$i], $arr[$i]["title"]));
						}
				}
				
			}
			
		}
		
	}
	add_tab($segment, $lineCount);
	//add_tab_block($string, $table, $lineCount);
	//die(print_r($arr2));
	add_tab_block($arr2, $table, $lineCount);
	
}
function add_tab($segment, $count){
	   global $tabs;
	   $tabs .= '<li><a href="#tab'.$segment.'_'.$count.'" data-toggle="tab">'.$segment.'</a></li>';  
}
function add_tab_block($segment, $table, $count) {
	global $tab_pane;
	//var_dump($segment);
	$tab_pane .= 
	'<div class="tab-pane" id="tab'.$segment[0].'_'.$count.'">
		<p><b>'.$segment[1][0].'</b></p>'. $table->toHtml() .
	'</div>';
	
}
function map($line) {
	global $delimiter;
	$tmp = explode($delimiter, $line);
	print_r($tmp);
}


 

?>
</pre>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src='js/jquery-ui-1.10.0.custom.min.js'></script>

    <script type="text/javascript">
    	$(document).ready(function(){
    		console.log("doc ready fired");
    		$("#blam").height($(window).height()-200);
    		
    		$("#main").resize(function(e){
    			console.log("what's this..." + $(window).height() + " : " + $("#blam").height());
    			$("#blam").height($(window).height()-200);
    		});
    		
    	});
    </script>
</body>
</html>