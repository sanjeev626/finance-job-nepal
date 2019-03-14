<div class="col-md-9 login-contains">
    <div class="tab-content" style="border:0px; padding-top: 0px;">
        <div role="tabpanel" class="tab-pane active" id="My-Profile">
            <div class="educational-detail">
                <h3>List of Shortlisted Applicants</h3>                
                <?php
                if(!empty($applicants)){
                foreach($applicants as $key => $val):
                    $data2='';
                    $data2['status'] = $val->status;
                    $data2['position'] = $val->jobtitle;
                    $data2['application_id'] = $val->application_id;
                    $data2['remarks'] = $val->remarks;
                    $data2['sid'] = $val->sid;
                    $data2['appdate'] = $val->appdate;
                    $this->load->view('view-seeker-outline',$data2);
                endforeach;
                }
                echo $this->pagination->create_links();
                ?>
            </div>
        </div>
    </div>
</div