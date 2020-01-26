<?php 
    // 2019364S19060
    $sid = htmlentities($_POST['SID']);

    $command = `python parser.py $sid`;
    echo $command;
?>