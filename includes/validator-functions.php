<?php 

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function generateUserId($firstName, $lastName) {
    $pre = strtolower(substr($firstName,0,1) . substr($lastName,0,1));
    return $pre . "-" . uniqid();
}

function checkPhoneNumber($value) {
    $phone = preg_replace('/[^0-9]/', '', $value);
    if (str_starts_with($phone, '92')) {
        $phone = substr($phone, 2);
        $phone='0'.$phone;
    }
    if (strlen($phone) === 11 ) {
        return true;
    }
    return false;
}

function checkEmail($value) {
    $email = trim($value);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    if (strlen($email) > 254) {
        return false;
    }
    
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    if (!preg_match($pattern, $email)) {
        return false;
    }
    
    return true;
}

?>