<?php $this->load->view('header', $this->params);?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Test Technical</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Array</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                            <div class="card-body">
                                <i class="fas fa-cloud-rain" style="font-size: 48px; color:grey"></i>
                    <!--             <?php 
                      $weather = implode(", ",$weatherJSON->weather); 
                      echo $weatherJSON->name."<br/>";
                      echo $weatherJSON->weather[0]->main;
                      ?> -->
                                <form class="form-horizontal" method="post" id="quickForm" action="<?php echo base_url();?>index.php/admin/main">
                                <div class="form-group row">
                                    <label for="array1" class="col-sm-2 col-form-label">Array 1</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="array1[]" id="array1" placeholder="Array" />
                                        <input type="text" class="form-control" name="array1[]" id="array1" placeholder="Array" />
                                        <input type="text" class="form-control" name="array1[]" id="array1" placeholder="Array" />
                                        <input type="text" class="form-control" name="array1[]" id="array1" placeholder="Array" />
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="array1" class="col-sm-2 col-form-label">Array 2</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="array2[]" id="array2" placeholder="Array" />
                                        <input type="text" class="form-control" name="array2[]" id="array2" placeholder="Array" />
                                        <input type="text" class="form-control" name="array2[]" id="array2" placeholder="Array" />
                                        <input type="text" class="form-control" name="array2[]" id="array2" placeholder="Array" />
                                        
                                    </div>
                                </div>
                                <button type="submit" id="add" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                            <!-- /.card-body -->


                        
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">CHAT</h3>
                        </div>
                        <div class="card-body">
                            <div class="direct-chat-messages" id="chatbox"></div>
                            <form class="form-horizontal" method="post" id="formChat">
                                <div class="form-group row">
                                    <label for="username" class="col-sm-4 col-form-label">Username</label>
                                    <div class="col-sm-4">
                                        <select id="user" name="user" class="form-control" required>
                                            <option value=""></option>
                                            <?php foreach($get_user->result() as $row){?>
                                            <option value="<?php echo $row->username;?>"><?php echo $row->username;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="message" id="message" placeholder="Message" required/>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary" id="send">Send</button> 
                                    </div>
                                </div>
                            </form>
                        </div>

                </div>
            </div>
    </section>
</div>
<?php $this->load->view('footer');?>
<script type="text/javascript">
    var url = BASE_URL + "admin/main/ajax_array";
    var array1inp = $('input[name="array1[]"]').map(function(){
        return this.value;
    }).get();
    var array2inp = $('input[name="array2[]"]').map(function(){
        return this.value;
    }).get();
$('#quickForm').submit(function(e){
    e.preventDefault();
  $.ajax({
    type   : 'POST',
    url      : url,
    data : $(this).serialize(),
    success: function(result){
        alert(result);
    },
    error: function(){
      alert(url);
    }
  });
});

var url1 = BASE_URL + "admin/main/ajax_post_chat";
$('#formChat').submit(function(e){
        e.preventDefault();
    $.ajax({
        type : 'POST',
        url  : url1,
        data : $(this).serialize(),
        success: function(result){
            alert(result);
            $('#message').val("");
        },
        error: function(){
          alert(url);
        }
    });
});

// var url2 = BASE_URL + "admin/main/get_chat_user?user=" + $('#user option selected').text();
$('#user').change(function(){
    var url2 = BASE_URL + "admin/main/get_chat_user/" + $('#user option:selected').text();
    $.get(url2, function(userChatJson){
        // alert($('#user').val());
        if(userChatJson !== null){
                var parseJSON = JSON.parse(userChatJson);
                // alert(url2);
                var insideChat = '';
                $.each(parseJSON,function(){
                    insideChat += "<b>"+this.sender+"</b> : "+this.message +'<i><span class="direct-chat-timestamp float-right">'+this.create_date + "</span></i><br/>";
                    if(session_user == this.sender){
                        insideChat += '<div class="direct-chat-msg left">'+
                        '<div class="direct-chat-infos clearfix">'+
                        '<span class="direct-chat-name float-left" style="color:blue">'+ this.sender+'</span>'+
                        '<span class="direct-chat-timestamp float-right">'+this.create_date+'</span>'+
                    '</div><img class="direct-chat-img" src="<?php echo base_url();?>assets/images/avatar.png" alt="message user image">'+
                    '<div class="direct-chat-text">'+this.message+'</div></div>';
                     
                    }else{
                        insideChat += '<div class="direct-chat-msg right">'+
                        '<div class="direct-chat-infos clearfix">'+
                        '<span class="direct-chat-name float-right" style="color:red">'+ this.sender+'</span>'+
                        '<span class="direct-chat-timestamp float-left">'+this.create_date+'</span>'+
                    '</div><img class="direct-chat-img" src="<?php echo base_url();?>assets/images/avatar.png" alt="message user image">'+
                    '<div class="direct-chat-text">'+this.message+'</div></div>';
                    }
                    
                    $('#chatbox').html(insideChat);
                    // alert(this.sender);
                });
                insideChat +='';
        }
    });
    
});

setInterval(function(){
    var url2 = BASE_URL + "admin/main/get_chat_user/" + $('#user option:selected').text();
    var session_user = '<?php echo $this->session->userdata("admin_username")?>';
    $.get(url2, function(userChatJson){
        // alert($('#user').val());
        if(userChatJson !== null){
                var parseJSON = JSON.parse(userChatJson);
                // alert(url2);
                var insideChat = '';
                $.each(parseJSON,function(){
                    // insideChat += "<b>"+this.sender+"</b> : "+this.message +'<i><span class="direct-chat-timestamp float-right">'+this.create_date + "</span></i><br/>";
                    if(session_user == this.sender){
                        insideChat += '<div class="direct-chat-msg left">'+
                        '<div class="direct-chat-infos clearfix">'+
                        '<span class="direct-chat-name float-left" style="color:blue">'+ this.sender+'</span>'+
                        '<span class="direct-chat-timestamp float-right">'+this.create_date+'</span>'+
                    '</div><img class="direct-chat-img" src="<?php echo base_url();?>assets/images/avatar.png" alt="message user image">'+
                    '<div class="direct-chat-text">'+this.message+'</div></div>';
                     
                    }else{
                        insideChat += '<div class="direct-chat-msg right">'+
                        '<div class="direct-chat-infos clearfix">'+
                        '<span class="direct-chat-name float-right" style="color:red">'+ this.sender+'</span>'+
                        '<span class="direct-chat-timestamp float-left">'+this.create_date+'</span>'+
                    '</div><img class="direct-chat-img" src="<?php echo base_url();?>assets/images/avatar.png" alt="message user image">'+
                    '<div class="direct-chat-text">'+this.message+'</div></div>';
                    }
                    
                    $('#chatbox').html(insideChat);
                    // alert(this.sender);
                });
                insideChat +='';
        }
    });
},5000);

// setInterval(
//     function(){
//         // var url2 = BASE_URL + "admin/main/get_chat_user/" + $('#user option:selected').text();

//     $.get(BASE_URL + "admin/main/get_chat_user/" + $('#user option:selected').text(), function(userChatJson){
//         // alert($('#user').val());
//         if(userChatJson !== null){
//                 var parseJSON = JSON.parse(userChatJson);
//                 // alert(url2);
//                 var insideChat = "";
//                 $.each(parseJSON,function(){
//                     insideChat += "<b>"+this.sender+"</b> : "+this.message +'<i><span class="direct-chat-timestamp float-right">'+this.create_date + "</span></i><br/>";
//                     $('#chatbox').html(insideChat);
//                     // alert(this.sender);
//                 });
//         }
//     });
// },500);

</script>