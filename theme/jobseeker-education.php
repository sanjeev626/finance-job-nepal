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
                    <h4>Education :</h4>
                  </div>
                </div>

                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <select name="degree" id="degree">
                      <option>Select Degree</option>
                      <option>Intermediate</option>
                      <option>Bachelor</option>
                    </select>
                  </div>
                  <div class="single-input">
                    <input type="text" required="" name="education_program" value="" class="form-control" placeholder="Education Program">
                  </div>
                </div>

                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <select name="education_board" id="education_board">
                      <option>Select Education Board</option>
                      <option>HSEB</option>
                      <option>Pokhara University</option>
                    </select>
                  </div>
                  <div class="single-input">
                    <input type="text" value="" name="name_of_institute" id="name_of_institute" placeholder="Name of Institute">
                  </div>
                </div>
                <div class="single-job-sidebar sidebar-type">
                  <div class="job-sidebar-box checkbox section_0">
                     <input class="checkbox-spin" type="checkbox" id="currently_studying" name="currently_studying" />
                     <label for="currently_studying" class="currently_studying"><span></span>Currently studying here?</label>                      
                  </div>
                </div>
                <div class="graduation">
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <select id="marks_secured_in" name="marks_secured_in">
                      <option>Marks secured in</option>
                      <option>Percentage</option>
                      <option>CGPA</option>
                    </select>
                  </div>
                  <div class="single-input">
                    <input type="text" value="" id="marks_secured" name="marks_secured" placeholder="Marks Secured">
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <select id="gender">
                      <option>Select Graduation Year</option>
                      <option>2019</option>
                      <option>2018</option>
                    </select>
                  </div>
                  <div class="single-input">
                    <select id="gender">
                      <option>Select Graduation Month</option>
                      <option>January</option>
                      <option>February</option>
                    </select>
                  </div>
                </div>
                </div>
                <div class="single-resume-feild feild-flex-2 started" style="display: none;">
                  <div class="single-input">
                    <select id="gender">
                      <option>Select Started Year</option>
                      <option>2019</option>
                      <option>2018</option>
                    </select>
                  </div>
                  <div class="single-input">
                    <select id="gender">
                      <option>Select Started Month</option>
                      <option>January</option>
                      <option>February</option>
                    </select>
                  </div>
                </div>
                <div class="single-resume-feild">
                  <div class="single-input text-center">
                    <a href="" onclick="return false;" class="" id="add-more"><i class="fa fa-plus" aria-hidden="true"></i> Add Another Education
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