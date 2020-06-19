@extends('./layouts.admin_dashboard')
@section('title')
Admin | Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">person</i>
                </div>
                <p class="card-category">Students</p>
                <h3 class="card-title">{{$student_count}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="/admin/students">View Details</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">person</i>
                </div>
                <p class="card-category">Faculty</p>
                <h3 class="card-title">{{$faculty_count}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="/admin/faculty">View Details</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                </div>
                <p class="card-category">Complaints</p>
                <h3 class="card-title">{{$complaint_count}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="/admin/complaints">View Details</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">airplay</i>
                </div>
                <p class="card-category">Classrooms</p>
                <h3 class="card-title">{{$classroom_count}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="/admin/classrooms">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-success">
                <div class="card-title">
                    <h4>Upcoming Events</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead class="text-primary">
                            <th>
                                Event Name
                            </th>
                            <th>
                                Start Date
                            </th>
                            <th>
                                End Date
                            </th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="/admin/schedule">View Details</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">pending</i>
                    </div>
                    <p class="card-category">Pending Leave Applications</p>
                    <h3 class="card-title">{{$leave_count}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="/admin/leaves/applications">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header card-header-warning">
                    <div class="card-title">
                        <h4>Faculty Substitutions</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>
                                    Faculty ID
                                </th>
                                <th>
                                    Faculty Name
                                </th>
                                <th>
                                    Actions
                                </th>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="/admin/faculty/substitutions">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection