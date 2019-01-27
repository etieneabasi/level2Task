<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['todo'])) {
	$_SESSION['tasks'][] =  array(
		'task' => $_POST['todo'],
		'done' => false,
	);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="fonts/css/all.css">
  <link rel="stylesheet" href="fonts/js/all.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<section id="phpCon  </div>tainer">
 <div class="container pt-5">
 <div class="">
     

<img src="images/php.png" height="200" width="300" class="todoForm d-block " alt="">
<div class="w-50 todoForm pt-5">
<h2 class="text-center">PhP Todo List</h2>
<form class="form-inline" method="POST">
 
  <input type="tesx" name="todo" class="form-control col-sm-10">
  <button type="submit" class="btn btn-primary col-sm-2">Submit</button>
</form>
</div>

<div class="table-responsive pt-5">
			<table class="table table-striped">
				<?php if (!empty($_SESSION['tasks'])): ?>
					<?php foreach ($_SESSION['tasks'] as $k => $v): ?>
						<tr>
							<td>
								<input type="checkbox" onchange="checkDone('<?=$k + 1?>')" <?= $v['done'] == true ? "checked" : "" ?>>
							</td>
							<td>
							<?php if ($v['done'] == true): ?>
								<s><?=$v['task']?></s>
							<?php else: ?>
								<?=$v['task'] ?>
							<?php endif; ?>
							</td>
							<td>
								<a href="crossDelete.php?action=delete&id=<?=$k + 1?>" class="text-danger">
									<i class="fas fa-times"></i>
								</a>
							</td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			</table>
		</div>
</div>
</div>
 </div>   
 </section>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script>
		function checkDone (id) {
			window.location.assign('crossDelete.php?action=done&id=' + id);
		}
	</script>

</body>
</html>