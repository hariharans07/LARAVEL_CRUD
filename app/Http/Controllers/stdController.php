<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class stdController extends Controller
{
    public function index(){
        $data= Student::all();
        return view("welcome",compact("data"));
    }

    //Add User
    public function adduser(Request $add)
    {
        try {
            $add->validate([
                'name' => 'required',
                'age' => 'required',
                'dept' => 'required'
            ]);

            // User::create([
            //     'name' => $request->name,
            //     'dept' => $request->dept
            // ]);

            Student::create($add->all());

            return response()->json([
                'status' => 200,
                'message' => 'User added successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ]);
        }
    }

    //Delete User
    public function deleteuser($id)
    {
        try {
            $deluser = Student::findOrFail($id);
            $deluser->delete();

            return response()->json([
                'status' => 200,
                'message' => 'User deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ]);
        }
    }

    //View Edit
    public function editviewuser($id)
    {
        try {
            $edituser = Student::findOrFail($id);

            return response()->json([
                'status' => 200,
                'data' => [
                    'id' => $edituser->id,
                    'name' => $edituser->name,
                    'age' => $edituser->age,
                    'dept' => $edituser->dept
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found!'
            ]);
        }  
    }

    //Edit User
    public function edituser(Request $request, $id)
    {
        try {

            $edituser = Student::findOrFail($id);


            // $user->update([
            //     'name' => $request->name,
            //     'dept' => $request->dept
            // ]);
            $edituser->update($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'User Updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ]);
        }
    }
}
