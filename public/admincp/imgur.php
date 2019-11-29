<?php
	
	function imgur_upload($anh)
	{
	   $client_id = 'd32a28252795ab8';
	   $file = file_get_contents($anh);
	   $url = 'https://api.imgur.com/3/image.json';
	   $headers = array("Authorization: Client-ID $client_id");
	   // $headers= [];
	   $pvars  = array('image' => base64_encode($file));
	   $curl = curl_init();
	   curl_setopt_array($curl, array(
	      CURLOPT_URL=> $url,
	      CURLOPT_TIMEOUT => 30,
	      CURLOPT_POST => 1,
	      CURLOPT_RETURNTRANSFER => 1,
	      CURLOPT_HTTPHEADER => $headers,
	      CURLOPT_POSTFIELDS => $pvars
	   ));
	   $json_returned = curl_exec($curl); // blank response
	   $img = json_decode($json_returned,true);
	   preg_match("#https://i.imgur.com/(.*)#",$img['data']['link'],$m);
	   return "https://imgur.com/".$m[1];
	   curl_close ($curl); 
	}

	$ig = imgur_upload( $_FILES["file"]["tmp_name"]);
	file_get_contents($ig);
	return $ig;