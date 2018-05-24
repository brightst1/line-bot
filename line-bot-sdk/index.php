<?php

//require '/vendor/autoload.php';
require_once('line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = '85ygoELHTtBZzLh93gjML/kQRSq6fjVGCDKC4JYedPnbkA2vBOR3KUyg6UNOU1QqtxtmQS5KBiMJ9SCPcU4YQUntZKyN/89D5CR/C6POwFPSQICszzjBqzP4izKzUtfo7FDKMJblYwe5vlvE0BfH8QdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
//echo $content;
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			//Get UserId
			$userId = $event['source']['userId'];
			//Get TimeStamp
			$time = $event['timestamp'];
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			$posts = array('text'=>$text,'userId'=>$userId,'time'=>$time);
			
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,'http://befirst-it.dyndns.org:2019/bright/linebot/ws/create.php');
			curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$posts);
			$result = curl_exec($ch);
			curl_close($ch);
			
			
			// Build message to reply back
		/*	$messages = [
				'type' => 'text',
				'text' => $result
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			
			$chs = curl_init($url);
			curl_setopt($chs, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($chs, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($chs, CURLOPT_POSTFIELDS, $post);
			curl_setopt($chs, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($chs, CURLOPT_FOLLOWLOCATION, 1);
			$results = curl_exec($chs);
			curl_close($chs);
			echo $result . "\r\n";*/
		}
	}
}
echo "OK";
?>