<?php
session_start();
/* �������� �� ���������� ����� */
if (isset($_POST['captcha']) && $_SESSION['answer'] == $_POST['captcha']) {
		//OK
		//do action
else {
		//False
		//Return
}

?>
