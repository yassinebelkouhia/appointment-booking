<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container-fluid" style="overflow-x: hidden">
  <div class="col-lg-12 d-flex m-5  ">
    <div class="col-lg-6   d-flex ">
      <div class="card card-body  ">
        <h2>Login</h2>
        <p>Please fill in your credentials to log in</p>
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
          <div class="form-group">
            <label for="email">Reference: <sup>*</sup></label>
            <input type="text" name="Reference" class="form-control form-control-lg <?php echo (!empty($data['ref_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $data['ref_err']; ?></span>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" name="submit" value="Login" class="btn btn-success btn-block" style="background-color: #536DFE;">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">No account? Register</a>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="imageLogin col-lg-6 ">

      <img src="<?php echo URLROOT ?>/public/img/login.svg" class="col-lg-11" alt="">
    </div>
  </div>

</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>