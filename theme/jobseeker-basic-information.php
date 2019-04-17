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
            <form>
              <div class="resume-box text-left">
                <div class="single-resume-feild">
                  <div class="single-input">
                    <h4>Basic Information :</h4>
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <input type="text" value="Roshan" id="name" placeholder="First Name">
                  </div>
                  <div class="single-input">
                    <input type="text" value="" id="p_title" placeholder="Middle Name">
                  </div>
                  <div class="single-input">
                    <input type="text" value="Acharya" id="p_title" placeholder="Last Name">
                  </div>
                </div>
                <div class="single-resume-feild ">
                  <div class="single-input">
                    <input type="text" required="" name="orgname" value="Nakhu Dobato, Lalitpur, Nepal" class="form-control" placeholder="Address">
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <input type="text" value="email@domain.com" id="" placeholder="Email">
                  </div>
                  <div class="single-input">
                    <input type="text" value="9841000000" id="" placeholder="Mobile">
                  </div>
                </div>
                <div class="date-post-job">
                  <div class="single-input">
                     <label>Gender:</label>
                  </div>
                   <div class="form-group form-radio">
                      <input id="last_hour" name="radio" type="radio" checked>
                      <label for="last_hour" class="inline control-label">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input id="last_24" name="radio" type="radio">
                      <label for="last_24" class="inline control-label"> Female</label>
                   </div>
                </div>
              </div>
              <div class="resume-box text-left">
                <div class="single-resume-feild">
                  <div class="single-input">
                    <h4>Career Information</h4>
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <select id="gender">
                      <option>Select Highest Qualification</option>
                      <option>PHD</option>
                      <option>Masters</option>
                      <option>Bachelor</option>
                    </select>
                  </div>
                  <div class="single-input">
                    <select id="experience">
                      <option>Select Experience in years</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                    </select>
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <input type="text" value="" id="" placeholder="Past Employer">
                  </div>
                  <div class="single-input">
                    <input type="text" value="" id="" placeholder="Current Employer">
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <input type="text" value="" id="" placeholder="Position">
                  </div>
                  <div class="single-input">
                    <select id="experience">
                      <option>Select Expected Salary</option>
                      <option>1000 - 10000</option>
                      <option>10001 - 50000</option>
                      <option>Above 50000</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="resume-box text-left">
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <label for="w_screen">Passport size profile picture</label>
                    <div class="product-upload">
                      <p class="text-left"> <i class="fa fa-upload"></i> Max file size is 1MB<br>
                        Suitable files are .jpg &amp; .png </p>
                      <input type="file" id="w_screen">
                    </div>
                  </div>
                  <div class="single-input">
                    <label for="w_screen">Updated CV / Resume</label>
                    <div class="product-upload">
                      <p class="text-left"> <i class="fa fa-upload"></i> Max file size is 3MB<br>
                        Suitable files are .doc, .docx &amp; .pdf </p>
                      <input type="file" id="w_screen">
                    </div>
                  </div>
                </div>
              </div>
              <div class="resume-box text-left">
                <div class="single-resume-feild">
                  <div class="single-input">
                    <h4>social link</h4>
                  </div>
                </div>
                <div class="single-resume-feild feild-flex-2">
                  <div class="single-input">
                    <label for="twitter"> <i class="fa fa-facebook facebook"></i> facebook </label>
                    <input type="text" value="" id="facebook" name="facebook" placeholder="https://www.facebook.com/financejobnepal">
                  </div>
                  <div class="single-input">
                    <label for="linkedin"> <i class="fa fa-linkedin linkedin"></i> linkedin </label>
                    <input type="text" value="" id="linkedin" name="twitter" placeholder="https://www.linkedin.com/financejobnepal">
                  </div>
                </div>
              </div>
              <div class="submit-resume">
                <button type="submit">Signup</button>
                Signup via Facebook | 
                Signup via Linked In | 
                Signup via gmail </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('includes/footer.php');?>