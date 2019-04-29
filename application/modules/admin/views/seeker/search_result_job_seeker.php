<?php
$dropdown_length = 60;
?>
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">


            <div class="row">
                <div class="col-md-12">
                    <div class="panel-footer">
                        <!--<a class="btn btn-success below_space"
                           href="<?php /*echo base_url(); */?>admin/Employer/viewEmployerBasket"><i
                                class="fa fa-shopping-cart" data-original-title="View Basket"></i> View Basket </a>-->
                        <!--<button type="button" class="btn btn-success below_space" data-toggle="modal"
                                data-target="#myModalSearch"><i class="fa fa-search tooltips"
                                                                data-original-title="Search Job Client"></i> Search Job
                            Seeker
                        </button>-->

                        <?php include('seeker-searchform.php')?>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="table1" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th width="1%">SN.</th>
                                <th width="20%">Employer Name</th>
                                <th width="20%">Address</th>
                                <th width="20%">Mobile</th>
                                <th width="20%">Activation Status</th>
                                <th width="2%">Email</th>
                                <!--<th width="2%">Is Corporate </th>-->
                                <th width="35%" class="table-action text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($this->uri->segment(4) == NULL) {
                                $i = 1;
                            } else {
                                $i = $this->uri->segment(4) + 1;
                            }
                            if (!empty($seeker)) {
                                foreach ($seeker as $key):
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $key->fname.' '.$key->mname.' '.$key->lname ; ?></td>
                                        <td><?php echo $key->address_current; ?></td>
                                        <td><?php echo $key->phone_cell; ?></td>
                                        <td><?php echo $key->isActivated =='1'?'Active':'Un Active'; ?></td>
                                        <td><?php echo $key->email; ?></td>
                                        <!--<td><?php /*echo $key->isCorporate; */
                                        ?></td>-->

                                        <td class="table-action text-center">
                                            <a class="btn btn-success btn-sm"
                                               href="<?php echo base_url(); ?>admin/Seeker/view/<?php echo $key->id; ?>"><i
                                                    class="fa fa-eye tooltips" data-original-title="Edit Employer"></i>
                                                View</a>
                                            |
                                            <!--<a class="btn btn-success btn-sm"
                                               href="<?php /*echo base_url(); */?>admin/Employer/employerJobList/<?php /*echo $key->id; */?>"><i
                                                    class="fa fa-file-text-o tooltips"
                                                    data-original-title="Job List"></i> Job List</a>
                                            |-->
                                            <!-- <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/Employer/employerVideocv/<?php echo $key->id; ?>"><i class="fa fa-video-camera tooltips" data-original-title="Job List"></i> Video CV</a>
                      |-->
                                            <button type="button" class="btn btn-success btn-sm delete_employer"
                                                    link="<?php echo base_url(); ?>admin/Seeker/deleteSeeker/<?php echo $key->id; ?>"
                                                    data-toggle="modal" data-target="#myModalDelete"><i
                                                    class="fa fa-trash tooltips"
                                                    data-original-title="Delete Employer"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td colspan="8">
                                        <center>No Job Seeker Found !!!</center>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->
                    <?php echo $this->pagination->create_links(); ?>
                </div>
                <!-- col-md-6 -->
            </div>


        </div>
    </div>
    <!-- /.box -->
</section>



<!-- Modal -->
<!--<div id="myModalSearch" class="modal fade" role="dialog">-->
<!--    <div class="modal-dialog modal-lg">-->
<!---->
<!--        <!-- Modal content-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--                <h2 class="modal-title">Search Job Seeker</h2>-->
<!--                <input type="hidden" value="" class="news_id" name="">-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!---->
<!---->
<!--                <div class="panel-body panel-body-nopadding">-->
<!--                    --><?php
//                    $action = base_url() . 'admin/Seeker/searchSeeker';
//
//                    $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
//                    echo form_open_multipart($action, $attributes);
//                    ?>
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Employer Ref No:</label>-->
<!---->
<!--                        <div class="col-sm-3">-->
<!--                            <div class="input-group below_space">-->
<!--                                <div class="input-group-addon">From</div>-->
<!--                                <input type="text" name="sid" class="form-control" id="sid" placeholder="123">-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-sm-3">-->
<!--                            <div class="input-group below_space">-->
<!--                                <div class="input-group-addon">To</div>-->
<!--                                <input type="text" name="sid2" class="form-control" id="sid2" placeholder="456">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">His/Her Title :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <select class="form-control chosen-select" name='salutation'-->
<!--                                    data-placeholder="Choose a Title">-->
<!--                                <option value="0">All</option>-->
<!--                                --><?php //foreach ($salutation as $key => $value) { ?>
<!--                                    <option value='--><?php //echo $value->id; ?><!--'>--><?php //echo $value->dropvalue; ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">First Name :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <input type="text" name="fname" id='fname' class="form-control" value=''/>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Last Name :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <input type="text" name="lname" id='lname' class="form-control" value=''/>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Date of Birth:</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <div class="input-group date">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-calendar"></i>-->
<!--                                </div>-->
<!--                                <input type="text" name="dob" class="form-control pull-right" id="dob">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Address :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <input type="text" name="address" id='address' class="form-control" value=''/>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">City :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <input type="text" name="city" id='city' class="form-control" value=''/>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Phone :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <input type="text" name="phone" id='phone' class="form-control" value=''/>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Email :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <input type="text" name="email" id='email' class="form-control" value=''/>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Functional Area :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <select class="form-control chosen-select" name='funcarea'-->
<!--                                    data-placeholder="Choose a Functional Area">-->
<!--                                <option value="0">-- Select Organization Type --</option>-->
<!--                                --><?php //foreach ($functional_area as $key => $value) { ?>
<!--                                    <option value='--><?php //echo $value->id; ?><!--'>--><?php //echo $value->dropvalue; ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Job Title :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <select class="form-control chosen-select" name='jid' data-placeholder="Choose a Job Title">-->
<!--                                <option value="0">-- Select Job Title --</option>-->
<!--                                --><?php //foreach ($job_title as $key => $value) {
//                                    $empId = $value->eid;
//                                    $org_name = $this->general_model->getById('employer', 'id', $empId, 'orgname');
//                                    if ($value->displayname) {
//                                        $jobTitleOrg = substr($value->displayname, 0, 35);
//                                    } else {
//                                        $jobTitleOrg = $org_name->orgname;
//                                    }
//                                    ?>
<!--                                    <option-->
<!--                                        value='--><?php //echo $value->id; ?><!--'>--><?php //echo substr($value->jobtitle, 0, 20); ?>
<!--                                        -- --><?php //echo $jobTitleOrg; ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Applied Position :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <select class="form-control chosen-select" name='appliedposition'-->
<!--                                    data-placeholder="Choose a Applied Position">-->
<!--                                <option value="0">-- Select Position --</option>-->
<!--                                --><?php //foreach ($job_title as $key => $value) {
//                                    $empId = $value->eid;
//                                    $org_name = $this->general_model->getById('employer', 'id', $empId, 'orgname');
//                                    if ($value->displayname) {
//                                        $jobTitleOrg = substr($value->displayname, 0, 35);
//                                    } else {
//                                        $jobTitleOrg = $org_name->orgname;
//                                    }
//                                    ?>
<!--                                    <option-->
<!--                                        value='--><?php //echo $value->id; ?><!--'>--><?php //echo substr($value->jobtitle, 0, 20); ?>
<!--                                        -- --><?php //echo $jobTitleOrg; ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Applied Date:</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <div class="input-group date">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-calendar"></i>-->
<!--                                </div>-->
<!--                                <input type="text" name="appdate" class="form-control pull-right" id="datepicker">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Registered Date:</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <div class="input-group date">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-calendar"></i>-->
<!--                                </div>-->
<!--                                <input type="text" name="registerdate" class="form-control pull-right"-->
<!--                                       id="seeker_date1">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Modified Date:</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <div class="input-group date">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-calendar"></i>-->
<!--                                </div>-->
<!--                                <input type="text" name="modifieddate" class="form-control pull-right"-->
<!--                                       id="seeker_date2">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Education/Qualification :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <input type="text" name="qualification" id='qualification' class="form-control" value=''/>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Keyskills :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <input type="text" name="keyskills" id='keyskills' class="form-control" value=''/>-->
<!--                            <span class="green">Note : Separate Keyskills by Comma (,)</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Current Job Position :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <input type="text" name="cjobposition" id='cjobposition' class="form-control" value=''/>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Preferred Job Title :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <input type="text" name="jobtitle" id='jobtitle' class="form-control" value=''/>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Preferred Location :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <select class="form-control chosen-select" name='joblocation'-->
<!--                                    data-placeholder="Choose a Location">-->
<!--                                <option value="0">-- Select Location --</option>-->
<!--                                --><?php //foreach ($location as $key => $value) { ?>
<!--                                    <option value='--><?php //echo $value->id; ?><!--'>--><?php //echo $value->dropvalue; ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Years of Experience :</label>-->
<!---->
<!--                        <div class="col-sm-2">-->
<!--                            <div class="input-group below_space">-->
<!--                                <div class="input-group-addon">From</div>-->
<!--                                <input type="text" name="expyrs" class="form-control" id="expyrs" placeholder="2010">-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-sm-2">-->
<!--                            <div class="input-group below_space">-->
<!--                                <div class="input-group-addon">To</div>-->
<!--                                <input type="text" name="expyrs2" class="form-control" id="expyrs2"-->
<!--                                       placeholder="--><?php //echo date('Y'); ?><!--">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Expected Salary :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <select class="form-control chosen-select" name='expsal'-->
<!--                                    data-placeholder="Choose a Excepted Salary">-->
<!--                                <option value="0">-- Select Expected Salary --</option>-->
<!--                                --><?php //foreach ($salary_range as $key => $value) { ?>
<!--                                    <option value='--><?php //echo $value->id; ?><!--'>--><?php //echo $value->dropvalue; ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-sm-3 control-label">Applied Organization Name :</label>-->
<!---->
<!--                        <div class="col-sm-7">-->
<!--                            <select class="form-control chosen-select" name='apporg'-->
<!--                                    data-placeholder="Choose a Organisation Name">-->
<!--                                <option value="0">-- Select Organization --</option>-->
<!--                                --><?php //foreach ($applied_organisation as $key => $value) { ?>
<!--                                    <option value='--><?php //echo $value->id; ?><!--'>--><?php //echo $value->orgname; ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="panel-footer">-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-6 col-sm-offset-5">-->
<!--                                <button class="btn btn-success btn-flat" type="submit">-->
<!--                                    Search Seeker-->
<!--                                </button>-->
<!--                                &nbsp;-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <!-- panel-footer -->
<!--                    --><?php //echo form_close(); ?>
<!--                </div>-->
<!--                <!-- panel-body -->
<!---->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- Delete Modal -->
<div id="myModalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title green">Are you sure to Delete a Job Seeker ?</h4>
            </div>
            <div class="modal-body center">

                <a class="btn btn-success get_link" href="">Yes</a>
                &nbsp; | &nbsp;
                <button type="button" class="btn btn-success" data-dismiss="modal">No</button>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $('document').ready(function () {
        $('.delete_employer').on('click', function () {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);

        });
    });
</script>
