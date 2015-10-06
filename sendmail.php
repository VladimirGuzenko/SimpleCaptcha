<?php
session_start();
/* Проверка на заполнение полей */
if (isset($_POST['captcha']) && $_SESSION['answer'] == $_POST['captcha']) {
		//OK
		//do action
else {
		//False
		//Return
}

?>
