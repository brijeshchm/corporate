	<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
// Ignores notices and reports all other kinds... and warnings
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

*/

Route::get('/', [App\Http\Controllers\Site\HomeController::class, 'index']);
 
Route::get('/courses/{url}', [App\Http\Controllers\Site\HomeController::class, 'searchCourse']);

Route::get('/master-program/{url}', [App\Http\Controllers\Site\HomeController::class, 'searchMasterProgram']);
Route::get('/master-program',[App\Http\Controllers\Site\HomeController::class, 'staticMasterProgram']);
Route::get('/courses', [App\Http\Controllers\Site\CourseController::class, 'allcourses']);
Route::get('/reviews', [App\Http\Controllers\Site\HomeController::class, 'reviews']);

Route::post('/site/course/loadData', [App\Http\Controllers\Site\CourseController::class, 'courseLoadData']);
Route::post('/site/course/loadDataAbout',[App\Http\Controllers\Site\CourseController::class, 'courseLoadDataAbout']);
Route::post('/site/course/loadDataCityWise', [App\Http\Controllers\Site\CourseController::class, 'loadDataCityWise']);
Route::post('/site/course/loadDataTwoBlog',[App\Http\Controllers\Site\CourseController::class, 'loadDataTwoBlog']);
Route::post('/reviews/reviewLoadData',[App\Http\Controllers\Site\LoadMoreController::class, 'reviewLoadData']);
Route::post('/placement/placementLoadData', [App\Http\Controllers\Site\LoadMoreController::class, 'placementLoadData']);


Route::post('/searchreviews/{id}', [App\Http\Controllers\Site\HomeController::class, 'searchplacement']); 
Route::post('/searchplacement/{id}',[App\Http\Controllers\Site\HomeController::class, 'searchplacement']); 
Route::post('/saveReview', [App\Http\Controllers\Site\HomeController::class, 'saveReview']);

Route::get('/request-zone', [App\Http\Controllers\Site\HomeController::class, 'requestzone']);
Route::get('/about-us',  [App\Http\Controllers\Site\HomeController::class, 'aboutus']);
Route::get('/clients', [App\Http\Controllers\Site\HomeController::class, 'allclients']);
 Route::get('/faq', [App\Http\Controllers\Site\HomeController::class, 'FAQ']);

Route::get('/careers', [App\Http\Controllers\Site\HomeController::class, 'careers']);
Route::post('/saveApplyJob', [App\Http\Controllers\Site\HomeController::class, 'saveApplyJob']);
Route::get('/contact-us',  [App\Http\Controllers\Site\HomeController::class, 'contactUs']);
 
 Route::get('/corporate', [App\Http\Controllers\Site\HomeController::class, 'corporate']);
 Route::get('/jobs', [App\Http\Controllers\Site\HomeController::class, 'jobs']);
 Route::get('/job-details/{id}', [App\Http\Controllers\Site\HomeController::class, 'jobdetails']);
 Route::get('/job-placement-opening', [App\Http\Controllers\Site\HomeController::class, 'jobplacementopening']);
 
 
  
  Route::get('/team', [App\Http\Controllers\Site\HomeController::class, 'ourteam']);
  Route::get('/placement', [App\Http\Controllers\Site\HomeController::class, 'placement']);
  Route::get('/terms-conditions', [App\Http\Controllers\Site\HomeController::class, 'termsConditions']);
  Route::get('/privacy-policy', [App\Http\Controllers\Site\HomeController::class, 'privacyPolicy']);
  Route::get('/refund-cancellation-policy', [App\Http\Controllers\Site\HomeController::class, 'cancellationRefund']);
  Route::get('/reply', [App\Http\Controllers\Site\HomeController::class, 'reply']);
//   Route::get('/service', [App\Http\Controllers\Site\HomeController::class, 'service']);
  Route::get('/training-certificate', [App\Http\Controllers\Site\HomeController::class, 'trainingcertificate']);
  Route::get('/popular-category', [App\Http\Controllers\Site\HomeController::class, 'popularcategory']);
  Route::get('/getSelectState', [App\Http\Controllers\Site\HomeController::class, 'getSelectState']);
  Route::get('/getCountryCode', [App\Http\Controllers\Site\ContactController::class, 'getCountryCode']);
 
  Route::post('/courses/ajax_view', [App\Http\Controllers\Site\HomeController::class, 'ajax_view']);
  Route::post('/courses/ajax_course', [App\Http\Controllers\Site\HomeController::class, 'ajax_course']);
  Route::post('/courses/get_courses', [App\Http\Controllers\Site\HomeController::class, 'get_course']);
  Route::post('/courses/ajax_searchCategoryid', [App\Http\Controllers\Site\HomeController::class, 'ajax_searchCategoryid']);
  Route::post('/courses/ajax_searchCategory', [App\Http\Controllers\Site\HomeController::class, 'ajax_searchCategory']);
  Route::get('/our-corporate-trainers', [App\Http\Controllers\Site\HomeController::class, 'ourCorporateTrainers']);
   
 
  Route::post('/mobileverifiction', [App\Http\Controllers\Site\HomeController::class, 'mobileVerifiction']);
  Route::post('/otpVerifiction', [App\Http\Controllers\Site\HomeController::class, 'mobileVerifiction']);
  Route::post('/getCertificateno', [App\Http\Controllers\Site\HomeController::class, 'getCertificateno']);
  Route::get('/training-certificate/preview-certificate/{id}', [App\Http\Controllers\Site\MYPDFController::class, 'previewCertificate']); 
 
   Route::get('/inquiryForm', [App\Http\Controllers\Site\HomeController::class, 'contactUs']); 
   Route::post('/saveCorporateEnquiry', [App\Http\Controllers\Site\ContactController::class, 'saveCorporateEnquiry']); 
   Route::post('/saveFranchise', [App\Http\Controllers\Site\ContactController::class, 'saveFranchise']); 
   Route::post('/saveScholarship', [App\Http\Controllers\Site\ContactController::class, 'saveScholarship']); 
 
 
