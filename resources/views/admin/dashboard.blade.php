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
                <h3 class="card-title">233</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="#pablo">View Details</a>
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
                <h3 class="card-title">233</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="#pablo">View Details</a>
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
                <h3 class="card-title">75</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="#pablo">View Details</a>
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
                <h3 class="card-title">245</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div id="calendar"></div>
</div>
@endsection