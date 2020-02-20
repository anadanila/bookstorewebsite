<?php

session_start();
$conn=mysqli_connect('localhost','root','','bookstore');





if(isset($_POST["comanda"]))
    {
        
            
            $client=$_SESSION["username"];
			$email=$_POST['email'];
			$telefon=$_POST['telefon'];
			$adresa=$_POST['adresa'];
           
        
        //insert
            if($stmt = $conn->prepare("INSERT INTO livrare (client,email,telefon,adresa) VALUES(?,?,?,?)"))
            {
				$stmt->bind_param("ssss", $client,$email,$telefon,$adresa);
				$stmt->execute();
                $stmt->close();
              //  echo'<script>alert("Comanda a fost plasata cu succes!")</script>';
                
            
            }
            else
            {
                echo "ERROR: Nu se poate plasa comanda."; 
            }
            
        }
		else{echo "nu merge";}
           // se inchide conexiune mysqli 
        $conn->close();
        
    

?>


<html>
<head>
<style>
h3{
 font-style: italic;
 color: green;
 text-align:center;
 font-size: 60px;
}
.special{
border-style: ridge;
  border-width: 7px;
  border-color: green;	
}
body{
	 	
		background-repeat: no-repeat;
        background-attachment: fixed;
		background:url(comimg.gif) top right no-repeat; 
		  background-position: right top; 
		
		
	 }
</style>
</head>
<body>
<div class="special">
<h3>Multumim <?php echo $client; echo "<br>"; ?> Comanda plasata cu succes! </h3>
</style>
</body>
</html>