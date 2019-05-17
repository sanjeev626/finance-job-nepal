<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->


<!-- Candidate Dashboard Area Start -->
<section class="candidate-dashboard-area section_70">
    <div class="container">
        <div class="row">
            <?php $this->load->view('includes/employer-dashboard-sidebar');?>


            <div class="col-lg-9 col-md-12">
                <div class="dashboard-right">
                    <div class="manage-jobs">
                        <div class="manage-jobs-heading">
                            <h3>My Job Listing</h3>
                        </div>
                        <div class="single-manage-jobs table-responsive">
                            <?php if(isset($success)){ ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                    <?php echo $success;?> </div>
                            <?php } ?>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style='width:3%'>Sn.</th>
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
                                if(!empty($list_job)){
                                    foreach($list_job as $key => $val):
                                        $key += 1;
                                        $receivedJob = $this->employer_model->total_received_job($val->id);
                                        $postdate =$val->pyy .'-'.$val->pmm.'-'.$val->pdd;
                                        $applydate =$val->apyy .'-'.$val->apmm.'-'.$val->apdd;
                                        ?>
                                        <tr>
                                            <td><?php echo $key++; ?></td>
                                            <td class="manage-jobs-title"><?php echo $val->jobtitle;?></td>

                                            <td class="table-date"><?php echo date('d M Y',strtotime($postdate)); ?></td>
                                            <td class="table-date"><?php echo date('d M Y',strtotime($applydate)); ?></td>
                                            <td class="table-date text-center">
                                                <a href="<?php echo base_url().'employer/showapplicants/'.$val->id;?>">
                                                    <?php echo $this->general_model->countTotal('application','jid = '.$val->id)?> /
                                                    <?php echo $val->requiredno;?>
                                                </a>
                                            </td>
                                            <td ><span class="<?php echo ($val->post_status=='public'?'pending':'expired')?>"><?php echo ucfirst($val->post_status);?></span></td>
                                            <td class="action">

                                                <a href="<?php echo base_url(); ?>employer/update/<?php echo $val->id; ?>" class="action-edit"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="<?php echo base_url(); ?>employer/deletejob/<?php echo $val->id; ?>" class="action-delete delete_emp_job" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash-o"></i></a>
                                        </tr>
                                        <?php
                                    endforeach;
                                } else{ ?>
                                    <tr>
                                        <td colspan="6"></td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                            <div class="pagination-box-row">

                                <?php echo $this->pagination->create_links();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Candidate Dashboard Area End -->

<!-- Delete Modal -->
<div id="myModalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title green">Are you sure to Delete a Job ?</h4>
            </div>
            <div class="modal-body center"> <a class="btn btn-success get_link" href="">Yes</a> &nbsp; | &nbsp;
                <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('document').ready(function(){
        $('.delete_emp_job').on('click',function(){
            var link  = $(this).attr('href');
            //alert(link);
            $('.get_link').attr('href',link);
        });
    });
</script>