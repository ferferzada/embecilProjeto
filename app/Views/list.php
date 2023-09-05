<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>

    <title>Teste</title>
</head>
<body>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <h3>SEI LÁ</h3>
            </div>
            <div class="col-lg-2">
                <button type="button" class='btn btn-primary' data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add new User
                </button>
            </div>
        </div>

        <table class='table table-bordered table-stripped' id="userTable">
                   <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th width='280px'>action</th>
                        </tr>

                   </thead> 
                   <tbody>
                    <?php
                    foreach($user_detail as $user){
                        ?>
                    <tr id ="<?php echo $user['id_user']; ?>">
                        <td><?php echo $user['fname_user']; ?></td>
                        <td><?php echo $user['lname_user']; ?></td>
                        <td><?php echo $user['email_user']; ?></td>
                        <td>
                            <a data-id="<?php echo $user['id_user']?>"  class='btn btn-primary btnEdit'>Edit</a>
                            <a data-id="<?php echo $user['id_user']?>" class='btn btn-danger btnDelete'>Delete</a>
                        </td>
                    </td>
                    <?php
                    }
                    ?>
                   </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('user/store')  ?>" method="post" name='addUser' id='addUser'>
            <div class="modal-body">
                <div class="form-group">
                    <label for="txtFirstName">First Name:</label>
                    <input type="text" class='form-control' id='txtFirstName' placeholder="Enter First Name" name='txtFirstName'>
                </div>
                <div class="form-group">
                    <label for="txtLastName">Last Name:</label>
                    <input type="text" class='form-control' id='txtLastName' placeholder="Enter Last Name" name='txtLastName'>
                </div>
                <div class="form-group">
                    <label for="txtEmail">Email:</label>
                    <input type="text" class='form-control' id='txtEmail' placeholder="Enter Email" name='txtEmail'>
                </div>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>


</body>
</html>
<script>
    $(document).ready(function (){
        $('#userTable').DataTable();
        $("#addUser").validate({
        rules: {
            txtFirstName: "required",
            txtLastName: "required",
            txtEmail: "required"
        },
        messages: {
        },

        submitHandler:function(form){
            var form_action = $("#addUser").attr("action");
            $.ajax({
                data: $('#addUser').serialize(),
                url: form_action,
                type: "POST",
                dataType: 'json',
                success: function(res){
                    $('#addUser')[0].reset();
                    location.reload();
                },error:function(data){

                }
            });
        }
    });
    $('.btnEdit').click(function(){
        id = jQuery(this).attr('data-id');
        console.log(id)
    })
});
</script>