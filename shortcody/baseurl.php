<?php
$BASEURL = dirname($_SERVER['SCRIPT_NAME']);
if (!str_ends_with($BASEURL, '/')) {
$BASEURL.='/';
}

echo $BASEURL;
?>