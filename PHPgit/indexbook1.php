<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

	<div class="head" style="margin:auto">
		<h1><i style="font-family:courier; background:url(2.jpg">My Book Store</i></h1>
	</div>

	<div class="nav">
        <div >
		<ul class="main-menu">

			<li><a href="indexbook1.php">Home</a></li>
			
			<li>Contul meu

			   <ul class="sub-menu">
               	<li><a href="loginbook.php">Autentificare</a></li>
               	<li><a href="registrationbook.php">Inregistrare</a></li>
				<li><a href="logoutbook.php">Iesi din cont</a></li>
               	
               </ul>

            </li>

			<li>Cosul meu

              <ul class="sub-menu">
               	<li><a href="comanda1.php">Vezi cosul tau</a></li>
               	<li><a href="finalizare.php">Mergi la casa</a></li>
               	
              </ul>

			</li>
			<li>About us</li>
			<li><a href="contact.htm">Contact</a></li>
			
				</ul>
        </div>
               <div class="all_search_bar">

           
<form class="form_class"  style="margin-left:0px; height: 45px;padding: 5px;" action="cos_cautare.php" method="GET">

    
    <button  title="Search Book" class="button_class" style="margin-top:0px; margin-left:0px" type="submit" data-test="nav-bar-search-form-button"><svg class="_2-tlh _1azRR _1mPD6" version="1.1" viewBox="0 0 32 32" width="32" height="32" aria-hidden="false"><path d="M31 28.64l-7.57-7.57a12.53 12.53 0 1 0-2.36 2.36l7.57 7.57zm-17.5-6a9.17 9.17 0 1 1 6.5-2.64 9.11 9.11 0 0 1-6.5 2.67z"></path></svg></button>
    
    <div  class="all_search_bar" style="margin-left:0px; margin-top:0px; height: ">
    <input  style="height: 35px;width: 715px;"type="search" name="query" autocomplete="off" aria-autocomplete="list" aria-controls="react-autowhatever-SEARCH_FORM_INPUT_nav-bar" class="search_bar" name="searchKeyword" placeholder="Search..." required="" data-test="nav-bar-search-form-input" id="SEARCH_FORM_INPUT_nav-bar" title="Search  Books" autocapitalize="none" spellcheck="false" value=""><div id="react-autowhatever-SEARCH_FORM_INPUT_nav-bar" role="listbox"></div>
    </div>

    </form>
		
	</div>
        
        
	
        
        </div>
		
<div id="mainpage">
	 
	 <button type="button"  class="collapsible">Carti</button>   
    
    <div  class="content" >
        <li><a href="cos_nou.php" style="text-decoration:none; color:white">Toate cartile</a></li>
        <li><a href="cos_nou.php?param=Beletristica" style="text-decoration:none; color:white">Beletristica</a></li>
        <li><a href="cos_nou.php?param=Medicina" style="text-decoration:none; color:white">Medicina</a></li>
        <li><a href="cos_nou.php?param=Drept" style="text-decoration:none; color:white">Drept</a></li>
     
     

    </div>
	
	</div>
	
	
	
	   
      
<div class="hellodiv" style="display: inline; "> 
<h1>  Hi, <b>
 <?php  session_start(); if(isset($_SESSION["username"])){;echo htmlspecialchars($_SESSION["username"]);} echo"<br>";?></b>Welcome to our site!</h1>    
 </div> 

