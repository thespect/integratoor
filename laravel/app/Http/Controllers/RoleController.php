<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //
    public function index(){
        $roles = $this->consultaRoles();

        return view('Permisos.RolesView',compact('roles'));
    }

    protected function consultaRoles(){
        $roles = Role::where('status',1)
        ->get();
        
        dd($roles);

        return $roles;
    }
}
