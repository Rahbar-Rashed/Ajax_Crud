@extends('BackEnd.master')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage User</h1>

</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-6">
                <h6 class="m-0 font-weight-bold text-primary">User List</h6>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#logoutModals"> <i
                        class="fa fa-plus-circle sm"></i> Add User</a>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable user_table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
                <tbody>

                    @foreach($all_user as $key => $user)
                    <tr id="uid{{ $user->id }}">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->user_role }}</td>

                        <td class="action_btn">

                            <a href="https://regevent.fpiaabd.org/view/member/3"
                                class="btn btn-primary btn-circle btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="editUser({{ $user->id }})" class="btn btn-success btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>


                            <a href="https://regevent.fpiaabd.org/generate/invitecode/3"
                                class="btn btn-success btn-circle btn-sm">
                                <button class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-sign"></i>
                                </button>
                            </a>
                            <button class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="logoutModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User Form</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add_user">
                    <!-- <input type="hidden" name="_token" value="v9S5yO8VZ0FTPWog3fPrwXo0sy3l1TphOMpTcYYk">
                     -->
                     @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="text-input" class=" form-control-label">Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
                                <span style="color: red;" class="text-danger">{{ $errors->first('name')  }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email-input" class=" form-control-label">Email</label>
                                <input type="text" name="email" id="email" placeholder="Enter Email"
                                    class="form-control">
                                <span style="color: red;" class="text-danger">{{ $errors->first('email')  }}</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="text-input" class=" form-control-label">User Role</label>
                                <input type="text" name="user_role" id="user_role" placeholder="Enter Role" class="form-control">
                                <span style="color: red;" class="text-danger">{{ $errors->first('user_role')  }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email-input" class=" form-control-label">Password</label>
                                <input type="text" name="password" id="password" placeholder="Enter Password"
                                    class="form-control">
                                <span style="color: red;" class="text-danger">{{ $errors->first('password')  }}</span>
                            </div>
                        </div>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <!-- <a onclick="this.closest('form').submit();" class="btn btn-primary">Submit</a> -->
                        <input type ="submit" value="Submit" class="btn btn-primary" />
                        </a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logoutModalss" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User Form</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_user">
                    <!-- <input type="hidden" name="_token" value="v9S5yO8VZ0FTPWog3fPrwXo0sy3l1TphOMpTcYYk">
                     -->
                     @csrf
                     <input type="hidden" id="id" name = "id" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="text-input" class=" form-control-label">Name</label>
                                <input type="text" name="name" id="name2" placeholder="Enter Name" class="form-control">
                                <span style="color: red;" class="text-danger">{{ $errors->first('name')  }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email-input" class=" form-control-label">Email</label>
                                <input type="text" name="email2" id="email" placeholder="Enter Email"
                                    class="form-control">
                                <span style="color: red;" class="text-danger">{{ $errors->first('email')  }}</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="text-input" class=" form-control-label">User Role</label>
                                <input type="text" name="user_role2" id="user_role" placeholder="Enter Role" class="form-control">
                                <span style="color: red;" class="text-danger">{{ $errors->first('user_role')  }}</span>
                            </div>                            
                        </div>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <!-- <a onclick="this.closest('form').submit();" class="btn btn-primary">Submit</a> -->
                        <input type ="submit" value="Submit" class="btn btn-primary" />
                        </a>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // $(document).on("click", ".addeventmore", function(){
 	// 	var date = $('#date').val();
 	// 	var invoice_no = $('#invoice_no').val();		
 	// 	var category_id = $('#category_id').val();
 	// 	var category_name = $('#category_id').find('option:selected').text();
 	// 	var product_id = $('#product_id').val();
 	// 	var product_name = $('#product_id').find('option:selected').text();


    $(document).on('submit','#add_user', function(e){
        e.preventDefault();
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var user_role = $('#user_role').val();
        var _token = $('input[name=_token]').val();

        $.ajax({
            url: "{{ route('user.add') }}",
            type: "POST",
            data:{
                name: name,
                email: email,
                password: password,
                user_role: user_role,
                _token: _token
            },
            success: function(response){
                if(response){
                    $('#user_table tbody').prepend('<tr><td>'+response.name+'</td><td>'+response.email+'</td><td>'+response.user_role+'</td></tr>');
                    $('#add_user')[0].reset();
                    $('#logoutModals').modal('hide');
                }
            }
        });
    });    
</script>

<script>
    function editUser($id){
        // $.get('/data/' + id, function(user){
            // alert('hi');
            // $("#id").val(student.id);
            // $("#name").val(student.name);
            // $("#email").val(student.email);
            // $("#user_role").val(student.user_role);
            // $("#logoutModalss").modal('toggle');
        // });
         $.get('/data',function(){

        });
    }
</script>



@endsection