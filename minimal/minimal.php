<?php
require_once('../LatexTemplate.php');

$test = "";
if(isset($_GET['t'])) {
	// Make the LaTeX file and send it through
	$test = $_GET['t'];
	if($test =="") {
		// Test pattern to show symbol handling
		for($i = 0; $i < 256; $i++) {
			$test .= chr($i) . " . ";
		}
	}

	try {
		LatexTemplate::download(array('test' => $test), 'minimal.tex', 'foobar.pdf');
	} catch(Exception $e) {
		echo $e -> getMessage();
	}

}
?>
<html>
<head>
<title>LaTeX test (minimal)</title>
</head>
</html>
<body>
	<p>Enter some text to be placed on the output:</p>
	<form>
		<input type="text" name="t" /><input type="submit" value="Generate" />
	</form>
</body>
</html>
