<?php

require('../view/captcha.php');

$captcha = new Captcha();

if ($captcha->checkCaptcha($_POST['h-captcha-response'])) {
    echo "Subscribir";
} else {
    echo "Captcha incorrecto";
}

?>