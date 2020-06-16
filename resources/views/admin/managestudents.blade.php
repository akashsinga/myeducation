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
                                    Actions
                                </th>
                            </thead>
                        </table>
                    </div>
                </div>
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
                <p>Are you sure you want to delete this student?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-success">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
  <div class="spinner-border" role="status" id="spinner">
    <span class="sr-only">Loading...</span>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "processing": true,
            "language": {
                "processing": "Loading..."
            },
            "serverSide": true,
            "ajax": "{{route('admin.students')}}",
            "columns": [{
                    data: "id"
                },
                {
                    data: "full_name"
                },
                {
                    data: "father_name"
                },
                {
                    data: "name"
                },
                {
                    data: "year"
                },
                {
                    data: "section"
                },
                {
                    data: "mobile"
                },
                {
                    data: "email"
                },
                {
                    data: "action",
                    orderable: false
                },
            ]
        });
    });
</script>
@endsection