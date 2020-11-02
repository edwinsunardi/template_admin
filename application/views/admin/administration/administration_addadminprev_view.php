<?php $this->load->view('header', $this->params);?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Previlage</h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open('admin/administration/addPrevilage/'.$detailAdmin->id,'class="form-horizontal" id="form"');?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="username" class="col-md-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" id="username" class="form-control required" placeholder="username" value="<?php echo $detailAdmin->username;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-2 control-label">Previlage</label>
                                <div class="col-sm-10">
                                    <?php echo $listPrevilage;?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <input type="hidden" name="id" id="id" value="<?php echo $detailAdmin->id;?>"/>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('footer');?>