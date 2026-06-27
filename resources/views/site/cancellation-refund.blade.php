@extends('site.layouts.app')
@section('title')
Cancellation & Refund
@endsection 
@section('keyword')
Cancellation & Refund
@endsection
@section('description')
 Cancellation & Refund
@endsection
@section('content')
<div class="main">	
<style>
.policy-cc li {
    list-style-type: disc;
    margin-left: 40px;
    margin-bottom: 12px;
}
.policy-cc{	
	font-size: 14px;
}
.plmt-desc-box p{
	font-size: 14px;
}
</style>
	<div class="top-banner">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs">
            <div class="top-banner-title">
                <h1><span>Terms &amp; Conditions </span></h1> 
			</div>
            <div class="bread_crums">
                <p id="breadcrumbs"><span><span><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span><a href="{{url('refund-cancellation-policy')}}">Refund/Cancellation Policy</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <strong class="breadcrumb_last" aria-current="page">Refund/Cancellation Policy</strong></span></span></span></p>            </div>
        </div>
    </div>
</div>
		<section class="ans-place">
			<div class="container">
			   <div class="placement-section">
				<div class="row">
					<div class="col-md-9">
						<div class="ans-place-content">
							<div class="ans-place-header">
								<h3>Cancellation and Refund Policy</h3>
								<p>Discover the success stories of our alumni through our placement platform! Many have secured prestigious roles in global organizations and achieved remarkable career milestones. Now, it's your chance to step into their shoes and build a rewarding future. </p>
							</div>
							<div class="plmt-desc-box">
								<ul class="policy-cc">
								     <h6>Refund Guidelines</h6>
								 <li>Refunds will not be approved once the first session of the enrolled program has been attended.</li>
								 <li>Sharing course materials with others will void any eligibility for a refund. </li>
								 <li>No refunds will be issued after the training schedule has been confirmed and sessions have begun.</li>
								 <li>Requests for refunds submitted beyond the specified time frame will be automatically rejected.</li>
								 
								 </ul>
								 </ul>
								 <ul class="policy-cc">
								 <h6>Exceptions to Refunds</h6>
								 <li>The "5-Day Flexible Refund Policy" will not apply under these circumstances:</li>
								 <li> Course content has been accessed or downloaded from our platform.</li>
								  <li>Refunds for official course materials, including books and documents, are not permissible.</li>
								   <li> Self-paced learning packages are non-refundable.</li>
								    <li>Examination fees, once paid, are non-refundable. Any misuse of the refund policy may result in restrictions on current and future services without prior notice.</li>
								    </ul>
								<ul class="policy-cc">
								     <h6>Policy Updates</h6>
								 <li>We reserve the right to amend these terms at any time. Updates will be published on our website without prior notification. By continuing to use our services, you accept any revised policies.</li>
								 </ul>
								 <ul class="policy-cc">
								     <h6>Request Submission</h6>
								 <li>Refund or cancellation requests must be made within 7 days of payment. Requests submitted after this period will not be entertained.</li>
								 <li>For assistance, please email us at [Insert Email Address].</li>
								 <li>Refunds will be processed within 30 days after validating the request.</li>
								 </ul>
								 <ul class="policy-cc">
								     <h6>Rescheduling or Course Changes</h6>
								 <li>Changes to your program schedule or selected course depend on resource availability and may take up to 3 weeks to implement. While we strive to accommodate all requests, there may be instances where modifications are not possible due to limitations. In such cases, an administrative fee of 10% will be applied.</li>
								 </ul>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="ans-place-right">
							 
							<div class="form-contact pi-place">
								 
								<div class="form-column">
									<strong>Request more information</strong>
									<form action="" method="post" onsubmit="return contactController.dataSaveRight(this)">
									
										<input type="hidden" name="from" value="Placement">	
										<input type="hidden" name="frm_title" value="Side Bar Placement" >
										<input type="text" name="name" placeholder="Enter Name">
										<input type="text" name="email" placeholder="Enter Email">
										 
<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="intCntCode" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control codeIntCode" name="code" value="" >
<div class="append_countryCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div>
										 <input type="text" name="course" maxlength="32" placeholder="Enter Course">
										<textarea name="message" placeholder="Enter remark"></textarea>
										<input type="reset" class="resetData">	
										<button type="submit" class="moreButtonId" >Submit</button>
									</form>						
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</section>
		  
	</div>
	
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<script>
 
	  		
$(document).on('change','.selecttechnology',function(e){		
			e.preventDefault();
			$this = $(this);	 
			
			if($this.val()=='') return;		 
				$.ajax({
					"url":"/searchplacement/"+$this.val(),
					"type":"post",
					"success":function(data){	
 					
						if(data.length>0){
							$('.plmt-desc-box').html(data);
								 
						}
						 
					}
				});
			 
	 
		});
     
    $('.selecttechnology').select2({ placeholder: "Search Technology",});
    $('.select-technology').select2();
	
	 
 
</script>


<script>
$(document).ready(function(){
 
 var _token = $('input[name="_token"]').val();

 load_data('', _token);

 function load_data(id="", _token)
 {
  $.ajax({
   url:"placement/placementLoadData",
   method:"POST",
   data:{id:id, _token:_token},
   success:function(data)
   {
    $('#load_more_button').remove();
    $('#post_data').append(data);
   }
  })
 }

 $(document).on('click', '#load_more_button', function(){
  var id = $(this).data('id');
  $('#load_more_button').html('<b>Loading...</b>');
  load_data(id, _token);
 });

});
</script>
@endsection