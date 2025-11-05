<?php
@session_start();

/* =========================
   PAGE NAME (routing simple)
   ========================= */
$full_name  = $_SERVER['PHP_SELF'];
$name_array = explode('/', $full_name);
$count      = count($name_array);
$page_name  = $name_array[$count - 1];

if     ($page_name=='index.php')        { $namepage="Home"; }
elseif ($page_name=='about.php')        { $namepage="About"; }
elseif ($page_name=='services.php')     { $namepage="Services"; }
elseif ($page_name=='testimonials.php') { $namepage="Testimonials"; }
elseif ($page_name=='projects.php')     { $namepage="Projects"; }
elseif ($page_name=='thank-you.php')    { $namepage="Thank You"; }
elseif ($page_name=='404.php')          { $namepage="Not Found"; }
elseif ($page_name=='contact.php')      { $namepage="Contact Us"; }

/* =========================
   INFO GENERAL
   ========================= */
$MAVEN     = "http://gomavenhub.com/";
$Company   = "FSC MOBILE WELDING";
$Domain    = "https://www.fscmobilewelding.com/";
$Address   = "Memphis, TN 38122";

$MetaDescription = "FSC Mobile Welding delivers licensed and insured mobile welding services for residential and commercial clients across Memphis, TN and surrounding communities.";
$MetaImage       = '/assets/img/normal/about_4.jpg';

$PhoneName = "Main";
$Phone     = "(901) 480-1713";

// Normaliza teléfonos a tel:
function telRef($p){
  $clean = str_replace(str_split('()-/\\:*?"<>|., '), '', $p);
  return "tel:".$clean;
}
$PhoneRef = telRef($Phone);

$Mail    = "figueroaisaias26@gmail.com";
$MailRef = "mailto:".$Mail;

/* =========================
   INFO ADICIONAL
   ========================= */
$Services      = "Residential and Commercial Services";
$Estimates     = "Free Estimates up to 10 Miles";
$Payment       = "Cash, Ck, Cash App, Zelle";
$Experience    = "26 Years of Experience";
$Schedule      = "24/7 Service";
$Coverage      = "We Cover up to 150 Miles around Memphis, TN";
$LicenseNote   = "Fully Licensed & Insured";
$BilingualNote = "Bilingual Attention: Yes";

/* =========================
   PALETA DE COLORES
   ========================= */
$BrandColors = [
  'primary'   => '#000000',
  'secondary' => '#E10600',
  'white'     => '#FFFFFF'
];

/* =========================
   MAPA
   ========================= */
$GoogleMap = '<iframe src="https://www.google.com/maps?q=Memphis,+TN&output=embed" width="100%" height="450" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
$whatsapp  = 'https://wa.link/r1gax4';

/* =========================
   LINKS
   ========================= */
$links = [
  'google_share' => 'https://share.google/p430H6Ur3PXGsAKYs',
  'x'            => 'https://x.com/weldingfiguero1',
  'tiktok'       => 'https://www.tiktok.com/@figueroawelding',
  'usdirectory'  => 'https://usdirectory.com/Figueroa-Welding-Memphis-TN',
  'facebook'     => 'https://www.facebook.com/profile.php?id=100063532743892'
];

$google    = $links['google_share'];
$facebook  = $links['facebook'];
$tiktok    = $links['tiktok'];
$x_link    = $links['x'];
$usdir     = $links['usdirectory'];

/* =========================
   SLOGANS
   ========================= */
$Phrase = array(
  "26 Years of Strength, Precision, and Trust.",
  "Welding Done Right—Anytime, Anywhere.",
  "Mobile Welding Experts Serving Memphis 24/7.",
  "From Repairs to Structures—We Weld It All.",
  "Licensed, Insured, and Built to Last."
);

/* =========================
   HOME
   ========================= */
$Home = array(
  "Welcome to FSC Mobile Welding, Memphis’s trusted welding professionals for over 26 years. We proudly serve both residential and commercial clients, offering licensed and insured mobile welding services around the clock. No matter the size or complexity of the project, our goal is to provide precision, durability, and quality that lasts.",
  "From emergency repairs to large-scale structural welding, our bilingual team is available 24/7 to meet your needs with professionalism and speed. With decades of hands-on experience, we combine technical expertise with top-grade equipment to deliver results you can depend on. At FSC Mobile Welding, your project is our priority—day or night."
);

$HomeIntroCTAs = [
  [
    'label' => 'Request a Quote',
    'href'  => '/contact.php',
    'style' => 'primary',
    'icon'  => 'fas fa-clipboard-list',
  ],
];

if (!empty($Phone) && !empty($PhoneRef)) {
  $HomeIntroCTAs[] = [
    'label' => $Phone,
    'href'  => $PhoneRef,
    'style' => 'outline',
    'icon'  => 'fas fa-phone-volume',
  ];
}

$HomeIntro = [
  'eyebrow'        => '24/7 Mobile Welding',
  'headline'       => 'Strength & Precision, Delivered On-Site.',
  'subheadline'    => 'Serving Memphis and the Mid-South',
  'lead'           => $Home[0] ?? '',
  'autoplay_delay' => 6500,
  'highlights'     => array_values(array_filter([
    $Experience ?? '',
    $Estimates ?? '',
    $Coverage ?? '',
  ])),
  'ctas'           => array_values(array_filter($HomeIntroCTAs, function ($cta) {
    return !empty($cta['label']) && !empty($cta['href']);
  })),
];

