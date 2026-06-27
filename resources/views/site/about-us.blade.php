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
	{{$coursesdetails->meta_keywords}}
@else
	India's No.1 Best IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection
@section('description')
@if(!empty($coursesdetails->meta_description))
{{$coursesdetails->meta_description}}
@else
	India's No.1 IT Training Institute in Noida | Delhi | Gurgaon for Industrial Training.
@endif
@endsection
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
/* ============================================================
   ANIMATIONS
============================================================ */
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
@keyframes slideLeft {
  from { opacity: 0; transform: translateX(32px); }
  to   { opacity: 1; transform: translateX(0); }
}
@keyframes shimmer {
  0%   { background-position: -200% center; }
  100% { background-position: 200% center; }
}
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50%       { transform: translateY(-10px); }
}
@keyframes heroBounce {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  25%       { transform: translateY(-8px) rotate(3deg); }
  75%       { transform: translateY(-4px) rotate(-3deg); }
}
@keyframes borderDraw {
  from { clip-path: inset(0 100% 0 0); }
  to   { clip-path: inset(0 0% 0 0); }
}
@keyframes gradientBg {
  0%   { background-position: 0% 50%; }
  50%  { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
@keyframes pulse {
  0%, 100% { box-shadow: 0 0 0 0 rgba(27,117,188,0.3); }
  50%       { box-shadow: 0 0 0 12px rgba(27,117,188,0); }
}
@keyframes iconPop {
  from { transform: scale(0.6) rotate(-10deg); opacity: 0; }
  to   { transform: scale(1) rotate(0deg); opacity: 1; }
}
@keyframes lineGrow {
  from { width: 0; }
  to   { width: 56px; }
}
@keyframes cardSlideIn {
  from { opacity: 0; transform: translateY(20px) scale(0.97); }
  to   { opacity: 1; transform: translateY(0) scale(1); }
}
@keyframes rotateOrb {
  from { transform: rotate(0deg) translateX(30px) rotate(0deg); }
  to   { transform: rotate(360deg) translateX(30px) rotate(-360deg); }
}
@keyframes checkBounce {
  0%, 100% { transform: scale(1); }
  50%       { transform: scale(1.2); }
}
@keyframes sectionAnimation {
  0%, 100% { background-size: 100%; }
  50%       { background-size: 110%; }
}

/* Scroll reveal utility */
.reveal {
  opacity: 0;
  transform: translateY(28px);
  transition: opacity 0.7s ease, transform 0.7s ease;
}
.reveal.visible { opacity: 1; transform: translateY(0); }
.reveal-left {
  opacity: 0;
  transform: translateX(-28px);
  transition: opacity 0.7s ease, transform 0.7s ease;
}
.reveal-left.visible { opacity: 1; transform: translateX(0); }
.reveal-right {
  opacity: 0;
  transform: translateX(28px);
  transition: opacity 0.7s ease, transform 0.7s ease;
}
.reveal-right.visible { opacity: 1; transform: translateX(0); }
.delay-1 { transition-delay: 0.1s; }
.delay-2 { transition-delay: 0.2s; }
.delay-3 { transition-delay: 0.3s; }

/* ============================================================
   TOP BANNER
============================================================ */
.top-banner {
  padding: 0;
  position: relative;
  min-height: 220px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  background: linear-gradient(135deg, #0d1b2a 0%, #1b75bc 60%, #0f3460 100%);
  background-size: 200% 200%;
  animation: gradientBg 10s ease infinite;
}

/* Dot pattern overlay */
.top-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px);
  background-size: 28px 28px;
  pointer-events: none;
}
/* Glow orb */
.top-banner::after {
  content: '';
  position: absolute;
  width: 350px; height: 350px;
  background: radial-gradient(circle, rgba(254,122,54,0.12) 0%, transparent 70%);
  bottom: -120px; right: -60px;
  border-radius: 50%;
  pointer-events: none;
}

.top-banner .row { width: 100%; position: relative; z-index: 2; }

.top-banner-title {
  text-align: center;
  animation: fadeUp 0.7s ease both;
}
.top-banner-title h1 {
  display: inline-block;
  border: 1.5px solid rgba(255,255,255,0.4);
  padding: 12px 32px;
  position: relative;
  font-family: 'Syne', sans-serif;
  font-size: 22px;
  font-weight: 700;
  color: #fff;
  margin: 20px auto;
  border-radius: 4px;
  letter-spacing: 2px;
  text-transform: uppercase;
  backdrop-filter: blur(4px);
  background: rgba(255,255,255,0.06);
}
.top-banner-title h1::before,
.top-banner-title h1::after {
  content: '';
  position: absolute;
  border-left: 2px solid rgba(254,122,54,0.8);
  border-top: 2px solid rgba(254,122,54,0.8);
  border-bottom: 2px solid rgba(254,122,54,0.8);
  left: -5px; top: -2px;
  width: 4px; height: calc(100% + 4px);
}
.top-banner-title h1::after {
  left: auto; right: -5px;
  border-left: none;
  border-right: 2px solid rgba(254,122,54,0.8);
}
.top-banner-title h1 span { position: relative; }
.top-banner-title h1 span::before,
.top-banner-title h1 span::after {
  content: '';
  position: absolute;
  left: 0; top: -5px;
  width: 100%; height: 4px;
  border-left: 2px solid rgba(254,122,54,0.8);
  border-right: 2px solid rgba(254,122,54,0.8);
  border-top: 2px solid rgba(254,122,54,0.8);
}
.top-banner-title h1 span::after {
  top: auto; bottom: -5px;
  border-top: none;
  border-bottom: 2px solid rgba(254,122,54,0.8);
}

.bread_crums {
  display: table;
  margin: 0 auto;
  animation: fadeUp 0.7s ease 0.2s both;
}
#breadcrumbs {
  font-size: 13px;
  color: rgba(255,255,255,0.65);
  padding: 6px 0;
  text-align: center;
}
#breadcrumbs a { color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.2s; }
#breadcrumbs a:hover { color: #ffc436; }
#breadcrumbs .fa { color: rgba(254,122,54,0.7); margin: 0 6px; font-size: 11px; }
#breadcrumbs strong { color: #fff; font-weight: 600; }

