<?php

/*
	metadata-utils: Functions for working with metadata and paths

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

/*
	Security precaution to see if user
	is trying to traverse the filesystem.
*/
function validate_path($path) {
	/* Get rid of escapes */
	$values = explode("\\", $path);
	$values = explode("/", implode($values));

	foreach ($values as $value) {
		switch ($value) {
		case ".": case "..": case "~":
			return false;
		}
	}

	return true;
}

/* TODO: Read values from a config file */
function is_valid_language($language_input) {
	switch ($language_input) {
	case "c": case "java":
	case "python": case "shell":
		return true;
	}

	return false;
}

function get_license($path) {
	$license = file($path . "/LICENSE");
	$result = "";
	$title = explode(" ", $license[0]);

	/* Get rid of whitespace */
	foreach ($title as $word) {
		if (!$word) {
			continue;
		}

		$result = $result . $word . " ";
	}

	/* Erase newline */
	return explode("\n", $result)[0];
}

function get_remote($path) {
	$text = file($path . "/.git/config");
	$remote_url = "";
	$is_remote = false;

	foreach ($text as $line) {
		if ($line == "[remote \"origin\"]\n") {
			$is_remote = true;
			continue;
		}

		if ($is_remote == true) {
			$is_url = false;

			for ($i = 0; $i < strlen($line); $i++) {
				if ($line[$i] == '\n') {
					break;
				} else if ($line[$i] == '=') {
					$is_url = true;
					continue;
				}

				if ($is_url == true) {
					if ($line[$i] == ' ') {
						continue;
					}

					$remote_url = $remote_url . $line[$i];
				}
			}

			break;
		}
	}

	/* Erase newline */
	return explode("\n", $remote_url)[0];
}
