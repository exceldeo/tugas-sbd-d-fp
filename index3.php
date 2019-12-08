<?php 

require 'function.php';

$data= query("SELECT * FROM mobil");

// echo $data;
// var_dump($data);
// die;

$user =1;
?>

<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <title>Home</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
  <style>
      .thumbnail {
      background-color: white;
      text-align: left;
      padding: 3px;
      width: 150px;
      margin: 4px 6px 4px ;
      float: left;
    }
  .stroke {
        border: 1px solid black;}
        /* Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

/* The search field */
#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

/* The search field when it gets focus/clicked on */
#myInput:focus {outline: 3px solid #ddd;}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  border: 1px solid #ddd;
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
  
</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">sewasewi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="colorlib-booking-11/index2.php">Tour Guide</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="comingsoon.php">Wisata</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="colorlib-booking-11/index.php">Sewa Mobil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="comingsoon.php">Hotel</a>
      </li>
    </ul>
<?php if($_SESSION['login'] == NULL): ?>
         <a href="login.php" class="btn btn-outline-success my-2 my-sm-2" >Login</a>
<?php endif;
  if($_SESSION['login'] == 1):?>
   <a href="shopingchart.php" style="margin-right:20px">Cart</a>
  <a href="logout.php" class="btn btn-outline-success my-2 my-sm-2" >Logout</a>
  <?php endif?>

        </div>
</nav>
    <h1>HOME</h1>
        
  </body>
  
  </html>