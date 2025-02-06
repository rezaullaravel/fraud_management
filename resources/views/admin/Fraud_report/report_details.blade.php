@extends('admin.admin_master')
 @section('title')
 {{ 'Report Details' }}
 @endsection

 @section('content')
 <section class="content pt-5">
    <div class="container-fluid">

      {{-- report section start --}}

      <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Report Details
                        <a href="{{ route('admin.report.index') }}" class="btn btn-primary" style="float: right;">All Report</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                      <tbody>
                         <tr>
                            <th width="30%">Fraudster Name</th>
                            <td>{{ $report->fraudster_name }}</td>
                         </tr>

                         <tr>
                            <th width="30%">Fraudster Location</th>
                            <td>{{ $report->location }}</td>
                         </tr>

                         <tr>
                            <th width="30%">Fraud Type</th>
                            <td>{{ $report->fraud_type }}</td>
                         </tr>

                         <tr>
                            <th width="30%">Bank Details</th>
                            <td>{{ $report->bank_details }}</td>
                         </tr>

                         <tr>
                            <th width="30%">Payment Platform</th>
                            <td>{{ $report->payment_platform }}</td>
                         </tr>

                         <tr>
                            <th width="30%">Fraud Amount</th>
                            <td>{{ $report->fraud_amount }}</td>
                         </tr>


                         <tr>
                            <th width="30%">Fraud Occurance Time</th>
                            <td>{{ $report->fraud_date_time }}</td>
                         </tr>

                         <tr>
                            <th width="30%">Fraud Description</th>
                            <td>{{ $report->description }}</td>
                         </tr>

                         <tr>
                            <th width="30%">Scammer(Fraudster) Url</th>
                            <td>{{ $report->scammer_url }}</td>
                         </tr>

                         <tr>
                            <th width="30%">Fraud Evidence Image</th>
                            <td>
                                @foreach ($report->multiImg as $image)
                                   <img src="{{ asset($image->file_name ) }}" alt="" height="100" width="100">
                                @endforeach
                            </td>
                         </tr>

                         <tr>
                            <th width="30%">Reporter Name</th>
                            <td> @if ($report->user_id!=null)
                                {{ $report->user->name }}

                               @else
                                 {{ $report->reporter_name }}
                               @endif
                            </td>
                         </tr>

                         <tr>
                            <th width="30%">Reporter Contact Info</th>
                            <td>{{ $report->contact_info }}</td>
                         </tr>


                         <tr>
                            <th width="30%">Reporter Name Show</th>
                            <td>
                                @if ($report->privacy_consent_name=='0')
                                    <span class="badge badge-danger">No</span>
                                @else
                                <span class="badge badge-primary">Yes</span>
                                @endif
                             </td>
                         </tr>

                         <tr>
                            <th width="30%">Reporter Email Show</th>
                            <td>
                                @if ($report->privacy_consent_email=='0')
                                    <span class="badge badge-danger">No</span>
                                @else
                                <span class="badge badge-primary">Yes</span>
                                @endif
                             </td>
                         </tr>

                         <tr>
                            <th width="30%">Reporter Status</th>
                            <td>
                                @if ($report->report_status=='0')
                                    <span class="badge badge-danger">Hidden</span>
                                @else
                                <span class="badge badge-primary">Show</span>
                                @endif
                             </td>
                         </tr>

                         <tr>
                            <th width="30%">Report Inserted Time</th>
                            <td>
                                {{ $report->created_at }}
                             </td>
                         </tr>
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
