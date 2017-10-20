<?php

$text = file_get_contents("https://www.hnb.hr/tecajn/htecajn.htm");
parse($text);

function parse($text)
{
	$arr = [];
	
	// Replace commas with dots
	$text = str_replace(",", ".", $text);

	$lines = explode("\n", $text);
	
	// Remove HNB title line
	$title = array('title' => str_replace("\r", '', array_shift($lines)));

	// Add title to array
	array_push($arr, $title);

	// Format each line and add formated data to array
	foreach($lines as &$line) {
		$line = preg_split("/[ ]{1,}/", $line);
		$currency_code = substr($line[0], 0, 3);
		$currency = substr($line[0], 3, 3);
		$unit = (int)substr($line[0], 6, 3);
		$rates = array('buying' => (float)$line[1], 'middle' => (float)$line[2], 'selling' => (float)$line[3]);
		
		$data = array('currency_code' => $currency_code, 'currency' => $currency, 'unit' => $unit, 'rates' => $rates);

		array_push($arr, $data);
	}

	echo json_encode($arr);
}

?>