<?php

$dir = dirname(__FILE__);

// include testing library
include($dir . '/testmore/testmore.php');

// include files to be tested
include($dir . '/../MediaWiki.class.php');
include($dir . '/../MediaWiki.config.php');

plan(2);

function login($user, $pass) {
	$xml = MediaWiki::login($user, $pass);
	$xmlStr = simplexml_load_string($xml);
	$node = $xmlStr->xpath('/api/login');
	$result = (string)$node[0]->attributes()->result;
	return $result;
}

ok(login('Testy1', 'cull') === 'Success', 'successful login');  

function edit($pageId, $sectionNum, $text, $summary) {
	$xml = MediaWiki::edit($pageId, $sectionNum, $text, $summary, null, null);
	$xmlStr = simplexml_load_string($xml);
	$node = $xmlStr->xpath('/api/edit');
	$result = (string)$node[0]->attributes()->result;
	return $result;
}

ok(edit(65723, 0, 'Unit Testing 1, 2, 3... ' . mt_rand(), 'Unit Test of PHP Wrapper - Successful Edit') === 'Success', 'successful edit');

