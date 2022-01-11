<?php
session_start();
include('../settings/dbconfig.php');
session_unset();
session_destroy();
header('location:index.php?message=Vous avez été déconnecté avec succès');
?>