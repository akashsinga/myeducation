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
                    <a href="#" class="btn btn-success"><i class="material-icons">add</i>Import</a>
                    <a href="/admin/departments/add" class="btn btn-info"><i class="material-icons">add</i>Add</a>
                    <a href="#" class="btn btn-warning"><i class="material-icons">edit</i>Edit</a>
                    <a href="#" class="btn btn-danger"><i class="material-icons">clear</i>Delete</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
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
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <=10; $i++) <tr>
                                    <td>
                                        {{$i}}
                                    </td>
                                    <td>
                                        Department {{$i}}
                                    </td>
                                    <td>
                                        Faculty {{$i}}
                                    </td>
                                    </tr>
                                    @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection