<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    public function showuserlist(Request $request)
    {
        $search = $request->input('userlist');

        $user = \DB::select('select id,name,email,CASE WHEN role_id = 1 
            THEN 0
            ELSE 1
       END AS role from users where name like "%' . $search . '%" or email like "%' . $search . '%"');


        foreach ($user as $u) {
            echo '<tr>
                              <td>'
                . $u->name
                . '</td> <td>'
                . $u->email
                . '</td><td>';


            if ($u->role) {
                echo '<button type="button" class="btn btn-primary" onclick="makeadmin(' . $u->id . ')">Make New Admin</button>';
            } else {
                echo '<button type="button" class="btn btn-warning" onclick="removeadmin(' . $u->id . ')">Remove Admin</button>';
            }
            echo '</td>
                          </tr>';
        }

    }

    public function makeasadmin(Request $request)
    {
        $user = User::find($request->input('id'));

        $user->role_id = 1;
        $user->save();
        echo 1;
    }


    public function removeadmin(Request $request)
    {
        $user = User::find($request->input('id'));


        $user->role_id = 3;
        $user->save();
        echo 1;
    }

}
