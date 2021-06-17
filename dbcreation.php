<?php
require "dbconnection.php";
$dbsql="CREATE DATABASE iSecure";
$dbresult= mysqli_query($conn, $dbsql);
if ($dbresult) {
    echo "DB created<br>";

}
else echo "Error Ocuured.".mysqli_error($conn)."<br>";

$tablesql="CREATE TABLE `isecure`.`users` ( `s_no` INT(11) NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `password` VARCHAR(255) NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`s_no`), UNIQUE `Name` (`username`)) ENGINE = InnoDB;";
$tableresult= mysqli_query($conn, $tablesql);
if ($tableresult) {
    echo "Table created";

}
else echo "Error Ocuured.".mysqli_error($conn);

?>