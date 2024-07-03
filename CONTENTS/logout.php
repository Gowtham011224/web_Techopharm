<?php
session_start();
unset($_SESSION['uname']);
echo"<script>window.location.href='cover.html'</script>";
?>