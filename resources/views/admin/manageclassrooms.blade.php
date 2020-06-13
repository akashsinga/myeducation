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
                    <a href="#" class="btn btn-success"><i class="material-icons">add</i>Import</a>
                    <a href="/admin/classrooms/add" class="btn btn-info"><i class="material-icons">add</i>Add</a>
                </div>
                <div class="card-body">
                    {{$classrooms->links()}}
                    <div class="table-responsive">
                        <table class="table">
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
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </thead>
                            <tbody>
                                @foreach($classrooms as $classroom)<tr>
                                    <td>
                                        {{$classroom->id}}
                                    </td>
                                    <td>
                                        {{$classroom->name}}
                                    </td>
                                    <td>
                                        {{$classroom->year}}
                                    </td>
                                    <td>
                                        {{$classroom->section}}
                                    </td>
                                    <td>
                                        {{$classroom->full_name}}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning"><i class="material-icons">edit</i>Edit</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger"><i class="material-icons">clear</i>Delete</a>
                                    </td>
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