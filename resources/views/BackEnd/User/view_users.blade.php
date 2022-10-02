@extends('BackEnd.master')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Manage User</h1>
</div>

<!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item active" aria-current="page">Manage User</li>
    </ol>
</nav> -->

<div id="success_message"></div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-6" style="margin-top: 7px;">
                <h6 class="m-0 font-weight-bold" style="font-size: 17px;">User List</h6>
            </div>
            <div class="col-md-6 text-right">
                <a style="background: #FFA601;color:white;" class="btn btn-outline btn-flat btn-sm" data-toggle="modal"
                    data-target="#logoutModals"> <i class="fa fa-plus-circle sm"></i> Add User</a>
                    <button type="button" class="close" style="color: #fff;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
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

                    <!-- @foreach($all_user as $key => $user)
                    <tr id="uid{{ $user->id }}">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->user_role }}</td>

                        <td class="action_btn">
                            <button type="button" class="edit_user btn btn-primary btn-sm">Edit</button>
                            <button type="button" class="delete_user btn btn-primary btn-sm">Delete</button>
                             <a href="https://regevent.fpiaabd.org/view/member/3"
                                class="btn btn-primary btn-circle btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="editUser({{ $user->id }})"
                                class="btn btn-success btn-circle btn-sm">
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
                            </button> -->
                    <!-- </td>
                    </tr>
                    @endforeach -->
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

                <ul id="saveForm_errList"></ul>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="text-input" class=" form-control-label">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
                        <span style="color: red;" class="text-danger">{{ $errors->first('name')  }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email-input" class=" form-control-label">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control">
                        <span style="color: red;" class="text-danger">{{ $errors->first('email')  }}</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="text-input" class=" form-control-label">User Role</label>
                        <input type="text" name="user_role" id="user_role" placeholder="Enter Role"
                            class="form-control">
                        <span style="color: red;" class="text-danger">{{ $errors->first('user_role')  }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email-input" class=" form-control-label">Password</label>
                        <input type="text" name="password" id="password" placeholder="Enter Password"
                            class="form-control">
                        <span style="color: red;" class="text-danger">{{ $errors->first('password')  }}</span>
                    </div>
                </div>

                <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="exampleInputFile">Upload Your Image file</label>
                                    </div>

                                </div>
                            </div>

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <!-- <a onclick="this.closest('form').submit();" class="btn btn-primary">Submit</a> -->
                <input type="submit" value="Submit" class="btn btn-primary add_user" />
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User Form</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <ul id="editForm_errList"></ul>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="hidden" name="edit_id" id="edit_id" placeholder="" class="form-control">
                        <label for="text-input" class=" form-control-label">Name</label>

                        <input type="text" name="name" id="name2" placeholder="Enter Name" class="form-control">
                        <span style="color: red;" class="text-danger">{{ $errors->first('name')  }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email-input" class=" form-control-label">Email</label>
                        <input type="text" name="email" id="email2" placeholder="Enter Email" class="form-control">
                        <span style="color: red;" class="text-danger">{{ $errors->first('email')  }}</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="text-input" class=" form-control-label">User Role</label>
                        <input type="text" name="user_role" id="user_role2" placeholder="Enter Role"
                            class="form-control">
                        <span style="color: red;" class="text-danger">{{ $errors->first('user_role')  }}</span>
                    </div>
                </div>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" value="Update" class="btn btn-primary update_user" />
                </a>
            </div>
        </div>
    </div>
</div>

<!-- test purpose -->




<script>
$(document).ready(function() {

    fetch_user();

    function fetch_user() {
        $.ajax({
            type: 'GET',
            url: "{{ route('user.fetch') }}",
            dataType: "json",
            success: function(response) {
                $('tbody').html("");
                $.each(response.users, function(key, item) {
                    $('tbody').append('<tr>\
                    <td>' + item.name + '</td>\
                    <td>' + item.email + '</td>\
                    <td>' + item.user_role + '</td>\
                    <td><button value="' + item.id + '" type="button" class="edit_user btn btn-primary btn-sm">Edit</button>\
                    <button type="button" class="delete_user btn btn-primary btn-sm">Delete</button></td>\
                    </tr>');
                });
            }
        });
    }

    $(document).on('click', '.add_user', function(e) {
        e.preventDefault();
        var data = {
            'name': $('#name').val(),
            'email': $('#email').val(),
            'password': $('#password').val(),
            'user_role': $('#user_role').val(),
            'image' : $('#image').val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{ route('user.add') }}",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == 400) {
                    $('#saveform_errList').html("");
                    $('#saveform_errList').addClass('alert alert-danger');
                    $.each(response.errors, function(key, err_values) {
                        $('#saveForm_errList').append('<li>' + err_values +
                            '</li>');
                    });
                } else {
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#logoutModals').modal('hide');
                    $('#logoutModals').find('input').val("");
                    fetch_user();
                }
            }
        });
    });

    $(document).on('click', '.edit_user', function(e) {
        e.preventDefault();
        var user_id = $(this).val();
        $('#edit_user').modal('show');
        $.ajax({
            type: 'GET',
            url: "{{route('user.edit')}}",
            data: {
                user_id: user_id
            },
            dataType: "json",
            success: function(response) {
                if (response.status == 404) {
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                } else {
                    $('#name2').val(response.user.name);
                    $('#email2').val(response.user.email);
                    $('#user_role2').val(response.user.user_role);
                    $('#edit_id').val(response.user.id);
                }
            }
        });
    });

    $(document).on('click', '.update_user', function(e) {
        e.preventDefault();
        var user_id = $('#edit_id').val();
        var data = {
            'name': $('#name2').val(),
            'email': $('#email2').val(),
            'user_role': $('#user_role2').val(),
            'user_id': user_id
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'PUT',
            url: "{{ route('user.update') }}",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == 400) {
                    $('#editForm_errList').html("");
                    $('#editForm_errList').addClass('alert alert-danger');
                    $.each(response.errors, function(key, err_values) {
                        $('#editForm_errList').append('<li>' + err_values +
                            '</li>');
                    });
                } else if (response.status == 404) {
                    $('#editForm_errList').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                } else {
                    $('#editForm_errList').html("");
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#edit_user').modal('hide');
                    fetch_user();
                }
            }
        });
    });

});



</script>

@endsection