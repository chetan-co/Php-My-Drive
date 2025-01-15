<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login In</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
    <a class="navbar-brand ms-3" href="#">
        <img src="images/logo.png" alt="logo" width="170">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item px-3">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item ps-3 pe-5">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item px-3 bg-light rounded me-3">
          <a class="nav-link text-dark" href="index.php">Sign Up</a>
        </li>
      </ul>
    </div>
</nav>

<div class="container main-con mt-5 pt-5">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 p-5">
            <form action="user_login.php" method="POST" class="bg-light rounded p-5 login-form" autocomplete="off">
                <h1 class="text-center">Login Now</h1>

                <label for="email" class="form-label">Email Id</label>
                <input type="email" name="email" id="email" class="form-control mb-3" required>

                <div class="pass-con">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" required>
                        <span class="input-group-text" id="pass-icon"><i class="fa fa-eye"></i></span>
                    </div>
                </div>

                <div class="mb-3 text-center">
                    <button class="btn btn-outline-danger w-100 login_btn">Login Now</button>
                </div>
                <div class="msg"></div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
      $("#pass-icon").click(function(){
        var passwordField = $("#password");
        var icon = $(this).find("i");
        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
            icon.removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            passwordField.attr("type", "password");
            icon.removeClass("fa-eye-slash").addClass("fa-eye");
        }
      });

      $(".login-form").submit(function(e){
        e.preventDefault();
        $.ajax({
          type : 'POST',
          url : "user_login.php",
          data : {
            email : $("#email").val(),
            password : $("#password").val()
          },
          beforeSend : function(){
            $(".login_btn").attr("disabled", "disabled");
            $(".login_btn").html("Please Wait...");
          },
           success : function(response){
            $(".login_btn").removeAttr("disabled");
            $(".login_btn").html("Login Now");
            if(response == "Login Successfully"){
              $(".msg").html('<div class="alert alert-success">Login Successfully</div>');
              setTimeout(function(){
                window.location = "profile.php";
              }, 2000);
            } else {
              $(".msg").html('<div class="alert alert-danger">'+response+'</div>');
            }
           }
        });
      });
    });
</script>
</body>
</html>