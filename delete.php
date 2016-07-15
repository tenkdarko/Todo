<?php

require_once 'app/init.php';

	if(isset($_GET['as'],$_GET['item'])){

		$as = $_GET['as'];
		$item = $_GET['item'];

		if($as='delete'){

			$delete = $db->prepare("
					DELETE FROM items
					WHERE id = :item
					AND 
					user = :user
				");

			$delete->execute([
				'item' => $item,
				'user' => $_SESSION['user_id']
				]);

		}

	}

	header('location: index.php');

?>