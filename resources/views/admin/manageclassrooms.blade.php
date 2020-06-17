@extends('./layouts.admin_dashboard')
@section('title')
Admin | Manage Classrooms
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">
                        <h4>View Classrooms</h4>
                        <p class="card-category">Classrooms information</p>
                    </div>
                </div>
                <div class="row ml-auto">
                    <a href="#" class="btn btn-success btn-sm"><i class="material-icons">add</i>Import</a>
                    <a href="/admin/classrooms/add" class="btn btn-info btn-sm"><i class="material-icons">add</i>Add</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered dataTable-content" style="width:100%"
                            id="example">
                            <thead class=" text-primary">
                                <th>
                                    ID
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
                                    Class Teacher
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
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').on('processing.dt', function(e, settings, processing) {
            $('#overlay').css('display', processing ? 'block' : 'none');
        }).DataTable({
            "processing": true,
            "language": {
                "processing": "Loading..."
            },
            "serverSide": true,
            "ajax": "{{route('admin.classrooms')}}",
            "columns": [{
                    data: "id"
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
                    data: "full_name"
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