/* ============================================================
   ABOUT SECTION
============================================================ */
.entry-content {
  padding: 64px 0;
}
.entry-content h3 {
  font-family: 'Syne', sans-serif;
  font-size: 13px;
  font-weight: 700;
  color: #1b75bc;
  letter-spacing: 3px;
  text-transform: uppercase;
  margin-bottom: 16px;
  position: relative;
  display: inline-block;
}
.entry-content h3::after {
  content: '';
  position: absolute;
  bottom: -6px; left: 0;
  height: 3px; width: 0;
  background: linear-gradient(90deg, #1b75bc, #fe7a36);
  border-radius: 2px;
  animation: lineGrow 0.8s ease 0.3s forwards;
}
.entry-content p {
  font-size: 15px;
  line-height: 1.85;
  color: #475569;
  text-align: justify;
}

/* Video player */
.youtube-player {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 20px 60px rgba(27,117,188,0.2);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  cursor: pointer;
  animation: slideLeft 0.8s ease 0.2s both;
}
.youtube-player:hover {
  transform: translateY(-6px) scale(1.01);
  box-shadow: 0 28px 72px rgba(27,117,188,0.28);
}
.youtube-player img {
  width: 100%;
  height: auto;
  display: block;
  border-radius: 16px;
}
.youtube-player::after {
  content: '▶';
  position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  width: 64px; height: 64px;
  background: rgba(27,117,188,0.9);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 22px;
  color: #fff;
  animation: pulse 2.5s ease infinite;
  line-height: 64px;
  text-align: center;
  transition: background 0.3s;
}
.youtube-player:hover::after { background: #1b75bc; }

/* ============================================================
   MISSION & VISION
============================================================ */
#AboutSection {
  padding: 64px 0;
  background: linear-gradient(180deg, #f8fafc 0%, #fff 100%);
}
#AboutSection .row { gap: 0; }

#AboutSection .inner {
  background: #fff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  padding: 40px 32px;
  height: auto;
  min-height: 320px;
  text-align: center;
  box-shadow: 0 4px 24px rgba(27,117,188,0.08);
  position: relative;
  overflow: hidden;
  transition: all 0.4s ease;
  animation: cardSlideIn 0.7s ease both;
}
#AboutSection .col-md-6:last-child .inner { animation-delay: 0.15s; }

/* Top color bar */
#AboutSection .inner::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #1b75bc, #fe7a36);
  border-radius: 20px 20px 0 0;
}
/* Background glow */
#AboutSection .inner::after {
  content: '';
  position: absolute;
  width: 200px; height: 200px;
  background: radial-gradient(circle, rgba(27,117,188,0.05) 0%, transparent 70%);
  bottom: -60px; right: -40px;
  border-radius: 50%;
  pointer-events: none;
}

#AboutSection .inner:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 56px rgba(27,117,188,0.15);
  border-color: rgba(27,117,188,0.25);
}

#AboutSection img {
  width: 80px; height: 80px;
  object-fit: contain;
  margin-bottom: 20px;
  animation: iconPop 0.6s ease both;
  filter: drop-shadow(0 4px 12px rgba(27,117,188,0.2));
  transition: transform 0.4s ease;
}
#AboutSection .inner:hover img {
  transform: scale(1.1) rotate(-5deg);
}

#AboutSection h1 {
  font-family: 'Syne', sans-serif;
  font-size: 20px;
  font-weight: 700;
  color: #0d1b2a;
  margin-bottom: 14px;
  padding-bottom: 12px;
  position: relative;
  display: inline-block;
}
#AboutSection h1::after {
  content: '';
  position: absolute;
  bottom: 0; left: 50%;
  transform: translateX(-50%);
  width: 36px; height: 3px;
  background: linear-gradient(90deg, #1b75bc, #fe7a36);
  border-radius: 2px;
}

