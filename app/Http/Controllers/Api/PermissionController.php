<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Permission as Model;
use App\Http\Resources\Permission as Resources;
use App\Models\Admin;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Model::class);
        $this->middleware('auth:api');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $permission)
    {
        return new Resources($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $permission)
    {
        $user = $permission;
        $user->Permission()->delete();
        foreach ($request->name as $name) {
            $user->Permission()->create(["name" => $name]);
        }
        $user->Attribute()->update([
            "name" => $request->vitri,
            "type" => $request->type,
        ]);

        return "ok";
    }
}
