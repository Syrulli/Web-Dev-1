<?php
  // session_start();
  $title = "Join Now | Kōhī®";
  if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You already Logged in";
    header('Location: index.php');
    exit();
  }
  
  include('includes/header.php');
?>
<div class="container mt-5" style="width: 30%;">
  <div class="row">
    <div class="col-12">

      <?php
        if (isset($_SESSION['message'])) { ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?= $_SESSION['message'];?></strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
          unset($_SESSION['message']);
        }
      ?>

      <div class="card" style="background-color: var(--section);">
        <div class="card-header">
          <h4>Create an account</h4>
        </div>
        <div class="card-body">
          <form action="functions/auth.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Phone</label>
              <input type="number" name="phone" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input type="password" name="cpassword" class="form-control">
            </div>
            <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>