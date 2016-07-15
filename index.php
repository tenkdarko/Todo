<?php

require_once 'app/init.php'; //Establishing a connection to the database on every page

$query = $db->prepare("
	SELECT id, name, done
	FROM items
	WHERE user = :user
	");

$query->execute(['user'=>$_SESSION['user_id']]);


$items = $query->rowCount() ? $query : [];
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>To Do</title>

<!-- Implementing google fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light' rel="stylesheet">
<!-- Google fonts end -->

	<link rel='stylesheet' href="css/main.css" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>



	<div class="list"> <!-- DIV list container -->

		<h1 class='header'> To DO. </h1>


		<?php if(!empty($items)): ?>

		<ul class='items'>

			<?php foreach ($items as $item): ?>

				<li>
					<span class="item <?php echo $item['done'] ? ' done' : ''?>"><?php echo $item['name']; ?></span>


					<!-- If item is not done show this -->
					<?php if(!$item['done']): ?>
						<a href='mark.php?as=done&item=<?php echo $item['id']?>' class='done-button'>Mark as done </a>
					<?php endif; ?>

					<!-- If item is done show this -->
					<?php if($item['done']): ?>
						<a href='delete.php?as=delete&item=<?php echo $item['id']?>' class='delete'>Delete</a>
					<?php endif; ?>
		
				</li>

			<?php endforeach; ?>
		</ul>
	<?php else: ?>
		<p> You have not added any items yet </p>
	<?php endif; ?>

		<form class='item-add' action="add.php" method='post'>
			<input type='text' name='name' placeholder='Type a new item here.' class='input' autocomplete="off" required>
			<input type='submit' value='Add' class='submit' />
		</form>

	</div> <!-- DIV LIST END -->


</body>
</html>