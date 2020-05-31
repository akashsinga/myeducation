@extends('./layouts.admin_dashboard')
@section('title')
Admin | Manage Subjects
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="button-group ml-auto">
                    <a class="btn btn-info" href="#"><span><i class="material-icons">add</span></i>Add</a>
                    <a class="btn btn-warning" href="#"><span><i class="material-icons">edit</i></span>Edit</a>
                    <a class="btn btn-danger" href="#"><span><i class="material-icons">clear</i></span>Delete</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Subject Code
                                </th>
                                <th>
                                    Subject Name
                                </th>
                                <th>
                                    Subject Department
                                </th>
                                <th>
                                    Subject Year
                                </th>
                                <th>
                                    Credits
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        Dakota Rice
                                    </td>
                                    <td>
                                        Niger
                                    </td>
                                    <td>
                                        Niger
                                    </td>
                                    <td>
                                        Niger
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        Dakota Rice
                                    </td>
                                    <td>
                                        Niger
                                    </td>
                                    <td>
                                        Niger
                                    </td>
                                    <td>
                                        Niger
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        Dakota Rice
                                    </td>
                                    <td>
                                        Niger
                                    </td>
                                    <td>
                                        Niger
                                    </td>
                                    <td>
                                        Niger
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection