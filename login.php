<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
   <meta name="author" content="Collin Jones">
   <meta name="description" content="Login Page for Project">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <script>
   function validateForm() {
   var formUsr = document.forms["login_form"]["username"].value;
   var formPwd = document.forms["login_form"]["password"].value;
   if (formUsr == "" && formPwd == "") {
      alert("Please enter a username and password");
      return false;
      }
   else if (formUsr == ""){
      alert("Please enter a username");
      return false;
      }
   else if (formPwd == ""){
      alert("Please enter a password");
      return false;
      }
   }
   </script>

   <style>
      h1{
         border: 2px solid Tomato;
         font-size: 300%;
         width: 35%;
      }
   </style>
</head>

<body>
   <h1 align="center">LOGIN PAGE</h1>
   <form name="login_form" action="" onsubmit="return validateForm()" method="post">
      <input type="text" name="username" placeholder="Username"><br>
      <input type="password" name="password" placeholder="Password"><br>
      <input type="submit" name="send">
   </form> 
   <?php
   if(isset($_GET['error'])==true){
      echo '<font color="#FF0000"><p> Username / Password do not match </p></font color>';
   } 
   ?>
   <p1>
      Want to sign up?<a href="registration_page.php">Click Here</a>
   </p1>

</body>
</html>

<?php
if(isset($_POST['send'])){
   include'login_action.php';
  }
?>
