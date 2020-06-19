@extends('./layouts.admin_dashboard')
@section('title')
Admin | Manage Faculty
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">
                        <h4>View Faculty</h4>
                        <p class="card-category">Faculty information</p>
                    </div>
                </div>
                <div class="row ml-auto">
                    <a href="#" class="btn btn-success btn-sm"><i class="material-icons">add</i>Import</a>
                    <a href="/admin/faculty/add" class="btn btn-info btn-sm"><i class="material-icons">add</i>Add</a>
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
                                    Faculty Name
                                </th>
                                <th>
                                    Department
                                </th>
                                <th>
                                    Designation
                                </th>
                                <th>
                                    Qualification
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
                                @foreach($faculty as $facult)
                                <tr>
                                    <td>
                                        {{$facult->id}}
                                    </td>
                                    <td>
                                        {{$facult->full_name}}
                                    </td>
                                    <td>
                                        {{$facult->name}}
                                    </td>
                                    <td>
                                        {{$facult->designation}}
                                    </td>
                                    <td>
                                        {{$facult->qualification}}
                                    </td>
                                    <td>
                                        {{$facult->mobile}}
                                    </td>
                                    <td>
                                        {{$facult->email}}
                                    </td>
                                    <td>
                                        {{$facult->address}}
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
                <h5 class="modal-title" id="exampleModalLabel">Import Faculty</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/admin/faculty/import/submit" enctype="multipart/form-data"
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
                        <a href="{{url('samples/faculty_import_sample.xlsx')}}" class="btn btn-info btn-sm">Download
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Faculty</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteform" method="post" action="/admin/faculty">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                </form>
                <p>Are you sure you want to delete this faculty?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-success deleteconfirm">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editfaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Faculty</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/admin/faculty" autocomplete="off" class="form-horizontal" method="POST"
                    id="edit-form">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <input type="hidden" name="id" id="id">
                    <label class="col-form-label text-dark">Faculty Name</label>
                    <div class="form-group">
                        <input class="form-control" name="full_name" id="full_name" type="text"
                            placeholder="Student Name" required="true" aria-required="true" />
                    </div>
                    <label class="col-form-label text-dark">Department</label>
                    <div class="form-group">
                        <select class="custom-select" name="department" id="department">
                            @foreach($departments as $department)
                            <option value="{{$department->name}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="col-form-label text-dark">Qualification</label>
                    <div class="form-group">
                        <input class="form-control" name="qualification" id="qualification" type="text"
                            placeholder="Year" required="true" aria-required="true" />
                    </div>
                    <label class="col-form-label text-dark">Designation</label>
                    <div class="form-group">
                        <input class="form-control" name="designation" id="designation" type="text"
                            placeholder="Section" required="true" aria-required="true" />
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
            $('#department').val(data[2]);
            $('#qualification').val(data[3]);
            $('#designation').val(data[4]);
            $('#mobile').val(data[5]);
            $('#email').val(data[6]);
            $('#address').val(data[7]);

            $('#edit-form').attr('action', '/admin/faculty/edit/' + data[0]);
            $('#editfaculty').modal('show');
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
            $('#deleteform').attr('action', '/admin/faculty/delete/' + data[0]);
            $('#confirmbox').modal('show');
        });

        $('.deleteconfirm').on('click', function() {
            $('#deleteform').submit();
        });

    });
</script>
@endsection