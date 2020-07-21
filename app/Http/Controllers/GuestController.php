<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\AudioProgram;
use App\Comment;
use App\Education;
use App\Gallery;
use App\Impact;
use App\Partner;
use App\Project;
use App\Report;
use App\Task;
use App\Vacancy;
use App\VacancyApplication;

class GuestController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
       $this->middleware('web');
    }



        //get all employees
        public function getAllEmployees()
        {
            return response()->json(User::get(), 200);
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



}
