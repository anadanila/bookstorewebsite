 <?php
    session_start();
	$conn=mysqli_connect('localhost','root','','bookstore');
	
	
if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
             foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id_produs"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>window.location="comanda1.php"</script>';
                    
                } 
			 }
            }
        
    }

?>
<html>
<head>
<style>
h3{
text-align: center;	
font-style: italic;
font-size: 25px;
}
p{
	 text-decoration: none;
}
body{
	 	
		background-repeat: no-repeat;
        background-attachment: fixed;
		background:url(cart.jpg) top right no-repeat; 
		  background-position: right top; 
		
		
	 }
.buttonback{
     width: 20px;
	 padding: 70px;
    border-radius: 50%;
    float: left;
	text-decoration: none;
 }
input[type=submit]{
float: right;
 width: 20px;
	 padding: 70px;
    border-radius: 100%;
    top:50%; 
    left:50%;
font-size: 20px; 
text-decoration: none;
text-align: center;  
line-height: 65px;	
 }
</style>
</head>
<body>
    <?php 
    
   
    function unique_values_in_array($array){
        
         $new_array=array();
    foreach($array as $value){
        
        if(!in_array($value, $new_array)){
            array_push($new_array, $value);
        }
    }
    
    return $new_array;
        
}
    ?>
<h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
		    <div style="margin: auto">
			<?php if(!empty($_SESSION["cart"])){?>
                    
			<form action="paginafinal.php" method="POST" name="finishh">
			<?php }?>
            <table style="margin: auto" class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
               
                if(!empty($_SESSION["cart"])){
                    
                   
                    $total = 0;
                    
                    $added_quantities=array();
                    $all_id=array();
                    $all_distict_id=array();
                    
                    foreach ($_SESSION["cart"] as $key => $value) {
                       array_push($all_id,$value['product_id']);
                        
                        
                    }
                    
                    
                    
                    
                   $all_distict_id=unique_values_in_array($all_id);
                   // echo count($all_distict_id);
                    $contor=0;
                  
                    
                    foreach ($all_distict_id as $id_existent){
                         $total_quantity_for_id=0;
                        $name='';
                        $price=0;
                     foreach ($_SESSION["cart"] as $key => $value){
                         
                         if($value['product_id']==$id_existent){
                             $total_quantity_for_id=$total_quantity_for_id+$value['item_quantity'];
                             $name=$value['item_name'];
                             $price= $value['product_price'];
                         }
                     }
                       array_push( $added_quantities, array($id_existent, $name, $total_quantity_for_id,$price 
                                                           
                                                           ));
                        
                        
                          $contor++;
                    }
					
				
                  $totalcomanda=0;
                    foreach ($added_quantities as $key => $value) {
                        ?>
                        <tr>
                            <td align="center"><?php echo $value[1]; ?></td>
                            <td align="center"><?php echo $value[2]; ?></td>
                            <td align="center"><?php echo $value[3]; ?></td>
                            

                            <td align="center">
                               <?php echo $value[2]*$value[3] ?></td>
                            <td><a href="comanda1.php?action=delete&id_produs=<?php echo $value[0]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
					<?php
					 $totalcomanda = $totalcomanda + ($value[2]*$value[3]);}
						?>
                        <tr>
                            <td colspan="3" align="right"><b>Total Comanda</b></td>
                            <th align="right">$ <?php echo number_format($totalcomanda, 2);?></th>
                            <td></td>
                        </tr>
                       
                        <?php
						
                    }
			/*		if(isset($_POST["finishh"]))
    {
		  header("Location:paginafinal.php");
        if(!empty($_SESSION["cart"]))
        {
			$client=$_SESSION["username"];
			$produse='';
            $cantitate='';
            $pret=0;
         // $data= date("Y-m-d H:i:s");
            
            foreach($_SESSION["cart"] as $keys->$values)
            {   //$client=$_SESSION["username"];
                $produse=$produse."  ".$values["item_name"];
                $cantitate=$cantitate."  ".$value["item_quantity"];
			$pret= $pret +($value["item_quantity"]* $values["item_price"]);
			
            }
			echo $produse;
			
        
        //insert
            if($stmt = $conn->prepare("INSERT INTO comenzi ( username, produse, cantitate, pret ) VALUES  (?, ?, ?, ?)"))
            { 
				$stmt->bind_param("ssss",  $client, $produse, $cantitate, $pret);
				$stmt->execute();
                $stmt->close();
               echo'<script>alert("Comanda a fost plasata cu succes!")</script>';
                
                 header("Location:final.php");
            }
            else
            {
                echo "ERROR: Nu se poate plasa comanda."; 
            }
            
        }
           // se inchide conexiune mysqli 
       $conn->close();
        
    }*/
					
                ?>
            </table>
			</div>
        </div>

	<button class="buttonback"><a href="cos_nou.php" style="text-decoration: none"><p style="font-size: 20px; text-align:center">BACK</p></a></button>
	
<input type="submit"  class="buttonfinish" value="FINISH" name="finishh">
</form>
	</body>
	</html>