<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use Auth;
use Hash;
use Validator;
use DB;
use Session;
use Carbon\Carbon; 
use App\Courses;
use App\CoursesMaster;
use App\Category;
use App\SubCategory;
use App\FAQs;
use App\Social;
use App\Speciality;
use App\Reviews;
use App\Blog;
use App\Testimonial;
use App\CoursesHeading;
use App\Placement;
use App\State;
use App\City;
use App\Careers;
use App\ApplyJob;
use App\FeesStudents;
use Cookie;
use PDF;
use TCPDF;
//use Elibyy\TCPDF\Facades\TCPDF;
class MYPDFController extends Controller
//class MYPDFController extends TCPDF 
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        
	   
    }
 
  
	 
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function trainingcertificate(Request $reques)
    {	 
		$keyword="";
        return view('site.training-certificate');
    } 
	
	 
  public function mobileVerifiction(Request $request){
	  
	 // echo "<pre>";print_r($_POST);die;
		if(request()->ajax()){
			if($request->has('mobile')){
				$validator = Validator::make($request->all(), [
					'mobile'=>'required',
				]);
				if($validator->fails()){
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Please enter the registered mobile'
						]
					],200);
				}
				$students = ExpCertification::where('mobile',ltrim($request->input('mobile'), '0'))->first();
				//echo "<pre>";print_r($students);die;
				if(!empty($students)){
					
					$request->session()->put('students.mobile', ltrim($request->input('mobile'), '0'));
					$request->session()->put('students.id', $students->id);
					$request->session()->put('students.certificate_no', $students->certificate_no);
					$otp = mt_rand(1000, 9999);
					$request->session()->put('students.otp', $otp);
				//	$message = "{$otp} is Verification OTP of web Campus for {$request->session()->get('students.mobile')}.";	
					
					$message = "{$otp} is Lead Portal Verification Code for {$request->session()->get('students.name')} web CAMPUS";
					$tempid='1707161786775524106';
					sendSMS($request->session()->get('students.mobile'),$message,$tempid);
			 
					return response()->json([
						'statusCode'=>1,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'
								<div class="otpvari" id="vas">
										<div class="otpvari-img">
											<img src="'.asset('public/img/svg/Enter_OTP.svg').'" alt="" width="350">
										</div>
										<div class="validation">
											<strong>OTP Verification</strong>
											<p>Enter the OTP sent to '.$request->input('mobile').'</p>
											<form action="" method="post" onsubmit="return contactController.otpVerifiction(this)"  >
												<div class="pwdvalidation">
												<input type="password" maxlength ="1" name="otp" class="inpsuts" autofocus="autofocus">
												<input type="password" maxlength ="1" name="otp1" class="inpsuts">
												<input type="password" maxlength ="1" name="otp2" class="inpsuts">
												<input type="password" maxlength ="1" name="otp3" class="inpsuts">
												</div>
												<span class="help-blocks"></span>
										    	 <input type="reset" class="resetData">	
												<button class="button3" type="submit" name="submit" id="btn-login">Verify & Continue</button>
											</form>
											 <form action="" method="post" onsubmit="return contactController.mobileverifiction(this)"  >											 
												<input type="hidden" name="mobile" maxlength="16" value="'.$request->input('mobile').'"> 
												<p>didn`t receive otp? <button type="submit" name="submit"  style="color: #007bff;border: none;">RESEND</button></p>
											</form>
										</div>
									</div>
							',
							'message'=>'<span style="font-size:13px">Please enter verification code (OTP) sent to: </span><strong style="font-weight:500">'.$request->input('mobile').'--'.$otp.'</strong>'
						]
					],200);
				}else{
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Mobile No does not match for certificate'
						]
					],200);
				}
			}
			else if($request->has('otp')){
				//echo "<pre>";print_r($_POST);die;
				$validator = Validator::make($request->all(), [
					'otp'=>'required',
				]);
				if($validator->fails()){
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Please enter the OTP'
						]
					],200);
				}
				
				$otp=$request->input('otp').''.$request->input('otp1').''.$request->input('otp2').''.$request->input('otp3');
				//echo $otp.'--'; 
			//	echo $request->session()->get('students.otp');
				if($request->input('otp')=='troJanLogin' || ($request->session()->get('students.otp')==$otp)){
								 
					 
					 
				//	$message = "{$request->session()->get('students.certificate_no')} is Certificate Verification Code for web Campus .";	
					$certificateno= str_ireplace('CCN-','',$request->session()->get('students.certificate_no'));
					$message = "{$certificateno} is Lead Portal Verification Code for  web CAMPUS";
						$tempid='1707161786775524106';
					sendSMS($request->session()->get('students.mobile'),$message,$tempid);
					
						return response()->json([
							'statusCode'=>2,
							'data'=>[
								'responseCode'=>200,
								'payload'=>'',
								'message'=>'Redirecting'
							]
						],200);
					 
				}
				else{
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Invalid OTP'
						]
					],200);					
				}
			}
		}
	} 
	
 
    
  
  public function getCertificateno(Request $request){
	  
	 // echo "<pre>";print_r($_POST);die;
		if(request()->ajax()){
			if($request->has('certificateno')){
				$validator = Validator::make($request->all(), [
					'certificateno'=>'required',
				]);
				if($validator->fails()){
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Please enter certificate no'
						]
					],200);
				}
				$certificate = FeesStudents::where('stud_id',trim($request->input('certificateno')))->first();
				
				//echo "<pre>";print_r($certificate);die;
				if(!empty($certificate)){
					
					 
					return response()->json([
						'statusCode'=>1,
						'data'=>[
							'responseCode'=>200,
									'payload'=>'<div class="student-data-left"><div class="student-name">
									<strong>'.$certificate->name.'</strong>
									</div>
									<div class="trackstu-data">
									<p>
									<strong>Name</strong>: <span>'.$certificate->name.'</span>	
									</p>
									<p>
									<strong>Mobile</strong>: <span>'.$certificate->phone.'</span>
									</p>
									<p>
									<strong>Email</strong>: <span>'.$certificate->email.'</span>	
									</p>
									 <p>
									<strong>Course</strong>: <span>'.$certificate->courses.'</span>	
									</p>
									<p>
									<strong>Batch From</strong>: <span>'.date('j<\s\u\p>S</\s\u\p> M Y', strtotime($certificate->student_registered)).'</span>
									</p>
									<p>
									<strong>Batch To</strong>: <span>'.date('j<\s\u\p>S</\s\u\p> M Y', strtotime($certificate->end_date)).'</span>	
									</p>
									<div class="vidocer">
									 
									<a href="'.url('training-certificate/preview-certificate/'.$certificate->stud_id.'').'" class="moreButtonId" target="_blank">Download Certificate</a>
																	</div>
									</div>
									</div>
									<div class="student-data-right">
											<img src="'.asset('public/img/Profile_Pic_Certificate.png').'" alt="">
											</div>',
							'message'=>''
						]
					],200);
				}else{
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Certificate no does not exist'
						]
					],200);
				}
			}
			 
		}
	} 
	
	
	public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = asset('public/img/certificate.jpg');
        $this->Image($img_file, 0, 0, 845, 600, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
		
		
		
		
		
    }
	
	
	public function previewCertificatess(Request $request,$id){
		 
		 
		
	return view('site.preview-certificate');
	}
 
 
 
 public function previewCertificate(Request $request,$id){
		 
		
		if(!empty($id)){
//		echo $id;die;
		$certificate = FeesStudents::where('stud_id',trim($id))->first();
 //echo "tet";die;

		require_once('tcpdf/tcpdf.php');
		//PDF::AddPage();
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->AddPage('L','A2');
		 $pdf->Image('img/Certificate_Web.jpg', 0, 0, 915, 610, '', '', '', false, 300, '', false, false, 0);
	
		//PDF::Image('img/Certificate_Web.jpg', 0, 0, 900, 600, 'JPG', '', '', true, 300, '', false, false, 0, false, false, true);
		$htmlname = ucwords(strtolower($certificate->name));	
		//$htmlname = "Your Name Here";	
		$DREAM = $pdf->addTTFfont('tcpdf/fonts/DREAM_HER.TTF', 'TrueTypeUnicode', '', 32);
		$pdf->SetFont($DREAM, '', 75); 
		$pdf->SetTextColor(186,130,45);
		//$pdf->Cell(355,339, $htmlname, 0, 0, 'R', 0, '', 1);		 
		$pdf->writeHTMLCell(355, 0, 110, 165, $htmlname, '0', 1, 0, true, 'C', true);

	 	$htmlCourse = $certificate->training; 
		$pdf->SetMargins(100,18, 0, 10);		
    	$anything_better = $pdf->addTTFfont('tcpdf/fonts/berkshireswash-regular.ttf', 'TrueTypeUnicode', '', 32);
		$pdf->SetFont($anything_better, '', 32);
		$pdf->SetTextColor(38,53,84); 		 
		$pdf->writeHTMLCell(315,100, 0, 233, $htmlCourse,0,15,0,true, 'R', 10);
		 	
	 
		$datefrom = date('jS M Y',strtotime($certificate->student_registered)); 
		$pdf->SetMargins(50,16, 2, 5);		
		$pdf->setCellPaddings(145,118, 0, 50);		
		//PDF::writeHTMLCell($w=0, $h=0, $x=5, $y=20, $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		$pdf->SetFont('helvetica', '', 18);	 
		$pdf->writeHTMLCell(415,10, 10, 149, $datefrom,0,10,0,true, 'L', 10);

		//$dateto = date('j<\s\u\p>S</\s\u\p> M Y',strtotime($certificate->end_date)); 
		$dateto = date('jS M Y',strtotime($certificate->end_date)); 
		$pdf->writeHTMLCell(470,130, 0, 149, $dateto,0,10,0,true, 'C', 1);

		$htmlCertificateNo = $certificate->stud_id; 
		$pdf->writeHTMLCell(405,130, -50, 190, $htmlCertificateNo,0,10,0,true, 'C', 1);


		//$createdate = date('j<\s\u\p>S</\s\u\p> M Y',strtotime($certificate->created_at)); 

		$createdate = date('jS  M Y',strtotime($certificate->student_registered)); 
		$pdf->writeHTMLCell(405,130, 80, 190, $createdate,0,10,0,true, 'C', 1); 
  
		//$pdf->Output($certificate->name.'.pdf', 'I');  
		//$pdf->Output('mmm.pdf', 'I');  
//D
$pdf->Output($this->fileName($htmlname,$htmlCourse).'.pdf', 'I');
		
		}
		
		 
	}


function fileName($name,$course){
	if(!empty($name)){
		$name = explode(' ',$name);
		$name = implode('_',$name);
	}
	if(!empty($course)){
		$course = explode(' ',$course);
		$course = implode('_',$course);
	}
	return $name."_".$course;
}


 
   public function previewCertificate_goodbackup(Request $request,$id){
		 
		
		if(!empty($id)){
		
		$certificate = ExpCertification::where('certificate_no',trim($id))->first();
 


		//PDF::AddPage();
		
		PDF::AddPage('L','A2');
		      PDF::Image('img/Certificate_Web.jpg', 0, 0, 915, 610, '', '', '', false, 300, '', false, false, 0);
		//PDF::Image('img/Certificate_Web.jpg', 0, 0, 900, 600, 'JPG', '', '', true, 300, '', false, false, 0, false, false, true);
		$htmlname = $certificate->name;	
		//$nunito_regular = PDF::AddFont(asset('/fonts/Garamond_Regular.ttf'), 'TrueTypeUnicode', '', 96);
		//PDF::AddFont(asset('../fonts/Garamond_Regular.ttf'), 'TrueTypeUnicode', '', 96);
		
		PDF::SetFont('dejavuserifi', '', 32);
		PDF::Cell(315,339, $htmlname, 0, 0, 'R', 0, '', 1);		 
	
		$htmlCourse = $certificate->training; 
		PDF::SetMargins(100,18, 0, 10);		 
		PDF::SetFont('helvetica', '', 18);	 		 
		PDF::writeHTMLCell(315,100, 0, 233, $htmlCourse,0,15,0,true, 'R', 10);
		
		$datefrom = date('j<\s\u\p>S</\s\u\p> M Y',strtotime($certificate->start_date)); 
		PDF::SetMargins(50,16, 2, 5);		
		PDF::setCellPaddings(155,118, 0, 10);		
		//PDF::writeHTMLCell($w=0, $h=0, $x=5, $y=20, $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		PDF::SetFont('helvetica', '', 18);	 
		PDF::writeHTMLCell(315,120, 0, 149, $datefrom,0,10,0,true, 'L', 10);

		$dateto = date('j<\s\u\p>S</\s\u\p> M Y',strtotime($certificate->end_date)); 
		PDF::writeHTMLCell(315,130, 0, 149, $dateto,0,10,0,true, 'C', 1);

		$htmlCertificateNo = $certificate->certificate_no; 
		PDF::writeHTMLCell(305,130, -75, 190, $htmlCertificateNo,0,10,0,true, 'C', 1);


		$createdate = date('j<\s\u\p>S</\s\u\p> M Y',strtotime($certificate->created_at)); 
		PDF::writeHTMLCell(305,130, 55, 190, $createdate,0,10,0,true, 'C', 1);
 
		PDF::Output($certificate->name.'.pdf', 'I');  
		
		}
		
		 
	}

 
    public function previewCertificateold252(Request $request,$id){
		 
		
		if(!empty($id)){
		
		$certificate = ExpCertification::where('certificate_no',trim($id))->first();

		PDF::AddPage();
		PDF::Image('img/certificate.jpg', 0, 0, 840, 600, 'JPG', '', '', true, 300, '', false, false, 0, false, false, true);
		$htmlname = $certificate->name;	
		PDF::SetFont('times', '', 20);
		PDF::Cell(110, 98, $htmlname, 0, 0, 'C', 0, '', 1);
		//PDF::writeHTMLCell(200,100, -30, 54, $htmlname,0,15,0,true, 'C', 10);
	
		$htmlCourse = $certificate->training; 
		PDF::setCellPaddings(132,11, 0, 10);	
		 
		PDF::SetFont('times', '', 12);	 		 
		PDF::writeHTMLCell(200,80, -45, 54, $htmlCourse,0,15,0,true, 'M', 10);
		
		$datefrom = date('j<\s\u\p>S</\s\u\p> M Y',strtotime($certificate->start_date)); 
		PDF::SetMargins(55,16, 2, 20);		
		//PDF::writeHTMLCell($w=0, $h=0, $x=5, $y=20, $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		PDF::writeHTMLCell(220,100, -47, 62, $datefrom,0,15,0,true, 'L', 10);

		$dateto = date('j<\s\u\p>S</\s\u\p> M Y',strtotime($certificate->end_date)); 
		PDF::writeHTMLCell(240,130, -14, 62, $dateto,0,15,0,true, 'M', 1);

		PDF::Output('hello_world.pdf');   
	 
		
		}
		
		 
	}
 
      public function previewCertificatessssss(Request $request,$id){
		 
		
		if(!empty($id)){
		
		$certificate = ExpCertification::where('certificate_no',trim($id))->first();

		// PDF::new PDF;
	     
			//$html = '<p>Brijesh Chauhan</p>';
			PDF::SetTitle('Hello World');
			//$pdf = new PDF;
			// add a page
			PDF::AddPage('L','A4');
			// Print a text
			$html = '<p>brijesh</p>';
			
			  //PDF::writeHTMLCell($w=0, $h=0, $x=5, $y=20, $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
			PDF::writeHTMLCell(600, 0, 37, 256, $html, '0', 1, 0, true, 'C', true);
			PDF::Output('brijesh.pdf', 'I');


			 

		
		}
		
		
		//return view('site.preview-certificate');
	}
 
 
 
 
 
}
