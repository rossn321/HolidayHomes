<?php 
include("db.php");
// This will stop users from accessing restricted pages
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect user home after attempting access URL's outwith their reach
  header('location: index.html');
  exit;
}
?>
   <?php
  if (isset($_POST['submit-search'])){  // If search has been selected then search the database and display result 
    $search = mysqli_real_escape_string($con, $_POST['search']); // Protects against SQL injection 
    // Search query 
    $sql = "SELECT * FROM Home WHERE Description LIKE '%$search%' OR HomeLocation LIKE '%$search%' OR Price LIKE '%$search%'";
    
    $result = mysqli_query($con, $sql);
    $queryResult = mysqli_num_rows($result); // set $queryResult to the returned query result
    if ($queryResult > 0){  // If query result is greater than 0 output result(s)
      while($row = mysqli_fetch_assoc($result)){ 
        // Display searches items
        echo "<a href ='home.php?HomeID=".$row['HomeID']."'><div class='Home'>                             
          <p1><img class=u-image u-image-default u-image-2 src=" . $row['homeImage'] ." alt=Stock Image width=150 height=150></p1>
          <p1><br>".$row['HomeImage']."<br></p1></a>
          <p1><center><b>Description</b>: <br>".$row['Description']."<br></center></p1>
          <p1><b>Artist: </b>".$row['HomeLocation']."<br></p1>
          <p1><center><b>Genre: </b>".$row['Price']."</center></p1>                    
      </div>";
      
      }
    } else { // If query result == 0 display error 
      echo "<p1> There are no results matching your search </p1>";
    }
  }

?>