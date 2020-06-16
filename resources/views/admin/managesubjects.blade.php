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
                    <a href="#" class="btn btn-success btn-sm"><i class="material-icons">add</i>Import</a>
                    <a href="/admin/subjects/add" class="btn btn-info btn-sm"><i class="material-icons">add</i>Add</a>
                </div>
                <div class="card-body">
                    {{$subjects->links()}}
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
                                <th class="text-center">
                                    Actions
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
                                        {{$subject->Dept_name}}
                                    </td>
                                    <td>
                                        {{$subject->credits}}
                                    </td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-warning btn-sm"><i
                                                class="material-icons">edit</i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i
                                                class="material-icons">clear</i></a>
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