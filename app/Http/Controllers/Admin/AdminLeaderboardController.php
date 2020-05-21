<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Subscription;
use Auth;
use Carbon\Carbon;

class AdminLeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_users = User::where(['verified'=>1, 'plan_status'=>'Active'])->orderBy('streaks','DESC')->orderBy('perfect_weeks','DESC')->get();
        $deactive_users = User::where(['plan_status'=>'Deactive'])->orderBy('streaks','DESC')->orderBy('perfect_weeks','DESC')->get();

        $user_counts['user_active_count'] = User::where(['plan_status'=>'Active'])->count();
        $user_counts['user_deactive_count'] = User::where(['plan_status'=>'Deactive'])->count();
        $user_counts['subscription_count'] = Subscription::all()->count();
        $planexpDate = new Carbon('+3 days');
        $planexpDate = $planexpDate->format('Y-m-d');
        $user_counts['exp_user'] = User::whereHas('subscriptions', function ($query) use ($planexpDate) {
            $query->where('ends_at', $planexpDate)->where('plan_status','Active');
        })->count();

        return view('admin.admin_leaderboard', compact('active_users','deactive_users', 'user_counts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
