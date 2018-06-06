<?php



require "vendor/autoload.php";

$access_token = 'Lj66bFMe6xCC+2vg7OzflrfMtzIG8ETXHeuhWswdsJU7Aw+SM7nirKYCwWnAUfqrL+JSb+SB1ZO7GgsUmHhrefAtoVzzPZhuJvlngyGwzds7Fjy7aO4q5Oa5/BjCeShNXXd+SOsJhf+U5xP5Eic4TgdB04t89/1O/w1cDnyilFU=';

$channelSecret = '058227fd278642d31374ec2b3a0a1c55';

$pushID = 'Uec36e7ef10fefc1b2a26f329628a80ed';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







