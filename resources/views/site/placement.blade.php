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
                <h1><span>Placement </span></h1> 
			</div>
            <div class="bread_crums">
                <p id="breadcrumbs"><span><span><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span><a href="{{url('/Placement')}}">Placement</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <strong class="breadcrumb_last" aria-current="page">Placement</strong></span></span></span></p>            </div>
        </div>
    </div>
</div>






<section id="curriculumid"><div class="sticky-section"><section class="curriculum placement"><div class="cnt-top-hdg"></div><div class="container">
<div class="row">
    
    <div class="col-md-12"> 

 
 
<style>  .project{ 
   
    padding: 20px;
    margin-bottom: 20px;
}</style>



    <div class="project">
    
    <div class="ans-place-header">
    <h3>Placement Celebrations</h3>
    <p>Discover a range of enriching events at our institute, featuring informative mock interviews, dynamic placement drives, interactive brush-up classes, and detailed placement guidance sessions. Immerse yourself in a wealth of experiences that reflect our dedication to student success and professional development. Witness the transformative progress of our learners through these impactful initiatives  </p>
    
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
 



</div></div></section>
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