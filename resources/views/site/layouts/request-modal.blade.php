<!--Training Feedback Modal -->
	<div class="all-from-request-zone modal fade" id="training-feedback-modal" data-backdrop="static" tabindex="-1">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="all-from-request-zone-heading text-center">
			<h5 class="headertitle">Send us your Feedback!</h5> 
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			 
			<div class="all-from-request-zone-content feedbackmodelsection">
			<form action="" method="post" onsubmit="return contactController.saveRequestZone(this)" autocomplete="off">
			<div class="form-row">
			<div class="all-from-request-zone-group col-md-6">
			<label>Student Name</label>
			<input type="text" class="form-control" name="name" placeholder="Enter Student Name">
			<input type="hidden" name="frm_title" class="frm_title" >
			<input type="hidden" name="rz_form" class="rz_form">
			</div>
			<div class="all-from-request-zone-group col-md-6">
			<label>Student ID(As on fees Invoice)</label>
			<input type="text" class="form-control" name="studentId" placeholder="Enter Student ID">
			@if ($errors->has('studentId'))
			<small class="error alert-danger">{{ $errors->first('studentId') }}</small>
			@endif
			</div>
			</div>
			<div class="form-row">
			<div class="all-from-request-zone-group col-md-6">
			<label>Mobile</label>
			<div class="valide-text1">
			<div class="drop-number">

		 
			<select name="code" class="choosecode">
			 
			</select>
			<input type="tel" name="phone"  class="form-control" maxlength="16"  onkeypress="return isNumericKeyCheck(event);" placeholder="Enter your mobile " >	
			</div>
			</div>

			</div>
			<div class="all-from-request-zone-group col-md-6">
			<label>Student E-mail</label>
			<input type="text" class="form-control" name="email" placeholder="Enter Your Student Email Id">
			</div>
			</div>
			<div class="form-row">
			<div class="all-from-request-zone-group col-md-6">
			<label>Course</label>
			<input type="text" class="form-control" name="course" placeholder="Enter Your Course">
			</div>
			<div class="all-from-request-zone-group col-md-6">
			<label>Trainer Name</label>
			<input type="text" class="form-control" name="trainer" placeholder="Enter Your Trainer Name">
			</div>
			</div>
			<div class="form-row">
			<div class="all-from-request-zone-group provide-text">
			<label>Please provide your feedback on the following topics:</label>
			</div>
			</div>
			<!-- first-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>Quality of the content consistent throughout the course?</label>
			</div>
			<div class="myform-check-inline col-md-6">

			<input class="form-check-input" type="radio" name="duringcourse" value="1">
			<label class="form-check-label" for="training-check1">1</label>
			<input class="form-check-input" type="radio" name="duringcourse1"  value="2">
			<label class="form-check-label" for="training-check2">2</label>
			<input class="form-check-input" type="radio" name="duringcourse2"  value="3">
			<label class="form-check-label" for="training-check3">3</label>
			<input class="form-check-input" type="radio" name="duringcourse3"  value="4">
			<label class="form-check-label" for="training-check4">4</label>
			<input class="form-check-input" type="radio" name="duringcourse4" value="5">
			<label class="form-check-label" for="training-check5">5</label>
			</div>
			</div>
			<!-- first-radio-button End-->
			<!-- Second-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>How would you rate your trainer’s expertise?</label>
			</div>
			<div class="myform-check-inline col-md-6">

			<input class="form-check-input" type="radio" name="communication" value="1">
			<label class="form-check-label" >1</label>
			<input class="form-check-input" type="radio" name="communication1" value="2">
			<label class="form-check-label">2</label>
			<input class="form-check-input" type="radio" name="communication2" value="3">
			<label class="form-check-label">3</label>
			<input class="form-check-input" type="radio" name="communication3" value="4">
			<label class="form-check-label">4</label>
			<input class="form-check-input" type="radio" name="communication4" value="5">
			<label class="form-check-label">5</label>
			</div>
			</div>
			<!-- second-radio-button End-->
			<!-- third-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>How would you rate your trainer’s delivery skills?</label>
			</div>
			<div class="myform-check-inline col-md-6">

			<input class="form-check-input" type="radio" name="training" value="1">
			<label class="form-check-label">1</label>
			<input class="form-check-input" type="radio" name="training1" value="2">
			<label class="form-check-label">2</label>
			<input class="form-check-input" type="radio" name="training2" value="3">
			<label class="form-check-label">3</label>
			<input class="form-check-input" type="radio" name="training3" value="4">
			<label class="form-check-label">4</label>
			<input class="form-check-input" type="radio" name="training4" value="5">
			<label class="form-check-label">5</label>
			</div>
			</div>
			<!-- third-radio-button End-->
			<!-- four-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>Knowledge or skills have improved by taking the course?</label>
			</div>
			<div class="myform-check-inline col-md-6">

			<input class="form-check-input" type="radio" name="takingcourse" value="1">
			<label class="form-check-label">1</label>
			<input class="form-check-input" type="radio" name="takingcourse" value="2">
			<label class="form-check-label">2</label>
			<input class="form-check-input" type="radio" name="takingcourse" value="3">
			<label class="form-check-label">3</label>
			<input class="form-check-input" type="radio" name="takingcourse" value="4">
			<label class="form-check-label">4</label>
			<input class="form-check-input" type="radio" name="takingcourse" value="5">
			<label class="form-check-label">5</label>
			</div>
			</div>
			<!-- four-radio-button End-->
				<!-- five-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>Rate your counsellor’s guidance during the course?</label>
			</div>
			<div class="myform-check-inline col-md-6">

			<input class="form-check-input" type="radio" name="guidancecourse" value="1">
			<label class="form-check-label">1</label>
			<input class="form-check-input" type="radio" name="guidancecourse" value="2">
			<label class="form-check-label">2</label>
			<input class="form-check-input" type="radio" name="guidancecourse" value="3">
			<label class="form-check-label">3</label>
			<input class="form-check-input" type="radio" name="guidancecourse" value="4">
			<label class="form-check-label">4</label>
			<input class="form-check-input" type="radio" name="guidancecourse" value="5">
			<label class="form-check-label">5</label>
			</div>
			</div>
			<!-- five-radio-button End-->
				<!-- six-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>HR/Placement team helpful during/after the course?</label>
			</div>
			<div class="myform-check-inline col-md-6">

			<input class="form-check-input" type="radio" name="duringaftercourse" value="1">
			<label class="form-check-label">1</label>
			<input class="form-check-input" type="radio" name="duringaftercourse" value="2">
			<label class="form-check-label">2</label>
			<input class="form-check-input" type="radio" name="duringaftercourse" value="3">
			<label class="form-check-label">3</label>
			<input class="form-check-input" type="radio" name="duringaftercourse" value="4">
			<label class="form-check-label">4</label>
			<input class="form-check-input" type="radio" name="duringaftercourse" value="5">
			<label class="form-check-label">5</label>
			</div>
			</div>
			<!-- six-radio-button End-->
			<!-- seven-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>How would you rate your overall learning experience?</label>
			</div>
			<div class="myform-check-inline col-md-6">

			<input class="form-check-input" type="radio" name="overalllearningcourse" value="1">
			<label class="form-check-label">1</label>
			<input class="form-check-input" type="radio" name="overalllearningcourse" value="2">
			<label class="form-check-label">2</label>
			<input class="form-check-input" type="radio" name="overalllearningcourse" value="3">
			<label class="form-check-label">3</label>
			<input class="form-check-input" type="radio" name="overalllearningcourse" value="4">
			<label class="form-check-label">4</label>
			<input class="form-check-input" type="radio" name="overalllearningcourse" value="5">
			<label class="form-check-label">5</label>
			</div>
			</div>
			<!-- seven-radio-button End-->
			<div class="all-from-request-zone-textarea">
			<label>If you have any other feedback please help us to improve our services</label>
			<textarea type="text" class="form-control all-from-request-textarea" name="feedback" placeholder="Tell us your feedback here"></textarea>
			</div>
			<input type="reset" class="resetData">		
			<button class="all-from-request-button" type="submit">Submit</button>
			</form>
			</div>

			</div>
		</div>
	</div>
