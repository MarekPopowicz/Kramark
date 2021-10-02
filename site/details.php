<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php   
		include 'php/db_connection.php';
		
	?>


	<title>Szczegóły</title>

	<script type="text/javascript" src="js/render.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<link rel="stylesheet" href="css/tooplate-style.css">
	
	<script>	

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
	<div class="container-fluid tm-main-row">
		<div class="tm-img-container  tm-content">
			<div class="tm-section-carousel tm-section ">

					<?php 
						$href = $_COOKIE['href'];
						$pathComponents = explode("&", trim($href, "&")); 
						$id = explode("=", trim($pathComponents[2], "="))[1];
						$section = explode("=", trim($pathComponents[1], "="))[1];  
						$conn = OpenCon();
						$category= explode("=", trim($pathComponents[0], "="))[1];  
						$photoDir = "img/photo/";
						
						include 'php/db_querySQL.php';

						switch ($category) {

							case "books":
								if($section=="#tm-section-1"){
									$table = "books";}

								if($section=="#tm-section-2"){
									$table = "dvds";}
								
								if($section=="#tm-section-3"){
									$table = "cds";}
								break;

							case "electronics":
									
									if($section=="#tm-section-1")
										$table = "computers";

									if($section=="#tm-section-2")
										$table = "phones";

									if($section=="#tm-section-3")
										$table = "rtvs";

								break;

							case "furnitures":
								
									if($section=="#tm-section-1")
										$table = "furnitures";

									if($section=="#tm-section-2")
										$table = "tools";

									if($section=="#tm-section-3")
										$table = "agds";
								
								break;

							case "wardrobe":
								
									if($section=="#tm-section-1")
										$table = "clothes";
	
									if($section=="#tm-section-2")
										$table = "textiles";
	
									if($section=="#tm-section-3")
										$table = "others";
									
								break;

							case "various":
								
									if($section=="#tm-section-1")
										$table = "miscellaneous";
							break;	
						}
							$data = getItemData($conn, $id, $table);
							$photos_min = getItemMinPhotos($conn, $id, $table);
							$photos = getItemPhotos($conn, $id, $table);
							$photoDir = "img/photo/".$table."/";
					


					if(isset($_COOKIE['href'])) { 
	
						unset($_COOKIE['href']);

						$not_found = "img/photo/image-not-found.png";

						if (!file_exists($photoDir.$photos_min[0]) || $photoDir.$photos[0]==null) {

							echo"<div class='tm-img-slider media'>
								<img   src='".$not_found."' alt='Image'>  
							</div>";
						} 

						else {

							echo"<div class='row mb-4 tm-text-shadow'>	
								<span id='productID'>#".$data[0]."</span> &nbsp;";
									echo"<span id='productName'>".$data[1]."</span>";
								echo"</div>";


							echo "<div class='tm-img-slider tm-bg-transparent-black media'>";

								echo "<a href= '".$photoDir.$photos[0]."' class='tm-slider-img'>
									<img src='".$photoDir.$photos_min[0]."' alt='Image'  class='img-fluid'>
								</a>";
								echo "<a href= '".$photoDir.$photos[1]."' class='tm-slider-img'>
									<img src='".$photoDir.$photos_min[1]."' alt='Image' class='img-fluid'>
								</a>";
								echo "<a href= '".$photoDir.$photos[2]."' class='tm-slider-img'>
									<img src='".$photoDir.$photos_min[2]."' alt='Image' class='img-fluid'>
								</a>";
							
									if (!file_exists($photoDir.$photos[3]) || $photos[3]==null || $photos[3]=='' ){}
									else{
										echo "<a href= '".$photoDir.$photos[3]."' class='tm-slider-img'>
											<img src='".$photoDir.$photos_min[3]."' alt='Image' class='img-fluid'>
										</a>";
									}
									

									if (!file_exists($photoDir.$photos[4]) || $photos[4]==null || $photos[4]==''){}
									else {
										echo "<a href= '".$photoDir.$photos[4]."' class='tm-slider-img'>
											<img src='".$photoDir.$photos_min[4]."' alt='Image' class='img-fluid'>
										</a>";
									}
									

									if (!file_exists($photoDir.$photos[5]) || $photos[5]==null || $photos[5]==''){}
									else {
										echo "<a href= '".$photoDir.$photos[5]."' class='tm-slider-img'>
											<img src='".$photoDir.$photos_min[5]."' alt='Image' class='img-fluid'>
										</a>";
									}
								echo "</div>";

									echo"<div class='row mb-4 tm-text-shadow' style='margin-top: 1%'>";


									if($category == "books" && $section=="#tm-section-1")
										echo"<span id='price'> Cena: ".$data[3]." zł.</span></span>";
									else
										echo"<span id='price'> Cena: ".$data[3]." zł.</span>";
									echo"</div>";

						}

							$conn -> close();
					}

						?>	


						<div style="padding-top: 1%">
							<a href="javascript: void(0)" onclick="returnParent();" class="btn tm-btn tm-font-small">Wróć</a>	
						</div>
			</div>	
		</div>		            		          		    
						<!-- <footer class="footer-link"></footer>	 -->
	</div>



	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
	<script type="text/javascript" src="slick/slick.min.js"></script>



