<?php
include_once "../database/DB.php";
include_once "../controllers/usercontroller.php";
include_once "../controllers/chatcontroller.php";


if ($_POST['new_user']) {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $phone = htmlspecialchars($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $dept = $_POST['department'];

    $ins = new UserController();
    $ins->add_user($name, $surname, $phone, $password, $dept);

    unset($ins);
}

if ($_POST['login']) {
    $phone = htmlspecialchars($_POST['phone']);
    $password = htmlspecialchars($_POST['password']);

    $ins = new UserController();
    $ins->login($phone, $password);
    unset($ins);
}

if ($_POST['new_msg']) {
    session_start();
    $id = $_SESSION['ID'];
    $msg = $_POST['msg'];

    $ins = new ChatController();
    $ins->send_message($id, $msg);

    unset($ins);
}

if ($_POST['new_specific_msg']) {
    $userid = $_POST['user_id'];
    $receiverid = $_POST['receiver_id'];
    $msg = $_POST['msg'];
    $name = $_POST['receiver_name'];
    $surname = $_POST['receiver_surname'];

    $ins = new ChatController();
    $ins->send_specific_message($userid, $receiverid, $msg, $name, $surname);
}


print_r($_POST);
