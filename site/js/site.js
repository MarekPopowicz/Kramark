		var sidebarVisible = false;
		var currentPageID = "#tm-section-1";
		var page = window.location.pathname.split("/").pop();



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
	
		
  		// Setup Nav
  		function setupNav() {
  			// Add Event Listener to each Nav item
	     	$(".tm-main-nav a").click(function(e){
	     		e.preventDefault();

				 currentNavItem = $(this);
				 currentPageID = currentNavItem.data("page");
		    	changePage(currentNavItem);
		    	//setupFooter();
		    });	    
		  }
		  
		 

		function setupTable(){

			if($(window).width() > 615) {
				$('thead > tr > th:last-child').show();
				$('tbody > tr > td:last-child').show();
				// $( '#table' ).css( 'font-size', "20px" );
			}
		/* 	else if ($(window).width() < 375) {
				$('thead > tr > th:last-child').hide();
				$('tbody > tr > td:last-child').hide();
				$( '#table' ).css( 'font-size', "14px" );
			} */

			else {
				$('thead > tr > th:last-child').hide();
				$('tbody > tr > td:last-child').hide();
				// $( '#table' ).css( 'font-size', "17px" );

			}
		}
		

  		function changePage(currentNavItem) {

  			// Update Nav items
  			$(".tm-main-nav a").removeClass("active");
     		currentNavItem.addClass("active");
			 
			$(".tm-section").hide();

	    	$(currentPageID).fadeIn(1000);
			
	    	// Change background image
	    	var bgImg = currentNavItem.data("bgImg");
			$.backstretch("img/backgrounds/" + bgImg);

			if(page!='')
				window.history.pushState('', '', '/site/'+ page +'?section='+currentPageID);
			else
				window.history.pushState('', '', '/site/index.php?section='+ currentPageID);

			$("#tmSideBar").removeClass("show");
		
  		}

  		// Setup Nav Toggle Button
		function setupNavToggle() {

		$("#tmMainNavToggle").on("click", function(){
			$(".sidebar").toggleClass("show");
		});
		}

  		// If there is enough room, stick the footer at the bottom of page content.
  		// If not, place it after the page content
  		function setupFooter() {
  			
  			var padding = 100;
  			var footerPadding = 40;
  			var mainContent = $("section"+currentPageID);
  			var mainContentHeight = mainContent.outerHeight(true);
  			var footer = $(".footer-link");
  			var footerHeight = footer.outerHeight(true);
  			var totalPageHeight = mainContentHeight + footerHeight + footerPadding + padding;
  			var windowHeight = $(window).height();		

  			if(totalPageHeight > windowHeight){
  				$(".tm-content").css("margin-bottom", footerHeight + footerPadding + "px");
  				footer.css("bottom", footerHeight + "px");  			
  			}
  			else {
  				$(".tm-content").css("margin-bottom", "0");
  				footer.css("bottom", "20px");  				
  			}  			
		  }
		  

		function pageFileName(){
			return page.split(".")[0];
		}

		function setPageTitle(){

				switch(pageFileName()) {
				case "index":
					document.title = "Witaj";
				break;

				case "books":
					document.title = "Książki, DVD, CD";
					break;

				case "electronics":
					document.title = "Elektronika";
					break;

				case "furnitures":
					document.title = "Umeblowanie i AGD";
					break;

				case "wardrobe":
					document.title = "Ubrania i Tekstylia";
					break;

				case "details":
					document.title = "Szczegóły";
					break;

				case "various":
					document.title = "Różne";
					break;
				
				}
			}


  		// Everything is loaded including images.
      	$(window).on("load", function(){
			 
			setPageTitle();

      		// Render the page on modern browser only.
      		if(renderPage) {
				// Remove loader
		      	$('body').addClass('loaded');

		      	// Page transition
		      	var allPages = $(".tm-section");
		      	var linkToAnotherPage = $("a.tm-btn[data-nav-link]");
			    
			    if(linkToAnotherPage != null) {
			    	
			    	linkToAnotherPage.on("click", function(){
			    		var navItemToHighlight = linkToAnotherPage.data("navLink");
			    		$("a" + navItemToHighlight).click();
			    	})
				};


		      	allPages.hide();

				
				var currentPage = $("#tm-section-1"); //Default;
				var bgImg = $("#tmNavLink1").data("bgImg");
				
					if(location.search.substring()) {
					
						if(location.search.substring(1)!='true'){

							var siteParams = getSiteCategorySection();
							currentPage = $(siteParams['section']);
							
							var bgImg = "_bg.jpg";
							var category = page.split('.');
							var bgrImg = getReturnSection(category[0], siteParams['section']);

							bgImg = bgrImg+bgImg;

						}
						else {

							currentPage = $("#tm-section-2"); //only for index.php section2
							bgImg = $("#tmNavLink2").data("bgImg");
							history.pushState({
								id: 'homepage'
							}, '', '/site/index.php?section=#tm-section-2');
						}

						$(".tm-main-nav a").removeClass("active");

					};
				  				setupTable();
								setupNav();
				    			setupNavToggle();
			    	//setupFooter();
				

		     	currentPage.fadeIn();
		     	$.backstretch("img/backgrounds/" + bgImg, {fade: 500});

				// Hide the nav on mobile
				$("#tmSideBar").removeClass("show");
				 

				$(window).resize(
					function() {
						setupTable();
					}
				);
			  
      		}
		});


		function getReturnSection(category, section){

			switch(category) {

				case "index":
						if(section=="#tm-section-1") return "section1";
						if(section=="#tm-section-2") return "section2";
						if(section=="#tm-section-3") return "section3";
					break;
				
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

		$("tr").click(function() {
			var site = "/site/details.php";

			var fileName = pageFileName();
			var productID = this.cells[0].innerHTML;
			var siteParams = getSiteCategorySection();
			var href = site + "?category=" + fileName + "&section=" + siteParams['section'] + "&product=" + productID;
			setCookie("href", href, 5);
			window.location.href = href;
		});

	
		function returnParent() {
			window.location.href="/site/?true";
		};
	

		

		function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
			var expires = "expires="+d.toUTCString();

			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		  }
		  
		

	/* 	$(document).ready(function() {
		
		}); */