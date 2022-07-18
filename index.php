<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>

<div class="topnav">
 
  <div class="login-container">
  <a class="active">Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b></a>
      <a href="logout.php" >Logout</a>
      <a ><?php //print_r($_SESSION["userRoles"]); ?></a>
  </div>
</div>

<?php 
if(in_array( '1', $_SESSION["userRoles"]) || in_array( '2', $_SESSION["userRoles"])){
   

?>

<div class="container">

<div class="col-md-5">
      <form action="" method="get">
        <div class="form-group row" >
            <input type="text" name="search" id="myInput" onkeyup="" class="form-control col-md-8" placeholder="Search " value=""/>
        
            <input type="submit"  class="btn btn-primary searchbutton col-md-2" value="Search" />
        </div>
      </form>
</div>  

</div>
<center>  
    <?php  
      
    // Import the file where we defined the connection to Database.     
        require_once "dbConnection/connection.php";   

        if($mysqli === false){
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }
        
        $per_page_record = 10;    
      
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
          $page=1;    
        }    
    
        $start_from = ($page-1) * $per_page_record;   
        if(isset($_GET['search'])){

            $search_var = $_GET['search'];

            $query = "SELECT * FROM tbl_users WHERE name LIKE '%".$search_var."%' OR email LIKE '%".$search_var."%'";
        }else {
    
        $query = "SELECT * FROM tbl_users LIMIT $start_from, $per_page_record";  
    }   
        if($result = $mysqli->query($query)){  
    ?>    
  
    <div class="container">   
      <br>   
      <div>   
          
        <table class="table table-striped table-condensed    
                                          table-bordered" id="myTable2">   
          <thead>   
            <tr>   
              <th width="10%" onclick="sortTable(0)">ID <i class="fa fa-sort"></i></th>   
              <th onclick="sortTable(1)">Email <i class="fa fa-sort"></i></th>   
              <th onclick="sortTable(2)">Name <i class="fa fa-sort"></i></th>   
            </tr>   
          </thead>   
          <tbody>   
    <?php     
            if($result->num_rows > 0){  
                while($row = $result->fetch_array()){    
            ?>     
            <tr>     
             <td><?php echo $row["user_id"]; ?></td>     
            <td><?php echo $row["email"]; ?></td>   
            <td><a href="manage_user_roles.php?id=<?php echo $row["user_id"]; ?>"><?php echo $row["name"]; ?></a></td>                                           
            </tr>     
            <?php  
             }   
             $result->free();
                 } else{
                    echo "No records matching your query were found.";
                }   
            ?>     
          </tbody>   
        </table>   
  
     <div class="pagination" >    
      <?php  
        $query = "SELECT * FROM tbl_users";  
        $result = $mysqli->query($query);
        //if($result->num_rows > 0){  
            
        $total_records = $result->num_rows;   
        //echo $total_records;  
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='index.php?page=".($page-1)."'>  ❮ </a>";   
        }       
        
        echo '<select class="custom-select" onChange="window.document.location.href=this.options[this.selectedIndex].value;">';
          
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
            //   $pagLink .= "<a class = 'active' href='index.php?page="  
            //                                    .$i."'>".$i." </a>";  
            $pagLink .= "<option selected value='index.php?page="  
                                               .$i."'>".$i." </option>"; 
            
          }               
          else  {   
            //   $pagLink .= "<a href='index.php?page=".$i."'>   
            //                                     ".$i." </a>";   
            $pagLink .= "<option value='index.php?page="  
            .$i."'>".$i." </option>";  
          }   
        }  
          
        echo $pagLink;  
        echo "</select>";  
  
        if($page<$total_pages){   
            echo "<a href='index.php?page=".($page+1)."'>  ❯ </a>";   
        }   
  
      ?>    
      </div>  
  
  
         
    </div>   
  </div>  
  <?php 
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
     
    // Close connection
    $mysqli->close();
  ?>
</center>  

<?php 
  }else{  ?>
    <div class="container">
<div class="alert alert-danger" role="alert">
  You don't have permission to access this page
</div>  
</div>
<?php  } ?>
   

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable2");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}


function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</body>
</html>