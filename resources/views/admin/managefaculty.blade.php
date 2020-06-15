@extends('./layouts.admin_dashboard')
@section('title')
Admin | Manage Faculty
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">
                        <h4>View Faculty</h4>
                        <p class="card-category">Faculty information</p>
                    </div>
                </div>
                <div class="row ml-auto">
                    <a href="#" class="btn btn-success"><i class="material-icons">add</i>Import</a>
                    <a href="/admin/faculty/add" class="btn btn-info"><i class="material-icons">add</i>Add</a>
                </div>
                <div class="card-body">
                    {{$faculty->links()}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Faculty Name
                                </th>
                                <th>
                                    Department
                                </th>
                                <th>
                                    Designation
                                </th>
                                <th>
                                    Qualification
                                </th>
                                <th>
                                    Mobile
                                </th>
                                <th>
                                    Email
                                </th>
                                <th class="text-right">
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @foreach($faculty as $facult)<tr>
                                    <td>
                                        {{$facult->id}}
                                    </td>
                                    <td>
                                        {{$facult->full_name}}
                                    </td>
                                    <td>
                                        {{$facult->name}}
                                    </td>
                                    <td>
                                        {{$facult->designation}}
                                    </td>
                                    <td>
                                        {{$facult->qualification}}
                                    </td>
                                    <td>
                                        {{$facult->mobile}}
                                    </td>
                                    <td>
                                        {{$facult->email}}
                                    </td>
                                    <td class="text-right">
                                        <a href="/admin/faculty/edit/{{$facult->id}}" class="btn btn-warning btn-sm"><i
                                                class="material-icons">edit</i></a>
                                        <a href="/admin/faculty/delete/{{$facult->id}}" class="btn btn-danger btn-sm"><i
                                                class="material-icons">clear</i></a>
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