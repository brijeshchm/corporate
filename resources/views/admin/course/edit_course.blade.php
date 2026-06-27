@extends('admin.layouts.app')
@section('title')
Edit Course
@endsection
@section('content') 
<div class="right_col" role="main">
          <div class="">            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_title">
					<h1> Course Page <small>Course Title and Rating</small></h1>  
					<div class="succesmessage"></div><div class="errormessage"></div>
					@if(Session::has('success')) 	
					<div class="row">
					<div class="col-md-8 col-md-offset-3">
					<div class="alert alert-success">
					<strong>Success!</strong> {{Session::get('success')}}.
					</div>
					</div>
					</div>
					@endif
					@if(Session::has('failed')) 	
					<div class="row">
					<div class="col-md-8 col-md-offset-3">
					<div class="alert alert-danger">
					<strong>!</strong> {{Session::get('failed')}}.
					</div>
					</div>
					</div>
					@endif                  
					<div class="clearfix"></div>
					</div>
					<div class="x_content">                    
						<form  data-parsley-validate method="post" class="form-horizontal form-label-left" autocomplete="off" action="" onsubmit="return courseController.editSaveCourseTitle(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">
                        	<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Course Name<span class="required">*</span>
							</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" name="course_name"  class="form-control col-md-7 col-xs-12" value="{{ old('course_name',(isset($edit_data)) ? $edit_data->course_name:"")}}"  placeholder="Enter Course Name"> 
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Title <span class="required">*</span>
							</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" class="form-control col-md-7 col-xs-12" name="title" value="{{ old('title',(isset($edit_data)) ? $edit_data->title:"")}}" placeholder="Enter title">
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Sub Title <span class="required">*</span>
							</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" class="form-control col-md-7 col-xs-12" name="sub_title" value="{{ old('sub_title',(isset($edit_data)) ? $edit_data->sub_title:"")}}" placeholder="Enter Sub Title">
							</div>
							</div>

							<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Slug <span class="required">*</span>
							</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" class="form-control col-md-7 col-xs-12" name="slug"  value="{{ old('slug',(isset($edit_data)) ? $edit_data->slug:"")}}"  placeholder="Enter Course Slug">
							</div>
							</div>

						

							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Course Category<span class="required">*</span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">                          
							<select name="category" class="form-control col-md-7 col-xs-12 select_category" onchange="get_subcategory(this.value);">
							<option value="">Select Category</option>
							@if(!empty($cetegories))
							@foreach($cetegories as $category)	
							<option value="<?php  echo $category->id; ?>" @if ($category->id== old('category'))
							selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->category == $category->id ) ? "selected":"" }} @endif> <?php echo $category->category; ?></option>		
							@endforeach
							@endif						
							</select>
							</div>
							</div>  

							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Sub Category<span class="required">*</span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">      

							<select name="subcategory" class="form-control col-md-7 col-xs-12 select_subcategory show_subcategory_pdf" onchange="get_categoryPDF(this.value);">

							</select>
							</div>
							</div> 
							
							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Course PDF</label>
							<div class="col-md-8 col-sm-8 col-xs-12">   
							<select name="course_pdf_text" class="form-control col-md-7 col-xs-12  show_course_pdf">

							</select>
							</div>
							</div> 
							 
							
							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">YouTube Link</label>
							<div class="col-md-8 col-sm-8 col-xs-12"> Only embed Url  
							<input type="txt" name="video_link" id="video_link" value="{{ old('video_link',(isset($edit_data)) ? $edit_data->video_link:"")}}" class="form-control col-md-7 col-xs-12" placeholder="Enter Video link">

							 
							</div>
							</div> 

							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Rating(1-5)<span class="required">*</span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">                          
							<select name="rating" class="form-control col-md-7 col-xs-12">
							<option value="">Select Rating</option>
							<option value="4" @if (4== old('rating'))
							selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->rating == 4 ) ? "selected":"" }} @endif >4</option>
							<option value="4.5" @if (4.5== old('rating'))
							selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->rating == 4.5 ) ? "selected":"" }} @endif >4.5</option>
							<option value="4.75" @if (4.75== old('rating'))
							selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->rating == 4.75 ) ? "selected":"" }} @endif >4.75</option>
							<option value="4.8" @if (4.8== old('rating'))
							selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->rating == 4.8 ) ? "selected":"" }} @endif >4.8</option>
							<option value="4.9" @if (4.9== old('rating'))
							selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->rating == 4.9 ) ? "selected":"" }} @endif >4.9</option>
							<option value="5" @if (5== old('rating'))
							selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->rating == 5 ) ? "selected":"" }} @endif >5</option>						  
							</select>
							</div>
							</div> 

							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Total Ratings<span class="required">*</span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<input class="form-control col-md-7 col-xs-12" type="tel" name="total_rating" onkeypress="return isNumericKeyCheck(event);" value="{{ old('total_rating',(isset($edit_data)) ? $edit_data->total_rating:"")}}"  placeholder="Enter Total Rating">
							</div>
							</div>  

						<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Course Duration(Hrs) </label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<input class="form-control col-md-7 col-xs-12" type="tel" name="course_duration" value="{{ old('course_duration',(isset($edit_data)) ? $edit_data->course_duration:"")}}"  placeholder="Enter Course Duration">
							</div>
							</div> 
							
						 
							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Live project<span class="required">*</span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<input class="form-control col-md-7 col-xs-12" type="text" onkeypress="return isNumericKeyCheck(event);" name="live_project" value="{{ old('live_project',(isset($edit_data)) ? $edit_data->live_project:"")}}"  placeholder="Enter Live project">
							</div>
							</div> 

							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Professionals Trained</label>
							<div class="col-md-8 col-sm-8 col-xs-12"> 
							<input class="form-control col-md-7 col-xs-12" type="text" onkeypress="return isNumericKeyCheck(event);" name="professional_trained" value="{{ old('professional_trained',(isset($edit_data->professional_trained) && $edit_data->professional_trained!==0) ? $edit_data->professional_trained:$speciality->professionals_trained)}}"  placeholder="Enter Professional trained">
							</div>
							</div> 
							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Batches every month</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<input class="form-control col-md-7 col-xs-12" type="text" name="batches_every_month" onkeypress="return isNumericKeyCheck(event);" value="{{ old('batches_every_month',(isset($edit_data->batches_every_month) && $edit_data->batches_every_month!==0) ? $edit_data->batches_every_month:$speciality->batches)}}"  placeholder="Enter Batches every month">
							</div>
							</div> 

                            <div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Meta Title</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<textarea class="form-control col-md-7 col-xs-12" type="text" name="meta_title" placeholder="Enter Meta Keyword">{{ old('meta_title',(isset($edit_data)) ? $edit_data->meta_title:"")}}</textarea>
							</div>
							</div>

							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Meta Keyword</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<textarea class="form-control col-md-7 col-xs-12" type="text" name="meta_keyword" placeholder="Enter Meta Keyword">{{ old('meta_keyword',(isset($edit_data)) ? $edit_data->meta_keyword:"")}}</textarea>
							</div>
							</div>
							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Meta Description<span class="required">*</span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<textarea class="form-control col-md-7 col-xs-12" type="text" name="meta_description" placeholder="Enter Meta Description">{{ old('meta_description',(isset($edit_data)) ? $edit_data->meta_description:"")}}</textarea>
							</div>
							</div>

                            <div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Course Definition <span class="required">*</span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<textarea class="form-control col-md-7 col-xs-12" type="text" name="course_defination" placeholder="Enter course defination">{{ old('course_defination',(isset($edit_data)) ? $edit_data->course_defination:"")}}</textarea>
							</div>
							</div>
							
						 
						 
						 
							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Course Type</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<select class="form-control col-md-7 col-xs-12 course_type_edit" type="text" name="course_type">
							<option value="">Select Course Type </option>
							<option value="1" @if ('1'== old('course_type'))
							selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->course_type == 1 ) ? "selected":"" }} @endif >Course Page 1</option>
							<option value="2" @if (2== old('course_type'))
							selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->course_type == 2 ) ? "selected":"" }} @endif>Course Page 2</option>

							</select>
							</div>
							</div>
						<!--show_courseModule  -->
					 
							<div class="form-group course-module">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Courses Module</label>
							<div class="col-md-8 col-sm-8 col-xs-12"> 
							<select class="form-control col-md-7 col-xs-12 select_courses_module" name="courses_module[]" multiple>
							<option value=""></option>
							<?php 					

							if(!empty($edit_data->courses_module)){	

							$courses_module = unserialize($edit_data->courses_module);	
							
							echo "<pre>";print_r($courses_module);
							}else{
							$courses_module=array();
							}
							if(!empty($course_list) ){						 	
							foreach($course_list as $course){

							if(in_array($course->id, $courses_module)){
							?>
							<option value="<?php echo $course->id; ?>" selected><?php echo $course->title; ?></option>

							<?php } else{ ?>

							<option value="<?php echo $course->id; ?>" ><?php echo $course->title; ?></option>

							<?php	} }  } ?>
							</select>

							</div>
							</div>
						 
							
							<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<button type="submit" class="btn btn-success" onclick="check(this)">Submit</button>
							</div>
							</div>

						</form>
					  </div>
                </div>
              </div>
		
			  
				<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_title">  
					<h3>Course About <small></small></h3>
					<div class="successCourseOverview"></div><div class="errorCourseOverview"></div>					
					<div class="clearfix"></div>
					</div>
					<div class="x_content"> 
						<form class="form-horizontal form-label-left" action="" method="post" onsubmit="return courseController.editSaveCourseAbout(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)" enctype="multiform/data-from">


	                    <div class="form-group">   
						<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Heading <span class="required">*</span></label>					  
						<div class="col-md-8 col-sm-8 col-xs-12">
						<input type="text" class="form-control col-md-7 col-xs-12"  name="heading" placeholder="Enter coure heading"   value="{{ old('heading',(isset($aboutHeading->heading)) ? $aboutHeading->heading:"")}}" > 
						</div>
						</div>
						<div class="form-group">   
						<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Course About <span class="required">*</span></label>					  
						<div class="col-md-8 col-sm-8 col-xs-12">
						<textarea type="text" class="form-control col-md-7 col-xs-12"  name="courseabout" rows="7" placeholder="Enter coure about"  >{{ old('courseabout',(isset($aboutHeading->courseabout)) ? $aboutHeading->courseabout:"")}}</textarea>
						</div>
						</div> 
						
						
					
						
						<div class="form-group">   
						<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Paragraph 1 <span class="required">*</span></label>					  
						<div class="col-md-8 col-sm-8 col-xs-12">
						<input type="text" class="form-control col-md-7 col-xs-12"  name="paragraph1" placeholder="Enter Paragraph 1"   value="{{ old('paragraph1',(isset($aboutHeading->paragraph1)) ? $aboutHeading->paragraph1:"")}}" > 
						</div>
						</div> 
						
						
						
							
						<div class="form-group">   
						<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Paragraph 2 <span class="required">*</span></label>					  
						<div class="col-md-8 col-sm-8 col-xs-12">
						<input type="text" class="form-control col-md-7 col-xs-12"  name="paragraph2" placeholder="Enter Paragraph 2"   value="{{ old('paragraph2',(isset($aboutHeading->paragraph2)) ? $aboutHeading->paragraph2:"")}}" > 
						</div>
						</div> 
						
						
							
						<div class="form-group">   
						<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Paragraph 3 <span class="required">*</span></label>					  
						<div class="col-md-8 col-sm-8 col-xs-12">
						<input type="text" class="form-control col-md-7 col-xs-12"  name="paragraph3" placeholder="Enter Paragraph 3"   value="{{ old('paragraph3',(isset($aboutHeading->paragraph3)) ? $aboutHeading->paragraph3:"")}}" > 
						</div>
						</div> 
						
						
							
						<div class="form-group">   
						<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Paragraph 4 <span class="required">*</span></label>					  
						<div class="col-md-8 col-sm-8 col-xs-12">
						<input type="text" class="form-control col-md-7 col-xs-12"  name="paragraph4" placeholder="Enter Paragraph 4"   value="{{ old('paragraph4',(isset($aboutHeading->paragraph4)) ? $aboutHeading->paragraph4:"")}}" > 
						</div>
						</div> 
						
							
						<div class="form-group">   
						<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Paragraph 5 <span class="required">*</span></label>					  
						<div class="col-md-8 col-sm-8 col-xs-12">
						<input type="text" class="form-control col-md-7 col-xs-12"  name="paragraph5" placeholder="Enter Paragraph 5"   value="{{ old('paragraph5',(isset($aboutHeading->paragraph5)) ? $aboutHeading->paragraph5:"")}}" > 
						</div>
						</div> 
						
							
						<div class="form-group">   
						<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Paragraph 6 <span class="required">*</span></label>					  
						<div class="col-md-8 col-sm-8 col-xs-12">
						<input type="text" class="form-control col-md-7 col-xs-12"  name="paragraph6" placeholder="Enter Paragraph 6"   value="{{ old('paragraph6',(isset($aboutHeading->paragraph6)) ? $aboutHeading->paragraph6:"")}}" > 
						</div>
						</div>
						
						<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                          
						 
					 
					<button type="submit" class="btn btn-success" name="submit">Submit</button>
					 
						</div>
						</div>
						</form>
					</div>
                </div>
              </div> 
			  
			   	  
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_title">  
					<h3>Course About Image Name<small></small></h3>
					<div class="successCourseOverview"></div><div class="errorCourseOverview"></div>					
					<div class="clearfix"></div>
					</div>
					<div class="x_content"> 
						<form class="form-horizontal form-label-left" action="" method="post" onsubmit="return courseController.editSaveCourseAboutImage(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)" enctype="multiform/data-from">

						<div class="form-group">   
						<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Course About Image<span class="required">*</span></label>					  
						<div class="col-md-8 col-sm-8 col-xs-12">
						<input type="text" class="form-control col-md-7 col-xs-12"  name="course_image_name" placeholder="Enter coure Image name" value="<?php echo (isset($edit_data->course_image_name)? $edit_data->course_image_name:""); ?>" >
						</div>
						</div> 
						<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                          
						 <button type="submit" class="btn btn-success" name="submit">Submit</button>							 
						</div>
						</div>
						</form>
					</div>
                </div>
              </div> 
			  
			  
			  
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">  
				   <h3>Course Curriculum<small></small></h3>
					<div class="successCourseOverview"></div><div class="errorCourseOverview"></div>					
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">        
				  
                    <form class="form-horizontal form-label-left" action="" method="post" onsubmit="return courseController.editSaveCurriculum(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)" enctype="multiform/data-from">

                      <div class="form-group">   
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Course Curriculum <span class="required">*</span></label>					  
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="file" class="form-control col-md-7 col-xs-12"  name="course_curriculum" accept=".csv" placeholder="Enter coure Curriculum"  <?php if(count($coursecurriculum)>0 && !empty($coursecurriculum)){ ?> disabled  <?php } ?> >
                        </div>
                      </div> 
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">   
                           <?php if(count($coursecurriculum)>0 && !empty($coursecurriculum)){ ?>
							<?php }else{?>
							<button type="submit" class="btn btn-success" name="submit">Submit</button>
							<?php } ?>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div> 
			  
			  
				<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_title">  
					<div class="col-md-7">
					<h3>View Course Curriculum<small></small></h3>
					<div class="successCourseOverview"></div><div class="errorCourseOverview"></div>
					</div>
					<div class="clearfix"></div>
					</div>				   
					  <div class="x_content">        
					  <div class="control-label col-md-2 col-sm-3 col-xs-12"></div>	
					  <div class="col-md-8 col-sm-8 col-xs-12">
						<div class="card-box table-responsive">
					   
						
						<table id="datatable-course-curriculum" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						  <thead>
							<tr>  
	@if(Auth::user()->current_user_can('administrator') || Auth::user()->current_user_can('delete_course_curriculum'))							
								<th>Content <a href="javascript:courseController.courseContentDelete('<?php echo $edit_data->id; ?>')" title="delete course content" style="float: right;margin-right: 41px;" class="btn btn-danger">Delete</a></th>
								@endif
														
							</tr>
						  </thead>
							<tbody>
							<?php if($coursecurriculum){
								$i=0;
								foreach($coursecurriculum as $course){
								$i++;
								?>
							<tr>						 
							<td>							 
							<div class="lms-accordian">
							<button class="paccordion" style="font-weight: 700;font-size: 13px;">							 
							<?php echo str_replace('?','',$course->heading); ?></button>
							<div class="panel">
							<ul>						 
							 <?php 
							$contents = App\CourseCurriculumExcel::where('heading_id',$course->id)->get();
							 if($contents){						 
								 
								 foreach($contents as $content){ ?>
									<li style="font-size: 13px;"> <?php echo str_replace('?','',$content->coursescontent); ?></li>
									 <?php 
										$subcontents = App\CourseCurriculumExcel::where('content_id',$content->id)->get();
										if($subcontents){
											
											foreach($subcontents as $sub){ ?>
											<ul><li style="font-size: 12px;">  <?php echo str_replace('?','',$sub->subcontent); ?></li>
											
										 <?php 
										$lastcontents = App\CourseCurriculumExcel::where('subcontent_id',$sub->id)->get();
										if($lastcontents){										
											foreach($lastcontents as $last){
											?><ul><li style="font-size: 11px;"><?php echo str_replace('?','',$last->lastcontent); ?></li>
											
											<ul>
											<?php 
										$aboutLevel4 = App\CourseCurriculumExcel::where('endcontent_id',$last->id)->get();
										if($aboutLevel4){										
											foreach($aboutLevel4 as $level4){
											?>
										<li style="font-size: 11px;"><?php echo str_replace('?','',$level4->endcontent); ?></li>
											<?php }  } ?>
											</ul>
											</ul><?php } } ?></ul>	
									<?php 			
											}
										}
									?> 								 
									
							 <?php }
							 }
	 
							 ?>
							 </ul>
							</div>			
						
						</div>							 
							</td>	
							</tr>
							<?php } } ?>
							</tbody>
						</table>
						 
						
					  </div>
					  
					  </div>
					  </div>
					</div>
              </div>
			  
			  
			  
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>FAQ Course<small></small></h3>
                    <div class="successFAQs"></div><div class="errorFAQs"></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" onsubmit="return courseController.editSaveFAQ(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">
					 <?php if(!empty($edit_data->FAQs)){
					     if($edit_data->FAQs){
						 $FAQs =json_decode($edit_data->FAQs);    
						 if($FAQs->faqq){
					        $faqquestion  = unserialize($FAQs->faqq);
					        if($faqquestion){
					            
					            $faqquestion = $faqquestion;
					        }
					        $faqanswer  = unserialize($FAQs->faqa);
						 }else{
						     
						     $faqquestion ="";
						 }
					 }else{
					     
					     $faqquestion ="";
					 }
					 for($i=0; $i<count($faqquestion); $i++){						 
					 ?>
					 <div>
					<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">FAQ Question <?php echo $i+1; ?> <span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="faqq[]" value="<?php echo (isset($faqquestion[$i])? $faqquestion[$i]:""); ?>" placeholder="FAQ Question 1"> 
					 
							 
					</div>
					</div>
				 
					<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">FAQ Answer <?php echo $i+1; ?><span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" type="text" name="faqa[]" placeholder="Enter FAQ Answer 1" ><?php echo (isset($faqanswer[$i])? $faqanswer[$i]:""); ?></textarea>
					</div>
					</div>	
					<span class="btn btn-inverse btn-circle m-b-5" onclick="removefaq(this)" style="margin-right: 132px;color: red;float: right;margin-top: -25px;"><i class="glyphicon glyphicon-trash"></i></span>
					</div>	
										
					 <?php   }  }else{ ?> 
					 <div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">FAQ Question <span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="faqq[]" value="" placeholder="FAQ Question 1"> 
					@if ($errors->has('faqq[]'))
								<small class="error alert-danger">{{ $errors->first('faqq[]') }}</small>
								@endif
					</div>
					</div>
				 
					<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">FAQ Answer <span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" type="text" name="faqa[]" placeholder="Enter FAQ Answer 1"></textarea>
					</div>
					</div>	
					 <?php  } ?>
					<div class="addfqa">					
					</div>					
					<button class="add_more_stream" type="button" style="margin-top: 0px;float: right;margin-right: 5px;">Add More</button>                     
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
						  
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
			  

			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Testimonial<small></small></h3>
                    <div class="successFAQs"></div><div class="errorFAQs"></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" onsubmit="return courseController.editSaveTestimonial(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">
					 <?php if(!empty($edit_data->testimonial)){
						 $testimonials =json_decode($edit_data->testimonial);                    
					 $name  = unserialize($testimonials->name);
					 
					 $comment  = unserialize($testimonials->comment);
 					 if(!empty($testimonials->linkedinurl)){
					$linkedinurl  = unserialize($testimonials->linkedinurl);
					}else{
						$linkedinurl="";
					}
					 for($i=0; $i<count($name); $i++){						 
					 ?>
					 <div>
					<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Name <?php echo $i+1; ?> <span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="name[]" value="<?php echo (isset($name[$i])? $name[$i]:""); ?>" placeholder="Enter Name"> 
					 
							 
					</div>
					</div>
				 
					<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Comment <?php echo $i+1; ?><span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" type="text" name="comment[]" placeholder="Enter Comment" ><?php echo (isset($comment[$i])? $comment[$i]:""); ?></textarea>
					</div>
					</div>	
					<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Linkedin <?php echo $i+1; ?> <span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="linkedinurl[]" value="<?php echo (isset($linkedinurl[$i])? $linkedinurl[$i]:""); ?>" placeholder="Enter linkedin url"> 							 
					</div>
					</div>
					
					<span class="btn btn-inverse btn-circle m-b-5" onclick="removefaq(this)" style="margin-right: 132px;color: red;float: right;margin-top: -25px;"><i class="glyphicon glyphicon-trash"></i></span>
					</div>	
										
					 <?php   }  }else{ ?> 
					 <div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Name<span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="name[]" value="" placeholder="Enter Name"> 
					@if ($errors->has('name[]'))
								<small class="error alert-danger">{{ $errors->first('name[]') }}</small>
								@endif
					</div>
					</div>
				 
					<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Comment<span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" type="text" name="comment[]" placeholder="Enter Comment"></textarea>
					</div>
					</div>	
					
					<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Linkedin <span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="linkedinurl[]" placeholder="Enter linkedin url"> 							 
					</div>
					</div>
					 <?php  } ?>
					<div class="addtestimonial">					
					</div>					
					<button class="add_more_testimonial" type="button" style="margin-top: 0px;float: right;margin-right: 5px;">Add More</button> 
					<div class="form-group">
						<div class="control-label col col-md-2"><label for="text-input" class=" form-control-label">Testimonial Visibility*<span class="required">*</span></label></div>
						<div class="col-12 col-md-3">
						Yes
						<input type="radio" name="testimonial_visibility" value="1"  @if (1== old('testimonial_visibility'))
								selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->testimonial_visibility == 1 ) ? "checked":"" }} @endif>	
						</div>
						<div class="col-12 col-md-3">
						No
						<input type="radio" name="testimonial_visibility" value="0"  @if ('0'== old('testimonial_visibility'))
								selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->testimonial_visibility == '0' ) ? "checked":"" }} @endif>
						</div>
					</div> 	
					
					
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
						  
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
			  
			   
			  
			  

			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <div class="succescourseRelated"></div><div class="errorcourseRelated"></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form data-parsley-validate class="form-horizontal form-label-left" action="" method="post" onsubmit="return courseController.editSaveCourseRelated(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">
					
					
					<!--<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Show Related Courses (Sidebar)<span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<select class="form-control col-md-7 col-xs-12 select_related_courses_side" name="related_courses_side[]" multiple>
					<option value="">Select Course</option> 
						<?php 						 
						if(!empty($edit_data->related_courses_side)){	
 					
						$related_courses_side = unserialize($edit_data->related_courses_side);	
						}else{
							$related_courses_side=array();
						}
						 
						if(!empty($course_list)){						
						foreach($course_list as $course){
						if(in_array($course->id, $related_courses_side)){
						?>
						<option value="<?php echo $course->id; ?>" selected><?php echo $course->title; ?></option>

						<?php }else{ ?>

						<option value="<?php echo $course->id; ?>" ><?php echo $course->title; ?></option>

						<?php	} }  }  ?>		
 
					</select>

					</div>
					</div>
					-->
					
				
					
					 
					 
				         <div class="form-group">
						<div class="control-label col col-md-2"><label for="text-input" class=" form-control-label">Show on Home Page?<span class="required">*</span></label></div>
						<div class="col-12 col-md-3">
						Yes
						<input type="radio" name="show_front_page" value="1"  @if (1== old('show_front_page'))
								selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->show_front_page == 1 ) ? "checked":"" }} @endif>	
						</div>
						<div class="col-12 col-md-3">
						No
						<input type="radio" name="show_front_page" value="0"  @if ('0'== old('show_front_page'))
								selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->show_front_page == '0' ) ? "checked":"" }} @endif>
						</div>
						</div> 



				<div class="form-group">
						<div class="control-label col col-md-2"><label for="text-input" class=" form-control-label">Show on Home page Second in Trending?</label></div>
						<div class="col-12 col-md-2">
						Yes
						<input type="radio" name="show_front_second" value="1"  @if (1== old('show_front_second'))
								selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->show_front_second == 1 ) ? "checked":"" }} @endif>	
						</div>
					
						<div class="col-12 col-md-2">
						No 
						<input type="radio" name="show_front_second"  value="0"  @if ('0'== old('show_front_second'))
								checked="checked"	
							@else
							{{ (isset($edit_data) && $edit_data->show_front_second == '0' ) ? "checked":"" }} @endif>
						</div>
						</div>  


				<div class="form-group">
						<div class="control-label col col-md-2"><label for="text-input" class=" form-control-label">Show footer certificate</label></div>
						<div class="col-12 col-md-2">
						Yes
						<input type="radio" name="footer_certificate" value="1"  @if (1== old('footer_certificate'))
								selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->footer_certificate == 1 ) ? "checked":"" }} @endif>	
						</div>
					
						<div class="col-12 col-md-2">
						No 
						<input type="radio" name="footer_certificate"  value="0"  @if ('0'== old('footer_certificate'))
								checked="checked"	
							@else
							{{ (isset($edit_data) && $edit_data->footer_certificate == '0' ) ? "checked":"" }} @endif>
						</div>
						</div>
						
						
						
						<div class="form-group">
						<div class="control-label col col-md-2"><label for="text-input" class=" form-control-label">Show footer Top Course</label></div>
						<div class="col-12 col-md-2">
						Yes
						<input type="radio" name="footer_top_course" value="1"  @if (1== old('footer_top_course'))
								selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->footer_top_course == 1 ) ? "checked":"" }} @endif>	
						</div>
					
						<div class="col-12 col-md-2">
						No 
						<input type="radio" name="footer_top_course"  value="0"  @if ('0'== old('footer_top_course'))
								checked="checked"	
							@else
							{{ (isset($edit_data) && $edit_data->footer_top_course == '0' ) ? "checked":"" }} @endif>
						</div>
						</div>
						
							<div class="form-group">
						<div class="control-label col col-md-2"><label for="text-input" class=" form-control-label">Show Trending Courses</label></div>
						<div class="col-12 col-md-2">
						Yes
						<input type="radio" name="show_trending_courses" value="1"  @if (1== old('show_trending_courses'))
								selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->show_trending_courses == 1 ) ? "checked":"" }} @endif>	
						</div>
					
						<div class="col-12 col-md-2">
						No 
						<input type="radio" name="show_trending_courses"  value="0"  @if ('0'== old('show_trending_courses'))
								checked="checked"	
							@else
							{{ (isset($edit_data) && $edit_data->show_trending_courses == '0' ) ? "checked":"" }} @endif>
						</div>
						</div>
						
						
						
						
						
						
						<!--<div class="form-group">
						<div class="control-label col col-md-2"><label for="text-input" class=" form-control-label">Show on Top Menu?</label></div>
						<div class="col-12 col-md-3">
						Yes
						<input type="radio" name="show_top_menu" value="1"  @if (1== old('show_top_menu'))
								selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->show_top_menu == 1 ) ? "checked":"" }} @endif>	
						</div>
						<div class="col-12 col-md-3">
						No
						<input type="radio" name="show_top_menu" value="0"  @if ('0'== old('show_top_menu'))
								selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->show_top_menu == '0' ) ? "checked":"" }} @endif>
						</div>
						</div>   

						<div class="form-group">
						<div class="control-label col col-md-2"><label for="text-input" class=" form-control-label">Show on Footer?</label></div>
						<div class="col-12 col-md-2">
						Yes
						<input type="radio" name="show_on_footer" onchange="showfooter(this.value)" value="1"  @if (1== old('show_on_footer'))
								selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->show_on_footer == 1 ) ? "checked":"" }} @endif>	
						</div>
						<div class="show_footer_city">
						 
						<div class="col-12 col-md-2">
						<select name="city" class="form-control col-md-3 col-xs-12">
						<option value="">Select City</option>
						@if(!empty($citys))
							@foreach($citys as $city)
						<option value="{{$city->city}}" @if($city->city ==old('city'))
							selected="selected"
						@else 
						{{(isset($edit_data) && $edit_data->city==$city->city)?"selected":""}} @endif  >{{$city->city}}</option>
						@endforeach
						@endif
						</select>						 	
						</div>
						 
						
						</div>
						<div class="col-12 col-md-2">
						No 
						<input type="radio" name="show_on_footer" onchange="nofooter(this.value)" value="0"  @if ('0'== old('show_on_footer'))
								checked="checked"	
							@else
							{{ (isset($edit_data) && $edit_data->show_on_footer == '0' ) ? "checked":"" }} @endif>
						</div>
						</div>  
						 -->
                     	<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Related Courses</label>
					<div class="col-md-8 col-sm-8 col-xs-12">Please Select 4 Or  8
					<select class="form-control col-md-7 col-xs-12 select_related_courses show_course_releted" name="related_courses[]" multiple>
				<!--	<option value=""></option>
					<?php 					
 			
						if(!empty($edit_data->related_courses)){	

						$related_courses = unserialize($edit_data->related_courses);	
						}else{
						$related_courses=array();
						}
						if(!empty($course_list) ){						 	
						foreach($course_list as $course){

						if(in_array($course->id, $related_courses)){
						?>
						<option value="<?php echo $course->id; ?>" selected><?php echo $course->title; ?></option>

						<?php } else{ ?>

						<option value="<?php echo $course->id; ?>" ><?php echo $course->title; ?></option>

						<?php	} }  } ?>-->
					</select>
					 
					</div>
					</div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
						  
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
			  
			  
            </div>
            </div>
            </div>
			<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
