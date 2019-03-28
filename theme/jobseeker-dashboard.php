<?php include('includes/head-other.php');?>

<section class="candidate-dashboard-area section_70">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="job-grid-right">
          <div class="browse-job-head-option">
            <div class="col-md-12 col-lg-3 text-center">
              <h3>20%</h3>
              <div style="border: 1px solid;">
                <?php
                $percentage_complete = 20;
                if($percentage_complete<30)
                  $background_color="red";
                elseif($percentage_complete>30 or $percentage_complete<60)
                  $background_color="lightgreen";
                else
                  $background_color="green";
                ?>
                <div style="background-color:<?php echo $background_color;?>; height: 15px;width: 20%;"></div>
              </div>
            </div>
            <div class="col-md-12 col-lg-7">
              <h3>Profile Completeness</h3>
              <p>Complete your profile to 100% to increase the chance of getting shortlisted for the job!</p>
            </div>
            <div class="col-md-12 col-lg-2">
              <div class="submit-resume">
                <button type="submit">Update your Profile</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-3 dashboard-left-border">
        <?php include('includes/employer-left-menu.php');?>
      </div>
      <div class="col-md-12 col-lg-9">
        <div class="job-grid-right">
          <div class="browse-job-head-option">
            <div class="job-browse-search">
              <form>
                <input type="search" placeholder="Search Jobs Here...">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
            <div class="job-browse-action"> 
              <!-- <div class="email-alerts">
                              <input type="checkbox" class="styled" id="b_1">
                              <label class="styled" for="b_1">email alerts for this search</label>
                           </div> -->
              <div class="dropdown">
                <button class="btn-dropdown dropdown-toggle" type="button" id="dropdowncur" data-toggle="dropdown" aria-haspopup="true">Sort By</button>
                <ul class="dropdown-menu" aria-labelledby="dropdowncur">
                  <li>Newest</li>
                  <li>Oldest</li>
                  <li>Random</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- end job head -->
          <div class="job-sidebar-list-single">
            <div class="sidebar-list-single">
              <h3>Jobs matching your profile.</h3>
              <p>This list is shown based on your Job Preference</p>
            </div>
            <div class="sidebar-list-single">
              <div class="top-company-list">
                <div class="company-list-logo"> <a href="#"> <img src="assets/img/company-logo-1.png" alt="company list 1"> </a> </div>
                <div class="company-list-details">
                  <h3><a href="#">Regional Sales Manager</a></h3>
                  <span>
                     <a href="#"><i class="fa fa-building"></i> <a href="#"><i class="fa fa-building"></i> Company Name</a></a>
                  </span><br>
                  <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                  <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                  <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p>
                </div>
                <div class="company-list-btn"> <a href="#" class="fjn-btn">Apply now</a> </div>
              </div>
            </div>
            <!-- end sidebar single list -->
            <div class="sidebar-list-single">
              <div class="top-company-list">
                <div class="company-list-logo"> <a href="#"> <img src="assets/img/company-logo-4.png" alt="company list 1"> </a> </div>
                <div class="company-list-details">
                  <h3><a href="#">C Developer (Senior) C .Net</a></h3>
                  <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                  <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                  <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                  <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p>
                </div>
                <div class="company-list-btn"> <a href="#" class="fjn-btn">Apply Now</a> </div>
              </div>
            </div>
            <!-- end sidebar single list -->
            <div class="sidebar-list-single">
              <div class="top-company-list">
                <div class="company-list-logo"> <a href="#"> <img src="assets/img/company-logo-2.png" alt="company list 1"> </a> </div>
                <div class="company-list-details">
                  <h3><a href="#">Regional Sales Manager</a></h3>
                  <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                  <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                  <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                  <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p>
                </div>
                <div class="company-list-btn"> <a href="#" class="fjn-btn">Apply Now</a> </div>
              </div>
            </div>
            <!-- end sidebar single list -->
            <div class="sidebar-list-single">
              <div class="top-company-list">
                <div class="company-list-logo"> <a href="#" title="<a href="#"><i class="fa fa-building"></i> Company Name</a>"> <img src="assets/img/company-logo-3.png" alt="company list 1"> </a> </div>
                <div class="company-list-details">
                  <h3><a href="#">Asst. Teacher</a></h3>
                  <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                  <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                  <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                  <p class="varify"><i class="fa fa-check"></i>Accounting / Finance</p>
                </div>
                <div class="company-list-btn"> <a href="#" class="fjn-btn">Apply Now</a> </div>
              </div>
            </div>
            <!-- end sidebar single list -->
            <div class="sidebar-list-single">
              <div class="top-company-list">
                <div class="company-list-logo"> <a href="#"> <img src="assets/img/company-logo-2.png" alt="company list 1"> </a> </div>
                <div class="company-list-details">
                  <h3><a href="#">civil engineer</a></h3>
                  <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                  <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                  <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                  <p class="varify"><i class="fa fa-check"></i>Accounting / Finance</p>
                </div>
                <div class="company-list-btn"> <a href="#" class="fjn-btn">Apply Now</a> </div>
              </div>
            </div>
            <!-- end sidebar single list -->
            <div class="sidebar-list-single">
              <div class="top-company-list">
                <div class="company-list-logo"> <a href="#"> <img src="assets/img/company-logo-3.png" alt="company list 1"> </a> </div>
                <div class="company-list-details">
                  <h3><a href="#">Asst. Teacher</a></h3>
                  <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                  <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                  <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                  <p class="varify"><i class="fa fa-check"></i>Accounting / Finance</p>
                </div>
                <div class="company-list-btn"> <a href="#" class="fjn-btn">Apply Now</a> </div>
              </div>
            </div>
            <!-- end sidebar single list -->
            <div class="sidebar-list-single">
              <div class="top-company-list">
                <div class="company-list-logo"> <a href="#"> <img src="assets/img/company-logo-1.png" alt="company list 1"> </a> </div>
                <div class="company-list-details">
                  <h3><a href="#">Regional Sales Manager</a></h3>
                  <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                  <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                  <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                  <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p>
                </div>
                <div class="company-list-btn"> <a href="#" class="fjn-btn">Apply Now</a> </div>
              </div>
            </div>
            <!-- end sidebar single list -->
            <div class="sidebar-list-single">
              <div class="top-company-list">
                <div class="company-list-logo"> <a href="#"> <img src="assets/img/company-logo-4.png" alt="company list 1"> </a> </div>
                <div class="company-list-details">
                  <h3><a href="#">C Developer (Senior) C .Net</a></h3>
                  <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                  <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                  <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                  <p class="varify"><i class="fa fa-check"></i>Accounting / Finance</p>
                </div>
                <div class="company-list-btn"> <a href="#" class="fjn-btn">Apply Now</a> </div>
              </div>
            </div>
            <!-- end sidebar single list -->
            <div class="sidebar-list-single">
              <div class="top-company-list">
                <div class="company-list-logo"> <a href="#"> <img src="assets/img/company-logo-3.png" alt="company list 1"> </a> </div>
                <div class="company-list-details">
                  <h3><a href="#">Asst. Teacher</a></h3>
                  <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                  <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                  <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                  <p class="varify"><i class="fa fa-check"></i>Accounting / Finance</p>
                </div>
                <div class="company-list-btn"> <a href="#" class="fjn-btn">Apply Now</a> </div>
              </div>
            </div>
            <!-- end sidebar single list -->
            <div class="sidebar-list-single">
              <div class="top-company-list">
                <div class="company-list-logo"> <a href="#"> <img src="assets/img/company-logo-2.png" alt="company list 1"> </a> </div>
                <div class="company-list-details">
                  <h3><a href="#">civil engineer</a></h3>
                  <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                  <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                  <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                  <p class="varify"><i class="fa fa-check"></i>Accounting / Finance</p>
                </div>
                <div class="company-list-btn"> <a href="#" class="fjn-btn">Apply Now</a> </div>
              </div>
            </div>
            <!-- end sidebar single list --> 
          </div>
          <!-- end job sidebar list -->
          <div class="pagination-box-row">
            <p>Page 1 of 6</p>
            <ul class="pagination">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li>...</li>
              <li><a href="#">6</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div>
          <!-- end pagination --> 
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Candidate Dashboard Area End -->
<?php include('includes/footer.php');?>