<div style="position: absolute; width:100%; bottom: 5px; background-color: blue">
   <p style="text-align: center;"> Online bookstore </p>
    </div>
        <div class="centered" style="font-size:30px; font-style:italic;"><p>Think before you speak. Read before you think</p><br>
		<p><a href="cos_promotii.php" style="text-decoration:none">See our promotions here</a></p>
	
	
	</div>
        
	<style type="text/css">
	.centered {
  position: fixed;
  top: 50%;
  left: 50%;
  /* bring your own prefixes */
  transform: translate(-50%, -50%);
}
	  .all_search_bar{
            
/*
            --width-1: 24rem;
--width-2: 32rem;
--width-3: 45rem;
--width-4: 64rem;
--space-1: 4px;
--space-2: 12px;
--space-3: 36px;
--space-4: 72px;
*/
        
font-family: -apple-system,BlinkMacSystemFont,San Francisco,Helvetica Neue,Helvetica,Ubuntu,Roboto,Noto,Segoe UI,Arial,sans-serif;
/*
font-size: 15px;
font-weight: 400;
line-height: 1.6;
*/
color: #111;
/*box-sizing: border-box;*/
width: 62%;
margin-left: 10px;
margin-right:5px;
height:5px;

        }
		 
		 .search_bar{
            
                       
      /* --width-1: 24rem;
--width-2: 32rem;
--width-3: 48rem;
--width-4: 44rem;
--space-1: 4px;
--space-2: 12px;
--space-3: 36px;
--space-4: 72px;*/
font-family: inherit;
font-size: 100%;
margin: 0;
overflow: visible;
letter-spacing: inherit;
line-height: inherit;
-webkit-appearance: textfield;
outline-offset: -2px;
flex-grow: 1;
width: 100%;
background: none;
border: none;
color: #111;
box-sizing: border-box!important;
padding-left: 12px;
padding-bottom: 2px;
padding-top:5px
box-shadow: none;     
           
        }
        .form_class{
--width-1: 24rem;
--width-2: 32rem;
--width-3: 48rem;
--width-4: 64rem;
--space-1: 4px;
--space-2: 12px;
--space-3: 36px;
--space-4: 72px;

font-family: -apple-system,BlinkMacSystemFont,San Francisco,Helvetica Neue,Helvetica,Ubuntu,Roboto,Noto,Segoe UI,Arial,sans-serif;
font-weight: 300;
line-height: 1.6;
color: #111;
box-sizing: border-box;
display: flex;
position: relative;
transition: all .1s ease-in-out;
height: 55px;
border-radius: 10px;
background-color: ghostwhite;
font-size: 14px;
width:100%;
top:1px;
border: 1px solid transparent;
           padding: 5px;
        }
		.button_class{
            --width-1: 24rem;
--width-2: 32rem;
--width-3: 48rem;
--width-4: 64rem;
--space-1: 4px;
--space-2: 12px;
--space-3: 36px;
--space-4: 72px;
box-sizing: border-box;
font-family: inherit;
font-size: 100%;
            
margin: 0;
overflow: visible;
text-transform: none;
color: inherit;
cursor: pointer;
line-height: inherit;
-webkit-appearance: button;
border: none;
padding: 0;
background-color: transparent;
text-align: inherit;
box-shadow: none;
display: flex;
align-items: center;
        }
	
	body{
	 	
		background-repeat: no-repeat;
        background-attachment: fixed;
		background:url(indeximg.jpg) top right no-repeat; 
		  background-position: right top; 
		
		
	 }
	    *{
	    	padding: 0px;
	    	margin: 0px;

	    }
      
    <!-- .head{
     	background: white;
     	color: blue;
     	padding: 10px 70px;
     	font-family: sans-serif;
     	font-size: 30px;
     	border-top:10px solid #37f;	
     }-->


	    .nav{
	    	padding: 0px 0px;
	    	background: #e9e9e9;;
	    	text-align: center;
            display: flex;
			
	    }

         .main-menu>li{
         	display: inline-block;
         	width: 100px;
         	padding: 10px 0px;
         	margin-left: 0px;
         	text-align: center;
         	color: white;
			border-bottom: 10px ;
         	font-size: 20px;
         	border-left: 1px solid gray;
			border-right: 1px solid gray;
         	transition: .4s;
         	cursor: pointer;
         	box-sizing: border-box;
			overflow: hidden;
			 margin-left: 2px;
			 
			 
  background-color: #e9e9e9;
            height: 6.5%;

         }
		
         
         .main-menu li:hover .sub-menu{
              display: block;
         }
 
         .sub-menu{
         	display: none;
         	position: absolute;
         	padding: 0px;
         	margin-top: 30px;
         	margin-left: -10px;	
         	float: left;
         	width: 300px; 
         	text-align: left;
         	box-sizing: border-box;
         	border: 5px solid white;
         	box-shadow: 1px 1px 1px grey;
         	 background-color:#e9e9e9;
       
         }

         .sub-menu:before{
                 content:"";
                 width: 0px;
                 height:0px;
                 border-left:20px solid transparent;
                 border-right:20px solid transparent;
                 border-bottom:30px solid white;
                 position: absolute;
                 margin:-30px 0px 0px 60px;
         }

         .sub-menu li{
         	list-style-type: none;
         	padding: 10px;
         	color: white;
         	font-size: 20px;
         	background: #37f;
         }
     .main-menu>li:hover, .sub-menu>li:hover{
         	background: #35c;
         }
		 .collapsible {
            border-color:#777;
  background-color: yellowgreen;
  color:white;
  font-size: 20px;
  width: 25%;
 
  text-align: left;
  outline: none;
  font-size: 15px;
    padding: 16px;
  margin-left: 0px;

  }
  .content {
   border-color:#777;
  background-color: #777;
  display: none;
  overflow: hidden;
  color:white;
  font-size: 20px;
  color:white;
  
  width: 23%;
 
  text-align: left;
  outline: none;
  
    padding: 16px;
  margin-left: 0px;        

}
li a:hover{
	color:blue;
}
.hellodiv{
position: absolute;
  top: 30px;
  right: 0;
  width: 300px;
  height: 60px;
  border: 3px solid #73AD21;
  border-color:blue;
  font-size:12px;


}

 
	</style>
	<script>
	var coll = document.getElementsByClassName("collapsible");
        
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
        
	
	
	</script>

</body>
</html>