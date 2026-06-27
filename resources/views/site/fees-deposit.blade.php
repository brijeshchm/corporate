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
 
	 
	
	<?php 
	
	if(isset($_GET['status'],$_GET['o'])&& !empty($_GET['o'])){
	$o = base64_decode ( $_GET['o'], $strict=false );
	$data = json_decode($o);
	$status = $_GET['status'];
	}else{
		$data=array();
	}
	//echo "<pre>";print_r($data);
	?>
	<style>
	  a.disabled {
  pointer-events: none;
  cursor: default;
}  
	</style>
<div class="main">	
		<section class="fee-deposit">
			<div class="container">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<nav>
		                    <div class="nav payment-form" role="tablist">
			                    <a class="nav-item active" data-toggle="tab" href="#Student-Detail" role="tab" aria-controls="nav-home" aria-selected="true" >Details</a>
			                    <a class="nav-item disabled" data-toggle="tab" href="#transaction" role="tab" aria-controls="nav-profile" aria-selected="false" >Transaction</a>			                   
			                    <a class="nav-item disabled" data-toggle="tab" href="#confirmation" role="tab" aria-controls="nav-about" aria-selected="false" style="pointer-events: none">Confirmation</a>								
							<a class="nav-item"  data-toggle="tab" href="#faceanissue" role="tab" aria-controls="nav-home" aria-selected="true">Face an issue</a>
		                    </div>
		                </nav>
		                <div class="tab-content">
		                    <div class="tab-pane fade show active" id="Student-Detail" role="tabpanel" aria-labelledby="Student-Detail">
		                      	<div class="student-payment">
		                      		<h3>Please Enter Your Details Here</h3>
		                      		 
		                      	<form method="POST" action="{{url('/save-processing')}}" autocomplete="off">
		                      			<div class="form-inline">
										<input type="hidden" name="_token" value="{{ csrf_token() }}" />
										<div class="ans">
										    <input type="text" name="name" value="{{ old('name', (isset($data->name)) ? $data->name:"")}}" class="form-control" placeholder="Enter name *">
											 
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
										<input type="text" name="amount" value="{{ old('amount',(isset($data->amt)) ? $data->amt:"")}}"  class="form-control" maxlength="6" onkeypress="return isNumericKeyCheck(event);"placeholder="Amount">
										 @if ($errors->has('amount'))
											<span class="help-block"><strong>{{ $errors->first('amount') }}</strong></span>
										 
										@endif
										</div>
		                      			</div>
		                      			<div class="form-inline">		
										<div class="ans">
										    <input type="text" name="course" value="{{ old('course',(isset($data->course)) ? $data->course:"")}}"  class="form-control" placeholder="Course *">
											@if ($errors->has('course'))
											<span class="help-block"><strong>{{ $errors->first('course') }}</strong></span>
										 
										@endif
										</div>
										<div class="ans">
										 <select name="country" class="select_country">
										    	<option value="">Select Country * </option>											 
												<?php $countryes = App\Country::orderby('country_name')->get();								?>
										    	@if(!empty($countryes))
													@foreach($countryes as $country)
												
										    	<option value="{{$country->country_id}}" >{{$country->country_name}}</option>
												@endforeach
												@endif
												
										    </select>
											@if ($errors->has('country'))
											<span class="help-block"><strong>{{ $errors->first('country') }}</strong></span>
										 
											@endif
										</div>
		                      			</div>
		                      			<div class="form-inline">		
										   <div class="ans">
										   
											<select name="state" class="show_state select2_state">
										    	<option value="">Select State * </option>
										    </select>
												@if ($errors->has('state'))
												<span class="help-block"><strong>{{ $errors->first('state') }}</strong></span>

												@endif
											 </div>
											 <div class="ans">
											 <input type="text" name="city" value="{{ old('city',(isset($data->city)) ? $data->city:"")}}"  class="form-control" placeholder="Enter city">
											@if ($errors->has('city'))
										<span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
										@endif	
										</div>
										</div>
		                      			 
		                      			 
									    <div class="fee-deposit-checkbox">
									      <label><input type="checkbox" name="remember" value="1" checked>By clicking proceed, you agree to our terms & conditions and our privacy policy</label>
									    </div>
									    <button type="submit" class="student-payment-button" name="checkout" value="CheckOut">proceed</button>
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
 
 
@endsection