<!--Training Feedback Model End -->
	<div class="all-from-request-zone modal fade" id="corporate-training-modal" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="all-from-request-zone-heading text-center">
				<h5 class="headertitle">Request for Corporate Training!</h5>				 
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>			 
			<div class="all-from-request-zone-content">
				 <form action="" method="post" onsubmit="return contactController.saveRequestZone(this)" autocomplete="off">
					<div class="form-row">
						<div class="all-from-request-zone-group col-md-6">
							<label>Name</label>
							<input type="hidden" name="frm_title" class="frm_title" >
							<input type="hidden" name="rz_form" class="rz_form">
							<input type="text" name="name" class="form-control" placeholder="Enter Your Name">
						</div>
						<div class="all-from-request-zone-group col-md-6">
							<label>Email Id</label>
							<input type="text" name="email" class="form-control" placeholder="Enter Your Email Id">
						</div>
					</div>
					<div class="form-row">
						<div class="all-from-request-zone-group col-md-6">
							<label>Mobile</label>
						<div class="valide-text">
						<div class="drop-number">

					 
						<select name="code" class="choosecode">
						 
						</select>
						<input type="tel" name="phone"  class="form-control" maxlength="16"  onkeypress="return isNumericKeyCheck(event);" placeholder="Enter Your Mobile no." >	
						</div>
						</div>
							<!--<select class="country-code">
								<option>+91-IND</option>
							</select>-->
							 
							
						 
						</div>
						<div class="all-from-request-zone-group col-md-6">
							<label>Company</label>
							<input type="text" class="form-control"  name="campany_name" placeholder="Enter Your Company Name">
						</div>
					</div>
					<div class="form-row">
						
						<div class="all-from-request-zone-group col">
							<label>Technology</label>
							<input type="text" class="form-control" name="technology" placeholder="Enter Your Technology">
						</div>
					</div>
					
					<div class="all-from-request-zone-textarea remark-request-zone">
						<label>Remark</label>
						<textarea type="text" class="form-control all-from-request-textarea" name="remark" placeholder="Enter your remark"></textarea>
					</div>
					<input type="reset" class="resetData">	
					<button class="all-from-request-button" type="submit">Submit</button>
				</form>
			</div>
			
		</div>
	</div>
	</div>
								


