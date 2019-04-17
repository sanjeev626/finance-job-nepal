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
                    <h4>Trainings :</h4>
                  </div>
                </div>

                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <input type="text" required="" name="name_of_training" value="" class="form-control" placeholder="Name of Training">
                  </div>
                  <div class="single-input">
                    <input type="text" required="" name="institution_name" value="" class="form-control" placeholder="Institution Name">
                  </div>
                </div>

                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <select name="from_month" id="from_month">
                      <option>From Month</option>
                      <option>January</option>
                      <option>February</option>
                    </select>
                  </div>
                  <div class="single-input">
                    <select name="from_year" id="from_year">
                      <option>From Year</option>
                      <option>2019</option>
                      <option>2018</option>
                    </select>                  
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <select name="to_month" id="to_month">
                      <option>To Month</option>
                      <option>January</option>
                      <option>February</option>
                    </select>
                  </div>
                  <div class="single-input">
                    <select name="to_year" id="to_year">
                      <option>To Year</option>
                      <option>2019</option>
                      <option>2018</option>
                    </select>                  
                  </div>
                </div>
                <div class="single-resume-feild">
                  <div class="single-input text-center">
                    <a href="" onclick="return false;" class="" id="add-more"><i class="fa fa-plus" aria-hidden="true"></i> Add Another Training
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