$('.summernote').summernote({
height: 200
});
</script>

<script>   
	  
	  var maxAppend = 0;
$(".add_why_learn").click(function(){
    if (maxAppend >= 8) return;
    var addinput = $(
        '<div><div class="form-group"><label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Answer</label><div class="col-md-8 col-sm-8 col-xs-12"><textarea class="form-control col-md-7 col-xs-12" type="text" name="why_learn[]" placeholder="Why should you learn" multiple="true"></textarea> <span class="btn btn-inverse btn-circle m-b-5" onclick="remove(this)" style="margin-right: -38px;color: red;float: right;margin-top: -25px;"><i class="glyphicon glyphicon-trash"></i></span></div></div></div><br />');   
		maxAppend++;

    $(".result_why_learn").append(addinput);
});
	  
</script>

<script>
function remove(a){
$(a).parent("div").parent("div").remove();
}
</script>
     <script>	  
	  var maxAppend = 2;
$(".add_more_stream").click(function(){
    if (maxAppend >= 11) return;

    var addinput = $(
        '<div><div class="form-group"><label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">FAQ Question '+maxAppend+' <span class="required">*</span></label><div class="col-md-8 col-sm-8 col-xs-12"><input class="form-control col-md-7 col-xs-12" type="text" name="faqq[]" placeholder="FAQ Question '+maxAppend+'"></div></div><div class="form-group"><label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">FAQ Answer '+maxAppend+'<span class="required">*</span></label><div class="col-md-8 col-sm-8 col-xs-12"><textarea class="form-control col-md-7 col-xs-12" type="text" name="faqa[] placeholder="Enter FAQ Answer " multiple="true"></textarea></div></div><span class="btn btn-inverse btn-circle m-b-5" onclick="removefaq(this)" style="margin-right: 132px;color: red;float: right;margin-top: -25px;"><i class="glyphicon glyphicon-trash"></i></span></div><br />');
    maxAppend++;

    $(".addfqa").append(addinput);
});
	  
