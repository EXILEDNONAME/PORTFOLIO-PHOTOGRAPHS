<?php

namespace App\Http\Controllers\Backend\__System;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {

  function __construct() {
    $this->middleware(['auth', 'verified']);
  }

  public function generate_new_token() {
    $data = Auth::User()->createToken('api-token')->plainTextToken;
    return redirect('/dashboard/profiles/account-informations')->with('token', $data);
  }

  /**
  **************************************************
  * @return Index
  **************************************************
  **/

  public function account_information() {
    $data = \App\Models\User::where('id', Auth::user()->id)->first();
    $token = \DB::table('personal_access_tokens')->where('tokenable_id', $data->id)->first();
    return view('pages.backend.__system.profile.account-information', compact('data', 'token'));
  }

  public function account_information_update(Request $request, $id) {

    if($request->hasFile('avatar')){
      $filename = time() . '_' . $request->avatar->getClientOriginalName();
      $request->avatar->storeAs('avatar',$filename,'public');
      $request->file('avatar')->move(public_path("storage/avatar/" . Auth::user()->id . '/'), $filename);
      \App\Models\User::where('id', $id)->update(['avatar' => $filename]);
    }

    \App\Models\User::where('id', $id)->update([
      'name'            => $request->get('name'),
      'email'           => $request->get('email'),
      'phone'           => $request->get('phone'),
      'username'        => $request->get('username'),
    ]);
    return redirect('/dashboard/profiles/account-informations')->with('success', __('default.notification.success.profile-updated'));
  }

  public function change_password() {
    return view('pages.backend.__system.profile.change-password');
  }

  public function update_password(Request $request) {
    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
      return redirect()->back()->with('error', __('default.notification.error.password-current'));
    }

    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
      return redirect()->back()->with('error', __('default.notification.error.password-new'));
    }

    if(!(strcmp($request->get('new-password'), $request->get('confirm-password'))) == 0){
      return redirect()->back()->with('error', __('default.notification.error.password-confirm'));
    }

    $user = Auth::user();
    $user->password = bcrypt($request->get('new-password'));
    $user->save();

    return redirect()->back()->with('success', __('default.notification.success.password-changed'));
  }

}
