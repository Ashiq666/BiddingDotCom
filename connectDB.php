<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "biddingdotcom";

// Create connection
$con = new mysqli($servername, $username, $password, $DBname);

// Check connection
if ($con) {
  ?>
  <script>
      alert("connect successfully")
  </script>
  <?php
}else{
  ?>
  <script>
      alert("no")
  </script>
  <?php
}

?>