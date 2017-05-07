<?php

function userCreate($fname,$lname,$phone,$dob,$gender,$uname,$password,$resetq,$reseta) {
    global $db;
    echo "inside DB Function";
    $chk_count=checkUser($uname);
    if($chk_count == 0) { 
        $query = 'insert into fp_users(u_fname,u_lname,u_phone,u_dob,u_gender,u_email,u_password,u_secretq,u_secreta) 
                       values (:fname,:lname,:phone,:dob,:gender,:uname,:password,:resetq,:reseta)';
        $statement=$db->prepare($query);
        $statement->bindValue(':fname',$fname);
        $statement->bindValue(':lname',$lname);
        $statement->bindValue(':phone',$phone);
        $statement->bindValue(':dob',$dob);
        $statement->bindValue(':gender',$gender);
        $statement->bindValue(':uname',$uname);
        $statement->bindValue(':password',$password);
        $statement->bindValue(':resetq',$resetq);
        $statement->bindValue(':reseta',$reseta);
        $count=$statement->execute();
        $statement->closeCursor();
        echo "updated = $count";
	if($count == 1) {
            return false;
        } else {
            return true;
	}
    } else {
        $result="exists";
        return $result;
    }
}

function checkUser($uname) {
    global $db;
    $query = 'select * from fp_users
              where u_email = :uname';
    $statement=$db->prepare($query);
    $statement->bindValue(':uname',$uname);
    $statement->execute();
    $statement->closeCursor();
    $chk_count=$statement->rowCount();
    return $chk_count;
}

function getQuestion($uname) {
    global $db;
    echo "uname = $uname @ ";
    $query = 'select u.u_id userid, u.u_email uname, sq.sq_desc resetq
	      from fp_users u, secret_ques sq
	      where u.u_email = :uname and
	            u.u_secretq = sq.sq_id';	
    $statement=$db->prepare($query);
    $statement->bindValue(':uname',$uname);
    $statement->execute();
    $result=$statement->fetchAll();
    $count=$statement->rowCount();
    echo "count = $count @ ";
    $statement->closeCursor();
    return $result;
}

function isUserValid($uname,$password) {
    global $db;
    echo "uname = $uname # pwd = $password";
    $query = 'select * from fp_users
              where u_email = :uname';
    $statement=$db->prepare($query);
    $statement->bindValue(':uname',$uname);
    $statement->execute();
    $result=$statement->fetchAll();
    $statement->closeCursor();
    
    $count=$statement->rowCount();
    echo "count = $count ##:";
    if($count == 1) {
        $user = $result[0]['u_fname']." ".$result[0]['u_lname'];
        echo "user = $user";
	setcookie('login',$user);
	/*$_COOKIE['login'] = $user;*/
	setcookie('user_id',$result[0]['u_id']);
	setcookie('secret_ans',$result[0]['u_secreta']);
        return $result;
    } else {
        return false;
    }
}

function updPassword($userid,$password,$reseta) {
    global $db;
    $query='update fp_users
               set u_password = :password
	     where u_id = :userid and
	           u_secreta = :reseta';
    $statement=$db->prepare($query);
    $statement->bindValue(':userid',$userid);
    $statement->bindValue(':password',$password);
    $statement->bindValue(':reseta',$reseta);
    $statement->execute();
    $statement->closeCursor();

    $count=$statement->rowCount();
    if($count == 1) {
        return true;
    } else {
        return false;
    }
}

?>
