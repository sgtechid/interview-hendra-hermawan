@extends('layouts_admin.app_admin')
@section('styles')
<!-- DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <style>
  .alert-message {
    color: red;
  }
  table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
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
                            <a href="{{ url('/DafarPpdb') }}" class="btn btn-primary mb-3"> <i class="ti-plus"></i>  &nbsp; Tambah Siswa Ppdb</a>   
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
                            <table class="table table-bordered table-hover datatable-basic" style="white-space: nowrap;"> 
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th style="width: 5%">No.</th>
                                        <th style="width: 5%">Print Pdf</th>
                                        <th>Nisn</th>
                                        <th>Nama</th>
                                        <th>tempat Dan Tanggal Lahir</th>
                                        <th>Asal Sekolah</th>
                                        <th style="width: 15%">Alamat Tinggal</th>
                                        <th>Status Siswa</th>
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
        <!-- overview area end -->
    </div>
@endsection
@section('javascripts')
<!-- DataTables -->
<script src="{{url('admin/plugins/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{url('admin/plugins/jquery-ui/interactions.min.js') }}"></script>
<script src="{{url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script> 
@if( $massage = session('success'))
    <script type="text/javascript">
    Swal.fire({
        type: 'success',
        title:  "{{ $massage }}",
        text: 'success',
        timer: 4000,
    })
    </script>   
@endif
@if ( $massage = session('gagal'))
    <script type="text/javascript">
    Swal.fire({
        type: 'error',
        title:  "{{ $massage }}",
        text: 'Gagal',
        timer: 4000,
    })
@endif 
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
        ajax: "{{ route('ppdb.index') }}",
        columns: [
            { "data": null,"sortable": false, 
                render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;
                }  
            },
            {data: 'print_pdf', name: 'print_pdf'},
            {data: 'nisn', name: 'nisn'},
            {data: 'nama', name: 'nama'},
            {data: 'tgllahir', name: 'tgllahir'},
            {data: 'asal_sekolah', name: 'asal_sekolah'},
            {data: 'alamat_tinggal', name: 'alamat_tinggal'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
</script>
@endsection