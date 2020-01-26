<?php 

$sid = htmlentities($_POST['SID']);
$mode = htmlentities($_POST['mode']);

$map = shell_exec('parser.py ' . $sid);

include $sid . $mode .'.html';
?>