<!-- Student Referal Modal -->
	<div class="all-from-request-zone modal fade" id="student-referal-modal" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="all-from-request-zone-heading text-center">
					<h5 class="headertitle">Apply For Student Referral !</h5>					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>				 
				<div class="all-from-request-zone-content studentreferralsection">
				    <h3><span class="earnfees">Refer & Earn: </span>Refer your friend and earn up to 10% of the course Fee</h3>
					<form action="" method="post" onsubmit="return contactController.saveRequestZone(this)" autocomplete="off">
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Name</label>
								<input type="hidden" name="frm_title" class="frm_title" >
								<input type="hidden" name="rz_form" class="rz_form">
								<input type="text" class="form-control" name="name" placeholder="Enter Your Name">
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label>Email</label>
								<input type="text" class="form-control" name="email" placeholder="Enter Your Email Id">
							</div>
						</div>
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Mobile</label>
								<div class="valide-text">
								<div class="drop-number">

								 
								<select name="code" class="choosecode">
								 
								</select>
								<input type="tel" name="phone"  class="form-control" maxlength="16"  onkeypress="return isNumericKeyCheck(event);" placeholder="Enter Your Mobile no. " >	
								</div>
								</div>
								
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label for="inputtrainername">Student Name</label>
								<input type="text" class="form-control" name="candidate_name" placeholder="Enter Student Name">
							</div>
						</div>
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Course</label>
								<input type="text" class="form-control" name="course" placeholder="Enter Your Course">
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label>Student Mobile</label>
	<div class="valide-text">
								<div class="drop-number">

								 
								<select name="code" class="choosecode">
								 
								</select>
								<input type="tel" name="candidate_phone"  class="form-control" maxlength="16"  onkeypress="return isNumericKeyCheck(event);" placeholder="Enter Student Mobile " >	
								</div>
								</div>							</div>
						</div>
					
						<div class="all-from-request-zone-textarea remark-request-zone">
							<label>Comment</label>
							<textarea type="text" class="form-control all-from-request-textarea" name="remark" placeholder="Enter Your Comment"></textarea>
						</div>
						<input type="reset" class="resetData">	
						<button class="all-from-request-button" type="submit">Submit</button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Student Referal Model End -->

									
									<!-- Fee Clarification Modal -->
	<div class="all-from-request-zone modal fade" id="fee-clarification-modal" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="all-from-request-zone-heading text-center">
					<h5 class="headertitle">Fee Clarification Form !</h5>					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>				
				<div class="all-from-request-zone-content">
					<form action="" method="post" onsubmit="return contactController.saveRequestZone(this)" autocomplete="off">
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Name</label>
								<input type="text" class="form-control" name="name" placeholder="Enter Your Name*">
								<input type="hidden" name="frm_title" class="frm_title" >
								<input type="hidden" name="rz_form" class="rz_form">
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label>Email Id</label>
								<input type="text" class="form-control" name="email" placeholder="Enter Your Email Id">
							</div>
						</div>
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Mobile</label>
								<div class="valide-text">
								<div class="drop-number">

								 
								<select name="code" class="choosecode">
								 
								</select>
								<input type="tel" name="phone"  class="form-control" maxlength="16"  onkeypress="return isNumericKeyCheck(event);" placeholder="Enter Your Mobile no. " >	
								</div>
								</div>
								
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label>Course</label>
								<input type="text" class="form-control" name="course" placeholder="Enter Your course">
							</div>
						</div>
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-12">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="choose_file" accept=".pdf,.doc,docx">
									<label class="custom-file-label" for="customFile">Choose file</label>
								</div>
							</div>
						</div>
						<div class="all-from-request-zone-textarea remark-request-zone">
							<label>Query</label>
							<textarea type="text" class="form-control all-from-request-textarea" name="query" placeholder="Enter Your Query"></textarea>
						</div>
						<input type="reset" class="resetData">	
						<button class="all-from-request-button" type="submit">Submit</button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Fee Clarification Model end -->
	<!-- Request Overseas Training Modal start -->

	<div class="all-from-request-zone modal fade" id="new-batch-enquiry-modal" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="all-from-request-zone-heading text-center">
					<h5 class="headertitle">New Batch Enquiry!</h5>
					 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				 
				<div class="all-from-request-zone-content">
					<form action="" method="post" onsubmit="return contactController.saveRequestZone(this)" autocomplete="off">
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Name</label>
								<input type="text" class="form-control" name="name" placeholder="Enter Your Name">
								<input type="hidden" name="frm_title" class="frm_title" >
								<input type="hidden" name="rz_form" class="rz_form">
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label>Email Id</label>
								<input type="text" class="form-control" name="email" placeholder="Enter Your Email Id">
							</div>
						</div>
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Mobile</label>
								<div class="valide-text">
								<div class="drop-number">
								 
								<select name="code" class="choosecode">
								 
								</select>
								<input type="tel" name="phone" class="form-control"  maxlength="16"  onkeypress="return isNumericKeyCheck(event);" placeholder="Enter Your Mobile no. " >	
								</div>
								</div>
								
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label>Course</label>
								<input type="text" class="form-control" name="course" placeholder="Enter Your Course">
							</div>
						</div>
						<div class="form-row">
							<div class="all-from-request-zone-group-new col">
								<label>Batch</label>
 <select class="form-control" name="batch">
      <option value="">Select Your Batch</option>
      <option>Weekday</option>
      <option>Weekend</option>
      <option>FastTrack</option>
    </select>
							</div>
						</div>
						
						<div class="all-from-request-zone-textarea remark-request-zone">
							<label>Comment</label>
							<textarea type="text" class="form-control all-from-request-textarea" name="remark" placeholder="Enter your comment"></textarea>
						</div>
						<input type="reset" class="resetData">	
						<button class="all-from-request-button" type="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- New Batch Enquiry Modal End -->
								<!-- Placement Query Modal Start-->
	<div class="all-from-request-zone modal fade" id="placement-query-modal" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="all-from-request-zone-heading text-center">
					<h5 class="headertitle">Placement Query !</h5>					 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>				 
				<div class="all-from-request-zone-content">
					<form action="" method="post" onsubmit="return contactController.saveRequestZone(this)" autocomplete="off">
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Name</label>
								<input type="text" class="form-control" name="name" placeholder="Enter Your Name">
								<input type="hidden" name="frm_title" class="frm_title" >
								<input type="hidden" name="rz_form" class="rz_form">
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label>Email Id</label>
								<input type="text" class="form-control" name="email" placeholder="Enter Your Email Id">
							</div>
						</div>
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Mobile</label>
								<div class="valide-text">
								<div class="drop-number">
								 
								<select name="code" class="choosecode">
								 
								</select>
								<input type="tel" name="phone"  class="form-control" maxlength="16"  onkeypress="return isNumericKeyCheck(event);" placeholder="Enter Your Mobile no. " >	
								</div>
								</div>								
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label>Course</label>
								<input type="text" class="form-control" name="course" placeholder="Enter Your Course">
							</div>
						</div>
																			
						<div class="all-from-request-zone-textarea remark-request-zone">
							<label>Query</label>
							<textarea type="text" class="form-control all-from-request-textarea" name="query" placeholder="Enter your query here"></textarea>
						</div>
						<input type="reset" class="resetData">	
						<button class="all-from-request-button" type="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
   <!-- Placement Query Modal Start-->
	<!-- Request for Online Training Modal Start -->
		<div class="all-from-request-zone modal fade" id="request-online-training-modal" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="all-from-request-zone-heading text-center">
					<h5 class="headertitle">Request for Online Training !</h5>
					 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				 
				<div class="all-from-request-zone-content">
					<form action="" method="post" onsubmit="return contactController.saveRequestZone(this)" autocomplete="off">
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Name</label>
								<input type="text" class="form-control" name="name" placeholder="Enter Your Name">
								<input type="hidden" name="frm_title" class="frm_title" >
								<input type="hidden" name="rz_form" class="rz_form">
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label>Email</label>
								<input type="text" class="form-control" name="email" placeholder="Enter Your Email Id">
							</div>
						</div>
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Mobile</label>
								 
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
								
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label>Course</label>
								<input type="text" class="form-control" name="course" placeholder="Enter Your Course">
							</div>
							<div class="all-from-request-zone-group-new col-md-12">
								<label>Batch</label>
 <select class="form-control" id="exampleFormControlSelect3">
      <option>Select Your Batch</option>
      <option>Weekday</option>
      <option>Weekend</option>
      <option>FastTrack</option>
    </select>
							</div>
						</div>

						<div class="all-from-request-zone-textarea remark-request-zone">
							<label>Remark</label>
							<textarea type="text" class="form-control all-from-request-textarea" name="remark" placeholder="Enter Your Remark"></textarea>
						</div>
						<input type="reset" class="resetData">	
						<button class="all-from-request-button" type="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>
		</div>
		<!-- Request for Online Training Modal End -->
