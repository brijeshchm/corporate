
    <footer>
    <style>
     .cus_fb{
        background: #3A5999;
    }
    .cus_twi{
        background: #FE0000;
    }
    .cus_play{
         background: #3A5999;
    }
    .cus_linkd{
         background: #0D75A8;
    }
    .cus_insta{
        background: #FF0000;
    }
    
    </style>
    
    
<div class="top-main-footer"><div class="container"><div class="row"><div class="col-md-12">
    <div class="web-descrip"><div class="footer-logo"><a href="{{url('/')}}">
        <img src="{{asset('image/logo-academy.png')}}" alt="web logo" width="118" height="53">
</a></div><div class="description"><p>Our mission is to bridge the skills gap in the IT industry by offering hands-on, industry-relevant training designed by experts. Whether you're an individual looking to boost your career or a corporation aiming to upskill your workforce, we provide flexible learning paths and cutting-edge resources to ensure your success in the tech world. At Corporates Academy, we are dedicated to providing top-notch IT education and training to professionals and organizations looking to enhance their technical expertise. As a forward-thinking startup, we specialize in delivering comprehensive courses and certifications in software development, testing, project management, and more.</p>
 </div></div>

<div class="first-footer-main"><div class="footer-one-list"><strong>Certification Courses</strong>
<ul><?php $certificatecourse = App\Courses::select('title','slug','course_name')->where('status','1')->where('footer_certificate','1')->get(); 
if(!empty($certificatecourse)){ foreach($certificatecourse as $certificate){ ?>
<li><a href="{{url('courses/'.$certificate->slug)}}">{{$certificate->title}} </a></li><?php } } ?></ul></div>

<div class="second-footer-str"><strong>Top Courses</strong>

<ul><?php $coursesdetails = DB::table('web_courses as course');	
$coursesdetails= $coursesdetails->select('course.id as courseid','course.status','course.slug','course.title')->where('course.status','1')->where('course.footer_top_course',1)->limit(10)->orderby('course_name','ASC')->get(); 
if(!empty($coursesdetails)){ foreach($coursesdetails as $cfooter){
?><li><a href="{{url('courses/'.$cfooter->slug)}}">{{$cfooter->title}}</a></li>
<?php  } } ?>


</ul>

</div>

<div class="third-footer-mid"><strong>Trending Courses</strong>

<ul><?php $coursesdetails = DB::table('web_courses as course');	
$coursesdetails= $coursesdetails->select('course.id as courseid','course.status','course.slug','course.title')->where('course.status','1')->where('course.show_trending_courses',1)->limit(10)->orderby('course_name','ASC')->get(); 
if(!empty($coursesdetails)){ foreach($coursesdetails as $cfooter){
?><li><a href="{{url('courses/'.$cfooter->slug)}}">{{$cfooter->title}}</a></li>
<?php  } } ?>


</ul>
</div>



</div>


</div></div></div></div>
 



<div class="footer-bottom"><div class="container"><div class="row"><div class="col-md-12"><div class="footer-social">




</div></div></div>
</div>
</div>
 

</footer>


