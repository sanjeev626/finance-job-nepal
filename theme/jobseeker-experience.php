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
                    <h4>Work Experience :</h4>
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <input type="text" required="" name="organization_name" value="" class="form-control" placeholder="Organization name">
                  </div>
                  <div class="single-input">
                    <input type="text" required="" name="job_location" value="" class="form-control" placeholder="Job location">
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <input type="text" required="" name="job_title" value="" class="form-control" placeholder="Job Title">
                  </div>
                  <div class="single-input">
                    <select name="from_year" id="from_year">
                      <option>Job level</option>
                      <option>Top Level</option>
                      <option>Senior Level</option>
                      <option>Mid Level</option>
                      <option>Entry Level</option>
                    </select>                  
                  </div>
                </div>
                <div class="single-job-sidebar sidebar-type">
                  <div class="job-sidebar-box checkbox section_0">
                     <input class="checkbox-spin" type="checkbox" id="currently_working" name="currently_working" />
                     <label for="currently_working" class="currently_working"><span></span>Currently working here?</label>                      
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <select name="to_month" id="to_month">
                      <option>Start Month</option>
                      <option>January</option>
                      <option>February</option>
                    </select>
                  </div>
                  <div class="single-input">
                    <select name="to_year" id="to_year">
                      <option>Start Year</option>
                      <option>2019</option>
                      <option>2018</option>
                    </select>                  
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <select name="to_month" id="to_month">
                      <option>End Month</option>
                      <option>January</option>
                      <option>February</option>
                    </select>
                  </div>
                  <div class="single-input">
                    <select name="to_year" id="to_year">
                      <option>End Year</option>
                      <option>2019</option>
                      <option>2018</option>
                    </select>                  
                  </div>
                </div>
                <div class="single-resume-feild">
                  <div class="single-input">
                    <textarea name="duties_and_responsibilities" id="duties_and_responsibilities" placeholder="Duties &amp; Responsibilities Here..."></textarea>
                  </div>
                </div>
                <div class="single-resume-feild">
                  <div class="single-input text-center">
                    <a href="" onclick="return false;" class="" id="add-more"><i class="fa fa-plus" aria-hidden="true"></i> Add Another Experience
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