Route::get('/getSelectCourse',[App\Http\Controllers\Site\ContactController::class, 'getSelectCourse']);
Route::post('/dataSaveForm',[App\Http\Controllers\Site\ContactController::class, 'saveDataEnquiry']);
Route::post('/dataSavePopup',[App\Http\Controllers\Site\ContactController::class, 'saveDataEnquiry']);
Route::post('/saveDataEnquiryDownload',[App\Http\Controllers\Site\ContactController::class, 'saveDataEnquiryDownload']);
Route::post('/getOTP',[App\Http\Controllers\Site\ContactController::class, 'getOTP']);
Route::post('/dataSaveRight',[App\Http\Controllers\Site\ContactController::class, 'dataSaveRight']);
Route::post('/saveRequestZone',[App\Http\Controllers\Site\requestZoneController::class, 'saveRequestZone']);
Route::post('/checkmobilefeedback',[App\Http\Controllers\Site\requestZoneController::class, 'checkmobilefeedback']);
Route::post('/getstdfeedback', [App\Http\Controllers\Site\requestZoneController::class, 'getstdfeedback']);
Route::post('/checkjobportal',[App\Http\Controllers\Site\requestZoneController::class, 'checkjobportal']);
Route::post('/getstdjobportal',[App\Http\Controllers\Site\requestZoneController::class, 'getstdjobportal']);
Route::post('/getjobportaldetails', [App\Http\Controllers\Site\requestZoneController::class, 'getjobportaldetails']);

Route::post('/franchiseForm',[App\Http\Controllers\Site\ContactController::class, 'franchiseFormSave']);
Route::post('/saveNewsLetter', [App\Http\Controllers\Site\ContactController::class, 'saveNewsLetter']);
Route::post('/saveNotifications', [App\Http\Controllers\Site\ContactController::class, 'saveNotifications']);
Route::post('/faceAnIssue',[App\Http\Controllers\Site\ContactController::class, 'faceAnIssue']);

Route::get('/all-courses',[App\Http\Controllers\Site\CourseController::class, 'allcourses']);
Route::get('/get_category_ajax',[App\Http\Controllers\Site\CourseController::class, 'getCategoryAjax']);
Route::get('/get_category_course/{id}', [App\Http\Controllers\Site\CourseController::class, 'getCategoryCourse']);
Route::get('/get_all_course_page/{id}',[App\Http\Controllers\Site\CourseController::class, 'getAllCoursePage']);
Route::get('/get_category_master/{id}',[App\Http\Controllers\Site\CourseController::class, 'getCategoryMaster']);

Route::get('/get_city_ajax/{id}',[App\Http\Controllers\Site\ContactController::class, 'getCityAjax']);

Route::get('/get_state_ajax/{id}',[App\Http\Controllers\Site\ContactController::class, 'getStateAjax']);


Route::get('/blog', [App\Http\Controllers\Site\BlogController::class, 'blog']);
Route::get('/blog/{url}', [App\Http\Controllers\Site\BlogController::class, 'blogdetails']);
Route::get('/blog/category/{url}',[App\Http\Controllers\Site\BlogController::class, 'blogCategory']);
Route::post('/blog/blogLoadCategoryData/{id}',[App\Http\Controllers\Site\BlogController::class, 'blogLoadCategoryData']);
Route::post('/blog/blogLoadData',[App\Http\Controllers\Site\BlogController::class, 'blogLoadData']);
Route::post('/inquiryForm', [App\Http\Controllers\Site\ContactController::class, 'inquirySave']);
Route::post('/franchiseForm',[App\Http\Controllers\Site\ContactController::class, 'franchiseFormSave']);
 

 
Route::get('/fees-deposit',[App\Http\Controllers\Site\paymentGatwayController::class, 'feesdeposit']);
Route::get('/fees-pay/{url}', [App\Http\Controllers\Site\paymentGatwayController::class, 'feespaypage']);


//Route::get('/fees-pay/cGF3YW4=', 'Site\paymentGatwayController@feespaypawan');
//Route::get('/fees-pay/ZGV2ZW5kcmE=', 'Site\paymentGatwayController@feespaydevendra');
//Route::get('/fees-pay/c2F1cmFiaA==', 'Site\paymentGatwayController@feespaysaurabh');
Route::post('/save-processing', [App\Http\Controllers\Site\paymentGatwayController::class, 'saveProcessing']);

Route::get('/fees-checkout',[App\Http\Controllers\Site\paymentGatwayController::class, 'checkOut']);
Route::post('/fees-checkout',[App\Http\Controllers\Site\paymentGatwayController::class, 'checkOut']);
Route::post('/razorPayCheckout',[App\Http\Controllers\Site\paymentGatwayController::class, 'razorPayCheckout']);
Route::get('/success',[App\Http\Controllers\Site\paymentGatwayController::class, 'success']);
Route::get('/failed',[App\Http\Controllers\Site\paymentGatwayController::class, 'failed']);

Route::post('/getInvoicePrintPdf',[App\Http\Controllers\Site\paymentGatwayController::class, 'getInvoicePrintPdf']);









Auth::routes();
Route::get('admin/login',function(){
	if(Auth::user()){
		return redirect(url('/admin/dashboard'));
	}else{
	
		return view('admin.user.login');
		
	}
}); 
Route::get('admin/check',[App\Http\Controllers\Auth\AuthController::class, 'check']);
Route::post('admin/otp', [App\Http\Controllers\Auth\AuthController::class, 'authenticate']);
Route::get('/admin/otp',[App\Http\Controllers\Auth\AuthController::class, 'getOTP']);

Route::post('/admin/login',[App\Http\Controllers\Auth\AuthController::class, 'authenticate']);
Route::post('/check/login',[App\Http\Controllers\Auth\AuthController::class, 'authenticate']);
Route::get('/admin/logout/',[App\Http\Controllers\Auth\AuthController::class, 'logout']);


