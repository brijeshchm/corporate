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
<div class="main">	
<style>
 
  


 .select2-container--default .select2-selection--single{	
	background-color: #ddd;
    border: none !important;
    border-radius: none !important;
	border-top-right-radius: 0px !important;
    border-bottom-right-radius: 0px !important;
    box-shadow: 0px 0px 6px 2px #dadada8f;
    background: transparent;
	color: #a0a0a0;
	height: 52px !important;
	line-height: 52px;
}
 .select2-container--default .select2-selection--single .select2-selection__rendered{
	    line-height: 46px !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 52px !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 52px !important;
}



</style>
	 <div class="top-banner">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs">
            <div class="top-banner-title">
                <h1><span>Review </span></h1> 
			</div>
            <div class="bread_crums">
                <p id="breadcrumbs"><span><span><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span><a href="{{url('review')}}">Review</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <strong class="breadcrumb_last" aria-current="page">Review</strong></span></span></span></p>            </div>
        </div>
    </div>
</div>






<section id="curriculumid"><div class="sticky-section"><section class="curriculum"><div class="cnt-top-hdg"></div><div class="container">
<div class="row"><div class="col-md-8"> 

 
 
<style>  .project{ 
  
    padding: 20px;
     
    
    margin-bottom: 20px;
}</style>



<div class="project">

	<div class="ans-place-header">
								<h3>Reviews</h3>
							 
								 
							</div>
<div class="row">
<div class="review-section">
<div class="rev">
<div id="post_data"></div>
</div>
</div>
</div>



</div>
 
 


</div>
<div class="col-md-4"><div class="fix-frm-enq img-inline scroll-on" id="fix-frm-id"><div class="form-contact"><div class="form-column">
<div class="new-review">
<div class="new-review-heading">
<strong>For New Review Here</strong>
</div>
<form action="" method="post" onsubmit="return contactController.saveReview(this)" enctype= "multipart/form-data">
<input type="text" name="name" placeholder="Enter Name*">
<input type="text" name="phone" maxlength="16"  onkeypress="return isNumericKeyCheck(event);" placeholder="Enter phone*">
<select name="gender" ><option value="">Select Gender*</option><option value="Male">Male</option><option value="Female">Female</option></select>
<input type="file" name="review_image" >		
<div class="text-error">
<select type="text" name="technology" class="select-technology">
<option value="">Select technology*</option>
@if(!empty($courses_list))
@foreach($courses_list as $course)
<option value="{{$course->id}}" @if ($course->id == 30)
selected="selected" @endif> {{$course->course_name}}</option>
@endforeach
@endif					
</select>
</div>
<select name="rating" >
<option value="">Select Rating*</option> 
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="4.5">4.5</option>
<option value="5">5</option>
</select>
<textarea name="message" placeholder="Message Here*"></textarea>
<input type="reset" class="resetData">		
<button type="submit">Review Post</button>
</form>
</div>




</div></div></div></div></div></div></section>
</div></section>

		 	  
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
					"url":"/searchreviews/"+$this.val(),
					"type":"post",
					"success":function(data){	
 					
						if(data.length>0){
							$('.rev').html(data);
								 
						}
						 
					}
				});
			 
	 
		});
     
   $('.selecttechnology').select2({ placeholder: "Search Technology",});
    $('.select-technology').select2({ placeholder: "Search Technology",});
	 
 
</script>


<script>
$(document).ready(function(){
 
 var _token = $('input[name="_token"]').val();

 load_data('', _token);

 function load_data(id="", _token)
 {
  $.ajax({
   url:"reviews/reviewLoadData",
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