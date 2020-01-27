<?php
require '../models/disc_dao.php';


$hao = new DiscDAO($db);
$tableau = $hao->liste();
