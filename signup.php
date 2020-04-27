<?php
require_once('server/dbcon.php');
include('header.php');
include('nav.php');
?>


<body id="signup">


  <h1 align="center" class="signupText">Register</h1><br/>
  <br/>
  <div class="container">
    <div class="row">
      
      <div class="col-sm-6">
        <form action="signup.php" method="POST" enctype="multipart/form-data">
          
          <div class="form-group signupText">
            <label  for="exampleInputEmail1">Email address</label>
            <input  type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
            
          </div>

          <div class="form-group signupText">
            <label for="exampleInputUsername">Username</label>
            <input type="text" class="form-control" id="name" name="name" id="exampleInputUsername" placeholder="Username" required>
            
          </div>

          <div class="form-group signupText">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
          </div>
          
          <div class="form-group frmpart2 signupText">
            <label for="exampleInputimage">Image</label>
            <input type="file" class="form-control" name="image" id="exampleInputimage" value="default.jpg" placeholder="Image" required>
          </div>

          
        </div>
        <div class="col-sm-6 frmsecdiv ">
         <div class="form-group frmpart2 signupText">
          <label for="exampleInputaddress">Address</label>
          <input type="text" class="form-control" name="address" id="exampleInputaddress" placeholder="Address" required>
        </div>
        <div class="form-group frmpart2 signupText">
          <label for="exampleInputmobile">Mobile</label>
          <input type="text" class="form-control" name="mobile" id="exampleInputmobile" placeholder="Mobile" required>
        </div>
        <div class="form-group signupText">
          <label for="exampleInputGender">Gender</label>
          <input type="text" class="form-control" name="gender" id="exampleInputGender" placeholder="Gender" required>
        </div>
        <div class="form-group signupText" frmpart2 >
          <label for="exampleInputDob">Date of Birth</label>
          <input type="text" class="form-control" name="dob" id="exampleInputDob" placeholder="Date of birth" required>
        </div>
        
        
        
      </div>
    </div>
  </div>

  <div class="submitdiv">
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">I am not a bot</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </form>
</div>


<?php
if(isset($_POST['email'])){
  if(isset($_FILES['image'])&& $_FILES['image']['size']>0){
    $target_dir="Images/";
    $filename =$_FILES['image']['name'];
    $target_file_desc=$target_dir.$filename;
    $server_file =$_FILES['image']['tmp_name'];
    $extension=strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    if($extension == "jpg" || $extension == "png"){
      $res=move_uploaded_file($server_file, $target_file_desc);
    }else{
      $filename = "user.png";
      echo "Error";
    }
    
  }else{
    $filename = "user.png";
  }
  $name=$_POST['name'];
  $password=$_POST['password'];
  $gender=$_POST['gender'];
  $address=$_POST['address'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $dob=$_POST['dob'];
  $card=$_POST['card'];
    //$image=$_POST['image'];
  $img='user.png';


  $query ="INSERT INTO tbl_user (u_name,u_password,u_email,u_address,u_dob,u_gender,u_mobile,u_card,u_image) VALUES (?,?,?,?,?,?,?,?,?)";

  $stmt=mysqli_prepare($con,$query);
  mysqli_stmt_bind_param($stmt,"sssssssss",$name,$password,$email,$address,$dob,$gender,$mobile,$card,$filename);

  $result=mysqli_stmt_execute($stmt);
  if($result){
    echo "data inserted";
    ob_start();
    header('Location:index.php');
    ob_end_flush();
    exit();
    
    
  }
  else{
    echo "Error occured".mysqli_stmt_errno($stmt)." ".mysqli_stmt_error($stmt). " ";
  }

}else{
  echo "";
}


?>




<?php
include('footer.php');

?>







