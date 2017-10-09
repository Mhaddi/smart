 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage DIY</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
               
          <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Entries<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sr</th>
                          <th>Title</th>
                          <th>Content</th>
                          <th>Category</th>
                          <th>Tag</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $sr=1;
                        foreach ($data_fleet as $data_fleets) 
                        {
                        
                      ?>
                          <tr>
                            <td><?php echo $sr; ?></td>
                            <td><?php echo  $data_fleets->heading?></td>
                            <td><?php echo  $data_fleets->text?></td>
                            <td><?php echo  $data_fleets->cat?></td>
                            <td><?php echo  $data_fleets->tag?></td>
                            <td>
                              <a href="<?php echo base_url() ?>dashboard/fleet_delete/<?php echo $data_fleets->id  ?>">Delete</a>
                            </td>
                          </tr>
                      <?php 
                        $sr++;}
                      ?>
                      </tbody>
                    </table>
          
                  </div>
                </div>
              </div>
            </div>
         
              </div>
            </div>
          </div>
        </div>