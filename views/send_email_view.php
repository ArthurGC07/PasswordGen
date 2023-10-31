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

          <form method="POST" action="recover_pw.php?default=code">
            <!-- Email input -->
            <h2>We sent you an email!</h2><br>
            <div class="form-outline mb-4">
              <label class="form-label" for="form2Example1">Please enter the code we sent</label>
              <input required type="text" id="form2Example1" class="form-control" name="code" placeholder="your code" style="text-transform: uppercase" oninvalid="alert('Please fill the form')"/>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Recover</button>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->