@extends('site.layouts.app')
@section('title')
@if(!empty($coursesdetails->title))	 
 {{$coursesdetails->title}} 
@else
	India's No.1 IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection 
@section('keyword')
@if(!empty($coursesdetails->meta_keyword))
	{{$coursesdetails->meta_keyword}}
@else
	India's No.1 IT Training Institute, Best IT Training Institute, Best IT Training Institute in Noida, IT Training Institute in Delhi, IT Training Institute in Gurgaon
@endif
@endsection
@section('description')
@if(!empty($coursesdetails->meta_description))
{{$coursesdetails->meta_description}}
@else
	India's No.1 IT Training Institute in Noida, Delhi, Gurgaon for Industrial Training. We conducts IT Software, Hardware, Network and Security Courses training. 
@endif
@endsection
@section('content') 

<script type="application/ld+json"> { "@context": "http://schema.org/", "@type": "Review","itemReviewed": {"@type": "Course","name": "<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; }  ?>"  },"author": {"@type": "Person","name": "Amit" },"ReviewRating":{"@type":"AggregateRating","ratingValue":"<?php if(!empty($coursesdetails->rating)){ echo number_format((float)$coursesdetails->rating, 2, '.', ''); } ?>","ratingCount":"<?php if(!empty($coursesdetails->total_rating)){ echo $coursesdetails->total_rating; } ?>","bestRating":"5"},"publisher": {"@type": "Training","name": "Institute" }} 
</script>

<?php $htmlfaq=""; 
if(!empty($coursesdetails->FAQs)){  
    $FAQs =json_decode($coursesdetails->FAQs); 
    if(!empty($FAQs->faqq)){
        $faqquestion = unserialize($FAQs->faqq); 
        if(!empty($faqquestion)){	
            $faqanswer = unserialize($FAQs->faqa);								 
            for($i=0; $i<count($faqquestion); $i++){ 
                $htmlfaq .='{"@type":"Question","name":"'.(isset($faqquestion[$i])? $faqquestion[$i]:"").'","acceptedAnswer":{"@type":"Answer","text":"'. (isset($faqanswer[$i])? $faqanswer[$i]:"").'\n"}},'; 
            } 
        } 
    } 
} ?>

<script type="application/ld+json"> { "@context": "https://schema.org", "@type": "FAQPage", "mainEntity": [<?php echo $htmlfaq ?>] } </script>

<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

<style>
:root {
    --primary: #1b75bc;
    --primary-dark: #0f4f82;
    --primary-light: #e8f3fc;
    --accent: #ff6b35;
    --accent2: #ffc436;
    --dark: #0d1b2a;
    --dark2: #1a2d42;
    --text: #2c3e50;
    --muted: #64748b;
    --light: #f8fafc;
    --white: #ffffff;
    --border: #e2e8f0;
    --success: #10b981;
    --radius: 16px;
    --radius-sm: 8px;
    --shadow: 0 4px 24px rgba(27,117,188,0.10);
    --shadow-lg: 0 12px 48px rgba(27,117,188,0.18);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
    font-family: 'DM Sans', sans-serif;
    background: var(--light);
    color: var(--text);
    overflow-x: hidden;
}

/* ===== ANIMATIONS ===== */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(32px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes fadeIn {
    from { opacity: 0; }
    to   { opacity: 1; }
}
@keyframes slideRight {
    from { opacity: 0; transform: translateX(-32px); }
    to   { opacity: 1; transform: translateX(0); }
}
@keyframes pulse-ring {
    0%   { transform: scale(1); opacity: 0.8; }
    100% { transform: scale(1.6); opacity: 0; }
}
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50%       { transform: translateY(-12px); }
}
@keyframes shimmer {
    0%   { background-position: -200% center; }
    100% { background-position: 200% center; }
}
@keyframes countUp {
    from { opacity: 0; transform: scale(0.7); }
    to   { opacity: 1; transform: scale(1); }
}
@keyframes borderPulse {
    0%, 100% { border-color: var(--primary); }
    50%       { border-color: var(--accent); }
}
@keyframes gradientShift {
    0%   { background-position: 0% 50%; }
    50%  { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
@keyframes spin-slow {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
}

.animate-fadeup  { animation: fadeUp 0.7s ease both; }
.animate-fadein  { animation: fadeIn 0.6s ease both; }
.animate-slide   { animation: slideRight 0.7s ease both; }
.delay-1 { animation-delay: 0.1s; }
.delay-2 { animation-delay: 0.2s; }
.delay-3 { animation-delay: 0.3s; }
.delay-4 { animation-delay: 0.4s; }
.delay-5 { animation-delay: 0.5s; }

/* ===== HERO / BANNER ===== */
.course-banner {
    background: linear-gradient(135deg, var(--dark) 0%, var(--dark2) 40%, #0f3460 100%);
    background-size: 300% 300%;
    animation: gradientShift 8s ease infinite;
    padding: 80px 0 60px;
    position: relative;
    overflow: hidden;
}

.course-banner::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%231b75bc' fill-opacity='0.06'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    pointer-events: none;
}

.course-banner::after {
    content: '';
    position: absolute;
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(27,117,188,0.15) 0%, transparent 70%);
    top: -100px; right: -100px;
    border-radius: 50%;
    pointer-events: none;
}

.banner-container { max-width: 1200px; margin: 0 auto; padding: 0 24px; position: relative; z-index: 2; }

.breadcrumbs {
    font-size: 13px;
    color: rgba(255,255,255,0.55);
    margin-bottom: 24px;
    animation: fadeIn 0.5s ease both;
}
.breadcrumbs a { color: rgba(255,255,255,0.7); text-decoration: none; }
.breadcrumbs a:hover { color: var(--accent2); }
.breadcrumbs span { margin: 0 6px; }

.banner-grid {
    display: grid;
    grid-template-columns: 1fr 420px;
    gap: 48px;
    align-items: center;
}

.banner-left h2 {
    
    font-size: clamp(10px, 4vw, 24px);
    font-weight: 800;
    color: #fff;
    line-height: 1.15;
    margin-bottom: 16px;
    animation: fadeUp 0.7s ease both;
}

.banner-left .sub-title {
    font-size: 16px;
    color: rgba(255,255,255,0.75);
    line-height: 1.7;
    margin-bottom: 28px;
    animation: fadeUp 0.7s ease 0.1s both;
}

/* USP chips */
.usp-chips {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 32px;
    animation: fadeUp 0.7s ease 0.2s both;
}
.usp-chip {
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.15);
    color: #fff;
    font-size: 13px;
    font-weight: 500;
    padding: 7px 14px;
    border-radius: 40px;
    backdrop-filter: blur(6px);
    transition: all 0.3s;
}
.usp-chip:hover {
    background: rgba(27,117,188,0.35);
    border-color: var(--primary);
    transform: translateY(-2px);
}
.usp-chip .chip-icon { color: var(--accent2); margin-right: 5px; }

/* Rating */
.rating-row {
    display: flex;
    align-items: center;
    gap: 12px;
    animation: fadeUp 0.7s ease 0.3s both;
}
.stars { color: var(--accent2); font-size: 18px; letter-spacing: 2px; }
.rating-val {
    font-family: 'Syne', sans-serif;
    font-size: 20px;
    font-weight: 700;
    color: #fff;
}
.rating-label { font-size: 13px; color: rgba(255,255,255,0.55); }

/* Banner right - image card */
.banner-right {
    animation: fadeUp 0.7s ease 0.25s both;
}
.course-img-card {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: var(--radius);
    overflow: hidden;
    backdrop-filter: blur(10px);
    position: relative;
    box-shadow: var(--shadow-lg);
    transition: transform 0.4s;
}
.course-img-card:hover { transform: translateY(-6px); }
.course-img-card img { width: 100%; height: 260px; object-fit: cover; display: block; }
.play-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(13,27,42,0.35);
    cursor: pointer;
    transition: background 0.3s;
}
.play-overlay:hover { background: rgba(13,27,42,0.55); }
.play-btn {
    width: 60px; height: 60px;
    background: var(--primary);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 22px;
    position: relative;
}
.play-btn::before, .play-btn::after {
    content: '';
    position: absolute;
    width: 100%; height: 100%;
    border-radius: 50%;
    border: 2px solid var(--primary);
    animation: pulse-ring 1.8s ease-out infinite;
}
.play-btn::after { animation-delay: 0.9s; }

