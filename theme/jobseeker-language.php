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
                    <h4>Languages :</h4>
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <input type="text" required="" name="anguage" value="" class="form-control" placeholder="Language">
                  </div>
                  <div class="single-input">
                    <select name="reading" id="reading">
                      <option>Reading</option>
                      <option>Excellent</option>
                      <option>Good</option>
                      <option>Medium</option>
                      <option>Bad</option>
                    </select>                  
                  </div>
                  <div class="single-input">
                    <select name="writing" id="writing">
                      <option>Writing</option>
                      <option>Excellent</option>
                      <option>Good</option>
                      <option>Medium</option>
                      <option>Bad</option>
                    </select>                  
                  </div>
                  <div class="single-input">
                    <select name="speaking" id="speaking">
                      <option>Speaking</option>
                      <option>Excellent</option>
                      <option>Good</option>
                      <option>Medium</option>
                      <option>Bad</option>
                    </select>                  
                  </div>
                  <div class="single-input">
                    <select name="listening" id="listening">
                      <option>Listening</option>
                      <option>Excellent</option>
                      <option>Good</option>
                      <option>Medium</option>
                      <option>Bad</option>
                    </select>                  
                  </div>
                </div>
                <div class="single-resume-feild">
                  <div class="single-input text-center">
                    <a href="" onclick="return false;" class="" id="add-more"><i class="fa fa-plus" aria-hidden="true"></i> Add Another Language
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