</script>

<script>
function removefaq(a){
$(a).parent("div").remove();
}

</script>
<script>	  
	  var maxtest = 2;
$(".add_more_testimonial").click(function(){
    if (maxtest >= 11) return;

    var testimonialinput = $(
        '<div><div class="form-group"><label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Name'+maxtest+' <span class="required">*</span></label><div class="col-md-8 col-sm-8 col-xs-12"><input class="form-control col-md-7 col-xs-12" type="text" name="name[]" placeholder="Enter Name '+maxtest+'"></div></div><div class="form-group"><label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Comment '+maxtest+'<span class="required">*</span></label><div class="col-md-8 col-sm-8 col-xs-12"><textarea class="form-control col-md-7 col-xs-12" type="text" name="comment[] placeholder="Enter Comment" multiple="true"></textarea></div></div><div class="form-group"><label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Linkedin '+maxtest+' <span class="required">*</span></label><div class="col-md-8 col-sm-8 col-xs-12"><input class="form-control col-md-7 col-xs-12" type="text" name="linkedinurl[]" value="" placeholder="Enter linkedin url"></div></div><span class="btn btn-inverse btn-circle m-b-5" onclick="removetestimonial(this)" style="margin-right: 132px;color: red;float: right;margin-top: -25px;"><i class="glyphicon glyphicon-trash"></i></span></div><br />');
    maxtest++;

    $(".addtestimonial").append(testimonialinput);
});
	  
