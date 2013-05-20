<?php

$dir = dirname(__FILE__);

// include testing library
include($dir . '/testmore/testmore.php');

// include files to be tested
include($dir . '/../MediaWiki.class.php');
include($dir . '/../MediaWiki.config.php');

plan(3);

ok(MediaWiki::login('Testy1', 'cull') !== null, 'login');  
ok(MediaWiki::logout() === true, 'logout');
$editResult = MediaWiki::edit(65723, "Unit Testing 1, 2, 3...", "Unit Test of API Wrapper", 0, null, null);
ok((string)$editResult['result'] === 'success', 'successful edit');

