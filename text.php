<?php
@session_start();

/* =========================
   PAGE NAME (routing simple)
   ========================= */
$full_name  = $_SERVER['PHP_SELF'] ?? '';
$name_array = explode('/', $full_name);
$count      = count($name_array);
$page_name  = $name_array[$count - 1] ?? 'index.php';

if     ($page_name=='index.php')        { $namepage="Home"; }
elseif ($page_name=='about.php')        { $namepage="About"; }
elseif ($page_name=='services.php')     { $namepage="Services"; }
elseif ($page_name=='projects.php')     { $namepage="Projects"; }
elseif ($page_name=='gallery.php')      { $namepage="Projects"; }
elseif ($page_name=='portfolio.php')    { $namepage="Portfolio"; }
elseif ($page_name=='thank-you.php')    { $namepage="Thank You"; }
elseif ($page_name=='404.php')          { $namepage="Not Found"; }
elseif ($page_name=='contact.php')      { $namepage="Contact"; }

/* =========================
   INFO GENERAL
   ========================= */
$MAVEN     = "http://gomavenhub.com/";
$Company   = "Northline Build Studio";
$Domain    = "https://www.northlinebuild.com/";
$Address   = "Austin, TX · Denver, CO · Remote Studios";

$MetaDescription = "Northline Build Studio delivers modern construction, drywall, and remodeling projects with editorial clarity and precision-led execution.";
$MetaImage       = '/assets/img/normal/about_4.jpg';

$PhoneName = "Studio Line";
$Phone     = "(512) 410-2218";

// Normaliza teléfonos a tel:
function telRef($p){
  $clean = str_replace(str_split('()-/\\:*?"<>|., '), '', $p);
  return "tel:".$clean;
}
$PhoneRef = telRef($Phone);

$Mail    = "hello@northlinebuild.com";
$MailRef = "mailto:".$Mail;

/* =========================
   INFO ADICIONAL
   ========================= */
$Services      = "Construction · Drywall · Remodeling · Painting";
$Estimates     = "Pre-construction assessments within 48 hours";
$Payment       = "Net 15 / Net 30 · ACH / Wire";
$Experience    = "18 Years of Integrated Build Experience";
$Schedule      = "Dedicated project windows, not rushed timelines";
$Coverage      = "Regional builds across Texas, Colorado, and the Midwest";
$LicenseNote   = "Licensed & insured in multiple states";
$BilingualNote = "Languages: English / Español";

/* =========================
   PALETA DE COLORES
   ========================= */
$BrandColors = [
  'primary'   => '#e56b4c',
  'secondary' => '#1f3b38',
  'white'     => '#f6f2ec'
];

/* =========================
   MAPA
   ========================= */
$GoogleMap = '<iframe src="https://www.google.com/maps?q=Austin,+TX&output=embed" width="100%" height="450" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
$whatsapp  = 'https://wa.link/r1gax4';

/* =========================
   LINKS
   ========================= */
$links = [
  'linkedin'     => 'https://www.linkedin.com/',
  'instagram'    => 'https://www.instagram.com/',
  'facebook'     => 'https://www.facebook.com/',
  'x'            => 'https://x.com/',
];

$linkedin = $links['linkedin'];
$instagram = $links['instagram'];
$facebook  = $links['facebook'];
$x_link    = $links['x'];

$FooterBlurb = "We shape construction environments with a studio mindset: clear sequencing, precise craftsmanship, and calm project management.";

/* =========================
   HOME
   ========================= */
$Home = array(
  "Northline Build Studio partners with commercial and high-end residential teams to deliver construction, drywall, and remodels that feel designed, not improvised.",
  "We operate like an editorial studio: detail-first, process-driven, and committed to clean execution from pre-construction through closeout."
);

$HomeIntroCTAs = [
  [
    'label' => 'Start a Project Review',
    'href'  => '/contact.php',
    'style' => 'primary',
    'icon'  => 'fas fa-arrow-right',
  ],
  [
    'label' => 'View Project Portfolio',
    'href'  => '/gallery.php',
    'style' => 'outline',
    'icon'  => 'fas fa-arrow-up-right',
  ],
];