$HeroImages = [
  [
    'src'     => '/assets/img/hero/remodel.jpg',
    'alt'     => 'Technician delivering on-site mobile welding services',
    'caption' => 'Emergency welding support anywhere in Memphis, TN',
  ],
  [
    'src'     => '/assets/img/hero/roofing.jpg',
    'alt'     => 'Structural welding reinforcing a commercial roof',
    'caption' => 'Structural reinforcement and fabrication tailored to your site',
  ],
  [
    'src'     => '/assets/img/hero/decks.jpg',
    'alt'     => 'Custom metal fabrication for residential deck railings',
    'caption' => 'Custom builds crafted to match your specifications',
  ],
];

$HeroSlides = [
  [
    'title'       => 'Mobile Welding Experts 24/7',
    'text'        => $Home[0] ?? '',
    'badge'       => $Schedule ?? '24/7 Response',
    'caption'     => $HeroImages[0]['caption'],
    'image_index' => 0,
  ],
  [
    'title'       => 'Custom Fabrication & Repairs On Demand',
    'text'        => $Home[1] ?? '',
    'badge'       => $Estimates ?? 'Free Estimates',
    'caption'     => $HeroImages[1]['caption'],
    'image_index' => 1,
  ],
  [
    'title'       => 'Licensed • Insured • 26 Years of Experience',
    'text'        => $Experience ?? '26 Years of Experience',
    'badge'       => $LicenseNote ?? 'Licensed & Insured',
    'caption'     => $HeroImages[2]['caption'],
    'image_index' => 2,
  ],
];


/* =========================
   ABOUT
   ========================= */
$About = array(
  "For more than two decades, FSC Mobile Welding has been a trusted name in Memphis and surrounding areas, delivering dependable welding and fabrication solutions. We specialize in providing mobile services, which means we come to you—saving you time and getting the job done on-site, efficiently and correctly. Whether you need simple repairs or complex custom fabrication, our experienced team has the skill to handle it.",
  "We are proud to be a bilingual, licensed, and insured company, committed to serving a wide range of clients with clear communication and reliable service. From homeowners needing gate repairs to businesses requiring structural welding, we approach every project with the same dedication to safety and quality. After 26 years of proven results, we’ve built our reputation on craftsmanship, honesty, and customer satisfaction."
);

/* =========================
   MISSION & VISION
   ========================= */
$Mission = "Deliver professional, reliable, and high-quality mobile welding services to residential and commercial clients across Memphis and beyond—providing durable results built on experience, safety, and trust.";
$Vision  = "To be recognized as the leading mobile welding company in Tennessee, known for 24/7 availability, exceptional craftsmanship, and long-term customer relationships.";

/* =========================
   SERVICIOS
   ========================= */
$SN = $SD = $ExSD = array();

$SN[1] = "General Welding";
$SD[1] = "Comprehensive welding for residential and commercial needs. We handle broken metal parts, worn-out equipment, and custom projects on-site, ensuring precision and durability.";

$SN[2] = "Fabrication & Repair";
$SD[2] = "Custom fabrication and metal repair tailored to your specifications. From new structures to restoring equipment, we deliver strong, long-lasting solutions.";

$SN[3] = "Electric Gates & Fences";
$SD[3] = "We repair and fabricate secure, durable gates and fences. Available 24/7 for emergency repairs and installations that combine strength with functionality.";

$SN[4] = "Aircraft Welding";
$SD[4] = "Specialized welding for aircraft components, ensuring precision, safety, and compliance with strict industry standards.";

$SN[5] = "Structural Welding";
$SD[5] = "Reliable welding for building frameworks and structural reinforcement. We guarantee strength, safety, and longevity for all construction types.";

// Otros servicios (sin descripción extensa)
$OtherServices = array("Custom Fabrication", "Emergency Welding", "Mobile On-Site Welding", "Fence Repair", "Metal Restoration");

/* =========================
   BADGES
   ========================= */
$Badges = array(
  $Services, $Estimates, $Coverage, $Experience, $LicenseNote, $BilingualNote
);

/* =========================
   CÁLCULOS DERIVADOS
   ========================= */
$ExperienceText = $Experience ?? '';
$ExperienceYears = 0;
if (preg_match('/\d+/', (string)$ExperienceText, $m)) { $ExperienceYears = (int)$m[0]; }
if ($ExperienceYears <= 0) { $ExperienceYears = 1; }

if (strlen($About[0]) > 10){ $ExAbout = substr($About[0], 0, 145).'...'; }
if (strlen($Home[0])  > 10){ $ExHome  = substr($Home[0],  0, 95).'...'; }

for ($i=1; $i<=5; $i++){
  if (isset($SD[$i]) && strlen($SD[$i])>10){
    $limit = 120;
    if ($i==4) $limit = 125;
    $ExSD[$i] = substr($SD[$i], 0, $limit).'...';
  }
}

/* =========================
   MÉTODOS DE PAGO
   ========================= */
function paymentList($txt){
  $parts = array_map('trim', explode(',', $txt));
  return $parts;
}
$PaymentMethods = paymentList($Payment);

/* =========================
   FLAGS / CONFIG
   ========================= */
$SupportGoogleReviews = true;
$ServiceTypeGlobal    = "Residential & Commercial";

/* =========================
   CSS VARS
   ========================= */
$BrandCSSVars = sprintf(
  ':root{--brand-black:%s;--brand-red:%s;--brand-white:%s;}',
  $BrandColors["primary"],
  $BrandColors["secondary"],
  $BrandColors["white"]
);
?>
