<?php
// This page attempts to log a user in
try{
  session_start();
  $ID = $_POST["ID"];
  $pass = $_POST["password"];
  $dbh = new PDO('mysql:host=classdb.it.mtu.edu;dbname=quilldb;charset=utf8', 'ID', 'password',
  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// This checks the user name and password(ENCRYPTED)
  foreach ( $dbh->query("call qLogin(\"".$ID."\",ENCODE(\"".$pass."\",'123'))") as $row) {

    if($row[0] == 1 ){
        $_SESSION["name"] = $_POST["ID"];
    }else {
        // If fail redirects to login page
        header("Location: Applications/XAMPP/xamppfiles/htdocs/quill/loginPage.php"); /* Redirect browser */
        $_SESSION["fail"] = true;
        exit();
    }
  // This function gets the users name
  $dbh = new PDO('mysql:host=classdb.it.mtu.edu;dbname=quilldb', "", "");
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  foreach ( $dbh->query("call getSName(\"".$ID."\")") as $row) {
      $_SESSION["Sname"] = $row[0];
  }

}} catch(PDOException $e) {
    print "Error! " . $e->getMessage()."<br/>";
    die();
}

 #$_SESSION["name"] = $_POST["username"];

?>
