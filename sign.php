<?php
  $success =0;
  $user =0;
  
  
  if($_SERVER['REQUEST_METHOD']=='POST')
   {
     include 'connect.php';
     $username =$_POST['username'];
     $password =$_POST['password'];

     
   

      $sql= "select * from registration where username ='$username'";
      $result = mysqli_query($con, $sql);

      if($result)
      {
        $num = mysqli_num_rows($result);
        if($num>0)
        {
            $user =1;
           // echo "User is already exist";
        }
        else
        {
            $sql = "insert into registration (username,password) values('$username','$password')";
             $result = mysqli_query($con, $sql);
             if($result)
               {
                   // echo "sign up successful";
                   $success =1;
               }

             else{
                    die(mysqli_error($con));
                 }
        
        }
      }

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

    <title>Sign up</title>
  </head>
  <body>
    
    <div class ="container mt-5">
    <h1>Sign Up</h1>
    <form action="sign.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" >Name</label>
    <input type="text" class="form-control" placeholder="enter your name" name ="username">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" >Password</label>
    <input type="password" class="form-control" placeholder="enter your password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </body>

  <?php 
     if($user)
     {
         echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>sorry </strong> The user is alredy exist..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>' ;
     }
  ?>

<?php 
     if($success)
     {
         echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS </strong> You are successfully signed up!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>' ;
 header('location:login.php');
     }
  ?>
</html>