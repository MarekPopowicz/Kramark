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
		}
	
  		function setupNav() {
  			// Add Event Listener to each Nav item
	     	$(".tm-main-nav a").click(function(e){
	     		e.preventDefault();

				 currentNavItem = $(this);
				 currentPageID = currentNavItem.data("page");
		    	changePage(currentNavItem);

		    });	    
		}
		  
		function setupTable(){

			if($(window).width() > 615) {
				$('thead > tr > th:last-child').show();
				$('tbody > tr > td:last-child').show();
				
			}
	
			else {
				$('thead > tr > th:last-child').hide();
				$('tbody > tr > td:last-child').hide();

			}
		}
		
  		function changePage(currentNavItem) {

  			$(".tm-main-nav a").removeClass("active");
     		currentNavItem.addClass("active");
			 
			$(".tm-section").hide();

	    	$(currentPageID).fadeIn(1000);

			var bgImg = currentNavItem.data("bgImg");
				if(bgImg==undefined) bgImg = "edit_bg.jpg"

			$.backstretch("img/backgrounds/desc/" + bgImg);

				window.history.pushState('', '', '/admin/index.php?section='+ currentPageID);

				var href = window.location.href;
				setCookie("hrefs", href, 5);

			$("#tmSideBar").removeClass("show");
  		}

		function setupNavToggle() {

		$("#tmMainNavToggle").on("click", function(){
			$(".sidebar").toggleClass("show");
		});
		}

      	$(window).on("load", function(){

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
				var href = getCookie('hrefs');
				var bgrImg = "add";

					var currentPage = $("#tm-section-1");
					var siteParams = getSiteCategorySection();
					var siteSection = siteParams['section'];

					if(siteSection==undefined) href = null;
				
				if(href==null){
					href = '/admin/index.php?section=#tm-section-1';
					window.history.pushState('', '', href);
					setCookie("hrefs", href, 5);
				}
				else if(location.search.substring(1)=='true'){

					location.href =  '/site/index.php?section=#tm-section-2';

				}
				
				
				else if (siteSection == '#edit'){
						siteSection = "#tm-section-2";
						currentPage = $(siteSection);
						window.history.pushState('', '', '/admin/index.php?section='+ siteSection);
						href = window.location.href;
						setCookie("hrefs", href, 5);
						bgrImg = getReturnSection('index', siteSection);
					}

					else{
					window.history.pushState('', '', href);

					siteParams = getSiteCategorySection();
					siteSection = siteParams['section'];
					currentPage =$(siteSection);
					bgrImg = getReturnSection('index', siteSection);
					}

						var	bgImg = bgrImg + "_bg.jpg";
				
						$(".tm-main-nav a").removeClass("active");

				  				setupTable();
								setupNav();
				    			setupNavToggle();

		     	currentPage.fadeIn();
		     	$.backstretch("img/backgrounds/desc/" + bgImg, {fade: 500});

				// Hide the nav on mobile
				$("#tmSideBar").removeClass("show");
				 

				$(window).resize(
					function() {
						setupTable();
					}
				);

				var cookie = getCookie("product");
				updateHTML("productID", cookie)
				
			  }

			  switch(location.hash) {

				case "#miscellaneous":
					$('select').val('miscellaneous');
					break;
				case "#cds":
					$('select').val('cds');
					break;
				case "#dvds":
					$('select').val('dvds');
					break;
				case "#computers":
					$('select').val('computers');
					break;
				case "#phones":
					$('select').val('phones');
					break;
				case "#agds":
					$('select').val('agds');
					break;
				case "#books":
					$('select').val('books');
					break;			
				case "#tools":
					$('select').val('tools');
					break;		
				case "#others":
					$('select').val('others');
					break;	
				case "#clothes":
					$('select').val('clothes');
					break;				
				case "#textiles":
					$('select').val('textiles');
					break;			
				case "#furnitures":
					$('select').val('furnitures');
					break;
				case "#rtvs":
					$('select').val('rtvs');
					break;
				}
			
		});

		function updateHTML(elmId, value) {
			var elem = document.getElementById(elmId);
			if(typeof elem !== 'undefined' && elem !== null) {
			  elem.innerHTML = value;
			}
		  }


		function getReturnSection(category, section){

			switch(category) {

				case "index":
						if(section=="#tm-section-1") return "add";
						if((section=="#tm-section-2") || (section=="#tm-section-4")) return "edit";
						if(section=="#tm-section-3") return "del";
					break;
				
					}
		}


		$("tr").click(function() {

			var productID = this.cells[0].innerHTML;
			siteParams = getSiteCategorySection();
			siteSection = siteParams['section'];

			setCookie("product", productID, 5);

			if(siteSection=="#tm-section-2") siteSection="#tm-section-4";
			currentPageID = siteSection;
			
			window.location.href = '/admin/index.php?section='+ currentPageID + '&product=' + productID;
			var href = window.location.href;
			setCookie("hrefs", href, 5);
				
			if(siteSection=="#tm-section-3"){
					if(confirm('Usunąć przedmiot nr ' + productID + '?')) {
						window.location.href = '/admin/del_response.php?section='+ currentPageID + '&product=' + productID;
					} else {
						return;
					}
				}
			else
				window.location.reload(false);
		});


		function toggleSite(scriptName) {
			window.location.href="/admin/" + scriptName;
		}

		function returnParent() {
			window.location.href="/site/?true";
		};

		function setCookie(name,value,days) {
			var expires = "";
			if (days) {
				var date = new Date();
				date.setTime(date.getTime() + (days*24*60*60*1000));
				expires = "; expires=" + date.toUTCString();
			}
			document.cookie = name + "=" + (value || "")  + expires + "; path=/";
		}
		
	
		
		function eraseCookie(name) {   
			document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
		}
		

	/* 	$(document).ready(function() {
		
		}); */