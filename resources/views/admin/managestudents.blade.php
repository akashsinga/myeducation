@extends('./layouts.admin_dashboard')
@section('title')
Admin | Manage Students
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">
                        <h4>View Students</h4>
                        <p class="card-category">Students information</p>
                    </div>
                </div>
                <div class="row ml-auto">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importform">
                        <i class="material-icons">add</i>Import</a>
                    </button>
                    <a href="/admin/students/add" class="btn btn-info btn-sm"><i class="material-icons">add</i>Add</a>
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
                            <thead class="text-primary">
                                <th>
                                    Admno
                                </th>
                                <th>
                                    Student Name
                                </th>
                                <th>
                                    Father's Name
                                </th>
                                <th>
                                    Department
                                </th>
                                <th>
                                    Year
                                </th>
                                <th>
                                    Section
                                </th>
                                <th>
                                    Mobile
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>
                                        {{$student->id}}
                                    </td>
                                    <td>
                                        {{$student->full_name}}
                                    </td>
                                    <td>
                                        {{$student->father_name}}
                                    </td>
                                    <td>
                                        {{$student->name}}
                                    </td>
                                    <td>
                                        {{$student->year}}
                                    </td>
                                    <td>
                                        {{$student->section}}
                                    </td>
                                    <td>
                                        {{$student->mobile}}
                                    </td>
                                    <td>
                                        {{$student->email}}
                                    </td>
                                    <td>
                                        {{$student->address}}
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
                <h5 class="modal-title" id="exampleModalLabel">Import Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/admin/students/import" enctype="multipart/form-data" autocomplete="off"
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
                        <a href="{{url('samples/student_import_sample.xlsx')}}" class="btn btn-info btn-sm">Download
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
<div class="modal fade" id="editstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Student Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/admin/students" autocomplete="off" class="form-horizontal" method="POST"
                    id="edit-form">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <input type="hidden" name="id" id="id">
                    <label class="col-form-label text-dark">Student Name</label>
                    <div class="form-group">
                        <input class="form-control" name="full_name" id="full_name" type="text"
                            placeholder="Student Name" required="true" aria-required="true" />
                    </div>
                    <label class="col-form-label text-dark">Father Name</label>
                    <div class="form-group">
                        <input class="form-control" name="father_name" id="father_name" type="text"
                            placeholder="Father Name" required="true" aria-required="true" />
                    </div>
                    <label class="col-form-label text-dark">Department</label>
                    <div class="form-group">
                        <select class="custom-select" name="department" id="department">
                            @foreach($departments as $department)
                            <option value="{{$department->name}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="col-form-label text-dark">Year</label>
                    <div class="form-group">
                        <select class="custom-select" name="year" id="year">
                            @foreach($years as $year)
                            <option value="{{$year->year}}">{{$year->year}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="col-form-label text-dark">Section</label>
                    <div class="form-group">
                        <select class="custom-select" name="section" id="section">
                            @foreach($sections as $section)
                            <option value="{{$section->section}}">{{$section->section}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="col-form-label text-dark">Mobile</label>
                    <div class="form-group">
                        <input class="form-control" name="mobile" id="mobile" type="text" placeholder="Mobile"
                            required="true" aria-required="true" />
                    </div>
                    <label class="col-form-label text-dark">Email</label>
                    <div class="form-group">
                        <input class="form-control" name="email" id="email" type="text" placeholder="Email"
                            required="true" aria-required="true" />
                    </div>
                    <label class="col-form-label text-dark">Address</label>
                    <div class="form-group">
                        <input class="form-control" name="address" id="address" type="text" placeholder="Address"
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteform" method="post" action="/admin/students">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                </form>
                <p>Are you sure you want to delete this student?</p>
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
            $('#full_name').val(data[1]);
            $('#father_name').val(data[2]);
            $('#department').val(data[3]);
            $('#year').val(data[4]);
            $('#section').val(data[5]);
            $('#mobile').val(data[6]);
            $('#email').val(data[7]);
            $('#address').val(data[8]);

            $('#edit-form').attr('action', '/admin/students/edit/' + data[0]);
            $('#editstudent').modal('show');
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
            $('#deleteform').attr('action', '/admin/students/delete/' + data[0]);
            $('#confirmbox').modal('show');
        });

        $('.deleteconfirm').on('click', function() {
            $('#deleteform').submit();
        });

    });
</script>
@endsection