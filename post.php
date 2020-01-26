<?php 
    // 1842298N11080
    $sid = htmlentities($_POST['SID']);
    $sid = trim($sid);

    $flag = false;
    
    $file = fopen("cyclonedata.csv", "r");
    $array = array();

    while (!feof($file)) {
        $line = fgets($file);

        if (strpos($line, $sid) !== false) {
            $flag = true;
        }
        
        if ($flag) {
            if (strpos($line, $sid) !== false) {
                echo $line;
            }else {
                echo "end";
                exit(-1);
            }
        }
    }

    fclose($file);
?>