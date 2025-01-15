<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My-Driver</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <style>
        .main-container{
            width: 100%;
            height: 100vh;
        }
        .left{
            width: 25%;
            height: 100%;
            background-color: #080429;
           
        }

        .right{
            width: 83%;
            height: 100%;
            overflow-y: auto;
           
        }

        .user-image{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-top: 20px;
        }

        body.light-mode {
            background-color: #ffffff;
            color: #000000;
        }
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }
        .navbar-light-mode {
            background-color: #f8f9fa;
        }
        .navbar-dark-mode {
            background-color: #343a40;
        }

        body.dark-mode{
            .time-container{
                background-color: #343a40;
                color : white;
            }

            h1, h2, h3, p{
                color : black;
            }
        }

        .time-container {
  display: flex;
  width: 2%;
  height: 10%;
  text-align: center;
  font-size: 1rem;
  color : black;
  background-color: #f8f9fa;
  padding-top : 2%;
  font-weight : bold;
  padding-right : 18%;
  padding-left : 5%;
  border-radius: 10px;

}

ul{
    list-style-type: none;
    display : flex;
    flex-wrap: wrap;
    padding: 0;
    position: -webkit-sticky; /* For Safari */
    position: sticky;
    top: 0;
    background-color: inherit;
    z-index: 1000;

}

li{
    padding: 10px;
    cursor: pointer;
    transition: transform 0.5s ease, font-size 0.5s ease;
    flex: 1 1 100px;
    text-align: center;

}

li:hover{
    font-size : 20px;
    transform: scale(1.1);
    

}

.hero {
  text-align: center;
  padding: 5rem 1rem;
  background: url('') no-repeat center center/cover;
  color: white;
}

.hero h1 {
  font-size: 2.5rem;
}

.hero p {
  margin: 1rem 0;
}

.hero .cta-btn {
  padding: 0.75rem 1.5rem;
  background-color: #007bff;
  color: white;
  text-decoration: none;
  border-radius: 5px;
}

.features {
  padding: 3rem 1rem;
  background-color: #f9f9f9;
  text-align: center;
}

.features h2 {
  margin-bottom: 2rem;
}

.features-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.feature-item {
  flex: 1 1 100%;
  margin: 1rem 0;
}

@media (min-width: 576px) {
  .feature-item {
    flex: 1 1 45%;
  }
}

@media (min-width: 768px) {
  .feature-item {
    flex: 1 1 30%;
  }
}

.footer {
  text-align: center;
  padding: 1rem;
  background-color: #333;
  color: white;
}

.cookie-banner {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #343a40;
    color: white;
    text-align: center;
    padding: 1rem;
    z-index: 1000;
    display: none;
}
.cookie-banner button {
    margin-left: 1rem;
}

    </style>
</head>
<body class="light-mode">
<div class="cookie-banner" id="cookie-banner">
    <p>We use cookies to ensure you get the best experience on our website. 
        <button class="btn btn-primary btn-sm" id="accept-cookies">Accept</button>
        <button class="btn btn-secondary btn-sm" id="decline-cookies">Decline</button>
    </p>
</div>
<div class="main-container d-flex">
    <div class="left">
     <div class="d-flex align-items-center justify-content-center">
     
        <img src="https://www.pngmart.com/files/23/User-PNG-Isolated-Image.png" alt="image" class="user-image w-50 h-50">
        
               
        
      
     </div>
     
     
     
    </div>
    <div class="right">
    <nav class="navbar navbar-expand-lg navbar-light-mode fixed-top py-3 shadow-sm sticky-top">
    <a class="navbar-brand ms-3" href="#">
        <h1>Hello Welcome ! </h1>
    </a>
    <div class="time-container">
    <p id="time"></p>
  </div>
  <div class="container-fluid">
    <form class="d-flex ms-auto">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
     
      <button class="btn btn-sm btn-outline-success btn-sm  log-out me-2" type="button">Logout</button>
      <button class="btn btn-sm btn-outline-danger toggle-mode" type="button">
        <i class="fas fa-moon"></i>
      </button>
      
      
    </form>
  </div>
</nav>
<ul>
        <li class="computer">Computer</li>
        <li class="storage">Storage</li>
        <li class="bin">Bin</li>
        <li class="contact">Contact</li>
        <li class="profile">Profile</li>
      </ul>
      <div class="content p-5" id="content">
      <div class="container mt-5">
    <div class="card" style="max-width: 400px; margin: auto;">
      <div class="card-body text-center">
        <img 
          src="https://www.pngmart.com/files/22/User-Avatar-Profile-PNG-Background-Image.png" 
          alt="User Profile" 
          class="rounded-circle mb-3" 
          width="100" 
          height="100"
        >
        <h5 class="card-title">Your Storage</h5>
        <p class="card-text">Manage your storage space effectively.</p>
        <div class="progress my-3" style="height: 20px;">
          <div 
            class="progress-bar bg-success" 
            role="progressbar" 
            style="width: 60%;" 
            aria-valuenow="60" 
            aria-valuemin="0" 
            aria-valuemax="100">
            60% Used
          </div>
        </div>
        <p><strong>30 GB</strong> used out of <strong>50 GB</strong></p>
        <a href="#" class="btn btn-primary">Manage Storage</a>
      </div>
    </div>
  </div>
      <section class="hero" id="home">
    <div class="hero-content">
      <h1>Store, Share, and Collaborate Effortlessly</h1>
      <p>Your files, accessible anywhere, anytime.</p>
      <a href="#signup" class="cta-btn">Get Started</a>
    </div>
  </section>

  <section class="features" id="features">
    <h2>Features</h2>
    <div class="features-grid">
      <div class="feature-item">
        <h3>Secure Storage</h3>
        <p>Keep your files safe with industry-grade encryption.</p>
      </div>
      <div class="feature-item">
        <h3>Easy Sharing</h3>
        <p>Share files and collaborate with just a few clicks.</p>
      </div>
      <div class="feature-item">
        <h3>Cloud Access</h3>
        <p>Access your files from any device, anywhere.</p>
      </div>
    </div>
  </section>

  <footer class="footer">
    <p>&copy; 2025 Drive Space. All rights reserved.</p>
    <nav>
      <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms</a>
      <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy</a>
    </nav>
  </footer>
       
        <div class="right">
            
        </div>
       </div>

      </div> 
    </div>
