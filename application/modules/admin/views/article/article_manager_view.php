<section class="article">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">


      <div class="row">
        <div class="col-md-12">
            <div class="panel-footer">
            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Article/add">+ Add Article </a>
        </div>
        <div class="col-md-12">

          <div class="table-responsive">
            <table class="table table-striped mb30" id="table1" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="5%">SN.</th>
                  <th width="20%">Title </th>
                  <th width="20%">URL </th>
                  <th width="20%">Created Date</th>
                  <th width="20%">Updated Date</th>
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
                if (!empty($article)) { 
                  foreach ($article as $key):
                    ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $key->title; ?></td>
                    <td><?php echo base_url().'article/'.$key->slug; ?></td>
                    <td><?php echo $key->cr_date; ?></td>
                    <td><?php echo $key->up_date; ?></td>
                    
                    <td class="table-action">
                      <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/Article/edit/<?php echo $key->id; ?>"><i class="fa fa-edit tooltips" data-original-title="Edit Article"></i> Edit</a>
                      
                    </td>
                  </tr>
                  <?php
                  $i++;
                  endforeach;
                } else {
                  ?>
                  <tr>
                    <td colspan="8"><center>No Article Found !!!</center></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div><!-- table-responsive -->
           
          </div><!-- col-md-6 -->
        </div>


      </div>
    </div>
    <!-- /.box -->

  </section>