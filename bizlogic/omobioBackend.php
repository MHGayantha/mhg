<?php
   session_start();

   $u_name = $_POST['uname']; //get user name from login form.
   $pw = $_POST['pswrd']; //et password from login form.

   $con=mysqli_connect("localhost","root","","omobio_login"); //get connection string from database and assign it to variable con. 

   if(!$con){
       die('DataBase is not connected'.mysqli_connect_error()); //check if there are any error with database connection.
   }
   else{
      $statement = "select * from login where user_name='$u_name' and password='$pw'";//select values from database.
      $result=mysqli_query($con,$statement); //check values and assign them into $result variable.
      
      //check user name or password is correct.
      if(mysqli_num_rows( $result)>0){
         
        $_SESSION['user']=$user_name; //if user name and password is corrct 
        echo "Welcome user"; //print message.
      }else{
        echo "wrong username or password!!!!"; //if user name and password is not correct, print error message.
    }
   }

    session_destroy();
?>