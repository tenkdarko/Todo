<?php

require_once 'app/init.php';

if(isset($_GET['as'], $_GET['item'])){
	$as = $_GET['as'];
	$item = $_GET['item'];

	switch ($as) {
		case 'done':
			
			$done = $db->prepare("
				UPDATE items
				SET done = 1
				where id = :item
				AND user = :user
				");

			$done->execute([
				'item' => $item,
				'user' => $_SESSION['user_id']
				]);

			break;
		
	}

}

header('location: index.php');

?>