#AboutSection p {
  font-size: 14px;
  line-height: 1.8;
  color: #64748b;
  text-align: justify;
}

/* Gap between mission/vision cards */
#AboutSection .col-sm-12.col-md-6 { padding: 0 12px 0 12px; }

/* ============================================================
   WHY CHOOSE US — GRID SECTION
============================================================ */
.Why-to-Choose { padding: 72px 0 0; }

.s_title {
  text-align: center;
  margin-bottom: 12px;
}
.s_title h2 {
  font-family: 'Syne', sans-serif;
  font-size: clamp(24px, 3.5vw, 34px);
  font-weight: 700;
  color: #0d1b2a;
  line-height: 1.3;
  margin-bottom: 16px;
}
.s_title h2 span { color: #1b75bc; }

.s_title p {
  font-size: 15px;
  line-height: 1.85;
  color: #64748b;
  max-width: 800px;
  margin: 0 auto;
  text-align: justify;
}

/* Choose grid */
.common_row { margin: 40px 0 0; }

.choose_box {
  position: relative;
  border: none !important;
  border-radius: 16px;
  margin: 8px;
  padding: 32px 24px;
  height: auto !important;
  min-height: 260px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center;
  background: #fff;
  box-shadow: 0 2px 16px rgba(27,117,188,0.07);
  transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
  overflow: hidden;
  animation: cardSlideIn 0.6s ease both;
}

/* Stagger choose boxes */
.col-xl-4:nth-child(1) .choose_box { animation-delay: 0.05s; }
.col-xl-4:nth-child(2) .choose_box { animation-delay: 0.10s; }
.col-xl-4:nth-child(3) .choose_box { animation-delay: 0.15s; }
.col-xl-4:nth-child(4) .choose_box { animation-delay: 0.20s; }
.col-xl-4:nth-child(5) .choose_box { animation-delay: 0.25s; }
.col-xl-4:nth-child(6) .choose_box { animation-delay: 0.30s; }

/* Top accent bar */
.choose_box::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 3px;
  background: linear-gradient(90deg, #1b75bc, #fe7a36);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.4s ease;
  border-radius: 16px 16px 0 0;
}
.choose_box:hover::before { transform: scaleX(1); }

/* Background glow on hover */
.choose_box::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(27,117,188,0.04), transparent);
  opacity: 0;
  transition: opacity 0.3s;
  border-radius: 16px;
  pointer-events: none;
}
.choose_box:hover::after { opacity: 1; }

.choose_box:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0 20px 48px rgba(27,117,188,0.16);
  background: #fff;
}

/* Remove old borders */
.noborder_left, .noborder_bottom { border: none !important; }

