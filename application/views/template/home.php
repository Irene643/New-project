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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
        <?php if (!isset($_SESSION['is_logged_in'])):?>
        <div class=" navbar-brand collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                About Us
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">About Writedrone</a>
                <a class="dropdown-item" href="#">Our People</a>
                <a class="dropdown-item" href="#">Our Services</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contact Us</a>
            </li>
          </ul>
        </div> 
        <?php endif;?>   

        <!-- <a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base">Writedrone Dashboard</a> -->
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item">
            <form id="searchForm" class="ml-auto d-none d-lg-block">
              <div class="form-group position-relative mb-0">
                <button type="submit" style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>
                <input type="search" placeholder="Search ..." class="form-control form-control-sm border-0 no-shadow pl-4">
              </div>
            </form>
          </li>
          <?php if(isset($_SESSION['is_logged_in'])):?>
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
          <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
            <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family"><?php echo $_SESSION['username'];?></strong><small>Web Developer</small></a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Settings</a><a href="#" class="dropdown-item">Activity log       </a>
              <div class="dropdown-divider"></div><a href="<?php echo base_url(); ?>index.php/login/user_logout" class="dropdown-item">Logout</a>
            </div>
          </li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="<?php echo base_url(); ?>" class="sidebar-link text-muted active"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
              <li class="sidebar-list-item"><a href="../login/index" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Charts</span></a></li>
              <li class="sidebar-list-item"><a href="tables" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Tables</span></a></li>
              <li class="sidebar-list-item"><a href="<?php echo base_url(); ?>index.php/create" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Forms</span></a></li>
          <li class="sidebar-list-item"><a href="<?php echo base_url(); ?>index.php/projects" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Projects</span></a>
            <div id="pages" class="collapse">
              <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                <li class="sidebar-list-item"><a href="<?php echo base_url(); ?>index.php/projects" class="sidebar-link text-muted pl-lg-5">All<span class="badge badge-pill badge-light"><?php  echo count($projects);?></span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Unassigned<span class="badge badge-pill badge-secondary"><?php  echo count($unassigned);?></span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">In Progress<span class="badge badge-pill badge-primary"><?php  echo count($open);?></span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Waiting for Client<span class="badge badge-pill badge-info"><?php  echo count($waiting_for_client);?></span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Done<span class="badge badge-pill badge-success"><?php  echo count($completed);?></span></a></li>
              </ul>
            </div>
          </li>
              <li class="sidebar-list-item"><a href="<?php echo base_url(); ?>index.php/login" class="sidebar-link text-muted"><i class="o-exit-1 mr-3 text-gray"></i><span>Login</span></a></li>
        </ul>
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">EXTRAS</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-database-1 mr-3 text-gray"></i><span>Demo</span></a></li>
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-imac-screen-1 mr-3 text-gray"></i><span>Demo</span></a></li>
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Demo</span></a></li>
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Demo</span></a></li>
        </ul>
      </div>
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <?php if(isset($_SESSION['id'])): ?>
            <div class="row">
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-violet"></div>
                    <div class="text">
                      <h6 class="mb-0"><?php echo $all_projects_title ?></h6><span class="text-gray"><?php  echo count($projects);?></span>
                    </div>
                  </div>
                  <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-blue"></div>
                    <div class="text">
                      <h6 class="mb-0"><?php  echo $open_projects_title;?></h6><span class="text-gray"><?php  echo count($open);?></span>
                    </div>
                  </div>
                  <div class="icon text-white bg-blue"><i class="far fa-clipboard"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-green"></div>
                    <div class="text">
                      <h6 class="mb-0"><?php  echo $completed_projects_title;?></h6><span class="text-gray"><?php  echo count($completed);?></span>
                    </div>
                  </div>
                  <div class="icon text-white bg-green"><i class="fa fa-dolly-flatbed"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-red"></div>
                    <div class="text">
                      <h6 class="mb-0">New invoices</h6><span class="text-gray">123</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-red"><i class="fas fa-receipt"></i></div>
                </div>
              </div>
            </div>
          <?php endif; ?>
          </section>
          <section class="py-5">
            <div class="row">
              <div class="col-lg-7">
                <div class="card">
                  <div class="card-header text-center">Jobs For You (<?=count($unassigned)?>)</div>
                  <div class="card-body">
                  <?php foreach($unassigned as $unassigned_project):
                  $current_date = strtotime(date('Y-m-d h:i:s'));
                  $created_at = strtotime($unassigned_project->created_at);
                  $hr_difference = round(($current_date - $created_at)/(60*60),0);
                  if($hr_difference >= 0){
                    if($hr_difference > 24 ) {
                      $day_difference = round(($hr_difference/24),0)."d";
                    }
                    if($hr_difference <= 24 ){
                      $hr_difference = $hr_difference ."h";
                    }
                  }
                    // print_r($hr_difference);
                    ?>
                    
                <div class="card">
                  <div class="card-header text-center"><?=$unassigned_project->title?><span class="float-right"><?php if($hr_difference < 24):?><span style="color:green"class="badge badge-light">New</span><?php endif; if($hr_difference >24){echo $day_difference;}else{ echo $hr_difference;}?><i class="fa fa-heart"style="color: orange;padding-left:0.5em" ></i></span></div>
                    <a href="<?=base_url();?>index.php/project/view/<?=$unassigned_project->id;?>"title="View this job"class="project-holder">
                      <div class="card-body">
                        <div>
                          <p>Reference Type: <?=$unassigned_project->reference?></p>
                          <p>Due Date: <?=$unassigned_project->due_date?></p>
                          <p>Price: <?=$unassigned_project->budget?></p>
                          <?php
                            $due_date = strtotime($unassigned_project->due_date);
                            $due_in = round(($due_date - $current_date)/(60*60),0);

                            if($due_in > 0){
                              if($due_in > 24 ) {
                                $due_in = round(($due_in/24),0)."days";
                              }else{
                                $due_in = $due_in ."h";
                              }
                            }else{
                              $due_in = "Expired";
                            }
                          ?>
                          <p>Due in: <?=$due_in?></p>
                          <div class="main-text"><?=$unassigned_project->description?></div>
                        </div></a>
                        <div class="text-center read-more">
                          <?php 
                            if(isset($_SESSION['id'])):
                               // echo form_open('index.php/writer/bid');
                            ?>
                            <form id="bid-form">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['id']?>"> 
                            <input type="hidden" name="project_id" value="<?= $unassigned_project->id?>">
                            <a href="#"id="bid" type="submit"class="btn btn-sm btn-success">Apply now</a>
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
              </div>
              <?php if(!isset($_SESSION['is_logged_in'])):?>
              <div class="col-lg-5">
                <div id="login" class="card">
                <!-- <h1 class="text-base text-primary text-center text-uppercase mb-4 card-login">Writedrone</h1> -->
                  <div class="card-header text-center">Login</div>
                    <div class="card-body">
                <!-- <p class="text-muted">ogin to co.</p> -->
                <!-- <form id="loginForm" method="POST"action="<?php echo base_url();?>index.php/login/login_user" class="mt-4">-->
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('index.php/login/login_user'); ?>  
                          <div class="form-group mb-4">
                            <input type="text" name="username" placeholder="Username or Email address" class="form-control border-0 shadow form-control-lg">
                            <span class="text-danger"><?php echo form_error('username')?></span>
                          </div>
                          <div class="form-group mb-4">
                            <input type="password" name="password" placeholder="Password" class="form-control border-0 shadow form-control-lg text-violet">
                            <span class="text-danger"><?php echo form_error('password')?></span>
                          </div>
                          <div class="form-group mb-4">
                            <div class="custom-control custom-checkbox">
                              <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                              <label for="customCheck1" class="custom-control-label">Remember Me</label>
                            </div>
                          </div>
                          <div class="form-btn">
                            <p class="text-muted">New user?</p>
                            <a id="signup" class="btn btn-primary shadow px-5">Sign up</a>
                            <button type="submit" name="login"class="btn btn-primary back-btn shadow px-5">Login</button>
                          </div>
                        </form>
                      </div>
                  </div>
                <div class="card" id="sign-up">
                <!-- <h1 class="text-base text-primary text-center text-uppercase mb-4 card-login">Writedrone</h1> -->
                  <div class="card-header text-center">Sign Up</div>
                    <div class="card-body">
                <!-- <p class="text-muted">ogin to co.</p> -->
                <!-- <form id="loginForm" method="POST"action="<?php echo base_url();?>index.php/login/login_user" class="mt-4">-->
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('index.php/login/sign_up'); ?>
                          <div class="form-group mb-4">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" placeholder="First Name" class="form-control border-0 shadow form-control-lg text-violet">
                            <span class="text-danger"><?php echo form_error('firstname')?></span>
                          </div> 
                          <div class="form-group mb-4">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" placeholder="Last Name" class="form-control border-0 shadow form-control-lg text-violet">
                            <span class="text-danger"><?php echo form_error('lastname')?></span>
                          </div>  
                          <div class="form-group mb-4">
                          <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Email address" class="form-control border-0 shadow form-control-lg text-violet">
                            <span class="text-danger"><?php echo form_error('email')?></span>
                          </div> 
                          <div class="form-group mb-4">
                            <label for="username">Username</label>
                            <input type="text" name="username" placeholder="Username" class="form-control border-0 shadow form-control-lg text-violet">
                            <span class="text-danger"><?php echo form_error('username')?></span>
                          </div>
                          <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="********" class="form-control border-0 shadow form-control-lg text-violet">
                            <span class="text-danger"><?php echo form_error('password')?></span>
                          </div>
                          <div class="form-group mb-4">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" placeholder="********" id="confirm_password"class="form-control border-0 shadow form-control-lg text-violet">
                            <span class="text-danger"><?php echo form_error('confirm_password')?></span>
                            <span id='message'></span>
                          </div>
                          <div class="form-group mb-4">
                            <label for="experience_length">Experience Length</label>
                            <select name="experience_length" class="form-control border-0 shadow form-control-lg text-violet">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="More than 3 years">More than 3 years</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('experience_length')?></span>
                          </div>
                          <div class="form-group mb-4">
                            <label for="proficiency_areas">Proficiency Area(s)</label><br><span class="text-muted">Press and hold Ctrl(Windows) or Command(Mac) to select multiple</span>
                            <select name="proficiency[]" multiple id="proficiency"class="form-control">
                            <?php foreach ($project_categories as $category):?>
                              <!-- <?php $selected = in_array($category->id,$prof) ? " selected " : null;?> -->
                              <option value="<?php echo $category->id ?>"><?=$category->name?></option>
                            <?php endforeach; ?>
                            
                            </select>
                            <span></span>
                          </div>
                          <div class="form-btn text-center">
                            <!-- <a href="<?php echo base_url()?>"class="btn btn-primary shadow px-5">Sign up</a> -->
                            <button type="submit" name="signup"class="btn btn-primary  shadow px-5">Sign Up</button>
                          </div>
                        </form>
                      </div>
                  </div>
                </div>
                <?php endif;?>
                <?php if(isset($_SESSION['is_logged_in'])):?>
                <div class="col-lg-5">
                  <div id="notifications" class="card">
                    <div class="card-header text-center">Notifications</div>
                    <div class="card-body"></div>
                  </div>
                </div>
                <?php endif;?>
              </div>
          
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
        </>
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
    <script src="<?php echo base_url(); ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url(); ?>assets/js/dat.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/charts-home.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/front.js"></script>
  </body>
</html>