<?php
@session_start();
$_SESSIO = array();
session_destroy();
header("location:../");
?>