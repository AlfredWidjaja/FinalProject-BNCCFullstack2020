<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use App\Thread;
    use App\User;

    class HomeController extends Controller
    {

        //Show homepage when open website
        public function index(){
            return view('homepage');
        }

        //Show all user that has been registered
        public function showuser(){
            $user = User::all();
            return view('/showUser', compact('user'));
        }

        //Show user detail from user
        public function userdetail($id){
            $user = User::where('id', $id)->first();
            return view('/userDetail', compact('user'));
        }

        //Update user profile
        public function edit($id)
        {
            $user = User::where('id', $id)->first();
            return view('/updateUser', compact('user'));
        }

        //To store updated user profile
        public function update(Request $request, $id)
        {
            $user = User::where('id', $id)->first();
            $user->username = $request->username;
            $user->name = $request->name;
            $user->gender = $request->gender;
            $user->save();
            return redirect('/showUser');
        }
    }
?>
