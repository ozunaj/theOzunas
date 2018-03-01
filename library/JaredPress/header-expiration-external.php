<?php

$files = array(
	'googleFonts' => 'https://fonts.googleapis.com/css?family=Pacifico|Quicksand',
	'bsa.js' => 'https://s3.buysellads.com/ac/bsa.js',
	'pro.js' => 'https://s3.buysellads.com/ac/pro.js'
);


if(isset($files[$_GET['file']])) {
	if ($files[$_GET['file']] == 'googleFonts'){
		header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + ((60 * 60) * 48))); // 2 days for GA
	} else {
		header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + (60 * 60))); // Default set to 1 hour
	}

	echo file_get_contents($files[$_GET['file']]);
}

?>