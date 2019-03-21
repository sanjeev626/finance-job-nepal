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
                     <div class="earnings-page-box manage-jobs">
                        <div class="manage-jobs-heading">
                           <h3>Post A new job</h3>
                        </div>
                        <div class="new-job-submission">
                           <form>
                              <div class="resume-box">
                                 <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                       <label for="j_title">Job Title:</label>
                                       <input type="text" id="j_title" class="form-control" >
                                    </div> 
                                    <div class="single-input">
                                       <label for="Location">Job Category:</label> 
                                       <select name="jobcategory" class="form-control">
                                         <option value="301">Select One</option>
                                         <option value="301">Administrator</option>
                                         <option value="302">Finance</option>
                                         <option value="441">Accounting</option>
                                         <option value="303">Finance</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="single-resume-feild feild-flex-2">                                    
                                    <div class="single-input">
                                       <label for="Location">Location:</label> 
                                       <select multiple="" class="form-control" name="joblocation[]">
                                         <option value="313">Bhaktapur</option>
                                         <option value="92">Biratnagar</option>
                                         <option value="317">Butwal</option>
                                         <option value="300">Kathmandu</option>
                                         <option value="333">Lalitpur</option>
                                         <option value="344">Morang</option>
                                         <option value="254">Narayangarh</option>
                                         <option value="345">Nawalparasi</option>
                                         <option value="275">Nepalgunj</option>
                                         <option value="270">Pokhara</option>
                                         <option value="335">Sindhupalchowk</option>
                                         <option value="357">Siraha</option>
                                         <option value="356">Sunsari</option>
                                         <option value="355">Surkhet</option>
                                       </select>
                                    </div>
                                    <div class="single-input">
                                       <label for="j_type">Job Type:</label>
                                       <select id="j_type" class="form-control">
                                          <option value=''>Select One</option>
                                          <option value="1">Full TIme</option>
                                          <option value="2">Freelance</option>
                                          <option value="3">Part Time</option>
                                          <option value="4">Internship</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                       <label for="External">Preferred Gender</label>
                                       <select id="j_type" class="form-control">
                                          <option value=''>Select One</option>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                          <option value="Male/Female">Male/Female</option>
                                       </select>
                                    </div>
                                    <div class="single-input">
                                       <label for="j_category">Required Number:</label>
                                       <input type="text" id="j_title" class="form-control">
                                    </div>
                                 </div>
                                 <div class="single-resume-feild feild-flex-2">                                    
                                    <div class="single-input">
                                       <label for="Location">Job Level:</label> 
                                       <select name="joblocation" class="form-control">
                                         <option value="313">Entry Level</option>
                                         <option value="92">Mid Level</option>
                                         <option value="317">Senior Level</option>
                                         <option value="300">Top Level</option>
                                       </select>
                                    </div>
                                    <div class="single-input">
                                       <label for="j_type">Salary Range:</label>
                                       <select id="j_type" class="form-control">
                                          <option value=''>Select One</option>
                                          <option value="440">As per the Company's Policy</option>
                                          <option value="415">Don't disclose</option>
                                          <option value="431">Negotiable based on current salary, experience</option>
                                          <option value="153">NRs. 10000-15000</option>
                                          <option value="413">NRs. 100000+</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                       <label for="Location">Preferred Education:</label> 
                                       <select name="jobcategory" class="form-control">
                                         <option value="301">Select One</option>
                                         <option value="Not Required">Not Required</option>
                                        <option value="intermediate">Intermediate</option>
                                        <option value="bachelor">Bachelor</option>
                                        <option value="master">Master</option>
                                        <option value="other">Other</option>
                                     </select>
                                    </div>
                                    <div class="single-input">
                                       <label for="j_title">Expected Faculty :</label>
                                       <input type="text" id="j_title" class="form-control">
                                    </div> 
                                 </div>
                                 <div class="single-resume-feild feild-flex-2">                                    
                                    <div class="single-input">
                                       <label for="Location">Is Experience Required:</label> 
                                       <select name="joblocation">
                                         <option value="313">Yes</option>
                                         <option value="92">No</option>
                                       </select>
                                    </div>
                                    <div class="single-input">
                                       <label for="j_type">Experience (In Years):</label>
                                       <select id="j_type">
                                          <option value=''>Select One</option>
                                          <option value="440">1</option>
                                          <option value="415">2</option>
                                          <option value="431">3</option>
                                          <option value="153">4</option>
                                          <option value="413">5</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="single-resume-feild">
                                    <div class="single-input">
                                       <label for="j_desc">Job Specification:</label>
                                       <textarea id="j_desc"></textarea>
                                    </div>
                                 </div>
                                 <div class="single-resume-feild">
                                    <div class="single-input">
                                       <label for="j_desc">Job Description:</label>
                                       <textarea id="j_desc"></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="single-input submit-resume">
                                 <button type="submit">Post Job</button>
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
       
      