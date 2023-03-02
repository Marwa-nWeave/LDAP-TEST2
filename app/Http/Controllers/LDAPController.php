<?php

namespace App\Http\Controllers;

use App\Ldap\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use LdapRecord\Container;

class LDAPController extends Controller
{
    //
    public function login(Request $request)
    {
        $connection = Container::getConnection('default');
        $user = User::findByOrFail('mail', $request->email);

        if ($connection->auth()->attempt($user->getDn(), $request->password)) {
            // Credentials are valid!
            dd('authenticated  :) ');
        }
        else{dd('non auth'); }
    }

    public function test()
    {
        $connection = Container::getConnection('default');
        // $connection = Container::getDefaultConnection();
        // dd($connection);

        $user = new User;
         $myuser = User::where('name', '=', 'koki')->get();
        // dd($myuser);
        // $user->cn = 'Steve Bauman';
        // $user->givenname = 'Steve';
        // $user->sn = 'Bauman';
        // $user->company = 'Acme';

        // $user->save();

        // $users = User::where('company', '=', 'Acme')->get();
        // dd($users);

        $user = User::findByOrFail('name', 'koki');

        if ($connection->auth()->attempt($user->getDn(), 'P@sswo.rd')) {
            // Credentials are valid!
            dd('authenticated1  :) ');
        }
        else{dd('non auth1'); }

    }
}
