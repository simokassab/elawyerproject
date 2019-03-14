<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once '../config.php';
require_once '../functions/global.php';
if(isset($_POST['save'])){
	$con = connectDB($_SESSION['office']);
	$query="";
		$users=GetAllUsers();
		foreach($users as $us){
			// customer READ AND WRITE CHECK
			if( (isset($_POST['r_cust_'.$us['ID']])) && (!isset($_POST['w_cust_'.$us['ID']])) ){
				$query= "update rights set cust='R' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_cust_'.$us['ID']])) && (isset($_POST['w_cust_'.$us['ID']])) ){
				$query= "update rights set cust='W' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (isset($_POST['r_cust_'.$us['ID']])) && (isset($_POST['w_cust_'.$us['ID']])) ){
				$query= "update rights set cust='RW' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_cust_'.$us['ID']])) && (!isset($_POST['w_cust_'.$us['ID']])) ){
				$query= "update rights set cust='N' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}

			// e-staff READ AND WRITE CHECK
			if( (isset($_POST['r_staf_'.$us['ID']])) && (!isset($_POST['w_staf_'.$us['ID']])) ){
				$query= "update rights set staf='R' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_staf_'.$us['ID']])) && (isset($_POST['w_staf_'.$us['ID']])) ){
				$query= "update rights set staf='W' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (isset($_POST['r_staf_'.$us['ID']])) && (isset($_POST['w_staf_'.$us['ID']])) ){
				$query= "update rights set staf='RW' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_staf_'.$us['ID']])) && (!isset($_POST['w_staf_'.$us['ID']])) ){
				$query= "update rights set staf='N' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}

			// events READ AND WRITE CHECK
			if( (isset($_POST['r_even_'.$us['ID']])) && (!isset($_POST['w_even_'.$us['ID']])) ){
				$query= "update rights set even='R' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_even_'.$us['ID']])) && (isset($_POST['w_even_'.$us['ID']])) ){
				$query= "update rights set even='W' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (isset($_POST['r_even_'.$us['ID']])) && (isset($_POST['w_even_'.$us['ID']])) ){
				$query= "update rights set even='RW' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_even_'.$us['ID']])) && (!isset($_POST['w_even_'.$us['ID']])) ){
				$query= "update rights set even='N' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}

			// arch READ AND WRITE CHECK
			if( (isset($_POST['r_arch_'.$us['ID']])) && (!isset($_POST['w_arch_'.$us['ID']])) ){
				$query= "update rights set arch='R' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_arch_'.$us['ID']])) && (isset($_POST['w_arch_'.$us['ID']])) ){
				$query= "update rights set arch='W' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (isset($_POST['r_arch_'.$us['ID']])) && (isset($_POST['w_arch_'.$us['ID']])) ){
				$query= "update rights set arch='RW' where userID=".$us['ID'];
				mysqli_query($con, $query);

			}
			if( (!isset($_POST['r_arch_'.$us['ID']])) && (!isset($_POST['w_arch_'.$us['ID']])) ){
				$query= "update rights set arch='N' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}

			// acct READ AND WRITE CHECK
			if( (isset($_POST['r_acct_'.$us['ID']])) && (!isset($_POST['w_acct_'.$us['ID']])) ){
				$query= "update rights set acct='R' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_acct_'.$us['ID']])) && (isset($_POST['w_acct_'.$us['ID']])) ){
				$query= "update rights set acct='W' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (isset($_POST['r_acct_'.$us['ID']])) && (isset($_POST['w_acct_'.$us['ID']])) ){
				$query= "update rights set acct='RW' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_acct_'.$us['ID']])) && (!isset($_POST['w_acct_'.$us['ID']])) ){
				$query= "update rights set acct='N' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}

			// supervision READ AND WRITE CHECK
			if( (isset($_POST['r_supe_'.$us['ID']])) && (!isset($_POST['w_supe_'.$us['ID']])) ){
				$query= "update rights set supe='R' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_supe_'.$us['ID']])) && (isset($_POST['w_supe_'.$us['ID']])) ){
				$query= "update rights set supe='W' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (isset($_POST['r_supe_'.$us['ID']])) && (isset($_POST['w_supe_'.$us['ID']])) ){
				$query= "update rights set supe='RW' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_supe_'.$us['ID']])) && (!isset($_POST['w_supe_'.$us['ID']])) ){
				$query= "update rights set supe='N' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}

			// new consultation READ AND WRITE CHECK
			if( (isset($_POST['r_cons_'.$us['ID']])) && (!isset($_POST['w_cons_'.$us['ID']])) ){
				$query= "update rights set cons='R' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_cons_'.$us['ID']])) && (isset($_POST['w_cons_'.$us['ID']])) ){
				$query= "update rights set cons='W' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (isset($_POST['r_cons_'.$us['ID']])) && (isset($_POST['w_cons_'.$us['ID']])) ){
				$query= "update rights set cons='RW' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_cons_'.$us['ID']])) && (!isset($_POST['w_cons_'.$us['ID']])) ){
				$query= "update rights set cons='N' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}

			// news READ AND WRITE CHECK
			if( (isset($_POST['r_news_'.$us['ID']])) && (!isset($_POST['w_news_'.$us['ID']])) ){
				$query= "update rights set news='R' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_news_'.$us['ID']])) && (isset($_POST['w_news_'.$us['ID']])) ){
				$query= "update rights set news='W' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (isset($_POST['r_news_'.$us['ID']])) && (isset($_POST['w_news_'.$us['ID']])) ){
				$query= "update rights set news='RW' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
			if( (!isset($_POST['r_news_'.$us['ID']])) && (!isset($_POST['w_news_'.$us['ID']])) ){
				$query= "update rights set news='N' where userID=".$us['ID'];
				mysqli_query($con, $query);
			}
		}
		//echo $query;
		//if(mysqli_query($con, $query)){
        //	return true;
	    //} else {
	      //  echo "Error: " . $query . "<br>" . mysqli_error($con);
	    //}
	    mysqli_close($con);

}


header("location: rights.php");
?>