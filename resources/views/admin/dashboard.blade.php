@extends('admin.admin_master')
 @section('title')
 {{ 'Admin Dashboard' }}
 @endsection

 @section('content')
 <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      {{-- report section start --}}

      {{-- fetch latest report --}}
      @php
          $data = App\Models\FraudMaster::orderBy('id','desc')->get();
      @endphp
      <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Recent Fraud Report</h4>
                </div>

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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $data  as $key=>$row)
                               <tr>
                                 <td>{{ $key+1 }}</td>
                                 <td>{{ $row->fraudster_name  }}</td>
                                 <td>{{ $row->fraud_type  }}</td>
                                 <td>{{ $row->fraud_date_time  }}</td>
                                 <td>{{ $row->description  }}</td>
                                 <td>
                                    @if ($row->user_id!=null)
                                     {{ $row->user->name }}

                                    @else
                                      {{ $row->reporter_name }}
                                    @endif
                                 </td>
                                 <td>{{ $row->contact_info }}</td>
                                 <td>
                                    <a href="" class="btn btn-primary btn-sm" title="View report"><i class="las la-eye"></i></a>
                                    <a href="" class="btn btn-danger btn-sm" title="View report"><i class="las la-trash"></i></a>
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
