@extends('layouts.admin_dashboard')
@section('title')
Admin | Complaints
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">
                        <h4>Complaints</h4>
                        <p class="card-category">Complaints Registered</p>
                    </div>
                </div>
                <div class="card-body">
                {{$complaints->links()}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Classroom
                                </th>
                                <th>
                                    Student ID
                                </th>
                                <th>
                                    Status
                                </th>
                            </thead>
                            <tbody>
                                @foreach($complaints as $complaint)
                                    <tr>
                                        <td>
                                            {{$complaint->id}}
                                        </td>
                                        <td>
                                            {{$complaint->type}}
                                        </td>
                                        <td>
                                            {{$complaint->description}}
                                        </td>
                                        <td>
                                            {{$complaint->name}} 
                                            {{$complaint->year}}-{{$complaint->section}}
                                        </td>
                                        <td>
                                            {{$complaint->full_name}}
                                        </td>
                                        <td>
                                            {{$complaint->status}}
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