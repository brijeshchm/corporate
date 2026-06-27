// X-CSRF-TOKEN
	$.ajaxSetup({	headers: {	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')	}	});
// X-CSRF-TOKEN 
$(window).resize(function(){     var width = $(window).width();      if(width < 440){        $('#header-top').hide();     }else{        $('#header-top').show();     } }).resize();
$(window).resize(function(){    var width = $(window).width();    if(width < 440){	    $('#mobile-menuPopupCrsCls').show(); 		$('#menuPopupCrsCls').hide(); 	$('#device-desktop').hide();	$('#header-top').hide();	$('#trending-desktop').hide();	$('#services').hide(); 		$('#Corporatez').hide();	$('#lp').hide();	$('#fixed-bottom-id').hide();		$('#mobile-icon-disable').hide();		$('#mobile-corporates').show();  		$('#master-container-page').hide();  
   }else{	    $('#menuPopupCrsCls').show();	    $('#master-container-page').show();	   	$('#device-desktop').show();	   	$('#header-top').show();	   	$('#trending-desktop').show();	   	$('#services').show();	   	$('#Corporatez').show();	   	$('#lp').show();	   	$('#fixed-bottom-id').show();	   	$('#mobile-icon-disable').show();	    $('#mobile-menuPopupCrsCls').hide();
	   	    $('#mobile-corporates').hide();
   }
}).resize();

// social share start 

	    $( document ).ready(function() {
  //custom button for homepage
     $( ".share-btn" ).click(function(e) {
       $('.networks-5').not($(this).next( ".networks-5" )).each(function(){
          $(this).removeClass("active");
       });
     
            $(this).next( ".networks-5" ).toggleClass( "active" );
    });   
});

// social share end

/*
$('.modal').on('shown.bs.modal', function() {
  $(this).find('[autofocus]').focus();
});
*/
//$("input[name=search]").focus();
$(window).resize(function(){   var width = $(window).width();
   if(width < 440){
	   $('#nav-items').hide(); 	   $('#fix-frm-id').hide();	   $('#certificate-preview').hide();	   $('#self-img').hide();	    
   }else{
	     $('#nav-items').show(); 	   $('#fix-frm-id').show();	   $('#certificate-preview').show();	   $('#self-img').show();	   
   }
}).resize();
// scroll back to top start
$(document).ready(function(){     $(window).scroll(function(){    if ($(this).scrollTop() > 600) {    $('#scroll').fadeIn();   $('#fix-rig').fadeIn();
        } else { 
            $('#scroll').fadeOut();  $('#fix-rig').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600);   return false; 
    }); 
});

jQuery(document).on('click', '#razor-pay-now', function (e) {	  
    var total = (jQuery('form#razorpay-frm-payment').find('input#amount').val() * 100);
    var merchant_order_id = jQuery('form#razorpay-frm-payment').find('input#merchant_order_id').val();
    var merchant_surl_id = jQuery('form#razorpay-frm-payment').find('input#surl').val();
    var merchant_furl_id = jQuery('form#razorpay-frm-payment').find('input#furl').val();
    var card_holder_name_id = jQuery('form#razorpay-frm-payment').find('input#billing-name').val();
   // var address = jQuery('form#razorpay-frm-payment').find('input#billing_address').val();
    var merchant_total = total;
    var merchant_amount = jQuery('form#razorpay-frm-payment').find('input#amount').val();
    var currency_code_id = jQuery('form#razorpay-frm-payment').find('input#currency').val();
      var key_id = jQuery('form#razorpay-frm-payment').find('input#RAZOR_KEY_ID').val();
    var store_name = 'Isteval Pvt Ltd';
    var store_description = 'Fees Pay';
    var store_logo = 'logo.png';
    var email = jQuery('form#razorpay-frm-payment').find('input#billing-email').val();
    var phone = jQuery('form#razorpay-frm-payment').find('input#billing-phone').val();
    var course = jQuery('form#razorpay-frm-payment').find('input#course').val();
    var billing_country = jQuery('form#razorpay-frm-payment').find('input#billing_country').val();
    var billing_state = jQuery('form#razorpay-frm-payment').find('input#billing_state').val();
    var city = jQuery('form#razorpay-frm-payment').find('input#city').val();    
    jQuery('.text-danger').remove();
    if(card_holder_name_id=="") {
      jQuery('input#billing-name').after('<small class="text-danger">Please enter full mame.</small>');
      return false;
    }
    if(email=="") {
      jQuery('input#billing-email').after('<small class="text-danger">Please enter valid email.</small>');
      return false;
    }
    if(phone=="") {
      jQuery('input#billing-phone').after('<small class="text-danger">Please enter valid phone.</small>');
      return false;
    }
    
    var razorpay_options = {
        key: key_id,
        amount: merchant_total,
        name: store_name,
        description: store_description,
        image: store_logo,
        netbanking: true,
        currency: currency_code_id,
        prefill: {
            name: card_holder_name_id,
            email: email,
            contact: phone
        },
        notes: {
            soolegal_order_id: merchant_order_id,
        },
        handler: function (transaction) {
            jQuery.ajax({
                url:'/razorPayCheckout',
                type: 'post',
                data: {razorpay_payment_id: transaction.razorpay_payment_id, merchant_order_id: merchant_order_id, merchant_surl_id: merchant_surl_id, merchant_furl_id: merchant_furl_id, card_holder_name_id: card_holder_name_id, merchant_total: merchant_total, merchant_amount: merchant_amount, currency_code_id: currency_code_id,pay:store_name,course:course,email:email,phone:phone,billing_country:billing_country,billing_state:billing_state,city:city}, 
                dataType: 'json',
                success: function (res) {		 
			var obj =  jQuery.parseJSON(res.data);
			   
                    if(res.msg){
                        alert(res.msg);
                        return false;
                    }                
                   window.location = res.redirectURL+'?getpay='+obj.getpay+'&card_holder_name='+obj.card_holder_name+'&merchant_amount='+obj.merchant_amount+'&order_id='+obj.order_id+'&currency_code_id='+obj.currency_code+'&pay_to='+obj.pay_to+'&course='+obj.course+'&email='+obj.email+'&phone='+obj.phone+'&payment_id='+obj.razorpay_payment_id+'&billing_country='+obj.billing_country+'&billing_state='+obj.billing_state+'&city='+obj.city;
                                   }
            });
        },
        "modal": {
            "ondismiss": function () {
                
            }
        }
    };
    // obj        
    var objrzpv1 = new Razorpay(razorpay_options);
    objrzpv1.open();
        e.preventDefault();
            
});


$('.req-zone').click(function(){	 
 
		var THIS = $(this); var id   = THIS.data('id');   var title   = THIS.data('title');   var rz_from   = THIS.data('rzfrom');   
		 $("#"+id+"-modal .headertitle").html(title);
		 $("#"+id+"-modal .frm_title").val(title);		 
		 $("#"+id+"-modal .rz_form").val(rz_from);          
		$("#"+id+"-modal").modal();
});
// scroll back to top end
$('.slider').owlCarousel({
    autoplay:true, autoplayTimeout:3000, autoplayHoverPause:true,  loop:true,  nav:true,   margin:10,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
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
$('.crsMove').owlCarousel({
    autoplay:true,   autoplayTimeout:3000,    autoplayHoverPause:true,    navigation : true,    loop:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});
$('.partner').owlCarousel({
    autoplay:true, autoplayTimeout:3000,   autoplayHoverPause:true,   navigation : true,   loop:true,    margin:10,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
$('.lct').owlCarousel({
    autoplay:true,     autoplayTimeout:3000,    autoplayHoverPause:true,    navigation : true,    loop:true,    margin:10,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:1
        }
    }
});
$('.review-video').owlCarousel({
    autoplay:false,     autoplayTimeout:3000,    autoplayHoverPause:true,    navigation : true,    loop:false,    margin:10,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:1
        }
    }
});
$('.values-join').owlCarousel({
		    loop:true,     margin:10, responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:3
		        },
		        1000:{
		            items:3
		        }
		    }
		}); 
		
	$('.allclients').owlCarousel({
	autoplay:false,	autoplayTimeout:4000,	autoplayHoverPause:true,	loop:true,	nav:true,	margin:10,
	responsive:{
	0:{
	items:1
	},
	600:{
	items:2
	},
	1000:{
	items:3
	}
	}
	});

$('.test-slide-jobs').owlCarousel({
    autoplay:true,
    autoplayTimeout:4000,
    navigation : false,
    dots:false,
    loop:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:2
        }
    }
});

