<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $option = checkerInp($_POST['groupe']);

        $url = 'https://www.ismo.ma/emploisphp/ajax.php';

        $data = array('groupe' => $option, 'ajax' => 1);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($ch);

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        
        if ($http_code >= 200 && $http_code < 300) {
            echo $response;
        } else {
            echo "";
        }
    }

    function checkerInp($x){
        $x = trim($x);
        $x = stripcslashes($x);
        $x = htmlspecialchars($x);
        return $x;
    }
?>


    

