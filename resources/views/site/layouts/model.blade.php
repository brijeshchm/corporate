
<div id="successMessageId" class="modal fade" role="dialog" data-backdrop="static">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
<div class="imgclass"></div>
<div class="successhtml"></div>
<div class="failedhtml"></div>
</div>
</div>
</div>
</div>

 

 <!--downloard currculum--->
 
<div class="dwn-frm-div"><div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static">
<div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="modlMain"></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="model-image">
<img src="{{asset('public/image/svg/dwn-frm-div.svg')}}" alt="dwn-frm-div" class="img-fluid"></div><div class="modal-body text-center"><div class="dwn-frm-div-content"><h6>Download AWS Certification Training Course Curriculum</h6><p>We’re the experts in web design and development for the start up next door and the fortune 500.</p>
<div class="submit-download-from"><a href="" type="submit" class="button-green" name="submit">Download Here</a><i class="fa fa-arrow-right"></i></div></div></div></div>
</div></div></div>

<!-- Modal scholarship -->

<div class="modal fade nit" id="sclrsp" tabindex="-1" role="dialog" aria-labelledby="sclrsp" aria-hidden="true" data-backdrop="static"><div class="modal-dialog" role="document">
<div class="modal-content"><div class="farn-modal-left"><img src="" alt="scholarship"><div class="scholarship-from"><span class="scholarship-heading">SCHOLARSHIP</span><span class="scholarship-body">WITH webCAMPUS</span> 
</div></div><div class="farn-modal-right"><div class="modal-header"><h5 class="modal-title">Scholarship</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
</button></div><div class="modal-body"><div class="nit-form"><form method="post" action="" onsubmit="return contactController.saveScholarship(this)" autocomplete="off">
<div class="form-inline">
<input type="text" name="name" placeholder="Enter Name*">
</div><div class="form-inline"><input type="text" name="email" placeholder="Enter E-Mail*"></div>
<div class="form-inline">
<input type="tel" name="phone" maxlength="16" onkeypress="return isNumericKeyCheck(event);" placeholder="Enter Phone no*">

</div>

<div class="form-inline"><input type="text"  name="demo_date" placeholder="Select Scholarship Date*"></div>
<div class="form-inline"><select name="degree"><option selected disabled>Select Degree*</option><option value="B.Tech">B.Tech</option><option value="BCA">BCA</option>
<option value="M.Tech">M.Tech</option><option value="MCA">MCA</option><option value="B.Sc(IT)">B.Sc(IT)</option>
<option value="M.Sc(IT)">M.Sc(IT)</option><option value="MBA">MBA</option><option value="BBA">BBA</option></select></div>
<div class="form-inline"><input type="text" name="college" placeholder="Enter College Name*"></div><div class="form-inline"><input type="text" name="technology" placeholder="Enter Scholarship Technology*"><input type="reset" class="resetData"></div><div class="form-inline nit-check">
<input type="checkbox"  name="checkbox" value="1"><label>I Agreed with T & C.</label></div><input type="submit" value="Submit" class="btnShowFrm"></form></div></div></div></div></div></div>


<div class="modal fade offers-class" id="offerspopup" tabindex="-1" data-backdrop="static">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-body"><div class="mdlImg"><div class="mid-month"><span>Mid Month</span> <strong>Madness Offer</strong></div><img src="" alt="special offer">
<div class="off30">10% OFF</div></div>
<div class="mdl-field-frm"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button><div class="frm-hdg"><img src="{{asset('public/image/Offer_Box.png')}}" alt="offer"><h4>AVAIL OFFERS</h4></div>

<form method="post" action="" onsubmit="return contactController.saveOffer(this)" autocomplete="off"><input type="hidden" name="from" class="from" value="AVAIL OFFERS"><input type="hidden" name="frm_title" value="AVAIL OFFERS" >						
<input type="text" name="name" placeholder="Enter Name"><input type="text" name="email" placeholder="Enter E-mail">	 