/* Stats bar below banner */
.stats-bar {
    background: var(--white);
    border-bottom: 1px solid var(--border);
    padding: 0;
    box-shadow: 0 4px 16px rgba(0,0,0,0.06);
}
.stats-inner {
    max-width: 1200px; margin: 0 auto; padding: 0 24px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
}
.stat-item {
    padding: 20px 24px;
    text-align: center;
    border-right: 1px solid var(--border);
    animation: countUp 0.6s ease both;
}
.stat-item:last-child { border-right: none; }
.stat-num {
    font-family: 'Syne', sans-serif;
    font-size: 30px;
    font-weight: 800;
    color: var(--primary);
    line-height: 1;
}
.stat-num span { color: var(--accent); }
.stat-label { font-size: 12px; color: var(--muted); margin-top: 4px; }

/* Partner logos strip */
.partners-strip {
    background: #fff;
    padding: 14px 0;
    border-bottom: 1px solid var(--border);
}
.partners-inner {
    max-width: 1200px; margin: 0 auto; padding: 0 24px;
    display: flex; align-items: center; gap: 32px; flex-wrap: wrap;
}
.partners-label { font-size: 12px; color: var(--muted); font-weight: 500; white-space: nowrap; }
.partner-logos { display: flex; gap: 28px; align-items: center; flex-wrap: wrap; }
.partner-logos img { height: 32px; object-fit: contain; filter: grayscale(1) opacity(0.5); transition: all 0.3s; }
.partner-logos img:hover { filter: grayscale(0) opacity(1); transform: scale(1.08); }

/* ===== NAV STICKY ===== */
.nav-items {
    position: sticky;
    top: 0;
    z-index: 999;
    background: var(--white);
    border-bottom: 2px solid var(--border);
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}
.items-container {
    max-width: 1200px; margin: 0 auto; padding: 0 24px;
    display: flex; align-items: center; gap: 4px; overflow-x: auto;
}
.items-container::-webkit-scrollbar { height: 0; }
.navs {
    color: var(--muted);
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 500;
    padding: 16px 18px;
    white-space: nowrap;
    border-bottom: 3px solid transparent;
    transition: all 0.2s;
    display: inline-block;
}
.navs:hover, .navs.active {
    color: var(--primary);
    border-bottom-color: var(--primary);
}
.items-container .enroll {
    margin-left: auto;
    background: var(--primary);
    color: #fff !important;
    padding: 9px 22px;
    border-radius: 40px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    white-space: nowrap;
    transition: all 0.3s;
    animation: borderPulse 2s infinite;
}
.items-container .enroll:hover { background: var(--primary-dark); transform: scale(1.04); }

/* ===== MAIN LAYOUT ===== */
.main-content {
    max-width: 1200px; margin: 0 auto; padding: 40px 24px;
    display: flex;
    gap: 32px;
    align-items: flex-start;
}
.content-left { flex: 1; min-width: 0; }

/* ===== SECTION TITLE ===== */
.sec-title {
    font-family: 'Syne', sans-serif;
    font-size: 24px;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 6px;
    position: relative;
    display: inline-block;
}
.sec-title::after {
    content: '';
    position: absolute;
    bottom: -4px; left: 0;
    width: 48px; height: 3px;
    background: linear-gradient(90deg, var(--primary), var(--accent));
    border-radius: 2px;
}
.sec-subtitle { font-size: 14px; color: var(--muted); margin-bottom: 24px; margin-top: 10px; }

/* ===== ABOUT SECTION ===== */
.about-section { margin-bottom: 32px; }
.about-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
}
.about-card-header {
    padding: 16px 24px;
    background: linear-gradient(135deg, var(--primary-light), #fff);
    border-bottom: 1px solid var(--border);
    cursor: pointer;
    display: flex; justify-content: space-between; align-items: center;
    transition: background 0.3s;
}
.about-card-header:hover { background: linear-gradient(135deg, #d4eaf9, #fff); }
.about-card-header h2 {
    font-family: 'Syne', sans-serif;
    font-size: 17px; font-weight: 700; color: var(--primary);
    margin: 0;
}
.about-card-header .toggle-icon { color: var(--primary); font-size: 18px; transition: transform 0.3s; }
.about-card-body { padding: 20px 24px; font-size: 14.5px; line-height: 1.8; color: var(--text); }
.about-card-body ul { padding-left: 20px; }
.about-card-body li { margin-bottom: 8px; }
.about-card-body p { margin-bottom: 10px; }

/* ===== COURSE CONTENT ===== */
.course-content-section { margin-bottom: 32px; }
.curriculum-header {
    display: flex; justify-content: space-between; align-items: center;
    margin-bottom: 20px; flex-wrap: wrap; gap: 12px;
}
.curriculum-header h3 {
    font-family: 'Syne', sans-serif;
    font-size: 19px; font-weight: 700; color: var(--dark);
}
.btn-download {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 40px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    display: flex; align-items: center; gap: 8px;
    transition: all 0.3s;
    box-shadow: 0 4px 14px rgba(27,117,188,0.3);
}
.btn-download:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(27,117,188,0.4); }

/* Accordion */
.accordion-item {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    margin-bottom: 8px;
    overflow: hidden;
    transition: box-shadow 0.3s;
}
.accordion-item:hover { box-shadow: var(--shadow); }
.accordion-btn {
    width: 100%;
    background: none;
    border: none;
    padding: 15px 20px;
    text-align: left;
    display: flex; justify-content: space-between; align-items: center;
    cursor: pointer;
    font-family: 'DM Sans', sans-serif;
    font-size: 14.5px;
    font-weight: 600;
    color: var(--dark);
    transition: background 0.2s;
}
.accordion-btn:hover { background: var(--primary-light); }
.accordion-btn .acc-icon { color: var(--primary); font-size: 16px; transition: transform 0.3s; flex-shrink: 0; }
.accordion-btn.open .acc-icon { transform: rotate(45deg); }
.accordion-body {
    padding: 0 20px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease, padding 0.3s;
}
.accordion-body.open { max-height: 800px; padding: 12px 20px 16px; }
.accordion-body ul { list-style: none; padding: 0; }
.accordion-body > ul > li {
    padding: 7px 0;
    border-bottom: 1px solid #f1f5f9;
    font-size: 14px;
    color: var(--text);
    display: flex; align-items: flex-start; gap: 8px;
}
.accordion-body > ul > li::before { content: '▶'; color: var(--primary); font-size: 9px; margin-top: 4px; flex-shrink: 0; }
.accordion-body > ul > li:last-child { border-bottom: none; }
.accordion-body ul ul { padding-left: 20px; margin-top: 6px; }
.accordion-body ul ul li { font-size: 13px; color: var(--muted); }
.accordion-body ul ul li::before { content: '◦'; color: var(--accent); font-size: 11px; }
.accordion-body ul ul ul li::before { content: '–'; color: var(--muted); }

/* ===== CERTIFICATE ===== */
.certificate-section {
    background: linear-gradient(135deg, #fff 60%, var(--primary-light));
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 28px;
    margin-bottom: 24px;
    box-shadow: var(--shadow);
}
.cert-grid { display: grid; grid-template-columns: 1fr auto; gap: 24px; align-items: center; }
.cert-features { display: flex; flex-direction: column; gap: 10px; margin-top: 16px; }
.cert-feat {
    display: flex; align-items: flex-start; gap: 10px;
    font-size: 13.5px; color: var(--text); line-height: 1.5;
}
.cert-feat-icon {
    width: 22px; height: 22px;
    background: var(--primary);
    color: #fff;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 11px;
    flex-shrink: 0;
    margin-top: 1px;
}
.cert-img {
    width: 160px;
    border-radius: var(--radius-sm);
    box-shadow: var(--shadow-lg);
    animation: float 4s ease-in-out infinite;
}

/* ===== PLACEMENT ===== */
.placement-section { margin-bottom: 24px; }
.placement-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.place-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 22px;
    box-shadow: var(--shadow);
    transition: all 0.3s;
    position: relative;
    overflow: hidden;
}
.place-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 4px; height: 100%;
    background: linear-gradient(180deg, var(--primary), var(--accent));
}
.place-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.place-top {
    display: flex; align-items: center; gap: 14px;
    margin-bottom: 14px;
}
.place-avatar {
    width: 50px; height: 50px;
    border-radius: 50%;
    border: 3px solid var(--primary-light);
    object-fit: cover;
}
.place-badge {
    background: linear-gradient(135deg, #10b981, #059669);
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 20px;
    letter-spacing: 0.5px;
}
.place-name { font-weight: 700; font-size: 15px; color: var(--dark); margin-bottom: 2px; }
.place-company { font-size: 12px; color: var(--primary); font-weight: 600; }
.place-text { font-size: 13px; color: var(--muted); line-height: 1.6; }

/* ===== FAQ ===== */
.faq-section { margin-bottom: 24px; }
.faq-item {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    margin-bottom: 8px;
    overflow: hidden;
    transition: box-shadow 0.3s;
}
.faq-item:hover { box-shadow: var(--shadow); }
.faq-btn {
    width: 100%;
    background: none;
    border: none;
    padding: 16px 20px;
    text-align: left;
    display: flex; justify-content: space-between; align-items: center;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    color: var(--dark);
    font-family: 'DM Sans', sans-serif;
    transition: background 0.2s;
}
.faq-btn:hover { background: var(--primary-light); }
.faq-icon { color: var(--primary); font-size: 18px; transition: transform 0.3s; flex-shrink: 0; }
.faq-btn.open .faq-icon { transform: rotate(45deg); }
.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease, padding 0.3s;
    font-size: 14px;
    color: var(--muted);
    line-height: 1.7;
    padding: 0 20px;
}
.faq-answer.open { max-height: 300px; padding: 4px 20px 16px; }

/* ===== TESTIMONIALS ===== */
.testimonials-section { margin-bottom: 24px; }
.testimonials-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; }
.testi-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 24px;
    box-shadow: var(--shadow);
    transition: all 0.3s;
    position: relative;
}
.testi-card::after {
    content: '"';
    position: absolute;
    top: 12px; right: 20px;
    font-size: 72px;
    color: var(--primary-light);
    font-family: Georgia, serif;
    line-height: 1;
    pointer-events: none;
}
.testi-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.testi-quote { font-size: 14px; color: var(--text); line-height: 1.7; margin-bottom: 18px; font-style: italic; }
.testi-bottom { display: flex; align-items: center; gap: 12px; }
.testi-avatar {
    width: 44px; height: 44px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--primary-light);
}
.testi-name { font-weight: 700; font-size: 14px; color: var(--dark); }
.testi-role { font-size: 12px; color: var(--muted); }

