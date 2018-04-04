<?php
/**
 * Created by PhpStorm.
 * User: sanjeev halyal
 * Date: 02-04-2018
 * Time: 18:08
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\User;


class ForLocalAdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest:admin', ['except' => ['logout']]);
    }


    public function showuserlist(Request $request)
    {
        $search=$request->input('userlist');

        $user = \DB::select('select id,name,email,CASE WHEN role_id = 1 
            THEN 0
            ELSE 1
       END AS role from users where name like "%'.$search.'%" or email like "%'.$search.'%"');



        foreach ($user as $u)
        {
            echo '<tr>
                              <td>'
                .$u->name
                .'</td> <td>'
                .$u->email
                .'</td><td>';


            if($u->role)
            {
                echo '<button type="button" class="btn btn-primary" onclick="makeadmin('.$u->id.')">Make New Admin</button>';
            }
                else
                {
                    echo '<button type="button" class="btn btn-warning" onclick="removeadmin('.$u->id.')">Remove Admin</button>';
                }
           echo '</td>
                          </tr>';
        }

    }

    public function makeasadmin(Request $request)
    {
        $user = User::find($request->input('id'));

        $user->role_id =1;
        $user->save();
        echo 1;
    }


    public function removeadmin(Request $request)
    {
        $user = User::find($request->input('id'));


        $user->role_id =3;
        $user->save();
        echo 1;
    }

}