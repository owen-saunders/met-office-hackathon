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
                $word = explode(',', $line);
                echo "Latitude: " . $word[8] . " - Longitude: " . $word[9] . "<br>";
            }else {
                echo "end";
                exit(-1);
            }
        }
    }

    fclose($file);
?>