@extends('layouts.admin_dashboard')
@section('title')
Admin | Leave Applications
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">
                        <h4>Leave Applications</h4>
                        <p class="card-category">Application information</p>
                    </div>
                </div>
                <div class="card-body">
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
                                    Start Date
                                </th>
                                <th>
                                    End Date
                                </th>
                                <th>
                                    Reason
                                </th>
                                <th>
                                    No Of Days
                                </th>
                                <th>
                                    Leave Type
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @if(count($leaves)==0)
                                <div class="alert alert-success" role="alert">
                                    No Pending Leave Applications
                                </div>
                                @endif
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                @foreach($leaves as $leave)
                                @php $i=1 ;@endphp
                                <tr>
                                    <td>
                                        @php echo $i++; @endphp
                                    </td>
                                    <td>
                                        {{$leave->faculty_name}}
                                    </td>
                                    <td>
                                        {{$leave->department_name}}
                                    </td>
                                    <td>
                                        {{$leave->start_date}}
                                    </td>
                                    <td>
                                        {{$leave->end_date}}
                                    </td>
                                    <td>
                                        {{$leave->reason}}
                                    </td>
                                    <td>
                                        {{$leave->no_days}}
                                    </td>
                                    <td>
                                        {{$leave->leave_type}}
                                    </td>
                                    <td>
                                        {{$leave->status}}
                                    </td>
                                    <td>
                                        <div class="row ml-auto">
                                            <a href="/admin/leaves/approve/{{$leave->id}}"
                                                class="btn btn-success btn-sm"><i
                                                    class="material-icons">done</i>Approve</a>
                                            <a href="/admin/leaves/reject/{{$leave->id}}"
                                                class="btn btn-danger btn-sm"><i
                                                    class="material-icons">clear</i>Reject</a>
                                        </div>
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