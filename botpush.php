<?php



require "vendor/autoload.php";

$access_token = '3ALKAbKFoGuJyJnoDdn0HeyfbxLFtEXBKiC0lFeoNl/XbL4WhoCZzefp2n7UDuXaCWfErIDro07BnZNggJmXJChXTIlMPo8LRJ+n1LEgbRUaKehDkiCr5p5CakHrPX+gauOGX/R5bB2e5yi7xjnHDAdB04t89/1O/w1cDnyilFU=';
//$access_token = 'j3TpPDRdPt+bPQkcBxGmzaRFmvzVhSbwalp0oGqQGTxv3NYeq2ASalGT6K02DO2mmTFHqmFzBb2Tmv+qPm+MUJ6IpJykQdtFtmo/A/XGaSFM8R4vL+sppCs7er2S/iWGN/J7BHpwRoPZIueQ/sqBrQdB04t89/1O/w1cDnyilFU=';

//$channelSecret = '75c03f392f6e53d662d6f5a8db9e421f';
$channelSecret = '058227fd278642d31374ec2b3a0a1c55';

$pushID = 'Uec36e7ef10fefc1b2a26f329628a80ed'; //Me

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







