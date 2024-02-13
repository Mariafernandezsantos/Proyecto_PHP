<?php
require 'connect.php';
$query="INSERT INTO usuarios (nombre) VALUES ('Merce')";
$result=mysqli_query($connection,$query);