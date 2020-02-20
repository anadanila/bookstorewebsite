<?php

    session_start();
	

    $database_name = "bookstore";
    $con = mysqli_connect("localhost","root","","bookstore");
	

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
			
          
			if (count($_SESSION['cart'])==0){
                 $item_array = array(
                'product_id' => $_GET["id_produs"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["cart"][0] = $item_array;
            $_SESSION["count"]=1;
            }
			else{
		 $count_id_existent=0;
           foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id_produs"]){
                    $count_id_existent++;
                    
                    
                } 
           }
           
			
            if ($count_id_existent <$_POST["quantity"]){
             
				
               
                $item_array = array(
                    'product_id' =>  $_GET["id_produs"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$_SESSION["count"]] = $item_array;
                
                  $_SESSION["count"]++;
            }
            else {}
            }

        } else{
       
            $item_array = array(
                'product_id' => $_GET["id_produs"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["cart"][0] = $item_array;
            $_SESSION["count"]=1;
        }
	}
    
   
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');
        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
		body{
	 	
		background-repeat: no-repeat;
        background-attachment: fixed;
		background:url(indeximg.jpg) top right no-repeat; 
		  background-position: right top; 
		
		
	 }
    </style>
    
     <script>
    
    
       
   //var urlParams = new URLSearchParams(window.location.search);
      //  var param=urlParams.toString().split('=')[1];
		
		
  
    </script>
    
 
    
</head>
<body>

    <div class="container" style="width: 65%">
        <h2>OUR BOOKS</h2>
        
        
        <?php
		
		if(isset($_GET['param'])){
			$query = $_GET['param'];
			$query = htmlspecialchars($query); 
            $query ="SELECT * FROM produse where categorie='".$query. "' ORDER BY id_produs ASC " ; 
          $_SESSION['param']=$query;
        
			
		 $query=$_SESSION['param'];
		
		}
		else{
			$query="SELECT * FROM Produse";
		}
		//$query=$_SESSION['param'];
		
            $result = mysqli_query($con,$query);
		
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="col-md-3">

                        <form method="post" action="cos_nou.php?action=add&id_produs=<?php echo $row["id_produs"]; ?>">

                            <div class="product">



                             
                                <img src="<?php echo $row["cale_imagine"] ?>" title="Title of image" alt="" height="100" width="100">
                                <h5 class="text-info"><?php echo $row["titlu"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["pret"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["titlu"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["pret"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Adauga">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>

        </div>

 

</body>
</html>