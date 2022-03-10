<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php 
        //URL
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            echo '<br> WBURL: '.$url;
        }else{
            echo '<br> WBURL: null';
        }
        //Message
        if(isset($_GET['message'])){
            $message = $_GET['message'];
            echo '<br> Msg: '.$message;
        }else{
            echo '<br> Msg: null';
        }

        $json_data = json_encode([
            "content" => $message
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

        $ch = curl_init( $url );

        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );

        curl_close( $ch );
    ?>
</body>
</html>

