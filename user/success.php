<?php
require_once "header.php";
require_once "../config.php";

//session_start();


$data1 = $_SESSION['user_name'];



//echo $data1;



$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("pathw61228838474a4");
$store_passwd=urlencode("pathw61228838474a4@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;



//echo 	$status."".	$tran_date."". "".$tran_id."".$card_type."".$amount."".	$store_amount."".$bank_tran_id ;

$status = "confirmed";
$sql = "INSERT INTO  transaction(user_name,tran_date,tran_id,card_type,amount,bank_tran_id,status) values('$data1','$tran_date','$tran_id','$card_type','$store_amount','$bank_tran_id','$status')";
mysqli_query($link, $sql);


} else {
	echo "Failed to connect with SSLCOMMERZ";
}

$results = mysqli_query($link, "SELECT * FROM login where user_name ='$data1'");
$results1= mysqli_query($link, "SELECT * FROM transaction where id=(select max(id) from transaction)");

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Path-Way Services</h2>

	  <table class="table table-striped table-bordered table-hover table-dark text-center">
  <thead>
    <tr>
      <th>Full Name</th>
	  <th>User Name</th>
     
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
            <td><?php echo $row['name']; ?></td>
			<td><?php echo $row['user_name']; ?></td>
    </tr>
  <?php }?>
</table>

<table class="table table-striped table-bordered table-hover table-dark text-center">
  <thead>
    <tr>
      <th>Transaction Date</th>
	  <th>Transaction Id</th>
	  <th>Card Type</th>
	  <th>Status</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results1)) { ?>
    <tr>
            <td><?php echo $row['tran_date']; ?></td>
			<td><?php echo $row['tran_id']; ?></td>
			<td><?php echo $row['card_type']; ?></td>
			<td><?php echo $row['status']; ?></td>
    </tr>
  <?php }?>
</table>

      <div class="text-center">
        <a href="user_data_print.php" class="btn btn-primary">Print</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>









<?php
 require 'footer.php';
?>


