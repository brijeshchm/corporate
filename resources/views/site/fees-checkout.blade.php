@extends('site.layouts.app')
@section('title')
@if(!empty($coursesdetails->title))	 
 {{$coursesdetails->title}}; 
@else
	Corporate Academy India's No.1 Best IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection 
@section('keyword')
@if(!empty($coursesdetails->meta_keyword))
	{{$coursesdetails->meta_keywords}};
@else
	Corporate Academy India's No.1 Best IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection
@section('description')
@if(!empty($coursesdetails->meta_description))
{{$coursesdetails->meta_description}};
@else
	Corporate Academy India's No.1 Best IT Training Institute in Noida | Delhi | Gurgaon for Industrial Training. We conducts IT Software, Hardware, Network &amp; Security Courses training. Corporate Trainer commands all training program. Week Days, Weekend, 6 Week, 6 Months Industrial Training are available
@endif
@endsection
@section('content')
 
 
 
 
	<style>
	  a.disabled {
  pointer-events: none;
  cursor: default;
}  
	</style>
	 	<script>
		window.onload = function() {
			var d = new Date().getTime();
			document.getElementById("tid").value = d;
			var o = "CC_"+Math.floor((Math.random() * 1000) + 1)+"_"+d;
			document.getElementById("merchant_order_id").value = o;
			document.getElementById("order").innerHTML = o;
		};
	</script>
