<?php

	/* Get data from php input and parse XML. Note that for simplexml, you have to enable
	external entities to be parsed. So by including the argument LIBXML_NOENT, we open the site to attack */
	$postData = file_get_contents("php://input");
	$xml = simplexml_load_string($postData, 'SimpleXMLElement', LIBXML_NOENT);
	$thing1 = $xml->thing;
	
	// Send response
	if (!ctype_alpha($thing1)) {
		echo "$thing1 is not a word";
	} else {
		echo "Here is the definition of $thing1:";
	}
?>