<?php
$file_name = $_FILES['file']['tmp_name'];
$file_size = filesize( $file_name ) ;

/**
	--- Nếu là user thì để là $id=me
	--- Nếu upload fanpage, group thì để $listFanpageGroup = array list fanpage upload random fanpage
*/

// nếu up profile thì uncomment dòng dưới
$id = "1083734385122579";


$urlPost = 'https://graph-video.facebook.com/v2.3/'.$id.'/videos';
$access_token = "EAACW5Fg5N2IBAMuCWwmr1bZAGUfUdWZBZAKZBajUMpWgigUV7IlqeqgI4s8hubcD1nAb3OUOy2r8LEHWAOs8ccccbERx7J8rJTm7UpXBoW6juGTk8isMOn686QoZAFZB9BevtKmI0PcshfOWjrhPMQ1TKY6jv0ZC8iiRVUX8NZAdeQZDZD";
$postField = [
	'access_token' => $access_token,
	'upload_phase' => 'start',
	'file_size' => $file_size
];
$fbOBJ = curl($urlPost, false, $postField);
$fbOBJ = json_decode($fbOBJ);
$uploadSessionId = $fbOBJ->upload_session_id;
$uploadVideoId = $fbOBJ->video_id;
$startOffsets = $fbOBJ->start_offset;
$endOffsets = $fbOBJ->end_offset;


$chunk_size = 1024 * 1024;
$range_start = 0 ;
#echo $file_size;die;
$isFinished = false;
$part = 1;
$currentStartOffset = 0;
$currentEndOffset = 0;
while(!$isFinished) {
	$currentStartOffset = $startOffsets;
    $currentEndOffset = $endOffsets;
	while ($file_size > $currentStartOffset)
    {
		//echo ($part + 1) . '----'.$currentStartOffset . '-----------' . $currentEndOffset . "\n";
		$pathChunk = __DIR__ .'/part'.$part;
		$to_send = file_get_contents( $file_name, false, NULL, $currentStartOffset, $currentEndOffset - $currentStartOffset);
		file_put_contents($pathChunk,$to_send);
		
		$transfer = array();
		$transfer["access_token"]      = $access_token;
		$transfer["upload_phase"]      = "transfer";
		$transfer["upload_session_id"] = $uploadSessionId;
		$transfer["start_offset"]      = $currentStartOffset;
		$fbOBJ = curl($urlPost, $pathChunk, $transfer);
		$fbOBJ = json_decode($fbOBJ);
		
		$currentStartOffset = $fbOBJ->start_offset;
        $currentEndOffset = $fbOBJ->end_offset;
		$part++;
		unlink($pathChunk);
	}
	$isFinished = true;
}
$postField = [
	'access_token' => $access_token,
	'upload_phase' => 'finish',
	'upload_session_id' => $uploadSessionId,
	'privacy' => '{"value":"SELF"}',
	'title' => $_FILES['file']['name'],
	'description' =>  $_FILES['file']['name']
];
$fbOBJ = curl($urlPost, false, $postField);
echo $uploadVideoId;

function curl($url, $fileData = false, $field) {
	if ($fileData) {
		$video_file_chunk = new CURLFile($fileData,'video/mp4');
		$field['video_file_chunk'] = $video_file_chunk;
	}
	$curl_connection = curl_init($url);

	//set options
	curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);

	//set data to be posted
	curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $field);

	//perform our request
	$transfer_response = curl_exec($curl_connection);
	//show information regarding the request
	//print_r(curl_getinfo($curl_connection));
	//echo curl_errno($curl_connection).'-'.curl_error($curl_connection);

	//close the connection
	curl_close($curl_connection);
	
	return $transfer_response;
}
?>