<footer class="footer">
   <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs mb-2">
                 <div class="foo_navs">
                    <h2 class="mb-3 pt-0">Students Zone</h2>  
                     <ul class="footerlist">
                         <li><a href="{{url('blog')}}" title="Blog">Blog</a></li>
                           <li><a href="{{url('placement')}}" title="Placement">Placement</a></li>
                            <li><a href="{{url('faq')}}" title="FAQ">FAQ's</a></li>
                            <li><a href="{{url('all-courses')}}" title="all-courses">Courses</a></li>
                        <!-- <li><a href="{{url('internship')}}" title="Internship">Internship</a></li>
                         <li><a href="{{url('tutorials')}}" title="Tutorials">Tutorials</a></li>-->
                         <li><a href="{{url('reviews')}}" title="Reviews">Reviews</a></li>
                          <li><a href="{{url('clients')}}" title="clients">Clients</a></li>
                        
                        <!-- <li><a href="{{url('interview-questions')}}" title="Interview Questions">Interview Questions</a></li>
                         <li><a href="{{url('online-training-courses')}}" title="Online Training">Online Training</a></li>
                         <li><a href="{{url('placed-students-list')}}" title="Placed Students List">Placed Students List</a></li>-->
						 
                     </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs mb-2">
                <div class="foo_navs pb-3">
                     <h2 class="mb-3 pt-0">Follow Us!</h2> 
                    <div class="footer_socialnav">
                        <ul class="footer_social_list">
                            <li><a href="" title="Facebook" rel="noreferrer" target="_blank" class="cus_fb"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="" title="Twitter" rel="noreferrer" target="_blank" class="cus_twi"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>                    
                            <li><a href="" title="Youtube" rel="noreferrer" target="_blank" class="cus_play"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/corporatelearningofficial/" title="Linkedin" rel="noreferrer" target="_blank" class="cus_linkd"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.instagram.com/corporatesacademyofficial/" title="Instagram" rel="noreferrer" target="_blank" class="cus_insta"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs mb-2">
                 <div class="foo_navs">
                    <h2 class="mb-3 pt-0">Company</h2>  
                     <ul class="footerlist">
                         <li><a href="{{url('about-us')}}" title="About Us">About Us</a></li>
                         
                         <li><a href="{{url('all-courses')}}" title="all-courses">Courses</a></li>
                         <li><a href="{{url('contact-us')}}" title="Contact Us">Contact Us</a></li>
                          <li><a href="{{url('careers')}}" title="Careers">Careers</a></li>
                         <li><a href="{{url('corporate')}}" title="Corporate Training">Corporate Training</a></li>
                           <li><a href="{{url('faq')}}" title="FAq">FAQ's</a></li>
                        
 
                         <li><a href="{{url('privacy-policy')}}" title="Privacy Policy">Privacy Policy</a></li>
                 
                        
                         <li><a href="{{url('terms-conditions')}}" title="Terms &amp; Conditions">Terms &amp; Conditions</a></li>
                         <li><a href="{{url('refund-cancellation-policy')}}" title="Refund/Cancellation Policy">Refund/Cancellation Policy</a></li>
                     </ul>
                </div>
			 
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs d-none">
                <div class="foo_navs">
				<h2 class="mb-3 pt-0">Locate Us!</h2>
                                  </div>
            </div>
        </div>   
       
             
    </div> 
	
	
<div class="footer-end"><div class="container"><ul class="w_terms"><li><a href="{{url('terms-conditions')}}" rel="nofollow" title="Terms of Use">Terms of Use</a></li><li><a href="{{url('privacy-policy')}}" rel="nofollow" title="Privacy Policy">Privacy Policy</a></li><li><a href="{{url('refund-cancellation-policy')}}" rel="nofollow" title="Refund Policy">Refund Policy</a></li><li class="copy_rights">© 2023-<?php echo date('Y');  ?> All Rights Reserved. The certification names are the trademarks of their respective owners.</li></ul> </div></div>



</footer>
<style>
.foo_navs h2 {
    color: #cac8c8;
    border-bottom: 1px solid #4c4a4a;
    padding-bottom: 5px;
    font-size: 18px;
}

.pt-0, .py-0 {
    padding-top: 0 !important;
}
.footerlist {
    padding: 0;
}

.footerlist li {
    display: inline-block;
    margin: 0 5px 5px 0;
}

.footerlist li a {
    font-size: 13px;
    color: #bdbaba;
    border-right: 1px solid #908d8d;
    padding: 0 5px 0 0;
    line-height: 20px;
    display: inline-block;
    transition: .5s;
    -webkit-transition: .5s;
}

.pb-3, .py-3 {
    padding-bottom: 1rem !important;
}