$(document).ready(function(){  
        $(".collapse.show").each(function(){
            $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });       
        $(".collapse").on('show.bs.collapse', function(){
            $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
            $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
function loadmore(){
    var x = document.getElementById("morelessons");   var y = document.getElementById("les");
    if(x.style.display === 'block'){
        x.style.display = 'none';
        y.innerHTML = '+ More Lessons';
    }
    else {
        x.style.display = 'block';
        y.innerHTML = '- Less Lessons';
    }
}
// curriculum show more course page end
function loadqueries(){
    var fq = document.getElementById("morefaqs");  var qr = document.getElementById("mq");
    if(fq.style.display === 'block'){
        fq.style.display = 'none';
        qr.innerHTML = '+ More Queries';
    }
    else{
        fq.style.display = 'block';
        qr.innerHTML = '- Less Queries';
    }
}
// faqs show more course page end
//menu popup ad more
function loadprograms(){
    var ap = document.getElementById("more-program-list");   var mp = document.getElementById("mp");
    if(ap.style.display === 'flex'){
        ap.style.display = 'none';
        mp.innerHTML = '+';
    }
    else{
        ap.style.display = 'flex';
        mp.innerHTML = '-';
    }
}; 




function searchCourse(a){	
	 
	if(a.length >0)
	{   
	$('.loader').show();	
	$.ajax({
	url:"/getSelectCourse",
	type:'get',
	data:{id:a},
	success:function(data){
	$('.show_course').html(data);
	$('.loader').hide();
	}
	});
	}else{
		$('.loader').show();	
	$.ajax({
	url:"/getSelectCourse",
	type:'get',
	data:{id:a},
	success:function(data){
	$('.show_course').html(data);
	$('.loader').hide();
	}
	});
	 
	}
	} 
	
	function courseData(name,id)
	{	 
	$('.courseLocation').val(name); $('.courseInput').val(id); 
	
	$('.resultCourse').hide();
	}


	function codeFunction(a){	
	 
    	if(a.length >0)
    	{   
        	$('.loader').show();	
            	$.ajax({
                	url:"/getCountryCode",
                	type:'get',
                	data:{id:a},
                	success:function(data){
                	$('.appendCode').html(data);
                	$('.loader').hide();
                	}
            	});
        	}else{
        		$('.loader').show();	
                	$.ajax({
                	url:"/getCountryCode",
                	type:'get',
                	data:{id:a},
                	success:function(data){
                	$('.appendCode').html(data);
                	$('.loader').hide();
                	}
                	});
    	 
    	}
	} 
	
	
	function searchCodeFunction(a){	
	 
    	if(a.length >0)
    	{   
        	$('.loader').show();	
            	$.ajax({
                	url:"/getCountryCode",
                	type:'get',
                	data:{id:a},
                	success:function(data){
                	$('.append_countryCode').html(data);
                	$('.loader').hide();
                	}
            	});
        	}else{
        		$('.loader').show();	
                	$.ajax({
                	url:"/getCountryCode",
                	type:'get',
                	data:{id:a},
                	success:function(data){
                	$('.append_countryCode').html(data);
                	$('.loader').hide();
                	}
                	});
    	 
    	}
	} 
	
	
	function searchCountryFunction(a){	
	 
    	if(a.length >0)
    	{   
        	$('.loader').show();	
            	$.ajax({
                	url:"/getCountryCode",
                	type:'get',
                	data:{id:a},
                	success:function(data){
                	$('.appCountryCode').html(data);
                	$('.loader').hide();
                	}
            	});
        	}else{
        		$('.loader').show();	
                	$.ajax({
                	url:"/getCountryCode",
                	type:'get',
                	data:{id:a},
                	success:function(data){
                	$('.appCountryCode').html(data);
                	$('.loader').hide();
                	}
                	});
    	 
    	}
	} 
	
	
	
	function countryCodeData(name,id)
	{	 
	   
	$('.countryCodeName').val(name);
	$('.countryCodeValue').val(id); 
	
	$('.resultCode').hide();
	}



//about section read more in course page start
$(document).ready(function() {
    var showChar = 450;      var ellipsestext = "...";    var moretext = "Read More";    var lesstext = "Read less";    
    $('.more').each(function() {
        var content = $(this).html(); 
        if(content.length > showChar) { 
            var c = content.substr(0, showChar);     var h = content.substr(showChar, content.length - showChar); 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>'; 
            $(this).html(html);
        } 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");    $(this).html(moretext);
        } else {
            $(this).addClass("less");    $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();   $(this).prev().toggle();
        return false;
    });
});
    
    
    $(document).ready(function(){	 
	 loadDataTwoBlog();	 
	 function loadDataTwoBlog()
	 {	  
		$.ajax({
		"url":"/site/course/loadDataTwoBlog",
		"type":"POST",	 
		"success":function(data,textStatus,jqXHR){	  
			$('.show_two_blog').append(data);
		}
		});	  
	 }
	});
	
  /*   $(document).ready(function(){
	 load_data_footer_course();
	 function load_data_footer_course()
	 {
    	$.ajax({
    	"url":"/site/course/loadDataCityWise",
    	"type":"POST",	 
    	"success":function(data,textStatus,jqXHR){	  
    		$('.show_all_city_wise').append(data);
    	}
    	});
	  
	 }
	}); */
$(document).ready(function(){
	// var _token = $('input[name="_token"]').val();
	 var id = $('#aboutHeadingModal').data('id');
	 load_data_about(id);
	 //alert(id);
	//alert(last_id);
	 function load_data_about(id="")
	 {
	  
	  
	$.ajax({
	"url":"/site/course/loadDataAbout",
	"type":"POST",
	 "data":{id:id},
	"success":function(data,textStatus,jqXHR){					 
		$('#load_more_couse_abobt').remove();
		$('#aboutHeadingModal').append(data);
	}
	});
	  
	 }
	});

$(document).ready(function(){
	// var _token = $('input[name="_token"]').val();
	 var id = $('#aboutHeading').data('id');
	 load_data_about(id);
	//alert(id);
	//alert(last_id);
	 function load_data_about(id="")
	 {
	  
	  
	$.ajax({
	"url":"/site/course/loadDataAbout",
	"type":"POST",
	 "data":{id:id},
	"success":function(data,textStatus,jqXHR){					 
		$('#load_more_couse_abobt').remove();
		$('#aboutHeading').append(data);
	}
	});
	  
	 }
	});

$(document).ready(function(){
// var _token = $('input[name="_token"]').val();
 var id = $('#coursecurriculum').data('id');
// alert(id);
 load_data(id, last_id='');
//alert(id);
//alert(last_id);
 function load_data(id="",last_id="")
 {
 /*  $.ajax({
   url:"site/course/loadData",
   "url":"/get_state_ajax/"+$this.val(),
   method:"POST",
   data:{id:id},
   success:function(data)
   {
    $('#load_more_button').remove();
    $('#post_data').append(data);
   }
  }); */
  
$.ajax({
"url":"/site/course/loadData",
"type":"POST",
 "data":{id:id,last_id:last_id},
"success":function(data,textStatus,jqXHR){					 
	$('#load_more_couse_curriculum').remove();
    $('#coursecurriculum').append(data);
}

 


});
  
  
$(document).on('click', '#load_more_couse_curriculum', function(){
  var last_id = $(this).data('last_id');
  $('#load_more_couse_curriculum').html('<b>Loading...</b>');
  load_data(id="" , last_id);
 });
  
  
  
 }

/*  $(document).on('click', '#load_more_button', function(){
  var id = $(this).data('id');
  $('#load_more_button').html('<b>Loading...</b>');
  load_data(id, _token);
 }); */

});


//about section read more in course page end
$(document).on('click','.menuclose',function(){
    var THIS = $(this);
        $(".resetData").click();    $(".result").hide();
});


$(document).on('click','.dwnPopupFrmId',function(){
    var THIS = $(this);
        var title   = THIS.data('title');   var button   = THIS.data('button');  $("#dwnPopupFrmId").modal();
        $("#dwnPopupFrmId #modal-heading").html(title); $('.frm_title').val(title); $("#dwnPopupFrmId .iq_from").val(title);   
		$("#dwnPopupFrmId .modal-placement-button").html(button);
});
$(document).on('click','.popupDwnId',function(){
    var THIS = $(this);  var title   = THIS.data('title');   var button   = THIS.data('button');   $("#popupDwnId").modal();
        $("#popupDwnId #modal-heading").html(title);	$('.frm_title').val(title);   $("#popupDwnId .iq_from").val(title);           
         $("#popupDwnId .modal-placement-button").html(button);
		 });
$(document).on('click','.dwnCrcm',function(){
    var THIS = $(this); var title   = THIS.data('title');   var button   = THIS.data('button');  $("#dwnCrcm").modal();
        $("#dwnCrcm #modal-heading").html(title); $('.frm_title').val(title); $("#dwnCrcm .iq_from").val(title);    
		$("#dwnCrcm .modal-placement-button").html(button);
});

$(document).on('click','.frmModalPopup',function(){
    var THIS = $(this); var title   = THIS.data('title');   var button   = THIS.data('button');  $("#frmModalPopup").modal();
        $("#frmModalPopup #modal-heading").html(title); $('.frm_title').val(title); $("#frmModalPopup .iq_from").val(title);           
         $("#frmModalPopup .modal-placement-button").html(button);
});
$(document).on('click','.downloadsyllbus',function(){
    var THIS = $(this); var title   = THIS.data('title');   var button   = THIS.data('button');            
        $("#downloadsyllbus").modal();  $("#downloadsyllbus #modal-heading").html(title);
		$('.frm_title').val(title); $("#downloadsyllbus .iq_from").val(title);           
         $("#downloadsyllbus .modal-placement-button").html(button);
});
 $(document).on('click','.inquerySide',function(){
    var THIS = $(this); var title   = THIS.data('title');  var paragraph   = THIS.data('paragraph');            
        $("#sidepopup-class-div").modal(); $("#sidepopup-class-div #myModalLabel2").html(title); 
		$('.frm_title').val(title);  $("#sidepopup-class-div .iq_from").val(title);        
        $("#sidepopup-class-div .paragrap").html(paragraph);
});
	$(document).on('click','.vdoFrmPopupModal',function(){
	var THIS = $(this); var title   = THIS.data('title');   var button   = THIS.data('button');            
	$("#vdoFrmPopupModal").modal();	$("#vdoFrmPopupModal #modal-heading").html(title);    
	$('.frm_title').val(title); $("#vdoFrmPopupModal .iq_from").val(title);                  
	$("#vdoFrmPopupModal #modal-placement-button").html(button);
	});
/* 	
	$(".videoclose").click(function(){	 
	$("#playVdoId").modal();			 
	});
	 */
	$(document).on('click','.playVdoId',function(){
	var THIS = $(this);	 $("#playVdoId").modal();   
	});	
	$(document).on('click','.videoreviews',function(){
	var THIS = $(this); var title   = THIS.data('title');  var button   = THIS.data('button');            
	$("#videoreviews").modal(); $("#videoreviews #modal-heading").html(title); $('.frm_title').val(title);	
	$("#videoreviews .iq_from").val(title);  $("#videoreviews #modal-placement-button").html(button);
	});
	
	$(".videoreviewclose").click(function(){	 
	$("#VideoReviwsPlay").modal();			 
	});
	
	$(".downloadclose").click(function(){	 
	$("#dwnCrcm").modal('hide');	$("#dwn-pdf-Id").modal();			 
	});

	$(".downloadclosemaster").click(function(){	 
	$("#vdoFrmPopupModal").modal('hide');	$("#dwn-pdf-Id_master").modal();			 
	});  
$(document).on('click','.offercovid',function(){    
    $("#offerspopup").modal();
});




$(document).on('change','.select_country',function(e){		
e.preventDefault(); $this = $(this);
if($this.val()=='') return;		 
$.ajax({
"url":"/get_state_ajax/"+$this.val(),
"type":"GET",
"success":function(data,textStatus,jqXHR){					 
if(data.length>0){
var html = '<option value="">Select State</option>';
for(var i in data){
html+='<option value="'+data[i].state_id+'">'+data[i].state_name+'</option>';
}
$('.show_state').html(html);
}
}
});
});

$(document).on('change','.choosestate',function(e){		
e.preventDefault();	$this = $(this);
if($this.val()=='') return;		 
$.ajax({
"url":"/get_city_ajax/"+$this.val(),
"type":"GET",
"success":function(data,textStatus,jqXHR){					 
if(data.length>0){
var html = '<option value="">Select City</option>';

for(var i in data){
html+='<option value="'+data[i].city_id+'">'+data[i].city_name+'</option>';
}
$('.show_city').html(html);
}

}
});


});
		
	 
 
 var contactController = (function(){
		return {
			checked_Ids:[],	
			
			dataSaveForm:function(THIS){				
				var $this = $(THIS), 
				data  = $this.serialize();	
	 
			$.ajax({
					url:"/dataSaveForm",
					type:"POST",
					data:data,
					success:function(response){
						 
						if(response.status){				 
							 //$('button[type="submit"]').removeAttr('disabled');
							$("#dwnPopupFrmId").modal('hide');
							$("#popupDwnId").modal('hide');
							$("#frmModalPopup").modal('hide');
							$("#popupFrmEnr").modal('hide');
							$(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							 
							
						}else{			
							$("#dwnPopupFrmId").modal('hide');						
							$("#popupFrmEnr").modal('hide');
							$("#frmModalPopup").modal('hide');							
							$("#popupDwnId").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
						$("#dwnPopupFrmId").modal('hide');						
							$("#popupFrmEnr").modal('hide');
							$("#frmModalPopup").modal('hide');							
							$("#popupDwnId").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},
			
			dataSavePopup:function(THIS){				
				var $this = $(THIS), 
				data  = $this.serialize();	
	 
			$.ajax({
					url:"/dataSavePopup",
					type:"POST",
					data:data,
					success:function(response){
						 
						if(response.status){				 
							 $('button[type="submit"]').removeAttr('disabled');
						
							$("#with_course").modal('hide');
							$("#dwnPopupFrmId").modal('hide');
							$("#frmModalPopup").modal('hide');
							$("#popupFrmEnr").modal('hide');
							$(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							 
							
						}else{			
							$("#with_course").modal('hide');						
							$("#popupFrmEnr").modal('hide');
							$("#frmModalPopup").modal('hide');							
							$("#popupDwnId").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
						$("#dwnPopupFrmId").modal('hide');						
							$("#popupFrmEnr").modal('hide');
							$("#frmModalPopup").modal('hide');							
							$("#popupDwnId").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},
			
			saveRequestZone:function(THIS){	
			$('button[type="submit"]').prop('disabled','disabled');	
			$('input[type="text"],input[type="radio"],input[type="tel"],textarea[type="text"]').keyup(function() {
			if($(this).val() != '') {
			$(':input[type="submit"]').prop('disabled', false);
			} });
				  var $this = $(THIS);
			var form = new FormData(THIS);	
				$.ajax({
					url:"/saveRequestZone",
					type:"POST",
					dataType:"json",
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,					 
					success:function(response){						 
						if(response.status){				 
							 $('button[type="submit"]').removeAttr('disabled');
							 $this.closest('.modal').modal('hide');							 
							$(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							 
							
						}else{			
							$("#dwnPopupFrmId").modal('hide');						
							$("#popupFrmEnr").modal('hide');
							$("#frmModalPopup").modal('hide');							
							$("#popupDwnId").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
						    $("#dwnPopupFrmId").modal('hide');						
							$("#popupFrmEnr").modal('hide');
							$("#frmModalPopup").modal('hide');							
							$("#popupDwnId").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},
			
			checkmobilefeedback:function(THIS){				 

				var $this = $(THIS),
					data  = $this.serialize();	
					
			$('button[type="submit"]').prop('disabled','disabled');	
			$('input[type="text"],input[type="tel"]').keyup(function() {
			if($(this).val() != '') {
			$(':input[type="submit"]').prop('disabled', false);
			} });
									
					$.ajax({
					type:"POST",
					url:"/checkmobilefeedback",
					data:data,
					beforeSend:function(){
					$("#error").fadeOut();
					$("#btn-login").html("<span class=\"glyphicon glyphicon-transfer\"></span> &nbsp; sending ...");
					},
					success:function(data,textStatus,jqXHR){
					if(data.statusCode && data.statusCode == 1){						
					
					$('.form-result-mobile').replaceWith(data.data.payload);
					$("#btn-login").html('<span><span>Continue</span></span>');
					$('.input-otp').before(data.data.message);
					//document.getElementById("vas").style.display = "block";
					//document.getElementById("ret").style.display = "none";
						$('.inpsuts').keyup(function () {

						if (this.value.length == this.maxLength) {
						$(this).next('.inpsuts').focus();
						}
						});
					}				
					else{
					$(".alert").remove();
					$('.help-block').html('<strong>'+data.data.message+'</strong>');
					$("#btn-login").html('<span><span>Continue</span></span>');
					}				
					}					
					});	 
								
				return false;
			},
			checkjobportal:function(THIS){				 

				var $this = $(THIS),
					data  = $this.serialize();	
			$('button[type="submit"]').prop('disabled','disabled');	
			$('input[type="text"],input[type="tel"]').keyup(function() {
			if($(this).val() != '') {
			$(':input[type="submit"]').prop('disabled', false);
			} });
									
					$.ajax({
					type:"POST",
					url:"/checkjobportal",
					data:data,
					beforeSend:function(){
					$("#error").fadeOut();
					$("#btn-login").html("<span class=\"glyphicon glyphicon-transfer\"></span> &nbsp; sending ...");
					},
					success:function(data,textStatus,jqXHR){
					if(data.statusCode && data.statusCode == 1){						
					
					$('.form-result-job-portal').replaceWith(data.data.payload);
					$("#btn-login").html('<span><span>Continue</span></span>');
					$('.input-otp').before(data.data.message);
					//document.getElementById("vas").style.display = "block";
					//document.getElementById("ret").style.display = "none";
						$('.inpsuts').keyup(function () {

						if (this.value.length == this.maxLength) {
						$(this).next('.inpsuts').focus();
						}
						});
					}				
					else{
					$(".alert").remove();
					$('.help-block').html('<strong>'+data.data.message+'</strong>');
					$("#btn-login").html('<span><span>Continue</span></span>');
					}				
					}					
					});	 
								
				return false;
			},
			
			saveTrainingFeedback:function(THIS){			
			 	
		/*	$('button[type="submit"]').prop('disabled','disabled');	
			$('input[type="text"],input[type="radio"],input[type="tel"],textarea[type="text"]').keyup(function() {
			if($(this).val() != '') {
			$(':input[type="submit"]').prop('disabled', false);
			} });
			*/
				  var $this = $(THIS);
			var form = new FormData(THIS);	
				$.ajax({
					url:"/saveRequestZone",
					type:"POST",
					dataType:"json",
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,					 
					success:function(response){						 
						if(response.status){				 
							 $('button[type="submit"]').removeAttr('disabled');
							 $this.closest('.modal').modal('hide');							 
							$(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							
							window.location=document.location.href;     
							 
							
						}else{			
							$("#dwnPopupFrmId").modal('hide');						
							$("#popupFrmEnr").modal('hide');
							$("#frmModalPopup").modal('hide');							
							$("#popupDwnId").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
						alert('Something went wrong');
						}
						 
					}
				});
				return false;
			},
			getstdfeedback:function(THIS){				 

				var $this = $(THIS),
					data  = $this.serialize();	
									
					$.ajax({
					type:"POST",
					url:"/getstdfeedback",
					data:data,
					beforeSend:function(){
					$("#error").fadeOut();
					$("#btn-login").html("<span class=\"glyphicon glyphicon-transfer\"></span> &nbsp; sending ...");
					},
					success:function(data,textStatus,jqXHR){
					if(data.statusCode && data.statusCode == 1){
						//$('.student-details').replaceWith(data.data.payload);
						$('.certraid').hide();
						$('.feedback-details').html(data.data.payload);
						 
					 
					}
					else{
					$(".alert").remove();
					$('.help-block').html('<strong>'+data.data.message+'</strong>');
					$("#btn-login").html('<span><span>Continue</span></span>');
					}
					}
					});	 
					
			 
				
				
				
				return false;
			},
			getstdjobportal:function(THIS){				 

				var $this = $(THIS),
					data  = $this.serialize();	
									
					$.ajax({
					type:"POST",
					url:"/getstdjobportal",
					data:data,
					beforeSend:function(){
					$("#error").fadeOut();
					$("#btn-login").html("<span class=\"glyphicon glyphicon-transfer\"></span> &nbsp; sending ...");
					},
					success:function(data,textStatus,jqXHR){
					if(data.statusCode && data.statusCode == 1){
						//$('.student-details').replaceWith(data.data.payload);
						$('.certraid').hide();
						$('.jobportal-details').html(data.data.payload);
						 
					 
					}
					else{
					$(".alert").remove();
					$('.help-block').html('<strong>'+data.data.message+'</strong>');
					$("#btn-login").html('<span><span>Continue</span></span>');
					}
					}
					});	 
					
			 
				
				
				
				return false;
			},
			
			getjobportaldetails:function(THIS){	
				var $this = $(THIS),
					data  = $this.serialize();	
									
					$.ajax({
					type:"POST",
					url:"/getjobportaldetails",
					data:data,
					beforeSend:function(){
					$("#error").fadeOut();
					$("#btn-login").html("<span class=\"glyphicon glyphicon-transfer\"></span> &nbsp; sending ...");
					},
					success:function(data,textStatus,jqXHR){
						 
					if(data.statusCode && data.statusCode == 1){
						//$('.student-details').replaceWith(data.data.payload);
						$('.certraid').hide();
						$('.jobportal-details').html(data.data.payload);
						 
					 
					}
					else{
					$(".alert").remove();
					$('.help-block').html('<strong>'+data.data.message+'</strong>');
					$("#btn-login").html('<span><span>Continue</span></span>');
					}
					},error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
						alert('Something went wrong');
						}
						 
					}
					});	 
					
			 
				
				
				
				return false;
			},
			
			dataSaveRight:function(THIS){			 
				var $this = $(THIS),
					data  = $this.serialize();	

		 
				$.ajax({
					url:"/dataSaveRight",
					type:"POST",
					data:data,
					success:function(response){						 
						if(response.status){		 
							 
							$(".resetData").click();
							$("#sidepopup-class-div").modal('hide');		
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							 
							
						}else{							 					
							$("#successMessageId").modal();
							$("#sidepopup-class-div").modal('hide');
							$('.imgclass').html('<img src="../public/image/message_alert.png" style="width: 50%;text-align: center;margin: auto;display: block;">');				
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');
						} 	}
						}else{
						$("#successMessageId").modal();
							$("#sidepopup-class-div").modal('hide');
							$('.imgclass').html('<img src="../public/image/message_alert.png" style="width: 50%;text-align: center;margin: auto;display: block;">');				
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},
			saveWatchVideoEnquiry:function(THIS){			 
			var $this = $(THIS), data  = $this.serialize();	
			
				$.ajax({
					url:"/dataSaveForm",
					type:"POST",
					data:data,
					success:function(response){
						 
						if(response.status){				  
							 $("#vdoFrmPopupModal").modal('hide');
						/*	
							 $(".resetData").click();
							$("#playVdoId").modal();							
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							 */
							 
							 $(".resetData").click();
							$("#sidepopup-class-div").modal('hide');		
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							 
							 
							 
							
						}else{			
							$("#dwnPopupFrmId").modal('hide');						
							$("#popupDwnId").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');
						} }
						}else{
						$("#dwnPopupFrmId").modal('hide');						
							$("#popupDwnId").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},
			savedwnCrcmss:function(THIS){			 
			var $this = $(THIS), data  = $this.serialize();	
			$('button[type="submit"]').prop('disabled','disabled');	
			$('input[type="text"],input[type="tel"]').keyup(function() {
			if($(this).val() != '') {
			$(':input[type="submit"]').prop('disabled', false);
			} });	
				$.ajax({
					url:"/dataSaveForm",
					type:"POST",
					data:data,
					success:function(response){
						 
						if(response.status){		 
							 
							$("#dwnCrcm").modal('hide');
							/* $(".resetData").click();
							$("#dwn-pdf-Id").modal();							 
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();*/
							
							
							 $(".resetData").click();
							$("#sidepopup-class-div").modal('hide');		
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							 
							 
							
						}else{			
							$("#dwnCrcm").modal('hide');								 					
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');
						} }
						}else{
				        	$("#dwnCrcm").modal('hide');								 					
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},	
			savedwnCrcm:function(THIS){			 
				var $this = $(THIS),
					data  = $this.serialize();	
			$('button[type="submit"]').prop('disabled','disabled');	
			$('input[type="text"],input[type="tel"]').keyup(function() {
			if($(this).val() != '') {
			$(':input[type="submit"]').prop('disabled', false);
			} });	
				$.ajax({
					url:"/dataSaveFormDownload",
					type:"POST",
					data:data,
					success:function(response){
						 
						if(response.status){		 
							 
							$("#dwnCrcm").modal('hide');
							 	
							 $(".resetData").click();
							$("#sidepopup-class-div").modal('hide');		
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							 
							
						}else{			
							$("#dwnCrcm").modal('hide');								 					
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
						alert('Something went wrong');
						}
						 
					}
				});
				return false;
			},			
			getOTP:function(THIS){			 
				var $this = $(THIS),
					data  = $this.serialize();	
					  
				$.ajax({
					url:"/getOTP",
					type:"POST",
					data:data,
					success:function(response){
						 
						if(response.status){		 
							 
							$("#download_mobileotp").modal('hide');
							 $(".resetData").click();						 						 
							$("#dwn-pdf-Id").modal();							 
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							 
							
						}else{	
			
						var el = $this.find('*[name="otp"]');
						$('<span class="help-block"><strong>'+response.errors+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');				
							$("#dwnCrcm").modal('hide');								 					
							 
							 							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
						alert('Something went wrong');
						}
						 
					}
				});
				return false;
			},
			
			
			savedownloadSyllabus:function(THIS){			 
			var $this = $(THIS), data  = $this.serialize();	
			$('button[type="submit"]').prop('disabled','disabled');	
			$('input[type="text"],input[type="tel"]').keyup(function() {
			if($(this).val() != '') {
			$(':input[type="submit"]').prop('disabled', false);
			} });	
				$.ajax({
					url:"/dataSaveFormDownload",
					type:"POST",
					data:data,
					success:function(response){						 
						if(response.status){							 
							$("#downloadsyllbus").modal('hide');
							 $(".resetData").click();
						//	$("#dwn-pdf-Id_master").modal();	
							 $("#download_master_otp").modal();
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							 
							
						}else{			
							$("#downloadsyllbus").modal('hide');								 					
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
					    	$("#downloadsyllbus").modal('hide');								 					
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});	
						}
						 
					}
				});
				return false;
			},
			
			getMasterOTP:function(THIS){			 
				var $this = $(THIS),
					data  = $this.serialize();	
						 
				$.ajax({
					url:"/getOTP",
					type:"POST",
					data:data,
					success:function(response){						 
						if(response.status){							 
							$("#downloadsyllbus").modal('hide');
							$("#download_master_otp").modal('hide');
							 $(".resetData").click();							 
							$("#dwn-pdf-Id_master").modal();							 
							removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							 
							
						}else{							
			
						var el = $this.find('*[name="otp"]');
						$('<span class="help-block"><strong>'+response.errors+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');				
							$("#dwnCrcm").modal('hide');								 					
							 
							 							
						}						
						
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
						alert('Something went wrong');
						}
						 
					}
				});
				return false;
			},
			
			saveOffer:function(THIS){			 
				var $this = $(THIS),
					data  = $this.serialize();						
				$.ajax({
					url:"/dataSaveForm",
					type:"POST",
					data:data,
					success:function(response){
						 
						if(response.status){				 
							$("#offerspopup").modal('hide');
							 $(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							removeValidationErrors($this);						 
							
						}else{			
							$("#offerspopup").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');				
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
					    	$("#offerspopup").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');				
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},
				saveCorporateEnquiry:function(THIS){			 
				var $this = $(THIS),
					data  = $this.serialize();					 
				$.ajax({
					url:"/saveCorporateEnquiry",
					type:"POST",
					data:data,
					success:function(response){						 
						if(response.status){				 
							$("#offerspopup").modal('hide');
							 $(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							removeValidationErrors($this);					 
							
						}else{			
							$("#offerspopup").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){						 
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');
						}		}
						}else{
					    	$("#offerspopup").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}			 
					}
				});
				return false;
			},			
			saveFranchise:function(THIS){			 
				var $this = $(THIS),	data  = $this.serialize();					 
				$.ajax({
					url:"/saveFranchise",
					type:"POST",
					data:data,
					success:function(response){
						 
						if(response.status){				 
							$("#fran").modal('hide');
							$(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#.successMessageId').modal({backdrop:"static",keyboard:false});
							//removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							
						}else{			
							$("#fran").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');				
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){
						//showValidationErrors($this,response.errors);
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
						$("#fran").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');				
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},
			saveScholarship:function(THIS){			 
				var $this = $(THIS),	data  = $this.serialize();					 
				$.ajax({
					url:"/saveScholarship",
					type:"POST",
					data:data,
					success:function(response){
						 
						if(response.status){				 
					    	$this.closest('.modal').modal('hide');			
							$(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							//removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							
						}else{			
							$("#sclrsp").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');				
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){
						//showValidationErrors($this,response.errors);
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
				        	$("#sclrsp").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');				
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},
			saveReview:function(THIS){		
				var $this = $(THIS);
				var form = new FormData(THIS);						
				$.ajax({
					url:"/saveReview",
					type:"POST",					   
					dataType:"json",
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,     
					success:function(response){
						 
						if(response.status){				 
					    	$this.closest('.modal').modal('hide');			
							$(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							//removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							
						}else{			
							$("#sclrsp").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');				
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){
						//showValidationErrors($this,response.errors);
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');
						}		}

						}else{
							$("#sclrsp").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');				
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});	
						}
						 
					}
				});
				return false;
			},
			saveNewsLetter:function(THIS){			 
				var $this = $(THIS),	data  = $this.serialize();					 
				$.ajax({
					url:"/saveNewsLetter",
					type:"POST",
					data:data,
					success:function(response){
						 
						if(response.status){				 
						$this.closest('.modal').modal('hide');			
							$(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							//removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							
						}else{			
							$("#sclrsp").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){
						//showValidationErrors($this,response.errors);
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
					        $("#sclrsp").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},
			
			saveNotifications:function(THIS){			 
				var $this = $(THIS), data  = $this.serialize();					 
				$.ajax({
					url:"/saveNotifications",
					type:"POST",
					data:data,
					success:function(response){
						 
						if(response.status){				 
				    		$this.closest('.modal').modal('hide');			
							$(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							//removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							
						}else{			
							$("#sclrsp").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){
						//showValidationErrors($this,response.errors);
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');
						}	}
						}else{					 					
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},
			faceAnIssue:function(THIS){			 
				var $this = $(THIS),
					data  = $this.serialize();					 
				$.ajax({
					url:"/faceAnIssue",
					type:"POST",
					data:data,
					success:function(response){
						 
						if(response.status){				 
					    	$this.closest('.modal').modal('hide');			
							$(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							//removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							
						}else{			
							$("#sclrsp").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){
						//showValidationErrors($this,response.errors);
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');

						}
						}

						}else{
					 					
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},
			saveApplyJob:function(THIS){	
				var $this = $(THIS); var form = new FormData(THIS);		 						 
				$.ajax({
					url:"/saveApplyJob",					 
					type:"POST",					   
					dataType:"json",	
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,  
					success:function(response){
						 
						if(response.status){				 
					    	$this.closest('.modal').modal('hide');			
							$(".resetData").click();
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/thanks.jpg" style="width: 100%;text-align: center;margin: auto;display: block;">');					
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>We will get back to you soon.</p>");
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
							//removeValidationErrors($this);
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							
						}else{			
							$("#sclrsp").modal('hide');						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){
						//showValidationErrors($this,response.errors);
						var errors=response.errors;
						$this.find('.form-inline').removeClass('has-error');
						$this.find('.help-block').remove();
						for (var key in errors) {
						if(errors.hasOwnProperty(key)){
						var el = $this.find('*[name="'+key+'"]');
						$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
						el.closest('.form-inline').addClass('has-error');
						} 	}
						}else{
					 						
							$("#successMessageId").modal();
							$('.imgclass').html('<img src="../public/image/error-msg.jpg" style="width: 50%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessageId').modal({backdrop:"static",keyboard:false});
						}
						 
					}
				});
				return false;
			},
			
			mobileverifiction:function(THIS){	
				var $this = $(THIS), data  = $this.serialize();	
				$('button[type="submit"]').prop('disabled','disabled');	
			$('input[type="password"],input[type="tel"],input[type="text"]').keyup(function() {
			if($(this).val() != '') {
			$(':input[type="submit"]').prop('disabled', false);
			} });
					$.ajax({
					type:"POST",
					url:"/mobileverifiction",
					data:data,
					beforeSend:function(){
					$("#error").fadeOut();
					$("#btn-login").html("<span class=\"glyphicon glyphicon-transfer\"></span> &nbsp; sending ...");
					},
					success:function(data,textStatus,jqXHR){
					if(data.statusCode && data.statusCode == 1){						
					
					$('.input-otp').replaceWith(data.data.payload);
					$("#btn-login").html('<span><span>Continue</span></span>');
					$('.input-otp').before(data.data.message);
					document.getElementById("vas").style.display = "block";
					document.getElementById("ret").style.display = "none";
						$('.inpsuts').keyup(function () {

						if (this.value.length == this.maxLength) {
						$(this).next('.inpsuts').focus();
						}
						});
					}				
					else{
					$(".alert").remove();
					$('.help-blocks').html('<strong>'+data.data.message+'</strong>');
					$("#btn-login").html('<span><span>Continue</span></span>');
					}
					}
					});	 	
				return false;
			},
			otpVerifiction:function(THIS){	
				var $this = $(THIS),	data  = $this.serialize();										
					$.ajax({
					type:"POST",
					url:"/otpVerifiction",
					data:data,
					beforeSend:function(){
					$("#error").fadeOut();
					$("#btn-login").html("<span class=\"glyphicon glyphicon-transfer\"></span> &nbsp; sending ...");
					},
					success:function(data,textStatus,jqXHR){
					if(data.statusCode && data.statusCode == 2){						
					//	$('a[href="#track"]').trigger('click');
					$(".resetData").click();
					 $('a[href="#track"]').removeClass('disabled').trigger('click');
					}
					else{
					$(".alert").remove();
					$('.help-blocks').html('<strong>'+data.data.message+'</strong>');
					$("#btn-login").html('<span><span>Continue</span></span>');
					}
					}
					});	 
								
				return false;
			},			
			getCertificateno:function(THIS){
				var $this = $(THIS),  data  = $this.serialize();										
					$.ajax({
					type:"POST",
					url:"/getCertificateno",
					data:data,
					beforeSend:function(){
					$("#error").fadeOut();
					$("#btn-login").html("<span class=\"glyphicon glyphicon-transfer\"></span> &nbsp; sending ...");
					},
					success:function(data,textStatus,jqXHR){
					if(data.statusCode && data.statusCode == 1){
						//$('.student-details').replaceWith(data.data.payload);
						$('.certraid').hide();
					//	$('.student-details').html(data.data.payload);
						$('.student-data').html(data.data.payload);	 
					}
					else{
					$(".alert").remove();
					$('.help-block').html('<strong>'+data.data.message+'</strong>');
					$("#btn-login").html('<span><span>Continue</span></span>');
					} }	});	 
					return false;
			},			
	};
	})();
	function removeValidationErrors($this){
		$this.find('.form-group').removeClass('has-error');
		$this.find('.help-block').remove();
		}

function showValidationErrors($this,errors){
$this.find('.form-group').removeClass('has-error');
$this.find('.help-block').remove();
for (var key in errors) {
if(errors.hasOwnProperty(key)){
var el = $this.find('*[name="'+key+'"]');
$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
el.closest('.form-group').addClass('has-error');
} } }
//all course page all category heading start
function mycategory() {
    var cat = document.getElementById("myLinks");
    var caticon = document.getElementById("croptabicon");
    if (cat.style.display === "none") {
        cat.style.display = "block";
        caticon.classList.add("fa-angle-up");
        caticon.classList.remove("fa-angle-down");
    } else {
        cat.style.display = "none";
        caticon.classList.add("fa-angle-down");
        caticon.classList.remove("fa-angle-up");
    }
}
//all course page all category heading end

//all course page load more program start
function loadprogram() {
    var mp = document.getElementById("more-program");
    var sp = document.getElementById("more-show-program");
    var famore = document.getElementById("show-more-fa-program");
    if (mp.style.display == 'block') {
        mp.style.display = 'none';
        sp.innerHTML = 'Show More';
        famore.classList.add("fa-angle-down");
        famore.classList.remove("fa-angle-up");
    }
    else {
        mp.style.display = 'block';
        sp.innerHTML = 'Show Less';
        famore.classList.add("fa-angle-up");
        famore.classList.remove("fa-angle-down");
    }
};

function showCategory() { 		
$.ajax({
"url":"/get_category_ajax",
"type":"GET",
"success":function(data,textStatus,jqXHR){

if(data.length>0){
var html = '';

for(var i in data){
html+=' <a class="drop-item-std" href="#" onclick="showCoursewtihCtg(this,'+data[i].categoryid+')">'+data[i].categoryname+'</a>';
}
$('.dropdown-menu').html(html);
} } }); 

}
		 
 
function showCoursewtihCtg(THIS,catid) {			 
var $this = $(THIS);
$(".cortablinks").removeClass("active");    
if (!$this.hasClass('active')) {
$this.addClass('active');
$('.modal-course-list .cortablinks').addClass('active');
} 
$.ajax({
"url":"/get_category_course/"+catid,
"type":"GET",
"success":function(data,textStatus,jqXHR){

if(data.length>0){
$('.show-ctg-crs-cls').html(data);				 
}	}	});				  
}				 
				
	function dspMasterCrsFun(THIS,catid) {			 
	var $this = $(THIS);
	$(".mptablinks").removeClass("active");

	if (!$this.hasClass('active')) {
	$this.addClass('active');
	}


	$.ajax({
	"url":"/get_category_master/"+catid,
	"type":"GET",
	"success":function(data,textStatus,jqXHR){

	if(data.length>0){
	$('.show-category-master').html(data);

	}
	}
	}); 


	}
	
	 $('.dspMasterCrsFun').on('click', function(){  

	$(".mptablinks").removeClass("active");
	$(".showCoursewtihCtg").removeClass("active");				 
	$(".dspMasterCrsFun").addClass("active");
	$.ajax({
	"url":"/get_category_master/"+13,
	"type":"GET",
	"success":function(data,textStatus,jqXHR){

	if(data.length>0){
	$('.show-category-master').html(data);	}	}	}); }); 	
	$('.showCoursewtihCtg').on('click', function(){  
	$(".mptablinks").removeClass("active");
	$(".showCoursewtihCtg").addClass("active");				 
	$(".dspMasterCrsFun").removeClass("active");
	$.ajax({
	"url":"/get_category_course/"+13,
	"type":"GET",
	"success":function(data,textStatus,jqXHR){
	if(data.length>0){
	$('.show-ctg-crs-cls').html(data);
	}else{
		
	}
	}
	}); 
	}); 

	function showCategoryAllCourse(THIS,catid){			 
	var $this = $(THIS);
	$(".corptablinks").removeClass("active");    
	if (!$this.hasClass('active')) {
	$this.addClass('active');
	}		    

	$.ajax({
	"url":"/get_all_course_page/"+catid,
	"type":"GET",
	"success":function(data,textStatus,jqXHR){

	if(data.length>0){					 
	$('.crs-show-list').html(data);				 
	}else{

	}
	}
	});				  
	}

	//Search course   
	function studentdata(name,id)
	{	 
	$('.plocation').val(name);	$('.location').val(id);	getCoursesFun(id); $('.result').hide();
	}
	function courseKeySearch(a){	
	$('.submit-btns').prop("disabled",true);
	if(a.length >0)
	{   
	$('.loader').show();	
	$.ajax({
	url:"/courses/ajax_view",
	type:'post',
	data:{id:a},
	success:function(data){
	$('.result-body').html(data);
	$('.loader').hide();
	}
	});
	}else{
	$('.result').hide();
	}
	} 

	function searchKeyEmpty()
	{

		$.ajax({
		url:"/courses/ajax_course",
		type:'post',		 
		success:function(data){

		$('.result-body').html(data);
		$('.loader').hide();

		}
		});

	}  

	function getCoursesFun(id)
	{   
		$.ajax({
			type: "post",
			url: "/courses/get_courses",
			data: {id:id},
			cache: false,
			success: function(data)
			{		
				 var obj =JSON.parse(data);		
				 
			 
				  window.location = "/courses/"+obj.slug; 	 
					
					
			}
		});		
	}
	
	//Search course   
	function categorydata(name,id)
	{	 
	$('.pcategory').val(name);
	$('.searchlocation').val(id);
	 showCategoryAllCourse(this,id);
	$('.result').hide();
	}

	function searchCategoryid(a){	

		$('.submit-btns').prop("disabled",true);
		if(a.length >0)
		{   
		$('.result').show();
		 
		$.ajax({
		url:"/courses/ajax_searchCategoryid",
		type:'post',
		data:{id:a},
		success:function(data){


		$('.result-category-list').html(data);
		$('.result').show();
		


		}
		});
		}else{
		$('.result-category-list').show();
		}
	} 
	
	function searchCategory()
	{

		$.ajax({
		url:"/courses/ajax_searchCategory",
		type:'post',		 
		success:function(data){

		$('.result-category-list').html(data);
		$('.result').show();

		}
		});

	}  

	
	function searchTechnologyId(a){	
		$('.submit-btns').prop("disabled",true);
		if(a.length >0)
		{   
		$('.result').show();		 
		$.ajax({
		url:"/reviews/ajax_technologyId",
		type:'post',
		data:{id:a},
		success:function(data){
		$('.result-category-list').html(data);
		$('.result').show();
		}
		});
		}else{
		$('.result-category-list').show();
		}
	} 
		
		function searchTechnology()
		{
			$.ajax({
			url:"/reviews/ajax_technology",
			type:'post',		 
			success:function(data){

			$('.result-category-list').html(data);
			$('.result').show();

			}
			});

		}  
		 
/*	function offerclose(){
	$('.mob-offer').hide();	$('.offer-container').hide();	$('.close-cls').show();	
	}
  function openoffer(){
	  $('.mob-offer').show();	 $('.offer-container').show();  $('.close-cls').hide();		  
  }

	  */
 
		
		function isNumericKeyCheck(e){
		var keyCode = e.keyCode || e.charCode;
		if(keyCode>=48&&keyCode<=57)
		return true;
		else
		return false;
		}
		
		
		$(document).on('click','#invoicePrintPdf',function(e){

		var THIS = $(this);
		var id   = THIS.data('sid'); 

		$.ajax({
		url:"/getInvoicePrintPdf",
		type:"POST",			
		data:{action:'getInvoicePrintPdf',pid:id},

		success: function(response) {        		
		var printWindow = window.open('', '', 'width=700,height=500');
		printWindow.document.write(response);
		return false;

		}

		});	 

		}); 
		
	$(".playCloseCls").click(function(){		 
	$(".video1")[0].src += "?autoplay=false";		  
	});