/* ===== WHY CHOOSE ===== */
.why-section {
    background: linear-gradient(135deg, var(--dark), var(--dark2));
    padding: 72px 0;
    position: relative;
    overflow: hidden;
    margin: 0 0 0;
}
.why-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%231b75bc' fill-opacity='0.06'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.why-inner { max-width: 1200px; margin: 0 auto; padding: 0 24px; position: relative; z-index: 2; }
.why-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center; }
.why-left h2 {
    font-family: 'Syne', sans-serif;
    font-size: clamp(26px, 3.5vw, 38px);
    font-weight: 800;
    color: #fff;
    line-height: 1.2;
    margin-bottom: 20px;
}
.why-left h2 span { color: var(--accent2); }
.why-left p { font-size: 15px; color: rgba(255,255,255,0.65); line-height: 1.7; margin-bottom: 28px; }
.why-list { list-style: none; padding: 0; display: flex; flex-direction: column; gap: 12px; }
.why-list li {
    display: flex; align-items: center; gap: 12px;
    color: rgba(255,255,255,0.85);
    font-size: 14.5px;
}
.why-list li .check {
    width: 22px; height: 22px;
    background: var(--success);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 12px;
    color: #fff;
    flex-shrink: 0;
}
.why-right { position: relative; }
.why-img-stack { position: relative; height: 420px; }
.why-img-1 {
    position: absolute;
    width: 65%; border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    top: 40px; left: 0;
    animation: float 5s ease-in-out infinite;
}
.why-img-2 {
    position: absolute;
    width: 55%; border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    top: 0; right: 0;
    animation: float 5s ease-in-out infinite 1.5s;
}
.why-img-3 {
    position: absolute;
    width: 50%; border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    bottom: 0; right: 5%;
    animation: float 5s ease-in-out infinite 3s;
}

/* ===== SYSTEM APPROACH SECTIONS ===== */
.approach-section { padding: 64px 0; }
.approach-section:nth-child(odd) { background: #fff; }
.approach-section:nth-child(even) { background: var(--light); }
.approach-inner { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
.approach-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; }
.approach-grid.reverse { direction: rtl; }
.approach-grid.reverse > * { direction: ltr; }
.approach-img-box {
    position: relative;
    border-radius: var(--radius);
    overflow: hidden;
}
.approach-img-box img {
    width: 100%;
    border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    transition: transform 0.5s;
}
.approach-img-box:hover img { transform: scale(1.04); }
.approach-tag {
    position: absolute;
    top: 16px; left: 16px;
    background: var(--primary);
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 20px;
    letter-spacing: 0.5px;
}
.approach-content h3 {
    font-family: 'Syne', sans-serif;
    font-size: 26px; font-weight: 700; color: var(--dark);
    margin-bottom: 8px;
    position: relative;
    display: inline-block;
}
.approach-content h3::after {
    content: '';
    position: absolute;
    bottom: -4px; left: 0;
    width: 40px; height: 3px;
    background: linear-gradient(90deg, var(--primary), var(--accent));
    border-radius: 2px;
}
.approach-content p { font-size: 14px; color: var(--muted); line-height: 1.7; margin-top: 16px; margin-bottom: 20px; }
.approach-list { list-style: none; padding: 0; display: flex; flex-direction: column; gap: 10px; }
.approach-list li {
    display: flex; align-items: flex-start; gap: 10px;
    font-size: 14px; color: var(--text); line-height: 1.6;
}
.approach-list li .li-num {
    width: 22px; height: 22px;
    background: var(--primary-light);
    color: var(--primary);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 11px; font-weight: 700;
    flex-shrink: 0;
}

/* ===== PARTNERS ===== */
.partners-section {
    background: linear-gradient(135deg, var(--dark), var(--dark2));
    padding: 72px 0;
}
.partners-inner-full { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
.partners-grid { display: grid; grid-template-columns: 1fr 2fr; gap: 64px; align-items: center; }
.partners-left h2 {
    font-family: 'Syne', sans-serif;
    font-size: clamp(24px, 3vw, 34px);
    font-weight: 800;
    color: #fff;
    line-height: 1.2;
    margin-bottom: 16px;
}
.partners-left h2 span { color: var(--accent2); }
.partners-left p { font-size: 14px; color: rgba(255,255,255,0.6); line-height: 1.7; }
.partners-stat {
    margin-top: 20px;
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: var(--radius-sm);
    padding: 16px 20px;
    display: inline-block;
}
.partners-stat strong { font-family: 'Syne', sans-serif; font-size: 28px; color: var(--accent2); display: block; }
.partners-stat span { font-size: 13px; color: rgba(255,255,255,0.6); }
.partners-logos-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 16px;
}
.partner-logo-box {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: var(--radius-sm);
    padding: 16px;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.3s;
}
.partner-logo-box:hover {
    background: rgba(255,255,255,0.15);
    border-color: var(--primary);
    transform: translateY(-3px);
}
.partner-logo-box img { height: 32px; object-fit: contain; filter: brightness(10); opacity: 0.65; transition: opacity 0.3s; }
.partner-logo-box:hover img { opacity: 1; }

/* ===== RELATED PROGRAMS ===== */
.related-section { padding: 64px 0; background: var(--light); }
.related-inner { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
.related-title {
    font-family: 'Syne', sans-serif;
    font-size: 26px; font-weight: 700; color: var(--dark);
    margin-bottom: 6px;
}
.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 16px;
    margin-top: 24px;
}
.related-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 20px 12px;
    text-align: center;
    text-decoration: none;
    color: var(--text);
    transition: all 0.3s;
    display: flex; flex-direction: column; align-items: center; gap: 10px;
}
.related-card:hover {
    border-color: var(--primary);
    transform: translateY(-4px);
    box-shadow: var(--shadow);
    color: var(--primary);
}
.related-card img { width: 44px; height: 44px; object-fit: contain; }
.related-card span { font-size: 12px; font-weight: 600; }