<!-- Job Portal Access Modal Start -->
	<div class="all-from-request-zone modal fade" id="job-portal-access-modal" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="all-from-request-zone-heading text-center">
					<h5 class="headertitle">Job Portal Access!</h5>					 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>				 
				<div class="all-from-request-zone-content">
					<form action="" method="post" onsubmit="return contactController.saveRequestZone(this)" autocomplete="off">
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label for="inputfirstname">Name</label>
								<input type="text" class="form-control" name="name" placeholder="Enter Your Name">
								<input type="hidden" name="frm_title" class="frm_title" >
								<input type="hidden" name="rz_form" class="rz_form">
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label for="inputemail">Email</label>
								<input type="text" class="form-control" name="email" placeholder="Enter Your Email Id">
							</div>
						</div>
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Mobile</label>
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
								
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label for="inputemail">Course</label>
								<input type="text" class="form-control" name="course" placeholder="Enter Your course">
							</div>
						</div>
						<!--<div class="form-row">-->
							 
						<!--	<div class="all-from-request-zone-group col-md-12">-->
						<!--		<label for="inputtrainername">File Upload Here</label>-->
						<!--		<div class="custom-file file-upload">-->
						<!--			<input type="file" class="custom-file-input" name="choose_file" accept=".pdf,.doc,docx">-->
						<!--			<label class="custom-file-label" for="customFile">Choose file</label>-->
						<!--		</div>-->
						<!--	</div>-->
						<!--</div>-->
						
						<div class="all-from-request-zone-textarea remark-request-zone">
							<label>Remark</label>
							<textarea type="text" name="remark" class="form-control all-from-request-textarea" placeholder="Enter your remark"></textarea>
						</div>
						<input type="reset" class="resetData">	
						<button class="all-from-request-button" type="submit">Submit</button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
									<!-- Job Portal Access Modal End -->
