@extends('layouts.admin_dashboard')
@section('title')
Admin | Add Student
@endsection
@section('content')
<div class="col-md-12">
    <form method="post" action="#" autocomplete="off" class="form-horizontal">
        <div class="card ">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Student</h4>
                <p class="card-category">Student information</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-sm-2 col-form-label">Admission Number</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control" name="admno" id="input-admno" type="text" placeholder="Admission Number"
                                required="true" aria-required="true" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Roll Number</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control" name="rollno" id="input-rollno" type="text" placeholder="Roll Number"
                                required="true" aria-required="true" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Student Name</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control" name="name" id="input-name" type="text" placeholder="Student Name"
                                required="true" aria-required="true" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Father's Name</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control" name="fname" id="input-fname" type="text" placeholder="Father's Name"
                                required="true" aria-required="true" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Mobile</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control" name="mobile" id="input-mobile" type="text" placeholder="Mobile"
                                required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control" name="email" id="input-email" type="email" placeholder="Email"
                                required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control" name="address" id="input-email" type="text" placeholder="Address"
                                required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">Add</button>
                <button type="submit" class="btn btn-danger">Clear</button>
            </div>
        </div>
    </form>
</div>
@endsection