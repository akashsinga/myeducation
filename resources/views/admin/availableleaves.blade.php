@extends('layouts.admin_dashboard')
@section('title')
Admin | Leaves Available
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">
                        <h4>Leaves Available</h4>
                        <p class="card-category">Leaves information</p>
                    </div>
                </div>
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('failed'))
                <div class="alert alert-danger" role="alert">
                    {{ session('failed') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered dataTable-content" id="example"
                            style="width:100%">
                            <thead class=" text-primary">
                                <th>
                                    Id
                                </th>
                                <th>
                                    Start Date
                                </th>
                                <th>
                                    End Date
                                </th>
                                <th>
                                    Available
                                </th>
                                <th>
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @foreach($leavesavailable as $leave)
                                <tr>
                                    <td>
                                        {{$leave->id}}
                                    </td>
                                    <td>
                                        {{$leave->start_date}}
                                    </td>
                                    <td>
                                        {{$leave->end_date}}
                                    </td>
                                    <td>
                                        {{$leave->available}}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm edit"><i
                                                class="material-icons">edit</i></a>
                                        <a href="#" class="btn btn-danger btn-sm delete"><i
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
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection
