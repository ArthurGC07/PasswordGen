<!-- Section: Design Block -->
<section class=" text-center text-lg-start">
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>

  <div class="card mb-3" style="width: 80%; margin-left: 10%; margin-top: 5%;">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="../imgs/draw2.svg"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5" style="background-color: #212529;">
        <?php if(@$_GET['e']){
          echo '<p style="color: red;">The password does not match! check your spelling</p>';
        } ?>

          <form method="POST" action="<?php echo HOME_URI;?>controller/create_account.php">
            <!-- Email input -->
            <h2>Create an Account</h2><br>
            <div class="form-outline mb-4">
              <label class="form-label" for="form2Example1">Email address</label>
              <input required type="email" id="form2Example1" class="form-control" name="login_user" placeholder="Email" oninvalid="alert('Please fill the form')"/>
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="form2Example1">Name</label>
              <input required type="text" id="form2Example1" class="form-control" name="nm_user" placeholder="Name" oninvalid="alert('Please fill the form')"/>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form2Example2">Password</label>
              <input required type="password" id="form2Example2" class="form-control" name="pw_user" id="create_pw_login" placeholder="Password" oninvalid="alert('Invalid password, please fill the form')" />
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="form2Example2">Confirm Password</label>
              <input required type="password" id="form2Example2" class="form-control" name="confirm_pw_user" id="confirm_pw_login" placeholder="Password" oninvalid="alert('Invalid password, please fill the form')" />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Create Account</button>

            <!--Log in-->
            <a href="<?php echo HOME_URI;?>controller/home.php" style="float: right" class="btn btn-primary btn-block mb-4">Login instead</a>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->