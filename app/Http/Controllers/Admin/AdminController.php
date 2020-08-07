<?php

namespace App\Http\Controllers\Admin;

use App\Deposit;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendInfoMail;
use App\Mail\MailNotify;
use App\Withdraw;
use Facade\FlareClient\Http\Response;
use Throwable;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {

        $count = Member::count();

        return view('admin/dashboard')->with(['members' => $count]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add_member()
    {
        return view('admin/add_member');
    }

    function sendCredential($username, $password)
    {
        try {
            $details = [
                'title' => 'Mail from ItSolutionStuff.com',
                'username' => "UserName: $username",
                'password' => "Password: $password"

            ];
            Mail::to('aumee.netizen@gmail.com')->send(new SendInfoMail($details));
        } catch (Throwable $e) {
            return abort($details);
        }
    }
    function check_mobile(Request $request)
    {
        if ($request->has('mobile')) {

            $users =  User::where('email', $request->mobile)->first();
            if ($users) {
                return response()->json(['status' => 'Fail', 'message' => 'Phone Number already used', 'user' => $users], 200);
            } else {
                return response()->json(['status' => 'Pass', 'message' => 'Ok to use'], 200);
            }
        } else {
            return response()->json(['status' => 'Fail', 'message' => 'Phone Number already used'], 200);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handle_member_form(Request $request)
    {
        $member = new Member;
        $array = explode('.', $request->file('profile_picture')->getClientOriginalName());
        $extension = end($array);


        $member->name = $request->name;
        $member->address = $request->address;
        $member->nid = $request->nid ?? 0;
        $member->mobile = $request->mobile;
        $member->date = "$request->date 00:00:00";
        $member->nominee_name = $request->nominee_name;
        $member->nominee_address = $request->nominee_address;
        $member->nominee_mobile = $request->nominee_mobile;
        $member->save();
        $path = $request->file('profile_picture')->storeAs(
            'public/members',
            $member->id . "_photo.$extension"
        );
        $path = str_replace('public/', '', $path);
        $member->avatar = $path;
        $member->save();


        $user = new User;
        $random = Str::random(6);
        $user->password = Hash::make($random);
        $user->email = $member->mobile;
        $user->name = $member->name;
        $user->mobile = $member->mobile;
        if ($request->has('profile_picture')) {
            $user->avatar = $member->avatar;
        }
        $user->save();
        $this->sendCredential($user->mobile, $random);
        return redirect('admin/members');
    }

    public function deposit_fund(Request $request)
    {
        return view('admin/deposit_fund');
    }
    public function deposit_fund_form(Request $request)
    {
        // dd($request->all());
        $deposit = new Deposit;
        $deposit->member_id = $request->member_id;
        $deposit->name = $request->name;
        $deposit->previous_deposit = $request->previous_deposit;
        $deposit->deposit = $request->deposit;
        $deposit->date = "$request->date 00:00:00";
        $deposit->save();


        $member = Member::find($deposit->member_id)->first();
        $member->last_deposit=$deposit->deposit;
        $member->credit = $member->credit + $deposit->deposit;
        $member->save();

        return redirect('/admin/dashboard');
    }

    public function withdraw_fund(Request $request)
    {
        return view('admin/withdraw_fund');
    }
    public function withdraw_fund_form(Request $request)
    {
        // dd($request->all());
        $withdraw = new Withdraw;
        $withdraw->member_id = $request->member_id;
        $withdraw->name = $request->name;
        $withdraw->previous_withdraw = $request->previous_withdraw;
        $withdraw->withdraw = $request->withdraw;
        $withdraw->date = "$request->date 00:00:00";
        $withdraw->save();


        $member = Member::find($withdraw->member_id)->first();
        $member->last_withdraw=$withdraw->withdraw;
        $member->credit = $member->credit - $withdraw->withdraw;
        $member->save();

        return redirect('/admin/dashboard');
    }

    public function loan_grant(Request $request)
    {
        return view('admin/loan_grant');
    }
}
