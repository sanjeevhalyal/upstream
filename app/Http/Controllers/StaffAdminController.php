<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;
use DB;

class StaffAdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware(['auth','checkstaffadmin']);
  }
  /**
   * Show the available categories and form to add category.
   *
   * @return \Illuminate\Http\Response
   */
   public function showCategories()
   {
     // Get a instance of category
     $cat = Category::all();
    return view('staffadmin.pages.categories')->with('cat',$cat);
   }

   /**
    * Add new Category to the database.
    *
    * @return \Illuminate\Http\Response
    */
    public function addNewCategories(Request $request)
    {
      // Get a instance of category
      $this->validate($request,[
        'category' => 'required',
      ]);
      $cat = new Category();
      $cat->category = $request->input('category');
      $cat->save();
      return redirect()->route('adminstaff.newcategories');
    }
    /**
     * Remove Category from the database.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyCategories($id)
    {
        //delete categories
        $cat = Category::find($id);
        $cat->delete();

        return redirect()->route('adminstaff.newcategories');
    }

    function collect(Request $req){
        $req->validate([
            'prodID' => 'required|integer',
            'studID' => 'required|integer',
            'staff' => 'required'
        ]);

        $productID = $req->input('prodID');
        $collect_user_id = $req->input('studID');
        $bookingID = $req->input('bookID');
        $staff_inc = $req->input('staff');

        DB::table('transactions')->select('product_id')->where('booking_id', $bookingID)->first();

        $data = array("collect_user_id"=>$collect_user_id, "staff_incharge_collect_id"=>$staff_inc, "booking_status"=>"collected");
        DB::table('transactions')->where('booking_id', $bookingID)->update($data);

        $getData = DB::table('activities')->insert(array("event"=>"Product ($productID) collected by User ($collect_user_id) from Staff ($staff_inc)","event_timestamp"=>date("Y-m-d")));
        return redirect()->route('home');
    }

    function return(Request $req){

        $req->validate([
            'comment' => 'required',
            'staff' => 'required'
        ]);

        $comment = $req->input('comment');
        $staff_inch = $req->input('staff');
        $bookingID = $req->input('bookID');
        $productID = $req->input('prodID');
        echo $staff_inch;
        $data = array("staff_incharge_return_id"=>$staff_inch, "return_comment"=>$comment, 'return_date'=>date("Y-m-d"), "booking_status"=>"returned");
        DB::table('transactions')->where('booking_id', $bookingID)->update($data);

        $getData = DB::table('activities')->insert(array("event"=>"Product ($productID) returned to Staff ($staff_inch)","event_timestamp"=>date("Y-m-d")));
        return redirect()->route('home');
    }


}
