<!DOCTYPE html>
<html>
    <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-list-item"><a href="<?php echo base_url(); ?>" class="sidebar-link text-muted active"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
                <li class="sidebar-list-item"><a href="../login/index" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Charts</span></a></li>
                <li class="sidebar-list-item"><a href="tables" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Tables</span></a></li>
                <li class="sidebar-list-item"><a href="<?php echo base_url(); ?>index.php/create" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Forms</span></a></li>
            <li class="sidebar-list-item"><a href="#all" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted all"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Projects</span></a>
            <div id="pages" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                <li class="sidebar-list-item "><a id="writerall" href="#all"class=" all sidebar-link text-muted pl-lg-5">All<span class="badge badge-pill badge-light"><?php  echo count($writer_projects);?></span></a></li>
                <li class="sidebar-list-item"><a id="writerinprogress" href="#inprogress" class="sidebar-link text-muted pl-lg-5">In progress<span class="badge badge-pill badge-primary"><?php  echo count($writer_open);?></span></a></li>
                <li class="sidebar-list-item"><a id="writerwaiting" href="#waiting" class="sidebar-link text-muted pl-lg-5">Waiting for Client<span class="badge badge-pill badge-info"><?php  echo count($writer_waiting_for_client);?></span></a></li>
                <li class="sidebar-list-item"><a id="writercompleted" href="#completed" class="sidebar-link text-muted pl-lg-5">Done<span class="badge badge-pill badge-success"><?php  echo count($writer_completed);?></span></a></li>
                <li class="sidebar-list-item"><a id="writerbids" href="#bids" class="sidebar-link text-muted pl-lg-5">Bids<span class="badge badge-pill badge-secondary"></span></a></li>
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
</html>