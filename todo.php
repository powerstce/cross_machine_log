<?php

$html = 
<<<EOHTML
    <!DOCTYPE html>
<html lang="en">
	<he      ad>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Page Title</title>
	    <link rel="stylesheet" href="css/style.css">
	</head>    
	<body>
	    <h1>Hello,                              world&nbsp;!</h1>
	    <h2>Hello &#8211; World</h2>
	    <script\x3Etype="text/javascript">javascript:alert(1);</script>
	    <script src                                        ="js/main.js"></script>
	</body>
</html>
EOHTML;

//Add Tabs to output
//$xmlDoc = new DOMDocument ();
//$xmlDoc->preserveWhiteSpace = false;
//$xmlDoc->formatOutput = true;

//$html = html_entity_decode($html);
//print '<textarea>'.$html.'</textarea>' . PHP_EOL;

$lines = [];
$indentationMatch = [' ', "\t"];

foreach(explode(PHP_EOL, $html) as $lineNo => $lineString)
{
	//leave the spaces/tabs (indication) from the start of the line
	$startCharsCol = 0;
	foreach(mb_str_split($lineString) as $col => $string)
	{
		if(in_array($string, $indentationMatch))
			continue;
		
		$startCharsCol = $col;
		break;
	}
	
	//\x20replacement
	//'s/\\x20/ /g'
	
	//get indentation
	$indentation = mb_substr($lineString, 0, $startCharsCol);
	$one = 1;
	$lineContent = str_replace($indentation, "", $lineString, $one);
	
	//remove multiple spaces
	$spaces = explode(' ', $lineContent);
	$spaces = array_filter($spaces, fn($el) => $el != '');
	$lineStringClean = $indentation . implode(' ', $spaces);
	$lines[$lineNo] = $lineStringClean;
}

print implode(PHP_EOL, $lines);<?php

$html = 
<<<EOHTML
    <!DOCTYPE html>
<html lang="en">
	<he      ad>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Page Title</title>
	    <link rel="stylesheet" href="css/style.css">
	</head>    
	<body>
	    <h1>Hello,                              world&nbsp;!</h1>
	    <h2>Hello &#8211; World</h2>
	    <script\x3Etype="text/javascript">javascript:alert(1);</script>
	    <script src                                        ="js/main.js"></script>
	</body>
</html>
EOHTML;

//Add Tabs to output
//$xmlDoc = new DOMDocument ();
//$xmlDoc->preserveWhiteSpace = false;
//$xmlDoc->formatOutput = true;

//$html = html_entity_decode($html);
//print '<textarea>'.$html.'</textarea>' . PHP_EOL;

$lines = [];
$indentationMatch = [' ', "\t"];

foreach(explode(PHP_EOL, $html) as $lineNo => $lineString)
{
	//leave the spaces/tabs (indication) from the start of the line
	$startCharsCol = 0;
	foreach(mb_str_split($lineString) as $col => $string)
	{
		if(in_array($string, $indentationMatch))
			continue;
		
		$startCharsCol = $col;
		break;
	}
	
	//\x20replacement
	//'s/\\x20/ /g'
	
	//get indentation
	$indentation = mb_substr($lineString, 0, $startCharsCol);
	$one = 1;
	$lineContent = str_replace($indentation, "", $lineString, $one);
	
	//remove multiple spaces
	$spaces = explode(' ', $lineContent);
	$spaces = array_filter($spaces, fn($el) => $el != '');
	$lineStringClean = $indentation . implode(' ', $spaces);
	$lines[$lineNo] = $lineStringClean;
}

print implode(PHP_EOL, $lines);

/*
	Also Add:
		1. search for attribute starting with \x to catch all \x20 stuff inserted between attributes to simulate space (maybe this stuff is picked as attr)
  		2. force tabs as indicator -> look at //Add Tabs to output
    		3. force pretty output -> look at //Add Tabs to output
      		4. Remove and validate ANY src or href (not only img also iframe can have it and probably more)
		5. Add extra src -> src="data:image:"
  		6. Add extra onerror=javascript: OR onerror="javascript: cases
*/
