<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Database Script</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="app.css">
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
			<div class="heading">
				PHP Script - Database 
			</div>
				<form method="POST" action="script.php" id="form">
				    
				    <label for="text">Enter database name</label>
					<div class="input-group">
				    	<span class="input-group-addon">elawyer_</span>
				    	<input type="text" name="db" class="form-control" id="text">
				  	</div>

	  				<button type="submit" name="create" class="btn btn-success btn-block" id="submit">Create Now</button>
				
				</form>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<?php
					if(isset($_GET['success'])){
						echo "<div class=\"alert alert-success\" id=\"success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Database has been successfully created!</div>";
					}
				?>		
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>