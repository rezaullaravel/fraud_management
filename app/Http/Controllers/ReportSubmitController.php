<?php

namespace App\Http\Controllers;

use App\Models\MultiFile;
use App\Models\FraudMaster;
use Illuminate\Http\Request;
use Auth;

class ReportSubmitController extends Controller
{
    //report submit form
    public function reportSubForm(){
        return view('frontend.pages.report_sub_form');
    }

    //store report
    public function reportStore(Request $request){
       //from validation
       $request->validate([
        'fraudster_name'=>'required',
        'fraud_date_time'=>'required',
        'description'=>'required',
        'reporter_name'=>'required',
       ]);

       //insert data to fraud_masters table
       $fraud = new FraudMaster();
       if(Auth::check()){
        $fraud->user_id = Auth::user()->id;
       }
       $fraud->fraudster_name = $request->fraudster_name;
       $fraud->fraud_date_time = date('d-m-Y',strtotime($request->fraud_date_time));
       $fraud->description = $request->description;
       $fraud->reporter_name = $request->reporter_name;


       if(!empty($request->location)){
        $fraud->location = $request->location;
       }

       if(!empty($request->fraud_type)){
        $fraud->fraud_type = $request->fraud_type;
       }

       if(!empty($request->bank_details)){
        $fraud->bank_details = $request->bank_details;
       }

       if(!empty($request->payment_platform)){
        $fraud->payment_platform = $request->payment_platform;
       }

       if(!empty($request->fraud_amount)){
        $fraud->fraud_amount = $request->fraud_amount;
       }

       if(!empty($request->contact_info)){
        $fraud->contact_info = $request->contact_info;
       }

       if(!empty($request->scammer_url)){
        $fraud->scammer_url = $request->scammer_url;
       }

       if(!empty($request->privacy_consent_name)){
        $fraud->privacy_consent_name = 1;
       }

       if(!empty($request->privacy_consent_email)){
        $fraud->privacy_consent_email = 1;
       }

       $fraud->save();

       //insert multiple files
       if($request->files){
        $files = $request->file('files');
        foreach($files as $file){
            $fileName = rand().'.'.$file->getClientOriginalName();
            $file->move(public_path('upload/fraud_images/'),$fileName);
            $filePath = 'upload/fraud_images/'.$fileName;

            $data = new MultiFile();
            $data->fraud_master_id =  $fraud->id;
            $data->file_name = $filePath;
            $data->save();
        }//end foreach loop
       }

       return redirect()->back()->with('success','Report inserted successfully');
    }//end method
}
