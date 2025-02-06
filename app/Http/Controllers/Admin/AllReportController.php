<?php

namespace App\Http\Controllers\Admin;

use App\Models\FraudMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllReportController extends Controller
{
    //all report
    public function index(){
        $data = FraudMaster::get();
        return view('admin.Fraud_report.index',compact('data'));
    }//end method

    //report details
    public function reportDetails($id){
        $report = FraudMaster::find($id);
        return view('admin.Fraud_report.report_details',compact('report'));
    }//end method

    //report show
    public function reportShow($id){
        $report = FraudMaster::find($id);
        $report->report_status = 1;
        $report->save();
        return redirect()->back()->with('message','Report show successfully');
    }//end method

        //report hide
        public function reportHide($id){
            $report = FraudMaster::find($id);
            $report->report_status = 0;
            $report->save();
            return redirect()->back()->with('message','Report hide successfully');
        }//end method


}
