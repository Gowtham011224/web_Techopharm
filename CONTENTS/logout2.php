<?php
session_start();
unset($_SESSION['flag']);
echo"<script>window.location.href='cover.html'</script>";
?>