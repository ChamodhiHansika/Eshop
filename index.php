<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="includes/Css/style.css" />
    <title>Index page</title>
  </head>
  <body>

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <!--logion Page Form-->
          <form action="includes/php/login.php" class="sign-in-form" method="post"  >
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="login_username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="login_password"/>
            </div>
            <input type="submit" value="Login" class="btn solid" name="login"/>
            <div class="reset_Password">
              <a href="#" onclick="showResetPasswordChangeForm()">Reset Password</a>
            </div>
            <div class="" >
            <p class="new-account">No account? 
            <a href="#" id="sign-up-btn">Create One!</a></p>
            </div>
          </form>

          <!--Password Reset Email Submit Form-->
          <form action="reset_password.php" class="reset-password-email-form" method="post" style="display: none;" >
            <h2 class="title">Reset Password</h2>
              <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Enter your email address" name="email"/>
              </div>
              <input type="submit" value="Submit" class="btn solid" />
              <div class="back-to-login">
                <a href="#" onclick="showSignInForm()">Back to Login</a>
              </div>
          </form>

          <!--Password Reset New Password Form-->
          <form action="reset_password.php" class="reset-password-change-form" method="post" style="display: none;">
            <h2 class="title">Reset Password</h2>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Enter New Password" name="password" id="password" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm New Password" />
            </div>
            <input type="submit" value="Reset" class="btn solid" />
            <div class="back-to-login">
              <a href="#" onclick="showSignInForm()">Back to Login</a>
            </div>
          </form>

          <!--Sign Up Form-->
          <form action="includes/php/register.php" class="sign-up-form" method="post" onsubmit="return checkPasswords()">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="First Name" name="firstname"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Last Name" name="lastname"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" id="mPassword"/>
            </div>
            <div class="error massege">
              <span id="passwordError" class="error-message"></span>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" id="confirmPassword" /> 
            </div>
            <input type="submit" class="btn" value="Sign up" name="sign_up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3 style="font-size:60px;color:#ffcc00"><i>eShop</i></h3>
            <p>
                About, If you don't have an account, you can easily create one on our marketplace website. 
                Enjoy a seamless experience by signing up today!
            </p>
          </div>
          <img src="includes/img/Login_page/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
                If you already have an account, 
                simply log in to access all the features and benefits our marketplace website has to offer.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Login 
            </button>
          </div>
          <img src="includes/img/Login_page/register.png" class="image" alt="" />
        </div>
      </div>
    </div>

    
    <script src="includes/Js/script.js"></script>
  </body>
</html>
