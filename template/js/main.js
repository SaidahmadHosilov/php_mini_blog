 AOS.init({
 	duration: 800,
 	easing: 'slide',
 	once: true
 });

jQuery(document).ready(function($) {

	"use strict";

	

	var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
		});


		setTimeout(function() {
			
			var counter = 0;
			
      $('.site-mobile-menu .has-children').each(function(){
        var $this = $(this);
        
        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();  
      
    });

		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		}) 

		// click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
	    }
		});
	}; 
	siteMenuClone();


	var sitePlusMinus = function() {
		$('.js-btn-minus').on('click', function(e){
			e.preventDefault();
			if ( $(this).closest('.input-group').find('.form-control').val() != 0  ) {
				$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
			} else {
				$(this).closest('.input-group').find('.form-control').val(parseInt(0));
			}
		});
		$('.js-btn-plus').on('click', function(e){
			e.preventDefault();
			$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
		});
	};
	// sitePlusMinus();


	var siteSliderRange = function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	};
	// siteSliderRange();


	var siteMagnificPopup = function() {
		$('.image-popup').magnificPopup({
	    type: 'image',
	    closeOnContentClick: true,
	    closeBtnInside: false,
	    fixedContentPos: true,
	    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
	     gallery: {
	      enabled: true,
	      navigateByImgClick: true,
	      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
	    },
	    image: {
	      verticalFit: true
	    },
	    zoom: {
	      enabled: true,
	      duration: 300 // don't foget to change the duration also in CSS
	    }
	  });

	  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
	    disableOn: 700,
	    type: 'iframe',
	    mainClass: 'mfp-fade',
	    removalDelay: 160,
	    preloader: false,

	    fixedContentPos: false
	  });
	};
	siteMagnificPopup();


	var siteCarousel = function () {
		if ( $('.nonloop-block-13').length > 0 ) {
			$('.nonloop-block-13').owlCarousel({
		    center: false,
		    items: 1,
		    loop: true,
				stagePadding: 0,
		    margin: 0,
		    autoplay: true,
		    nav: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		    responsive:{
	        600:{
	        	margin: 0,
	        	nav: true,
	          items: 2
	        },
	        1000:{
	        	margin: 0,
	        	stagePadding: 0,
	        	nav: true,
	          items: 3
	        },
	        1200:{
	        	margin: 0,
	        	stagePadding: 0,
	        	nav: true,
	          items: 4
	        }
		    }
			});
		}

		$('.slide-one-item').owlCarousel({
	    center: false,
	    items: 1,
	    loop: true,
			stagePadding: 0,
	    margin: 0,
	    autoplay: true,
	    pauseOnHover: false,
	    nav: true,
	    navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
	  });
	};
	siteCarousel();

	var siteStellar = function() {
		$(window).stellar({
	    responsive: false,
	    parallaxBackgrounds: true,
	    parallaxElements: true,
	    horizontalScrolling: false,
	    hideDistantElements: false,
	    scrollProperty: 'scroll'
	  });
	};
	siteStellar();

	var siteCountDown = function() {

		$('#date-countdown').countdown('2020/10/10', function(event) {
		  var $this = $(this).html(event.strftime(''
		    + '<span class="countdown-block"><span class="label">%w</span> weeks </span>'
		    + '<span class="countdown-block"><span class="label">%d</span> days </span>'
		    + '<span class="countdown-block"><span class="label">%H</span> hr </span>'
		    + '<span class="countdown-block"><span class="label">%M</span> min </span>'
		    + '<span class="countdown-block"><span class="label">%S</span> sec</span>'));
		});
				
	};
	siteCountDown();

	var siteDatePicker = function() {

		if ( $('.datepicker').length > 0 ) {
			$('.datepicker').datepicker();
		}

	};
	siteDatePicker();

	var searchToggle = function() {
		if ( $('.js-search-toggle').length > 0 ) {
			$('.js-search-toggle').click(function() {
				if ( $('.js-search-form').hasClass('active') ) {
					$('.js-search-form').removeClass('active');
				} else {
					$('.js-search-form').addClass('active');
				}
				setTimeout(function() {
					$('#s').focus();
				}, 100);
				
			});

			
		}
	};
	searchToggle();

});

// post categories and tags

$(function(){
	$("#tagInput").tags({
		requireData: true,
		unique: true,
		maxTags: 4
	}).autofill({
		data: ["adventure",
			"business",
			"business",
			"delicues Foods",
			"food",
			"food",
			"freelancing",
			"lifestyle",
			"lifestyle",
			"selfwork",
			"walk",
			"wedding"]
	});
})

// Debounce

// var searchRequest = null;
// var searchInput = $("#search-input");

// var searchEvents = function() {
//   if (searchRequest)
//     searchRequest.abort()
//   	searchRequest = $.get('/post/search', {term: $(this).val()}, null, 'script');
// };

// searchInput.on({
//   change: searchEvents,
//   keyup: $.debounce(500, searchEvents)
// });


