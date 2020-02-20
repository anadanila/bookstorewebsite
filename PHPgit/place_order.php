<?php
session_start();
$conn=mysqli_connect('localhost','root','','bookstore');
$client=$_SESSION["username"];

if(isset($_POST["finishh"]))
    {
		
        if(!empty($_SESSION["cart"]))
        {   
			$client=$_SESSION["username"];
			$produse='';
            $cantitate='';
            $pret=0;
         // $data= date("Y-m-d H:i:s");
            
            foreach($_SESSION["cart"] as $keys => $values)
            {   $client=$_SESSION["username"];
                $produse=$produse."  ".$values["item_name"];
                $cantitate=$cantitate."  ".$values["item_quantity"];
			$pret= $pret +($values["item_quantity"]* $values["product_price"]);
			
            }
			
        
        //insert
            if($stmt = $conn->prepare("INSERT INTO comenzi ( username, produse, cantitate, pret ) VALUES  (?, ?, ?, ?)"))
            { 
				$stmt->bind_param("ssss",  $client, $produse, $cantitate, $pret);
				$stmt->execute();
                $stmt->close();
               echo'<script>alert("Mai ai un pas!")</script>';
                
               
            }
            else
            {
                echo "ERROR: Nu se poate plasa comanda."; 
            }
            
        }
           // se inchide conexiune mysqli 
       $conn->close();
        
    }
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
	 input[type=text]{
		 top: 60%;
		 border: 5px solid;
		 border-color: green;
		
		 width: 200px;
		 
	 }
	 p{
	font-size:20px;
    font-style:italic;
color:green;
font-weight:bold;	
	 }
</style>
</head>
<body>
<div class="special">
<h3>Multumim <?php echo $client; echo "<br>"; ?> Mai ai un pas! </h3>
</div>
<form action="finalfinal.php" method="POST">
<div class="special">
<p>Adresa:</p><br><input class="form-control" type="text" name="adresa" placeholder="adresa"><br><br>
<p>E-mail:</p><br><input class="form-control" type="text" name="email" placeholder="e-mail"><br><br>
<p>Telefon:</p><br><input class="form-control" type="text" name="telefon" placeholder="telefon"><br>
<input type="radio" name="plata" value="ramburs"><b>Plata se va face ramburs</b><br><br>
<input type="submit" value="comanda" name="comanda" >
</div>
</form>
</body>
</html>