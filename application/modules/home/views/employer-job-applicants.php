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
                            <h3><?php if(isset($title)) echo $title; else echo 'List of Job Applicants';?></h3>
                        </div>
                        <div class="single-manage-jobs table-responsive">

                        <?php
                            /*if(!empty($applicants)){
                                foreach($applicants as $key => $val):
                                    $data2 = array();
                                    $data2['status'] = $val->status;
                                    $data2['position'] = $val->jobtitle;
                                    $data2['appdate'] = $val->appdate;
                                    $data2['application_id'] = $val->application_id;
                                    $data2['remarks'] = $val->remarks;
                                    $data2['sid'] = $val->sid;
                                    $this->load->view('view-seeker-outline',$data2);
                                endforeach;
                            }*/
                        ?>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Applicant Name</th>
                                    <th>Status </th>
                                    <th>Position </th>
                                    <th>Applied Date</th>
                                    <th>View</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($applicants)) {
                                    foreach ($applicants as $key => $val):?>
                                        <tr>
                                            <td>
                                                <?php
                                                $jobseekerInfo= $this->general_model->getById('seeker','id',$val->sid);
                                                echo $jobseekerInfo->fname.' '.$jobseekerInfo->mname.' '.$jobseekerInfo->lname;
                                                ?>
                                            </td>
                                            <td><?php echo $val->status?> </td>
                                            <td><?php echo $val->jobtitle?> </td>
                                            <td><?php echo $val->appdate?></td>
                                            <td>
                                                <a href="<?php echo base_url().'employer/viewseekerdetail/'.$val->sid?>"> View Detail</a>
                                            </td>
                                        </tr>
                                  <?php   endforeach;
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