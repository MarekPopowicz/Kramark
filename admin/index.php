
<?php 
	include 'php/db_connection.php';
    include 'php/db_querySQL.php';
?>

<html>


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Administracja</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/tooplate-style.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

	<script type="text/javascript" src="js/render.js"></script>

	<script>

		function getCookie(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
			return null;
		}

	</script>
										
									
</head>


<body>

	<!-- Loader -->
	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>
	
	<!-- Page Content -->
	<div class="container-fluid tm-main">
		<div class="row tm-main-row">

			<!-- Sidebar -->
			<div id="tmSideBar" class="col-xl-3 col-lg-4 col-md-12 col-sm-12 sidebar">

					<button id="tmMainNavToggle" class="menu-icon">&#9776;</button>

					<div  class="sidebar-item" >
						<div class="make-me-sticky">
						<nav id="tmMainNav" class="tm-main-nav">
							<ul>
								<li>
									<a href="#add" id="tmNavLink1" class="scrolly" data-bg-img="add_bg.jpg" 
										data-page="#tm-section-1">
										<i class="fas fa-plus tm-nav-fa-icon"></i>
										<span>Dodaj</span>
									</a>
								</li>
								<li>
									<a href="#edit" id="tmNavLink2" class="scrolly" data-bg-img="edit_bg.jpg" 
										data-page="#tm-section-2">
										<i class="fas fa-edit tm-nav-fa-icon"></i>
										<span>Edytuj</span>
									</a>
								</li>							
							
								<li>
									<a href="#del" id="tmNavLink3" class="scrolly" data-bg-img="del_bg.jpg" 
										data-page="#tm-section-3">
										<i class="fas fa-minus tm-nav-fa-icon"></i>
										<span>Usuń</span>
									</a>
								</li>

								<br>
								<li>
									<a href="#site" onclick="returnParent();">
										<i class="fas fa-window-maximize  tm-nav-fa-icon"></i>
										<span>Strona</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div><!-- Sidebar -->

			<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
					<!-- section 1 -->
					<section id="tm-section-1" class="tm-section">

    						<div class='tm-content'>
								<div class='row'>
            
										<?php 
										echo"<h3 class='tm-text-shadow'><img src='img/icons/add.png' width='60px'>  Dodaj przedmiot do tabeli</h3> &emsp;";
										include 'stuff_list.php';
								echo"</div>
							</div>";
											$conn = OpenCon();

											if(isset($_COOKIE['optVal'])){
												$result = getNextID($conn, $_COOKIE['optVal']);?>
												<script>
													var opt = '<?php echo"$_COOKIE[optVal]";?>';
													$('select').val(opt);
												</script>
											<?php	

											}
											else { ?>
												<script>
													$('select').val('agds');
												</script>
											<?php	
												$result = getNextID($conn, "agds");
									}
												echo"
													<div class='form-group'>
														<h4 class='tm-text-shadow'>ID: $result</h4>
													</div>

									<div class='tm-bg-transparent-black'>
										<form  name='add-form' action = 'add_response.php' method='post' id='add-form'>

												<div class='col-xl-12'>

												<div class='form-group'>
													<label for='_name'>Nazwa</label>
													<input type='text' class='form-control' name='_name' required>
												</div>

												<div class='form-group'>
													<label for='_description'>Szczegóły</label>
													<textarea name='_description' class='form-control' rows='3' cols='28' rows='5' required></textarea> 
												</div>
												
												<div class='form-group'>
													<label for='_condition'>Stan</label>
													<input type='tetxt' class='form-control' name='_condition' required>
												</div>
												
												<div class='form-group'>
													<label for='_price'>Cena</label>
													<input type='text' class='form-control' name='_price'  required>
												</div>
												
												<div class='form-group'>
													<label for='_status'>Status</label>
													<input type='text' class='form-control' name='_status' value='Dostępny' required>
												</div>

											</div>
											<br>
											<div class='row'>
													<div class='col-md-6 '>

														<div class='form-group'>
															<label for='_photo1_min'>Min. foto 1</label>
															<input type='text' class='form-control' name='_photo1_min' value ='$result-1s.jpg' required>
														</div>
														<div class='form-group'>
															<label for='_photo2_min'>Min. foto 2</label>
															<input type='text' class='form-control' name='_photo2_min' value ='$result-2s.jpg' required>
														</div>
														<div class='form-group'>
															<label for='_photo3_min'>Min. foto 3</label>
															<input type='text' class='form-control' name='_photo3_min' value ='$result-3s.jpg' required>
														</div>
														<div class='form-group'>
															<label for='_photo4_min'>Min. foto 4</label>
															<input type='text' class='form-control' name='_photo4_min' placeholder='$result-4s.jpg'>
														</div>
														<div class='form-group'>
															<label for='_photo5_min'>Min. foto 5</label>
															<input type='text' class='form-control' name='_photo5_min' placeholder='$result-5s.jpg'>
														</div>
														<div class='form-group'>
															<label for='_photo6_min'>Min. foto 6</label>
															<input type='text' class='form-control' name='_photo6_min' placeholder='$result-6s.jpg'>
														</div>
													</div>

													<div class='col-md-6 '>

														<div class='form-group'>
															<label for='_photo1'>Foto 1</label>
															<input type='text' class='form-control' name='_photo1' value ='$result-1.jpg' required>
														</div>
														<div class='form-group'>
															<label for='_photo2'>Foto 2</label>
															<input type='text' class='form-control' name='_photo2' value ='$result-2.jpg' required>
														</div>
														<div class='form-group'>
															<label for='_photo3'>Foto 3</label>
															<input type='text' class='form-control' name='_photo3' value ='$result-3.jpg' required>
														</div>
														<div class='form-group'>
															<label for='_photo4'>Foto 4</label>
															<input type='text' class='form-control' name='_photo4' placeholder='$result-4.jpg'>
														</div>
														<div class='form-group'>
															<label for='_photo5'>Foto 5</label>
															<input type='text' class='form-control' name='_photo5' placeholder='$result-5.jpg'>
														</div>
														<div class='form-group'>
															<label for='_photo6'>Foto 6</label>
															<input type='text' class='form-control' name='_photo6' placeholder='$result-6.jpg'>
														</div>
													</div>


											</div>";
											 			$conn -> close();
														unset($conn);

														

													echo"<div class='col-md-12 row' style = 'margin-top: 20px'>
														<div class='col-md-2'>
																<button type='submit' onclick='setProductID_Cookie($result);' class='tm-btn tm-btn-submit' name='submit' value='submit' id='submit_form'>Zapisz</button>
														</div>
														<div class='col-md-2'>
																<input type='text' id = 'destination' class='form-control' name='tablename' hidden >
														</div>
													</div>";


													
													?>
														<script>
															$('#destination').val($('select').val());
														</script>
										</form>
									</div>
								<!-- </div> -->
							
					</section>

					<!-- section 2 -->
					<section id="tm-section-2" class="tm-section">
						<div class='tm-content'>
							<div class='row'>
								
								<?php 
								echo"<h3 class='tm-text-shadow'><img src='img/icons/edit.png' width='60px'>  Edytuj przedmiot z tabeli</h3> &emsp;";
									include 'stuff_list.php';
									$conn = OpenCon();
									$table="";
									if(isset($_COOKIE['optVal'])){
									$table=$_COOKIE['optVal'];
									$result = selectAllItems($conn, null, $table);										
								?>
									<script>
										var opt = '<?php echo"$_COOKIE[optVal]";?>';
										$('select').val(opt);
									</script>
								<?php	
									}
									else { 
											$table = "agds"; ?>
											<script>$('select').val('agds');</script>
											<?php $result = selectAllItems($conn, null, $table);
										}
											?>
									
							</div>
						</div>

									<div class='tm-bg-transparent-black'>
										<div class='table-responsive'>

												<table id=table_edit class='table table-bordered table-hover table-sm'>
													<thead>
														<tr>
														<th>Nr</th>
														<th>Przedmiot</th>
														<th>Nazwa</th>
														<th>Szczegóły</th>
														<th>Cena</th>
														</tr>
													</thead>
							
													<tbody>
													<?php 
														$photoPath =  "../site/img/photo/".$table."/";
														include 'php/table_data.php';
														$conn -> close();
														unset($conn);
													?>
													</tbody>
												</table>
										</div>
								</div>				
					</section>

					<!-- section 3 -->
					<section id="tm-section-3" class="tm-section">
					<div class='tm-content'>
							<div class='row'>
								
								<?php 
								echo"<h3 class='tm-text-shadow'><img src='img/icons/del.png' width='60px'>  Usuń przedmiot z tabeli</h3> &emsp;";
									include 'stuff_list.php';
									$conn = OpenCon();
									$table="";
									if(isset($_COOKIE['optVal'])){
									$table=$_COOKIE['optVal'];
									$result = selectAllItems($conn, null, $table);										
								?>
									<script>
										var opt = '<?php echo"$_COOKIE[optVal]";?>';
										$('select').val(opt);
									</script>
								<?php	
									}
									else { 
											$table = "agds"; ?>
											<script>$('select').val('agds');</script>
											<?php $result = selectAllItems($conn, null, $table);
										}
											?>
									
							</div>
						</div>

									<div class='tm-bg-transparent-black'>
										<div class='table-responsive'>

												<table id=table_del class='table table-bordered table-hover table-sm'>
													<thead>
														<tr>
														<th>Nr</th>
														<th>Przedmiot</th>
														<th>Nazwa</th>
														<th>Szczegóły</th>
														<th>Cena</th>
														</tr>
													</thead>
							
													<tbody>
													<?php 
														$photoPath =  "../site/img/photo/".$table."/";
														include 'php/table_data.php';
														$conn -> close();
														unset($conn);
													?>
													</tbody>
												</table>
										</div>
								</div>	
					</section>

					<!-- section 4 -->
					<section id="tm-section-4" class="tm-section">
						<div class='tm-content'>
								<div class='row'>
										<?php 
											$conn = OpenCon();

											if(isset($_COOKIE['product'])){
												$prod = (int)$_COOKIE['product'];
												$result = selectAllItems($conn, $prod, $table);
												$row = $result->fetch_assoc();
											}

											switch ($table) {
												case "phones":
													$tableName = "'Telefony i akcesoria'";
												  break;
												case "computers":
													$tableName = "'Komputery i akcesoria'";
												  break;
												case "agds":
													$tableName = "'AGD'";
												  break;
												  case "furnitures":
													$tableName = "'Umeblowanie'";
												  break;
												  case "dvds":
													$tableName = "'DVD'";
												  break;
												  case "books":
													$tableName = "'Książki'";
												  break;
												  case "textiles":
													$tableName = "'Tekstylia'";
												  break;
												  case "tools":
													$tableName = "'Narzędzia i materiały'";
												  break;
												  case "miscellaneous":
													$tableName = "'Różne'";
												  break;
												  case "others":
													$tableName = "'Inne'";
												  break;
												  case "cds":
													$tableName = "'CD'";
												  break;
												  case "rtvs":
													$tableName = "'RTV'";
												  break;
												  case "clothes":
													$tableName = "'Ubrania'";
												  break;
												default:
												$tableName = "'AGD'";
											  } 

										echo"<h3 class='tm-text-shadow'><img src='img/icons/edit.png' width='60px'> Edycja przedmiotu nr <span id='productNo' class='details'></span> w tabeli <span class='details'>$tableName</span> "; ?> 
									 <script>
										 var cookie = getCookie("product");
										 document.getElementById("productNo").innerHTML = cookie;
									 </script>

									 </h3>
	
					<?php
							echo"</div>
						</div>";	
						echo"<div class='tm-bg-transparent-black'>
									<form  name='add-form' action = 'update_response.php' method='post' id='add-form'>

												<div class='col-xl-12'>

												<div class='form-group'>
													<input type='text' class='form-control' name='_id' value = '".$row['_id']."' hidden>
												</div>

												<div class='form-group'>
													<label for='_name'>Nazwa</label>
													<input type='text' class='form-control' name='_name' value = '".$row['_name']."' required>
												</div>

												<div class='form-group'>
													<label for='_description'>Szczegóły</label>
													<textarea name='_description' class='form-control' rows='3' cols='28' rows='5'>".$row['_description']."</textarea> 
												</div>
												
												<div class='form-group'>
													<label for='_condition'>Stan</label>
													<input type='tetxt' class='form-control' name='_condition' value = '".$row['_condition']."' required>
												</div>
												
												<div class='form-group'>
													<label for='_price'>Cena</label>
													<input type='text' class='form-control' name='_price' value = '".$row['_price']."' required>
												</div>
												
												<div class='form-group'>
													<label for='_status'>Status</label>
													<input type='text' class='form-control' name='_status' value = '".$row['_status']."' required>
												</div>

											</div>
											<br>
											<div class='row'>
													<div class='col-md-6 '>

														<div class='form-group'>
															<label for='_photo1_min'>Min. foto 1</label>
															<input type='text' class='form-control' name='_photo1_min' value = '".$row['_id']."-1s.jpg' required>
														</div>
														<div class='form-group'>
															<label for='_photo2_min'>Min. foto 2</label>
															<input type='text' class='form-control' name='_photo2_min' value = '".$row['_id']."-2s.jpg' required>
														</div>
														<div class='form-group'>
															<label for='_photo3_min'>Min. foto 3</label>
															<input type='text' class='form-control' name='_photo3_min' value ='".$row['_id']."-3s.jpg' required>
														</div>
														<div class='form-group'>
															<label for='_photo4_min'>Min. foto 4</label>
															<input type='text' class='form-control' name='_photo4_min' placeholder='".$row['_id']."-4s.jpg'>
														</div>
														<div class='form-group'>
															<label for='_photo5_min'>Min. foto 5</label>
															<input type='text' class='form-control' name='_photo5_min' placeholder='".$row['_id']."-5s.jpg'>
														</div>
														<div class='form-group'>
															<label for='_photo6_min'>Min. foto 6</label>
															<input type='text' class='form-control' name='_photo6_min' placeholder='".$row['_id']."-6s.jpg'>
														</div>
													</div>

													<div class='col-md-6 '>

														<div class='form-group'>
															<label for='_photo1'>Foto 1</label>
															<input type='text' class='form-control' name='_photo1' value ='".$row['_id']."-1.jpg' required>
														</div>
														<div class='form-group'>
															<label for='_photo2'>Foto 2</label>
															<input type='text' class='form-control' name='_photo2' value ='".$row['_id']."-2.jpg' required>
														</div>
														<div class='form-group'>
															<label for='_photo3'>Foto 3</label>
															<input type='text' class='form-control' name='_photo3' value ='".$row['_id']."-3.jpg' required>
														</div>
														<div class='form-group'>
															<label for='_photo4'>Foto 4</label>
															<input type='text' class='form-control' name='_photo4' placeholder='".$row['_id']."-4.jpg'>
														</div>
														<div class='form-group'>
															<label for='_photo5'>Foto 5</label>
															<input type='text' class='form-control' name='_photo5' placeholder='".$row['_id']."-5.jpg'>
														</div>
														<div class='form-group'>
															<label for='_photo6'>Foto 6</label>
															<input type='text' class='form-control' name='_photo6' placeholder='".$row['_id']."-6.jpg'>
														</div>
													</div>


											</div>";
											 			$conn -> close();
														unset($conn);

													echo"<div class='col-md-12 row' style = 'margin-top: 20px'>
														<div class='col-md-2'>
																<button type='submit' class='tm-btn tm-btn-submit' name='submit' value='submit' id='submit_form'>Zapisz</button>
														</div>
														<div class='col-md-2'>
																<input type='text' id = 'destination' class='form-control' name='tablename' value = '".$table."' hidden >
														</div>
													</div>";
													
													?>
										</form>
							</div>
					</section>
			</div>
		</div>	<!-- row -->	
	</div> <!-- container -->


		<div id="preload-01"></div>
		<div id="preload-02"></div>
		<div id="preload-03"></div>


		<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="js/administer-site.js"></script>
		
		<script>
		/*  */
	$(document).ready(function() {
		$('select').on('change', function() {
				setCookie('optVal', this.value, 7);

				window.location.reload(false);
			});
		}); 

		function setProductID_Cookie(prodID){
			setCookie('product', prodID, 5);

		}
		
		</script>
	</body>
</html>	