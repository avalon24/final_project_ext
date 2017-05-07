<?php
require('../final_project/model/database.php');
require('../final_project/model/db_function.php');

    $action=filter_input(INPUT_POST,'action');
    if($action == NULL) {
        $action=filter_input(INPUT_GET,'action');
        if($action == NULL) {
            $action = "view_login";
	}
    }
    if($action == 'view_login') {
        include ('login.php');
    } else if($action == 'user_logout') {
        include ('logout.php');
    } else if($action == 'user_login') {
        $uname=filter_input(INPUT_POST,'user_name');
        $password=filter_input(INPUT_POST,'user_pwd');
        $result=isUserValid($uname,$password);
        if($result == true) {
	    if($result[0]['u_password'] == $password) {
	        header ("Location: ./todo/home.php");
            } else {
	        $message = "Incorrect Password!!";
	        include ('./login.php');
	    }
        } else {
	    $message = "User ID does not exist!!";
            include ('./login.php');
	}
    } else if($action == 'new_user') {
        $fname=filter_input(INPUT_POST,'f_name');
        $lname=filter_input(INPUT_POST,'l_name');
        $phone=filter_input(INPUT_POST,'contact');
        $dob=filter_input(INPUT_POST,'dob');
        $gender=filter_input(INPUT_POST,'gender');
        $uname=filter_input(INPUT_POST,'email');
        $password=filter_input(INPUT_POST,'password');
        $passtemp=filter_input(INPUT_POST,'pass_temp');
        $resetq=filter_input(INPUT_POST,'reset_ques');
	$reseta=filter_input(INPUT_POST,'reset_ans');
	if($password === $passtemp) {
	    if($fname != NULL && $lname != NULL && $dob != NULL && $uname != NULL && $password != NULL && $resetq != NULL && $reseta != NULL) {
	        $result=userCreate($fname,$lname,$phone,$dob,$gender,$uname,$password,$resetq,$reseta);
		if($result == false) {
		    $success="Successfully Registered! Try login now!";
		    include ('login.php');
		} else if($result == "exists") {
		    $message="User email already exists! Create a new account or Try login!";
                    include ('register.php');
		} else {
		    $message="Sorry could not register your profile! Please try again or contact admin if issue persists!";
		    include ('register.php');
		}
	    } else {
	        $message="All mandatory fields must be populated!!";
                include ('register.php');
	    }
	} else {
	    $message="Passwords do not match!!";
	    include ('register.php');
	}
    } else if($action == 'get_ques') {
        $uname=filter_input(INPUT_POST,'user_name');
	$result=getQuestion($uname);
	echo "result has "; echo $result[0]['userid'];
	include ('pwd_reset_nxt.php');
    } else if($action == 'pwd_reset') {
        $userid=filter_input(INPUT_POST,'userid');
        $uname=filter_input(INPUT_POST,'uname');
	$password=filter_input(INPUT_POST,'password');
	$passtemp=filter_input(INPUT_POST,'pass_temp');
	$reseta=filter_input(INPUT_POST,'reseta');
	if($password === $passtemp) {
	    if($reseta != NULL && $password != NULL) {
	        $result=updPassword($userid,$password,$reseta);
		if($result == true) {
		    $success="Password changed! Try login now!";
		    include ('login.php');
		} else {
		    $message="Sorry could not change your password! Please try again or contact admin if issue persists!";
		    $result=getQuestion($uname);
		    include ('pwd_reset_nxt.php');
	        }
	    } else {
	        $message="All fields must be populated!";
		$result=getQuestion($uname);
		include ('pwd_reset_nxt.php');
            }
        } else {
	    $message="Passwords do not match!!";
	    $result=getQuestion($uname);
	    include ('pwd_reset_nxt.php');
	}
    }
?>
