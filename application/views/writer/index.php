<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Writedrone</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-colvis-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.css" />  -->
    
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png?3">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://nightly.datatables.net/css/dataTables.bootstrap4.min.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base">Writedrone Dashboard</a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item">
            <form id="searchForm" class="ml-auto d-none d-lg-block">
              <div class="form-group position-relative mb-0">
                <buttonbutton type="submit" style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></buttonbutton>
                <input type="search" placeholder="Search ..." class="form-control form-control-sm border-0 no-shadow pl-4">
              </div>
            </form>
          </li>
          <li class="nav-item dropdown mr-3"><a id="notifications" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-gray-400 px-1"><i class="fa fa-bell"></i><span class="notification-icon"></span></a>
            <div aria-labelledby="notifications" class="dropdown-menu"><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 2 followers</p>
                  </div>
                </div></a><a href="#" class="dropdown-item"> 
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-green text-white"><i class="fas fa-envelope"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 6 new messages</p>
                  </div>
                </div></a><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-blue text-white"><i class="fas fa-upload"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">Server rebooted</p>
                  </div>
                </div></a><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 2 followers</p>
                  </div>
                </div></a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item text-center"><small class="font-weight-bold headings-font-family text-uppercase">View all notifications</small></a>
            </div>
          </li>
          <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="<?php echo base_url(); ?>assets/img/icon.png" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
            <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family"><?php echo $_SESSION['firstname'];?></strong><small>Web Developer</small></a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Settings</a><a href="#" class="dropdown-item">Activity log       </a>
              <div class="dropdown-divider"></div><a href="login/user_logout" class="dropdown-item">Logout</a>
            </div>
          </li>
        </ul>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <?php require_once(APPPATH.'views/writer/sidebar.php');?>
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section id="form-search"class="py-5">
            <?php echo form_open("index.php/home/search");?>
            <div class="row">
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <select name="category" value="<?php echo set_value('category'); ?>" class="form-control">
                      <option  selected value="">All Categories</option>
                      <?php foreach ($project_categories as $category):?>
                        <option value="<?php echo $category->id ?>" <?php if ($category->id == set_value('category')) echo "selected = 'selected'"?>><?php echo $category->name ?></option>
                      <?php endforeach; ?>
                      </select>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                  <div class="flex-grow-1 d-flex align-items-center">
                  <select name="reference_type" value="<?php echo set_value('reference_type'); ?>" class="form-control" id="referenceType">
                    <option selected value="">All Reference Types</option>
                    <?php foreach ($project_references as $reference):?>
                      <option value="<?php echo $reference->id ?>"><?php echo $reference->name ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <select name="pages" value="<?php echo set_value('pages'); ?>" class="form-control">
                      <option  selected value="">All Pages</option>
                      <option  value="1-5">1-5</option>
                      <option  value="6-10">6-10</option>
                      <option  value="11-15">11-15</option>
                    </select>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="flex-grow-1 d-flex align-items-center">
                  <button class="btn btn-primary search"type="submit">SEARCH</button>
                </div>
              </div>
           </form>
           <?php 
            $card_title = "Search Results";
            if(empty($search_results)){
              // print_r($no_results );die;
              if($no_results == 1){?>
                <br><div class="alert alert-danger alert-dismissible search_alert" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="text-center">No projects match your search!</span>
                </div><?php
              }
              $card_title = "All Unassigned Projects";
              $search_results = $unassigned;
            } 
            ?>
          </section>
          <section>
            <!-- project card-->
            <div class="card project-card">
              <div class="card-header text-center"><?=$card_title?></div>
              <div class="card-body">
              
              <?php 
              // print_r($search_results);die;
              foreach($search_results as $search_result):
              $current_date = strtotime(date('Y-m-d h:i:s'));
              $created_at = strtotime($search_result->created_at);
              $hr_difference = round(($current_date - $created_at)/(60*60),0);
              // print_r($created_at);exit;
              if($hr_difference >= 0){
                if($hr_difference >= 24 ){
                  $day_difference = round(($hr_difference/24),0)."d";
                  $days = round(($hr_difference/24),0);
                  if($days > 31)$month_difference = round(($days/30),0)."months";
                }
                if($hr_difference <= 24 )$hr_difference = $hr_difference ."h";
              }
              ?>
                    
                <div class="card">
                  <div class="card-header text-center">
                    <?=$search_result->title?><span class="float-right">
                      <?php if($hr_difference < 24):?>
                        <span style="color:green"class="badge badge-light">New</span>
                      <?php endif; 
                      if($hr_difference >24){
                        // print_r($day_difference);exit;
                        if($days > 31){
                          echo $month_difference;
                        }else{
                          echo $day_difference;
                        }
                        
                      }else{
                        echo $hr_difference;
                      }?>
                        <i class="fa fa-heart"style="color: orange;padding-left:0.5em" ></i></span>
                    </div>
                    <a href="<?=base_url();?>index.php/project/view/<?=$search_result->id;?>"title="View this job"class="project-holder">
                      <div class="card-body">
                        <div>
                          <p>Category: <?=$search_result->category?></p>
                          <p>Reference Type: <?=$search_result->reference?></p>
                          <p>Due Date: <?=$search_result->due_date?></p>
                          <p>Price: <?=$search_result->budget?></p>
                          <?php
                            $due_date = strtotime($search_result->due_date);
                            $due_in = round(($due_date - $current_date)/(60*60),0);

                            if($due_in > 0){
                              $due_in > 24 ? $due_in = round(($due_in/24),0)."days" : $due_in = $due_in ."h";
                              
                            }else{
                              $due_in = "Expired";
                            }
                          ?>
                          <p>Due in: <?=$due_in?></p>
                          <div class="main-text"><?php echo $search_result->description?></div>
                        </div></a>
                        <div class="text-center read-more">
                          <?php 
                            if(isset($_SESSION['id'])):
                               // echo form_open('index.php/writer/bid');
                            ?>
                            <form method="POST" id="bid-form" action="writer/bid">
                            <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['id']?>"> 
                            <input type="hidden" id="project_id" name="project_id" value="<?= $search_result->id?>">
                            <button type="submit"class="btn btn-sm btn-success bid">Apply now</button>
                            </form>

                          <?php endif;if(!isset($_SESSION['id'])):?>
                          
                            <button id="bid-not-loggedin" class="btn btn-sm btn-success">Apply now</button>
                            <?php endif ?>
                            <span id="error-msg"></span>
                        </div>
                      </div>
                      
                    </div>
                    <br>
                    <?php endforeach ?>
                  </div>
                </div>
              <!-- datatable -->
            <table id="writerDetails" class="datatable table table-bordered table-hover table-striped" cellspacing="0" width="100%">
            
              <thead>
                  <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Reference</th>
                    <th>Size</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            <!-- datatable end -->
            
          </section>
          <section class="py-5">
            <div class="row">
              <div class="col-lg-12"><a href="#" class="message card px-5 py-3 mb-4 bg-hover-gradient-primary no-anchor-style">
                  <div class="row">
                    <div class="col-lg-3 d-flex align-items-center flex-column flex-lg-row text-center text-md-left"><strong class="h5 mb-0">24<sup class="smaller text-gray font-weight-normal">Apr</sup></strong><img src="img/avatar-1.jpg" alt="..." style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">
                      <h6 class="mb-0">Jason Maxwell</h6>
                    </div>
                    <div class="col-lg-9 d-flex align-items-center flex-column flex-lg-row text-center text-md-left">
                      <div class="bg-gray-100 roundy px-4 py-1 mr-0 mr-lg-3 mt-2 mt-lg-0 text-dark exclode">User testing</div>
                      <p class="mb-0 mt-3 mt-lg-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    </div>
                  </div></a></div>
              <div class="col-lg-12"><a href="#" class="message card px-5 py-3 mb-4 bg-hover-gradient-primary no-anchor-style">
                  <div class="row">
                    <div class="col-lg-3 d-flex align-items-center flex-column flex-lg-row text-center text-md-left"><strong class="h5 mb-0">24<sup class="smaller text-gray font-weight-normal">Nov</sup></strong><img src="img/avatar-2.jpg" alt="..." style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">
                      <h6 class="mb-0">Sam Andy</h6>
                    </div>
                    <div class="col-lg-9 d-flex align-items-center flex-column flex-lg-row text-center text-md-left">
                      <div class="bg-gray-100 roundy px-4 py-1 mr-0 mr-lg-3 mt-2 mt-lg-0 text-dark exclode">Web Developer</div>
                      <p class="mb-0 mt-3 mt-lg-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                    </div>
                  </div></a></div>
              <div class="col-lg-12"><a href="#" class="message card px-5 py-3 mb-4 bg-hover-gradient-primary no-anchor-style">
                  <div class="row">
                    <div class="col-lg-3 d-flex align-items-center flex-column flex-lg-row text-center text-md-left"><strong class="h5 mb-0">17<sup class="smaller text-gray font-weight-normal">Aug</sup></strong><img src="img/avatar-3.jpg" alt="..." style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">
                      <h6 class="mb-0">Margret Peter</h6>
                    </div>
                    <div class="col-lg-9 d-flex align-items-center flex-column flex-lg-row text-center text-md-left">
                      <div class="bg-gray-100 roundy px-4 py-1 mr-0 mr-lg-3 mt-2 mt-lg-0 text-dark exclode">Analysis Agent</div>
                      <p class="mb-0 mt-3 mt-lg-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                    </div>
                  </div></a></div>
              <div class="col-lg-12"><a href="#" class="message card px-5 py-3 mb-4 bg-hover-gradient-primary no-anchor-style">
                  <div class="row">
                    <div class="col-lg-3 d-flex align-items-center flex-column flex-lg-row text-center text-md-left"><strong class="h5 mb-0">15<sup class="smaller text-gray font-weight-normal">Sep</sup></strong><img src="img/avatar-4.jpg" alt="..." style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">
                      <h6 class="mb-0">Jason Doe</h6>
                    </div>
                    <div class="col-lg-9 d-flex align-items-center flex-column flex-lg-row text-center text-md-left">
                      <div class="bg-gray-100 roundy px-4 py-1 mr-0 mr-lg-3 mt-2 mt-lg-0 text-dark exclode">User testing</div>
                      <p class="mb-0 mt-3 mt-lg-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                    </div>
                  </div></a></div>
            </div>
          </section>
        </div>
        <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 text-center text-md-left text-primary">
                <p class="mb-2 mb-md-0">Your company &copy; 2018-2020</p>
              </div>
              <div class="col-md-6 text-center text-md-right text-gray-400">
                <p class="mb-0">Design by <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Bootstrapious</a></p>
                <!-- Please do not remove the backlink to us unless you support further theme development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <!--data table--> 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-colvis-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.js"></script> 
    <script src="<?php echo base_url(); ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/charts-home.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/front.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dat.js"></script>
    <!-- <script type="text/javascript"> 
        $(document).ready(function() { 
            $("#mytaable").dataTable(); 
        }); 
    </script>  -->
  </body>
</html>