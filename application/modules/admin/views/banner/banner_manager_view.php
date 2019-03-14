 <div class="box box-default">
  <div class="box-body">
    <div class="col-md-6">
      <div class = "row">
       <a class="btn btn-success btn-flat" href="<?php echo base_url(); ?>admin/Banner/edit">Edit Banner</a>
     </div>
   </div>

 </div>
</div>

<div class="row">
  <div class="col-md-12">  

    <?php

    if (!empty($banner_info)) {
      ?>
      <div class="mb30"></div> 

      <div class="box">
        <div class="box-body">
          <div class="media col-xs-12 col-sm-2 col-md-2" >
            <div class="media-body">
              <div class="text-muted" style="background: #d9f4ff;margin: 0px 0px;height: 98px;padding: 0 0px 0 0;font-family: arial;font-size: 12px;color: #666;text-align: center;padding-top: 42px;"><b>LEFT PORTION</b></div>
              
            </div>
          </div>
          <div class="infos col-xs-12 col-sm-8 col-md-8" style="border-left:1px solid #ccc;">
            <a href="<?php echo base_url(); ?>admin/Banner/edit" class="pull-left" >
              <img align="center" alt="" src="<?php echo base_url()?>uploads/banner/<?php echo $banner_info->leftimage; ?>" class="thumbnail media-object" height="100px" width="100%" style="margin-bottom:0px;"> 
            </a>
          </div>
        </div>
      </div>

      <div class="mb30"></div> 

      <div class="box">
        <div class="box-body">
          <div class="media col-xs-12 col-sm-2 col-md-2" >
            <div class="media-body">
              <div class="text-muted" style="background: #d9f4ff;margin: 0px 0px;height: 98px;padding: 0 0px 0 0;font-family: arial;font-size: 12px;color: #666;text-align: center;padding-top: 42px;"><b>FLASH PORTION</b></div>
              
            </div>
          </div>
          <div class="infos col-xs-12 col-sm-8 col-md-8" style="border-left:1px solid #ccc;">
            <a href="<?php echo base_url(); ?>admin/Banner/edit" class="pull-left" >

              <script src="<?php echo base_url(); ?>content_admin/assets/AC_RunActiveContent.js" type="text/javascript"></script>
              <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','564','height','116','title','Flash Banner','src','<?php echo base_url()?>uploads/banner/flash','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','<?php echo base_url()?>uploads/banner/flash' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="564" height="116" title="Flash Banner">
<param name="movie" value="../images/flash/flash.swf">
<param name="quality" value="high">
<embed src="<?php echo base_url()?>uploads/banner/flash.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="564" height="116"></embed>
</object></noscript>  


</a>
</div>
</div>

</div>

<div class="mb30"></div> 

<div class="box">
  <div class="box-body">
    <div class="media col-xs-12 col-sm-2 col-md-2" >
      <div class="media-body">
        <div class="text-muted" style="background: #d9f4ff;margin: 0px 0px;height: 98px;padding: 0 0px 0 0;font-family: arial;font-size: 12px;color: #666;text-align: center;padding-top: 42px;"><b>RIGHT PORTION</b></div>

      </div>
    </div>
    <div class="infos col-xs-12 col-sm-8 col-md-8" style="border-left:1px solid #ccc;">
      <a href="<?php echo base_url(); ?>admin/Banner/edit" class="pull-left" >
        <img align="center" alt="" src="<?php echo base_url()?>uploads/banner/<?php echo $banner_info->rightimage; ?>" class="thumbnail media-object" height="100px" width="100%" style="margin-bottom:0px;"> 
      </a>
    </div>
  </div>

</div>

<div class="mb30"></div> 

<div class="box">
  <div class="box-body">
    <div class="media col-xs-12 col-sm-2 col-md-2" >
      <div class="media-body">
        <div class="text-muted" style="background: #d9f4ff;margin: 0px 0px;height: 98px;padding: 0 0px 0 0;font-family: arial;font-size: 12px;color: #666;text-align: center;padding-top: 42px;"><b>Job Seeker Logo</b></div>  

      </div>
    </div>
    <div class="infos col-xs-12 col-sm-8 col-md-8" style="border-left:1px solid #ccc;">
      <a href="<?php echo base_url(); ?>admin/Banner/edit" class="pull-left" >
        <?php if($banner_info->jobseeker){ ?>
        <img align="center" alt="" src="<?php echo base_url()?>uploads/banner/<?php echo $banner_info->jobseeker; ?>" class="thumbnail media-object" height="100px" width="100%" style="margin-bottom:0px;"> 
        <?php } ?>
      </a>
    </div>
  </div>

</div>

<div class="mb30"></div> 

<div class="box">
  <div class="box-body">
    <div class="media col-xs-12 col-sm-2 col-md-2" >
      <div class="media-body">
        <div class="text-muted" style="background: #d9f4ff;margin: 0px 0px;height: 98px;padding: 0 0px 0 0;font-family: arial;font-size: 12px;color: #666;text-align: center;padding-top: 42px;"><b>Employer Logo</b></div>

      </div>
    </div>
    <div class="infos col-xs-12 col-sm-8 col-md-8" style="border-left:1px solid #ccc;">
      <a href="<?php echo base_url(); ?>admin/Banner/edit" class="pull-left" >
        <?php if($banner_info->employer){ ?>
        <img align="center" alt="" src="<?php echo base_url()?>uploads/banner/<?php echo $banner_info->employer; ?>" class="thumbnail media-object" height="100px" width="100%" style="margin-bottom:0px;"> 
        <?php } ?>
      </a>
    </div>
  </div>

</div>
<?php  }else{?>
No Banner Found !!!
<?php }?>

</div><!-- col-md-6 -->
</div>