<script>

function setupCarousel() {

	var slider = $('.tm-img-slider');
	var windowWidth = $(window).width();

	if (slider.hasClass('slick-initialized')) {
		slider.slick('destroy');
	}

 	if(windowWidth < 640) {
					slider.slick({
	              		dots: false,
	              		infinite: false,
	              		slidesToShow: 1,
	              		slidesToScroll: 1
	              	});
				}
				else if(windowWidth < 992) {
					slider.slick({
	              		dots: true,
	              		infinite: false,
	              		slidesToShow: 2,
	              		slidesToScroll: 1
	              	});
				}
				else { 
					// Slick carousel
	              	slider.slick({
	              		dots: true,
	              		infinite: false,
	              		slidesToShow: 3,
	              		slidesToScroll: 2
	              	});
				 }
				 
	// Init Magnific Popup
	$('.tm-img-slider').magnificPopup({
	  delegate: 'a', 
	  type: 'image',
	 	verticalFit: true,
	  gallery: {enabled:true}
	  
	});
}

function getSiteCategorySection(){

	var regex = /[?&]([^=#]+)=([^&]*)/g, 
		url = window.location.href, 
		params = {}, 
		match;

		while(match = regex.exec(url)) {
			params[match[1]] = match[2];
	}	
		return params;
};

function getReturnSection(category, section){

switch(category) {

	case "books":
		if(section=="#tm-section-1") return "books";
		if(section=="#tm-section-2") return "dvd";
		if(section=="#tm-section-3") return "cd";
	break;

	case "electronics":
		if(section=="#tm-section-1") return "computers";
		if(section=="#tm-section-2") return "phones";
		if(section=="#tm-section-3") return "rtv";
	break;

	case "furnitures":
		if(section=="#tm-section-1") return "furniture";
		if(section=="#tm-section-2") return "tools";
		if(section=="#tm-section-3") return "agd";
	break;

	case "wardrobe":
		if(section=="#tm-section-1") return "cloth";
		if(section=="#tm-section-2") return "textiles";
		if(section=="#tm-section-3") return "other";
	break;

	case "various":
		if(section=="#tm-section-1") return "various";
		if(section=="#tm-section-2") return "various";
		if(section=="#tm-section-3") return "various";
	break;
	}
}
	var siteParams = getSiteCategorySection();

	$(window).on("load", function(){

		
		if(renderPage) {
			$('body').addClass('loaded');

			var bgImg = "_bg.jpg";
			var bgrImg = getReturnSection(siteParams['category'], siteParams['section'])

			$.backstretch("img/backgrounds/" + bgrImg + bgImg, {fade: 500})
				
			setupCarousel();

				// Resize Carousel upon window resize
				$(window).resize(
					function() {
						setupCarousel();
					}
				);

		}

		});

    function returnParent() {
        window.location.href="/site/" + siteParams['category'] + ".php?category="+siteParams['category']+"&section="+siteParams['section'];
    };

/* 	$(document).ready(function($) {
    
	}); */

		</script>
	</body>
</html>