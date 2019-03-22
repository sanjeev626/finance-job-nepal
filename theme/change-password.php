<?php include('includes/head-other.php');?>       
      <!-- Candidate Dashboard Area Start -->
      <section class="candidate-dashboard-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-12 dashboard-left-border">
                  <?php include('includes/employer-left-menu.php');?>
               </div>
               <div class="col-lg-9 col-md-12">
                  <div class="dashboard-right">
                     <div class="change-pass manage-jobs">
                        <div class="manage-jobs-heading">
                           <h3>Change Password</h3>
                        </div>
                        <form>
                           <p>
                              <label for="old_pass">Old Password</label>
                              <input type="password" placeholder="*******" id="old_pass">
                           </p>
                           <p>
                              <label for="new_pass">New Password</label>
                              <input type="password" placeholder="*******" id="new_pass">
                           </p>
                           <p>
                              <label for="confirm_pass">confirm Password</label>
                              <input type="password" placeholder="*******" id="confirm_pass">
                           </p>
                           <p>
                              <button type="submit">Update</button>
                           </p>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Candidate Dashboard Area End -->
<?php include('includes/footer.php');?>       
      