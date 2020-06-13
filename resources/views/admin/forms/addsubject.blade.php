@extends('layouts.admin_dashboard')
@section('title')
Admin | Add Subject
@endsection
@section('content')
<div class="col-md-12">
    <form method="post" action="/admin/subject/add/submit" autocomplete="off" class="form-horizontal">
        {{csrf_field()}}
        {{method_field('POST')}}
        <div class="card ">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Subject</h4>
                <p class="card-category">Subject information</p>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
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
                                <select class="custom-select" name="dept">
                                    <option value="1">CSE</option>
                                    <option value="2">IT</option>
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