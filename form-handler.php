<?php

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = $email = $phone = $message = "";
$nameError = $emailError = $phoneError = $messageError = "";

$isFormValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["name"] == "") {
        $nameError = "The name is missing";
        $isFormValid = false;
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameError = "Just letters and spaces!";
            $isFormValid = false;
        }
    }

    if ($_POST["email"] == "") {
        $emailError = "Email missing";
        $isFormValid = false;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format!";
            $isFormValid = false;
        }
    }

    if (empty($_POST["phone"])) {
        $phoneError = "Mobile number missing";
        $isFormValid = false;
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{9}$/", $phone)) {
            $phoneError = "The phone must have 9 digits!";
            $isFormValid = false;
        }
    }

    if (empty($_POST["message"])) {
        $messageError = "Message missing";
        $isFormValid = false;
    } else {
        $message = test_input($_POST["message"]);
        $length = strlen($message);
        if ($length < 10) {
            $messageError = "Message must have at least 10 characters!";
            $isFormValid = false;
        } else if ($length > 500) {
            $messageError = "Message cannot exceed 500 characters!";
            $isFormValid = false;
        }
    }
}