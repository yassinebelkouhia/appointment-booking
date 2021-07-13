<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="container-fluid">
  <div class="col-lg-12 d-flex w-75 mx-auto mt-5" style="background-color:#9b9da7;border-radius:20px;">
    <div class="col-md-5 p-3 mt-0 d-flex  " >
      <div class="card card-body bg-light  mt-4">
        <h2>Create An Account</h2>
        <p>Please fill out this form to register with us</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
          <div class="form-group">
            <label for="name">FirstName: <sup>*</sup></label>
            <input type="text" name="FirstName" class="form-control form-control-lg <?php echo (!empty($data['f_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $data['f_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="name">LastName: <sup>*</sup></label>
            <input type="text" name="LastName" class="form-control form-control-lg <?php echo (!empty($data['l_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $data['l_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="name">Age: <sup>*</sup></label>
            <input type="text" name="age" class="form-control form-control-lg <?php echo (!empty($data['age_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $data['age_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="name">Phone Number: <sup>*</sup></label>
            <input type="text" name="tel" class="form-control form-control-lg <?php echo (!empty($data['tel_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $data['tel_err']; ?></span>
          </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block" style="background-color: #536DFE;">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="imageLogin col-lg-7 p-0 mt-5 ">

      <img src="<?php echo URLROOT ?>/public/img/signup.svg" class="col-lg-11" alt="">
    </div>
  </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>