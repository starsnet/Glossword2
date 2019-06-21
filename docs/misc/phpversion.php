<?php
header('Content-Type: text/plain');
print "\n".'PHP_VERSION_INT: '.PHP_VERSION;
print "\n".'SERVER_SOFTWARE: '.getenv('SERVER_SOFTWARE');
print "\n".'API            : '.PHP_SAPI;
?>