<?php
session_start();
session_unset($_SESSION['user']);
session_destroy();

header('location: login_admin.html');
?>