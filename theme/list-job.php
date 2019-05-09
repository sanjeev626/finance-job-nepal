<?php include('includes/head-other.php');?> 
       
       
      <!-- Top Job Area Start -->
      <section class="fjn-top-job-area browse-page section_15">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-lg-3">                  
                  <?php include('includes/search-left-menu.php');?> 
               </div>
               <div class="col-md-12 col-lg-9">
                  <div class="job-grid-right">
                  <?php for($i=0;$i<10;$i++){?>
                  <div class="sidebar-list-single">
                     <div class="top-company-list">
                        <div class="company-list-logo">
                           <a href="#">
                           <img src="assets/img/company-logo-1.png" alt="company list 1">
                           </a>
                        </div>
                        <div class="company-list-details">
                           <h3><a href="#">Regional Sales Manager</a></h3>
                           <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu, Nepal</p>
                           <p class="company-state" title="Posted On"><i class="fa fa-calendar"></i> 2019-03-14</p>
                              <p class="open-icon"  title="Apply Before"><i class="fa fa-calendar"></i>2019-04-13</p>
                           <p class="varify"><i class="fa fa-check"></i>Part Time</p>
                        </div>
                        <div class="company-list-btn">
                           <a href="#" class="fjn-btn">View Details</a>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  </div>
                  <!-- end job sidebar list -->
                  <div class="pagination-box-row top_margin_15">
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
      </section>
      <!-- Top Job Area End -->
<?php include('includes/footer.php');?>