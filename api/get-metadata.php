<?php

require_once("metadata-utils.php");
header("Content-Type: application/json");
	
$lang = $_GET["lang"];
$name = $_GET["name"];

if (!$lang || !$name) {
	http_response_code(400);
	exit(1);
} else if (is_valid_language($lang) == false) {
	http_response_code(404);
	exit(1);
} else if (validate_path($name) == false) {
	http_response_code(403);
	exit(1);
}

$path = "../static/lang/" . $lang . "/" . $name . "/";

$json = array(
	"license" => "",
	"git_remote" => "",
	"language" => ucfirst($lang)
);

$json["license"] = get_license($path);
$json["git_remote"] = get_remote($path);

echo(json_encode($json));
