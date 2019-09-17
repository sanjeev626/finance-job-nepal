<style type="text/css">
	.joblistbytype .job-content h3 { width: 100%; font-size: 16px;}
	.joblistbytype .job-content {height: 117px; padding: 4px}
	.joblistbytype .top-company-list .company-list-logo {
	    max-width: 82px;
	}
	.joblistbytype .top-company-list .company-list-details {  padding-top: 7px;}

</style>

<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">
    <div class="breadcromb-top section_50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb-box">
                        <h3><?php echo $title?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcromb-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb-box-pagin">
                        <ul>
                            <li><a href="#">home</a></li>
                            
                            <li class="active-breadcromb"><a href="#"><?php echo $title?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcromb Area End -->

<section class="fjn-blog-page-area section_50 joblistbytype">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                   
					<?php 
					if ($joblists) {
							foreach ($joblists as $rj) {
								$eid = $rj->eid;
								$empInfo = $this->general_model->getById('employer', 'id', $eid, '*');
								$orgname = $empInfo->orgname;
								$orgcode = $empInfo->organization_code;
								if (empty($rj->displayname)) {
								$orgname = $empInfo->orgname;
								$url = base_url() . 'job/' . $orgcode . '/' . $rj->slug . '/' . $rj->id;
								} else {
								$orgname = $rj->displayname;
								$url = base_url() . 'job/' . $rj->slug . '/' . $rj->id;
								}
								?>
								<div class="col-md-3 col-sm-12 padding-left-right-0">
									<div class="job-content">
										<div class="top-company-list">
											<h3>
												<a href="<?php echo $url ?>" data-toggle="tooltip" title="<?php echo $rj->jobtitle  ?>">
													<?php echo substr($rj->jobtitle, 0, 25) . '' ?>
												</a>
											</h3>
											<div class="company-list-logo">
												<a href="<?php echo $url ?>">
													<?php
													if (!empty($rj->complogo)) {
														$img = 'uploads/employer/' . $rj->complogo;
													} elseif (!empty($empInfo->organization_logo)) {
														$img = 'uploads/employer/' . $empInfo->organization_logo;
													} else {
														$img = 'content_home/img/company-logo-4.png';
													}
													?>
													<img src="<?php echo base_url() . $img; ?>" alt="<?php echo $rj->jobtitle ?>">
												</a>
											</div>
											<div class="company-list-details">
												<p>
													<i class="fa fa-building"></i>
													<a href="javascript:void(0)" data-toggle="tooltip" title="<?php echo $orgname ?>">
														<?php echo substr($orgname, 0, 20) . '' ?>
													</a>
												</p>
												<p class="company-state">
													<i class="fa fa-map-marker"></i>
													<?php
													if(!empty($rj->joblocation)){
													$joblocation_arr = unserialize($rj->joblocation);
													$location = '';
													if($joblocation_arr !=''){
													for($i=0;$i<count($joblocation_arr);$i++)
													{
													$location .= $this->general_model->getById('dropdown','id',$joblocation_arr[$i])->dropvalue;
													if(count($joblocation_arr)>0 && $i<(count($joblocation_arr)-1)) $location .= ', ';
													}
													}
													}                            
													?>
													<a href="javascript:void(0)" data-toggle="tooltip" title="<?php echo $location  ?>">
														<?php echo substr($location , 0, 20) . '' ?>
													</a>
												</p>
												<p class="open-icon">
													<i class="fa fa-clock-o"></i><?php echo date("M d, Y", strtotime($rj->applybefore)) ?>
												</p>
											<!-- <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p> -->
											</div>
										</div>
									</div>
								</div>
						<?php }
					}
					?>

                </div>
            </div>



        </div>
    </div>
</section>