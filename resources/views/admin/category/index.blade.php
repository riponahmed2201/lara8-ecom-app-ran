@extends('admin.master')

@section('admin_title','Category | index')

@section('custom_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{'assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'}}">
    <link rel="stylesheet" href="{{'assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'}}">
{{--    <link rel="stylesheet" href="{{'assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'}}">--}}
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Category</h3>
                    <a href="{{route('category.create')}}" class="btn btn-outline-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Create Category</a>
                </div>
                @include('admin.includes.message')
                <div class="card-body">
                    <table id="category" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>1</td>
                            <td>{{$category->category_name}}</td>
                            <td>
                                @if($category->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-warning">Inactive</span>
                                @endif
                            </td>
                            <td>
                                @if($category->status == 1)
                                    <a title="Are you want to inactive category status?" href="{{route('category.inactive',$category->id)}}" class="btn btn-sm btn-success btn-xs"><i class="fa fa-arrow-up"></i></a>
                                @else
                                    <a title="Are you want to active category status?" href="{{route('category.active',$category->id)}}" class="btn btn-sm btn-info btn-xs"><i class="fa fa-arrow-down"></i></a>
                                @endif

                                <a href="{{route('category.edit',$category->id)}}" title="Edit Category Name" class="btn btn-outline-info btn-sm"> <i class="fa fa-edit"></i> </a>
                                <a href="{{route('category.destroy',$category->id)}}" title="Delete Category Name" class="btn btn-outline-danger btn-sm"> <i class="fa fa-trash-alt"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('custom_js')

    <!-- DataTables  & Plugins -->
    <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
{{--    <script src="{{asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/admin/plugins/jszip/jszip.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>--}}
{{--    <script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>--}}

    <script>
        $(function () {
            $("#example1").DataTable({

                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": [
                    "copy",
                    "csv",
                    "excel",
                    "pdf",
                    "print",
                    "colvis"
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('#category').DataTable({
                // "paging": true,
                // "lengthChange": false,
                // "searching": false,
                // "ordering": true,
                // "info": true,
                // "autoWidth": false,
                // "responsive": true,
            });
        });
    </script>
@endsection
