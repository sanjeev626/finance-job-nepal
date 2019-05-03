<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->


<!-- Candidate Dashboard Area Start -->
<section class="candidate-dashboard-area section_70">
    <div class="container">
        <?php
        if (!empty($employerInfo->organization_banner)){
        $bannerimgurl = base_url().'uploads/employer/'.$employerInfo->organization_banner;
        ?>
        <div class="row dashboardbanner">
            <div class="col-md-12 col-lg-12">
                <img src="<?php echo $bannerimgurl;?>" alt="<?php echo $employerInfo->organization_name;?>">
            </div>
        </div>
        <?php } ?>

        <div class="row margin_top_15">
            <?php $this->load->view('includes/employer-dashboard-sidebar');?>

            <div class="col-md-12 col-lg-9">

                <div class="dashboard-right">
                    <div class="manage-jobs">
                        <div class="manage-jobs-heading">
                            <h3>My Active Jobs</h3>
                        </div>
                        <div class="single-manage-jobs table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Posted on </th>
                                    <th>Expiring on </th>
                                    <th>No of Applicants</th>
                                    <th>Status</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($activejobs)) {
                                    foreach ($activejobs as $aj) {
                                        ?>
                                        <tr>
                                            <td class="manage-jobs-title"><a href="#"><?php echo $aj->jobtitle ?></a>
                                            </td>
                                            <td class="table-date"><?php echo date('d M Y', strtotime($aj->post_date)); ?></td>
                                            <td class="table-date"><?php echo date('d M Y', strtotime($aj->applybefore)); ?></td>
                                            <td class="table-date text-center"><a href="list-candidates.php">10</a></td>
                                            <td><span class="pending"><?php echo $aj->post_status ?></span></td>
                                            <td class="action">
                                                <a href="<?php echo base_url(); ?>Employer/update/<?php echo $aj->id; ?>"
                                                   class="action-edit"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="<?php echo base_url(); ?>Employer/deleteJob/<?php echo $aj->id; ?>"
                                                   class="action-delete"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                                else{
                                    echo '<tr><td colspan="6">No Records Found</td></tr>';
                                }
                                ?>

                                </tbody>
                            </table>
                            <div class="pagination-box-row">
                                <p>Page 1 of 5</p>
                                <ul class="pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li>...</li>
                                    <li><a href="#">6</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-right margin_top_15">
                    <div class="manage-jobs">
                        <div class="manage-jobs-heading">
                            <h3>My Unpublished Jobs</h3>
                        </div>
                        <div class="single-manage-jobs table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Posted on </th>
                                    <th>Expiring on </th>
                                    <th>No of Applicants</th>
                                    <th>Status</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($inactivejobs)) {
                                    foreach ($inactivejobs as $ij) {
                                        ?>
                                        <tr>
                                            <td class="manage-jobs-title"><a href="#"><?php echo $ij->jobtitle ?></a>
                                            </td>
                                            <td class="table-date"><?php echo date('d M Y', strtotime($ij->post_date)); ?></td>
                                            <td class="table-date"><?php echo date('d M Y', strtotime($ij->applybefore)); ?></td>
                                            <td class="table-date text-center"><a href="list-candidates.php">10</a></td>
                                            <td><span class="expired"><?php echo $ij->post_status ?></span></td>
                                            <td class="action">
                                                <a href="<?php echo base_url(); ?>Employer/update/<?php echo $ij->id; ?>"
                                                   class="action-edit"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="<?php echo base_url(); ?>Employer/deleteJob/<?php echo $ij->id; ?>"
                                                   class="action-delete"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                                else{
                                    echo '<tr><td colspan="6">No Records Found</td></tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="pagination-box-row">
                                <p>Page 1 of 5</p>
                                <ul class="pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li>...</li>
                                    <li><a href="#">6</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-right margin_top_15">
                    <div class="manage-jobs">
                        <div class="manage-jobs-heading">
                            <h3>My Expired Jobs</h3>
                        </div>
                        <div class="single-manage-jobs table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Posted on </th>
                                    <th>Expiring on </th>
                                    <th>No of Applicants</th>
                                    <th>Status</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($expiredjobs)) {
                                    foreach ($expiredjobs as $ej) {
                                        ?>
                                        <tr>
                                            <td class="manage-jobs-title"><a href="#"><?php echo $ej->jobtitle ?></a>
                                            </td>
                                            <td class="table-date"><?php echo date('d M Y', strtotime($ej->post_date)); ?></td>
                                            <td class="table-date"><?php echo date('d M Y', strtotime($ej->applybefore)); ?></td>
                                            <td class="table-date text-center"><a href="list-candidates.php">10</a></td>
                                            <td><span class="expired">Expired</span></td>
                                            <td class="action">
                                                <a href="<?php echo base_url(); ?>Employer/update/<?php echo $ej->id; ?>"
                                                   class="action-edit"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="<?php echo base_url(); ?>Employer/deleteJob/<?php echo $ej->id; ?>"
                                                   class="action-delete"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                                else{
                                    echo '<tr><td colspan="6">No Records Found</td></tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="pagination-box-row">
                                <p>Page 1 of 5</p>
                                <ul class="pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li>...</li>
                                    <li><a href="#">6</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Candidate Dashboard Area End -->