<!-- Connect to Management Modal Start -->
	<div class="all-from-request-zone modal fade" id="connect-management-modal" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="all-from-request-zone-heading text-center">
					<h5 class="headertitle">Connect to Management !</h5>					 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				 
				<div class="all-from-request-zone-content">
					<form action="" method="post" onsubmit="return contactController.saveRequestZone(this)" autocomplete="off">
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label for="inputfirstname">Name</label>
								<input type="text" class="form-control" name="name" placeholder="Enter Your Name">
								<input type="hidden" name="frm_title" class="frm_title" >
								<input type="hidden" name="rz_form" class="rz_form">
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label for="inputemail">Email</label>
								<input type="text" class="form-control" name="email" placeholder="Enter Your Email Id">
							</div>
						</div>
						<div class="form-row">
							<div class="all-from-request-zone-group col-md-6">
								<label>Mobile</label>
								<div class="valide-text">
								<div class="drop-number">
								 
								<select name="code" class="choosecode">
								 
								</select>
								<input type="tel" name="phone"  class="form-control" maxlength="16"  onkeypress="return isNumericKeyCheck(event);" placeholder="Enter Your Mobile no. " >	
								</div>
								</div>
								
							</div>
							<div class="all-from-request-zone-group col-md-6">
								<label for="inputemail">Course</label>
								<input type="text" class="form-control" name="course" placeholder="Enter Your Course">
							</div>
						</div>														
						<div class="all-from-request-zone-textarea remark-request-zone">
							<label>Remark</label>
							<textarea type="text" name="remark" class="form-control all-from-request-textarea" placeholder="Enter your remark"></textarea>
						</div>		
						<input type="reset" class="resetData">						
						<button class="all-from-request-button" type="submit">Submit</button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
			<!-- Connect to Management Modal End -->


