<?php

$dir = dirname(__FILE__);

// include testing library
include($dir . '/testmore/testmore.php');

// include files to be tested
include($dir . '/../MediaWiki.class.php');
include($dir . '/../MediaWiki.config.php');

plan(2);

ok(MediaWiki::login('Testy1', 'cull') !== null, 'login');  
ok(MediaWiki::logout() === true, 'logout');  

