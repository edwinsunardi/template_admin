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
		              	<div class="card-body">
		              		<table id="listData" class="table table-bordered table-striped">
									<thead>
									<tr>
										<th>No</th>
										<th>Username</th>
										<th>Full Name</th>
										<th>Email</th>
										<th>Level</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>	
									</tbody>
								</table>
		              	</div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>
</div>
<?php $this->load->view('footer');?>