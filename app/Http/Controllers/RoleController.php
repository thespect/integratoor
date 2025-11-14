<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //
    public function index(){
        $roles = $this->consultaRoles();

        return view('Permisos.Permisos',compact('roles'));
    }

    public function store(){
        
    }
    #33
    protected function consultaRoles(){
        $roles = Role::where('status',1)
        ->get();
        
        //dd($roles);
        return $roles;
    }
}
