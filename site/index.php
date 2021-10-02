<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Witaj</title>
<!--


-->
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
								<a href="#intro" id="tmNavLink1" class="scrolly" data-bg-img="section1_bg.jpg" 
									data-page="#tm-section-1">
									<i class="fas fa-home tm-nav-fa-icon"></i>
									<span>Witaj</span>
								</a>
							</li>
							<li>
								<a href="#products" id="tmNavLink2" class="scrolly" data-bg-img="section2_bg.jpg" 
									data-page="#tm-section-2">
									<i class="fas fa-map tm-nav-fa-icon"></i>
									<span>Oferta</span>
								</a>
							</li>							
						
							<li>
								<a href="#contact" class="scrolly" data-bg-img="section3_bg.jpg" 
									data-page="#tm-section-3">
									<i class="fas fa-comments tm-nav-fa-icon"></i>
									<span>Kontakt</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div><!-- Sidebar -->

			<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 tm-content">
					<!-- section 1 -->
					<section id="tm-section-1" class="tm-section">

						<div class="tm-bg-transparent-black"  style="padding: 30px;">

							<div class="row mb-4">
								<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
									<header><h2 class="tm-text-shadow" style="color: rgba(253, 197, 43, 0.89);">Witaj</h2></header>
								</div>

							
							</div>

							<div style="text-align:justify;">
									<p style="color: white;  font-size: 20px">
										Trafiłeś na stronę poświęconą prezentacji przedmiotów wystawionych do sprzedaży. Są tu rzeczy mniej lub bardziej używane, ale trafią się i takie, które pozostały "nietknięte". 
									</p>
									<p style="color: white;  font-size: 20px; padding-bottom: 5%">
										Zachęcam do obejrzenia tych przedmiotów, zapoznania się z ich opisem, a gdy już zdecydujesz się wydać parę groszy na ich nabycie, skontaktuj się ze mną.
									</p>
							</div>		
							
							<div class="row mb-4">
								<div class="col-md-12">
									<a href="/site/index.php?section=#tm-section-2" class="btn tm-btn tm-font-big" data-nav-link="#tmNavLink2">Dalej...</a>
								</div>
							</div>
							<div style="text-align: right;">
									<?php echo "<p>Copyright &copy; 2020-" . date("Y") . " kramark.pl</p>";?>
							</div>
						</div>
					</section>

					<section id="tm-section-2" class="tm-section">						
				
						<div class="row">
							<div class="col-sm-12 col-md-6 col-lg-12 col-xl-6 mb-4">
								<div class="media tm-bg-transparent-black tm-border-white">
									<i class="mr-4 tm-icon-circled tm-icon-media"><img src="img/icons/books_ico.png" alt="Books" style="width:80px;"></i>	
									<div class="media-body">
										<a href="books.php?section=#tm-section-1" target="_parent"><h3 >Książki i Nośniki</h3></a>
										<p>Książki, Czasopisma, Płyty CD, Płyty DVD...</p>
									</div>
								</div>
							</div>	

							<div class="col-sm-12 col-md-6 col-lg-12 col-xl-6 mb-4">
								<div class="media tm-bg-transparent-black tm-border-white">
									<i class="mr-4 tm-icon-circled tm-icon-media"><img src="img/icons/electronics_ico.png" alt="Electronics" style="width:80px;"></i>	
									<div class="media-body">
										<a href="electronics.php?section=#tm-section-1" target="_parent"><h3>Elektronika</h3></a>
										<p>Telefony, Komputery, Tablety, Sprzęt RTV...</p>
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 col-lg-12 col-xl-6 mb-4">
								<div class="media tm-bg-transparent-black tm-border-white">
									<i class="mr-4 tm-icon-circled tm-icon-media"><img src="img/icons/furniture_ico.png" alt="Furniture" style="width:80px;"></i>	
									<div class="media-body">
										<a href="furnitures.php?section=#tm-section-1" target="_parent"><h3>Meble i AGD</h3></a>
										<p>Meble, Wyposarzenie wnętrz, Sprzęt AGD.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 col-lg-12 col-xl-6 mb-4">
								<div class="media tm-bg-transparent-black tm-border-white">
									<i class="mr-4 tm-icon-circled tm-icon-media"><img src="img/icons/cloth_ico.png" alt="Clothings" style="width:80px;"></i>	
									<div class="media-body">
										<a href="wardrobe.php?section=#tm-section-1" target="_parent"><h3>Szafa</h3></a>
										<p>Ubrania, Wyroby tekstylne</p>
									</div>
								</div>
							</div>		


							<div class="col-sm-12 col-md-6 col-lg-12 col-xl-6 mb-4">
								<div class="media tm-bg-transparent-black tm-border-white">
									<i class="mr-4 tm-icon-circled tm-icon-media"><img src="img/icons/various_ico.png" alt="Various" style="width:80px;"></i>	
									<div class="media-body">
									<a href="various.php?section=#tm-section-1" target="_parent"><h3>Inne</h3></a>
									<p>Pozostałe przedmioty</p>
									</div>
								</div>
							</div>	

						</div>		
			               
					</section>

					<section id="tm-section-3" class="tm-section">
						<div class="tm-bg-transparent-black tm-contact-box-pad">
							<div class="row mb-4">
								<div class="col-sm-12">
									<header><h2 class="tm-text-shadow" style="color: rgb(28, 210, 255);">Kontakt</h2></header>
								</div>
							</div>
							<div class="row tm-page-4-content">
								<div class="col-md-6 col-sm-12 tm-contact-col">
									<div class="contact_message">
										<form name='contact_form' action = 'send_mail.php' method='post' class="contact-form">
											<div class="form-group">
												<input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Jak masz na imię ?" required>
											</div>
									
											<div class="form-group">
												<textarea id="contact_message" name="contact_message" class="form-control" rows="9" placeholder="Proszę podać nazwę tabeli i numer przedmiotu lub jego nazwę." required></textarea>
											</div>

											<div class="form-group">
												<input type="text" id="contact_data" name="contact_data" class="form-control" placeholder="Podaj swój e-mail lub telefon." required>
											</div>


											<button type="submit" class="btn tm-btn-submit tm-btn ml-auto">Wyślij</button>
										</form>
									</div>
								</div>

								<div class="col-md-6 col-sm-12 tm-contact-col">
									<div class="tm-address-box">
										<p>Preferuję wydanie przedmiotów, po ich sprawdzeniu na miejscu. Jeśli jesteś albo będziesz we Wrocławiu lub w jego okolicach - zapraszam do spotkania, po wcześniejszym ustaleniu terminu.</p>
										<p>W przypadku wyboru doręczenia za pośrednictwem poczty lub firmy kurierskiej, zakupione przedmioty zostaną wysłane po opłaceniu kosztów wysyłki wraz z uzgodnioną ceną zakupu.</p>
										<address>
											e-mail:  <br>
											nr. rach. bankowego: 
										</address>
									</div>
								</div>
							</div>
						</div>
					</section>	
				</div>	<!-- .tm-content -->							
				<!-- <footer class="footer-link"></footer> -->
		</div>	
	</div><!-- row -->	
</div>

		<div id="preload-01"></div>
		<div id="preload-02"></div>
		<div id="preload-03"></div>

		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="slick/slick.min.js"></script>
		<script type="text/javascript" src="js/site.js"></script>
		
		
	</body>
</html>