<?php
///////////////////////////////////////////
///////
/////https://github.com/Rekajunardi//////
///////////////////////////////////////

include 'tri_req.php';
echo " RANDOM LUCKY PRIZE BONSTRI " ;
echo "<br>";
$tri = new tri();
$imei = "868880043302499";
echo "Masukkan Nomer Tri lo : ";
$msisdn = trim(fgets(STDIN));
$otp = $tri->request_otp($msisdn,$imei);
echo $otp[1] . "\r\n";
echo "Udeh masuk otpnya coba cek pesannya ye!";
echo "<br>";
echo "Masukkan Sms OTP : ";
$otp = trim(fgets(STDIN));
$login = $tri->login($msisdn,$otp);
$login = json_decode($login,true);
$bearer = $login['access_token'];
$id = $tri->trans($bearer);
$id = json_decode($id,true);
$id = $id['data'][0]['rewardTransactionId'];
for($id1 = 1500; $id1 < 1600;$id1++)
{
  $miskin = $tri->claim($bearer,$id,$id1);
  echo $miskin . "\r\n";
  sleep(2);
}


?>
