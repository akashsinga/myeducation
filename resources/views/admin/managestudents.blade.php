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
                        <table class="table" id="example">
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
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "{{route('admin.students')}}",
        "columns": [
            {
                data:"id"
            },
            {
                data:"full_name"
            },      
            {
                data:"father_name"
            },
            {
                data:"name"
            },
            {
                data:"year"
            },
            {
                data:"section"
            },
            {
                data:"mobile"
            },       
            {
                data:"email"
            },     
        ]
    } );
} );
</script>
@endsection