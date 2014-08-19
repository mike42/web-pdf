<?php
require_once('../LatexTemplate.php');

$test = "";
if(isset($_GET['t'])) {
	// Make the LaTeX file and send it through
	$test = $_GET['t'];
	$data = array(
			'invoiceNumber' => '234567',
			'invoiceDate' => '12/5/2014',
			'invoiceBalance' => '$24.60',
			'customerName' => 'ExampleCorp',
			'customerAddress' => '123 Example St, Exampleton ACT.',
			'invoiceItem' => array(
				array('item' => 'Foo', 'qty' => '2', 'price' => '2.30', 'total' => '4.60'),
				array('item' => 'Bar', 'qty' => '4', 'price' => '5.00', 'total' => '20.00')			
			)
	);

	try {
		LatexTemplate::download($data, 'invoice.tex', 'foobar.pdf');
	} catch(Exception $e) {
		echo $e -> getMessage();
	}

}
?>
<html>
<head>
<title>LaTeX test (invoice)</title>
</head>
</html>
<body>
	<p>Click to generate an invoice with some data</p>
	<form>
		<input type="hidden" name="t" /> <input type="submit" value="Generate" />
	</form>
</body>
