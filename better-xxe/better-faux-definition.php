<?php

	/* Get data from php input and parse XML. By removing the LIBXML_NOENT argument, we 
	prevent XXE */
	$postData = file_get_contents("php://input");
	$xml = simplexml_load_string($postData, 'SimpleXMLElement');
	$thing1 = $xml->thing;
	
	// Server error is now more vague
	if (!ctype_alpha($thing1)) {
		echo "I'm sorry, I don't understand that word";
	} else {
		echo "If I were really a dictionary, I would give you a definition now";
	}
?>