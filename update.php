<?php
include 'connect.php';
$id= $_GET['updateid'];

//to show the data in the field 
$sql= "Select * from crud where id=$id";
$result=mysqli_query($con,$sql);
$row= mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];

//end to show



if(isset($_POST['submit']))
{
  $name= $_POST['name'];
  $email= $_POST['email'];
  $mobile= $_POST['mobile'];
  $password= $_POST['password'];


$sql="update crud set id=$id, name='$name', email ='$email', mobile ='$mobile', password='$password' where id=$id";
$result=mysqli_query($con,$sql);
if($result)
{
    // echo "Updated Data Successfully";
  // return to previous page
  header('location:display.php');
}
else{
  die(mysqli_error($con));
}
}
?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title>PHP CRUD</title>
  </head>
  <body>
    <div class="container my-5">

    <form method="POST">
  <div class="mb-3">
    <label>Enter Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value=<?php echo $name?>>
    
  </div>
  <div class="mb-3">
    <label>Enter Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputPassword1" value=<?php echo $email?>>
  </div>

  <div class="mb-3">
    <label>Enter Mobile Number</label>
    <input type="number" class="form-control" name="mobile" id="exampleInputPassword1" value=<?php echo $mobile?>>
  </div>

  <div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" value=<?php echo $password?>>
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </body>
</html>