<div class="main">	
		<section class="fee-deposit">
			<div class="container">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<nav>
		                    <div class="nav payment-form" role="tablist">
			                    <a class="nav-item disabled" data-toggle="tab" href="#Student-Detail" role="tab" aria-controls="nav-home" aria-selected="true" >Details</a>
			                    <a class="nav-item active" data-toggle="tab" href="#transaction" role="tab" aria-controls="nav-profile" aria-selected="false" >Transaction</a>
			                   
			                    <a class="nav-item disabled" data-toggle="tab" href="#confirmation" role="tab" aria-controls="nav-about" aria-selected="false" style="pointer-events: none">Confirmation</a>
								<a class="nav-item"  data-toggle="tab" href="#faceanissue" role="tab" aria-controls="nav-home" aria-selected="true">Face an issue</a>
		                    </div>
		                </nav>
		                <div class="tab-content">
		                     
		                    <div class="tab-pane fade show active" id="transaction" role="tabpanel" aria-labelledby="transaction">
		                      <div class="transaction-section">
							  <div class="transaction_details"></div>
							  						  
							<table>
							<tr>
							<td><strong>Summary</strong></td>

							<td><strong>Details</strong></td>
							</tr>
							<tr>
							<th>Order Id</th>

							<td id="order"></td>
							</tr>
							<tr>
							<th>Name</th>

							<td><?php echo $data->name; ?></td>
							</tr>
							<tr>
							<th>Email</th>

							<td><?php echo $data->email; ?></td>
							</tr>
							<tr>
							<th>Course</th>

							<td><?php echo $data->course; ?></td>
							</tr>
							<tr>
							<th>Registration Amount</th>

							<td><?php echo $data->amt. " INR"; ?></td>
							</tr>
							<tr>
							<th>Contact</th>

							<td><?php echo $data->phone; ?></td>
							</tr>
							 
							<tr>
							<th>City</th>

							<td><?php echo $data->city.", ".$data->state.", ".$data->country; ?></td>
							</tr>

							</table>

								
																
																
								<form name="razorpay_frm_payment" class="razorpay-frm-payment" id="razorpay-frm-payment" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}" />
								
								<input type="hidden" name="tid" id="tid" readonly />
								<input type="hidden" name="merchant_order_id" id="merchant_order_id"> 
								<input type="hidden" name="language" value="EN"> 
								<input type="hidden" name="currency" id="currency" value="INR"> 
									<input type="hidden" name="surl" id="surl" value="http://demo.techpratham.com/success/"> 
								<input type="hidden" name="furl" id="furl" value="http://demo.techpratham.com/failed/"> 
							<!--	<input type="hidden" name="surl" id="surl" value="http://localhost:8000/success/"> 
								<input type="hidden" name="furl" id="furl" value="http://localhost:8000/thankyou/"> -->

								<input type="hidden" class="form-control" id="amount" name="amount" placeholder="amount" value="<?php echo $data->amt; ?>" readonly="readonly">
								  <input type="hidden" name="billing_name" class="form-control" id="billing-name" value="<?php echo $data->name; ?>" Placeholder="Name" required> 
								   <input type="hidden" name="billing_email"class="form-control" id="billing-email" value="<?php echo $data->email; ?>" Placeholder="Email" required>
								  <input type="hidden" name="billing_phone" class="form-control" id="billing-phone" value="<?php echo $data->phone; ?>" Placeholder="Phone" required>  
								 
								  <input type="hidden" name="course" class="form-control" id="course" value="<?php echo $data->course; ?>" Placeholder="Course">  
								   <input type="hidden" name="billing_country" class="form-control" id="billing_country" value="<?php echo $data->country; ?>" Placeholder="Country">
								   <input type="hidden" name="billing_state" class="form-control" id="billing_state" value="<?php echo $data->state; ?>" Placeholder="State"> 
								   
								   <input type="hidden" name="city" class="form-control" id="city" value="<?php echo $data->city; ?>" >
								   <input type="hidden" name="RAZOR_KEY_ID" class="form-control" id="RAZOR_KEY_ID" value="<?php echo RAZOR_KEY_ID; ?>" >
								 


																
								
								
		                      	<div class="trans-button">
							 
		                      		<a class="edit-button"  href="{{url('fees-deposit?status=correction&o='.$_GET['o'])}}" >Edit Now</a>
		                        	<a class="cancel-button" href="{{url('fees-deposit')}}">Cancel</a>
		                      		<button type="submit"  class="proceed-button" id="razor-pay-now" >Proceed</button>
		                      	</div>								
								</form>
		                      </div>
		                    </div>
		                     
		                    <div class="tab-pane fade" id="faceanissue" role="tabpanel" aria-labelledby="faceanissue">
								<div class="student-payment">
		                      		<h3>Face an issue</h3>
		                      		<form method="POST" onsubmit="return contactController.faceAnIssue(this)" action="" autocomplete="off">
		                       
		                      			<div class="form-inline">
										<input type="hidden" name="_token" value="{{ csrf_token() }}" />
										<div class="ans">
										    <input type="text" name="name" value="{{ old('name', (isset($data->name)) ? $data->name:"")}}" class="form-control" placeholder="Enter Full Name *">
											
										@if ($errors->has('name'))
											<span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
										 
										@endif
										</div>
										<div class="ans">
										    <input type="text" name="email" value="{{ old('email',(isset($data->email)) ? $data->email:"")}}"  class="form-control" placeholder="E-mail *">
										    @if ($errors->has('email'))
											<span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
										 
										@endif
										</div>
										</div>
		                      			<div class="form-inline">	
										   <div class="ans">
											 <input type="text" name="phone" value="{{ old('phone',(isset($data->phone)) ? $data->phone:"")}}"  class="form-control" maxlength="16" onkeypress="return isNumericKeyCheck(event);" placeholder="Contact No. *">
											 @if ($errors->has('phone'))
											<span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
										 
										@endif
										</div>
										<div class="ans">
										  <textarea type="text" name="remark" class="form-control" placeholder="Enter Face an issue remark *">{{ old('remark',(isset($data->remark)) ? $data->remark:"")}}</textarea>
											@if ($errors->has('remark'))
											<span class="help-block"><strong>{{ $errors->first('remark') }}</strong></span>
										 
										@endif
										</div>
		                      			</div>
		                      			 
		                      			 
		                      			 
		                      			 
									   
									    <button type="submit" class="face-issue-button" name="submit">Submit</button>
									</form>
		                      	</div>
							</div>
		                
		                </div>
					</div>
				</div>
			</div>
		</section>

		 
	</div>
 
 
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
 





@endsection