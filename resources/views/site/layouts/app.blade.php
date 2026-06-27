<!DOCTYPE html>
<html lang="en"> <head><meta charset="utf-8" ><meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
@if(Route::getCurrentRoute()->uri() == '/') 
<link rel="canonical" href="{{url('/')}}" />
@else
<link rel="canonical" href="{{ URL::current() }}"/>
@endif
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="<?php echo csrf_token(); ?>">
<link rel="icon" href="{{asset('favicon.png')}}" type="image/ico">

<link rel="shortcut icon" href="{{asset('image/logo-academy.png')}}" type="image/png"/>
<title>@yield('title')</title>
<meta content="@yield('keyword')" name="keywords">
<meta content="@yield('description')" name="description">
<meta http-equiv="content-language" content="en-IN">
<meta name="classification" content="directory portal" />
<meta name="distribution" content="local" />
<meta content="All" name="WebCrawlers" />
<meta content="All, FOLLOW" name="MSNBots" /><meta content="All" name="Googlebot-Image" /><meta content="All, FOLLOW" name="BINGBots" />
<meta content="All, FOLLOW" name="YAHOOBots" />
<meta content="All, FOLLOW" name="GoogleBots" />
<meta name="copyright" content="Corporates Academy">
<meta name="author" content="Corporates Academy" />
<meta http-equiv="CACHE-CONTROL" content="PUBLIC" />
<meta name="publisher" content="" />
<meta name="identifier-URL" content="{{ URL::current() }}">
<meta name="google-site-verification" content="cdZRjAwe6T9AoQoE-gqxeeMPgs_8FuKWR3GXR2JJI2c" />
@if(Route::getCurrentRoute()->uri() == '/') 
<meta name="msvalidate.01" content="" /> 
<meta name="p:domain_verify" content="" /> 
@endif
<meta name="url" content="{{ URL::current() }}" />
<meta name="DC.title" content="@yield('keyword')" />
<meta name="twitter:card" content="summary">
<meta name="twitter:image" content="{{asset('image/logo-academy.png')}}"><meta name="twitter:creator" content="" /><meta name="twitter:title" content=">@yield('title')" />
<meta name="twitter:description" content="@yield('description')" />
<meta name="twitter:keywords" content="@yield('keyword')" />
<meta name="twitter:url" content="{{ URL::current() }}" />
<meta name="twitter:site" content="" />
<meta property="Locale" content="en_IN" /><meta property="fb:app_id" content="" />
<meta property="og:url" content="{{ URL::current() }}" /><meta property="og:type" content="article" />
<meta property="og:site_name" content="Corporates Academy" />
<meta property="og:title" content=">@yield('title')" />
<meta property="og:description" content="@yield('description')." />
<meta property="og:image" content="{{asset('/image/logo-academy.png')}}" />

<meta name="distribution" content="global" /><meta name="geo.region" content="IN-UP" />
<meta name="geo.placename" content="" /><meta name="geo.position" content="" /><meta name="ICBM" content="" />
<link rel="publisher" href=""><link rel="author" href="">

<meta name="robots" content="index, follow" />

<meta name="Revisit-after" content="7 Days" /><link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" async> 
<link rel="stylesheet" type="text/css" href="{{asset('assests/css/bootstrap.css')}}" async><link rel="stylesheet" type="text/css" href="{{asset('css/front.css')}}" async><link rel="stylesheet" type="text/css" href="{{asset('assests/css/owl.carousel.css')}}" async>

 
 
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PVZ24G2F');</script>
<!-- End Google Tag Manager -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RX53MZVN0M"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-RX53MZVN0M');
</script>
</head><body>
 
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVZ24G2F"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@include('site.layouts.header_nov')
@yield('content') 
@include('site.layouts.footer_nov')
@include('site.layouts.model')
<script>function menuCourseFunction(evt, review1) { 
    
    var i, coursetabcontent, coursetablinks;coursetabcontent = document.getElementsByClassName("coursetabcontent");
    
    for (i = 0; i < coursetabcontent.length; i++) {
	        coursetabcontent[i].style.display = "none"; }
	        
	        coursetablinks = document.getElementsByClassName("coursetablinks");
	        
	        for (i = 0; i < coursetablinks.length; i++) {
	        coursetablinks[i].className = coursetablinks[i].className.replace(" active", "");
	        
	            
	        }
	        
	        document.getElementById(review1).style.display = "block";evt.currentTarget.className += " active";
	    }
	    
	    
	    </script>
<script>function allCrsEventsdiv(){
    
    document.getElementById("alldesc").style.display = "block";document.getElementById("masterdes").style.display = "none";document.getElementById("ButtonallCrsEvents").classList.add("mystyle");
			document.getElementById("ButtonMasterProgram").classList.remove("mystyle");
			
    
}
			
			function masterprogramdiv(){
			    
			    document.getElementById("masterdes").style.display = "block";
			document.getElementById("alldesc").style.display = "none";document.getElementById("ButtonMasterProgram").classList.add("mystyle");
			
			document.getElementById("ButtonallCrsEvents").classList.remove("mystyle");
}

</script><script src="{{asset('assests/js/jquery.js')}}" ></script><script src="{{asset('assests/js/owl.carousel.js')}}"></script><script src="{{asset('assests/js/popper.js')}}"></script>
<script src="{{asset('assests/js/bootstrap.js')}}"></script><script src="{{asset('js/jquery-ui.js')}}"> </script>

 
 <?php if(Request::segment(1) == 'courses'){ ?> <script src="{{asset('js/all100.js')}}"></script> <?php  }else if(Request::segment(1) == 'master-program'){ ?>
<script src="{{asset('js/c100.js')}}"></script>	<?php } if(Request::segment(1) == 'corporate'){ ?><script src="{{asset('js/sc100.js')}}"></script>	
	  <?php } ?> <script src="{{asset('js/s100.js')}}"></script>
	  
<script>var d = document.getElementById('fix-rig');
function openrig() { document.getElementById("mySidepanel").style.right = "0px"; d.style.display = "none";}	function closeNav() { document.getElementById("mySidepanel").style.right = "-250px";
d.style.display = "block"; }</script>



	@if(Route::getCurrentRoute()->uri() == '/' || Request::segment(1) == 'all-clients')
<script>$(document).ready(function(){ $('#test').click(function(){ if($(this).prop("checked") == true){ $(".student-text").addClass("nodisplay");
	                $(".student-text").removeClass("display"); $(".corporate-text").addClass("display"); $(".corporate-text").removeClass("nodisplay");
	                $(".student-heading").removeClass("bg-yellow");$(".corporate-heading").addClass("bg-yellow");   }
else if($(this).prop("checked") == false){
	                $(".student-text").addClass("display");
	                $(".student-text").removeClass("nodisplay");
	                $(".corporate-text").addClass("nodisplay");
	                $(".corporate-text").removeClass("display");
	                $(".student-heading").addClass("bg-yellow");
	                $(".corporate-heading").removeClass("bg-yellow");
	            }   });});</script>
	            
	            
	            
	            @endif
	              <?php  if(Route::getCurrentRoute()->uri() == '/' || Request::segment(1) == 'all-courses'){  ?>
   <!-- <script>
        function autoRefesh() {
            $('#without_course_popup').modal();
            $('#without_course_popup').show();
        }
        setTimeout('autoRefesh()', 5000);
    </script> -->
    
    
    <?php }  ?>
    
	            
	            
	            </body></html>