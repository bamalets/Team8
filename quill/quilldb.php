<?php

try{
	session_start();
	$ID = $_POST["Username"];
	$pass = $_POST["Password"];
	$dbh = new PDO ('mysql:host=classdb.it.mtu.edu;dbname=quilldb', "quilldb_rw", "Volatile");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


foreach ( $dbh->query("call properLogin(\"".$ID."\",ENCODE(\"".$pass."\",'123'))") as $row) {

    if($row[0] == 1 ){
        $_SESSION["name"] = $_POST["Username"];
    }else {
        // If fail redirects to login page
        header("Location: Applications/XAMPP/xamppfiles/htdocs/quil/homepage"); /* Redirect browser */
        $_SESSION["fail"] = true;
        exit();
    }
  // This function gets the users name
  $dbh = new PDO('mysql:host=classdb.it.mtu.edu;dbname=quilldb', "quilldb_rw", "Volatile");
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  foreach ( $dbh->query("call getSName(\"".$ID."\")") as $row) {
      $_SESSION["Sname"] = $row[0];
  }

}}catch(PDOException $e) {
    print "Error! " . $e->getMessage()."<br/>";
    die();
}


?>
