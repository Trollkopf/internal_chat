<?php
include_once "../database/DB.php";
include_once "../controllers/usercontroller.php";
include_once "../controllers/chatcontroller.php";


    if($_POST['new_user']){
        $name=htmlspecialchars($_POST['name']);
        $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
        $dept=$_POST['department'];

        $ins = new UserController();
        $ins->add_user($name, $password, $dept);

        unset($ins);
    }

    if($_POST['new_msg']){
        session_start();
        $id=$_SESSION['ID'];
        $msg=$_POST['msg'];

        $ins = new ChatController();
        $ins->send_message($id, $msg);

        unset($ins);
    }

    print_r($_POST);
