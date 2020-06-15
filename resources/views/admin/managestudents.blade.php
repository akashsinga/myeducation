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
                    {{$students->links()}}
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    ID
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
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </thead>
                            <tbody>
                                @foreach($students as $student) <tr>
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
                                        <a href="" type="button" data-toggle="modal" data-target="#editform"
                                            data-id="{{$student->id}}" data-full_name="{{$student->full_name}}"
                                            data-father_name="{{$student->father_name}}" data-department="{{$student->name}}"
                                            data-year="{{$student->year}}" data-section="{{$student->section}}"
                                            data-mobile="{{$student->mobile}}" data-email="{{$student->email}}"
                                            class="btn btn-warning btn-sm">
                                            <i class="material-icons">edit</i></a>
                                    </td>
                                    <td>
                                        <a href="/admin/students/delete/{{$student->id}}"
                                            class="btn btn-danger btn-sm"><i class="material-icons">clear</i></a>
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
<div class="modal fade" id="editform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/admin/students/edit/submit" id="editform" class="form-horizontal"
                    method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <input type="hidden" name="id" value="id" id="id">
                    <input type="hidden" name="type" value="student">
                    <label class="col-form-label">Student Name</label>
                    <input type="text" class="form-control input-text" name="full_name" id="full_name">
                    <label class="col-form-label">Father Name</label>
                    <input type="text" class="form-control input-text" name="father_name" id="father_name">
                    <label class="col-form-label">Department</label>
                    <input type="text" class="form-control input-text" name="department" id="department">
                    <label class="col-form-label">Year</label>
                    <input type="text" class="form-control input-text" name="year" id="year">
                    <label class="col-form-label">Section</label>
                    <input type="text" class="form-control input-text" name="section" id="section">
                    <label class="col-form-label">Mobile</label>
                    <input type="text" class="form-control input-text" name="mobile" id="mobile">
                    <label class="col-form-label">Email</label>
                    <input type="text" class="form-control input-text" name="email" id="email"><label class="col-form-label">Email</label>
                    <input type="text" class="form-control input-text" name="email" id="email">

            </div>
            </div>
            <div class="modal-footer">
                <button type="resets" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>
    </div>
</div>
<div class="modal fade" id="importform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Students</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/admin/students/import/submit" enctype="multipart/form-data"
                    autocomplete="off" class="form-horizontal" method="POST">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <hr>
                    <div class="alert alert-warning" role="alert">
                        Remove the column names before uploading the file
                    </div>
                    <div class="col-8">
                        <label>Select File to Import</label>
                    </div>
                    <div class="col-8">
                        <div class="form-file-simple inputFileVisible">
                            <input type="file" id="importfile" name="importfile">
                        </div>
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
@endsection
@section('scripts')
<script type="text/javascript">
$('#editform').on('show.bs.modal',function(event){
    var button=$(event.relatedTarget)
    var full_name=button.data('full_name')
    var father_name=button.data('father_name')
    var department=button.data('department')
    var year=button.data('year')
    var section=button.data('section')
    var mobile=button.data('mobile')
    var email=button.data('email')

    var modal=$(this)

    modal.find('.modal-title').text('Edit Student Information')
    modal.find('.modal-body #full_name').val(full_name)
    modal.find('.modal-body #father_name').val(father_name)
    modal.find('.modal-body #department').val(department)
    modal.find('.modal-body #year').val(year)
    modal.find('.modal-body #section').val(section)
    modal.find('.modal-body #mobile').val(mobile)
    modal.find('.modal-body #email').val(email)

})
</script>
@endsection