const debounce = (fn, ms) => {
	let timeout;
	return function() {
		const fnCall = () => { fn.apply(this, arguments) }
		clearTimeout(timeout);
		timeout = setTimeout(fnCall, ms)
	}
}
onChange = debounce(onChange, 500);

document.getElementById('search-input').addEventListener('keyup', onChange);

function onChange(e){
	e.preventDefault();
	let searchVal = e.target.value;
	var searchResult = document.querySelector('#search_result ul');
	var params = "post_title=" + searchVal;

	var xhr = new XMLHttpRequest();
	xhr.open('POST', '/post/search', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

	xhr.onload = function(){
		if(this.status == 200){
			var result = JSON.parse(this.responseText); 
			console.log(result);
			var output = '';
			for(const i in result){
				if(result != 'There is no result' && searchVal.length != 0){
					output +=   '<li class="mb-2">'+
									'<a href="/post/details/'+result[i].id+'" style="display: flex; align-items:center;">'+
										'<img src="/upload/profile_image/'+result[i].image+'" style="width:100px;height:100px;object-fit:cover; padding-right:20px;">'+
										'<div class="ml-3" style="width:100%;">'+
											'<h5 class="my-2 search-title">'+result[i].title+'</h5>'+
											'<p class="search-text" style="color:grey">'+result[i].text+'</p>'+
										'</div>'+
									'</a>'+
								'</li>';
				} else {
					output += "No Result Found!";
					continue;
				}
			}

			searchResult.innerHTML = output;
		} else {
			console.log("Page Not Found")
		}
	}
	xhr.send(params);
}

// Debounce

// Reply comment

var replyBtns = document.querySelectorAll('.reply-btn');

for(const btn of replyBtns){
	btn.addEventListener('click', replyFunc);
}

function replyFunc()
{
	console.log('asdadasdasdkhas 126812365126351253');
	var sessionId = this.getAttribute('data-user-session');
	var userId = this.getAttribute('data-user-id');
	var parentComment = this.parentElement;
	var shortComment = document.querySelector('.short-comment')
	
	shortComment.setAttribute('data-id', userId);
	shortComment.style.display = 'flex';
	parentComment.appendChild(shortComment);
}

window.addEventListener('click', function(event){
	if(!event.target.classList.contains('doNotTouch')){
		document.querySelector('.short-comment').style.display = 'none'
	}
})

$(document).ready(function(){
	$('#short-comment-btn').click(function(e){
		e.preventDefault();
		var childBox = this.parentElement.parentElement
			.parentElement.querySelector('.children')
		
		var postId = this.parentElement.getAttribute('data-post-id');
		var userSession = this.parentElement.getAttribute('data-owner');
		var parentId = this.parentElement.parentElement.getAttribute('data-comment-id');
		var inputVal = this.parentElement.querySelector('input').value;
		this.parentElement.querySelector('input').value = '';

		if(inputVal != ''){
       		
			var form_data = new FormData();      
			form_data.append('comment', inputVal);
			form_data.append('post_id', postId);            
			form_data.append('user_session', userSession);            
			form_data.append('user_id', parentId);            

			$.ajax({
				type: "POST",
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                url: '/post/shortmsg',
                data: form_data,
                success: function(info)
                {
                    var result = JSON.parse(info);

					if(result[0] == 'success'){
						var user = result[1];
						var cmBox = document.createElement('li')
						cmBox.setAttribute('class', 'comment');
						var vcard = document.createElement('div')
						vcard.setAttribute('class', 'vcard');
						var shortImg = document.createElement('img')
						shortImg.setAttribute('src', '/upload/profile_image/'+user.image)
						vcard.appendChild(shortImg);
						cmBox.appendChild(vcard);
						var cmBody = document.createElement('div');
						cmBody.setAttribute('class', 'comment-body')
						var shortH3 = document.createElement('h3')
						shortH3.innerHTML = user.name;
						var metaDiv = document.createElement('div')
						metaDiv.setAttribute('class', 'meta')
						metaDiv.innerHTML = result[2]
						var shortCommentDel = document.createElement('a');
						shortCommentDel.setAttribute('href', '/post/comment/delete/'+result[3]);
						shortCommentDel.setAttribute('class', 'delete btn btn-sm btn-danger rounded');
						shortCommentDel.textContent = 'Delete';
						var shortCommentedit = document.createElement('a');
						shortCommentedit.setAttribute('href', '/comment/edit/'+result[3]+'/'+postId);
						shortCommentedit.setAttribute('class', 'btn mr-1 ml-1 btn-sm btn-secondary rounded');
						shortCommentedit.textContent = 'Edit';
						var cmP = document.createElement('p')
						cmP.innerHTML = inputVal
						cmBody.appendChild(shortH3);
						cmBody.appendChild(metaDiv);
						cmBody.appendChild(cmP);
						cmBody.appendChild(shortCommentDel);
						cmBody.appendChild(shortCommentedit);
						cmBox.appendChild(cmBody);

						document.querySelector('#comment_count').innerHTML = result[4].total
						childBox.appendChild(cmBox);
					}

					if(result == 'error'){
						console.log('error');
					}
                }
			}); 
		}
	})
})

// Reply comment