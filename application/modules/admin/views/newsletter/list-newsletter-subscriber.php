<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">


      <div class="row">
        <div class="col-md-12">
            <?php
            $action =base_url().'admin/Newsletter/sendMail';
            $attributes = array('name' => 'form1', 'id' => 'form1');
            echo form_open($action, $attributes);
            ?>
            <div class="panel-footer">
            <input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
            <input type="hidden" name="newsfor" value="<?php echo $newsfor; ?>">
              <input type="button" onclick="selectAllCheckBoxes('form1', 'checkbox[]', true);" value="Select All" class="btn btn-success below_space">
            &nbsp;&nbsp;
            <input type="button" onclick="selectAllCheckBoxes('form1', 'checkbox[]', false);" value="Clear All" class="btn btn-success below_space">
            &nbsp;&nbsp;
            <input name="sendmail" type="submit" id="sendmail" value="Send Mail" class="btn btn-success below_space">
            </div>

            <br>
            <h3> Select Subscriber </h3>
            <br>

          <div class="table-responsive">
          
            <table class="table table-striped mb30" id="table1" cellspacing="0" width="100%">
              <tbody>
               <tr class="table-success">
                <?php
                $counter=0;
                if (!empty($subscriber_email)) { 
                  foreach ($subscriber_email as $key): 
                    ++$counter;
                    ?>
                 
    
                    <td width="2%"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $key->id; ?>" /></td>
                    <td width="20%"><?php echo $key->email; ?></td>
                   <?php  if($counter%3==0)echo '</tr><tr>'; ?>   
                  
                  <?php
                  endforeach;
                } else {
                  ?>
                  </tr>
                  <tr>
                    <td colspan="8"><center>No Subscribe Found !!!</center></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              
            </div><!-- table-responsive -->
            <?php echo form_close(); ?>
          </div><!-- col-md-6 -->
        </div>


      </div>
    </div>
    <!-- /.box -->

  </section>


  <script type="text/javascript">
function selectAllCheckBoxes(FormName, FieldName, CheckValue)
{
  if(!document.forms[FormName])
    return;
  var objCheckBoxes = document.forms[FormName].elements[FieldName];
  if(!objCheckBoxes)
    return;
  var countCheckBoxes = objCheckBoxes.length;
  if(!countCheckBoxes)
    objCheckBoxes.checked = CheckValue;
  else
    // set the check value for all check boxes
    for(var i = 0; i < countCheckBoxes; i++)
      objCheckBoxes[i].checked = CheckValue;
}
</script>
