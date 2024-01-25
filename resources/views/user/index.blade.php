@extends('layouts_admin.app_admin')
@section('styles')
<!-- DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <style>

        .select2-hidden-accessible {
            border: 0 !important;
            clip: rect(0 0 0 0) !important;
            height: 1px !important;
            margin: -1px !important;
            overflow: hidden !important;
            padding: 0 !important;
            position: absolute !important;
            width: 1px !important
        }

      

        .select2-container--default .select2-selection--single,
        .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0;
            padding: 6px 12px;
            height: 34px
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 28px;
            user-select: none;
            -webkit-user-select: none
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-right: 10px
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 0;
            padding-right: 0;
            height: auto;
            margin-top: -3px
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 28px
        }

        .select2-container--default .select2-selection--single,
        .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0 !important;
            padding: 6px 12px;
            height: 40px !important
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 6px !important;
            right: 1px;
            width: 20px
        }
</style>
@endsection
@section('content_admin')
    <div class="main-content-inner">
        <!-- sales report area start -->
        <div class="sales-report-area mt-5 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (session()->get('level') == 1)
                            <button type="button" class="btn btn-primary mb-3" href="javascript:void(0)" id="createNewUser"> <i class="ti-plus"></i>  &nbsp; Tambah User
                            </button>   
                        @endif   
                        @if(count($errors) > 0 )
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul class="p-0 m-0" style="list-style: none;">
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-basic" width="100%">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th style="width: 5%">No.</th>
                                        <th>Username</th>
                                        <th width="380px">Nama User</th>
                                        <th>Level</th>
                                        <th>status</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal Tambah-->
                     <div class="modal fade" id="ajaxModel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modelHeading"></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                    <span aria-hidden="true">&times;</span>
                                    <form id="ItemForm" name="ItemForm" class="form-horizontal">
                                    <input type="hidden" name="id" id="id">
                                        <div class="form-group{{$errors->has('nama') ? ' has-error' : ''}}">
                                            <label for="nama" class="col-lg-4 control-label">Nama Lengkap</label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Username" maxlength="50" required="" value="{{old('nama')}}">
                                                @if($errors->has('nama'))
                                                    <span class="help-block">{{$errors->first('nama')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{$errors->has('user') ? ' has-error' : ''}}">
                                            <label for="user" class="col-lg-3 control-label">User</label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" id="user" name="user" placeholder="Enter Username" maxlength="50" required="" value="{{old('user')}}">
                                                @if($errors->has('user'))
                                                    <span class="help-block">{{$errors->first('user')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{$errors->has('Password') ? ' has-error' : ''}}">
                                            <label for="password" class="col-lg-3 control-label">Password</label>
                                            <span class="error"><?php echo $errors->first('password') ?></span>
                                            <div class="col-lg-12">
                                                <div class="input-group mb-3">
                                                    <input type="password" id="password" class="form-control " name="password" placeholder="Masukan Password">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                        <span id="show-password" class="fa fa-eye"></span>
                                                        </div>
                                                    </div> 
                                                    @if($errors->has('password'))
                                                <span class="help-block">{{$errors->first('password')}}</span>
                                                @endif
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="form-group{{$errors->has('status') ? ' has-error' : ''}}">
                                            <label for="status" class="col-lg-3 control-label">Status<sup style="color: red">*</sup></label>
                                            <div class="col-lg-12">
                                                <select class="form-control form-control-lg" id="status" name="status" required>
                                                <option value="">Pilih</option>
                                                    <option value="1">Aktif</option>
                                                    <option value="2">Tidak Aktif</option>
                                                </select>
                                                @if($errors->has('status'))
                                                    <span class="alert-message">{{$errors->first('status')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{$errors->has('level') ? ' has-error' : ''}}">
                                            <label for="level" class="col-lg-3 control-label">Level<sup style="color: red">*</sup></label>
                                            <div class="col-lg-12">
                                                <select class="form-control form-control-lg" id="level" name="level" required>
                                                <option value="">Pilih</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">User</option>
                                                </select>
                                                @if($errors->has('level'))
                                                    <span class="alert-message">{{$errors->first('level')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">&times;Close</button>
                                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create"><i class="fas fa-database"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>   
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <!-- overview area end -->
    </div>
@endsection
@section('javascripts')
<!-- DataTables -->
<script src="{{url('admin/plugins/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{url('admin/plugins/jquery-ui/interactions.min.js') }}"></script>
<script src="{{url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<script>

    $('#show-password').click(function() {
      if ($(this).hasClass('fa-eye')) {
        $('#password').attr('type', 'text');
        $(this).removeClass('fa-eye');
        $(this).addClass('fa-eye-slash');
      } else {
        $('#password').attr('type', 'password');
        $(this).removeClass('fa-eye-slash');
        $(this).addClass('fa-eye');
      }
    })
    $('#confirmed-password').click(function() {
      if ($(this).hasClass('fa-eye')) {
        $('#confirmed').attr('type', 'text');
        $(this).removeClass('fa-eye');
        $(this).addClass('fa-eye-slash');
      } else {
        $('#confirmed').attr('type', 'password');
        $(this).removeClass('fa-eye-slash');
        $(this).addClass('fa-eye');
      }
    })
  </script>
<script type="text/javascript">
  $(function () {
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    var table = $('.datatable-basic').DataTable({
        processing: true,
        serverSide: true,
        language: {
            processing: '<span>Harap Menunggu...<i class="fa fa-spinner fa-spin fa-fw"></i></span>',
            lengthMenu: "_MENU_ data per halaman",
            sSearch: "Cari:",
            info : "Total data : _MAX_",
        },
        ajax: "{{ route('user.index') }}",
        columns: [
            { "data": null,"sortable": false, 
                render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;
                }  
            },
            {data: 'user', name: 'user'},
            {data: 'nama', name: 'nama'},
            {data: 'level', name: 'level'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
    $('#createNewUser').click(function () {
        $('#saveBtn').val("create-user");
        $('#id').val('');
        $('#ItemForm').trigger("reset");
        $('#modelHeading').html("Tambah Data");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editItem', function () {
      var user_id = $(this).data('id');
      $.get("{{ route('user.index') }}" +'/' + user_id +'/edit', function (data) {
          $('#modelHeading').html("Edit User");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#user').val(data.user);
          $('#nama').val(data.nama);
          $('#status').val(data.status);
          $('#password').val(data.password);
          $('#level').val(data.level);
      })
   });
   $('body').on('click', '.showItem', function () {
      var user_id = $(this).data('id');
      $.get("{{ route('user.index') }}" +'/' + user_id +'/edit', function (data) {
          $('#modelHeading').html("Show User");
          $('#saveBtn').val("show-user");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#user').val(data.user);
          $('#nama').val(data.nama);
          $('#status').val(data.status);
          $('#password').val(data.password);
         
      })
      $('#saveBtn').modal('hide');
   });
   $(document).ready(function() {
        $('#status').select2({
            // closeOnSelect: false,
            // theme: "classic",
            width: '100%',
            allowClear: true
        });
        $('#level').select2({
            // closeOnSelect: false,
            // theme: "classic",
            width: '100%',
            allowClear: true
        });
    });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
          data: $('#ItemForm').serialize(),
          url: "{{ route('user.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            console.log('cek:', data);
            if($.isEmptyObject(data.error)){
              $('#ItemForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              swal("Data User Berhasil Di Simpan", data.message, "success");
              table.draw();
            }else{
              swal("Harap Cek inputan Data", data.message, "error");
                printErrorMsg(data.error);
            }
          },
          error: function (data) {
              console.log('Error:', data);
              swal("Harap Cek inputan Data", data.message, "error");
              printErrorMsg(data.error);
              $('#saveBtn').html('Save Changes');
          }
      });
    });

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
    $('body').on('click', '.deleteItem', function () {

      var user_id = $(this).data("id");
      swal({
            title: "Delete?",
            text: "Yakin Mau Delete ?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yakin",
            cancelButtonText: "Tidak!",
            reverseButtons: !0
        }).then(function (e) {
          if (e.value === true) {
            $.ajax({
                type: "DELETE",
                url: "{{ route('user.store') }}"+'/'+user_id,
                success: function (data) {
                  $('#ItemForm').trigger("reset");
                  $('#ajaxModel').modal('hide');
                  swal("Data User Berhasil Di Delete!", data.message, "success");
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
              });
          } else {
                e.dismiss;
            }  
        }, function (dismiss) {
          return false;
      })
    });
     
  });
</script>
@endsection