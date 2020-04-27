<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/w3.css">

</head>
<body id="loginPage">

  <h1 style="color: yellow" align="center">Welcome to the SlimShades.com</h1>
  <div class="container ">
    <br>
    <div class="row  ">
      <div class="col-sm-8 main">
        <div class="left"></div>

        <div class="right">
          <div class="formBox">
            <form action="server/verify_user.php" method="POST">
              <h1 align="center">Login</h1><br/>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" id="exampleInputPassword1"  class="form-control"  placeholder="Password" name="password" > 
              </div>
              

              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="Remember" id="exampleCheck1"<?php echo 'unchecked';?> >
                <label style="margin-left: -14px;" class="form-check-label" for="exampleCheck1">Remember me </label>

              </div>
              <br>
              <button type="submit" name="btnsub" class="btn btn-primary">Login</button>
            </form>
          </div>
        </div>




      </div>
    </div>
  </div>



</body>
</html>