</script>

<script>
function removetestimonial(a){
$(a).parent("div").remove();
}

</script>

<script>	
	window.onload = function()
	{
		var category_id 	='<?php echo $edit_data->category; ?>';
		var subcategory_id 	= '<?php echo $edit_data->subcategory; ?>';	 
		var course_pdf_text 	= '<?php echo $edit_data->course_pdf_text; ?>';	 
		var course_type 	= '<?php echo $edit_data->course_type; ?>';	 
		var course_module 	= '<?php echo $edit_data->courses_module; ?>';	 
		var course_releted 	= '<?php echo $edit_data->related_courses?>';	 
		get_subcategory(category_id,subcategory_id);	 
		get_categoryPDF(subcategory_id,course_pdf_text);			
		get_courseModuleedit(course_type,category_id,course_module);	 
		get_courseReleted(category_id,course_releted);		 
	 
	}	 
</script>
 

<script>

function get_courseModuleedit(ctid,cid,cm=""){	 
	 //alert(cm);
	if("2" == ctid ){
	var token = $('input[name=_token]').val();
	$.ajax({
	type: "get",	 
	url: "{{URl('admin/course/get_course_modul_edit')}}",
	data: {cid:cid,cm:cm},
	headers: {'X-CSRF-TOKEN': token},		
	cache: false,
	success: function(data)
	{ 		 
		$(".show_courseModule").html(data);
	}
	});
	}
}

