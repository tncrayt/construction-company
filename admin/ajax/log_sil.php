<?php

require("../connection.php");

$loglar = $pdo->query("DELETE FROM loglar");
header("Location:../log-islem.php");