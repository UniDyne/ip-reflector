<?
// check for proxy
if(array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
	$proxy = $_SERVER['REMOTE_ADDR'];
	$real = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$proxy = "None Detected";
	$real = $_SERVER['REMOTE_ADDR'];
}

// build JSON for proxy and real address
$json = '{"proxy":"'.$proxy.'","addr":"'.$real.'"}';

// send it back
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
echo $json;
?>
