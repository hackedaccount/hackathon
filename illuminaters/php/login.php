<?php
require '../core/init.php';
if(!empty($_POST)){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $db=DB::getInstance();
        $result=$db->get('user',array('username',"=",$username));
      if($result->first()->password==$password)
        {
          session::put("login",$result->first()->id);
          redirect::to("fileuploading.php");
        }
        else
        { echo"wrong username and password";}

}

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/illuminaters/css/login.css">
<link rel="stylesheet" href="/illuminaters/js/login.js">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<div class="wrapper">
  <form class="login" action="" method="post">
    <p class="title">Log in</p>

    
    <p class="fieldset">
    <input type="text" placeholder="Username" name="username" autofocus/>
    <i class="fa fa-user"></i>
    </p>

   <p class="fieldset">

		<input  type="password"  placeholder="Password" name="password">
    <i class="fa fa-key"></i>
    <a href="#0" class="hide-password">Show</a>
    </p>

    <!-- <input type="text" placeholder="username" autofocus/>
    <i class="fa fa-user"></i>
    <input type="password" placeholder="Password" />
    <i class="fa fa-key"></i> -->
    <!-- <a href="#">Forgot your password?</a> -->
    <button>
      <i class="spinner"></i>
      <span class="state">Log in</span>
      
    </button>
  </form>
  
  </p>
</div>
</html>


