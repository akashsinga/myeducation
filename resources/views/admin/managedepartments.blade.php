@extends('./layouts.admin_dashboard')
@section('title')
Admin | Manage Departments
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">
                        <h4>View Departments</h4>
                        <p class="card-category">Departments information</p>
                    </div>
                </div>
                <div class="row ml-auto">
                    <a href="#" class="btn btn-success btn-sm"><i class="material-icons">add</i>Import</a>
                    <a href="/admin/departments/add" class="btn btn-info btn-sm"><i
                            class="material-icons">add</i>Add</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert" id="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('failed'))
                    <div class="alert alert-danger" role="alert" id="alert">
                        {{ session('failed') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger" id="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered dataTable-content" style="width:100%"
                            id="example">
                            <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Department Name
                                </th>
                                <th>
                                    Head Of Department
                                </th>
                                <th>
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                                <tr>
                                    <td>
                                        {{$department->id}}
                                    </td>
                                    <td>
                                        {{$department->name}}
                                    </td>
                                    <td>
                                        {{$department->full_name}}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm edit"><i
                                                class="material-icons">edit</i></a>
                                        <a href="#" class="btn btn-danger btn-sm delete"><i
                                                class="material-icons">clear</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="importform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Departments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/admin/departments/import/submit" enctype="multipart/form-data"
                    autocomplete="off" class="form-horizontal" method="POST">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <hr>
                    <div class="alert alert-warning" role="alert">
                        Remove the column names while uploading the file
                    </div>
                    <div class="col-8">
                        <label>Select File to Import</label>
                    </div>
                    <div class="col-8">
                        <div class="form-file-simple inputFileVisible">
                            <input type="file" id="importfile" name="importfile">
                        </div>
                    </div>
                    <div class="col-8">
                        <a href="{{url('samples/department_import_sample.xlsx')}}" class="btn btn-info btn-sm">Download
                            Sample</a>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="resets" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="confirmbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteform" method="post" action="/admin/departments">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                </form>
                <p>Are you sure you want to delete this department?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-success deleteconfirm">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editdepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/admin/departments" autocomplete="off" class="form-horizontal" method="POST"
                    id="edit-form">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <input type="hidden" name="id" id="id">
                    <label class="col-form-label text-dark">Department Name</label>
                    <div class="form-group">
                        <input class="form-control" name="name" id="department_name" type="text"
                            placeholder="Department Name" required="true" aria-required="true" />
                    </div>
                    <label class="col-form-label text-dark">Head of the Department</label>
                    <div class="form-group">
                        <input class="form-control" name="hod" id="hod_name" type="text"
                            placeholder="Head Of the Department" required="true" aria-required="true" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Clear</button>
                <button type="button" class="btn btn-success update">Update</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        var table = $('#example').DataTable();
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }
            var data = table.row($tr).data();
            $('#department_name').val(data[1]);
            $('#hod_name').val(data[2]);

            $('#edit-form').attr('action', '/admin/departments/edit/' + data[0]);
            $('#editdepartment').modal('show');
        });

        $('.update').on('click', function() {
            $('#edit-form').submit();
        });

        table.on('click', '.delete', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }
            var data = table.row($tr).data();
            $('#deleteform').attr('action', '/admin/departments/delete/' + data[0]);
            $('#confirmbox').modal('show');
        });

        $('.deleteconfirm').on('click', function() {
            $('#deleteform').submit();
        });

    });
</script>
@endsection