$Hero = [
  'eyebrow' => 'Editorial Build Studio',
  'headline' => 'Spaces built with discipline, detail, and modern clarity.',
  'subheadline' => 'Construction, drywall, and remodeling for teams who expect more than a generic contractor.',
  'lead' => $Home[0] ?? '',
  'badge' => 'Phase 01 · Pre-Construction',
  'highlights' => [
    'Integrated project teams for fast alignment',
    'Lean schedules with transparent sequencing',
    'Measured quality checks at every milestone',
  ],
  'ctas' => $HomeIntroCTAs,
];

$HeroMedia = [
  [
    'src' => '/assets/img/hero/remodel.jpg',
    'alt' => 'Modern interior construction build-out',
    'caption' => 'Hospitality build-out delivered in 16 weeks',
  ],
  [
    'src' => '/assets/img/hero/roofing.jpg',
    'alt' => 'Commercial structural reinforcement project',
    'caption' => 'Structural + envelope coordination for retail anchors',
  ],
];

$HeroStats = [
  [
    'label' => 'Projects delivered',
    'value' => '210+',
  ],
  [
    'label' => 'Average schedule compression',
    'value' => '14%',
  ],
  [
    'label' => 'Repeat client rate',
    'value' => '78%',
  ],
];

/* =========================
   ABOUT
   ========================= */
$AboutSection = [
  'eyebrow' => 'Studio Profile',
  'headline' => 'A construction studio with editorial rigor and field-tested execution.',
  'lead' => 'We built Northline to bridge the gap between design intent and build reality. Every detail is translated into a field-ready sequence.',
  'body' => $Home[1] ?? '',
  'values' => [
    'Pre-construction clarity before ground breaks',
    'Specialist trades managed under one schedule',
    'Human-first crews with a high craft standard',
  ],
  'image' => '/assets/img/normal/about_3.jpg',
];

$Mission = "Deliver construction environments that balance creative intent with build precision, ensuring every phase is predictable and accountable.";
$Vision  = "Set a new visual and operational standard for modern contractors by blending editorial design thinking with field expertise.";

/* =========================
   SERVICES
   ========================= */
$ServicesIntro = [
  'eyebrow' => 'Capabilities',
  'title' => 'Services designed as a system, not a checklist.',
  'lead' => 'Each service block is scoped as a strategic phase so projects stay on narrative, schedule, and budget.'
];

$ServicesList = [
  [
    'tag' => '01',
    'title' => 'Core Construction',
    'summary' => 'Ground-up and tenant improvement builds managed with a studio PM cadence.',
    'detail' => 'Scope coordination, bid transparency, and field execution aligned weekly.'
  ],
  [
    'tag' => '02',
    'title' => 'Drywall + Framing',
    'summary' => 'Precision framing, acoustic detailing, and clean finish execution.',
    'detail' => 'QC checklists at every pass ensure clean lines and tight tolerances.'
  ],
  [
    'tag' => '03',
    'title' => 'Remodeling + Adaptive Reuse',
    'summary' => 'Reposition existing spaces without losing operational continuity.',
    'detail' => 'Phased sequences keep businesses active while upgrades land on time.'
  ],
  [
    'tag' => '04',
    'title' => 'Painting + Finish Systems',
    'summary' => 'High-end finish packages for hospitality, retail, and commercial interiors.',
    'detail' => 'Spec-driven coatings with color QA and final walkthrough alignment.'
  ],
];

$OtherService = [
  'title' => 'Pre-Construction Intelligence',
  'summary' => 'Value engineering, trade coordination, and schedule modeling before a single crew mobilizes.',
  'bullets' => [
    '48-hour feasibility and cost snapshots',
    'Buildability reviews with design partners',
  ],
];

/* =========================
   PROCESS
   ========================= */
$ProcessIntro = [
  'eyebrow' => 'Method',
  'title' => 'A four-scene build narrative that keeps teams aligned.',
  'lead' => 'We treat process as storytelling: each phase closes with a deliverable and a clear next move.'
];

$ProcessSteps = [
  [
    'title' => 'Discovery + Feasibility',
    'summary' => 'Site walk, scope definition, and early risk mapping.',
    'deliverable' => 'Field intelligence brief'
  ],
  [
    'title' => 'Design Translation',
    'summary' => 'Align design intent with subcontractor realities and schedule constraints.',
    'deliverable' => 'Constructability roadmap'
  ],
  [
    'title' => 'Build Execution',
    'summary' => 'Sequenced production with daily field reporting and QC gates.',
    'deliverable' => 'Weekly progress ledger'
  ],
  [
    'title' => 'Closeout + Care',
    'summary' => 'Punch list alignment, warranty tracking, and post-occupancy support.',
    'deliverable' => 'Completion dossier'
  ],
];

/* =========================
   PROJECTS
   ========================= */
$ProjectsIntro = [
  'eyebrow' => 'Selected Work',
  'title' => 'Projects framed as stories, not just square footage.',
  'lead' => 'Each engagement highlights the narrative between client ambition and build execution.'
];

$Projects = [
  [
    'name' => 'Glassline Headquarters',
    'location' => 'Austin, TX',
    'summary' => 'Full interior build-out with acoustic drywall detailing and custom glazing coordination.',
    'stat' => '68K ft² · 22 weeks',
    'image' => '/assets/img/normal/about_4.jpg',
  ],
  [
    'name' => 'Harbor District Retail',
    'location' => 'Denver, CO',
    'summary' => 'Adaptive reuse of a historic shell into a multi-tenant retail hub.',
    'stat' => '41K ft² · phased build',
    'image' => '/assets/img/normal/about_1.jpg',
  ],
  [
    'name' => 'Stonebridge Hospitality',
    'location' => 'Nashville, TN',
    'summary' => 'Remodeling program with staggered closures and precision finish packages.',
    'stat' => '120 rooms · 16 weeks',
    'image' => '/assets/img/normal/about_3.jpg',
  ],
];

/* =========================
   CTA
   ========================= */
$CTA = [
  'headline' => 'Ready to review your next build?',
  'summary' => 'Share scope, timelines, and constraints. We will respond with a clear build narrative within 48 hours.',
  'primary' => [
    'label' => 'Schedule a Review',
    'href'  => '/contact.php',
  ],
  'secondary' => [
    'label' => 'Download Capabilities',
    'href'  => '/services.php',
  ],
];

/* =========================
   CONTACT
   ========================= */
$ContactIntro = [
  'eyebrow' => 'Studio Contact',
  'title' => 'Let’s map the build before the first bid.',
  'summary' => 'Tell us about your timeline, scope, and decision team. We reply with a clear next step.'
];

$ContactCards = [
  [
    'title' => 'Studio Line',
    'body' => $Phone,
    'link' => $PhoneRef,
  ],
  [
    'title' => 'Project Desk',
    'body' => $Mail,
    'link' => $MailRef,
  ],
  [
    'title' => 'Studios',
    'body' => $Address,
    'link' => '',
  ],
];

/* =========================
   PAGE INTRODUCTIONS
   ========================= */
$PageIntros = [
  'about' => [
    'eyebrow' => 'About Northline',
    'title' => 'Builders with a studio mindset.',
    'summary' => 'Our teams translate design intent into field execution with calm clarity.'
  ],
  'services' => [
    'eyebrow' => 'Services',
    'title' => 'Capabilities structured for modern projects.',
    'summary' => 'Every service block is scoped as a narrative phase to keep builds aligned.'
  ],
  'projects' => [
    'eyebrow' => 'Project Archive',
    'title' => 'Casework that speaks through results.',
    'summary' => 'A rotating set of builds across commercial, retail, and hospitality environments.'
  ],
  'contact' => [
    'eyebrow' => 'Contact',
    'title' => 'Start with the brief, not the boilerplate.',
    'summary' => 'We prioritize clarity, responsiveness, and clean handoffs.'
  ],
];
