<?php
  session_start();
?>

<!DOCTYPE html>
<html>


<body>
  <div>
    <!--login form-->
    <form action="log.php" method = "post" id = "log">
      Username: <input type= "text" name="ID" /><br />
      Password: <input type= "password" name= "password"><br />

      <input type="submit" name = "ok" value= "Submit">

    </form>
   </div>
<?php
  // If fail login, resends user to login page
  if(isset($_SESSION["fail"])){
    echo "Failed login...";
    session_destroy();
  }
?>

</body>
</html>