<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="" >
<div class="append_countryCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div> 
<input type="text" name="course" placeholder="Enter Course">
<input type="reset" class="resetData"><button type="submit" name="submit">SUBMIT</button>
</form>
<div class="offer-mobile" style="cursor: pointer;"><div id="offerEnding"></div></div>
 </div>
 </div>
 </div>
 </div>
 </div> 
 
<div id="playVdoId" class="modal fade" role="dialog" data-backdrop="static"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-body" style="padding: 0rem;margin-bottom: -7px;"><button type="button" class="playCloseCls" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button><iframe width="100%" height="409" class="video1" src="<?php if(!empty($coursesdetails->video_link)){ echo $coursesdetails->video_link; } ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div></div></div> 

<div class="popup-class-div modal fade" id="dwnPopupFrmId" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static">
<div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body"><div class="mdlImg"><img src="{{asset('/public/image/enroll_image.png')}}" alt="enroll"></div>
<div class="mdl-field-frm"><div class="successmessage"></div><div class="errormessage"></div><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
</button><div class="frm-hdg"><img src="{{asset('public/image/download.png')}}" alt="download"><h4 id="modal-heading"></h4></div>
<form action="" method="post" onsubmit="return contactController.dataSaveForm(this)" autocomplete="off">
 
<input type="text" name="name" value="" placeholder="Enter Name*">
<input type="text" name="email" value="" placeholder="Enter E-mail*">
<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="" >
<div class="append_countryCode"></div>
</div>
<div class="pne-div w-100">  
<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="" >
<div class="append_countryCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div> 
</div>
</div>
</div> 


<input type="text" name="course" value="" placeholder="Enter Course"><input type="reset" class="resetData"><button type="submit" class="modal-placement-button" name="submit">UNLOCK REPORT</button>   
</form></div></div> </div></div></div>

<div class="modal fade " id="frmModalPopup" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static">
<div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body"><div class="guide-modal-left"><p>What <strong>Benefit</strong> You will get from this <strong>Program</strong></p>
<ul><li>Simulation Test Papers</li><li>Industry Case Studies</li><li><strong>61,640+</strong> Satisfied Learners</li><li><strong>210+</strong> Training Courses</li><li><strong>100%</strong> Certification Passing Rate</li>
<li>Live Instructor Online Training</li><li><strong>100%</strong> Placement Assistance</li></ul></div><div class="guide-modal-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -56px;">
<span aria-hidden="true">&times;</span></button><div class="successmessage"></div><div class="errormessage"></div><h4>I'm interested in the program</h4> 

<form action="" method="post" onsubmit="return contactController.dataSaveForm(this)" autocomplete="off">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?>">
 					
<input type="text" name="name" value="" placeholder="Enter Name*">	        	
<input type="text" name="email" value="" placeholder="Enter E-mail*">		         
<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="" >
<div class="append_countryCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div> 


<input type="reset" class="resetData">	<p>By clicking submit button, you agree to our terms & conditions and our privacy policy.</p>
<button type="submit" class="modal-placement-button" name="submit" >Submit</button>
</form></div> </div> </div></div></div>



<div class="modal fade" id="discountcall" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static">
<div class="modal-dialog" role="document"><div class="modal-content" style="background: transparent;border:none;"><div class="modal-body"><div class="india-row">
<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;right: 117px;top: 20px;"><span aria-hidden="true" style="font-weight: 600;">&times;</span>
</button><div class="india-row-image"><div class="india-contact"><p>Contact Us</p><strong> +91 9999999999</strong></div><div class="india-image"><a href="tel:+919999999999" ><img src="{{asset('public/image/Call.png')}}" alt="call"></a>
<a href="https://api.whatsapp.com/send?phone=+919999999999"><img src="{{asset('public/image/Whatsapp-n.png')}}" alt="whatsapp"></a></div></div><div class="india-row-image"><div class="row-contact">
<strong > +91 9999999999</strong></div><div class="row-image"><img src="{{asset('public/image/c.png')}}" alt="phone"></div></div></div></div></div> </div>	</div>

