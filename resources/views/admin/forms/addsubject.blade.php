@extends('layouts.admin_dashboard')
@section('title')
Admin | Add Subject
@endsection
@section('content')
<div class="col-md-12">
    <form method="post" action="#" autocomplete="off" class="form-horizontal">
        <div class="card ">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Subject</h4>
                <p class="card-category">Subject information</p>
            </div>
            <div class="card-body">
                <div class="col-8">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Subject Code</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="subject_code" id="input-subject_code" type="text"
                                    placeholder="Subject Code" required="true" aria-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Subject Name</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="sname" id="input-sname" type="text"
                                    placeholder="Subject Name" required="true" aria-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="custom-select">
                                    <option>CSE</option>
                                    <option>IT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Credits</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="credits" id="input-credits" type="text"
                                    placeholder="Credits" required="true" aria-required="true" />
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