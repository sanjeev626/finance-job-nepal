<form method="POST" action="<?php echo base_url().'search/job'?>">
<div class="job-grid-sidebar">
    <div class="single-job-sidebar margin_bottom_5">
        <div class="job-sidebar-box">
            <div class="main-title"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-lg"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path></svg> Refine Your Job Search</div>
        </div>
    </div>
    <!-- Single Job Sidebar Start -->
    <div class="single-job-sidebar sidebar-location margin_bottom_5">
        <div class="job-sidebar-box">
            <div class="search-title">Keywords</div>
            <p>
                <input type="text" name="job_title" placeholder="Keywords" value="<?php if(isset($job_title))echo $job_title;?>">
            </p>
        </div>
    </div>
    <!-- Single Job Sidebar End -->
    <!-- Single Job Sidebar Start -->
    <div class="single-job-sidebar sidebar-category margin_bottom_5">
        <div class="job-sidebar-box">
            <?php 
                $categories =  $this->general_model->getAll('dropdown','fid = 9','id ASC','*','','');

            ?>
            <div class="search-title">Filter by Job Category</div>
            <select class="sidebar-category-select-2" name="job_category[]" multiple="multiple" placeholder="Filter by job category">
                <?php 
                    foreach ($categories as $key => $category) {
                        if(isset($job_category) && in_array($category->id,$job_category)){
                            $selected = 'selected="selected"';
                        }
                        else{
                            $selected = '';
                        }
                       echo '<option value="'.$category->id.'" '.$selected.'>'.$category->dropvalue.'</option>';
                    }
                ?>
                
            </select>
        </div>
    </div>
    <!-- Single Job Sidebar End -->
    
    <!-- Single Job Sidebar Start -->
    <div class="single-job-sidebar sidebar-category margin_bottom_5">
        <div class="job-sidebar-box">
            <div class="search-title">Filter by Job Location</div>
            <?php 
                $locations =  $this->general_model->getAll('dropdown','fid = 2','id ASC','*','','');
            ?>
            <select class="sidebar-category-select-2 sidebar-locations" name="location[]" multiple="multiple">
                <?php 
                    foreach ($locations as $key => $location) {
                        if(isset($job_location) && in_array($location->id,$job_location)){
                            $selected = 'selected="selected"';
                        }
                        else{
                            $selected = '';
                        }
                        echo '<option value="'.$location->id.'" '.$selected.'>'.$location->dropvalue.'</option>';
                    }
                ?>
                
            </select>
        </div>
    </div>
    <!-- Single Job Sidebar End -->

    <!-- Single Job Sidebar Start -->
    <div class="single-job-sidebar sidebar-type margin_bottom_5">
        <div class="job-sidebar-box">
            <div class="search-title">Filter by Job type</div>
            <ul>
                <?php 
                    $jobtypes =  $this->general_model->getAll('dropdown','fid = 16','id ASC','*','','');
             
                    foreach ($jobtypes as $key => $jobtype) {
                        if(isset($job_type) &&  in_array($jobtype->id,$job_type)){
                            $selected = 'checked="checked"';
                        }
                        else{
                            $selected = '';
                        }
                       echo '<li class="checkbox">
                                <input class="checkbox-spin" type="checkbox" name="job_type[]" id="'.$jobtype->dropvalue.'" value="'.$jobtype->id.'" '.$selected.'/>
                                <label for="'.$jobtype->dropvalue.'"><span></span>'.$jobtype->dropvalue.'</label>
                            </li>';
                    }
                ?>
                
            </ul>
        </div>
    </div>
    <!-- Single Job Sidebar End -->
    <!-- Single Job Sidebar Start -->
    <div class="single-job-sidebar sidebar-type margin_bottom_5">
        <div class="job-sidebar-box">
            <div class="search-title">Filter by Job Level</div>
            <ul>

                <?php 
                    $joblevels =  $this->general_model->getAll('dropdown','fid = 17','id ASC','*','','');
             
                    foreach ($joblevels as $key => $joblevel) {
                        if(isset($job_level) && in_array($joblevel->id,$job_level)){
                            $selected = 'checked="checked"';
                        }
                        else{
                            $selected = '';
                        }
                       echo '<li class="checkbox">
                                <input class="checkbox-spin" name="job_level[]" type="checkbox" id="'.$joblevel->dropvalue.'" value="'.$joblevel->id.'" '.$selected.' />
                                <label for="'.$joblevel->dropvalue.'"><span></span>'.$joblevel->dropvalue.'</label>
                            </li>';
                    }
                ?>
               
            </ul>
        </div>
    </div>
    <!-- Single Job Sidebar End -->
    <!-- Single Job Sidebar Start -->
    <div class="single-job-sidebar sidebar-type margin_bottom_5">
        <div class="job-sidebar-box">
            <button type="submit" name="search" class="btn btn-success" style="width: 100%">
                Search
            </button>
        </div>
    </div>
    <!-- Single Job Sidebar End -->
</div>
</form>