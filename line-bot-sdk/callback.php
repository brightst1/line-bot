<?php
/*
	//define("LINE_MESSAGING_API_CHANNEL_SECRET", 'your channel secret');
	//define("LINE_MESSAGING_API_CHANNEL_TOKEN", 'your channel token');
	require __DIR__."/vendor/autoload.php";
	$access_token = "85ygoELHTtBZzLh93gjML/kQRSq6fjVGCDKC4JYedPnbkA2vBOR3KUyg6UNOU1QqtxtmQS5KBiMJ9SCPcU4YQUntZKyN/89D5CR/C6POwFPSQICszzjBqzP4izKzUtfo7FDKMJblYwe5vlvE0BfH8QdB04t89/1O/w1cDnyilFU=";
	//$bot = new \src\LINEBOT(new \src\LINEBOT\HTTPClient\CurlHTTPClient(LINE_MESSAGING_API_CHANNEL_TOKEN),['ChannelSecret']=>LINE_MESSAGING_API_CHANNEL_SECRET);
	//$bot = new 
	//$signature = $_SERVER["HTTP".\src\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
	$body = file_get_contents("php://input");
	//$events = $bot->parseEventRequest($body,$signature);
	$events = json_decode($body,true);
	foreach($events as $event){
		if($event instanceof \src\LINEBOT\Event\MessageEvent\TextMessage){
			$reply_token = $event->getReplyToken();
			$text = $event->getText();
			$bot->replyText($reply_token,$text);
		}
	}
	if (!is_null($events['events'])) {
		foreach($events as $event){
			if($event['type'] == 'message' && $event['message']['type']== 'text'){
				$text = $event['source']['userId'];
				$replyToken = $event['replyToken'];
				$message = ['type'=>'text',
							'text'=>$text];
				$url =  'https://api.line.me/v2/bot/message/reply';
				$data = ['replyToken' => $replyToken,
						 'message'=>[$message]];
				$post = json_encode($data);
				$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
				
				$ch = curl_init($url);
				curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
				curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
				curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
				curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
				$result = curl_exec($ch);
				curl_close($ch);
				echo $result . "\r\n";
			}
		}
	}
	ob_start();
	$raw = file_get_contents('php://input');
	var_dump(json_decode($raw,1));
	$raw = ob_get_clean();
	file_put_contents('tmp/dump.txt',"\r\n". $raw."\r\n");
	
	*/
	echo "OK";
	
	/*ob_start();
	$raw = file_get_contents('php://input');
	$myfile = fopen("tmp/dump.txt","w") or die("Unable to open file");
	fwrite($myfile,$raw);
	fclose($myfile);*/
	//var_dump(json_decode($raw,1));
	//echo print_r(json_decode($raw));
	//$raw = ob_get_clean();
	//file_put_contents('/tmp/dump.txt', $raw."\n=====================================\n", FILE_APPEND);
	//echo "OK";
	
?>