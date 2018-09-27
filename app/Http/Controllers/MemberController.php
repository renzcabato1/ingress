<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    public function index(){
    	return view('show');
    }
    public function new_member(){
    	return view('new_member');
    }


    public function getMembers(){
    	$members = Member::orderBy('firstname','asc','lastname','asc')->get();
        return view('show')->with('members', $members);
    }

    public function save(Request $request){

        $this->validate(request(),[
            'firstname' => 'required|string|max:255|min:5|regex:/^[\pL\s\-]+$/u',
            'lastname' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
    ]    

    );

    	$member = new Member;
    	$member->firstname = $request->input('firstname');
    	$member->lastname = $request->input('lastname');
  		$member->save();

  		return redirect('/show');
    }

    
    public function save_new_number(Request $request){

        $this->validate(request(),[
            'firstname' => 'required|string|min:5a|regex:/^[\pL\s\-]+$/u',
            'lastname' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
    ]    

    );

    	$member = new Member;
    	$member->firstname = $request->input('firstname');
    	$member->lastname = $request->input('lastname');
  		$member->save();

       
          Redirect::to('/show')->with('message', Helper::format_message('Thanks for registering!','info'));
          }

    public function update(Request $request, $id){

        $this->validate(request(),[
            'firstname' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'lastname' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
    ]    
        );


    	$member = Member::find($id);
    	$input = $request->all();
		$member->fill($input)->save();

       
    	return redirect('/show');
    }

    public function delete($id)
    {
        $members = Member::find($id);
        $members->delete();
 
        return redirect('/show');
    }
}
