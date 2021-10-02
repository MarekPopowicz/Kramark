<!DOCTYPE html>
<html>
		
<head>

	<?php   
		require_once 'php/db_connection.php';
		$conn = OpenCon();
		require_once 'php/db_querySQL.php';
	?>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Witaj</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<link rel="stylesheet" href="css/tooplate-style.css">
	<script type="text/javascript" src="js/render.js"></script>

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
										<a href="#"  id="tmNavLink1" class="scrolly" data-bg-img="cloth_bg.jpg" 
											data-page="#tm-section-1">
											<i class="fa fa-shopping-bag tm-nav-fa-icon" aria-hidden="true"></i>

											<span>Ubrania</span>
										</a>
									</li>
									
									<li>
										<a href="#" id="tmNavLink2" class="scrolly" data-bg-img="textiles_bg.jpg" 
											data-page="#tm-section-2">
											<i class="fa fa-th tm-nav-fa-icon" aria-hidden="true"></i>

											<span>Tekstylia</span>
										</a>
									</li>							
								
									<li>
										<a href="#"  class="scrolly" data-bg-img="other_bg.jpg" 
											data-page="#tm-section-3">
											<i class="fa fa-umbrella tm-nav-fa-icon" aria-hidden="true"></i>
											<span>Inne</span>
										</a>
									</li>
										<br>
									<li>
										<a href="#" onclick="returnParent();">
											<i class="fas fa-angle-left  tm-nav-fa-icon"></i>
											<span>Wróć</span>
										</a>
									</li>
								</ul>
						</nav>
					</div>
				</div>
			</div>


			
	<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
			<?php 
			/* section 1 */
			
			$table = "clothes";
			$result = selectAllItems($conn, null, $table);
				if($result->num_rows==0){
						echo"<section id='tm-section-1' class='tm-section'>";
								include 'empty_bin.php';
						echo"</section>";
					}	
		
				else {
						echo"<section id='tm-section-1' class='tm-section'>";
								$title = 'Ubrania';
								include 'table.php';
						echo"</section>";
				}

/* section 2 */

			$table = "textiles";
			$result = selectAllItems($conn, null, $table);
				if($result->num_rows==0){
						echo"<section id='tm-section-2' class='tm-section'>";
								include 'empty_bin.php';
						echo"</section>";
					}	
		
				else {
						echo"<section id='tm-section-2' class='tm-section'>";
								$title = 'Tekstylia';
								include 'table.php';
						echo"</section>";
				}

/* section 3 */

			$table = "others";
			$result = selectAllItems($conn, null, $table);
				if($result->num_rows==0){
						echo"<section id='tm-section-3' class='tm-section'>";
								include 'empty_bin.php';
						echo"</section>";
					}	
		
				else {
						echo"<section id='tm-section-3' class='tm-section'>";
								$title = 'inne';
								include 'table.php';
						echo"</section>";
					}
?>

			</div>	<!-- .tm-content -->							
		</div>	<!-- row -->	
	</div>


		<div id="preload-01"></div>
		<div id="preload-02"></div>
		<div id="preload-03"></div>

		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="slick/slick.min.js"></script>
		<script type="text/javascript" src="js/site.js"></script>

		<script>
			function changeSection(section){
				history.pushState({id: 'homepage'}, '', '/site/' + section);
			}

		</script>

	</body>
</html>