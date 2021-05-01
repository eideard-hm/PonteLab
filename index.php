<?php

require_once("Config/Config.php");

$url = $_GET['url'] ?? "Index/index";
$arrUrl = explode('/', $url);