.foo_navs h2 {
    color: #cac8c8;
    border-bottom: 1px solid #4c4a4a;
    padding-bottom: 5px;
    font-size: 18px;
}

.footer_social_list {
    padding: 0;
    display: flex;
    width: 100%;
    align-items: center;
}

.footer_social_list>li {
    margin-right: 13px;
}

.footer_social_list>li>a {
  
    width: 35px;
    height: 35px;
    display: block;
    text-align: center;
    line-height: 35px;
    border-radius: 50%;
    font-size: 15px;
    color: #fff;
    transition: all .5s ease-in-out;
}

.foo_navs h2 {
    color: #cac8c8;
    border-bottom: 1px solid #4c4a4a;
    padding-bottom: 5px;
    font-size: 18px;
}

.footerlist {
    padding: 0;
}

.footerlist li {
    display: inline-block;
    margin: 0 5px 5px 0;
}

.footerlist li a {
    font-size: 13px;
    color: #bdbaba;
    border-right: 1px solid #908d8d;
    padding: 0 5px 0 0;
    line-height: 20px;
    display: inline-block;
    transition: .5s;
    -webkit-transition: .5s;
}
.row.footer_row {
    padding: 10px 0 0;
    margin-top: 15px;
    border-top: 1px solid #4b575e;
}



</style>

<style>
.country-footer .flex-fill:first-child {
    margin-left: 0;
}
.country-footer .flex-fill {
    padding: 0 15px;
    border-right: 1px solid #222;
    margin-left: 25px;
}
.flex-fill {
    -ms-flex: 1 1 auto !important;
    flex: 1 1 auto !important;
}
.country-footer .flex-fill .country-phone {
    padding-bottom: 23px;
    display: flex;
}
.country-footer .country-phone-summary {
    color: #fff;
    font-size: 13px;
    display: inline-block;
    line-height: 18px;
	margin-left: 11px;
}
.country-footer .country-phone-summary a {
    text-decoration: none;
    color: #fff;
    font-size: 13px;
}
</style>


 

<style>
 .w_terms {
    padding: 0;
    text-align: center;
}
.w_terms li {
    padding: 0;
    list-style: none;
    display: inline-block;
	color:#bdbaba;
}
 
.w_terms li a {
    padding: 0 3px;
    font-size: 14px;
    color: rgba(255,255,255,.5);
}
</style>

 
 
<section class="fixed-footer-patty hidden-xs" id="fixed-bottom-id">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="fixed-bottom-id-links">
                     
                     
                    <div class="fixed"><a href="https://wa.me/918800182225" target="_blank" aria-label="Whatsup"><i class="fa fa-whatsapp fa-fw" style="color:#14D73F"></i>+91-8800182225</a></div>
                    <div class="fixed"><a href="tel:+91-8800182225"><img src="{{asset('image/calls.png')}}" width="16" height="25" alt="rady to Call">+91-8800182225</a></div>
                     
                </div>
            </div>
        </div>
    </div>
</section>


<div class="whats-ap-cls whats-ap-cls--left whats-ap-cls--show whats-ap-cls--dialog" data-settings="{&quot;telephone&quot;:&quot;918800182225&quot;,&quot;message_text&quot;:&quot;Hello\n\nHow can help you Education?&quot;,&quot;message_delay&quot;:10000,&quot;message_badge&quot;:true,&quot;message_send&quot;:&quot;&quot;,&quot;mobile_only&quot;:false}">
    <div class="whats-ap-cls__button"><a href="https://wa.me/918800182225" target="_blank" aria-label="Whatsup"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" fill="currentColor"></path>
            </svg></a>
        <div class="whats-ap-cls__badge whats-ap-cls__badge--in">1</div>
    </div>
</div>
<section class="mobile-fixed-bottom-id"><div class="fixe">
<div class="request-call"><a href="tel:+918800182225"><i class="fa fa-phone-square"></i> Call us!</a></div> </div></section>
