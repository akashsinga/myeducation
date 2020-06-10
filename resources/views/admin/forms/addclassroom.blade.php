@extends('layouts.admin_dashboard')
@section('title')
Admin | Add Classroom
@endsection
@section('content')
<div class="col-md-12">
    <form method="post" action="/admin/classroom/add/submit" autocomplete="off" class="form-horizontal">
        {{csrf_field()}}
        {{method_field('POST')}}
        <div class="card ">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Classroom</h4>
                <p class="card-category">Classroom information</p>
            </div>
            <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <div class="col-8">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="custom-select" name="department">
                                    <option value="1">CSE</option>
                                    <option value="2">IT</option>
                                    <option value="3">EIE</option>
                                    <option value="4">ECE</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Year</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="custom-select" name="year">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
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
                        <label class="col-sm-2 col-form-label">Class Teacher</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="class_teacher" id="input-email" type="text"
                                    placeholder="Faculty Name" required="true" aria-required="true" />
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