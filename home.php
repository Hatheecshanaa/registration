<?php 
    session_start();
    if(!isset($_SESSION ['username']))
    {
        header('location: login.php');
    }
 ?>

 <html>
 <link rel ="stylesheet" href="style.css">
    <div class = "home"> 
    <body>
        <h1 > Welcome !!</h1>
<p class="username"> 
        <?php 
           echo $_SESSION['username'];
        ?>
</p>
        <div class= "container">
          <a href = "logout.php" class ="hbt" >Log out </a>

        </div>
</body>
</div>
    </html>