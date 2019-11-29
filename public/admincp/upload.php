<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>UPLOAD</title>
</head>
<style>
#file {
    width: 90%;
}
</style>

<body>
			<div class="acrylic shadow text-light">
			<?php
$app_id = "1938020632944405";
$app_secret = "06c7966d15469f59a110a0a9d1c93bfb";
$video_title = "Title";
$video_desc = "Title";
$group_id = "1083734385122579";
$access_token = "EAAAAAYsX7TsBAEGXshNClaBI3ie0Ewi3BtgFAz7iBBhXfn24ZAqqG7l69vG6P3FroTqpqtVQx5r7dZBfGVysDtdlZCGMFbbZChfUutTRVlWB4aPrNRZCZAhJZCcrQQr4hXDlCHngnWQKWEGKAbtMN7jV2PEZCOJlnwuCEPtDfP3W87ad4zyyFUGF";
$post_url = "https://graph-video.facebook.com/" . $group_id . "/videos?"
    . "title=" . $video_title. "&description=" . $video_desc
    . "&access_token=". $access_token;
$post_urls = "https://graph-video.facebook.com/" . $group_id . "/videos?"
    . "title=";
?>
		
<?php


echo '<form id="upload" enctype="multipart/form-data" action=" '.$post_url.' "  
     method="POST"><div class="input-group">';
echo '<input name="file" type="file" id="file" multiple onchange="processSelectedFiles(this)">
	';
echo '<input type="submit" value="Upload" /> ';
echo '</div></form>';

?>
				
              </div>
              
<script src="<?php echo '../themes/mdbootstrap/js/jquery-3.3.1.min.js'; ?>"></script>
<script>
function processSelectedFiles(fileInput) {
  var files = fileInput.files;

  for (var i = 0; i < files.length; i++) {
	  var title = "<?php echo $post_urls;?>" + files[i].name + "&description=" + files[i].name + "<?php echo "&access_token=". $access_token;?>"  ;
    $("#upload").attr("action", title);
	$("#filess").html(files[i].name);
  }
}
</script>