/* ===== ENQUIRY FORM SIDEBAR ===== */
.sidebar-col {
    width: 360px;
    flex-shrink: 0;
    align-self: flex-start;
    position: sticky;
    top: 72px;
    max-height: calc(100vh - 90px);
    overflow-y: auto;
    scrollbar-width: none;
}
.sidebar-col::-webkit-scrollbar { display: none; }

.enquiry-sticky {
    position: static;
}
.enq-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
}
.enq-card-header {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    padding: 20px 24px;
    text-align: center;
}
.enq-card-header h3 {
    font-family: 'Syne', sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 4px;
}
.enq-card-header p { font-size: 13px; color: rgba(255,255,255,0.7); }
.enq-card-body { padding: 20px 20px; }
.enq-card-body form { display: flex; flex-direction: column; gap: 12px; }
.enq-card-body input,
.enq-card-body textarea {
    width: 100%;
    padding: 11px 14px;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    color: var(--text);
    background: var(--light);
    transition: border-color 0.2s;
    outline: none;
}
.enq-card-body input:focus,
.enq-card-body textarea:focus { border-color: var(--primary); background: #fff; }
.enq-card-body textarea { min-height: 80px; resize: vertical; }
.enq-submit {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: #fff;
    border: none;
    padding: 13px;
    border-radius: var(--radius-sm);
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    font-family: 'Syne', sans-serif;
    letter-spacing: 0.5px;
    transition: all 0.3s;
    box-shadow: 0 4px 14px rgba(27,117,188,0.3);
}
.enq-submit:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(27,117,188,0.4); }
.enq-note { font-size: 11.5px; color: var(--muted); text-align: center; }

/* phone code layout */
.code-phone { position: relative; }
.code-drop-down { display: flex; gap: 8px; }
.arrow-frm { width: 110px; position: relative; }
.arrow-frm input { padding-right: 8px; }
.pne-div { flex: 1; }
.pne-div::after {
    content: '';
    position: absolute;
    background: var(--primary);
    width: 1px; height: 55%;
    top: 50%; transform: translateY(-50%);
    left: 0;
}
.append_countryCode, .appCountryCode {
    position: absolute;
    z-index: 10;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    width: 200px;
    max-height: 200px;
    overflow-y: auto;
    top: 100%;
    left: 0;
    box-shadow: var(--shadow);
}
.resetData { display: none; }

/* ===== POPUP MODALS ===== */
.popup-class-div .modal-content { border-radius: var(--radius); border: none; box-shadow: var(--shadow-lg); overflow: hidden; }
.popup-class-div .modal-body { padding: 0; display: flex; }
.mdlImg { width: 40%; background: var(--primary-light); display: flex; align-items: center; justify-content: center; padding: 20px; }
.mdlImg img { max-width: 100%; border-radius: var(--radius-sm); }
.mdl-field-frm { flex: 1; padding: 28px 24px; }
.mdl-field-frm .frm-hdg { margin-bottom: 18px; }
.mdl-field-frm h4 { font-family: 'Syne', sans-serif; font-size: 18px; font-weight: 700; color: var(--dark); }
.mdl-field-frm input,
.mdl-field-frm textarea {
    width: 100%; padding: 10px 14px; margin-bottom: 10px;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    font-size: 14px; font-family: 'DM Sans', sans-serif;
    outline: none; transition: border-color 0.2s;
}
.mdl-field-frm input:focus,
.mdl-field-frm textarea:focus { border-color: var(--primary); }
.modal-placement-button {
    width: 100%;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: #fff; border: none;
    padding: 12px; border-radius: var(--radius-sm);
    font-size: 15px; font-weight: 600;
    cursor: pointer; font-family: 'Syne', sans-serif;
    transition: all 0.3s;
}
.modal-placement-button:hover { transform: translateY(-2px); }
.close { background: none; border: none; font-size: 22px; cursor: pointer; color: var(--muted); }

/* ===== SECTION WRAPPER ===== */
.section-wrap {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 28px;
    margin-bottom: 24px;
    box-shadow: var(--shadow);
}
.section-wrap .sec-title { display: block; margin-bottom: 18px; }

/* ===== RESPONSIVE ===== */
@media (max-width: 1024px) {
    .banner-grid { grid-template-columns: 1fr; }
    .banner-right { display: none; }
    .main-content { flex-direction: column; }
    .sidebar-col { width: 100%; position: static; max-height: none; overflow-y: visible; }
    .why-grid, .approach-grid, .partners-grid { grid-template-columns: 1fr; gap: 32px; }
    .why-img-stack { height: 280px; }
    .cert-grid { grid-template-columns: 1fr; }
    .cert-img { display: none; }
    .placement-cards { grid-template-columns: 1fr; }
    .partners-logos-grid { grid-template-columns: repeat(3, 1fr); }
}

@media (max-width: 640px) {
    .stats-inner { grid-template-columns: 1fr; }
    .stat-item { border-right: none; border-bottom: 1px solid var(--border); }
    .related-grid { grid-template-columns: repeat(3, 1fr); }
    .partners-logos-grid { grid-template-columns: repeat(2, 1fr); }
    .usp-chips { gap: 6px; }
    .approach-grid.reverse { direction: ltr; }
}

/* Scroll reveal */
.reveal {
    opacity: 0;
    transform: translateY(28px);
    transition: opacity 0.7s ease, transform 0.7s ease;
}
.reveal.visible {
    opacity: 1;
    transform: translateY(0);
}
</style>

<!-- ==================== HERO BANNER ==================== -->
<section class="course-banner">
    <div class="banner-container">
        <div class="breadcrumbs animate-fadein">
            <a href="{{ url('/') }}">Home</a>
            <span>/</span>
            <a href="{{ url('all-courses') }}">All Courses</a>
            <span>/</span>
            <?php if(!empty($coursesdetails->title)){ echo $coursesdetails->title; } ?>
        </div>

        <div class="banner-grid">
            <div class="banner-left">
                <h2><?php if(!empty($coursesdetails->title)){ echo $coursesdetails->title; } ?></h2>
                <div class="sub-title">
                    <?php if(!empty($coursesdetails->sub_title)){ echo $coursesdetails->sub_title; } ?>
                    <?php if(!empty($coursesdetails->course_defination)){ echo $coursesdetails->course_defination; } ?>
                </div>

                <div class="usp-chips">
                    <div class="usp-chip"><span class="chip-icon">🏆</span> Guaranteed Interview Calls</div>
                    <div class="usp-chip"><span class="chip-icon">👤</span> One to One Doubt Session</div>
                    <div class="usp-chip"><span class="chip-icon">✅</span> Trainer Satisfaction</div>
                    <div class="usp-chip"><span class="chip-icon">⚡</span> Industry Expert Trainers</div>
                </div>

                <div class="rating-row">
                    <?php if(!empty($coursesdetails->rating)){
                        $rating=$coursesdetails->rating;
                        $fullStars = floor($rating);
                        $halfStar = ($rating - $fullStars) >= 0.4 ? 1 : 0;
                        echo '<div class="stars">';
                        for($s=0; $s<$fullStars; $s++) echo '★';
                        if($halfStar) echo '½';
                        echo '</div>';
                    } ?>
                    <span class="rating-val"><?php if(!empty($coursesdetails->rating)){ echo $coursesdetails->rating; } ?></span>
                    <span class="rating-label">Rating</span>
                </div>
            </div>

            <div class="banner-right">
                <div class="course-img-card vdoFrmPopupModal" data-title="" data-button="UNLOCK VIDEO">
                    @if(isset($coursesdetails) && $coursesdetails->course_image !='')
                        <?php $vimage = unserialize($coursesdetails->course_image); ?>
                        <img src="{{asset('public/'.$vimage['course_image']['src'])}}" alt="{{$vimage['course_image']['alt']}}">
                    @else
                        <img src="{{asset('public/image/course-default.jpg')}}" alt="Course Image">
                    @endif
                    <div class="play-overlay">
                        <div class="play-btn">▶</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STATS BAR -->
