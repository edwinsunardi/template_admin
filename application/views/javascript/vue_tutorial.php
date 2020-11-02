<?php $this->load->view('header', $this->params);?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $title;?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo $this->uri->segment(2);?></a></li>
                        <li class="breadcrumb-item active"><?php echo $active_sub_menu;?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        
    </section>
</div>
<?php $this->load->view('footer');?>