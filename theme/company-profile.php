<?php include('includes/head-other.php');?>       

      <!-- Candidate Dashboard Area Start -->
      <section class="candidate-dashboard-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-lg-3 dashboard-left-border">
                  <?php include('includes/employer-left-menu.php');?> 
               </div>
               <div class="col-md-12 col-lg-9">
                  <div class="dashboard-right">
                     <div class="candidate-profile">
                        <div class="candidate-single-profile-info">
                           <div class="single-resume-feild resume-avatar">
                              <div class="resume-image company-resume-image">
                                 <img src="assets/img/company_page_logo.jpg" alt="resume avatar">
                                 <div class="resume-avatar-hover">
                                    <div class="resume-avatar-upload">
                                       <p>
                                          <i class="fa fa-pencil"></i>
                                          Edit
                                       </p>
                                       <input type="file">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="candidate-single-profile-info">
                           <form>
                              <div class="resume-box">
                                 <h3>company profile</h3>
                                 <div class="single-resume-feild ">
                                    <div class="single-input">
                                       <label for="name">Organization Name:</label>
                                       <input type="text" value="Digital Agency Catmandu" id="name">
                                    </div>
                                 </div>
                                 <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                       <label for="c_cat">Organization_type::</label>
                                       <select id="c_cat">
                                          <option selected>Choose Category</option>
                                          <option>IT Service</option>
                                          <option>Non-Profit</option>
                                          <option>StartUP</option>
                                          <option>Corporate</option>
                                       </select>
                                    </div>
                                    <div class="single-input">
                                       <label for="Start">Organization_size:</label>
                                       <select id="c_cat">
                                          <option selected>Choose Size</option>
                                          <option>1 - 10</option>
                                          <option>11 - 25</option>
                                          <option>25 - 100</option>
                                          <option>100 Plus</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                       <label for="Phone">Phone:</label>
                                       <input type="text" value="+88-123-4467-9" id="Phone">
                                    </div>
                                    <div class="single-input">
                                       <label for="Email">Email:</label>
                                       <input type="text" value="demo@mail.com" id="Email">
                                    </div>
                                 </div>
                                 <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                       <label for="Location">POBox:</label>
                                       <input type="text" value="London" id="Location">
                                    </div>
                                    <div class="single-input">
                                       <label for="City">Website:</label>
                                       <input type="text" value="Westminster" id="City">
                                    </div>
                                 </div>
                                 <div class="single-resume-feild ">
                                    <div class="single-input">
                                       <label for="name">Organization Address:</label>
                                       <input type="text" value="Baluwatar, Kathmandu, Nepal" id="name">
                                    </div>
                                 </div>
                                 <div class="single-resume-feild ">
                                    <div class="single-input">
                                       <label for="Bio">Description:</label>
                                       <textarea id="Bio">Maecenas is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="resume-box">
                                 <h3>Contact Information</h3>
                                 <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                       <label for="Phone">Contact Name:</label>
                                       <input type="text" value="Madan Aacharya" id="Phone">
                                    </div>
                                    <div class="single-input">
                                       <label for="Email">Contact Designation:</label>
                                       <input type="text" value="Manager" id="Email">
                                    </div>
                                 </div>
                                 <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                       <label for="City">Contact Mobile:</label>
                                       <input type="text" value="9841000000" id="City">
                                    </div>
                                    <div class="single-input">
                                       <label for="Location">Contact Email:</label>
                                       <input type="text" value="demo@company.com" id="Location">
                                    </div>
                                 </div>
                                 <div class="single-resume-feild">
                                    <div class="single-input">
                                       <label for="City2">Alternate Contact Name:</label>
                                       <input type="text" value="Subodh Pokhrel" id="City2">
                                    </div>
                                 </div>
                              </div>
                              <div class="resume-box">
                                 <h3>social link</h3>
                                 <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                       <label for="twitter">
                                       <i class="fa fa-facebook facebook"></i>
                                       facebook
                                       </label>
                                       <input type="text" value="https://www.facebook.com/" id="facebook" name="facebook">
                                    </div>
                                    <div class="single-input">
                                       <label for="linkedin">
                                       <i class="fa fa-linkedin linkedin"></i>
                                       linkedin
                                       </label>
                                       <input type="text" value="https://www.linkedin.com/" id="linkedin" name="twitter">
                                    </div>
                                 </div>
                              </div>
                              <div class="submit-resume">
                                 <button type="submit">Update</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Candidate Dashboard Area End -->
<?php include('includes/footer.php');?>       
