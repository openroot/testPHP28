<?php
	/*
		Create a directory structure of "private/public" under "private/protected" to implement "local environment" development architecture,
		or put necessary codes at "private/public" to make everything globally accessible.
		Layer is functional with ".gitignore" from Github.

		This project is layered to "public" and "protected" architecture.
		Github does not store data under the "private/protected" directory.
		New forking requires "private/protected" mandatory directory structure to convenience.
	*/
	require_once("private/protected/configuration.php");
?>