<?php
if(isset($_SESSION['bejelentkezes']))
{
    unset($_SESSION['bejelentkezes']);
}
header("Location: index.php");
?>