Route::get('admin/dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);

// *****************
// ROLES PERMISSIONS	
	Route::get('/admin/permission',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'index']);
	Route::get('/admin/permission/add',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'add']);
	Route::post('/admin/permission',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'permissionStore']);
	Route::get('/admin/permission/get-permission',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'getPaginatedPermissions']);
	Route::get('/admin/permission/edit/{id}',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'editPermission']);
	Route::post('/admin/permission/saveEdit/{id}',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'updatePermission']);
	Route::get('/admin/permission/delete/{id}',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'destroyPermission']);
	
	Route::get('/admin/role-permission',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'rolePermissionIndex']);
	Route::post('/admin/role-permission',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'rolePermissionStore']);
	Route::get('/admin/role-permission/get-role-permission',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'getPaginatedRolesPermissions']);
	Route::get('/admin/role-permission/update/{id}',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'editRolePermission']);
	Route::post('/admin/role-permission/update/{id}',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'updateRolePermission']);
	Route::get('/admin/role-permission/delete/{id}',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'destroyRolePermission']);
	Route::get('/admin/role-permission/{id}',[App\Http\Controllers\Admin\RolesPermissionsController::class, 'getRolePermissions']);
// ROLES PERMISSIONS
// *****************
 
 
 
 	  //lead 
    Route::get('admin/lead',[App\Http\Controllers\Admin\LeadController::class, 'index']);
    Route::get('admin/lead-analysis',[App\Http\Controllers\Admin\LeadController::class,'leadanalysis']);
    Route::get('admin/get-lead',[App\Http\Controllers\Admin\LeadController::class,'getLeadPagination']);
    Route::post('admin/lead/selectTodeleteLeads',[App\Http\Controllers\Admin\LeadController::class,'selectTodeleteLeads']);
    Route::get('getleadcount',[App\Http\Controllers\Admin\LeadController::class,'getleadcount']);
   
    Route::get('admin/monthly-lead-analysis',[App\Http\Controllers\Admin\LeadController::class,'monthlyleadanalysis']);
    Route::get('admin/lead/get-monthly-lead-analysis',[App\Http\Controllers\Admin\LeadController::class,'getMonthlyPaginationLeadAnalysis']);
    Route::get('admin/course-assignment',[App\Http\Controllers\Admin\LeadController::class,'courseassignment']);  
    Route::get('admin/get-assign-course',[App\Http\Controllers\Admin\LeadController::class,'getCourseAssignmentPagination']);



 //User Profile
Route::get('/admin/profile',[App\Http\Controllers\Admin\ProfileController::class, 'index']); 
Route::post('/admin/profile',[App\Http\Controllers\Admin\ProfileController::class, 'edit']);
Route::get('/admin/profile/del_icon/{id}',[App\Http\Controllers\Admin\ProfileController::class, 'del_icon']);
Route::get('/admin/profile/view/{id}',[App\Http\Controllers\Admin\ProfileController::class, 'view']);
Route::get('/admin/profile/delete/{id}',[App\Http\Controllers\Admin\ProfileController::class, 'destroy']);
Route::get('/admin/profile/status/{id}/{val}',[App\Http\Controllers\Admin\ProfileController::class, 'status']);


Route::get('/admin/change-password/',[App\Http\Controllers\Admin\ChangepasswordController::class, 'index']);
Route::post('/admin/change-password/',[App\Http\Controllers\Admin\ChangepasswordController::class, 'edit']);
 
// users
Route::get('admin/users',[App\Http\Controllers\Admin\UserController::class, 'index']);
Route::get('admin/users/add',[App\Http\Controllers\Admin\UserController::class, 'create']);
Route::post('admin/users/save',[App\Http\Controllers\Admin\UserController::class, 'saveUser']); 
Route::get('/admin/users/edit/{id}',[App\Http\Controllers\Admin\UserController::class, 'edit']);
Route::post('/admin/users/editSaveUser/{id}',[App\Http\Controllers\Admin\UserController::class, 'editSaveUser']);
Route::get('/admin/users/status/{id}/{val}',[App\Http\Controllers\Admin\UserController::class, 'status']);
Route::get('/admin/users/delete/{id}',[App\Http\Controllers\Admin\UserController::class, 'delete']);
Route::get('/admin/users/get-user',[App\Http\Controllers\Admin\UserController::class, 'getUserPagination']);
Route::get('/admin/users/del_icon/{id}',[App\Http\Controllers\Admin\UserController::class, 'del_icon']);


// course
Route::get('admin/course', [App\Http\Controllers\Admin\CourseController::class, 'index'])->middleware('auth');
Route::get('admin/course/add',[App\Http\Controllers\Admin\CourseController::class, 'add']);
Route::get('admin/course/edit/{id}', [App\Http\Controllers\Admin\CourseController::class, 'edit']);
Route::post('admin/course/saveCourseTitle', [App\Http\Controllers\Admin\CourseController::class, 'saveCourseTitle']);
Route::post('admin/course/editSaveCourseTitle/{id}', [App\Http\Controllers\Admin\CourseController::class, 'editSaveCourseTitle']);
Route::post('admin/course/editSaveCourseOverview/{id}', [App\Http\Controllers\Admin\CourseController::class, 'editSaveCourseOverview']);
Route::post('admin/course/editSaveCourseAbout/{id}',[App\Http\Controllers\Admin\CourseController::class, 'editSaveCourseAbout']);
Route::post('admin/course/editSaveCourseAboutExcel/{id}',[App\Http\Controllers\Admin\CourseController::class, 'editSaveCourseAboutExcel']);
Route::post('admin/course/editSaveCourseBatchVisibility/{id}',[App\Http\Controllers\Admin\CourseController::class, 'editSaveCourseBatchVisibility']);
Route::post('admin/course/editSaveCurriculum/{id}',[App\Http\Controllers\Admin\CourseController::class, 'editSaveCurriculum']);
Route::post('admin/course/editSaveCourseCurriculum/{id}',[App\Http\Controllers\Admin\CourseController::class, 'editSaveCourseCurriculum']);
Route::post('admin/course/editSaveCourseRelated/{id}', [App\Http\Controllers\Admin\CourseController::class, 'editSaveCourseRelated']);
Route::post('admin/course/editSaveCourseCertificate/{id}',[App\Http\Controllers\Admin\CourseController::class, 'editSaveCourseCertificate']);
Route::post('admin/course/editSaveFAQ/{id}',[App\Http\Controllers\Admin\CourseController::class, 'editSaveFAQ']);
Route::post('admin/course/editSaveTestimonial/{id}',[App\Http\Controllers\Admin\CourseController::class, 'editSaveTestimonial']);
Route::get('/admin/course/get-course',[App\Http\Controllers\Admin\CourseController::class, 'getCoursePagination'] );
Route::get('/admin/course/del_icon/{id}',[App\Http\Controllers\Admin\CourseController::class, 'del_icon']);
Route::get('/admin/course/del_image/{id}',[App\Http\Controllers\Admin\CourseController::class, 'del_image']);
Route::get('/admin/course/get_course_ajax',[App\Http\Controllers\Admin\CourseController::class, 'getCourseAjax']);
Route::get('/admin/course/delete/{id}',[App\Http\Controllers\Admin\CourseController::class, 'delete']);
Route::get('/admin/course/courseContentDelete/{id}',[App\Http\Controllers\Admin\CourseController::class, 'courseContentDelete']);
Route::get('/admin/course/courseAboutExcelDelete/{id}',[App\Http\Controllers\Admin\CourseController::class, 'courseAboutExcelDelete']);
Route::post('/admin/course/downloadExcelFormate',[App\Http\Controllers\Admin\CourseController::class, 'downloadExcelFormate']);
Route::post('/admin/course/status/{id}/{val}',[App\Http\Controllers\Admin\CourseController::class, 'status']);
Route::post('/admin/course/seo-visible',[App\Http\Controllers\Admin\CourseController::class, 'seovisible']);
 



