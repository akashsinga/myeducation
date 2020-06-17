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
                <h5 class="modal-title" id="exampleModalLabel">Delete Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this department?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-success">Yes</button>
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
            "ajax": "{{route('admin.departments')}}",
            "columns": [{
                    data: "id"
                },
                {
                    data: "name"
                },
                {
                    data: "hod"
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