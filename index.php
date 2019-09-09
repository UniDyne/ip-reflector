<?
// Check for proxy headers
if(array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
	$proxy = $_SERVER['REMOTE_ADDR'];
	$real = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$proxy = "None Detected";
	$real = $_SERVER['REMOTE_ADDR'];
}

// check if for v6 or v4
if(filter_var($real, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
	$ip4 = $real;
	$ip6 = "None Detected";
} else if(filter_var($real, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
	$ip6 = $real;
	$ip4 = "Fetching...";
} else {
	$ip6 = "Unknown";
	$ip4 = "Unknown";
}

// capture user agent if present
if(array_key_exists('HTTP_USER_AGENT', $_SERVER)) $ua = $_SERVER['HTTP_USER_AGENT'];
else $ua= "No User Agent Detected";

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

<title>IP Address | nol.ag</title>
<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "WebApplication",
	"name": "IP Address Reflector",
	"url": "https://nol.ag/ip/",
	"description": "See your public IP address - v4, v6, and proxy.",
	"applicationCategory": "Utility",
	"about": {
		"@type": "Thing",
		"description": "ip, network"
	},
	"browserRequirements": "Requires JavaScript. Requires HTML5.",
	"operatingSystem": "All"
}
</script>
<style type="text/css">
.border-between > [class*='col-']:before {
   background: #e3e3e3;
   bottom: 0;
   content: " ";
   left: 0;
   position: absolute;
   width: 1px;
   top: 0;
}

.border-between > [class*='col-']:first-child:before {
   display: none;
}

.mono { font-family: 'Lucida Console', 'Courier New', monospace; }

@media (max-width: 512px) { h2 small.hidden-xs { display:none; } }

#about {background-color:#333;color:#ddd;overflow:hidden;max-height:0;transition:max-height 2s ease-out;}
#about > figure {opacity:0;transition:opacity 2s;}
#about.show {max-height:25em;overflow:none;}
#about.show > figure {opacity:1;}

</style>
</head>
<body class="bg-light">
<div class="container mb-4">
	<div class="py-1 mt-4">
		<h2 data-uid="mast" style="cursor:help;"><i class="fa fa-network-wired" style="color:#36f;"></i> IP Address Reflector <small class="float-right pt-2 text-muted hidden-xs">nol.ag</small></h2>
		<hr>
	</div>
	<div class="row border-between mt-4">
		<div class="col-md-6">
			<h4 class="mb-3"><span class="text-muted">IP Addresses</span></h4>
			<form method="dialog" action="javascript://">
			<div class="row">
			<div class="col-md-12 mb-3">
				<label for="proxy">Proxy</label>
				<input type="text" class="form-control" id="proxy" value="<? echo $proxy; ?>" readonly>
			</div>
			<div class="col-md-12 mb-3">
				<label for="ip6">IPv6</label>
				<input type="text" class="form-control" id="ip6" value="<? echo $ip6; ?>" readonly>
			</div>
			<div class="col-md-12 mb-3">
				<label for="ip4">IPv4</label>
				<input type="text" class="form-control" id="ip4" value="<? echo $ip4; ?>" readonly>
			</div>
			</div>
			</form>

			
		</div><div class="col-md-6">
 			<h4 class="mb-3"><span class="text-muted">User Agent String</span></h4>
			
			<span class="mono"><? echo $ua ?></span>
		</div>
	</div>
	<hr class="mt-1">
	<a class="float-right" href="https://github.com/UniDyne/ip-reflector/" style="color:#999;" target="_blank" rel="noopener"><i class="fab fa-github"></i> <small>View on GitHub</small></a>
</div>
<script type="text/javascript">
<? if($ip4 == "Fetching...") { ?>
fetch('//duality.nol.ag/ip/jsonAddr.php',{method:'GET'}).then(r=>r.json()).then(d=>document.getElementById('ip4').value = d.addr);
<? } ?> 
</script>
</body>
</html>
