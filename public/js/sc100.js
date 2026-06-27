 

// student testimonial slider start
$('.student-slider').owlCarousel({
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        loop:true,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
// student testimonial slider end

//OUR EXPERIENCE MENTORS
$('.mentor-ex-slider').owlCarousel({
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			navigation: true,
			loop: true,
			margin: 10,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				1000: {
					items: 1
				}
			}
		});

// corporate testimonial slider start
$('.corp-slider').owlCarousel({
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    loop:true,
    margin:10,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
// corporate testimonial slider end

// faculty testimonial slider start
$('.faculty-slider').owlCarousel({
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    loop:true,
    margin:10,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
// faculty testimonial slider end

// testimonial & Review slider start
$('.course-testy').owlCarousel({
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    loop:true,
    nav:true,
    margin:10,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
// testimonial & Review slider end

 
 


// "Why should you learn AWS? section's" {course page} start
/* $('.question-slider-section').owlCarousel({
    autoplay: false,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    loop: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
}); */
// "Why should you learn AWS? section's" {course page} end

//about section read more in course page start
/* $(document).ready(function() {
    var showChar = 450; 
    var ellipsestext = "...";
    var moretext = "Read More";
    var lesstext = "Read less";    

    $('.more').each(function() {
        var content = $(this).html(); 
        if(content.length > showChar) { 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar); 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>'; 
            $(this).html(html);
        } 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
}); */
//about section read more in course page end

// sticky section animation, course page start
/* var scroll = window.requestAnimationFrame ||
             // IE Fallback
             function(callback){ window.setTimeout(callback, 1000/60)};
var elementsToShow = document.querySelectorAll('.scroll-on');  */

/* function loop() {

    Array.prototype.forEach.call(elementsToShow, function(element){
      if (isElementInViewport(element)) {
        element.classList.add('is-visible');
      } else {
        element.classList.remove('is-visible');
      }
    });

    scroll(loop);
}
// Call the loop for the first time
loop(); */


// Helper function
function isElementInViewport(el) {
  // special bonus for those using jQuery
  if (typeof jQuery === "function" && el instanceof jQuery) {
    el = el[0];
  }
  var rect = el.getBoundingClientRect();
  return (
    (rect.top <= 0
      && rect.bottom >= 0)
    ||
    (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.top <= (window.innerHeight || document.documentElement.clientHeight))
    ||
    (rect.top >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
  );
}
// sticky section animation, course page end

// video tab content review start
function review(evt, review) {
      var i, videotabcontent, videotablinks;
      videotabcontent = document.getElementsByClassName("videotabcontent");
      for (i = 0; i < videotabcontent.length; i++) {
        videotabcontent[i].style.display = "none";
      }
      videotablinks = document.getElementsByClassName("videotablinks");
      for (i = 0; i < videotablinks.length; i++) {
        videotablinks[i].className = videotablinks[i].className.replace(" active", "");
      }
      document.getElementById(review).style.display = "block";
      evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
// video tab content review end

//faqs and curicullum collapseble course page start
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
            $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });

        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
            $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
            $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
//faqs and curicullum collapsible course page end

// footer tab panel start
/* function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
} */
// footer tab panel end

// curriculum show more course page start

/* function loadmore(){
    var x = document.getElementById("morelessons");
    var y = document.getElementById("les");
    if(x.style.display === 'block'){
        x.style.display = 'none';
        y.innerHTML = '+ More Lessons';
		 
		$('#morelessons').remove();
    }
    else {
		 
        x.style.display = 'block';
        y.innerHTML = '- Less Lessons';
    }
} */

 
// curriculum show more course page end

// faqs show more course page start
/* function loadqueries(){
    var fq = document.getElementById("morefaqs");
    var qr = document.getElementById("mq");
    if(fq.style.display === 'block'){
        fq.style.display = 'none';
        qr.innerHTML = '+ More Queries';
    }
    else{
        fq.style.display = 'block';
        qr.innerHTML = '- Less Queries';
    }
} */
// faqs show more course page end
 

 
