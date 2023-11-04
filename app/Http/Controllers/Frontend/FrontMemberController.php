<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\MemberFormRequest;
use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontMemberController extends Controller
{
    public function index()
    {
        return view('frontend.member');
    }

    public function store(MemberFormRequest $request)
    {
        $data = $request->validated();

        $member = new Member;
        $user = Auth::user();
        $member->member_id = $user->id;
        $member->name = $user->name;
        $member->email = $user->email;
        $member->phone_no = $data['phone_no'];
        $member->address = $data['address'];
        $member->blood_gr = $data['blood_gr'];
        
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = $file->store('/public/member/'. $user->id .'/');
            $member->image = $filename;
        }

        if ($request->hasfile('idProof')) {
            $file = $request->file('idProof');
            $filename = $file->store('/public/member/'. $user->id .'/');
            $member->idProof = $filename;
        }
        
        $formattedDOB = Carbon::parse($data['dob'])->format('Y-m-d');
        $member->dob= $formattedDOB;
        $member->height = $data['height'];
        $member->weight = $data['weight'];
        $member->disease = $data['disease'];

        $member->save();

        return redirect('/member/dashboard')->with('message', 'You are now a member.');
    }
}
