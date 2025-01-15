<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
        <li class="nav-item ps-3 pe-5">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item px-3 bg-light rounded me-3">
          <a class="nav-link text-dark" href="login.php">Login</a>
        </li>
      </ul>
    </div>
</nav>

<div class="container main-con mt-5 pt-5">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 p-5">
            <form action="register.php" method="POST" class="bg-light rounded p-5 sn-form" autocomplete="off">
                <h1 class="text-center">Sign Up</h1>

                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control mb-3" required>

                <label for="email" class="form-label">Email Id</label>
                <input type="email" name="email" id="email" class="form-control mb-3" required>

                <div class="pass-con">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" required>
                        <span class="input-group-text" id="pass-icon"><i class="fa fa-eye"></i></span>
                    </div>
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <div class="form-text">Click Generate To Improve Security.</div>
                    <button class="btn btn-sm btn-outline-success rounded pass-gen">Generate</button>
                </div>

                <div class="mb-3 text-center">
                    <button class="btn btn-outline-danger w-100">Register Now</button>
                </div>
                <div class="msg"></div>
            </form>
        </div>
    </div>
</div>

<script>
  $(document).ready(function(){
    $(".pass-gen").click(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "php/generate.php",
            beforeSend: function(){
                $("#pass-icon").html('<i class="fa fa-spinner fa-spin"></i>');
            },
            complete: function(){
                $("#pass-icon").html('<i class="fa fa-eye"></i>');
            },
            success: function(response){
                $("#password").val(response.trim());
            }
        });
    });

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

    $("#email").on("blur", function(){
        var email = $(this).val();
        $.ajax({
            type: "POST",
            url: "check_user.php",
            data: { email: email },
            success: function(response){
                if(response.trim() === "User Matched") {
                    // alert("Email already registered.");
                } else {
                    // alert("Email available.");
                }
            }
        });
    });


   

    $("form").submit(function(e){
        e.preventDefault();
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        $.ajax({
            type: "POST",
            url: "register.php",
            data: { username: username, email: email, password: password },
            success: function(response){
                var div = document.createElement("div");
                div.className = "alert mt-3";
                if(response.trim() === "User Registered Successfully") {
                    div.classList.add("alert-success");
                    div.innerHTML = "Register Successfully";
                    setTimeout(() => {
                        window.location.href = "login.php";
                    }, 3000);
                } else if(response.trim() === "User Matched") {
                    div.classList.add("alert-danger");
                    div.innerHTML = "User already registered";
                } else if(response.trim() === "Failed to Register User") {
                    div.classList.add("alert-danger");
                    div.innerHTML = "Failed to Register User";
                } else {
                    div.classList.add("alert-danger");
                    div.innerHTML = "No User Found";
                }
                $(".msg").append(div);

                setTimeout(() => {
                    $(".msg").html("");
                    $("form").trigger("reset");
                }, 3000);
            }
        });
    });
  });
</script>
</body>
</html>