<div class="modal right fade" id="popupFrmEnr" tabindex="-1" role="dialog" aria-labelledby="myModalMainId" data-backdrop="static">
<div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="myModalMainId">Join us for a Free Demo</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div><div class="modal-body"><div class="dropquery-right"><p>Share some of your details and we will be in touch with you for demo details, and know about Batches Available with us!</p>
<form action=""  method="post" onsubmit="return contactController.dataSaveForm(this)" autocomplete="off"><input type="text" name="name" placeholder="Enter Name*">
<input type="text" name="email" placeholder="Enter E-mail*">

<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="" >
<div class="append_countryCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div> 							 
<textarea name="message" placeholder="Message"></textarea>
<input type="reset" class="resetData">
<input type="submit" value="Submit"></form>

<div class="dropquery-right-img">
<img src="" alt="lady"></div>
</div></div></div></div></div>
	
<div class="modal fade" id="menuCoursePopupId" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
<div class="modal-dialog" role="document"><div class="modal-content">

<!--
<div class="modal-header">

<button type="button" class="menuclose" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true" class="angle-back"><i class="fa fa-angle-left" aria-hidden="true"></i></span></button>

<form class="form-inline search-courses" autocomplete="off">
<input class="form-control search-input plocation" type="text" placeholder="Search Your Course or Technology Here" aria-label="Search" onkeyup="courseKeySearch(this.value)" onclick="search()" autofocus>
<input type="hidden" class="form-control location" name="batch" value="" onchange="get_courses(this.value)">
<input type="reset" class="resetData"><i class="fa fa-search" aria-hidden="true"></i></form>


<div class="result-body" ></div>-->
<!--
<button type="button" class="menuclose" data-dismiss="modal" aria-label="Close" id="mobile-icon-disable">
<span aria-hidden="true">&times;</span></button>

</div>-->

<div class="modal-body"><div class="container-fluid"><div class="row"><div class="col-md-12">
<button type="button" class="menuclose" data-dismiss="modal" aria-label="Close" id="mobile-icon-disable">
<span aria-hidden="true">&times;</span></button>

<div class="menuPopupCrsCls" id="menuPopupCrsCls">
<div class="menuCrsTabPopup"><div class="mobile-categories-header"><div class="tab"> 
<!--
<button class="coursetablinks showCoursewtihCtg" onclick="menuCourseFunction(event, 'allCrsEvent')" id="defaultOpenprogram">All Programs</button>-->
<!--<button class="coursetablinks dspMasterCrsFun" onclick="menuCourseFunction(event, 'masterprogram')">Master Programs</button>-->
</div>

<div class="browse-category">
<!--
<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" onclick="showCategory()">Browse Categories</a>-->


<div class="dropdown-menu" ></div></div></div><div class="crsAllpage"><div id="allCrsEvent" class="coursetabcontent"><div class="all-list-course">
<div class="crsMdlVr-tab">	<div class="tab"><span>Categories</span>
<?php  $allCrsEventside =DB::table('web_courses as course'); 
$allCrsEventside  =$allCrsEventside->join('web_category as category','course.category','=','category.id','left');
$allCrsEventside =$allCrsEventside->select('course.*','category.category as categoryname','category.id as categoryid','category.category_icons');
$allCrsEventside =$allCrsEventside->whereNotNull('category.category');
$allCrsEventside =$allCrsEventside->groupby('course.category');	
$allCrsEventside =$allCrsEventside->where('course.status','1');
$allCrsEventside =$allCrsEventside->where('course.course_type','1');
$allCrsEventside =$allCrsEventside->orderby('category.category','ASC');
$allCrsEventside =$allCrsEventside->get();
?>
@if(!empty($allCrsEventside)) <?php $i=0;?> @foreach($allCrsEventside as $cateside) <?php $i++; ?><button class="cortablinks <?php if($i==2){  echo "active";} ?>" onclick="showCoursewtihCtg(this,<?php echo $cateside->categoryid; ?>)" >{{$cateside->categoryname}}</button> @endforeach @endif 	</div>
<div id="modalcourse1" class="cortabcontent"><div class="show-ctg-crs-cls"></div></div></div>

