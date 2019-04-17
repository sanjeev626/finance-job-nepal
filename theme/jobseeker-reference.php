<?php include('includes/head-other.php');?>

<section class="candidate-dashboard-area section_70">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-4 ">
        <?php include('includes/jobseeker-left-menu.php');?>
      </div>
      <div class="col-md-12 col-lg-8 dashboard-left-border">
        <div class="dashboard-right">
          <div class="candidate-single-profile-info earnings-page-box manage-jobs">
            <form method="post" name="update_education">
              <div class="resume-box text-left">
                <div class="single-resume-feild">
                  <div class="single-input">
                    <h4>Reference :</h4>
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <input type="text" required="" name="reference_name" value="" class="form-control" placeholder="Reference's Name">
                  </div>
                  <div class="single-input">                    
                    <input type="text" required="" name="position" value="" class="form-control" placeholder="Position">
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <input type="text" required="" name="organization_name" value="" class="form-control" placeholder="Organization name">
                  </div>
                  <div class="single-input">
                    <input type="text" required="" name="email" value="" class="form-control" placeholder="Email">
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <input type="number" required="" name="mobile_number" value="" class="form-control" placeholder="Mobile Number">
                  </div>
                  <div class="single-input">
                    <input type="number" required="" name="other_number" value="" class="form-control" placeholder="Other Number">
                  </div>
                </div>
                <div class="single-resume-feild">
                  <div class="single-input text-center">
                    <a href="" onclick="return false;" class="" id="add-more"><i class="fa fa-plus" aria-hidden="true"></i> Add Another Reference
                    </a>
                  </div>
                </div>
                <div class="submit-resume">
                  <button name="btnSave" type="submit">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('includes/footer.php');?>