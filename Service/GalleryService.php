<?php

include('../Config/dbConfig.php');

$query = $db->query("SELECT * FROM gallery ORDER BY uploaded_on DESC");
 if($query->num_rows > 0){
 }

