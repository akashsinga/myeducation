@extends('./layouts.admin_dashboard')
@section('title')
Admin | Manage Subjects
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">
                        <h4>View Subjects</h4>
                        <p class="card-category">Subjects information</p>
                    </div>
                </div>
                <div class="row ml-auto">
                    <a href="#" class="btn btn-success btn-sm"><i class="material-icons">add</i>Import</a>
                    <a href="/admin/subjects/add" class="btn btn-info btn-sm"><i class="material-icons">add</i>Add</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('failed'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('failed') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
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
                                    Subject Code
                                </th>
                                <th>
                                    Subject Name
                                </th>
                                <th>
                                    Department
                                </th>
                                <th>
                                    Credits
                                </th>
                                <th class="text-right">
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                <tr>
                                    <td>
                                        {{$subject->id}}
                                    </td>
                                    <td>
                                        {{$subject->code}}
                                    </td>
                                    <td>
                                        {{$subject->name}}
                                    </td>
                                    <td>
                                        {{$subject->name}}
                                    </td>
                                    <td>
                                        {{$subject->Dept_name}}
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
                <h5 class="modal-title" id="exampleModalLabel">Import Subjects</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/admin/subjects/import" enctype="multipart/form-data" autocomplete="off"
                    class="form-horizontal" method="POST">
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
                        <a href="{{url('samples/subject_import_sample.xlsx')}}" class="btn btn-info btn-sm">Download
                            Sample</a>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="resets" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Import</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editsubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/admin/subjects" autocomplete="off" class="form-horizontal" method="POST"
                    id="edit-form">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <input type="hidden" name="id" id="id">
                    <label class="col-form-label text-dark">Subject Code</label>
                    <div class="form-group">
                        <input class="form-control" name="subject_code" id="subject_code" type="text"
                            placeholder="Student Name" required="true" aria-required="true" />
                    </div>
                    <label class="col-form-label text-dark">Subject Name</label>
                    <div class="form-group">
                        <input class="form-control" name="sname" id="sname" type="text" placeholder="Father Name"
                            required="true" aria-required="true" />
                    </div>
                    <label class="col-form-label text-dark">Department</label>
                    <div class="form-group">
                        <input class="form-control" name="dept" id="dept" type="text" placeholder="Department"
                            required="true" aria-required="true" />
                    </div>
                    <label class="col-form-label text-dark">Credits</label>
                    <div class="form-group">
                        <input class="form-control" name="credits" id="credits" type="text" placeholder="Address"
                            required="true" aria-required="true" />
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
<div class="modal fade" id="confirmbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteform" method="post" action="/admin/subjects">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                </form>
                <p>Are you sure you want to delete this subject?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-success deleteconfirm" id="delete">Yes</button>
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
            $('#subject_code').val(data[1]);
            $('#sname').val(data[2]);
            $('#department').val(data[3]);
            $('#credits').val(data[4]);

            $('#edit-form').attr('action', '/admin/subjects/edit/' + data[0]);
            $('#editsubject').modal('show');
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
            $('#deleteform').attr('action', '/admin/subjects/delete/' + data[0]);
            $('#confirmbox').modal('show');
        });

        $('.deleteconfirm').on('click', function() {
            $('#deleteform').submit();
        });

    });
</script>
@endsection