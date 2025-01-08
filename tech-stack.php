<!--
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
-->

<link rel="stylesheet" type="text/css" href="static/css/tech-stack.css"/>

<?php
	$title = "Tech Stack";
	require_once("header.php");
?>

<h2> Tech Stack </h2>

<div class="section">
	<h3> Front End </h3>

	<img src="static/images/html-logo.png" alt="HTML logo" width=10.5%/>
	<img src="static/images/css-logo.png" alt="CSS logo" width=9%/>

	<p>
		This website's front end is made of just HTML and CSS. I try to write all my software
		with a minimalist standard for writing, reading, and debugging efficiency
		along with faster performance. That is why there is no JavaScript: I don't see any purpose for it
		since this site doesn't have a feature where it can be utilized.
		There are other <a href="lang.php?name=javascript"> pieces of software </a> where I wrote JavaScript,
		so if you're interested check those instead.
	</p>
</div>

<div class="section">
	<h3> Back End </h3>

	<img src="static/images/php-logo.svg" alt="PHP logo" width=15%/>

	<p>
		PHP is used for server-side rendering and to display all my software
		under their respective languages. I've previously used Flask/Python,
		but I have since ported this back end to PHP.
	</p>
</div>

<div class="section">
	<h3> Database Management System </h3>
	<p>
		There is currently no need for a DBMS. All requested data is gathered
		at runtime by the backend.
	</p>
</div>

<div class="section">
	<h3> Web Server </h3>

	<img src="static/images/apache-logo.png" alt="Apache logo" width=9%>

	<p> Apache Web Server </p>
</div>

<div class="section">
	<h3> Operating System </h3>

	<img src="static/images/debian-logo.svg" alt="Debian logo" width=9%/>

	<p> Debian GNU/Linux </p>
</div>

<?php
	require_once("footer.php");
?>
