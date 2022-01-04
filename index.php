<?php
 $insert=false;
 if(isset($_POST['name'])){
   $server = "localhost";
   $username ="root";
   $password="";    

   // isi banate hai connections to database ....
   $con = mysqli_connect($server,$username,$password);
  
   if(!$con){
       die(" connection to database failed due ".mysqli_connect_error());
   }
   // else {
   //     echo "Successful conection to db";
   // }
   // mysqli_select_db('myfirsttb',$con) ;
   $name =$_POST['name'];
   $number=$_POST['number'];
   $email=$_POST['email'];
   $address=$_POST['address']; // `paygcoej1`.`myfirsttb`  -> is se database me insert hota hai data // $sql chup chap xampp server se copy paste krne ka 
   $sql = "INSERT INTO `paygcoej1`.`myfirsttb` (`name`, `number`, `email`, `address`) VALUES ('$name', '$number', '$email', '$address'/*, current_timestamp()*/);";
   // echo $sql;
   if($con->query($sql) == true){ // yaha agar hamra coonection ban gya hai and sql me insert hoga hai toh insert ko true kr do jo upar false hai
      $insert = true;
   }
   else {
      echo "ERROR : $sql <br> $con->error";
   }
  
   $con->close(); // connection ko close kr do jaise phone lagane ke bad kat kr te hai same tarike se 

 }
?>

<!DOCTYPE html>
<!-- fuck -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Gcoej</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
    <div class="container">
      <div class="heading">
        <h1>Welcome To Mahabaleshwar Trip</h1>
        <p>Our college Government college of Engineering Jalgaon Is Going to set a trip to Mahabaleshwar those who are interested they can come when your form is submitteds</p>
        <?php
            if($insert == true){
               echo "<p class = 'SubmitMsg'> Thanks For Submitting your form. We are happy to see you joining us for the mahabaleshwar trip</p>" ;
            }
        ?>
     </div>
     <form action="index.php" id="form" method="post">
     <div class="inputs">
        <input type="text" name="name" id="name" placeholder="Enter Your Name">
        <input type="number" name="number" id="number"  placeholder="Enter Your Number">
        <input type="email" name="email" id="email"  placeholder="Enter Your Email">
        <textarea name="address" id="address" cols="30" rows="10"  placeholder="Enter Your Address"></textarea> <br>
  
        <button class="btn" type="submit">Submit</button> 
        <button  class="btn" type="reset">Reset</button>
     </div>
    </form>
    </div>
  
    
</body>
</html>