<div class="stats-bar">
    <div class="stats-inner">
        <div class="stat-item reveal">
            <div class="stat-num">IBM <span>✓</span></div>
            <div class="stat-label">Certified Capstone</div>
        </div>
        <div class="stat-item reveal delay-1">
            <div class="stat-num"><span>175%</span></div>
            <div class="stat-label">Average Salary Hike</div>
        </div>
        <div class="stat-item reveal delay-2">
            <div class="stat-num">35K<span>+</span></div>
            <div class="stat-label">Trusted Learners</div>
        </div>
    </div>
</div>

<!-- PARTNERS STRIP -->
<div class="partners-strip">
    <div class="partners-inner">
        <span class="partners-label">HIRING PARTNERS</span>
        <div class="partner-logos">
            <img src="{{asset('public/image/partners/infosys.png')}}" alt="Infosys">
            <img src="{{asset('public/image/partners/tech-mahindra.png')}}" alt="Tech Mahindra">
            <img src="{{asset('public/image/partners/magic-software.png')}}" alt="Magic Software">
            <img src="{{asset('public/image/partners/wipro.png')}}" alt="Wipro">
            <img src="{{asset('public/image/partners/HCL.png')}}" alt="HCL">
        </div>
    </div>
</div>

<!-- ==================== STICKY NAV ==================== -->
<section class="nav-items" id="nav-items">
    <div class="items-container">
        <a class="navs" href="#aboutsid">About</a>
        <a class="navs" href="#courseContentId">Course Contents</a>
        <a class="navs" href="#certificateId">Certificate</a>
        <a class="navs" href="#faqsid">FAQs</a>
        <a class="navs" href="#testimonialsId">Testimonials</a>
        <a class="navs" href="#placementId">Placement</a>
        <a href="#0" class="enroll frmModalPopup" data-title="ENROLL NOW" data-button="ENROLL NOW">🚀 Enroll Now</a>
    </div>
</section>

