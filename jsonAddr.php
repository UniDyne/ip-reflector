<?
if(array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
	$proxy = $_SERVER['REMOTE_ADDR'];
	$real = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$proxy = "None Detected";
	$real = $_SERVER['REMOTE_ADDR'];
}

$json = '{"proxy":"'.$proxy.'","addr":"'.$real.'"}';

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
echo $json;
?>
