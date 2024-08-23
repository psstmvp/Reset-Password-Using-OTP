<?php
session_start();
include('../Assets/Connection/Connection.php');
if(isset($_POST['btn_submit'])){
	$email=$_POST['txt_email'];
	$pass=$_POST['txt_password'];
	$selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$pass."'";
	$selUser="select * from tbl_user where user_email='".$email."' and user_password='".$pass."'";	
	$selSeller="select * from tbl_seller where seller_email='".$email."' and seller_password='".$pass."'";
	$selBotanist="select * from tbl_botanist where botanist_email='".$email."' and botanist_password='".$pass."'";
	$selDAgent="select * from tbl_deliveryagent where deliveryagent_email='".$email."' and deliveryagent_password='".$pass."'";
	$resAdmin=$Con->query($selAdmin);
	$resUser=$Con->query($selUser);
    $resSeller=$Con->query($selSeller);
	$resBotanist=$Con->query($selBotanist);
	$resDAgent=$Con->query($selDAgent);
	
	if($adminData=$resAdmin->fetch_assoc())
	{
		$_SESSION['aid'] = $adminData['admin_id'];
		$_SESSION['aname'] = $adminData['admin_name'];
		header('location:../Admin/Homepage.php');
	}
	else if($userData=$resUser->fetch_assoc())
	{
		$_SESSION['uid'] = $userData['user_id'];
		$_SESSION['uname'] = $userData['user_name'];
		header('location:../User/Homepage.php');
	}
	else if($sellerData=$resSeller->fetch_assoc())
	{
		$_SESSION['sid'] = $sellerData['seller_id'];
		$_SESSION['sname'] = $sellerData['seller_name'];
		header('location:../Seller/Homepage.php');
	}
	else if($botanistData=$resBotanist->fetch_assoc())
	{
		$_SESSION['bid'] = $botanistData['botanist_id'];
		$_SESSION['bname'] = $botanistData['botanist_name'];
		header('location:../Botanist/Homepage.php');
	}
	else if($DAgentData=$resDAgent->fetch_assoc())
	{
		$_SESSION['did'] = $DAgentData['deliveryagent_id'];
		$_SESSION['dname'] = $DAgentData['deliveryagent_name'];
		header('location:../DeliveryAgent/Homepage.php');
	}
	else{
	?>
    	<script>
		alert("Invalid Credentials")
		</script>
    <?php	
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table width="200" border="1">
  <tr>
    <td>Email</td>
    <td><label for="txt_email"></label>
    <input required type="email" name="txt_email" id="txt_email" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><label for="txt_password"></label>
    <input required type="password" name="txt_password" id="txt_password" /></td>
  </tr>
  <tr>
	<td colspan="2"><a href="ForgetPassword.php">Forget Password</a></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Login" />
    </div></td>
  </tr>
</table>
</form>
</body>
</html>