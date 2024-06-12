<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CajeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $user_log_id = Auth::id();
      //  $user_find = user::find($user_log_id);
        //  inertia('' =>$user_find->pluck('saldo'));
        // return inertia('cajero/index', ['cajero' => $user_find]);
        //  return $user_find->pluck('saldo');
        $categories = Category::paginate(25);
        return inertia('Cajero/index', ['cajero' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
