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
                    <a href="#" class="btn btn-success"><i class="material-icons">add</i>Import</a>
                    <a href="/admin/students/add" class="btn btn-info"><i class="material-icons">add</i>Add</a>
                    <a href="#" class="btn btn-warning"><i class="material-icons">edit</i>Edit</a>
                    <a href="#" class="btn btn-danger"><i class="material-icons">clear</i>Delete</a>
                </div>
                <div class="card-body">
                    {{$students->links()}}
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