</div></div><div id="masterprogram" class="coursetabcontent">
<div class="deviceCrsVerTab"><div class="tab"><span>Categories</span>
<?php  
$allCrsEventside =DB::table('web_coursemaster as course'); 
$allCrsEventside  =$allCrsEventside->join('web_category as category','course.category','=','category.id','left');
$allCrsEventside =$allCrsEventside->select('course.*','category.category as categoryname','category.id as categoryid','category.category_icons');
$allCrsEventside =$allCrsEventside->whereNotNull('category.category');
$allCrsEventside =$allCrsEventside->where('course.status','1');
$allCrsEventside =$allCrsEventside->groupby('course.category');			 
$allCrsEventside =$allCrsEventside->orderby('category.category','ASC');
$allCrsEventside =$allCrsEventside->get();
?>
@if(!empty($allCrsEventside)) <?php $i=0;?> @foreach($allCrsEventside as $cateside) <?php $i++; ?><button class="mptablinks <?php if($i==1){  echo "active";} ?>" onclick="dspMasterCrsFun(this,<?php echo $cateside->categoryid; ?>)" >{{$cateside->categoryname}}</button> @endforeach @endif </div>
<div id="mpcourse1" class="mptabcontent"><div class="show-category-master"></div></div></div></div></div></div></div>
<div class="mobile-menuPopupCrsCls" id="mobile-menuPopupCrsCls"><div class="MobileCourseMenu"><a  onclick="allCrsEventsdiv()" id="ButtonallCrsEvents" class="mystyle">All Programs</a><a onclick="masterprogramdiv()" id="ButtonMasterProgram">Master Programs</a></div>
<div id="alldesc"><ul class="nav navbar-nav mobile-resp">        
<?php $allCrsEventside =DB::table('web_courses as course'); 
$allCrsEventside  =$allCrsEventside->join('web_category as category','course.category','=','category.id','left');
$allCrsEventside =$allCrsEventside->select('course.*','category.category as categoryname','category.id as categoryid','category.category_icons');
$allCrsEventside =$allCrsEventside->whereNotNull('category.category');
$allCrsEventside =$allCrsEventside->where('course.status','1');
$allCrsEventside =$allCrsEventside->where('course.course_type','1');
$allCrsEventside =$allCrsEventside->groupby('course.category');			 
$allCrsEventside =$allCrsEventside->orderby('category.category','ASC');
$allCrsEventside =$allCrsEventside->get();
?>
@if(!empty($allCrsEventside)) <?php $i=0;?> @foreach($allCrsEventside as $cateside) <?php $i++; ?>
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$cateside->categoryname}}<span class="caret"></span></a>
<ul class="dropdown-menu"><div class="popular-programs">
<?php 	$categoryCoursep = \App\Courses::select('id','title','course_name','slug','course_duration','live_project','status')->where('category',$cateside->categoryid)->where('status','1')->where('course_type','1')->get();
if(!empty($categoryCoursep)){ ?>
<?php	foreach($categoryCoursep as $coursep){	?><a href="{{url('courses/'.$coursep->slug)}}">{{$coursep->course_name}}</a><?php } } ?>
<?php 	$categoryCoursem = \App\CoursesMaster::select('id','title','course_name','slug','course_duration','live_project')->where('status','1')->where('category',$cateside->categoryid)->get();	if(count($categoryCoursem)>0){ ?>
<strong>MASTER PROGRAMME</strong> <?php	foreach($categoryCoursem as $coursem){	?>
<a href="{{url('master-program/'.$coursem->slug)}}" class="mobile-program"><div class="master-define-crsription-heading"><img src="{{asset('public/image/master-program-modal.jpg')}}" alt="master"><strong>{{$coursem->course_name}}</strong></div>
<div class="master-define-crsription-list"><ul><li>{{$coursem->live_project}} Courses |  {{$coursem->course_duration}} Months</li><li>Certification Aligned with Google</li><li>31 Tools &amp; Riogolim Curricullum</li><li>Guarrented Placement Accesstance</li></ul></div></a><?php  } } ?>	
</div> </ul></li>@endforeach @endif	</ul></div><div id="masterdes"><ul class="nav navbar-nav mobile-resp">    
<?php  
$allCrsEventside =DB::table('web_coursemaster as course'); 
$allCrsEventside  =$allCrsEventside->join('web_category as category','course.category','=','category.id','left');
$allCrsEventside =$allCrsEventside->select('course.*','category.category as categoryname','category.id as categoryid','category.category_icons');
$allCrsEventside =$allCrsEventside->whereNotNull('category.category');
$allCrsEventside =$allCrsEventside->where('course.status','1');
$allCrsEventside =$allCrsEventside->groupby('course.category');		
$allCrsEventside =$allCrsEventside->orderby('category.category','ASC');
$allCrsEventside =$allCrsEventside->get();
?>
@if(!empty($allCrsEventside)) <?php $i=0;?> @foreach($allCrsEventside as $cateside) <?php $i++; ?>
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$cateside->categoryname}}<span class="caret"></span></a>
<ul class="dropdown-menu"><div class="master-define-crsription">
<?php 	$categoryCoursem = \App\CoursesMaster::select('id','title','course_name','slug','course_duration','live_project','status')->where('category',$cateside->categoryid)->where('status','1')->get();
if(!empty($categoryCoursem)){ ?><strong>MASTER PROGRAMME</strong><?php	foreach($categoryCoursem as $coursem){	?><a href="{{url('master-program/'.$coursem->slug)}}" class="mobile-program"><div class="master-define-crsription-heading">
<img src="{{asset('public/image/master-program-modal.jpg')}}" alt="master"><strong>{{$coursem->course_name}}</strong></div><div class="master-define-crsription-list"><ul><li>{{$coursem->live_project}} Courses |  {{$coursem->course_duration}} Months</li><li>Certification Aligned with Google</li><li>31 Tools &amp; Riogolim Curricullum</li><li>Guarrented Placement Accesstance</li></ul></div></a><?php  } } ?>							
</div></ul></li> @endforeach @endif  </ul></div></div></div></div></div></div></div></div></div>




