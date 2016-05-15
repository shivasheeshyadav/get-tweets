<?php
	$qu=$_GET["query"];

	require "twitteroauth/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	$consumerkey = '';
	$consumersecret = '';
	$accesstoken = '';
	$accesstokensecret = '';

	$conn= new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
	$data=$conn->get("search/tweets",["q"=>urlencode($qu),"count"=>"5","result_type"=>"recent"]);
	$arr=array();
	foreach ($data->statuses as $value) {
		
		$ids=$value->id;
		$data2=$conn->get("statuses/oembed",["id"=>$ids,"hide_media"=>"true","align"=>"center"]);
		array_push($arr, $data2);
	}
	echo json_encode($arr);
	
?>


