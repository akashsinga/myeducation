@extends('layouts.admin_dashboard')
@section('title')
Admin | Add Student
@endsection
@section('content')
<div class="col-md-12">
    <form method="post" action="#" autocomplete="off" class="form-horizontal">
        <input type="hidden" name="type" value="student">
        <div class="card ">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Student</h4>
                <p class="card-category">Student information</p>
            </div>
            <div class="card-body">
                <div class="col-8">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Student Name</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="full_name" id="input-name" type="text"
                                    placeholder="Student Name" required="true" aria-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Father's Name</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="father_name" id="input-fname" type="text"
                                    placeholder="Father's Name" required="true" aria-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="custom-select">
                                    <option value="1">CSE</option>
                                    <option value="2">IT</option>
                                    <option value="3">EIE</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Year</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="custom-select" name="year">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Section</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="custom-select" name="section">
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="mobile" id="input-mobile" type="text"
                                    placeholder="Mobile" required="true" aria-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="email" id="input-email" type="email"
                                    placeholder="Email" required="true" aria-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea class="form-control" name="address" id="input-email" placeholder="Address"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row col-sm-7">
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="submit" class="btn btn-danger">Clear</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection