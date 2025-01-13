<?php

/*
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

	$program_name = $_GET["name"];
	$lang = $_GET["lang"];

	$title = $program_name;
	require_once("header.php");

	echo("<h1>" . $program_name . "</h1>");

	$curl_handle = curl_init("http://localhost:443/api/get-metadata.php?lang=" . $lang . "&name=" . $program_name);

	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($curl_handle);

	$json = json_decode($response, true);
	
	curl_close($curl_handle);

	echo("<p>");
			echo("License: " . $json["license"] . "<br/>");
			echo("Language: " . $json["language"] . "<br/>");
			echo("Line count: N/A <br/>");
			echo("GitHub page: <a href=\"" . $json["git_remote"] . "\">" . $json["git_remote"] . "</a>");
	echo("</p>");

	require_once("footer.php");
?>