<!-- ==================== MAIN CONTENT + SIDEBAR ==================== -->
<div class="main-content">
    <div class="content-left">

        <!-- ABOUT -->
        <div class="about-section section-wrap reveal" id="aboutsid">
            <span class="sec-title">About This Course</span>
            <p class="sec-subtitle">Everything you need to know before you start</p>

            <?php if(!empty($aboutHeading)){ $i=0; $i++; ?>
            <div class="about-card">
                <div class="about-card-header" onclick="toggleAbout(this)">
                    <h2>{!!$aboutHeading->heading!!}</h2>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="about-card-body">
                    @if($aboutHeading->courseabout)
                    <li style="font-size:13.5px">{!!str_replace('?','',$aboutHeading->courseabout)!!}</li>
                    @endif
                    @if($aboutHeading->paragraph1)<p><?php echo str_replace('?','',$aboutHeading->paragraph1); ?></p>@endif
                    @if($aboutHeading->paragraph2)<p>{!! str_replace('?','',$aboutHeading->paragraph2) !!}</p>@endif
                    @if($aboutHeading->paragraph3)<p>{!! str_replace('?','',$aboutHeading->paragraph3) !!}</p>@endif
                    @if($aboutHeading->paragraph4)<p>{!! str_replace('?','',$aboutHeading->paragraph4) !!}</p>@endif
                    @if($aboutHeading->paragraph5)<p>{!! str_replace('?','',$aboutHeading->paragraph5) !!}</p>@endif
                    @if(!empty($aboutHeading->paragraph6))<p>{!! str_replace('?','',$aboutHeading->paragraph6) !!}</p>@endif
                </div>
            </div>
            <?php } ?>
        </div>

        <!-- COURSE CONTENT -->
        <div class="course-content-section section-wrap reveal" id="courseContentId">
            <div class="curriculum-header">
                <div>
                    <span class="sec-title">Course Content</span>
                    <p class="sec-subtitle"><?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?> Syllabus</p>
                </div>
                <button class="btn-download dwnCrcm" data-title="Download Curriculum" data-button="UNLOCK CURRICULUM">
                    ⬇ Download Syllabus
                </button>
            </div>

            <?php if(!empty($coursecurriculum)){ $i=0; foreach($coursecurriculum as $course){ $i++; ?>
            <div class="accordion-item">
                <button class="accordion-btn" onclick="toggleAcc(this)">
                    <span><?php echo str_replace('?','',$course->heading); ?></span>
                    <span class="acc-icon">+</span>
                </button>
                <div class="accordion-body <?php if($i==1) echo 'open'; ?>">
                    <?php
                    $contents = App\CourseCurriculumExcel::where('heading_id',$course->id)->get();
                    if($contents){ foreach($contents as $content){ ?>
                    <ul>
                        <li><?php echo str_replace('?','',$content->coursescontent); ?>
                            <?php $subcontents = App\CourseCurriculumExcel::where('content_id',$content->id)->get();
                            if($subcontents){ foreach($subcontents as $sub){ ?>
                            <ul>
                                <li><?php echo str_replace('?','',$sub->subcontent); ?>
                                    <?php $lastcontents = App\CourseCurriculumExcel::where('subcontent_id',$sub->id)->get();
                                    if($lastcontents){ foreach($lastcontents as $last){ ?>
                                    <ul>
                                        <li><?php echo str_replace('?','',$last->lastcontent); ?>
                                            <?php $courseEndContent = App\CourseCurriculumExcel::where('endcontent_id',$last->id)->get();
                                            if($courseEndContent){ foreach($courseEndContent as $endContent){ ?>
                                            <ul><li style="font-size:11px"><?php echo str_replace('?','',$endContent->endcontent); ?></li></ul>
                                            <?php } } ?>
                                        </li>
                                    </ul>
                                    <?php } } ?>
                                </li>
                            </ul>
                            <?php } } ?>
                        </li>
                    </ul>
                    <?php } } ?>
                </div>
            </div>
            <?php } } ?>

            <?php if(!empty($moreheading)){ $i=0; foreach($moreheading as $course){ $i++; ?>
            <div class="accordion-item">
                <button class="accordion-btn" onclick="toggleAcc(this)">
                    <span><?php echo str_replace('?','',$course->heading); ?></span>
                    <span class="acc-icon">+</span>
                </button>
                <div class="accordion-body">
                    <?php $contents = App\CourseCurriculumExcel::where('heading_id',$course->id)->get();
                    if($contents){ foreach($contents as $content){ ?>
                    <ul>
                        <li><?php echo str_replace('?','',$content->coursescontent); ?>
                            <?php $subcontents = App\CourseCurriculumExcel::where('content_id',$content->id)->get();
                            if($subcontents){ foreach($subcontents as $sub){ ?>
                            <ul><li><?php echo str_replace('?','',$sub->subcontent); ?></li></ul>
                            <?php } } ?>
                        </li>
                    </ul>
                    <?php } } ?>
                </div>
            </div>
            <?php } } ?>
        </div>

        <!-- CERTIFICATE -->
        <div class="certificate-section reveal" id="certificateId">
            <span class="sec-title">Certificate</span>
            <div class="cert-grid">
                <div>
                    <p class="sec-subtitle">Globally recognized certification for your career</p>
                    <div class="cert-features">
                        <div class="cert-feat"><div class="cert-feat-icon">✓</div>Validate theoretical & hands-on expertise for freshers and professionals</div>
                        <div class="cert-feat"><div class="cert-feat-icon">✓</div>Globally accepted certification that enhances your resume value</div>
                        <div class="cert-feat"><div class="cert-feat-icon">✓</div>Secures top roles in prominent companies worldwide</div>
                        <div class="cert-feat"><div class="cert-feat-icon">✓</div>Granted only after comprehensive training and practical projects</div>
                    </div>
                </div>
                <div>
                    <img src="{{asset('public/image/certificate.png')}}" class="cert-img" alt="Certificate">
                </div>
            </div>
        </div>

        <!-- PLACEMENT -->
        <div class="placement-section reveal section-wrap" id="placementId">
            <span class="sec-title">Student Placement Profile</span>
            <p class="sec-subtitle">Real success stories from our graduates</p>
            <div class="placement-cards">
                <div class="place-card">
                    <div class="place-top">
                        <img src="{{asset('public/image/user.jpeg')}}" class="place-avatar" alt="Student">
                        <div>
                            <div class="place-name">Arpit</div>
                            <div class="place-badge">✓ Placed</div>
                        </div>
                    </div>
                    <div class="place-company">📍 Data Analyst at Splunk</div>
                    <p class="place-text" style="margin-top:10px">Joined with zero experience. The trainers were patient, real projects helped understand the industry, and the placement team connected me with the right interviews.</p>
                </div>
                <div class="place-card">
                    <div class="place-top">
                        <img src="{{asset('public/image/user.jpeg')}}" class="place-avatar" alt="Student">
                        <div>
                            <div class="place-name">Priya</div>
                            <div class="place-badge">✓ Placed</div>
                        </div>
                    </div>
                    <div class="place-company">📍 Software Engineer at Wipro</div>
                    <p class="place-text" style="margin-top:10px">The curriculum is industry-aligned and the mock interviews gave me the confidence to crack placements. Best decision of my career.</p>
                </div>
            </div>
        </div>

        <!-- FAQs -->
        <div class="faq-section section-wrap reveal" id="faqsid">
            <span class="sec-title">Frequently Asked Questions</span>
            <p class="sec-subtitle">Everything you wanted to know</p>

            <?php if(!empty($coursesdetails->FAQs)){
                $FAQs = json_decode($coursesdetails->FAQs);
                $faqquestion = unserialize($FAQs->faqq);
                $j=0;
                if(!empty($faqquestion)){
                    $faqanswer = unserialize($FAQs->faqa);
                    for($i=0; $i<count($faqquestion); $i++){ $j++; ?>
                    <div class="faq-item">
                        <button class="faq-btn <?php if($j==1) echo 'open'; ?>" onclick="toggleFaq(this)">
                            <?php echo (isset($faqquestion[$i])? $faqquestion[$i]:""); ?>
                            <span class="faq-icon">+</span>
                        </button>
                        <div class="faq-answer <?php if($j==1) echo 'open'; ?>">
                            <?php echo (isset($faqanswer[$i])? $faqanswer[$i]:""); ?>
                        </div>
                    </div>
                    <?php }
                }
            } else {
                $details = App\Courses::where('id',$coursesdetails->cloneId)->select('FAQs')->first();
                if(!empty($details->FAQs)){
                    $FAQs = json_decode($details->FAQs);
                    $faqquestion = unserialize($FAQs->faqq);
                    $j=0;
                    if(!empty($faqquestion)){
                        $faqanswer = unserialize($FAQs->faqa);
                        for($i=0; $i<count($faqquestion); $i++){ $j++; ?>
                        <div class="faq-item">
                            <button class="faq-btn <?php if($j==1) echo 'open'; ?>" onclick="toggleFaq(this)">
                                <?php echo (isset($faqquestion[$i])? $faqquestion[$i]:""); ?>
                                <span class="faq-icon">+</span>
                            </button>
                            <div class="faq-answer <?php if($j==1) echo 'open'; ?>">
                                <?php echo (isset($faqanswer[$i])? $faqanswer[$i]:""); ?>
                            </div>
                        </div>
                        <?php }
                    }
                }
            } ?>
        </div>

        <!-- TESTIMONIALS -->
        <div class="testimonials-section section-wrap reveal" id="testimonialsId">
            <span class="sec-title">Student Testimonials</span>
            <p class="sec-subtitle">What our learners say about us</p>
            <div class="testimonials-grid">
                <?php if($testimonials){ foreach($testimonials as $testimonial){ ?>
                <div class="testi-card">
                    <p class="testi-quote">"{{ $testimonial->comment }}"</p>
                    <div class="testi-bottom">
                        <?php if($testimonial->testimonial_image){ ?>
                        <img src="{{asset('public/'.$testimonial->testimonial_image)}}" alt="{{$testimonial->name}}" class="testi-avatar">
                        <?php }else{ ?>
                        <img src="{{asset('public/image/user.jpeg')}}" alt="<?php echo $testimonial->name; ?>" class="testi-avatar">
                        <?php } ?>
                        <div>
                            <div class="testi-name">{{ $testimonial->name }}</div>
                            <div class="testi-role">{{ $testimonial->designation }}, {{ $testimonial->company_name }}</div>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>

    </div><!-- end content-left -->

    <!-- SIDEBAR -->
    <div class="sidebar-col">
        <div class="enquiry-sticky">
            <div class="enq-card">
                <div class="enq-card-header">
                    <h3>Quick Enquiry</h3>
                    <p>Get a free counselling session today</p>
                </div>
                <div class="enq-card-body">
                    <form action="" method="post" onsubmit="return contactController.dataSaveRight(this)" autocomplete="off">
                        <input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; }else{ echo $coursesdetails->title; } ?>">
                        <input type="text" name="name" placeholder="Your Full Name *">
                        <input type="text" name="email" placeholder="Email Address *">
                        <div class="code-phone">
                            <div class="code-drop-down d-flex">
                                <div class="arrow-frm">
                                    <input class="countryCodeName" type="text" placeholder="Code *" onkeyup="searchCodeFunction(this.value,'')">
                                    <input type="hidden" class="form-control countryCodeValue" name="code" value="">
                                    <div class="append_countryCode"></div>
                                </div>
                                <div class="pne-div w-100">
                                    <input name="phone" type="tel" maxlength="16" placeholder="Mobile Number *" onkeypress="return isNumericKeyCheck(event)">
                                </div>
                            </div>
                        </div>
                        
      


                        <textarea name="message" placeholder="Your Message (optional)"></textarea>
                        <input type="reset" class="resetData">
                        <button type="submit" class="enq-submit">Send Enquiry →</button>
                        <p class="enq-note">🔒 Your data is 100% safe with us</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- end main-content -->

<!-- ==================== WHY CHOOSE US ==================== -->
<section class="why-section">
    <div class="why-inner">
        <div class="why-grid">
            <div class="why-left reveal">
                <h2>Why Students <span>Choose Us</span> to Groom Their Career</h2>
                <p>Expand your career opportunities with India's most trusted IT & <?php if($coursesdetails->course_name){ echo $coursesdetails->course_name; } ?> institute. Get job-ready for an in-demand career.</p>
                <ul class="why-list">
                    <li><span class="check">✓</span> More than 68,806+ Students Trained</li>
                    <li><span class="check">✓</span> Team of 470+ Experienced & Certified Instructors</li>
                    <li><span class="check">✓</span> 250+ Collaborations with Universities & Companies</li>
                    <li><span class="check">✓</span> ISO 9001:2015 Accredited Company</li>
                    <li><span class="check">✓</span> Industry Recognised Verifiable Certificate</li>
                </ul>
            </div>
            <div class="why-right reveal delay-2">
                <div class="why-img-stack">
                    <img src="{{asset('public/image/shape-1.png')}}" alt="Training" class="why-img-1">
                    <img src="{{asset('public/image/shape-2.webp')}}" alt="Training" class="why-img-2">
                    <img src="{{asset('public/image/share-4.avif')}}" alt="Training" class="why-img-3">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== APPROACH SECTIONS ==================== -->
<section class="approach-section">
    <div class="approach-inner">
        <div class="approach-grid reveal">
            <div class="approach-img-box">
                <img src="{{asset('public/image/first-1.png')}}" alt="Hiring Companies">
                <span class="approach-tag">Hiring</span>
            </div>
            <div class="approach-content">
                <h3>Hiring Companies</h3>
                <p>We connect you with top companies who trust our training program for skilled talent acquisition.</p>
                <ul class="approach-list">
                    <li><span class="li-num">1</span> Contact our team via email, phone, or website to express your collaboration interest</li>
                    <li><span class="li-num">2</span> Share your organization's specific training needs, skill gaps, and goals</li>
                    <li><span class="li-num">3</span> We create a tailored proposal including modules, timelines and delivery methods</li>
                    <li><span class="li-num">4</span> Sign a MoU outlining scope of work, responsibilities, and deliverables</li>
                    <li><span class="li-num">5</span> Collaborate with our experts to design modules aligned with your tech stack</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="approach-section">
    <div class="approach-inner">
        <div class="approach-grid reverse reveal">
            <div class="approach-content">
                <h3>Interview Preparation</h3>
                <p>We equip you with skills and confidence needed to ace technical and behavioral interviews.</p>
                <ul class="approach-list">
                    <li><span class="li-num">1</span> Mock interviews with industry experts — real world scenarios with feedback</li>
                    <li><span class="li-num">2</span> Resume building and optimization for the IT industry</li>
                    <li><span class="li-num">3</span> In-depth technical training on key concepts and programming tools</li>
                    <li><span class="li-num">4</span> Hands-on coding challenges commonly asked in IT interviews</li>
                    <li><span class="li-num">5</span> Communication and problem-solving for non-technical interview rounds</li>
                </ul>
            </div>
            <div class="approach-img-box">
                <img src="{{asset('public/image/first-1.png')}}" alt="Interview Preparation">
                <span class="approach-tag">Interview Prep</span>
            </div>
        </div>
    </div>
</section>

<section class="approach-section">
    <div class="approach-inner">
        <div class="approach-grid reveal">
            <div class="approach-img-box">
                <img src="{{asset('public/image/first-1.png')}}" alt="Class Cross Question">
                <span class="approach-tag">Flexible</span>
            </div>
            <div class="approach-content">
                <h3>Flexible Cross Classes</h3>
                <p>Easily switch between batches to accommodate your schedule without disrupting your learning journey.</p>
                <ul class="approach-list">
                    <li><span class="li-num">1</span> Switch between batches to accommodate your schedule</li>
                    <li><span class="li-num">2</span> Missed a class? Join a different batch at the same level</li>
                    <li><span class="li-num">3</span> Experience diverse teaching styles from different trainers</li>
                    <li><span class="li-num">4</span> No extra cost for switching batches or attending cross-classes</li>
                    <li><span class="li-num">5</span> Personalized guidance for smooth transitions between instructors</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ==================== PARTNERS ==================== -->
<section class="partners-section">
    <div class="partners-inner-full">
        <div class="partners-grid">
            <div class="reveal">
                <h2>Our <span>Global</span> Honorable Partners</h2>
                <p>Boost your career growth with professional certifications. Jobs without limits.</p>
                <div class="partners-stat">
                    <strong>250+</strong>
                    <span>Collaborations with leading companies</span>
                </div>
            </div>
            <div class="partners-logos-grid reveal delay-2">
                <div class="partner-logo-box"><img src="{{asset('public/image/partners/infosys.png')}}" alt="Infosys"></div>
                <div class="partner-logo-box"><img src="{{asset('public/image/partners/wipro.png')}}" alt="Wipro"></div>
                <div class="partner-logo-box"><img src="{{asset('public/image/partners/tech-mahindra.png')}}" alt="Tech Mahindra"></div>
                <div class="partner-logo-box"><img src="{{asset('public/image/partners/magic-software.png')}}" alt="Magic Software"></div>
                <div class="partner-logo-box"><img src="{{asset('public/image/partners/birla-soft.png')}}" alt="Birla Soft"></div>
                <div class="partner-logo-box"><img src="{{asset('public/image/partners/genpact.png')}}" alt="Genpact"></div>
                <div class="partner-logo-box"><img src="{{asset('public/image/partners/nagarro.png')}}" alt="Nagarro"></div>
                <div class="partner-logo-box"><img src="{{asset('public/image/partners/snapdeal.png')}}" alt="Snapdeal"></div>
                <div class="partner-logo-box"><img src="{{asset('public/image/partners/HCL.png')}}" alt="HCL"></div>
                <div class="partner-logo-box"><img src="{{asset('public/image/partners/NIIT.png')}}" alt="NIIT"></div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== RELATED PROGRAMS ==================== -->
<section class="related-section">
    <div class="related-inner">
        <div class="sec-title related-title reveal">Related Programs</div>
        <p class="sec-subtitle reveal">Explore more courses to grow your skills</p>
        <div class="related-grid">
            <a href="{{url('/courses/aws-certification-training')}}" class="related-card reveal"><img src="{{asset('public/image/svg/aws.svg')}}" alt="AWS"><span>AWS Training</span></a>
            <a href="{{url('/courses/devops-training')}}" class="related-card reveal delay-1"><img src="{{asset('public/image/svg/devops.svg')}}" alt="DevOps"><span>DevOps</span></a>
            <a href="{{url('/courses/aws-certification-training')}}" class="related-card reveal delay-2"><img src="{{asset('public/image/big-tool-Power_BI.png')}}" alt="Power BI"><span>Power BI</span></a>
            <a href="{{url('/courses/aws-certification-training')}}" class="related-card reveal delay-3"><img src="{{asset('public/image/data-science.svg')}}" alt="Data Science"><span>Data Science</span></a>
            <a href="{{url('/courses/aws-certification-training')}}" class="related-card reveal"><img src="{{asset('public/image/svg/python.svg')}}" alt="Python"><span>Python</span></a>
            <a href="{{url('/courses/aws-certification-training')}}" class="related-card reveal delay-1"><img src="{{asset('public/image/svg/Salesforce.svg')}}" alt="Salesforce"><span>Salesforce</span></a>
            <a href="{{url('/courses/aws-certification-training')}}" class="related-card reveal delay-2"><img src="{{asset('public/image/svg/Tableaus.svg')}}" alt="Tableau"><span>Tableau</span></a>
            <a href="{{url('/courses/aws-certification-training')}}" class="related-card reveal delay-3"><img src="{{asset('public/image/amazon.png')}}" alt="Amazon"><span>Amazon</span></a>
            <a href="{{url('/courses/aws-certification-training')}}" class="related-card reveal"><img src="{{asset('public/image/big-tool-sql.png')}}" alt="SQL"><span>SQL</span></a>
            <a href="{{url('/courses/aws-certification-training')}}" class="related-card reveal delay-1"><img src="{{asset('public/image/R_Program.png')}}" alt="R Program"><span>R Program</span></a>
            <a href="{{url('/courses/aws-certification-training')}}" class="related-card reveal delay-2"><img src="{{asset('public/image/sas.png')}}" alt="SAS"><span>SAS</span></a>
            <a href="{{url('/courses/aws-certification-training')}}" class="related-card reveal delay-3"><img src="{{asset('public/image/cloud.png')}}" alt="Cloud"><span>Cloud</span></a>
        </div>
    </div>
</section>

<!-- ==================== MODALS (all original preserved) ==================== -->
<div class="popup-class-div modal fade" id="popupDwnId" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body">
        <div class="mdlImg"><img src="{{asset('public/image/enroll_image.png')}}" alt="Enroll"></div>
        <div class="mdl-field-frm">
            <div class="successmessage"></div><div class="errormessage"></div>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            <div class="frm-hdg"><img src="{{asset('public/image/download.png')}}" alt="Download"><h4 id="modal-heading">Enquiry Information</h4></div>
            <form action="" method="post" onsubmit="return contactController.dataSaveForm(this)" autocomplete="off">
                <input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; }else{ echo $coursesdetails->title; } ?>">
                <input type="text" name="name" placeholder="Enter Name*">
                <input type="text" name="email" placeholder="Enter E-mail*">
                <div class="code-phone"><div class="code-drop-down d-flex"><div class="arrow-frm">
                    <input class="countryCodeName" type="text" placeholder="Country Code*" onkeyup="searchCodeFunction(this.value,'')">
                    <input type="hidden" class="form-control countryCodeValue" name="code" value="91">
                    <div class="append_countryCode"></div></div>
                    <div class="pne-div w-100"><input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no*" onkeypress="return isNumericKeyCheck(event)"></div>
                </div></div>
                <input type="reset" class="resetData">
                <textarea name="message" placeholder="Message Details"></textarea>
                <button type="submit" class="modal-placement-button" name="submit">Submit</button>
            </form>
        </div>
    </div></div></div>
