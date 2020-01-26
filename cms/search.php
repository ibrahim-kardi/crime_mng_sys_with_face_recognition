<!DOCTYPE html>
<html>

<head>

    <title>Crime Portal</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 60%;
  background: #f1f1f1;
  margin-top: 230px;
 
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
  margin-top: 230px;
     text-align: center !important;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
<body>


    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">LOGO</a>
            </div>
            <!--<div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>!-->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class="active"><a href="home.php">Home</a></li>
                    <li><a href="userlogin.php">User Login</a></li>
                    <li><a href="official_login.php">Official Login</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->

        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <h2>Search Button</h2>
                <form class="example" action="search.php" method="post">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php 
    session_start();
	  include 'dbconnect.php';

    
    $conn=mysqli_connect("localhost","root","");
    if(!$con)
    {
        die("could not connect".mysqli_connect_error());
    }
    mysqli_select_db($con,"crime_portal");
    
    //$i_id=$_SESSION['search'];
	//$sql=" SELECT * FROM crimer_info WHERE nid like '%".$i_id."%'";

    //$result1=mysqli_query($con,$sql);
	
      
	
	//  var_dump($result1);
    


if (!empty($_REQUEST['search'])) {

$term = mysqli_real_escape_string($con,$_REQUEST['search']);     

$sql = "SELECT * FROM crimer_info WHERE nid LIKE '%".$term."%'"; 
$r_query = mysqli_query($con,$sql); 



$row = mysqli_fetch_array($r_query);
//echo $term.'term</br>';	
//echo $row['nid'];	
		
		if ($term==$row['nid']){
		?>
		
		<h2 style="text-align:center;color: lime !important;font-weight:bold;">Crime Profile Found</h2>

<div class="card">
  <img src="img/<?php echo $row['img'];?>" alt="" style="width:100%">
  <h3 style="text-align:center;color: lime !important;font-weight:bold;"><?php echo '<br /> Name: ' .$row['name'];?></h3>
  <h4 style="text-align:center;color: lime !important;font-weight:bold;"><?php echo 'NID NO:' .$row['nid'];?></h4>
  <h4 style="text-align:center;color: lime !important;font-weight:bold;"><?php echo 'Crime :' .$row['crime']?></h4>
  <p class="title"></p>
  <p></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><button>Details</button></p>
</div>
		
	<?php 
		}
		 else{ echo '<h2 style="text-align:center; color:red; font-weight:bold;">No previous crime report......</h2>';}
	}
	

	

?>






	
	
</body>

</html>
