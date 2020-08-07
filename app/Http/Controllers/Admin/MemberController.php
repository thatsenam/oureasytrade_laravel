<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    public function getMembers(Request $request){

        $search = $request->search;

        if($search == ''){
           $Member = Member::orderby('name','asc')->limit(5)->get();
        }else{
           $Member = Member::orderby('name','asc')->where('name', 'like', '%' .$search . '%')->orWhere('mobile', 'like', '%' . $search . '%')->limit(5)->get();
            //  $Member = Member::search($search)->limit(5)->get();

        }

        $response = array();
        foreach($Member as $employee){
           $response[] = array(
                "id"=>$employee->id,
                "text"=>$employee->name.' ('.$employee->mobile.')',
                "name" =>$employee->name,
                "previous_deposit"=>$employee->last_deposit,
                "previous_withdraw"=>$employee->last_withdraw,
           );
        }

        return json_encode($response);

     }
}
