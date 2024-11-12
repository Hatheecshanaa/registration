<?php
  $login =0;
  $invalid =0;
  
  
  if($_SERVER['REQUEST_METHOD']=='POST')
   {
     include 'connect.php';
     $username =$_POST['username'];
     $password =$_POST['password'];

     
  

      $sql= "select * from registration where username ='$username'and password ='$password' ";
      $result = mysqli_query($con, $sql);

      if($result)
      {
        $num = mysqli_num_rows($result);
        if($num>0)
        {
            $login =1;
          
          session_start();
          $_SESSION['username']= $username;
          header('location:home.php');     //redirecting to home.php
        }
        else
        {
            $invalid =1;
           
        
        }
      }
    }


?>

<?php 
     if($invalid)
     {
         echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>sorry </strong> invalid data..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>' ;
     }
  ?>

<?php 
     if($login)
     {
         echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS </strong> You are successfully logged in!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>' ;
     }
  ?>





 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel ="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
   
    <div class ="container mt-5">
    <h1>Login</h1>
    <form action="login.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" >Name</label>
    <input type="text" class="form-control" placeholder="enter your name" name ="username">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" >Password</label>
    <input type="password" class="form-control" placeholder="enter your password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
    </div>
  </body>

  
</html>