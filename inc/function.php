<?php
include ("inc/db.php");
function validateLogin($username, $password)
{
    GLOBAL $mysqli;
    $sql ="SELECT POSITION,USERNAME,PASSWORD FROM users WHERE USERNAME=$username AND PASSWORD =$password";
    $admin = $mysqli->query($sql);
    $row = $admin->fetch_array();
   if ($row['POSITION'] == "admin" && $row['USERNAME'] == $username && $row['PASSWORD'] == $password) {
        session_start();
        $_SESSION['USERNAME'] = $row['USERNAME'];
        return "4";
      }
//   else if ($row['position'] == "admin" && $row['username'] == $username && $row['password'] == $password) {
//        session_start();
//        $_SESSION['user_id'] = $row['employee_id'];
//        return "5";
//    }
   else {
        return "2";
    }


}

?>
