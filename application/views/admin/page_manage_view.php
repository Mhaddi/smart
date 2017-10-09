 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Pages</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
               
          <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Entries<small>Users and Dealers</small></h2>
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
                          <th>Image</th>
                          <th>Title</th>
                          <th>Heading</th>
                          <th>Discription</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $sr=1;
                        foreach ($page_list as $page_lists) 
                        {
                        
                      ?>
                          <tr>
                            <td><?php echo $sr; ?></td>
                            <td><img src="<?php echo base_url() ?>assets/Images/page_uploads/<?php echo  $page_lists->pic?>" width="50" height="50"></td>
                            <td><?php echo  $page_lists->title?></td>
                            <td><?php echo  $page_lists->heading?></td>
                            <td><?php echo  $page_lists->discription?></td>
                            <td>
                              <a href="<?php echo base_url() ?>dashboard/page_edit/<?php echo $page_lists->id  ?>">Edit</a>
                              <a href="<?php echo base_url() ?>dashboard/page_delete/<?php echo $page_lists->id  ?>">Delete</a>
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