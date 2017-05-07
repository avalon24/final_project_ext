<?php

function getTodoItems($user_id,$status) {
    global $db;
    $query='select * from fp_todo_list
            where t_u_id = :user_id and
	          t_status = :status
            order by t_date, t_time asc';
    $statement=$db->prepare($query);
    $statement->bindValue(':user_id',$user_id);
    $statement->bindValue(':status',$status);
    $statement->execute();
    $result=$statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function addTodoItems($user,$date,$time,$desc,$stat) {
    global $db;
    $query='insert into fp_todo_list(t_u_id,t_date,t_time,t_desc,t_status)
                 values (:user,:date,:time,:desc,:stat)';
    $statement=$db->prepare($query);
    $statement->bindValue(':user',$user);
    $statement->bindValue(':date',$date);
    $statement->bindValue(':time',$time);
    $statement->bindValue(':desc',$desc);
    $statement->bindValue(':stat',$stat);
    $statement->execute();
    $statement->closeCursor();
}

function delTodoItems($itemid) {
    global $db;
    $query='delete from fp_todo_list
             where t_id = :itemid';
    $statement=$db->prepare($query);
    $statement->bindValue(':itemid',$itemid);
    $statement->execute();
    $statement->closeCursor();
}

function finTodoItems($itemid) {
    global $db;
    $query='update fp_todo_list
               set t_status = :stat
	     where t_id = :itemid';
    $statement=$db->prepare($query);
    $statement->bindValue(':stat',"C");
    $statement->bindValue(':itemid',$itemid);
    $statement->execute();
    $statement->closeCursor();
}

function updTodoItems($itemid,$new_date,$new_time) {
    global $db;
    $query='update fp_todo_list
               set t_date = :new_date, t_time = :new_time
             where t_id = :itemid';
    $statement=$db->prepare($query);
    $statement->bindValue(':new_date',$new_date);
    $statement->bindValue(':new_time',$new_time);
    $statement->bindValue(':itemid',$itemid);
    $statement->execute();
    $statement->closeCursor();
}

?>
