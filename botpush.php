<?php



require "vendor/autoload.php";

$access_token = 'Lj66bFMe6xCC+2vg7OzflrfMtzIG8ETXHeuhWswdsJU7Aw+SM7nirKYCwWnAUfqrL+JSb+SB1ZO7GgsUmHhrefAtoVzzPZhuJvlngyGwzds7Fjy7aO4q5Oa5/BjCeShNXXd+SOsJhf+U5xP5Eic4TgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '058227fd278642d31374ec2b3a0a1c55';
$pushID = 'Uec36e7ef10fefc1b2a26f329628a80ed';

$access_token = 'j3TpPDRdPt+bPQkcBxGmzaRFmvzVhSbwalp0oGqQGTxv3NYeq2ASalGT6K02DO2mmTFHqmFzBb2Tmv+qPm+MUJ6IpJykQdtFtmo/A/XGaSFM8R4vL+sppCs7er2S/iWGN/J7BHpwRoPZIueQ/sqBrQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '29a3b0b7a2c0ede78a5c169e230206ba';
$pushID = 'Uac069b56e27c635574a678d77c0f1f4b';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$MySMS = $_GET['sms'];
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('There is new orders coming in.');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







