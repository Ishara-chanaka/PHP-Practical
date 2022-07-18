<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$err = $success = "";

require_once "dbConnection/connection.php";   

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

if (isset($_GET["id"])) {    
    $user_id  = $_GET["id"];    
}    
else {    
    $user_id = 0;    
}  



if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["loguserid"]))){
        $loggeduserid_err = "You are not a valid user";
    } else{
        $logged_userid = trim($_POST["loguserid"]);
    }

    if(empty(trim($_POST["selectuserid"])) || $_POST["selectuserid"] == 0){
        $selecteduserid_err = "Plese select a user";
    } else{
        $selected_userid = trim($_POST["selectuserid"]);
    }

    $selected_user_role  = $_POST["to"];

    if(sizeof($selected_user_role) == 0){
        $sql = "DELETE FROM tbl_user_assign_roles WHERE user_id = ".$selected_userid;
                if($mysqli->query($sql) === true){
                    echo "Records were deleted successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                }

        $selectedUserRole_err = "Plese select a user role";
    } else{
        $selectedUserRole = $selected_user_role;
    }

    $create_date = date('Y-m-d H:i:s');
    
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
    $getUserRoleId  = '';

    foreach ($selectedUserRole as $userRole){
        $sql = "SELECT user_assign_role_id FROM tbl_user_assign_roles WHERE user_id = $selected_userid AND user_role_id = $userRole";
        //echo $sql;
        $result = $mysqli->query($sql);
        if($result->num_rows > 0){ 
            $result = false;
        }else{
            $sql = "INSERT INTO  tbl_user_assign_roles (user_id, user_role_id, user_assign_role_status, create_user, create_date)
            VALUES ($selected_userid,$userRole,1,$logged_userid,'$create_date')";
            if($mysqli->query($sql) === true){
                //echo "Records inserted successfully.";
                $result = true;
            } else{
                //echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                $result = false;
            }
        }   

        $getUserRoleId = $userRole.','.$getUserRoleId;
        
    }

    $checkUserRoleId = rtrim($getUserRoleId, ',');

    $query = "SELECT user_assign_role_id FROM tbl_user_assign_roles WHERE user_id = $selected_userid AND user_role_id NOT IN($checkUserRoleId )"; 
    if($result = $mysqli->query($query)){  
        if($result->num_rows > 0){  
            while($row = $result->fetch_array()){
                $sql = "DELETE FROM tbl_user_assign_roles WHERE user_assign_role_id= ".$row['user_assign_role_id'];
                if($mysqli->query($sql) === true){
                    
                    $success = "Records were deleted successfully";
                    $_SESSION["messageSuccess"] = $success; 
                } else{
  
                    $error = "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    $_SESSION["messageFalier"] = $error;
                }
            }
        }
    }
    
	 if ($result) {
		$success = "Successfully assigned new role to user";
        $_SESSION["messageSuccess"] = $success; 
	 } else {
		$err = "Something went wrong!..";
        $_SESSION["messageFalier"] = $err; 
	 }
    
     header("location: manage_user_roles.php?id=$selected_userid");
    die;
} 

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assects/lib/google-code-prettify/prettify.css" />
    
</head>
<body>

<div class="topnav">
 
  <div class="login-container">
  <a class="active">Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b></a>
      <a href="logout.php" >Logout</a>
  </div>
</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post">
<input type="hidden" name="loguserid" value="<?php echo $_SESSION["id"]; ?>">
<div class="container">
<h3>Manage user roles</h3>

<div class="container">
    
        <?php 
        
        if(!empty($_SESSION["messageFalier"])){
            echo '<div class="alert alert-danger">' . $_SESSION["messageFalier"] . '</div>';
        } elseif(!empty($_SESSION["messageSuccess"])){
            echo '<div class="alert alert-success">' . $_SESSION["messageSuccess"] . '</div>';
        }       
        ?>
</div>
<div class="col-md-5">
     
        <div class="form-group row" >
           Select User :   
           <select name="selecteduser" id="selecteduser" onChange="window.document.location.href=this.options[this.selectedIndex].value;" class="form-control <?php echo (!empty($selecteduserid_err)) ? 'is-invalid' : ''; ?>">
            <option value="0">Use One</option>
            <?php 
                $query = "SELECT * FROM tbl_users";  
                if($result = $mysqli->query($query)){
                    if($result->num_rows > 0){  
                        while($row = $result->fetch_array()){ 
                            if( $row['user_id'] == $user_id) {
                                $value = "selected";
                            }else { $value = ""; }

                            echo "<option value='manage_user_roles.php?id="  
                            .$row['user_id']."' $value>".$row['name']."</option>";
                        }
                        $result->free();
                    }
                }
            ?>
           </select>
           <input type="hidden" name="selectuserid" value="<?php echo $user_id; ?>">
           <span class="invalid-feedback"><?php echo $selecteduserid_err; ?></span>
        
        </div>
    
</div>  
</div>

<div class="container">

<div class="row">

    <div class="col-xs-5">
        <h3>Avilable roles</h3>
        <select name="from[]" id="userRoles" class="form-control" size="8" multiple="multiple">
            <?php 
                $query = "SELECT * FROM tbl_user_roles WHERE user_role_status =1";  
                if($result = $mysqli->query($query)){
                    if($result->num_rows > 0){  
                        while($row = $result->fetch_array()){ 
                    
                            echo "<option value=".$row['user_role_id'].">".$row['user_role_name']."</option>";
                        }
                        $result->free();
                    }
                }
            ?>
        </select>
    </div>
    
    <div class="col-xs-2">
    <br/><br/><br/><br/><br/>
        <button type="button" id="userRoles_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
        <button type="button" id="userRoles_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
        
    </div>
    
    <div class="col-xs-5">
    <h3>Assigned Roles</h3>
        <select name="to[]" id="userRoles_to" class="form-control" size="8" multiple="multiple">
        <?php 
                $query = "SELECT t2.user_role_id, t2.user_role_name FROM tbl_user_assign_roles AS t1 INNER JOIN tbl_user_roles AS t2 ON t1.user_role_id = t2.user_role_id  WHERE t1.user_id =$user_id";  
                if($result = $mysqli->query($query)){
                    if($result->num_rows > 0){  
                        while($row = $result->fetch_array()){ 
                    
                            echo "<option value=".$row['user_role_id'].">".$row['user_role_name']."</option>";
                        }
                        $result->free();
                    }
                }
            ?>
        </select>
    </div>
</div>

<div class="row">
<br/><br/><br/>
<div class="col-xs-5"></div>
<div class="col-xs-4">
    <?php 
    if(in_array( '1', $_SESSION["userRoles"]) ){
        echo "<input type='submit' name='search_btn' class='btn btn-primary searchbutton col-md-2' value='Save' />";
    }
    ?>

</div>
<div class="col-xs-3"></div>

</div>

</div>
</form>
 
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>
<script type="text/javascript" src="assects/dist/js/multiselect.min.js"></script>   

<script type="text/javascript">
$(document).ready(function() {
    // make code pretty
    window.prettyPrint && prettyPrint();

    $('#userRoles').multiselect({
        sort: {
            left: function(a, b) {
                return a.value > b.value ? 1 : -1;
            },
            right: function(a, b) {
                return a.value < b.value ? 1 : -1;
            }
        }
    });
});
</script>

<?php  $mysqli->close(); ?>
</body>
</html>