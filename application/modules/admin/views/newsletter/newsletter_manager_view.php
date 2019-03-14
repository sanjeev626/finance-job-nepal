<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">

      <div class="row">
        <div class="col-md-12">
          <div class="panel-footer">
            <div class="col-sm-10 col-md-10">
              <?php echo form_open('admin/Newsletter');?>
              <div class="row">
                <fieldset >
                  <div class=" col-sm-6 col-md-6 below_space"> 
                    <select class="form-control chosen-select" name='category' data-placeholder="Choose a Category...">
                      <option value="">Select Category</option>
                      <?php foreach ($functionalarea as $key => $value) { ?>
                      <option value='<?php echo $value->id; ?>' 
                        <?php if(($category) && ($category == $value->id)){ echo "selected"; } ?> ><?php echo $value->dropvalue; ?></option>
                        <?php  } ?>
                      </select>
                    </div>

                    <div class="col-sm-4 col-md-4 below_space">
                      <input class= "btn btn-success" type="submit" value="Search Category" name="">
                    </div>

                  </fieldset>
                </div>
                <?php echo form_close();?>
              </div>
                
                <div class="below_space margin-left">
                <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Newsletter/add">+ Add Newsletter </a>
                </div>
            
            </div>

            <?php  if (!empty($newsletter_info)) { ?>
            <div class="table-responsive">
              <table class="table table-striped mb30" id="table1" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th width="5%">SN.</th>
                    <th width="20%">Title </th>
                    <th width="10%" class="table-action">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($this->uri->segment(3) == NULL) {
                    $i = 1;
                  } else {
                    $i = $this->uri->segment(3) + 1;
                  }
                  foreach ($newsletter_info as $key => $val):
                    ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo ($val->newstitle) ? $val->newstitle : 'No Title'; ?></td> 
                    <td class="table-action">

                      <button type="button" class="btn btn-success btn-sm popup_click" news_title="<?php echo ($val->newstitle) ? $val->newstitle : 'No Title'; ?>" newsid ="<?php echo $val->newsid; ?>"  data-toggle="modal" data-target="#myModal"><i class="fa fa-eye tooltips" data-original-title="Edit Client"></i> View</button>
                      |
                      <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/Newsletter/edit/<?php echo $val->newsid; ?>"><i class="fa fa-edit tooltips" data-original-title="Edit Client"></i> Edit</a>
                      |
                      <button type="button" class="btn btn-success btn-sm popup_click" newsid ="<?php echo $val->newsid; ?>"  data-toggle="modal" data-target="#myModalSend"><i class="fa fa-send tooltips" data-original-title="Edit Client"></i> Send</button>
                    
                    </td>
                  </tr>
                  <?php
                  $i++;
                  endforeach;
                  ?>
                </tbody>
              </table>
            </div><!-- table-responsive -->
            <?php } ?>
          </div><!-- col-md-6 -->
        </div>

      </div>
    </div>
    <!-- /.box -->
  </section>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title news_title"></h4>
          <input type="hidden" value="" class="news_id" name="">
        </div>
        <div class="modal-body news_content">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


<!-- Modal -->
  <div id="myModalSend" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title news_title">Send Newsletter For</h4>
          <input type="hidden" value="" class="news_id" name="">
        </div>
        <div class="modal-body center">
            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Newsletter/newssend/?sendfor=employee&newsid=<?php echo $val->newsid; ?>">Employer</a>
          &nbsp; | &nbsp; 
          <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Newsletter/newssend/?sendfor=jobseeker&newsid=<?php echo $val->newsid; ?>">Job Seeker</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


  <script type="text/javascript">
    $('document').ready(function(){
      $('.popup_click').on('click',function(){ 
        var news_id = $(this).attr('newsid');
        var news_title = $(this).attr('news_title');

        $('.news_title').text(news_title); 
        $('.news_id').val(news_id);

        $.ajax({
         type: 'POST',
         url: site_url('admin/newsletter/view'),
         data: 'news_id=' + news_id,

         success: function (data) {
          var json = $.parseJSON(data);

          $.each(json.newsletter,function(key,value){
            $('.news_content').html(value);
          });
        }
      });
      });
    });
  </script>
