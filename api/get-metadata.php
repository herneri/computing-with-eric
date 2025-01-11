<?php

/*
	get-metadata: API endpoint for program metadata services

	Copyright (C) 2025  Eric Hernandez

	This file is part of Computing with Eric.

	Computing with Eric is free software: you can redistribute it and/or modify
	it under the terms of the GNU Affero General Public License as
	published by the Free Software Foundation, either version 3 of the
	License, or (at your option) any later version.

	Computing with Eric is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU Affero General Public License for more details.

	You should have received a copy of the GNU Affero General Public License
	along with Computing with Eric.  If not, see <https://www.gnu.org/licenses/>.
*/

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
