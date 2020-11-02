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
            </div><!-- /.container-fluid -->
        </div>
    </section>
     <section class="content">
        <div class="container-fluid">
            <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Vue Basic
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div id="app">{{message}}</div>
                <textarea id="codeMirrorDemo" class="p-3">
                    <script type="text/javascript">
                    $(function () {    
                        var app = new Vue({
                            el:"#app",
                            data:{
                                message: "Hello World!"
                            }
                        });
                    });
                    </script>
                </textarea>
            </div>
            <div class="card-footer">
              Visit <a href="https://codemirror.net/">CodeMirror</a> documentation for more examples and information about the plugin.
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
        </div>
    </section>
</div>
<?php $this->load->view('footer');?>
<script type="text/javascript">
$(function () {    
    var app = new Vue({
        el:"#app",
        data:{
            message: "Hello World!"
        }
    });
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
});
</script>

