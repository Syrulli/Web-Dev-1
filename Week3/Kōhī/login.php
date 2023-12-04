<?php
  // session_start();
  $title = "Sign in | Kōhī®";
  if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You already Logged in";
    header('Location: index.php');
    exit();
  }
  include('includes/header.php');
?>

<section style="background-color: #e4e4e4;">
  <div class="container">
    <div class="row min-vh-100 align-items-center">
      <div class="col-lg-6 col-sm-12">
        <div class="card text-black">
          <div class="card-header text-center" style="background-color: #1f8555;">
            <h4 class="text-white" style="letter-spacing: 5px; font-size: 20pt;">Sign in</h4>
          </div>
          <div class="card-body">
            <form action="functions/auth.php" method="POST">
              <div class="mb-3">
                <label class="form-label"><small> <i class="fa-solid fa-at"></i> Email address</label></small>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label"><small><i class="fa-solid fa-key"></i> Password</label></small> 
                <input type="password" name="password" class="form-control">
              </div>
              <button type="submit" name="login_btn" class="btn btn-outline-success btn-sm float-end">Sign in</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
          <img src="img/login.png" alt="login-image" width="100%" height="60%">
      </div>

      <p class="text-center"><i class="fa-solid fa-cookie"></i> 
			  This site uses cookies. By continuing to browse the site, you are agreeing to our use of cookies. Read more of our <a href="#" style="color: #1f8555;"><ins> Privacy Policy.</ins></a> 
    </div>
  </div>
</section>

<?php include('includes/footer.php'); ?>