</div>

<div class="modal fade popup-class-div" id="vdoFrmPopupModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body">
        <div class="mdlImg"><img src="{{asset('public/image/enroll_image.png')}}" alt="Enroll"></div>
        <div class="mdl-field-frm">
            <button type="button" class="close videoclose" data-dismiss="modal"><span>&times;</span></button>
            <div class="frm-hdg"><h4>Enquiry Information</h4></div>
            <form action="" method="post" onsubmit="return contactController.saveWatchVideoEnquiry(this)" autocomplete="off">
                <input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; }else{ echo $coursesdetails->title; } ?>">
                <input type="text" name="name" placeholder="Enter Name*">
                <input type="text" name="email" placeholder="Enter E-mail*">
                <div class="code-phone"><div class="code-drop-down d-flex"><div class="arrow-frm">
                    <input class="countryCodeName" type="text" placeholder="Country Code*" onkeyup="codeFunction(this.value,'')">
                    <input type="hidden" class="form-control countryCodeValue" name="code" value="">
                    <div class="appendCode"></div></div>
                    <div class="pne-div w-100"><input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no*" onkeypress="return isNumericKeyCheck(event)"></div>
                </div></div>
                <input type="reset" class="resetData">
                <textarea name="message" placeholder="Message Details"></textarea>
                <button type="submit" class="modal-placement-button" name="submit">Submit</button>
            </form>
        </div>
    </div></div></div>
