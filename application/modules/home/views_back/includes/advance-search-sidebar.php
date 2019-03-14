<style type="text/css">
   .formsearch-checkbox {
        float: left;
        padding-top: 7px;
        padding-right: 25px;
    }
    .jobseeker-left-aside label{
        text-align: left !important;
    }
    .jobseeker-left-aside strong{
        text-align: left !important;    
    }
</style>
<?php
if(!isset($job_education))
{
  $job_category = $this->general_model->getAll('dropdown','fid = 1','','id,dropvalue');
}
if(!isset($job_education))
{
  $job_education = $this->general_model->getAll('dropdown','fid = 3','','id,dropvalue');
}
if(!isset($job_location))
{
  $job_location = $this->general_model->getAll('dropdown','fid = 2','','id,dropvalue');
}
if(!isset($salary_range))
{
  $salary_range =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
}
if(!isset($org_type))
{
  $org_type =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue');  
}

?>
<div class="jobseeker-left-aside">
  <div class="personal-details clearfix" style="text-align: center;"> <strong><i class="fa fa-search" aria-hidden="true"></i> Refine your Job Search</strong>
    <?php    
        $action = base_url() . 'Search/searchResult';    
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');    
        echo form_open($action, $attributes);    
    ?>
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="form-group">
          <label class="col-sm-12 control-label text-left">Job Title:</label>
          <div class="col-sm-12">
            <input type="text" name="jobtitle" id='jobtitle' class="form-control" value='<?php if(isset($_POST['jobtitle'])) echo $_POST['jobtitle']; elseif(isset($_POST['job_title'])) echo $_POST['job_title']; ?>' />
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12">
        <div class="form-group">
          <label class="col-sm-12 control-label">Job Category:</label>
          <div class="col-sm-12">
            <select class="form-control" name="jobcategory" >
              <option value=''>Refine by all Category</option>
              <?php foreach ($job_category as $key => $value) {?>
              <option value='<?php echo $value->id; ?>' <?php if((isset($_POST['jobcategory']) && $_POST['jobcategory']==$value->id) || (isset($_POST['job_category']) && $_POST['job_category']==$value->id)) echo "selected";?>><?php echo $value->dropvalue; ?></option>
              <?php  } ?>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="form-group">
          <label class="col-sm-12 control-label">Job Education:</label>
          <div class="col-sm-12">
            <select class="form-control" name="education" >
              <option value=''>Refine by all Education</option>
              <?php foreach ($job_education as $key => $value) {?>
              <option value='<?php echo $value->id; ?>' <?php if(isset($_POST['education']) && $_POST['education']==$value->id) echo "selected";?>><?php echo $value->dropvalue; ?></option>
              <?php  } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12">
        <div class="form-group">
          <label class="col-sm-12 control-label">Job Location:</label>
          <div class="col-sm-12">
            <select class="form-control" name="location" >
              <option value=''>Refine by all Location</option>
              <?php foreach ($job_location as $key => $value) {?>
              <option value='<?php echo $value->id; ?>' <?php if(isset($_POST['location']) && $_POST['location']==$value->id) echo "selected";?>><?php echo $value->dropvalue; ?></option>
              <?php  } ?>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="form-group">
          <label class="col-sm-12 control-label">Organisation Type:</label>
          <div class="col-sm-12">
            <select class="form-control" name="organizationtype" >
              <option value=''>Refine by all Organisation Type</option>
              <?php foreach ($org_type as $key => $value) {?>
              <option value='<?php echo $value->id; ?>' <?php if(isset($_POST['organizationtype']) && $_POST['organizationtype']==$value->id) echo "selected";?>><?php echo $value->dropvalue; ?></option>
              <?php  } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12">
        <div class="form-group">
          <label class="col-sm-12 control-label">Salary Expectation</label>
          <div class="col-sm-12">
            <select class="form-control" name="salaryrange" >
              <option value=''>Refine by all Expectation</option>
              <?php foreach ($salary_range as $key => $value) {?>
              <option value='<?php echo $value->id; ?>' <?php if(isset($_POST['salaryrange']) && $_POST['salaryrange']==$value->id) echo "selected";?>><?php echo $value->dropvalue; ?></option>
              <?php  } ?>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="form-group">
          <label class="col-sm-12 control-label">No. of Experience:</label>
          <div class="col-sm-12">
            <select class="form-control" name="noexperience" >
              <option value=''>Refine by all Experience</option>
              <?php for($e=1;$e<=10;$e++){ ?>
              <option value='<?php echo $e;?>' <?php if(isset($_POST['noexperience']) && $_POST['noexperience']==$e) echo "selected";?>><?php echo $e;?></option>
              <?php  } ?>
              <option value="10+" <?php if(isset($_POST['noexperience']) && $_POST['noexperience']=='10+') echo "selected";?>>10+</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12">
        <div class="form-group">
          <label class="col-sm-12 control-label">Job Level :</label>
          <div class="col-sm-12">
            <select class="form-control" name="joblevel" >
              <option value='0'>Refine by all Job Level</option>
              <option value='Entry Level' <?php if(isset($_POST['joblevel']) && $_POST['joblevel']=='Entry Level') echo "selected";?>>Entry Level</option>
              <option value='Mid Level' <?php if(isset($_POST['joblevel']) && $_POST['joblevel']=='Mid Level') echo "selected";?>>Mid Level</option>
              <option value='Senior Level' <?php if(isset($_POST['joblevel']) && $_POST['joblevel']=='Senior Level') echo "selected";?>>Senior Level</option>
              <option value='Top Level' <?php if(isset($_POST['joblevel']) && $_POST['joblevel']=='Top Level') echo "selected";?>>Top Level</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="form-group">
          <label class="col-sm-12 control-label">Job Type:</label>
          <div class="col-sm-12">
            <div class="form-check form-check-inline formsearch-checkbox">
              <label class="form-check-label">
                <input class="form-check-input" name="jobtype1" type="checkbox" id="jobtype1" value="Full Time" <?php if(isset($_POST['jobtype1']) && $_POST['jobtype1']=='Full Time') echo "checked";?>>
                Full Time </label>
            </div>
            <div class="form-check form-check-inline formsearch-checkbox">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="jobtype2" id="jobtype2" value="Part Time" <?php if(isset($_POST['jobtype2']) && $_POST['jobtype2']=='Part Time') echo "checked";?>>
                Part Time </label>
            </div>
            <div class="form-check form-check-inline formsearch-checkbox">
              <label class="form-check-label">
                <input class="form-check-input" name="jobtype3" type="checkbox" id="jobtype3" value="Contract" <?php if(isset($_POST['jobtype3']) && $_POST['jobtype3']=='Contract') echo "checked";?>>
                Contract </label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-2 col-sm-2"> </div>
      <div class="col-md-8 col-sm-8">
        <button class="btn btn-success btn-flat" name="btnsubmit" type="submit"> Search Result </button>
      </div>
      <div class="col-md-2 col-sm-2"> </div>
    </div>
    <?php echo form_close(); ?> </div>
</div>