function get_courseReleted(cid,cr=""){	 
	 
	 
	var token = $('input[name=_token]').val();
	$.ajax({
	type: "get",	 
	url: "{{URl('admin/course/get_course_releted_edit')}}",
	data: {cid:cid,cr:cr},
	headers: {'X-CSRF-TOKEN': token},		
	cache: false,
	success: function(data)
	{ 		 
		$(".show_course_releted").html(data);
	}
	});
	 
}
function get_subcategory(cid,sid){	 
	var token = $('input[name=_token]').val();
	$.ajax({
	type: "post",	 
	url: "{{URl('admin/subcategory_pdf/get_subcategory_pdf')}}",
	data: {cid:cid,sid:sid},
	headers: {'X-CSRF-TOKEN': token},		
	cache: false,
	success: function(data)
	{ 		 
		$(".show_subcategory_pdf").html(data);
	}
	});
var cc_id =<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>;
	$.ajax({
	type: "post",	 
	url: "{{URl('admin/getcategory/get_video_link')}}",
	data: {cid:cid,cc_id:cc_id},
	headers: {'X-CSRF-TOKEN': token},		
	cache: false,
	success: function(data)
	{ 		  
		$("#video_link").val(data);
	}
	});


}

function get_categoryPDF(sid,pid){	 
	var token = $('input[name=_token]').val();
	$.ajax({
	type: "post",	 
	url: "{{URl('admin/get_category_course_pdf/get_course_pdf')}}",
	data: {sid:sid,pid:pid},
	headers: {'X-CSRF-TOKEN': token},		
	cache: false,
	success: function(data)
	{ 		 
		$(".show_course_pdf").html(data);
	}
	});



}

