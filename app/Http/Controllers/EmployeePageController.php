<?php

namespace App\Http\Controllers;


use App\User;
use App\Helpers\General\CollectionHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\VacancyApplication;
use App\AudioProgram;
use Carbon\Carbon;
use App\Education;
use App\Comment;
use App\Gallery;
use App\Impact;
use App\Partner;
use App\Project;
use App\Report;
use App\Task;
use App\Vacancy;
use Intervention\Image\Facades\Image;

class EmployeePageController extends Controller
{
    /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('staff');
  }

  public function index()
  {
    return view('/employeehome');
  }


  //get all employees
  public function getAllAdmins()
  {
      return response()->json(User::get(), 200);
  }

  //delete specific admin
  public function deleteSpecificAdmin($id)
  {
      $admin = User::find($id);
      if (is_null($admin)) {
          return response()->json(["message" => "No such admin was found"], 404);
      }
      $admin->delete();
      return response()->json(null, 204);
  }

  //get all employees
  public function getAllEmployees()
  {
      return response()->json(User::get(), 200);
  }



        // show specific admin by their ID
        public function getAdminById($id)
        {
        $admin = User::find($id);
        if (is_null($admin)) {
            return response()->json(["message" => "Admin not found"], 404);
        }
        return response()->json($admin, 200);
        }


        // update admin details
        public function updateSpecificAdmin(Request $request, $id)
        {
        $admin = User::find($id);
        if (is_null($admin)) {
            return response()->json(["message" => "No such admin was found"], 404);
        }
        $admin->update($request->all());
        return response()->json($admin, 200);
        }



        // update employee details
        public function updateSpecificEmployee(Request $request, $id)
        {
        $employee = User::find($id);
        if (is_null($employee)) {
            return response()->json(["message" => "No such employee was found"], 404);
        }
        if($request->proPic){
            $x = $request->proPic;
            $img = Image::make($x);
            $h = $img->height();
            $w = $img->width();

            if($w>$h){
                $c = $w;
            }else{
                $c = $h;
            }
            $name = time().'.'.explode('/', explode(':', substr($x, 0, strpos($x, ';')))[1])[1];
            $img->resizeCanvas($c,$c)->resize(320,320)->save(public_path('images/profile/').$name);
            $request['profile_pic'] = $name;
        }else{
            $name = "default";
            $request['profile_pic'] = $name;
        }
        $employee->update($request->all());
        return response()->json($employee, 200);
        }


        // show specific employee by their ID
        public function getEmployeeById($id)
        {
        $employee = User::find($id);
        if (is_null($employee)) {
            return response()->json(["message" => "Employee not found"], 404);
        }
        return response()->json($employee, 200);
        }



        //delete specific employee
        public function deleteSpecificEmployee($id)
        {
            $employee = User::find($id);
            if (is_null($employee)) {
                return response()->json(["message" => "No such employee was found"], 404);
            }
            $employee->delete();
            return response()->json(null, 204);
        }


        // add new admin
        public function addAdmin(Request $request)
        {
        $request['password'] = Hash::make($request['password']);
        $admin = User::create($request->all());
        return response()->json($admin, 201);
        }


        // add new employee
        public function addEmployee(Request $request)
        {
        $request['password'] = Hash::make($request['password']);
        $request['profile_pic'] = 'default';
        $employee = User::create($request->all());
        return response()->json($employee, 201);
        }


        // dashboard method
        public function dashboard()
        {
            // return "This Month was from " . Carbon::now('GMT+2')->startOfWeek();

            /*-------------------------------------------------------------
            People Card Values
            --------------------------------------------------------------*/
            $admins = User::get();
            $employees = User::get();

            $response['admins'] = count($admins);

            $response['employees'] = count($employees);

            $response['all_people'] = count($employees) + count($admins);

            /*-------------------------------------------------------------
            Comments Card Values
            --------------------------------------------------------------*/
            $comments = Comment::get();
            $response['msg_all_time'] = count($comments);
            $response['msg_last_month'] = count($comments->filter(function ($value, $key) {
                return
                    ($value->created_at >= Carbon::now('GMT+2')
                        ->subMonth()
                        ->startOfMonth())
                    &&
                    ($value->created_at < Carbon::now('GMT+2')
                        ->startOfMonth());
            }));

            $response['msg_this_month'] = count($comments->filter(function ($value, $key) {
                return
                    ($value->created_at >= Carbon::now('GMT+2')
                        ->startOfMonth());
            }));

            $response['msg_last_week'] = count($comments->filter(function ($value, $key) {
                return ($value->created_at >= Carbon::now('GMT+2')
                        ->subWeek()
                        ->startOfWeek())
                    &&
                    ($value->created_at < Carbon::now('GMT+2')
                        ->startOfWeek());
            }));

            $response['msg_this_week'] = count($comments
                    ->filter(function ($value, $key) {
                        return $value->created_at >= Carbon::now('GMT+2')->startOfWeek();
                    }));

            return response()->json($response, 200);
        }

        //get all Comments this week
        public function getThisWeekComments()
        {
            $response = Comment::orderByRaw('created_at', 'ASC')->get();
            $response = $response->filter(function ($value, $key) {
                return $value->created_at >= Carbon::now('GMT+2')
                    ->startOfWeek();
            });
            $response = CollectionHelper::paginate($response, count($response), 10);
            return response()->json($response, 200);
        }

        //get all Comments last week
        public function getLastWeekComments()
        {
            $comm = Comment::orderByRaw('created_at', 'ASC')->get();
            $comm = $comm->filter(function ($value, $key) {
                return
                    ($value->created_at >= Carbon::now('GMT+2')
                        ->subWeek()
                        ->startOfWeek())
                    &&
                    ($value->created_at < Carbon::now('GMT+2')
                        ->startOfWeek());
            });
            $response = CollectionHelper::paginate($comm, count($comm), 10);
            return response()->json($response, 200);
        }

        //get all Comments this month
        public function getThisMonthComments()
        {
            $response = Comment::orderByRaw('created_at', 'ASC')->get();
            $response = $response->filter(function ($value, $key) {
                return
                    ($value->created_at >= Carbon::now('GMT+2')
                        ->startOfMonth());
            });
            $response = CollectionHelper::paginate($response, count($response), 10);
            return response()->json($response, 200);
        }

        //get all Comments last month
        public function getLastMonthComments()
        {
            $response = Comment::orderByRaw('created_at', 'ASC')->get();
            $response = $response->filter(function ($value, $key) {
                return
                    ($value->created_at >= Carbon::now('GMT+2')
                        ->subMonth()
                        ->startOfMonth())
                    &&
                    ($value->created_at < Carbon::now('GMT+2')
                        ->startOfMonth());
            });
            $response = CollectionHelper::paginate($response, count($response), 10);
            return response()->json($response, 200);
        }

        //get all Comments
        public function getAllComments()
        {
            $response = Comment::get();
            return response()->json($response, 200);
        }

        //delete specific Comment
        public function deleteSpecificComment($id)
        {
            $comment = Comment::find($id);
            if (is_null($comment)) {
                return response()->json(["message" => "No such comment was found"], 404);
            }
            $comment->delete();
            return response()->json(null, 204);
        }

}
