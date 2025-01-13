<?php
	$title = ucfirst($_GET["name"]) . " Programs";
	require_once("header.php");
?>

	<h1>  Programs </h1>

<?php
	const LANG_ROOT_PATH = "static/lang/";
	$language = $_GET["name"];

	/*
		Important check for security and functionality:
		Doesn't allow going back a directory with ..
	*/
	switch ($language) {
	case "c": case "python":
	case "java": case "shell":
		break;
	default:
		echo("Invalid language entered");
		exit(1);
	}

	$dir = opendir(LANG_ROOT_PATH . $language);

	while (($entry = readdir($dir)) != NULL) {
		if ($entry == "." || $entry == "..") {
			continue;
		}

		echo('<a class="project" href="/program.php?lang=' . $language . '&name=' . $entry . '"> ' . $entry . ' </a>');
	}

	closedir($dir);

	require_once("footer.php");
?>
