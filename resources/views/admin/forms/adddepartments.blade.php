@extends('layouts.admin_dashboard')
@section('title')
Admin | Add Department
@endsection
@section('content')
<div class="col-md-12">
    <form method="post" action="/admin/department/add/submit" autocomplete="off" class="form-horizontal">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="hidden" name="type" value="faculty">
        <div class="card ">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Department</h4>
                <p class="card-category">Department information</p>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="col-12">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Department Name</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control" name="department_name" id="input-fname" type="text"
                                    placeholder="Department Name" required="true" aria-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Head Of the Department</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control" name="hod_name" id="input-fname" type="text"
                                    placeholder="Head Of the Department" required="true" aria-required="true" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row col-sm-7">
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="reset" class="btn btn-danger">Clear</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection