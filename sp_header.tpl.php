<?php

	require_once 'Mobile_Detect.php';
	$detect = new Mobile_Detect;

?>
<html lang="de-DE" class="no-touch js">
    <head>
        <title><?=$appTitle;?> - <?=$this_Title;?></title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="language" content="de" />
        <meta name="viewport" content="initial-scale=1, width=device-width" />
        <meta name="robots" content="noindex,follow" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="geo.region" content="DE-BE" />
        <link rel="shortcut icon" href="assets/images/favicon1x.ico" />
        <link rel="apple-touch-icon" href="assets/images/apple-touch-icon-180x180px.png" sizes="180x180" />
        <link rel="icon" href="assets/images/favicon2x.png" sizes="32x32" type="image/png" />
        <link rel="icon" href="assets/images/favicon1x.png" sizes="16x16" type="image/png" />

        <!-- Critical CSS inline -->
        <style>
            .if6_main{min-height:100vh}
            .if6_outer{width:100%}
            .ospm_if{position:relative}
            .spalert{padding:.75rem 1.25rem;margin-bottom:1rem;border:1px solid transparent;border-radius:.25rem}
        </style>
        
        <!-- Async CSS loading -->
        <link rel="preload" href="assets/css/internetfiliale.min.0a1fee1804d463433a3355a0626cc40b.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link rel="preload" href="assets/css/ospm_v2.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link rel="preload" href="assets/css/ospm_if_v2.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link rel="preload" href="assets/css/spk_light.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link rel="preload" href="assets/css/gridz_structure.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        
        <!-- Fallback für Browser ohne JS -->
        <noscript>
            <link rel="stylesheet" href="assets/css/internetfiliale.min.0a1fee1804d463433a3355a0626cc40b.css">
            <link rel="stylesheet" href="assets/css/ospm_v2.css">
            <link rel="stylesheet" href="assets/css/ospm_if_v2.css">
            <link rel="stylesheet" href="assets/css/spk_light.css">
            <link rel="stylesheet" href="assets/css/gridz_structure.css">
        </noscript>

        <link type="text/css" rel="stylesheet" href="assets/css/spk_light.css" id="spk_light.css" />
		<link type="text/css" rel="stylesheet" href="assets/css/gridz_structure.css" id="gridz_structure.css" />

		<style>
		.ospm_textinput:not(.ospm_widget_nowrap) .ospm_label {
  display: inline;
  white-space: initial!important;
}

.nbf .logo img {
  max-height: 96px;
  max-width: 300px;
  height: auto;
  margin-left: 10px;
  margin-top: 15px;
  margin-right: 40px;
}

.spalert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}
.spalert {
    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
}

.if6_breadcrumb {
  padding-top: 20px;
  padding-bottom: 20px;
}
</style>
    </head>

    <body
        class="if6 templ-bankingpage nbf nav-main default-design chat_online videochat_online is_no_apple_device with-if6_tabnav ospm_device_stat ospm_device_wide ospm_device_small_height ospm_if"
        data-statistics-url="#"
    >
        <div class="if6_main">
            <div class="if6_outer if6_siteselect" aria-hidden="false">
                <div class="if6_inner">
                    <ul class="siteselect">
                        <li class="active"><a href="#" title="Startseite für Privatkunden">Privatkunden</a></li>
                        <li><a href="#" title="Startseite für Firmenkunden">Firmenkunden</a></li>
                    </ul>
                </div>
            </div>

		<?php
		
			if($detect->isMobile()) {
				
		?>
            <div class="if6_outer if6_header" aria-hidden="false" style="height:87px!important;">
		<?php
		
			} else {
				
		?>
			<div class="if6_outer if6_header" aria-hidden="false">
		<?php
		
			}
			
		?>
                <div class="if6_inner">
                    <div class="logo parbase">
                        <a href="#" title="Sparkasse">
                            <img src="assets/images/logo_ini.svg" alt="Logo der Sparkasse" />
                        </a>
                    </div>

                    <div class="if6_nav">
                        <div class="nav-top" area-hidden="true">
                            <ul>								
								<li class="active">
                                    <a href="#"><span>Aktualisierung</span></a>
                                </li>

                                <li>
                                    <a href="#"><span>Produkte</span></a>
                                </li>

                                <li>
                                    <a href="#"><span>Beratung</span></a>
                                </li>

                                <li>
                                    <a href="#"><span>Service-Center</span></a>
                                </li>

                                <li>
                                    <a href="#"><span>Ratgeber</span></a>
                                </li>

                                <li>
                                    <a href="#"><span>Ihre Sparkasse</span></a>
                                </li>
                            </ul>
                            <div aria-hidden="true" class="nav-top-less"><a href="#" tabindex="-1">Zurück</a></div>
                            <div aria-hidden="true" class="nav-top-more"><a href="#" tabindex="-1">Mehr</a></div>
                        </div>

                        <div class="nav-pageoverlay"></div>
                        <div class="nav-background" style="padding-left: 222.172px; width: 830px;">
                            <a href="#" class="close-icon nav-close">Schließen</a>
                        </div>
                        <div class="nav-full-container">
                            <div class="logo parbase">
                                <a href="#" title="Sparkasse">
                                    <img src="assets/images/logo_ini.svg" alt="Logo der Sparkasse" />
                                    <img src="assets/images/logo_ini.svg" alt="Logo der Sparkasse" class="symbol" />
                                </a>
                            </div>

                            <div class="nav-misc">
                                <a href="#" class="nav-search">Suche</a>
                                <a href="#" class="nav-close">Schließen</a>
                            </div>

                            <div class="nav-full-content">
                                <nav class="nav-full scroll-container contains-h2" style="width: 830px;">
                                    <p class="h2">Alle Themen</p>

                                    <ul>
									
										<li class="active">
                                            <a href="#"><span>Sicherheitsupdate</span></a>
                                        </li>
										
                                        <li>
                                            <a href="#"><span>Produkte</span></a>
                                        </li>

                                        <li>
                                            <a href="#"><span>Beratung</span></a>
                                        </li>

                                        <li>
                                            <a href="#"><span>Service-Center</span></a>
                                        </li>

                                        <li>
                                            <a href="#"><span>Ratgeber</span></a>
                                        </li>

                                        <li>
                                            <a href="#"><span>Ihre Sparkasse</span></a>
                                        </li>
                                    </ul>

                                    <div class="nav-concierge">
                                        <ul>
                                            <li>
                                                <a href="#" class="nav-contact" title="Hilfe &amp; Kontakt">Hilfe &amp; Kontakt</a>
                                            </li>

                                            <li><a class="nav-siteselect" href="#" title="Startseite für Firmenkunden">zu Firmenkunden wechseln</a></li>
                                        </ul>
                                    </div>
                                </nav>
                                <div class="nav-concierge">
                                    <ul>
                                        <li>
                                            <a href="#" class="nav-contact" title="Hilfe &amp; Kontakt">Hilfe &amp; Kontakt</a>
                                        </li>

                                        <li><a class="nav-siteselect" href="#" title="Startseite für Firmenkunden">zu Firmenkunden wechseln</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

				<?php
				
					if($detect->isMobile()) {
						//NONE
						
					} else {
						
				?>
                    <div class="header-misc">
                        <a href="#" class="nav-main nbf-guided-tour-navigation_main">Hauptnavigation</a>
                    </div>
				<?php
				
					}
					
				?>
                </div>
            </div>