</div>

<div class="modal fade popup-class-div" id="dwnCrcm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body">
        <div class="mdlImg"><img src="{{asset('public/image/enroll_image.png')}}" alt="Enroll"></div>
        <div class="mdl-field-frm">
            <div class="successmessage"></div><div class="errormessage"></div>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            <div class="frm-hdg"><img src="{{asset('public/image/download.png')}}" alt="Download"><h4>VIDEO REVIEWS</h4></div>
            <form action="" method="post" onsubmit="return contactController.savedwnCrcm(this)" autocomplete="off">
                <input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?>">
                <input type="hidden" name="from" value="<?php if(!empty($coursesdetails->title)){ echo $coursesdetails->title; } ?>">
                <input type="hidden" name="frm_title" class="frm_title">
                <input type="text" name="name" placeholder="Enter your Name">
                <input type="text" name="email" placeholder="Enter your e-mail">
                <div class="code-phone"><div class="code-drop-down d-flex"><div class="arrow-frm">
                    <input class="countryCodeName" type="text" placeholder="Country Code*" onkeyup="searchCodeFunction(this.value,'')">
                    <input type="hidden" class="form-control countryCodeValue" name="code" value="">
                    <div class="append_countryCode"></div></div>
                    <div class="pne-div w-100"><input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no*" onkeypress="return isNumericKeyCheck(event)"></div>
                </div></div>
                <input type="reset" class="resetData">
                <button type="submit" class="modal-placement-button" name="submit">Submit</button>
            </form>
        </div>
    </div></div></div>
</div>

<div class="dwn-frm-div">
    <div class="modal fade" id="download_mobileotp" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document"><div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body text-center">
                <p>An OTP on your submitted Mobile No has been shared. Please check and submit OTP.</p>
                <div class="mdl-field-frm">
                    <form action="" method="post" onsubmit="return contactController.getOTP(this)" autocomplete="off">
                        <input type="tel" name="otp" placeholder="Enter OTP" maxlength="6">
                        <input type="reset" class="resetData">
                        <button type="submit" class="modal-placement-button">Submit</button>
                    </form>
                </div>
            </div>
        </div></div>
    </div>
</div>

<div class="dwn-frm-div">
    <div class="modal fade" id="dwn-pdf-Id" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document"><div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body text-center">
                <h6>Download <?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?> Curriculum</h6>
                <p>We're the best training provider with rigorous industry-relevant programs designed and delivered in collaboration with world-class faculty.</p>
                <?php if(!empty($coursesdetails->course_pdf_text)){ ?>
                <a href="{{asset('download')}}/<?php echo $coursesdetails->course_pdf_text.'.pdf'; ?>" target="_blank" class="modal-placement-button" style="display:inline-block;padding:12px 28px;text-decoration:none">Download Here</a>
                <?php } ?>
            </div>
        </div></div>
    </div>
</div>

<div class="fade modal popup-class-div" id="with_course" aria-hidden="true" data-backdrop="static" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body">
        <div class="mdlImg"><img src="{{asset('/public/image/enroll_image.png')}}" alt="Enroll"></div>
        <div class="mdl-field-frm">
            <button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
            <div class="frm-hdg">
                <h4>Would you like a <span style="color:var(--primary)">Free Demo</span> of your <span style="color:var(--primary)"><?php echo $coursesdetails->course_name; ?></span> Course?</h4>
            </div>
            <div class="successmessage"></div><div class="errormessage"></div>
            <div style="text-align:center;margin-bottom:12px">
                <a href="https://wa.me/918800182225" target="_blank" style="background:#25D366;color:#fff;padding:9px 20px;border-radius:40px;text-decoration:none;font-size:13px;font-weight:600">💬 Chat on WhatsApp</a>
            </div>
            <form action="" autocomplete="off" method="post" onsubmit="return contactController.dataSavePopup(this)">
                <input name="course" type="hidden" value="<?php if (!empty($coursesdetails->course_name)) { echo $coursesdetails->course_name; } else { echo $coursesdetails->title; } ?>">
                <input name="name" placeholder="Enter Name*">
                <input name="email" placeholder="Enter E-mail*">
                <div class="code-phone"><div class="code-drop-down d-flex"><div class="arrow-frm">
                    <input class="countryCodeName" type="text" placeholder="Country Code*" onkeyup="searchCodeFunction(this.value,'')">
                    <input type="hidden" class="form-control countryCodeValue" name="code" value="">
                    <div class="append_countryCode"></div></div>
                    <div class="pne-div w-100"><input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no*" onkeypress="return isNumericKeyCheck(event)"></div>
                </div></div>
                <input type="reset" class="resetData">
                <textarea name="message" placeholder="Enter Message"></textarea>
                <button class="modal-placement-button" type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div></div></div>
</div>

<!-- ==================== JS ==================== -->
<script>
// Accordion toggle
function toggleAcc(btn) {
    const body = btn.nextElementSibling;
    const icon = btn.querySelector('.acc-icon');
    const isOpen = body.classList.contains('open');
    document.querySelectorAll('.accordion-body').forEach(b => b.classList.remove('open'));
    document.querySelectorAll('.accordion-btn').forEach(b => { b.classList.remove('open'); b.querySelector('.acc-icon').textContent = '+'; });
    if (!isOpen) { body.classList.add('open'); btn.classList.add('open'); icon.textContent = '×'; }
}

// FAQ toggle
function toggleFaq(btn) {
    const answer = btn.nextElementSibling;
    const icon = btn.querySelector('.faq-icon');
    const isOpen = answer.classList.contains('open');
    document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('open'));
    document.querySelectorAll('.faq-btn').forEach(b => { b.classList.remove('open'); b.querySelector('.faq-icon').textContent = '+'; });
    if (!isOpen) { answer.classList.add('open'); btn.classList.add('open'); icon.textContent = '×'; }
}

// About toggle
function toggleAbout(header) {
    const body = header.nextElementSibling;
    const icon = header.querySelector('.toggle-icon');
    const isOpen = body.style.display === 'block';
    body.style.display = isOpen ? 'none' : 'block';
    icon.textContent = isOpen ? '+' : '×';
}

// Scroll reveal
const reveals = document.querySelectorAll('.reveal');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) { entry.target.classList.add('visible'); observer.unobserve(entry.target); }
    });
}, { threshold: 0.12 });
reveals.forEach(el => observer.observe(el));

// Active nav on scroll
const sections = document.querySelectorAll('[id]');
const navLinks = document.querySelectorAll('.navs');
window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(section => {
        if (window.scrollY >= section.offsetTop - 120) current = section.getAttribute('id');
    });
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + current) link.classList.add('active');
    });
});

// Popup after 5 seconds
function popupRefesh() { $('#with_course').modal(); $('#with_course').show(); }
setTimeout('popupRefesh()', 5000);
</script>

@endsection
