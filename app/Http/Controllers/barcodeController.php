<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Visitor;
use App\LogActivity;

class barcodeController extends Controller
{
        public function show(){
    	return view('show_barcode');
    }
    public function print($id){
        $visitors = Visitor::findOrFail($id);
        $pdf = PDF::loadView('print_barcode',['visitors' => $visitors ]);
        $pdf->setPaper([20, 30,250.85 , 400.85], 'landscape');
        return $pdf->stream('asd.pdf');
    }
    public function editvisitor($id){
        $visitors = Visitor::findOrFail($id);
    
        return view('editvisitor',['visitors' => $visitors ]);
  }
  public function outvisitor($id)
  {
    $visitors = Visitor::findOrFail($id);
    if($visitors) {
        $visitors->time_out = now();
        $visitors->save();
    }
    \LogActivity::addToLog('Out '.$visitors->name.'('.$id.')');
    return redirect('/show-barcode-list');
}
 

public function show_barcode_list()
{
        
    $visitors = Visitor::orderBy('gate_pass_id','asc')->whereNull('time_out')->get();
    return view('show_barcode_list')->with('visitors', $visitors);
    }

   
   
    public function barcode(Request $request){
    $this->validate(request(),[
            'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'contact_person' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'company' => 'required|string|max:255',
            'gate_pass_id' => 'required|string|numeric',
            'reason' => 'required|string|required',
    ]    
    );
    $gatepass = Visitor::where('gate_pass_id', $request->input('gate_pass_id'))->whereNull('time_out')->get();
    if($gatepass->isEmpty()){
            $data = new Visitor;
            $data->name = $request->input('name');
            $name_request = $request->input('name');
            $data->company = $request->input('company');
            $data->contact_person = $request->input('contact_person');
            $data->gate_pass_id = $request->input('gate_pass_id');
            $data->reason = $request->input('reason');
            $data->save();
            $request->session()->flash('status', 'Successfully Added!');
            \LogActivity::addToLog(''.$name_request.' Newly added');
            return redirect('/show-barcode-list');
    }
    else{ 
        $request->session()->flash('status', 'Invalid Gate Pass ID!');
        return redirect('/barcode');
    }
    }
    public function saveeditvisitor(Request $request, $id){

        $this->validate(request(),[
            'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'contact_person' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'company' => 'required|string|max:255',
            'gate_pass_id' => 'required|string|numeric',
            'reason' => 'required|string|required',
        ]    
        );
        $gatepass = Visitor::where('gate_pass_id', $request->input('gate_pass_id'))->whereNull('time_out')->where('id', '!=' , $id)->get();
        if($gatepass->isEmpty()){
            $data =  Visitor::find($id);
            $input = $request->all();
            $data->fill($input)->save();
            $request->session()->flash('status', 'Successfully Update!');
            \LogActivity::addToLog('Update '.$request->input('name').'('.$id.')');
              return redirect('/show-barcode-list');
        }
        else{
            $request->session()->flash('status', 'Invalid Gate Pass ID!');
            return redirect("/edit-visitor/$id");
        
        }
     }
     public function logActivity()
    {
        $logs = LogActivity::latest()
        ->leftJoin ('users','log_activities.user_id','=','users.id')
        ->select('users.name','log_activities.*')
        ->get();

         return view('logActivity',compact('logs'));    
    }
    public function visitors_history()
    {
        $logs = Visitor::latest()->whereNotNull('time_out')->get();

         return view('visitors_history',compact('logs'));    
    }
}
