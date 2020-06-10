@extends('layouts.admin_dashboard')
@section('title')
Admin | Add Classroom
@endsection
@section('content')
<div class="col-md-12">
    <form method="post" action="#" autocomplete="off" class="form-horizontal">
        <div class="card ">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Classroom</h4>
                <p class="card-category">Classroom information</p>
            </div>
            <div class="card-body">
                <div class="col-8">
                    <div class="row">
                    <label class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="custom-select">
                                    <option>CSE</option>
                                    <option>IT</option>
                                    <option>EIE</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Year</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="custom-select">
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
                                <select class="custom-select">
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
                                <input class="form-control" name="email" id="input-email" type="text"
                                    placeholder="Faculty Name" required="true" aria-required="true" />
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