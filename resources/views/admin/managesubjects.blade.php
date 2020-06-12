@extends('./layouts.admin_dashboard')
@section('title')
Admin | Manage Subjects
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">
                        <h4>View Subjects</h4>
                        <p class="card-category">Subjects information</p>
                    </div>
                </div>
                <div class="row ml-auto">
                    <a href="#" class="btn btn-success"><i class="material-icons">add</i>Import</a>
                    <a href="/admin/subjects/add"class="btn btn-info"><i class="material-icons">add</i>Add</a>
                    <a href="#" class="btn btn-warning"><i class="material-icons">edit</i>Edit</a>
                    <a href="#"class="btn btn-danger"><i class="material-icons">clear</i>Delete</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Subject Code
                                </th>
                                <th>
                                    Subject Name
                                </th>
                                <th>
                                    Department
                                </th>                               
                                <th>
                                    Credits
                                </th>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)<tr>
                                    <td>
                                        {{$subject->id}}
                                    </td>
                                    <td>
                                        {{$subject->code}}
                                    </td>
                                    <td>
                                        {{$subject->name}}
                                    </td>
                                    <td>
                                        {{$subject->department}}
                                    </td>
                                    <td>
                                        {[$subject->credits]}
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