.choose_icons {
  margin-bottom: 18px;
  width: 64px; height: 64px;
  background: linear-gradient(135deg, #e8f3fc, #dbeffe);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  transition: all 0.4s ease;
  animation: iconPop 0.6s ease both;
}
.choose_box:hover .choose_icons {
  background: linear-gradient(135deg, #1b75bc, #0f4f82);
  transform: scale(1.12) rotate(-6deg);
  box-shadow: 0 8px 24px rgba(27,117,188,0.3);
}
.choose_icons i {
  color: #1b75bc;
  font-size: 26px;
  display: block;
  text-align: center;
  transition: color 0.3s;
}
.choose_box:hover .choose_icons i { color: #fff; }

.choose_contents { text-align: center; }
.choose_contents h4 {
  font-family: 'Syne', sans-serif;
  font-size: 16px;
  font-weight: 700;
  color: #0d1b2a;
  margin-bottom: 10px;
  transition: color 0.3s;
}
.choose_box:hover .choose_contents h4 { color: #1b75bc; }
.choose_contents p {
  font-size: 13px;
  line-height: 1.75;
  color: #64748b;
  margin: 0;
}

/* ============================================================
   WHY CHOOSE — CAMPUS SECTION
============================================================ */
.why-choose-cnt {
  padding: 80px 0;
  background: linear-gradient(180deg, #f0f6ff 0%, #fff 100%);
  position: relative;
  overflow: hidden;
}
.why-choose-cnt::before {
  content: '';
  position: absolute;
  width: 500px; height: 500px;
  background: radial-gradient(circle, rgba(27,117,188,0.06) 0%, transparent 70%);
  top: -100px; left: -100px;
  border-radius: 50%;
  pointer-events: none;
}

.campus-wrapper { position: relative; }

/* Campus shape sticker */
.campus-shape-sticker {
  position: absolute;
  bottom: 40px; right: 0;
  z-index: 5;
}
.shape-light {
  width: 64px; height: 64px;
  background: linear-gradient(135deg, #ffc436, #fe7a36);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  box-shadow: 0 8px 24px rgba(254,196,54,0.35);
  animation: heroBounce 2.5s ease-in-out infinite;
  overflow: hidden;
}
.shape-light img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }

.campus-shape-1 {
  position: absolute;
  right: -20%; bottom: -60px;
  opacity: 0.08;
  pointer-events: none;
}
.campus-shape-1 img { width: 280px; }

/* Left content */
.compus-content .section-title h2 {
  font-family: 'Syne', sans-serif;
  font-size: clamp(26px, 3.5vw, 38px);
  font-weight: 800;
  color: #0d1b2a;
  line-height: 1.2;
  margin-bottom: 20px;
}
.down-mark-line-2 {
  position: relative;
  display: inline-block;
  color: #1b75bc;
}
.down-mark-line-2::after {
  content: '';
  position: absolute;
  bottom: -4px; left: 0;
  width: 100%; height: 3px;
  background: linear-gradient(90deg, #1b75bc, #fe7a36);
  border-radius: 2px;
  animation: lineGrow 1s ease 0.5s both;
}
.down-mark-line-2::before {
  display: none;
}

.compus-content p {
  font-size: 15px;
  line-height: 1.8;
  color: #64748b;
  margin-bottom: 24px;
}
.compus-content ul { list-style: none; padding: 0; margin: 0 0 28px; }
.compus-content ul li {
  font-size: 14.5px;
  color: #2c3e50;
  font-weight: 500;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 9px 14px;
  background: #f8fafc;
  border-radius: 8px;
  border: 1px solid #e2e8f0;
  transition: all 0.3s;
  animation: fadeUp 0.5s ease both;
}
.compus-content ul li:nth-child(1) { animation-delay: 0.1s; }
.compus-content ul li:nth-child(2) { animation-delay: 0.2s; }
.compus-content ul li:nth-child(3) { animation-delay: 0.3s; }
.compus-content ul li:nth-child(4) { animation-delay: 0.4s; }
.compus-content ul li:nth-child(5) { animation-delay: 0.5s; }
.compus-content ul li:hover {
  background: #e8f3fc;
  border-color: #1b75bc;
  transform: translateX(6px);
}
.compus-content ul li .fa {
  color: #1b75bc;
  font-size: 14px;
  flex-shrink: 0;
  width: 22px; height: 22px;
  background: rgba(27,117,188,0.1);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  animation: checkBounce 2s ease-in-out infinite;
}
.compus-content ul li:nth-child(1) .fa { animation-delay: 0s; }
.compus-content ul li:nth-child(2) .fa { animation-delay: 0.2s; }
.compus-content ul li:nth-child(3) .fa { animation-delay: 0.4s; }

/* Right image collage */
.campus-img-wrapper {
  min-height: 460px;
  margin-top: 0;
  position: relative;
}
.campus-img-1, .campus-img-2, .campus-img-3,
.campus-img-4, .campus-img-5 {
  position: absolute;
  border-radius: 14px;
  overflow: hidden;
  box-shadow: 0 12px 36px rgba(0,0,0,0.15);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.campus-img-1 { top: 80px; left: 0; width: 55%; animation: float 6s ease-in-out infinite; }
.campus-img-2 { top: 0; left: 22%; width: 45%; animation: float 6s ease-in-out 1.5s infinite; }
.campus-img-3 { top: -10%; left: 60%; width: 38%; animation: float 6s ease-in-out 3s infinite; }
.campus-img-4 { top: 55%; left: 22%; width: 40%; animation: float 6s ease-in-out 2s infinite; }
.campus-img-5 { right: 0; top: 22%; width: 36%; animation: float 6s ease-in-out 1s infinite; }
.campus-img-1 img, .campus-img-2 img, .campus-img-3 img,
.campus-img-4 img, .campus-img-5 img {
  width: 100%; height: 100%; object-fit: cover;
  display: block;
  transition: transform 0.5s ease;
}
.campus-img-1:hover, .campus-img-2:hover, .campus-img-3:hover,
.campus-img-4:hover, .campus-img-5:hover {
  box-shadow: 0 20px 56px rgba(27,117,188,0.2);
  z-index: 10;
}
.campus-img-1:hover img, .campus-img-2:hover img { transform: scale(1.06); }

.campus-shape-3 img {
  width: 100%;
  border-radius: 14px;
  opacity: 0.6;
}

/* ============================================================
   UPCOMING BATCHES
============================================================ */
#upcomingbatchesid {
  background: #fff;
  padding: 72px 0;
}
.upcoming-batches-super-heading h3 {
  font-family: 'Syne', sans-serif;
  font-size: clamp(22px, 3vw, 30px);
  font-weight: 700;
  color: #0d1b2a;
  margin-bottom: 28px;
  position: relative;
  display: inline-block;
}
.upcoming-batches-super-heading h3::after {
  content: '';
  position: absolute;
  bottom: -6px; left: 0;
  width: 48px; height: 3px;
  background: linear-gradient(90deg, #1b75bc, #fe7a36);
  border-radius: 2px;
  animation: lineGrow 0.8s ease 0.3s both;
}

.online-class-section {
  background: #fff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  overflow: hidden;
  box-shadow: 0 4px 24px rgba(27,117,188,0.08);
}

table { width: 100%; border-collapse: collapse; font-family: 'DM Sans', sans-serif; }
thead tr { background: linear-gradient(135deg, #1b75bc, #0f4f82); }
th {
  padding: 15px 18px;
  text-align: left;
  color: #fff;
  font-size: 13px;
  font-weight: 600;
  letter-spacing: 0.3px;
}
td {
  padding: 14px 18px;
  font-size: 13.5px;
  color: #2c3e50;
  border-bottom: 1px solid #f1f5f9;
  vertical-align: middle;
  transition: background 0.2s;
}
td p { margin: 0; display: flex; align-items: center; gap: 6px; }
td .fa { color: #1b75bc; font-size: 13px; }
tr:hover td { background: #f0f6ff; }
tr:last-child td { border-bottom: none; }

/* ============================================================
   BLOG SECTION
============================================================ */
.blog-section { background: #f8fafc; padding: 72px 0; }

.section-title {
  display: block;
  margin-bottom: 48px;
  text-align: center;
}
.section-title h3 {
  font-family: 'Syne', sans-serif;
  font-size: clamp(22px, 3vw, 30px);
  font-weight: 700;
  color: #0d1b2a;
  margin-bottom: 10px;
  position: relative;
  display: inline-block;
}
.section-title h3::after {
  content: '';
  position: absolute;
  bottom: -8px; left: 50%;
  transform: translateX(-50%);
  width: 48px; height: 3px;
  background: linear-gradient(90deg, #1b75bc, #fe7a36);
  border-radius: 2px;
}
.section-title p.lead {
  color: #64748b;
  font-size: 15px;
  line-height: 1.7;
  margin-top: 16px;
}

/* Blog card */
.single-blog-card {
  background: #fff;
  border-radius: 16px !important;
  border: 1px solid #e2e8f0 !important;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(27,117,188,0.07) !important;
  transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
  animation: cardSlideIn 0.6s ease both;
  height: 100%;
}
.single-blog-card:nth-child(1) { animation-delay: 0.05s; }
.single-blog-card:nth-child(2) { animation-delay: 0.10s; }
.single-blog-card:nth-child(3) { animation-delay: 0.15s; }
.single-blog-card:hover {
  transform: translateY(-10px) scale(1.01);
  box-shadow: 0 24px 60px rgba(27,117,188,0.16) !important;
  border-color: rgba(27,117,188,0.25) !important;
}

/* Blog image */
.blog-img {
  position: relative;
  overflow: hidden;
}
.blog-img::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom, transparent 50%, rgba(13,27,42,0.5) 100%);
  opacity: 0;
  transition: opacity 0.4s;
}
.single-blog-card:hover .blog-img::after { opacity: 1; }
.blog-img img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-bottom: 3px solid #1b75bc;
  display: block;
  transition: transform 0.5s ease;
}
.single-blog-card:hover .blog-img img { transform: scale(1.06); }

/* Date badge */
.meta-date {
  position: absolute;
  right: 16px; bottom: -20px;
  width: 52px; height: 52px;
  background: linear-gradient(135deg, #1b75bc, #0f4f82);
  border-radius: 50%;
  text-align: center;
  color: #fff;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 16px rgba(27,117,188,0.3);
  z-index: 2;
  transition: all 0.3s;
}
.meta-date:hover { transform: scale(1.1); box-shadow: 0 8px 24px rgba(27,117,188,0.4); }
.meta-date strong {
  font-family: 'Syne', sans-serif;
  font-size: 15px;
  font-weight: 800;
  line-height: 1;
  display: block;
}
.meta-date small { font-size: 10px; font-weight: 600; letter-spacing: 0.5px; }

/* Blog body */
.single-blog-card .blog-body { padding: 28px 22px 22px; }
.post-meta { list-style: none; padding: 0; margin-bottom: 12px; display: flex; gap: 14px; }
.post-meta li { font-size: 12px; color: #94a3b8; display: flex; align-items: center; gap: 4px; }
.post-meta li i { color: #1b75bc; font-size: 12px; }
.post-meta li span { font-weight: 600; color: #64748b; }

.single-blog-card .card-title a {
  font-family: 'Syne', sans-serif;
  font-size: 16px;
  font-weight: 700;
  color: #0d1b2a;
  text-decoration: none;
  transition: color 0.3s;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.single-blog-card:hover .card-title a { color: #1b75bc; }

.single-blog-card .card-text {
  font-size: 13.5px;
  line-height: 1.7;
  color: #64748b;
  margin-bottom: 16px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

a.detail-link {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  text-decoration: none;
  color: #1b75bc;
  font-weight: 600;
  font-size: 13.5px;
  transition: all 0.3s;
  border-bottom: 1px solid transparent;
}
a.detail-link:hover { color: #0f4f82; border-bottom-color: #1b75bc; gap: 10px; }
a.detail-link .fa { font-size: 12px; transition: transform 0.3s; }
a.detail-link:hover .fa { transform: translateX(4px); }

/* Learn more button */
.btn-red {
  background: linear-gradient(135deg, #1b75bc, #0f4f82);
  color: #fff;
  padding: 12px 36px;
  border: none;
  border-radius: 40px;
  font-family: 'Syne', sans-serif;
  font-size: 15px;
  font-weight: 700;
  transition: all 0.3s;
  box-shadow: 0 4px 16px rgba(27,117,188,0.3);
  text-decoration: none;
  display: inline-block;
}
.btn-red:hover {
  background: linear-gradient(135deg, #0f4f82, #1b75bc);
  transform: translateY(-3px);
  box-shadow: 0 8px 28px rgba(27,117,188,0.4);
  color: #fff;
}

/* ============================================================
   RESPONSIVE
============================================================ */
@media (max-width: 1024px) {
  .campus-img-wrapper { min-height: 340px; }
  .campus-img-3, .campus-img-5 { display: none; }
}
@media (max-width: 768px) {
  .top-banner { min-height: 160px; }
  .entry-content { padding: 40px 0; }
  #AboutSection { padding: 40px 0; }
  #AboutSection .inner { margin-bottom: 16px; min-height: auto; padding: 28px 20px; }
  .campus-img-wrapper { display: none; }
  .compus-content { margin-bottom: 0; }
  .choose_box { margin: 6px 0; }
  .single-blog-card { margin-bottom: 20px; }
  .blog-section { padding: 48px 0; }
  .why-choose-cnt { padding: 48px 0; }
}
@media (max-width: 480px) {
  .top-banner-title h1 { font-size: 17px; padding: 10px 20px; }
}
</style>

<div class="main">

<!-- ==================== TOP BANNER ==================== -->
<div class="top-banner">
  <div class="row w-100">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
      <div class="top-banner-title">
        <h1><span>About Us</span></h1>
      </div>
      <div class="bread_crums">
        <p id="breadcrumbs">
          <span>
            <a href="{{url('/')}}">Home</a>
            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
            <a href="{{url('about-us')}}">About Us</a>
            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
            <strong class="breadcrumb_last" aria-current="page">About Us</strong>
          </span>
        </p>
      </div>
    </div>
  </div>
</div>

<!-- ==================== ABOUT INTRO ==================== -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <div class="entry-content">
                <div class="row align-items-center">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4 reveal-left">
                    <h3>About Us</h3>
                    <p>Our mission is to bridge the skills gap in the IT industry by offering hands-on, industry-relevant training designed by experts. Whether you're an individual looking to boost your career or a corporation aiming to upskill your workforce, we provide flexible learning paths and cutting-edge resources to ensure your success in the tech world. At Corporates Academy, we are dedicated to providing top-notch IT education and training to professionals and organizations looking to enhance their technical expertise. As a forward-thinking startup, we specialize in delivering comprehensive courses and certifications in software development, testing, project management, and more.</p>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4 reveal-right">
                    <div class="youtube-player" data-id="HCAA2xr4AYw" data-related="1" data-control="1" data-info="0" data-fullscreen="1">
                      <img loading="lazy" class="img-fluid" src="" width="375px" height="211px">
                      <div class="video-player-icons"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==================== MISSION & VISION ==================== -->
<section>
  <div id="AboutSection">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6 reveal-left">
          <div class="inner">
            <img src="{{asset('public/image/Mission.jpg')}}" alt="Mission">
            <h1>Our Mission</h1>
            <p>Our mission is to empower individuals with cutting-edge IT skills through innovative, hands-on training programs. We aim to bridge the gap between education and industry requirements, fostering a new generation of tech professionals who are prepared to excel in an ever evolving digital world.</p>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 reveal-right">
          <div class="inner">
            <img src="{{asset('public/image/vision.png')}}" alt="Vision" width="54">
            <h1>Our Vision</h1>
            <p>To be a leading IT training provider, shaping a future where technology education empowers individuals to achieve their career aspirations and drives innovation in the digital world. Through our commitment to excellence, accessibility, and lifelong learning, we aim to shape a future where technology education transforms lives and empowers communities worldwide.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==================== WHY CHOOSE US GRID ==================== -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="container-fluid">
          <div class="row Why-to-Choose">
            <div class="col-xl-12 reveal">
              <div class="s_title">
                <h2>Why to <span>Choose Us?</span></h2>
                <p>Our training programs are designed to meet the demands of the modern tech industry. We collaborate with industry experts to ensure our courses cover the latest tools, technologies, and methodologies. All instructors are seasoned professionals with years of experience in the IT field. They bring real-world insights and hands-on expertise to every session. We prioritize practical experience through live projects, case studies, and interactive labs.</p>
              </div>
            </div>
          </div>
          <div class="row no-gutters common_row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-flex reveal delay-1">
              <div class="choose_box noborder_left">
                <div class="choose_icons"><i class="fa fa-user" aria-hidden="true"></i></div>
                <div class="choose_contents">
                  <h4>IT Experts as Trainers</h4>
                  <p>Our trainers are industry leaders, skilled at simplifying complex concepts and empowering you with practical knowledge to excel in your IT career.</p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-flex reveal delay-2">
              <div class="choose_box">
                <div class="choose_icons"><i class="fa fa-laptop" aria-hidden="true"></i></div>
                <div class="choose_contents">
                  <h4>Fully Hands-on Training</h4>
                  <p>We believe the best way to learn is by doing. Our courses are built around immersive, hands-on sessions that mirror real challenges.</p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-flex reveal delay-3">
              <div class="choose_box">
                <div class="choose_icons"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                <div class="choose_contents">
                  <h4>Flexible Timings</h4>
                  <p>We offer flexible scheduling options to ensure you can learn at a time that suits you best, whether you are a student or a working professional.</p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-flex reveal delay-1">
              <div class="choose_box noborder_left noborder_bottom">
                <div class="choose_icons"><i class="fa fa-money" aria-hidden="true"></i></div>
                <div class="choose_contents">
                  <h4>Affordable Fees</h4>
                  <p>We believe quality education should be accessible to everyone. Our programs are offered at budget-friendly prices without straining your finances.</p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-flex reveal delay-2">
              <div class="choose_box noborder_bottom">
                <div class="choose_icons"><i class="fa fa-desktop" aria-hidden="true"></i></div>
                <div class="choose_contents">
                  <h4>Lab Assistance</h4>
                  <p>Our dedicated lab support ensures you never face technical challenges alone. We assist you in setting up software and tools to focus on learning.</p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-flex reveal delay-3">
              <div class="choose_box noborder_bottom">
                <div class="choose_icons"><i class="fa fa-book" aria-hidden="true"></i></div>
                <div class="choose_contents">
                  <h4>Interview Preparation</h4>
                  <p>Our courses include comprehensive interview preparation featuring commonly asked questions, practical scenarios, and industry-specific insights.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==================== CAMPUS / WHY STUDENTS CHOOSE ==================== -->
<section>
  <div class="why-choose-cnt fix pb-70">
    <div class="container">
      <div class="campus-wrapper position-relative">
        <div class="campus-shape-sticker">
          <div class="shape-light">
            <img src="{{asset('public/image/cumpus-1.jpg')}}" alt="shape">
          </div>
        </div>
        <div class="campus-shape-1">
          <img src="{{asset('public/image/cumpus-2.jpg')}}" alt="shape">
        </div>
        <div class="row align-items-center">
          <div class="col-xl-5 col-lg-6 reveal-left">
            <div class="compus-content mb-30">
              <div class="section-title mb-30">
                <h2>Why Students <span class="down-mark-line-2">Choose</span> Us to Groom their Career</h2>
              </div>
              <p>Expand your career opportunities with India's most trusted IT institute. Get job-ready for an in-demand career. Choose from multiple certification programs with us.</p>
              <ul>
                <li><i class="fa fa-check"></i> More than 68,806+ Students Trained.</li>
                <li><i class="fa fa-check"></i> Team of 470+ Experienced &amp; Certified Instructors.</li>
                <li><i class="fa fa-check"></i> 250+ Collaborations with Universities &amp; Companies.</li>
                <li><i class="fa fa-check"></i> ISO 9001:2015 Accredited Company.</li>
                <li><i class="fa fa-check"></i> Industry Recognised Verifiable Certificate.</li>
              </ul>
            </div>
          </div>
          <div class="col-xl-6 offset-xl-1 col-lg-6 reveal-right">
            <div class="campus-img-wrapper position-relative">
              <div class="campus-shape-3">
                <img src="{{asset('public/image/first-1.png')}}" alt="shape">
              </div>
              <div class="campus-img-1">
                <img src="{{asset('public/image/shape-1.png')}}" alt="training 1">
              </div>
              <div class="campus-img-2">
                <img src="{{asset('public/image/shape-2.webp')}}" alt="training 2">
              </div>
              <div class="campus-img-3">
                <img src="{{asset('public/image/share-3.jpg')}}" alt="training 3">
              </div>
              <div class="campus-img-4">
                <img src="{{asset('public/image/share-4.avif')}}" alt="training 4">
              </div>
              <div class="campus-img-5">
                <img src="{{asset('public/image/share-5.jpg')}}" alt="training 5">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==================== UPCOMING BATCHES ==================== -->
<section id="upcomingbatchesid">
  <div class="led-online-new">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="upcoming-batches-super-heading reveal">
            <h3>Upcoming Batch for Training</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="online-class-section reveal">
            <div class="online-class-list">
              <div class="online-class-points">
                <table>
                  <thead>
                    <tr>
                      <th>Training Name</th>
                      <th>Duration</th>
                      <th>Start Date</th>
                      <th>Days</th>
                      <th>Training Mode</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><p><i class="fa fa-angle-right"></i>Python Basics</p></td>
                      <td>3.5 Months</td>
                      <td><p>Dec 28, 2024</p></td>
                      <td>Weekend</td>
                      <td><p>Classroom / Online</p></td>
                    </tr>
                    <tr>
                      <td><p><i class="fa fa-angle-right"></i>Data Science</p></td>
                      <td>6.5 Months</td>
                      <td><p>Dec 29, 2024</p></td>
                      <td>Weekend</td>
                      <td><p>Online</p></td>
                    </tr>
                    <tr>
                      <td><p><i class="fa fa-angle-right"></i>Amazon Web Services (AWS)</p></td>
                      <td>4.5 Months</td>
                      <td><p>Dec 31, 2024</p></td>
                      <td>Weekday</td>
                      <td><p>Online</p></td>
                    </tr>
                    <tr>
                      <td><p><i class="fa fa-angle-right"></i>SAP — Systems, Applications &amp; Products</p></td>
                      <td>2 Months</td>
                      <td><p>Jan 02, 2025</p></td>
                      <td>Weekday</td>
                      <td><p>Online</p></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==================== BLOG SECTION ==================== -->
<div class="blog-section mt-5 mb-5">
  <div class="container">
    <div class="section-title text-center reveal">
      <h3>Latest Blogs</h3>
      <p class="lead">Our service offers unlimited solutions to all your business needs and graphic design services.</p>
    </div>
    <div class="row">
      <div class="col-md-4 reveal delay-1">
        <div class="single-blog-card card border-0 shadow-sm">
          <div class="blog-img position-relative">
            <img src="https://www.websolutiontechnology.com/images/blog/blog1.jpg" class="card-img-top" alt="blog">
            <div class="meta-date"><strong>24</strong><small>Apr</small></div>
          </div>
          <div class="blog-body">
            <div class="post-meta mb-2">
              <ul class="list-inline meta-list">
                <li class="list-inline-item"><i class="fa fa-heart mr-2"></i><span>45</span> Comments</li>
                <li class="list-inline-item"><i class="fa fa-share-alt mr-2"></i><span>10</span> Share</li>
              </ul>
            </div>
            <h3 class="h5 mb-2 card-title"><a href="#">Appropriately productize fully</a></h3>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk.</p>
            <a href="#" class="detail-link">Read more <i class="fa fa-angle-double-right ml-2"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 reveal delay-2">
        <div class="single-blog-card card border-0 shadow-sm">
          <div class="blog-img position-relative">
            <img src="https://www.websolutiontechnology.com/images/blog/blog1.jpg" class="card-img-top" alt="blog">
            <div class="meta-date"><strong>24</strong><small>Apr</small></div>
          </div>
          <div class="blog-body">
            <div class="post-meta mb-2">
              <ul class="list-inline meta-list">
                <li class="list-inline-item"><i class="fa fa-heart mr-2"></i><span>45</span> Comments</li>
                <li class="list-inline-item"><i class="fa fa-share-alt mr-2"></i><span>10</span> Share</li>
              </ul>
            </div>
            <h3 class="h5 mb-2 card-title"><a href="#">Quickly formulate backend</a></h3>
            <p class="card-text">Synergistically engage effective ROI after customer directed partnerships.</p>
            <a href="#" class="detail-link">Read more <i class="fa fa-angle-double-right ml-2"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 reveal delay-3">
        <div class="single-blog-card card border-0 shadow-sm">
          <div class="blog-img position-relative">
            <img src="https://www.websolutiontechnology.com/images/blog/blog1.jpg" class="card-img-top" alt="blog">
            <div class="meta-date"><strong>24</strong><small>Apr</small></div>
          </div>
          <div class="blog-body">
            <div class="post-meta mb-2">
              <ul class="list-inline meta-list">
                <li class="list-inline-item"><i class="fa fa-heart mr-2"></i><span>45</span> Comments</li>
                <li class="list-inline-item"><i class="fa fa-share-alt mr-2"></i><span>10</span> Share</li>
              </ul>
            </div>
            <h3 class="h5 mb-2 card-title"><a href="#">Objectively extend extensive</a></h3>
            <p class="card-text">Holisticly mesh open-source leadership rather than proactive users.</p>
            <a href="#" class="detail-link">Read more <i class="fa fa-angle-double-right ml-2"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-4 reveal">
      <a href="{{url('blog')}}" class="btn-red">Learn More</a>
    </div>
  </div>
</div>

</div>

<!-- Scroll Reveal JS -->
<script>
(function(){
  const els = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if(e.isIntersecting){ e.target.classList.add('visible'); io.unobserve(e.target); }
    });
  }, { threshold: 0.12 });
  els.forEach(el => io.observe(el));
})();
</script>

@endsection