</div>

<!-- Terms Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Welcome to Drive Space. By using our services, you agree to the following terms and conditions...</p>
                <p>1. You are responsible for maintaining the confidentiality of your account and password...</p>
                <p>2. You agree not to use the service for any illegal or unauthorized purpose...</p>
                <!-- Add more terms as needed -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Privacy Modal -->
<div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Your privacy is important to us. This privacy policy explains how we collect, use, and protect your information...</p>
                <p>1. We collect information you provide directly to us when you create an account...</p>
                <p>2. We use your information to provide, maintain, and improve our services...</p>
                <!-- Add more privacy details as needed -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-success alert-dismissible fade show" role="alert" id="payment-alert" style="display: none;">
    <strong>Success!</strong> Payment completed successfully! Your storage has been upgraded.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="alert alert-success alert-dismissible fade show" role="alert" id="storage-alert" style="display: none;">
    <strong>Success!</strong> You have more space available.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>

    $(document).ready(function(){
        $(".log-out").click(function(){
            window.location.href = "login.php";
        });

        $(".toggle-mode").click(function(){
            $("body").toggleClass("dark-mode light-mode");
            $(".navbar").toggleClass("navbar-dark-mode navbar-light-mode");
            if ($("body").hasClass("dark-mode")) {
                $(".toggle-mode").html('<i class="fas fa-sun"></i>');
            } else {
                $(".toggle-mode").html('<i class="fas fa-moon"></i>');
            }
        });

        $(".contact").click(function(){
            $.ajax({
                url: "contact.php",
                success: function(response){
                    $("#content").html(response);
                }
            });
        });

        $(".storage").click(function(){
            $.ajax({
                url: "storage.php",
                success: function(response){
                    $("#content").html(response);
                }
            });
        });

        // Add event listener for "Manage Storage" button
        $(".btn-primary").click(function(){
            $.ajax({
                url: "storage.php",
                success: function(response){
                    $("#content").html(response);
                    $("#storage-alert").show();
                    setTimeout(function() {
                        $("#storage-alert").alert('close');
                    }, 3000);
                }
            });
        });

        $(".bin").click(function(){
            $.ajax({
                url: "bin.php",
                success: function(response){
                    $("#content").html(response);
                }
            });
        });

        $(".computer").click(function(){
            $.ajax({
                url: "computer.php",
                success: function(response){
                    $("#content").html(response);
                }
            });
        });

        $(".profile").click(function(){
            window.location.href = "profile.php";
        });

        // Cookie consent
        if (!getCookie("cookiesAccepted")) {
            setTimeout(function() {
                $("#cookie-banner").show();
            }, 3000);
        }

        $("#accept-cookies").click(function(){
            setCookie("cookiesAccepted", "true", 365);
            $("#cookie-banner").hide();
        });

        $("#decline-cookies").click(function(){
            $("#cookie-banner").hide();
        });

        // Show payment success message when payment is complete
        function showPaymentSuccess() {
            $("#payment-alert").show();
            setTimeout(function() {
                $("#payment-alert").alert('close');
            }, 3000);
        }

        // Simulate payment completion for demonstration
        // Replace this with actual payment completion logic
        $(".payment-complete").click(function(){
            showPaymentSuccess();
        });

        // Show free space message after 3 seconds
        setTimeout(function() {
            $("#storage-alert").show();
            setTimeout(function() {
                $("#storage-alert").alert('close');
            }, 3000);
        }, 3000);
    });


    // script.js
function updateTime() {
  const timeElement = document.getElementById('time');
  const now = new Date();
  let hours = now.getHours();
  const minutes = now.getMinutes().toString().padStart(2, '0');
  const ampm = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  hours = hours.toString().padStart(2, '0');

  timeElement.textContent = `${hours}:${minutes} ${ampm}`;
}

// Update time every minute
setInterval(updateTime, 60000);

// Initialize time immediately
updateTime();

function setCookie(name, value, days) {
    const d = new Date();
    d.setTime(d.getTime() + (days*24*60*60*1000));
    const expires = "expires="+ d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(name) {
    const cname = name + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const ca = decodedCookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(cname) == 0) {
            return c.substring(cname.length, c.length);
        }
    }
    return "";
}

    
</script>
</body>
</html>