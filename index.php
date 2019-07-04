<!DOCTYPE html>
<html>
	<head>
		<title>Shiksha Recruitment Task </title>
		<meta charset="utf-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<header>
			<div class="jumbotron text-center">
			  <h1>Shiksha Recruitment Task </h1>
			</div>
		</header>
		<section class="container text-center">
			<form action="home.php" method="post" name="frm_user_type">
				<div>
					<fieldset class="border text-center" style="padding-top: 20px;margin-bottom: 5%;margin-top: 5%">
						<label>
							<select name="user_type" id="user_type" class="form-control" style="width: 250px;">
								<option value="0">User Type </option>
								<option value="1">Basic</option>
								<option value="2">Premium</option>
							</select>

							<br />

							<input type="submit" name="submit" id="submit" value="Submit" class="form-control bg-success text-white" disabled="disabled">

							<br />
						</label>
					</fieldset>
				</div>
			</form>
		</section>
		<footer class="jumbotron text-center" style="margin-bottom:0" >@copy Shiksha Recruitment Task</footer>
		<script type="text/javascript">
			$(document).ready(function(){
			  $("#user_type").change(function(){

			    if( 0 != $("#user_type").val() ) {
			    	$("#submit").attr( "disabled", false);
			    } else {
			    	$("#submit").attr( "disabled", true);
			    }
			    
			  });
			});
		</script>
	</body>