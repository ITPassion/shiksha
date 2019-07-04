<?php 
	$arrIpAddresses = $strIpAddress = $intUserType = NULL;

	if( true == isset( $_POST ) && true == is_array( $_POST ) ) {
		if( true == array_key_exists( 'row_count', $_POST ) ) {

			for( $i = 1; $i <= 3; $i++ ) {
				if( true == array_key_exists( 'ip_' . $i, $_POST ) ) {
					$arrIpAddresses[$i] = $_POST['ip_' . $i];
				}
			}
		}

		if( false == array_key_exists( 'user_type', $_POST ) ) {
			echo "<script>alert('Please select the user first');window.location='index.php'</script>";
		}

		$intUserType = $_POST['user_type'];
	}

	$intRowCount = ( NULL != $arrIpAddresses ) ? count( $arrIpAddresses ) : 1;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Shiksha Recruitment Task </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			arrIpAddresses = localStorage.getItem("ip_addresses");
			if( true == Array.isArray( arrIpAddresses ) ) {
				arrIpAddresses.forEach( alertify );
			}
			

			function alertify( item, index) {
				alert( item );
			}
		</script>
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
						
							<?php if( NULL != $arrIpAddresses ) {
									foreach ($arrIpAddresses as $strkey => $strIpAddress ) {
										# code...
									
								?>
							
									<div class=" <?php echo( 'row_' . $strkey ) ?> row_1 form-group form-inline" style="padding-bottom: 5px;margin-bottom: 1%;" id="<?php echo( 'row_' . $strkey ) ?>">
										<label>
											<input type="text" name="<?php echo( 'ip_' . $strkey ) ?>" id="<?php echo( 'ip_' . $strkey ) ?>" class="text-center bg-info" onchange="storeInput();" value="<?php echo( $strIpAddress ) ?>" placeholder="Enter valid Ip Address"> &nbsp; &nbsp;
											
											<span class="remove glyphicon glyphicon-minus text-info" id="<?php echo( 'minus_' . $strkey ) ?>" onclick="removeElement( this );" <?php if( 1 == $intRowCount ) {
												echo "style='display: none'";
											} ?>></span> &nbsp; &nbsp;

											<span class="add glyphicon glyphicon-plus text-info" onclick="createRow( this);" id="<?php echo( 'add_' . $strkey ) ?>" <?php if( 1 == $intRowCount || $strkey == $intRowCount - 1 ) { echo "style='display: none'"; ?> ></span>
											<?php } ?>
											<br />
										</label>
									</div>
							<?php 
									}
								} else {
									?>
										<div class="form-group form-inline" style="padding-bottom: 5px;margin-bottom: 1%;" id="row_1">
											<label>
												<input type="text" name="ip_1" id="ip_1" class="text-center bg-info" onchange="storeInput();" value="<?php echo( $strIpAddress ) ?>" placeholder="Enter valid Ip Address"> &nbsp; &nbsp;

												<span class="remove glyphicon glyphicon-minus text-info" id="minus_1" onclick="removeElement( this );" style="display: none;"></span> &nbsp; &nbsp;

												<span class="add glyphicon glyphicon-plus text-info" onclick="createRow( this);" id="add_1"></span>
												
												<br />
											</label>
										</div>
									<?php 
								}
							?>

							<div class="form-inline form-group">
								<label>
									<input type="submit" name="submit" id="submit" value="Submit" disabled="disabled" class="bg-info text-info">
									<input type="button" name="reset" id="reset" value="Reset" onclick="resetPage();" class="bg-info text-info">
									<input type="hidden" name="row_count" value="<?php echo( $intRowCount ) ?>" id="row_count">
									<?php if( NULL != $intUserType ) {
										?>
										<input type="hidden" name="user_type" value="<?php echo( $intUserType ) ?>" id="user_type">
									<?php } ?>
								</label>
							</div>
					</fieldset>
				</div>
			</form>
		</section>
		<footer class="jumbotron text-center" style="margin-bottom:0" >@copy Shiksha Recruitment Task</footer>
		<script type="text/javascript">
			
			function resetPage() {
				// body...
				localStorage.removeItem("ip_addresses");
				window.location = '';
			}	  

			function removeElement( objElement ) {
				rowCount = parseInt( $("#row_count").val() );
				userType = parseInt( $("#user_type").val() );

				$(objElement).parent().parent().remove();
				updatedRowCount = rowCount - 1;
				$("#row_count").val(updatedRowCount);

				if( 1 == updatedRowCount ) {
					$('span[id^="minus_"]').attr("style", "display: none");
					$('span[id^="add_"]').attr("style", "display: inline");
				} else {
					$('span[class^="minus"]').each(function(){
						$(this).attr("style", "display: inline");
					});
				}

				if( 1 == userType && 5 >  updatedRowCount ) {
					totalRows = $('span[class^="add"]').length;
					$('span[class^="add"]').each(function(index){
						if( index == totalRows - 1 ) {
							$(this).attr("style", "display: inline")
						}
					});
					
				} else if ( 2 == userType && 10 > updatedRowCount ) {
					totalRows = $('span[class^="add"]').length;
					$('span[class^="add"]').each(function(index){
						if( index == totalRows - 1 ) {
							$(this).attr("style", "display: inline")
						}
					});
				}
			}

			function storeInput() {  

				rowCount = $("#row_count").val();
				validIp = false;
				arrIpAddresses = [];
				row = 0;

				$('input[id^="ip_"]').each(
					function() {
						row++;
						if ( '' == $(this).val() ) {
							return;
						} else if ( false == validateIpAddress( this ) ) {  
						    validIp = false;
						    $(this).focus();
						    $("#submit").attr( "disabled", true);
						    alert( "You have entered an invalid IP address!");
						  	return false;
						} else {
							validIp = true;
							arrIpAddresses[row] = $(this).val();
						}
				});

				if( true == validIp ) {
					$("#submit").attr( "disabled", false);
					localStorage.setItem( "ip_addresses", arrIpAddresses );
				}
				
			  	return true;
			}

			function validateIpAddress( objElement ) {  

			  if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test($(objElement).val())) {  
			    return true;
			  }  
			 
			  return false;
			}

			function createRow( objElement ) {
				rowCount = $("#row_count").val();
				userType = $("#user_type").val();

				nextRowCount = parseInt(rowCount) + 1;
				rowContent = "<div style='padding-bottom: 5px;margin-bottom: 1%;' id='row_" + nextRowCount + "'> " + 
								"<label>" + 
									"<input type='text' name='ip_" + nextRowCount + "' id='ip_" + nextRowCount + "'' class='text-center bg-info' onchange='storeInput();' placeholder='Enter valid Ip Address'> &nbsp; &nbsp;" +
									"<span class='remove glyphicon glyphicon-minus text-info' id='minus_" + nextRowCount + " ' onclick='removeElement( this );'></span> &nbsp; &nbsp;" +
									"<span class='add glyphicon glyphicon-plus text-info' onclick='createRow( this);' id='add_" + nextRowCount + "'></span>" +

									"<br />" +
								"</label>" +
							"</div>";

				$(objElement).parent().parent().after( rowContent );

				$(objElement).attr("style", "display: none");

				if( 1 == userType && 5 <=  nextRowCount ) {
					$('span[class^="add"]').each(function(){ $(this).attr("style", "display: none")});
				} else if ( 2 == userType && 10 <= nextRowCount ) {
					$('span[class^="add"]').each(function(){$(this).attr("style", "display: none")});
				}

				$('span[class^="remove"]').each(function(){ 
					$(this).attr("style", "display: inline")
				});
				$("#row_count").val(nextRowCount);
			}
		</script>
	</body>