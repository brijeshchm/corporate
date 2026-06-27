@extends('admin.layouts.app')
@section('title')
Edit Course
@endsection
@section('content') 
<style>
.disabled {
    pointer-events: none;
    cursor: not-allowed;
	 background: #dddddd;
}
</style>
<div class="right_col" role="main">
          <div class="">            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_title">
					<h1> Course SEO Page <small>Course Title and Rating</small></h1>  
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
						<form  data-parsley-validate method="post" class="form-horizontal form-label-left" autocomplete="off" action="" onsubmit="return SEOController.editSaveCourseTitle(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">

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
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Course Name<span class="required">*</span>
							</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" name="course_name"  class="form-control col-md-7 col-xs-12" value="{{ old('course_name',(isset($edit_data)) ? $edit_data->course_name:"")}}"  placeholder="Enter Course Name"> 
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
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Course PDF<span class="required">*</span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">   
							<select name="course_pdf_text" class="form-control col-md-7 col-xs-12  show_course_pdf">

							</select>
							</div>
							</div> 
							 
							
							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">YouTube Link<span class="required">*</span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">   
							<input type="txt" name="video_link" id="youtube" value="{{ old('video_link',(isset($edit_data)) ? $edit_data->video_link:"")}}" class="form-control col-md-7 col-xs-12 disabled" placeholder="Enter Video link">

							 
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
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Course Duration	<span class="required">*</span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<input class="form-control col-md-7 col-xs-12 disabled" type="tel" name="course_duration" value="{{ old('course_duration',(isset($edit_data)) ? $edit_data->course_duration:"")}}"  placeholder="Enter Course Duration">
							</div>
							</div> 
					 
							
							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Live project<span class="required">*</span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<input class="form-control col-md-7 col-xs-12 disabled" type="text" onkeypress="return isNumericKeyCheck(event);" name="live_project" value="{{ old('live_project',(isset($edit_data)) ? $edit_data->live_project:"")}}"  placeholder="Enter Live project">
							</div>
							</div> 

							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Professionals Trained</label>
							<div class="col-md-8 col-sm-8 col-xs-12"> 
							<input class="form-control col-md-7 col-xs-12 disabled" type="text" onkeypress="return isNumericKeyCheck(event);" name="professional_trained" value="{{ old('professional_trained',(isset($edit_data->professional_trained) && $edit_data->professional_trained!==0) ? $edit_data->professional_trained:$speciality->professionals_trained)}}"  placeholder="Enter Professional trained">
							</div>
							</div> 
							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Batches every month</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<input class="form-control col-md-7 col-xs-12 disabled" type="text" name="batches_every_month" onkeypress="return isNumericKeyCheck(event);" value="{{ old('batches_every_month',(isset($edit_data->batches_every_month) && $edit_data->batches_every_month!==0) ? $edit_data->batches_every_month:$speciality->batches)}}"  placeholder="Enter Batches every month">
							</div>
							</div> 



							<div class="form-group">
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Meta Keyword<span class="required">*</span></label>
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
							<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">City <span class="required">*</span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							<select name="city" class="form-control col-md-7 col-xs-12 disabled">
						<option value="">Select City</option>
						
						<option value="{{$edit_data->city}}" selected >{{$edit_data->city}}</option>
					 
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
					<h3>Course About Image Name<small></small></h3>
					<div class="successCourseOverview"></div><div class="errorCourseOverview"></div>					
					<div class="clearfix"></div>
					</div>
					<div class="x_content"> 
						<form class="form-horizontal form-label-left" action="" method="post" onsubmit="return SEOController.editSaveCourseAboutImage(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)" enctype="multiform/data-from">

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
						<div class="col-md-7">
						<h3>View About Course<small></small></h3>
						<div class="successCourseOverview"></div><div class="errorCourseOverview"></div>
						</div>				  	

						<div class="clearfix"></div>
						</div>

					  <div class="x_content">  
					  <div class="control-label col-md-2 col-sm-3 col-xs-12"></div>	
					  <div class="col-md-8 col-sm-8 col-xs-12">
						<div class="card-box table-responsive">
					   
						
						<table id="datatable-course-curriculum" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						   
						 
							
						<tbody>
							<?php 
							
					 
							
							
							if($aboutHeading){
								$i=0;
								foreach($aboutHeading as $course){
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
							$aboutLevel1 = App\CourseAboutExcel::where('heading_id',$course->id)->get();
							 if($aboutLevel1){						 
								 
								 foreach($aboutLevel1 as $level1){ ?>
									<li style="font-size: 13px;"> <?php echo str_replace('?','',$level1->coursescontent); ?></li>
									 <?php 
										$aboutLevel2 = App\CourseAboutExcel::where('content_id',$level1->id)->get();
										if($aboutLevel2){
											
											foreach($aboutLevel2 as $level2){ ?>
											<ul><li style="font-size: 12px;">  <?php echo str_replace('?','',$level2->subcontent); ?></li>
											
										 <?php 
										$aboutLevel3 = App\CourseAboutExcel::where('subcontent_id',$level2->id)->get();
										if($aboutLevel3){										
											foreach($aboutLevel3 as $level3){
											?><ul><li style="font-size: 11px;"><?php echo str_replace('?','',$level3->lastcontent); ?></li>
											<ul>
											<?php 
										$aboutLevel4 = App\CourseAboutExcel::where('endcontent_id',$level3->id)->get();
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
					<h3>Why should you learn<small></small></h3>
					<div class="successCourseOverview"></div><div class="errorCourseOverview"></div>					
					<div class="clearfix"></div>
					</div>
					<div class="x_content">        
				  
                    <form class="form-horizontal form-label-left" action="" method="post" onsubmit="return SEOController.editSaveCourseAbout(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">                
					  


					  <div class="form-group">   
						<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Why should you learn?<span class="required">*</span></label>					  
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12"  name="why_learn_heading" value="{{ old('why_learn_heading',(isset($edit_data)) ? $edit_data->why_learn_heading:"")}}" placeholder="Why should you learn Heading"></textarea>
                        </div>
                      </div> 
					  
					  
					<?php 
					  if(!empty($edit_data->why_learn)){
					  $why_learn = unserialize($edit_data->why_learn); 
 					  					 
										 ?>	
					@foreach($why_learn as $key=>$value)
				 
						<div class="form-group">
                        <label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Answer </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" type="text" name="why_learn[]" placeholder="Why should you learn" multiple="true">{{$value}}</textarea>
						  <span class="btn btn-inverse btn-circle m-b-5" onclick="remove(this)" style="margin-right: -38px;color: red;float: right;margin-top: -25px;"><i class="glyphicon glyphicon-trash"></i></span>
                        </div>
                      </div>
					  @endforeach
					 <?php }else{ ?>
					 <div class="form-group">
                        <label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Answer</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" type="text" name="why_learn[]" placeholder="Why should you learn" multiple="true"></textarea>
                        </div>
                      </div>
					 <?php } ?>
						<div class="result_why_learn">

						</div>
						<button class="add_why_learn" type="button" style="margin-top: 1px;float: right;margin-right: 95px;">Add More</button>
                      
					  
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
				  
                    <form class="form-horizontal form-label-left" action="" method="post" onsubmit="return SEOController.editSaveCurriculum(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)" enctype="multiform/data-from">

                      <div class="form-group">   
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Course Curriculum <span class="required">*</span></label>					  
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="file" class="form-control col-md-7 col-xs-12 disabled"  name="course_curriculum" accept=".csv" <?php if(count($coursecurriculum)>0 && !empty($coursecurriculum)){ ?> disabled  <?php } ?> placeholder="Enter coure Curriculum">
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
                            
                            <?php if($edit_data->course_curriculum){ ?>		
                            
                            <?php }else{ ?>
                            <th>Content <a href="javascript:SEOController.courseContentDelete('<?php echo $edit_data->id; ?>')" title="delete course content" style="float: right;margin-right: 41px;" class="btn btn-danger">Delete</a></th>
                            <?php } ?>
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
                    
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" onsubmit="return SEOController.editSaveFAQ(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">
					 <?php if(!empty($edit_data->FAQs)){
						 $FAQs =json_decode($edit_data->FAQs);                    
					 $faqquestion  = unserialize($FAQs->faqq);
					 
					 $faqanswer  = unserialize($FAQs->faqa);
 					 
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
                    
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" onsubmit="return SEOController.editSaveTestimonial(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">
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
					<input class="form-control col-md-7 col-xs-12" type="text" name="linkedinurl[]" value="" placeholder="Enter linkedin url"> 							 
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
			  
			  <?php if(!empty($edit_data->certification_visibility)) { ?>
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Certification Show Section<small></small></h3>
                    <div class="successFAQs"></div><div class="errorFAQs"></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                       <?php $certificate =App\Courses::select('exam_title','exam_text','format','certification_type','delivery_method','certification_time','certification_cost','language','certification_visibility')->where('id',$edit_data->course_clone_id)->first();	
 
					?>
                    
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" onsubmit="return SEOController.editSaveCourseCertificate(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">
					  
					<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Certification heading <span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="exam_title" value="<?php if($edit_data->exam_title){ echo $edit_data->exam_title; }else{ echo (isset($certificate)? $certificate->exam_title:""); } ?>" placeholder="Global Certification heading"> 
					</div>
					</div>
				 
					<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Certification text<span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" type="text" name="exam_text" placeholder="Enter Certification text"><?php if($edit_data->exam_text){ echo $edit_data->exam_text; }else{ echo (isset($certificate)? $certificate->exam_text:""); } ?></textarea>
					</div>
					</div>		 
					 
					 <div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Format <span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="format" value="<?php if($edit_data->format){ echo $edit_data->format; }else{ echo (isset($certificate)? $certificate->format:""); } ?>" placeholder="Enter format"> 
					</div>
					</div>
				 
					<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Type<span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="certification_type" value="<?php if($edit_data->certification_type){ echo $edit_data->certification_type; }else{ echo (isset($certificate)? $certificate->certification_type:""); }  ?>" placeholder="Enter Type">
					</div>
					</div>
					 
					 <div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Delivery Method<span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="delivery_method" value="<?php if($edit_data->delivery_method){ echo $edit_data->delivery_method; }else{ echo (isset($certificate)? $certificate->delivery_method:""); }  ?>" placeholder="Enter Delivery Method">
					</div>
					</div>
					 
					 <div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Time<span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="certification_time" value="<?php if($edit_data->certification_time){ echo $edit_data->certification_time; }else{ echo (isset($certificate)? $certificate->certification_time:""); }  ?>" placeholder="Enter Time">
					</div>
					</div>
					 
					 <div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Cost<span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="certification_cost" value="<?php if($edit_data->certification_cost){ echo $edit_data->certification_cost; }else{ echo (isset($certificate)? $certificate->certification_cost:""); } ?>" placeholder="Enter Cost">
					</div>
					</div>
					 
					  
					 <div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Language<span class="required">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" type="text" name="language" value="<?php if($edit_data->language){ echo $edit_data->language; }else{ echo (isset($certificate)? $certificate->language:""); } ?>" placeholder="Enter Language">
					</div>
					</div>
					 
					<div class="form-group">
						<div class="control-label col col-md-2"><label for="text-input" class=" form-control-label">Certification Visibility*<span class="required">*</span></label></div>
						<div class="col-12 col-md-3">
						Yes
						<input type="radio" name="certification_visibility" value="1"  @if ($edit_data->certification_visibility == '1')
								checked="checked"	
							@else
							{{ (isset($certificate) && $certificate->certification_visibility == 1  ) ? "checked":"" }} @endif>	
						</div>
						<div class="col-12 col-md-3">
						No
						<input type="radio" name="certification_visibility" value="0"  @if ($edit_data->certification_visibility == '0')
								checked="checked"	
							@else
							{{ (isset($certificate) && $certificate->certification_visibility == '0' ) ? "checked":"" }} @endif>
						</div>
					</div> 		
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                      
						 
                          <!--<button type="submit" class="btn btn-success">Submit</button>-->
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
			  
			  
			  <?php } ?>

			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <div class="succescourseRelated"></div><div class="errorcourseRelated"></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form data-parsley-validate class="form-horizontal form-label-left" action="" method="post" onsubmit="return SEOController.editSaveCourseRelated(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">
					
					
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
					
				
					
					 
					 
				        <!-- <div class="form-group">
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
						</div> -->

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
						</div>  --> 

						<div class="form-group">
						<div class="control-label col col-md-2"><label for="text-input" class=" form-control-label">Show on Footer?</label></div>
						<div class="col-12 col-md-2">
						Yes
						<input type="radio" name="show_on_footer"  value="1"  @if (1== old('show_on_footer'))
								selected="selected"	
							@else
							{{ (isset($edit_data) && $edit_data->show_on_footer == 1 ) ? "checked":"" }} @endif>	
						</div>
						 
						<div class="col-12 col-md-2">
						No 
						<input type="radio" name="show_on_footer"  value="0"  @if ('0'== old('show_on_footer'))
								checked="checked"	
							@else
							{{ (isset($edit_data) && $edit_data->show_on_footer == '0' ) ? "checked":"" }} @endif>
						</div>
						</div>  
						 
                     	<div class="form-group">
					<label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Related Courses</label>
					<div class="col-md-8 col-sm-8 col-xs-12">Please Select 4 Or  8
					<select class="form-control col-md-7 col-xs-12 select_related_courses show_course_releted" name="related_courses[]" multiple>
					<option value=""></option>
				<!--	<?php 					
 			
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
		var course_releted 	= '<?php echo $edit_data->related_courses?>';	 
		get_subcategory(category_id,subcategory_id);	 
		get_categoryPDF(subcategory_id,course_pdf_text);	
		get_seoCourseReleted(category_id,course_releted);	 
	 
	}	 
</script>
 

<script>
function get_seoCourseReleted(cid,cr=""){
	 
	
	var token = $('input[name=_token]').val();
	$.ajax({
	type: "get",	 
	url: "{{URl('admin/course/get_seo_course_releted_edit')}}",
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
	url: "{{URl('admin/subcategory/get_subcategory')}}",
	data: {cid:cid,sid:sid},
	headers: {'X-CSRF-TOKEN': token},		
	cache: false,
	success: function(data)
	{ 		 
		$(".show_subcategory_pdf").html(data);
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
	
<script>

function showfooter(gst){			
			 
		$('.show_footer_city').show();
				
		}
		
		function nofooter(gstno){	
 		
			$('.show_footer_city').hide();		
		}
</script>

<script>
// function matchYoutubeUrl(url) {
//     var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
//     var matches = url.match(p);
//     if(matches){
//         return matches[1];
//     }
//     return false;
// }
//   function check(sender){
//     var url = $('#youtube').val();
//     var id = matchYoutubeUrl(url);
//     if(id!=false){
//         //alert('True YouTube URL');
//     }else{
//         alert('Incorrect YouTube URL');
//     }
// }
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
