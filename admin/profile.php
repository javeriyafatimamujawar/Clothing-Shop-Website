
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300;400&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="../inc/common.css">
<link rel="shortcut icon" type="x-icon" href="../Images/favicon.ico">
<style>
    
    * {
      font-family: 'Poppins', sans-serif;
    }
    
    .rm {
      margin-left: 30%;
      background-color: transparent;
      margin-top: 10px;
      animation-name: title;
      animation-direction: alternate;
      animation-duration: 2s;
      animation-iteration-count: infinite;
    }
    .custom-bg {
      background-color: #88c7dc;
    }
    .custom-bg:hover {
      background-color: #04AA6D;
    }
    .backbtn{
      text-decoration:none;
      color:black;
    }
  #center{
    padding-top:13%;
    margin-left:30%;
  }
    </style>
</html>
<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'perfect');
$id = $_SESSION['aid'];
$query = "SELECT fname,mname,lname,email,pass,mobno,`add` FROM adminreg WHERE `aid`='$id'";
$query_run = mysqli_query($con, $query);
if (mysqli_num_rows($query_run) > 0) {
  foreach ($query_run as $row) {
    $sf = $row['fname'];
    $sm = $row['mname'];
    $sl = $row['lname'];
    $semail = $row['email'];
    $smobile = $row['mobno'];
    $sadd = $row['add'];
    $spaa = $row['pass'];
  }
}


if(isset($_POST['update'])){
  $sfname=$_POST['fname'];
  $smname=$_POST['mn'];
  $slname=$_POST['ln'];
  $smail=$_POST['mail'];
  $spss=$_POST['pass'];
  $smob=$_POST['mobno'];
  $sad=$_POST['addr'];

  $q="UPDATE `adminreg` SET `fname`='$sfname',`mname`='$smname',`lname`='$slname',`email`='$smail',`pass`='$spss',`mobno`='$smob',`add`='$sad' WHERE `aid`='$id'";
  $qr=mysqli_query($con,$q);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="shortcut icon" type="x-icon" href="../Images/favicon.ico">
  <title>ADMIN PROFILE</title>
</head>

<body style="background-color:#F3F3F3;">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col=md-5" id="center">
        <div class="card my-3 shadow">
          <h2 class="text-center py-2"><?php echo "Welcome" . " " . $sf; ?></h2>
          <div class="card-body">
            <form method="POST">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control shadow-none" name="fname" value="<?php echo $sf; ?>" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control shadow-none" name="mn" value="<?php echo $sm; ?>" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control shadow-none" name="ln" value="<?php echo $sl; ?>" required>
                  </div>
                  
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control shadow-none" name="mail" value="<?php echo $semail; ?>" required>
                  </div>
                  <div class="col-md-6 p-0">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control shadow-none" name="pass" value="<?php echo $spaa; ?>" id="password" required>
                    
                      
                  </div>

                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" maxlength="10" class="form-control shadow-none" name="mobno" required pattern="[7-9][0-9]{9}" value="<?php echo $smobile; ?>" required>
                  </div>
                  <div class="col-md-12 ps-0 mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" rows="1" name="addr" value="<?php echo $sadd; ?>" required>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-6">
                  <button type="submit" class="custom-bg shadow-none" name='update' ">UPDATE</button>
                  <a href='home.php' class='backbtn'><button>Get back</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>
