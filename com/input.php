<?php
require_once "com/dbconnect.php";

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
$confPass = filter_input(INPUT_POST, "confirmPassword", FILTER_SANITIZE_SPECIAL_CHARS);
$hash = password_hash($confPass, PASSWORD_BCRYPT);

$input = db()->prepare("INSERT into validasi.registrasi (name, email, phone, password) VALUES (?,?,?,?)");
$input->bindParam(1, $name);
$input->bindParam(2, $email);
$input->bindParam(3, $phone);
$input->bindParam(4, $hash);
$input->execute();
$input->closeCursor();

header("location: validasi.php", true, 301);
die();



?>