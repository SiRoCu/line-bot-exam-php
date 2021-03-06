<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'Lj66bFMe6xCC+2vg7OzflrfMtzIG8ETXHeuhWswdsJU7Aw+SM7nirKYCwWnAUfqrL+JSb+SB1ZO7GgsUmHhrefAtoVzzPZhuJvlngyGwzds7Fjy7aO4q5Oa5/BjCeShNXXd+SOsJhf+U5xP5Eic4TgdB04t89/1O/w1cDnyilFU=';
//$access_token = "j3TpPDRdPt+bPQkcBxGmzaRFmvzVhSbwalp0oGqQGTxv3NYeq2ASalGT6K02DO2mmTFHqmFzBb2Tmv+qPm+MUJ6IpJykQdtFtmo/A/XGaSFM8R4vL+sppCs7er2S/iWGN/J7BHpwRoPZIueQ/sqBrQdB04t89/1O/w1cDnyilFU=";

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text     //Remove by SiRoCu 2018-06-08 (Remove UID response to sender)
				//'text' => ''
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
?>