<div class="popup-class-div modal fade" id="without_course_popup" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static" data-modal-parent="#menuCoursePopupId" data-backdrop-limit="1" >

<div class="modal-dialog" role="document">

<div class="modal-content">

<div class="modal-header" style="background: #f7fbff;"> 

<div class="frm-hdg"><img src="/public/image/youAre.png" alt="Download" width="21" height="21" >&nbsp; Get Your <b style="font-size: 20px;margin-bottom: -5px;color: #f9753e;">Free Demo</b> of Course? 
</div><button type="button" class="close" data-dismiss="modal" aria-label="Close">

<span aria-hidden="true">&times;
</span></button>
</div>

<div class="modal-body">

<div class="mdlImg"><img src="{{asset('/public/image/enroll_image.png')}}" alt="enroll" width="290" height="254" >
</div>

<div class="mdl-field-frm">

<div class="successmessage">
</div>

<div class="errormessage">
</div>

<form action="" method="post" onsubmit="return contactController.saveCoursePopup(this)" autocomplete="off">
 
<input type="hidden" name="from" value="<?php if(!empty(Request::segment(1))){ echo ucwords(Request::segment(1)); }else{ echo "Home Page"; }?>">
 
<input type="text" name="name" value="" placeholder="Enter Name *">
<input type="text" name="email" value="" placeholder="Enter E-mail *">

<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="" >
<div class="append_countryCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div>  


 

<div class="courseclass">
<select name="course" class="choosecourse" style="position:relative;">
</select>
</div>
 
<input type="reset" class="resetData">
<button type="submit" class="modal-placement-button" name="submit">Submit</button> 
</form> 
 

</div>
</div> 
</div>
</div>
</div>
