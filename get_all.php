<?php
	$page_number = $_GET['page_number'];
	$item_count = $_GET['item_count'];

	$from = $page_number*$item_count - ($item_count-1);
	$to = $page_number*$item_count;
	$response = array();
	$stats = array();

	if($to>80){
		array_push($response, array('status'=>'and'));
		echo json_encode($response);
	}else{
		array_push($response,array('status'=>'ok'));
		$count = $from;
		$images = array();
	}

	while ($count<=$to) {
		$image_path = "localhost/".$count.".jpg";
		array_push($images,array('id'=>$count,'image_path'=>$image_path));
		$count = $count+1;
	}

	array_push($response,array('images'=>$images));
	sleep(2);

	echo json_encode($response);
?>