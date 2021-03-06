<?php

// Initialize the session
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	

 exit();
}


// Check if the user is already logged in, if yes then redirect him to welcome page

// Include config file
require_once "conectarebook.php";
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
 // Check if username is empty
 if(empty(trim($_POST["username"]))){
 $username_err = "Please enter username.";
 } else{
 $username = trim($_POST["username"]);
 }

 // Check if password is empty
 if(empty(trim($_POST["password"]))){
 $password_err = "Please enter your password.";
 } else{
	 
 $password = trim($_POST["password"]);
 }
 
 // Validate credentials
 if(empty($username_err) && empty($password_err)){
 // Prepare a select statement
 $sql = "SELECT id, username, password FROM user WHERE username = ?";

 if($stmt = $mysqli->prepare($sql)){
 // Bind variables to the prepared statement as parameters
 $stmt->bind_param("s", $param_username);

 // Set parameters
 $param_username = $username;

 // Attempt to execute the prepared statement
 if($stmt->execute()){
 // Store result
 $stmt->store_result();

 // Check if username exists, if yes then verify password
 if($stmt->num_rows == 1){
 // Bind result variables
 $stmt->bind_result($id, $username, $hashed_password);
 if($stmt->fetch()){
 if(password_verify($password, $hashed_password)){
 // Password is correct, so start a new session
 session_start();

 // Store data in session variables
 $_SESSION["loggedin"] = true;
 $_SESSION["id"] = $id;
 $_SESSION["username"] = $username;
if($_SESSION['username']!='root' && $password!='administrator')
{header("location:indexbook1.php");
}
 else{
 header("location:indexadministrare.htm");
 }
 } 
 else{
 // Display an error message if password is not valid
 $password_err = "The password you entered was not valid.";
 }
 }
 } else{
 // Display an error message if username doesn't exist
 $username_err = "No account found with that username.";
 }
 } else{
 echo "Oops! Something went wrong. Please try again later.";
 $stmt->close(); }
 }
 

 // Close statement

 }

 // Close connection
 $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Login</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
 <style type="text/css">





.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited
 {
    background-color: blue !important;
}

p a{ color:crimson;}

                  
.monotype{font-family:monotype corsiva,cursive; font-size:80px; color:black; margin:15px; }

body{
	 	font: 14px sans-serif;
		background-repeat: no-repeat;
        background-attachment: fixed;
		background:url(indeximg.jpg) top right no-repeat; 
		  background-position: right top; 
		
		
	 } 


 </style>
</head>
<body>
<
 <div  class="wrapper">
 <h2>Login</h2>
 <p>Please fill in your credentials to login.</p>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
 <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
 <label>Username</label>
 <input type="text" name="username" style="width: 200px; height: 30px" class="form-control" value="<?php echo $username;
?>">
 <span class="help-block"><?php echo $username_err; ?></span>
 </div>
 <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
 <label>Password</label>
 <input type="password" style="width: 200px; height: 30px"  name="password" class="form-control">
 <span class="help-block"><?php echo $password_err; ?></span>
 </div>
 <div class="form-group">
 <input type="submit" class="btn btn-primary"  " value="Login">
 </div>
 <p><a style="display:inline" href="changepas.php">Am uitat parola</a></p>
 <p>Don't have an account? <a href="registrationbook.php">Sign up now </a>.</p>
 </form>
 </div>
</body>
</html>