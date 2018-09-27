<?php

namespace App\Http\Controllers;
use App\LogActivity as LogActivityModel;
use Illuminate\Http\Request;
use App\Visitor;
use App\users;
class accountController extends Controller
{
    //
    public static function addToLog($subject)
    {
    	$log = [];
        $log['subjecta'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : $user;
    	LogActivityModel::create($log);
    }
    public static function logActivityLists()
    {
    	return LogActivityModel::latest()->get();
    }
       public function account_list(){
        $accounts = users::orderBy('id','asc')->get();
        return view('account_list')->with('accounts', $accounts);
        }
        public function change_password(){
            return view('change_password');
            }
        public function new_account(){
            return view('auth.register');
        }
        public function save_new_account(Request $request){
            $this->validate(request(),[
                'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|confirmed',
                'user_type' => 'required',
            ]    
            );  
           
                    $data = new users;
                    $data->name = $request->input('name');
                    $data->email = $request->input('email');
                    $data->user_type = $request->input('user_type');
                    $data->password = bcrypt($request->input('password'));
                    $data->save();
                    $request->session()->flash('status', ''.$data->name.' Successfully Added!');
                    \LogActivity::addToLog(''.$request->input('email').' Newly Account Added','');
                    return redirect('/view-account');
           
            }
            public function deactivate_account (Request $request, $id){
                $users = users::findOrFail($id);
                if($users) {
                    $users->deactivate = 1;
                    $users->save();
                }
                \LogActivity::addToLog('Deactivate '.$users->name.'('.$id.')');
                $request->session()->flash('status', ''.$users->name.' Successfully Deactivated!');
                return redirect('/view-account');

            }
            public function activate_account(Request $request, $id){
                $users = users::findOrFail($id);
                if($users) {
                    $users->deactivate = null;
                    $users->save();
                }
                \LogActivity::addToLog('Activate '.$users->name.'('.$id.')');
                $request->session()->flash('status', ''.$users->name.' Successfully Activated!');
                return redirect('/view-account');

            }
            public function save_change_password(Request $request){
               
                $this->validate(request(),[
                
                    'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|confirmed',
                ]    
                );  
                    $id = $request->input('id');
                    $data =  users::find($id);
                    $data->password = bcrypt($request->input('password'));
                    $data->save();
                    $request->session()->flash('status', ''.$data->name.' Successfully Updated Your Password!');
                    \LogActivity::addToLog('Password Change of '.$data->email.'');
                    return redirect('/change-password');
               
                }

                public function reset_account(Request $request, $id){
               
                        $data =  users::find($id);
                        $data->password = bcrypt('123456');
                        $data->save();
                        $request->session()->flash('status', ''.$data->name.' Successfully Reset Password! New Password ->  123456');
                        \LogActivity::addToLog('Reset Password of '.$data->email.'');
                        return redirect('/view-account');
                   
                    }


}
