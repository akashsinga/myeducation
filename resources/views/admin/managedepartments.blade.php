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
                </div>
                <div class="card-body">
                    {{$departments->links()}}
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
                                <th>
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)<tr>
                                    <td>
                                        {{$department->id}}
                                    </td>
                                    <td>
                                        {{$department->name}}
                                    </td>
                                    <td>
                                        {{$department->hod}}
                                    </td>
                                    <td>
                                        <a href="/admin/departments/edit/{{$department->id}}"
                                            class="btn btn-warning btn-sm"><i class="material-icons">edit</i></a>
                                        <a href="/admin/departments/delete/{{$department->id}}"
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
@endsection