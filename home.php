<?php 
include("db.php");
// This will stop users from accessing restricted pages
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect user home after attempting access URL's outwith their reach
  header('location: index.html.php');
  exit;
}
?>
 <?php
  // Protects against SQL injection and get vinylName & rDate or the item selected
  $homeID = mysqli_real_escape_string($con, $_GET['HomeID']);
  $HomeLocation = mysqli_real_escape_string($con, $_GET['HomeLocation']);
  // Create query to display item selected
  $sql = "SELECT * FROM Home WHERE HomeID='$homeID' AND Location='$HomeLocation'";
  $result = mysqli_query($con, $sql);
  $queryResult = mysqli_num_rows($result);

  if ($queryResult > 0){ // Display item to view
    while ($row = mysqli_fetch_assoc($result)){      
      echo '<section><center><div class="item-box">
        <p1><img class="u-image u-image-default u-image-2" src="' . $row['homeImage'] .'" alt="Home Image" width="150" height="150"><br></p1>
        <p1><b>Home ID</b>: <br>'.$row['HomeID'].'<br></p1>
        <p1><b>Description</b>: <br>'.$row['Description'].'<br></p1>
        <p1><b>Artist</b>: <br>'.$row['HomeLocation'].'<br></p1>
        <p1><b>Price</b>: <br>'.$row['Price'].'<br></p1>
      </div></a></center></section>';
    }
  }
?>