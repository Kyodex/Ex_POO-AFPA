<?php

$db = new PDO('mysql:host=localhost:3307;charset=utf8;dbname=record_p', "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$num_regex = '/^[0-9]+$/';
$text_regex = '/^[a-zA-Z\-\,\.\' \déèàçùëüïôäâêûîô#&]+$/';
$price_regex= '/^[\d]{1,6}[.]?[\d]{0,2}+$/';