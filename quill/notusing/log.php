<?php
// This page attempts to log a user in
try{
  session_start();
  $ID = $_POST["ID"];
  $pass = $_POST["password"];
  $dbh = new PDO('mysql:host=classdb.it.mtu.edu/group;dbname=quilldb', "bamalets", ""));
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// This checks the user name and password(ENCRYPTED)
  foreach ( $dbh->query("call qLogin(\"".$ID."\",ENCODE(\"".$pass."\",'123'))") as $row) {


    if($row[0] == 1 ){
        header("Location: QuillUserPage.html"); /* Redirect browser */
    }else {
        // If fail redirects to login page
        header("Location: index.html"); /* Redirect browser */
        $_SESSION["fail"] = true;
        exit();
    }

    $_SESSION["Sname"] = $_POST["ID"];
 

}} catch(PDOException $e) {
    print "Error! " . $e->getMessage()."<br/>";
    die();
}

 #$_SESSION["name"] = $_POST["username"];

?>