</script>
  
		<script>
		var acc = document.getElementsByClassName("paccordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var panel = this.nextElementSibling;
		if (panel.style.maxHeight) {
		panel.style.maxHeight = null;
		} else {
		panel.style.maxHeight = panel.scrollHeight + "px";
		} 
		});
		}
		</script>
		<?php
if((isset($edit_data) && $edit_data->show_on_footer =='1' )){ ?>
<script>
	$('.show_footer_city').show();	
	</script>
	<?php 
}else{ ?>
<script>
	$('.show_footer_city').hide();
	</script>
	<?php 
}


		?>
<script>

function showfooter(gst){			
			 
		$('.show_footer_city').show();
				
		}
		
		function nofooter(gstno){	
 		
			$('.show_footer_city').hide();		
		}
</script>

<script>
function matchYoutubeUrl(url) {
    var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
    var matches = url.match(p);
    if(matches){
        return matches[1];
    }
    return false;
}
  function check(sender){
    var url = $('#youtube').val();
    var id = matchYoutubeUrl(url);
    if(id!=false){
        //alert('True YouTube URL');
    }else{
        alert('Incorrect YouTube URL');
    }
}
</script>
		<style>
		 .lms-accordian .paccordion {
		background-color: transparent;
		color: #444;
		cursor: pointer;
		padding: 8px;
		width: 100%;
		border: none;
		margin: 0;
		text-align: left;
		outline: none;
		font-size: 15px;
		transition: 0.4s;
		}

		.lms-accordian .paccordion:hover {
		background-color: #ccc;
		}

		.lms-accordian .paccordion:after {
		content: '\002B';
		color: #777;
		font-weight: bold;
		float: left;
		margin-right: 5px;
		}

		.paccordion.active:after {
		content: "\2212";
		}

		.panel {
		padding: 0 18px;
		background-color: white;
		max-height: 0;
		overflow: hidden;
		transition: max-height 0.2s ease-out;
		} 
		</style>
@endsection
