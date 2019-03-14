<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">


      <div class="row">
        <div class="col-md-12">
            
          <div class="table-responsive">  
            <table class="table table-hover" id="table1" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="1%">SN.</th>
                  <th width="10%">Employer Name </th>
                  <th width="10%">Organisation </th>
                  <th width="5%">Email</th>
                  <th width="10%" class="table-action text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($this->uri->segment(3) == NULL) {
                  $i = 1;
                } else {
                  $i = $this->uri->segment(3) + 1;
                }
                if (!empty($basket_employer)) { 
                  foreach ($basket_employer as $key): 
                    ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $key->fname.''.$key->lname; ?></td>
                    <td><?php echo $key->orgname; ?></td>
                    <td><?php echo $key->email; ?></td>
                    
                    <td class="table-action text-center">
                    <button type="button" class="btn btn-success btn-sm view_emp_basket" company_name="<?php echo $key->orgname; ?>" emp_id="<?php echo $key->emp_id; ?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-search tooltips" data-original-title="View Detail"></i> View Detail</button>
                    |
                    <button type="button" class="btn btn-success btn-sm remove_employer" link="<?php echo base_url(); ?>admin/Employer/removeBasket/<?php echo $key->emp_id; ?>" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash tooltips" data-original-title="Remove From Basket"></i> Remove</button>
                    </td>
                  </tr>
                  <?php
                  $i++;
                  endforeach;
                } else {
                  ?>
                  <tr>
                    <td colspan="5"><center>No Employer Found !!!</center></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div><!-- table-responsive -->
           <?php echo $this->pagination->create_links();?>
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
          <h4 class="modal-title news_title">View Employer Detail of <span class="org_name"></span></h4>
          <input type="hidden" value="" class="news_id" name="">
        </div>
        <div class="modal-body center">                 
          <div class="table-responsive result_basket">              
          </div><!-- table-responsive -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

   <!-- Delete Modal -->
  <div id="myModalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title green">Are you sure to Remove a Employer from Basket ?</h4>
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
    $('document').ready(function(){
      $('.remove_employer').on('click',function(){ 
        var link  = $(this).attr('link');
        $('.get_link').attr('href',link); 

      });
    });
  </script>


<script type="text/javascript">
    $('document').ready(function(){
      $('.view_emp_basket').on('click',function(){ 
        var emp_id = $(this).attr('emp_id');
        var company_name = $(this).attr('company_name');

        $('.org_name').text(company_name); 
        $('.comp_title').text(company_name);
        $('.comp_name').text(company_name);
        $('.emp_ref').append(emp_id); 

        $.ajax({
         type: 'POST',
         url: site_url('admin/Employer/employerBasket'),
         data: 'emp_id=' + emp_id,

         success: function (data) {
          $('.result_basket').html(data);
        }
      }); 
      });
    });
  </script>