Route::get('/admin/course/get_course_modul',[App\Http\Controllers\Admin\CourseController::class, 'getCourseMadul']);
Route::get('/admin/course/get_course_modul_edit',[App\Http\Controllers\Admin\CourseController::class, 'getCourseMadulEdit']);
Route::get('/admin/course/get_course_releted_edit',[App\Http\Controllers\Admin\CourseController::class, 'getCourseReletedEdit']);

// SEO PAge


Route::get('admin/seopage',[App\Http\Controllers\Admin\SeoPageController::class, 'index'])->middleware('auth');

//Route::get('admin/seopage', 'Admin\SeoPageController@index')->middleware('auth');

Route::get('/admin/seopage/add',[App\Http\Controllers\Admin\SeoPageController::class, 'add']);


Route::get('admin/seopage/edit/{id}', [App\Http\Controllers\Admin\SeoPageController::class, 'edit']);
Route::post('admin/seopage/saveCourseTitle',[App\Http\Controllers\Admin\SeoPageController::class, 'saveCourseTitle'] );
Route::post('admin/seopage/editSaveCourseTitle/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'editSaveCourseTitle']);
Route::post('admin/seopage/editSaveCourseAboutImage/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'editSaveCourseAboutImage'] );
Route::post('admin/seopage/editSaveCourseOverview/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'editSaveCourseOverview'] );
Route::post('admin/seopage/editSaveCourseAbout/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'editSaveCourseAbout']);
Route::post('admin/seopage/editSaveCourseAboutExcel/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'editSaveCourseAboutExcel'] );
Route::post('admin/seopage/editSaveCourseBatchVisibility/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'editSaveCourseBatchVisibility'] );
Route::post('admin/seopage/editSaveCurriculum/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'editSaveCurriculum']);
Route::post('admin/seopage/editSaveCourseCurriculum/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'editSaveCourseCurriculum'] );
Route::post('admin/seopage/editSaveCourseRelated/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'editSaveCourseRelated'] );
Route::post('admin/seopage/editSaveCourseCertificate/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'editSaveCourseCertificate'] );
Route::post('admin/seopage/editSaveFAQ/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'editSaveFAQ']);
Route::post('admin/seopage/editSaveTestimonial/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'editSaveTestimonial']);
Route::get('/admin/seopage/get-seopage',[App\Http\Controllers\Admin\SeoPageController::class, 'getCoursePagination']);
Route::get('/admin/seopage/del_icon/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'del_icon']);
Route::get('/admin/seopage/del_image/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'del_image']);
Route::get('/admin/seopage/get_course_ajax',[App\Http\Controllers\Admin\SeoPageController::class, 'getCourseAjax']);
Route::get('/admin/seopage/delete/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'delete']);
Route::get('/admin/seopage/courseContentDelete/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'courseContentDelete']);
Route::get('/admin/seopage/courseAboutExcelDelete/{id}',[App\Http\Controllers\Admin\SeoPageController::class, 'courseAboutExcelDelete']);
Route::post('/admin/seopage/downloadExcelFormate',[App\Http\Controllers\Admin\SeoPageController::class, 'downloadExcelFormate']);
Route::post('/admin/seopage/status/{id}/{val}',[App\Http\Controllers\Admin\SeoPageController::class, 'status']);

Route::post('/admin/seopage/get_coursesubcategory',[App\Http\Controllers\Admin\SeoPageController::class, 'getCourseSubCategory']);
Route::post('/admin/seopage/get_coursecategoryType',[App\Http\Controllers\Admin\SeoPageController::class, 'get_coursecategoryType']);
Route::post('/admin/seopage/get_category_course',[App\Http\Controllers\Admin\SeoPageController::class, 'getCourseName']);
Route::post('/admin/seopage/get_courseCity',[App\Http\Controllers\Admin\SeoPageController::class, 'getCourseCity']);
Route::post('/admin/seopage/get_courseCityOnline',[App\Http\Controllers\Admin\SeoPageController::class, 'getcourseCityOnline']);
Route::post('/admin/seopage/get_courseNCRCity',[App\Http\Controllers\Admin\SeoPageController::class, 'getcourseNCRCity']);

Route::post('/admin/seocategory_pdf/get_seocategory_pdf',[App\Http\Controllers\Admin\SeoPageController::class, 'getSEOCategoryPDF']);
Route::post('/admin/get_seocategory_course_pdf/get_seocourse_pdf',[App\Http\Controllers\Admin\SeoPageController::class, 'getSEOCoursePdf']);

Route::get('/admin/course/get_seo_course_releted_edit',[App\Http\Controllers\Admin\SeoPageController::class, 'getSEOCourseReletedEdit']);
 

// Course Master

Route::get('admin/coursemaster',[App\Http\Controllers\Admin\CourseMasterController::class, 'index']);
 
Route::get('admin/coursemaster/add',[App\Http\Controllers\Admin\CourseMasterController::class, 'add']);
Route::get('admin/coursemaster/edit/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'edit']);
Route::post('admin/coursemaster/saveCourseMasterTitle',[App\Http\Controllers\Admin\CourseMasterController::class, 'saveCourseMasterTitle']);
Route::post('admin/coursemaster/editSaveCourseCurriculumExcel/{id}', [App\Http\Controllers\Admin\CourseMasterController::class, 'editSaveCourseCurriculumExcel']);
Route::get('/admin/coursemaster/masterCurriculumExcelDelete/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'masterCurriculumExcelDelete']);
Route::post('admin/coursemaster/editSaveCourseMasterTitle/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'editSaveCourseMasterTitle'] );
Route::post('admin/coursemaster/editSaveCourseMasterAbout/{id}', [App\Http\Controllers\Admin\CourseMasterController::class, 'editSaveCourseMasterAbout']);
 
 
Route::post('admin/coursemaster/editSaveCourseToolsCovered/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'editSaveCourseToolsCovered'] );
Route::post('admin/coursemaster/editSaveCourseClients/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'editSaveCourseClients']);
Route::post('admin/coursemaster/editSaveCourseStructure/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'editSaveCourseStructure']);
Route::post('admin/coursemaster/editSaveCourseMasterPlacement/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'editSaveCourseMasterPlacement']);
Route::post('admin/coursemaster/editSaveCourseMasterRelated/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'editSaveCourseMasterRelated']);
Route::post('admin/coursemaster/editSaveCourseFooter/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'editSaveCourseFooter'] );
Route::post('admin/coursemaster/editSaveFAQ/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'editSaveFAQ']);
Route::post('admin/coursemaster/editSaveTestimonial/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'editSaveTestimonial']);
Route::get('/admin/coursemaster/get-courseMaster',[App\Http\Controllers\Admin\CourseMasterController::class, 'getCourseMasterPagination']);
Route::get('/admin/coursemaster/del_icon/{id}', [App\Http\Controllers\Admin\CourseMasterController::class, 'del_icon']);
Route::get('/admin/coursemaster/del_image/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'del_image']); 
Route::get('/admin/coursemaster/delete/{id}',[App\Http\Controllers\Admin\CourseMasterController::class, 'delete']);
Route::post('/admin/coursemaster/status/{id}/{val}',[App\Http\Controllers\Admin\CourseMasterController::class, 'status']);


// certificate
 
Route::get('admin/certificate',[App\Http\Controllers\Admin\CertificateController::class, 'index']);
Route::get('admin/certificate/add', [App\Http\Controllers\Admin\CertificateController::class, 'add']);
Route::get('admin/certificate/edit/{id}',[App\Http\Controllers\Admin\CertificateController::class, 'edit']);
Route::post('admin/certificate/saveCertificateTitle',[App\Http\Controllers\Admin\CertificateController::class, 'saveCertificateTitle'] );
Route::post('admin/certificate/editSaveCertificateTitle/{id}', [App\Http\Controllers\Admin\CertificateController::class, 'editSaveCertificateTitle']);
Route::post('admin/certificate/editSaveCertificateOverview/{id}', [App\Http\Controllers\Admin\CertificateController::class, 'editSaveCertificateOverview']);
Route::post('admin/certificate/editSaveCertificateCurriculum/{id}',[App\Http\Controllers\Admin\CertificateController::class, 'editSaveCertificateCurriculum'] );
Route::post('admin/certificate/editSaveCertificateRelated/{id}', [App\Http\Controllers\Admin\CertificateController::class, 'editSaveCertificateRelated']);
Route::post('admin/certificate/editSaveFAQ/{id}',[App\Http\Controllers\Admin\CertificateController::class, 'editSaveFAQ']);
Route::get('/admin/certificate/get-certificate',[App\Http\Controllers\Admin\CertificateController::class, 'getCertificatePagination'] );
Route::get('/admin/certificate/del_icon/{id}',[App\Http\Controllers\Admin\CertificateController::class, 'del_icon']);
Route::get('/admin/certificate/get_certificate_ajax',[App\Http\Controllers\Admin\CertificateController::class, 'getCertificateAjax']);
Route::get('/admin/certificate/delete/{id}',[App\Http\Controllers\Admin\CertificateController::class, 'delete']);

 
// Category
Route::get('admin/category',[App\Http\Controllers\Admin\CategoryController::class, 'index']);
Route::get('admin/category/add',[App\Http\Controllers\Admin\CategoryController::class, 'create']);
Route::post('admin/category/save',[App\Http\Controllers\Admin\CategoryController::class, 'saveCategory']); 
Route::get('/admin/category/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'edit']);
Route::post('/admin/category/editSaveCategory/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'editSaveCategory']);
Route::post('/admin/category/status/{id}/{val}',[App\Http\Controllers\Admin\CategoryController::class, 'status']);
Route::get('/admin/category/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'delete']);
Route::get('/admin/category/get-category',[App\Http\Controllers\Admin\CategoryController::class, 'getCategoryPagination']);
Route::get('/admin/category/del_icon/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'del_icon']);
Route::post('/admin/getcategory/get_video_link',[App\Http\Controllers\Admin\CategoryController::class, 'getvideolink']);

// Sub Category
Route::get('admin/subcategory',[App\Http\Controllers\Admin\SubCategoryController::class, 'index']);
Route::get('admin/subcategory/add',[App\Http\Controllers\Admin\SubCategoryController::class, 'create']);
Route::post('admin/subcategory/save',[App\Http\Controllers\Admin\SubCategoryController::class, 'saveSubCategory']); 
Route::get('/admin/subcategory/edit/{id}',[App\Http\Controllers\Admin\SubCategoryController::class, 'edit']);
Route::post('/admin/subcategory/editSaveSubCategory/{id}',[App\Http\Controllers\Admin\SubCategoryController::class, 'editSaveSubCategory']);
Route::get('/admin/subcategory/delete/{id}',[App\Http\Controllers\Admin\SubCategoryController::class, 'delete']);
Route::get('/admin/subcategory/get-subcategory',[App\Http\Controllers\Admin\SubCategoryController::class, 'getSubCategoryPagination']);
Route::get('/admin/subcourse/get_subcourse_ajax/{id}',[App\Http\Controllers\Admin\SubCategoryController::class, 'getSubCourseAjax']);
Route::post('/admin/subcategory/get_subcategory',[App\Http\Controllers\Admin\SubCategoryController::class, 'getSubCategory']);

Route::post('/admin/subcategory_pdf/get_subcategory_pdf',[App\Http\Controllers\Admin\SubCategoryController::class, 'getSubCategoryPDF']);
Route::post('/admin/get_category_course_pdf/get_course_pdf',[App\Http\Controllers\Admin\SubCategoryController::class, 'getCoursePdf']);

Route::post('/admin/subcategory/status/{id}/{val}',[App\Http\Controllers\Admin\SubCategoryController::class, 'status']);
Route::get('/admin/subcategory/del_icon/{id}',[App\Http\Controllers\Admin\SubCategoryController::class, 'del_icon']);
Route::get('/admin/subcategory/del_image/{id}',[App\Http\Controllers\Admin\SubCategoryController::class, 'del_image']);

//course city
Route::get('admin/city',[App\Http\Controllers\Admin\CityController::class, 'index']);
Route::get('admin/city/add',[App\Http\Controllers\Admin\CityController::class, 'create']);
Route::post('admin/city/save',[App\Http\Controllers\Admin\CityController::class, 'saveCity']); 
Route::get('/admin/city/edit/{id}',[App\Http\Controllers\Admin\CityController::class, 'edit']);
Route::post('/admin/city/editSaveCity/{id}',[App\Http\Controllers\Admin\CityController::class, 'editSaveCity']);
Route::get('/admin/city/delete/{id}',[App\Http\Controllers\Admin\CityController::class, 'delete']);
Route::get('/admin/city/get-city',[App\Http\Controllers\Admin\CityController::class, 'getCityPagination']);
Route::get('/admin/city/status/{id}/{val}',[App\Http\Controllers\Admin\CityController::class, 'status']);
//
//Payment Mode
Route::get('admin/payment-mode',[App\Http\Controllers\Admin\PaymentModeController::class, 'index']);
Route::get('admin/payment-mode/add',[App\Http\Controllers\Admin\PaymentModeController::class, 'create']);
Route::post('admin/payment-mode/save',[App\Http\Controllers\Admin\PaymentModeController::class, 'savePayMode']); 
Route::get('/admin/payment-mode/edit/{id}',[App\Http\Controllers\Admin\PaymentModeController::class, 'edit']);
Route::post('/admin/payment-mode/editSavepayMode/{id}',[App\Http\Controllers\Admin\PaymentModeController::class, 'editSavePayMode']);
Route::get('/admin/payment-mode/delete/{id}',[App\Http\Controllers\Admin\PaymentModeController::class, 'delete']);
Route::get('/admin/payment-mode/get-payment-mode',[App\Http\Controllers\Admin\PaymentModeController::class, 'getPayModePagination']);
Route::get('/admin/payment-mode/status/{id}/{val}',[App\Http\Controllers\Admin\PaymentModeController::class, 'status']);
Route::get('/admin/payment-mode/del_icon/{id}',[App\Http\Controllers\Admin\PaymentModeController::class, 'del_icon']);
 
 
// Tools Covered
Route::get('admin/toolscovered',[App\Http\Controllers\Admin\ToolsCoveredController::class, 'index']);
Route::get('admin/toolscovered/add',[App\Http\Controllers\Admin\ToolsCoveredController::class, 'create']);
Route::post('admin/toolscovered/save',[App\Http\Controllers\Admin\ToolsCoveredController::class, 'saveToolsCovered']); 
Route::get('/admin/toolscovered/edit/{id}',[App\Http\Controllers\Admin\ToolsCoveredController::class, 'edit']);
Route::post('/admin/toolscovered/editSaveToolsCovered/{id}',[App\Http\Controllers\Admin\ToolsCoveredController::class, 'editSaveToolsCovered']);
Route::post('/admin/toolscovered/status/{id}/{val}',[App\Http\Controllers\Admin\ToolsCoveredController::class, 'status']);
Route::get('/admin/toolscovered/delete/{id}',[App\Http\Controllers\Admin\ToolsCoveredController::class, 'delete']);
Route::get('/admin/toolscovered/get-toolscovered',[App\Http\Controllers\Admin\ToolsCoveredController::class, 'getToolsCoveredPagination']);
Route::get('/admin/toolscovered/del_icon/{id}',[App\Http\Controllers\Admin\ToolsCoveredController::class, 'del_icon']);



// Client
Route::get('admin/client',[App\Http\Controllers\Admin\ClientController::class, 'index']);
Route::get('admin/client/add',[App\Http\Controllers\Admin\ClientController::class, 'create']);
Route::post('admin/client/save',[App\Http\Controllers\Admin\ClientController::class, 'saveClient']); 
Route::get('/admin/client/edit/{id}',[App\Http\Controllers\Admin\ClientController::class, 'edit']);
Route::post('/admin/client/editSaveClient/{id}',[App\Http\Controllers\Admin\ClientController::class, 'editSaveClient']);
Route::post('/admin/client/status/{id}/{val}',[App\Http\Controllers\Admin\ClientController::class, 'status']);
Route::get('/admin/client/delete/{id}',[App\Http\Controllers\Admin\ClientController::class, 'delete']);
Route::get('/admin/client/get-client',[App\Http\Controllers\Admin\ClientController::class, 'getClientPagination']);
Route::get('/admin/client/del_icon/{id}',[App\Http\Controllers\Admin\ClientController::class, 'del_icon']);

 
// Social
Route::get('admin/social',[App\Http\Controllers\Admin\SocialController::class, 'index']);
Route::get('admin/social/add',[App\Http\Controllers\Admin\SocialController::class, 'create']);
Route::post('admin/social/save',[App\Http\Controllers\Admin\SocialController::class, 'saveSocial']); 
Route::get('/admin/social/edit/{id}',[App\Http\Controllers\Admin\SocialController::class, 'edit']);
Route::post('/admin/social/editSaveSocial/{id}',[App\Http\Controllers\Admin\SocialController::class, 'editSaveSocial']);
Route::get('/admin/social/delete/{id}',[App\Http\Controllers\Admin\SocialController::class, 'delete']);
Route::get('/admin/social/get-social',[App\Http\Controllers\Admin\SocialController::class, 'getSocialPagination']);
Route::get('/admin/social/del_icon/{id}', [App\Http\Controllers\Admin\SocialController::class, 'del_icon']);


 
 
 //FAQs
Route::get('admin/FAQs',[App\Http\Controllers\Admin\FAQsController::class, 'index']);
Route::get('admin/FAQs/add',[App\Http\Controllers\Admin\FAQsController::class, 'create']);
Route::post('admin/FAQs/save',[App\Http\Controllers\Admin\FAQsController::class, 'saveFAQs']); 
Route::get('/admin/FAQs/edit/{id}',[App\Http\Controllers\Admin\FAQsController::class, 'edit']);
Route::post('/admin/FAQs/editSaveFAQs/{id}',[App\Http\Controllers\Admin\FAQsController::class, 'editSaveFAQs']);
Route::get('/admin/FAQs/delete/{id}',[App\Http\Controllers\Admin\FAQsController::class, 'delete']);
Route::get('/admin/FAQs/get-FAQs',[App\Http\Controllers\Admin\FAQsController::class, 'getFAQsPagination']);
 
  
 //Blog
Route::get('admin/blog',[App\Http\Controllers\Admin\BlogController::class, 'index']);
Route::get('admin/blog/add',[App\Http\Controllers\Admin\BlogController::class, 'create']);
Route::post('admin/blog/save',[App\Http\Controllers\Admin\BlogController::class, 'saveBlog']); 
Route::get('/admin/blog/edit/{id}',[App\Http\Controllers\Admin\BlogController::class, 'edit']);
Route::post('/admin/blog/editSaveBlog/{id}',[App\Http\Controllers\Admin\BlogController::class, 'editSaveBlog']);
Route::get('/admin/blog/delete/{id}',[App\Http\Controllers\Admin\BlogController::class, 'delete']);
Route::get('/admin/blog/get-blog',[App\Http\Controllers\Admin\BlogController::class, 'getBlogPagination']);
Route::get('/admin/blog/del_icon/{id}',[App\Http\Controllers\Admin\BlogController::class, 'del_icon']);
Route::get('/admin/blog/del_image/{id}', [App\Http\Controllers\Admin\BlogController::class, 'del_image']);
Route::get('/admin/blog/status/{id}/{val}',[App\Http\Controllers\Admin\BlogController::class, 'status']);
 
 //Reviews
Route::get('admin/reviews',[App\Http\Controllers\Admin\ReviewsController::class, 'index']);
Route::get('admin/reviews/add',[App\Http\Controllers\Admin\ReviewsController::class, 'create']);
Route::post('admin/reviews/save',[App\Http\Controllers\Admin\ReviewsController::class, 'saveReviews']); 
Route::get('/admin/reviews/edit/{id}',[App\Http\Controllers\Admin\ReviewsController::class, 'edit']);
Route::post('/admin/reviews/editSaveReviews/{id}',[App\Http\Controllers\Admin\ReviewsController::class, 'editSaveReviews']);
Route::get('/admin/reviews/delete/{id}',[App\Http\Controllers\Admin\ReviewsController::class, 'delete']);
Route::get('/admin/reviews/get-reviews',[App\Http\Controllers\Admin\ReviewsController::class, 'getReviewsPagination']);
Route::get('/admin/reviews/del_icon/{id}',[App\Http\Controllers\Admin\ReviewsController::class, 'del_icon']);
 Route::get('/admin/reviews/status/{id}/{val}',[App\Http\Controllers\Admin\ReviewsController::class, 'status']);
 
 
 
 //testimonial
Route::get('admin/testimonial',[App\Http\Controllers\Admin\TestimonialController::class, 'index']);
Route::get('admin/testimonial/add',[App\Http\Controllers\Admin\TestimonialController::class, 'create']);
Route::post('admin/testimonial/save',[App\Http\Controllers\Admin\TestimonialController::class, 'saveTestimonial']); 
Route::get('/admin/testimonial/edit/{id}',[App\Http\Controllers\Admin\TestimonialController::class, 'edit']);
Route::post('/admin/testimonial/editSaveTestimonial/{id}',[App\Http\Controllers\Admin\TestimonialController::class, 'editSaveTestimonial']);
Route::get('/admin/testimonial/delete/{id}',[App\Http\Controllers\Admin\TestimonialController::class, 'delete']);
Route::get('/admin/testimonial/get-testimonial',[App\Http\Controllers\Admin\TestimonialController::class, 'getTestimonialPagination']);
Route::get('/admin/testimonial/del_icon/{id}',[App\Http\Controllers\Admin\TestimonialController::class, 'del_icon']);
Route::get('/admin/testimonial/status/{id}/{val}', [App\Http\Controllers\Admin\TestimonialController::class, 'status']); 
 
 
 
 //placement
Route::get('admin/placement',[App\Http\Controllers\Admin\PlacementController::class, 'index']);
Route::get('admin/placement/add',[App\Http\Controllers\Admin\PlacementController::class, 'create']);
Route::post('admin/placement/save',[App\Http\Controllers\Admin\PlacementController::class, 'savePlacement']); 
Route::get('/admin/placement/edit/{id}',[App\Http\Controllers\Admin\PlacementController::class, 'edit']);
Route::post('/admin/placement/editSavePlacement/{id}',[App\Http\Controllers\Admin\PlacementController::class, 'editSavePlacement']);
Route::get('/admin/placement/delete/{id}',[App\Http\Controllers\Admin\PlacementController::class, 'delete']);
Route::get('/admin/placement/get-placement',[App\Http\Controllers\Admin\PlacementController::class, 'getPlacementPagination']);
Route::get('/admin/placement/del_icon/{id}',[App\Http\Controllers\Admin\PlacementController::class, 'del_icon']);
Route::get('/admin/placement/status/{id}/{val}',[App\Http\Controllers\Admin\PlacementController::class, 'status']); 
 
 
 //Careers
Route::get('admin/careers',[App\Http\Controllers\Admin\CareersController::class, 'index']);
Route::get('admin/careers/add',[App\Http\Controllers\Admin\CareersController::class, 'create']);
Route::post('admin/careers/saveCareers',[App\Http\Controllers\Admin\CareersController::class, 'saveCareers']); 
Route::get('/admin/careers/edit/{id}',[App\Http\Controllers\Admin\CareersController::class, 'edit']);
Route::post('/admin/careers/editSaveCareers/{id}',[App\Http\Controllers\Admin\CareersController::class, 'editSaveCareers']);
Route::get('/admin/careers/delete/{id}',[App\Http\Controllers\Admin\CareersController::class, 'delete']);
Route::get('/admin/careers/get-careers',[App\Http\Controllers\Admin\CareersController::class, 'getCareersPagination']);
Route::get('/admin/careers/del_icon/{id}',[App\Http\Controllers\Admin\CareersController::class, 'del_icon']);
Route::get('/admin/careers/status/{id}/{val}',[App\Http\Controllers\Admin\CareersController::class, 'status']);
 
 
 
 
 
  
 //Course PDF
Route::get('admin/coursepdf',[App\Http\Controllers\Admin\CoursePDFController::class, 'index']);
Route::get('admin/coursepdf/add',[App\Http\Controllers\Admin\CoursePDFController::class, 'create']);
Route::post('admin/coursepdf/save',[App\Http\Controllers\Admin\CoursePDFController::class, 'saveCoursePDF']); 
Route::get('/admin/coursepdf/edit/{id}',[App\Http\Controllers\Admin\CoursePDFController::class, 'edit']);
Route::post('/admin/coursepdf/editSaveCoursePDF/{id}',[App\Http\Controllers\Admin\CoursePDFController::class, 'editSaveCoursePDF']);
Route::get('/admin/coursepdf/delete/{id}',[App\Http\Controllers\Admin\CoursePDFController::class, 'delete']);
Route::get('/admin/coursepdf/get-coursepdf',[App\Http\Controllers\Admin\CoursePDFController::class, 'getCoursePDFPagination']);
Route::get('/admin/coursepdf/del_icon/{id}', [App\Http\Controllers\Admin\CoursePDFController::class, 'del_icon']);
 Route::get('/admin/coursepdf/status/{id}/{val}',[App\Http\Controllers\Admin\CoursePDFController::class, 'status']);
  Route::get('/admin/coursepdf/coursepdfstatus/{id}/{val}',[App\Http\Controllers\Admin\CoursePDFController::class, 'coursepdfstatus']);
 
 
//Home Slider
Route::get('admin/homeslider',[App\Http\Controllers\Admin\HomesliderController::class, 'index']);
Route::get('admin/homeslider/add',[App\Http\Controllers\Admin\HomesliderController::class, 'create']);
Route::post('admin/homeslider/save',[App\Http\Controllers\Admin\HomesliderController::class, 'saveHomeslider']); 
Route::get('/admin/homeslider/edit/{id}',[App\Http\Controllers\Admin\HomesliderController::class, 'edit']);
Route::post('/admin/homeslider/editSaveHomeslider/{id}',[App\Http\Controllers\Admin\HomesliderController::class, 'editSaveHomeslider']);
Route::get('/admin/homeslider/delete/{id}',[App\Http\Controllers\Admin\HomesliderController::class, 'delete']);
Route::get('/admin/homeslider/del_icon/{id}',[App\Http\Controllers\Admin\HomesliderController::class, 'del_icon']);
Route::get('/admin/homeslider/get-homeslider',[App\Http\Controllers\Admin\HomesliderController::class, 'getHomesliderPagination']);
Route::get('/admin/homeslider/status/{id}/{val}',[App\Http\Controllers\Admin\HomesliderController::class, 'status']);  

//Mobile Home Banner
Route::get('/admin/mobilebanner/get-mobilebanner',[App\Http\Controllers\Admin\HomesliderController::class, 'getmobilebannerPagination']);
Route::get('/admin/mobilebanner/edit/{id}',[App\Http\Controllers\Admin\HomesliderController::class, 'mobileBannerEdit']);
Route::post('/admin/mobilebanner/editMobilebanner/{id}',[App\Http\Controllers\Admin\HomesliderController::class, 'editMobilebanner']);
Route::get('/admin/mobilebanner/delete/{id}',[App\Http\Controllers\Admin\HomesliderController::class, 'deleteBanner']);
Route::get('/admin/mobilebanner/status/{id}/{val}',[App\Http\Controllers\Admin\HomesliderController::class, 'statusBanner']);
Route::get('/admin/mobilebanner/del_icon/{id}',[App\Http\Controllers\Admin\HomesliderController::class, 'del_icon_banner']);

 
 
 
 
 
Route::get('clear/clear-cache', function() {	
	
	$exitCode = Artisan::call('config:clear');
  //  $exitCode = Artisan::call('cache:clear');  
  
 
   $exitCode = Artisan::call('view:clear');
    return '<h1>Cache facade value cleared</h1>';
});
 
 

 
