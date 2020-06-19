@extends('./layouts.admin_dashboard')
@section('title')
Admin | Classroom
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">
                        <h4>{{$department}}-{{$classroom->year}}-{{$classroom->section}}</h4>
                        <p class="card-category">Classroom information</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h4>Class Teacher: {{$classteacher}}</h4>
                        </div>
                        <div class="col-6 text-right">
                            <h4>Total Strength: @php echo count($students);@endphp</h4>
                        </div>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('failed'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('failed') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table" style="width:100%" id="example">
                            <thead class=" text-primary">
                                <th>
                                    AdmNo
                                </th>
                                <th>
                                    Student Name
                                </th>
                                <th>
                                    Mobile
                                </th>
                                <th>
                                    Email
                                </th>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>
                                        {{$student->id}}
                                    </td>
                                    <td>
                                        {{$student->full_name}}
                                    </td>
                                    <td>
                                        {{$student->mobile}}
                                    </td>
                                    <td>
                                        {{$student->email}}
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
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        var table=$('#example').DataTable();
    });
</script>
@endsection