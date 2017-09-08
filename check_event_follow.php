<?php
$access_token = 'Token';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		
		if($event['events']['type'] == 'follow'){
			 $replyToken = $event['replyToken'];
			 $messages = [
				'type' => 'follow',
				'text' => $event['type']
			];
			
		}else if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			$text = $event['message']['text'];
			
			 $replyToken = $event['replyToken'];

			 $messages = [
				'type' => 'text',
				'text' => $event['type']
			];
			 
		}else{
			$replyToken = $event['replyToken'];
			$messages = [
				'type' => $events['events'],
				'text' => $event['type']
			];
		 }
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

			echo "result : ".$result . "\r\n";
	}
}

echo "5";
var_dump($resut);

?>
