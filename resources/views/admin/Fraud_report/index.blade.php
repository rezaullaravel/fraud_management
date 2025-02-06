@extends('admin.admin_master')
@section('title')
    {{ 'Admin All Report' }}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            {{-- report section start --}}

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Fraud Report</h4>
                        </div>

                        @if (session('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> {{ session('message') }}
                          </div>
                        @endif

                        <div class="card-body">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Fraudster</th>
                                        <th>Type</th>
                                        <th>Time</th>
                                        <th>Summary</th>
                                        <th>Reporter</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $row)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $row->fraudster_name }}</td>
                                            <td>{{ $row->fraud_type }}</td>
                                            <td>{{ $row->fraud_date_time }}</td>
                                            <td>{{ $row->description }}</td>
                                            <td>
                                                @if ($row->user_id != null)
                                                    {{ $row->user->name }}
                                                @else
                                                    {{ $row->reporter_name }}
                                                @endif
                                            </td>
                                            <td>{{ $row->contact_info }}</td>
                                            <td>
                                                @if ($row->report_status == '0')
                                                    <span class="badge badge-danger">Hidden</span>
                                                @else
                                                    <span class="badge badge-primary">Show</span>
                                                @endif
                                            </td>
                                            <td>

                                                @if ($row->report_status=='1')
                                                <a href="{{ route('admin.report.hide', $row->id) }}"
                                                    class="btn btn-success btn-sm" title="Show"><i
                                                        class="las la-arrow-up"></i></a>
                                                @else
                                                <a href="{{ route('admin.report.show', $row->id) }}"
                                                    class="btn btn-info btn-sm" title="Hidden"><i
                                                        class="las la-arrow-down"></i></a>
                                                @endif

                                                <a href="{{ route('admin.report.details', $row->id) }}"
                                                    class="btn btn-primary btn-sm" title="View report"><i
                                                        class="las la-eye"></i></a>
                                                        
                                                <a href="" class="btn btn-danger btn-sm" title="View report"><i
                                                        class="las la-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- report section end --}}
        </div><!-- /.container-fluid -->
    </section>
@endsection
