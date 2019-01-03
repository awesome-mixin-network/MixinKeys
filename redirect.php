<?php 
include("db.php"); //соединение с SQL
session_start();
$result = $db->query("SELECT state 
                        FROM sessions");
$row = $result->fetch(PDO::FETCH_ASSOC);
$state = $row['state'];
$_SESSION['code'] = $_GET['code'];
$mixin_code = $_SESSION['code'];
$url = 'https://api.mixin.one/oauth/token';
$data = array('client_id' => '4d64a975-897f-4609-a67d-a1a976f3211a', 'code' => $mixin_code, 'client_secret' => '08f78877b91dd76537db8e2beb13195be2c8394adcfdc17d7c6ee450a72789de');


$options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode( $data ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);

$context  = stream_context_create( $options );
$result = file_get_contents( $url, false, $context );
$response = json_decode( $result );
$access_token = $response->data->access_token;
echo "</br>access token</br>";
echo $access_token;
echo "</br></br>";
echo "</br>User info</br>";

$url = 'https://api.mixin.one/me';
$headers = array(
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        );
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);  
if ($result === FALSE) {
  die('Curl failed: ' . curl_error($ch));
}
curl_close($ch);
$array_mix = json_decode($result);





//if ($state == 1) {
//	$_SESSION['person'] = 0;
//	header('Location: houses.php');
//} else {
//	$_SESSION['person'] = 1;
//	header('Location: account.php');
//}
?>
