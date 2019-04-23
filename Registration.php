<?php

include_once 'sql.php';

// fetching and validating the enrollment no
if(!isset($_POST['er_no']) || empty($_POST['er_no']))
{
	header("Location: index.php?err_messg_sign=The enrollment number can't be left blank#work"); //redirecting to the registration page with a error message
}





// Assigning the value to the Er_no
if(isset($_POST['er_no']) && !empty($_POST['er_no']) )
{
	$er_no=htmlentities(strtolower($_POST['er_no']));
}
else
{
	header("location: index.php?err_messg_sign=Invalid Enrollment Number#work");
}





// fetching and validating First Name and last name
if(!isset($_POST['f_name']) || !isset($_POST['l_name']) || empty($_POST['f_name']) || empty($_POST['l_name']))
{
	header("location: index.php?err_messg_sign=The name releated fields couldn't be left blank!#work");
}



// Assigning the value to First name and the last name
if(isset($_POST['f_name']) && !empty($_POST['f_name']) && isset($_POST['l_name'])&& !empty($_POST['l_name']) && strlen($_POST['f_name'])<=20 && strlen($_POST['f_name'])<=20 )
{
	$f_name=htmlentities(strtoupper($_POST['f_name']));
	$l_name=htmlentities(strtoupper($_POST['l_name']));
}
else
{
	header("Location: index.php?err_messg_sign=Invalid Name Entries!!");
}

// Fetching and validating the E-mail Address
if(!isset($_POST['e_mail']) && empty($_POST['e_mail']))
{
	header("location: index.php?err_messg_sign=E-mail Field could not be left blank#work"); //redirecting to the registration page with a error message
}
else
{
	$email=htmlentities($_POST['e_mail']);
}
 
//Assigning and fetching the Phone Number
if(!isset($_POST['ph_no']) || empty($_POST['ph_no']))
{
	header("location: index.php?err_messg_sign=Please provide with phone number#work"); //redirecting to the registration page with a error message
}


//Validating the Phone Number
if(isset($_POST['ph_no']) && !empty($_POST['ph_no']) && is_numeric($_POST['ph_no']))
{
	$ph_no=htmlentities(strtolower($_POST['ph_no']));
}
else
{
	header("location: index.php?err_messg_sign=Invalid Phone Number#work");
}


//Assigning and fetching the Password
if(!isset($_POST['psswd']) || empty($_POST['psswd']))
{
	header("Location: index.php?err_messg_sign=Password field could not be left blank#work"); //redirecting to the registration page with a error message
}
else
{
	$psswd=htmlentities($_POST['psswd']);
	$psswd=password_hash('".$psswd."',PASSWORD_DEFAULT);
}


//Fetching the ip address
function get_ip_address()
{
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$ip_addr=get_ip_address();



//Assigning score 0 at the time of the new registaraion
$score = 0;


//Creating the Userid
$userid='CRY'.rand(100,999).substr($er_no,-3);


//Sql Query 
if(!empty($er_no)&&!empty($f_name)&&!empty($l_name)&& !empty($email) && !empty($ph_no) && !empty($psswd))
{
	$query="INSERT INTO users (er_no,f_name,l_name,e_mail,ph_no,psswd,ip_addr,score,user_id,time) VALUES ('".$er_no."','".$f_name."','".$l_name."','".$email."','".$ph_no."','".$psswd."','".$ip_addr."','".$score."','".$userid."',NOW())";
	if(mysqli_query($con,$query))
	{
		include_once 'core.inc.php';
		
		$_SESSION['er_no']=$er_no;
		header("Location: quiz/index.php");
	}
	else
	{
		header('Location: index.php?err_messg_sign=Already a player with the user id#work');
	}
}
else
{
	header('Location: index.php?err_messg_sign=All fields are mandatory#work');
}
?>