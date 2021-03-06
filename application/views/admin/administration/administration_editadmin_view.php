<?php $this->load->view('header', $this->params);?>
<div class="content-wrapper">
	<section class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1>Administration Form</h1>
          		</div>
          		<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Administration</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="card card-purple">
		              	<div class="card-header">
		                	<h3 class="card-title"><b>Add Admin</b></h3>
		              	</div>
		              	<form class="form-horizontal" method="post" id="quickForm" action="<?php echo base_url();?>index.php/admin/administration/addAdmin/<?php echo $detail_admin->id;?>">
		                	<div class="card-body">
		                  		<div class="form-group row"> 
				                    <label for="username" class="col-sm-2 col-form-label">Username</label>
				                    <div class="col-sm-10">
				                      <input type="text" class="form-control"  name="username" id="username" value="<?php echo $detail_admin->username;?>" placeholder="Username"/>
				                      <?php echo form_error('username','<div style="color:red">','</div>');?>
				                    </div>
				                </div>
			                  	<div class="form-group row">
					                <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
					                <div class="col-sm-10">
					                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $detail_admin->fullname;?>" placeholder="Full Name"/>
					                    <?php echo form_error('fullname','<div style="color:red">','</div>');?>
					                </div>
					            </div>		
			                  	
					            <div class="form-group row">
					                <label for="email" class="col-sm-2 col-form-label">Email</label>
					                <div class="col-sm-10">
					                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $detail_admin->email;?>" placeholder="Email"/>
					                    <?php echo form_error('email','<div style="color:red">','</div>');?>
					                </div>
					            </div>
				                <div class="form-group row">
				                    <label for="level" class="col-sm-2 col-form-label">Level</label>
				                    <div class="col-sm-10">
					                    <select name="level" id="level" class="form-control">
					                        <option value="">PILIH</option>
					                        <option value="super administrator" <?php echo $detail_admin->level == "super administrator" ? "selected" : '';?>>Super Administrator</option>
					                        <option value="admin" <?php echo $detail_admin->level == "admin" ? "selected" : '';?>>Admin</option>
					                    </select>
					                    <?php echo form_error('level','<div style="color:red">','</div>');?>
				                	</div>
				                </div>
				                
			                    <div class="form-group row">
			                    	<label for="status" class="col-sm-2 col-form-label">Status</label>
			                    	<div class="col-sm-10">
						                <input type="checkbox" name="status" id = "status" value = 1 checked data-bootstrap-switch>
				            		</div>
			                    </div>
			                    <center><button type="submit" class="btn btn-primary">Submit</button><button type="button" id="reset" class="btn btn-danger toastrDefaultInfo">RESET</button></center>
		                	</div>
		              	</form>
		            </div>
    			</div>
    		</div>
    	</div>
    </section>
</div>
<?php $this->load->view('footer');?>
<script>
$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
});
$(function () {
// $.validator.setDefaults({
//     submitHandler: function () {
//       alert( "Form successful submitted!" );
//     }
//   });
$('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
  	  level: {
  	  	required: true
  	  },
  	  password_confirm:{
  	  	required: true,
  	  	equalTo: '#password',
  	  	minlength: 5
  	  }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      password_confirm: {
      	required  : "Please provide a password confirm",
      	minlength : "Your password must be at least 5 characters long"
      },
      level: {
      	required: "Please choice level"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

var url = BASE_URL + "admin/administration/resetPass";
$('#reset').click(function(){
  $.ajax({
    method   : 'POST',
    dataType : 'json',
    url      : url,
    data    : {
      username : $('#username').val()
    },
    success: function(result){
        var str = result;
        var str_bold = str.bold(); 
        toastr.info("Password sudah direset dan notifikasi kepada user melalui email \n password user: " + str_bold)
      
    },
    error: function(){
      alert(url);
    }
  });
});
</script>