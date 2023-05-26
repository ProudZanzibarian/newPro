<?php
$hashedPassword = '$2y$10$/xrAawv/iJ5OvupvQmwdBOBPrAS1la//lmpvwQQnjiVzd.CXaz11S';
$passwordToCheck = '123';

if (password_verify($passwordToCheck, $hashedPassword)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}