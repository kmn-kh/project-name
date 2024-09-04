<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function registerNew(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:10|confirmed',
            'role' => 'nullable',
            'img' => 'nullable',
        ]);
        $data = $request->except(["_token", "password_confirmation"]);

        if (empty($data['role'])) {
            $data['role'] = 'user';
        }
        User::create($data);

        return redirect()->route('login');
    }

    public function showRegister()
    {
        return view("register");
    }
    public function showlogin()
    {
        return view("login");
    }
    public function userLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:10',
        ]);

        $compare = $request->except(["_token"]);

        if (auth()->attempt($compare)) {
            // Find information of user and create session id to cookie on the browser
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withErrors(['message' => 'Invalid credential', "dataEmail" => $data["email"]]);
    }
    public function showDashboard()
    {
        return view("dashboard");
    }
    public function showProfile()
    {
        return view("updateProfile");
    }
    public function updateProfile(Request $request)
    {
        // Validate the request to ensure name is provided; image is optional
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
        ]);

        // Get the currently authenticated user
        $user = auth()->user();

        // Check if a new image was uploaded
        if ($request->hasFile('img')) {
            // Define the old file path
            $oldFilePath = public_path('uploads') . '/' . $user->img;

            // Check if the file exists and delete it
            if ($user->img && file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // Retrieve the uploaded file
            $file = $request->file('img');

            // Generate a unique filename based on the current time and the original filename
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Move the file to the 'uploads' directory in the public path
            $file->move(public_path('uploads'), $fileName);

            // Update user's profile image
            $user->img = $fileName;
        }

        // Update user's name
        $user->name = $request->input('name');

        // Save the changes to the database
        $user->save();

        // Redirect to the dashboard with a success message
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route("login");
    }
}
