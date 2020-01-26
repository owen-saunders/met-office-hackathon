<?php 
    // 1842298N11080
    $sid = htmlentities($_POST['term']);
    $sid = trim($sid);

    $flag = false;
    
    $file = fopen("cyclonedata.csv", "r");
    $array = array();

    array_push($array, "SID: ". $sid);

    while (!feof($file)) {
        $line = fgets($file);

        if (strpos($line, $sid) !== false) {
            $flag = true;
        }
        
        if ($flag) {
            if (strpos($line, $sid) !== false) {
                $word = explode(',', $line);
                array_push($array, " Basin: " . $word[3] . " SubBasin: " . $word[4] . " Time: " . $word[6] . " Nature: " . $word[7] . 
                " Latitude: " . $word[8] . "  Longitude: " . $word[9] . " Speed: " . $word[161] . " Direction: " . $word[162] . "<br>");
            }else {
                foreach ($array as $ar) {
                    echo $ar . '<br>';
                }
                exit(-1);
            }
        }
    }

    fclose($file);
?>