<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends BackendController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.home.index');
    }

    public function edit(Request $request)
    {
        $user = $request->user();

        return view('backend.home.edit', compact('user'));
    }

    public function update(Requests\AccountUpdateRequest $request)
    {
        $user = $request->user();
        $user->update($request->all());

        return redirect()->back()->with("message", "Account was update successfully!");
    }
}
