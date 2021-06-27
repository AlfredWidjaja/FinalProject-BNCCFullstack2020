<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use App\Thread;
    use App\User;

    class HomeController extends Controller
    {
        public function index(){
            return view('homepage');
        }

        public function showuser(){
            $user = User::all();
            return view('/showUser', compact('user'));
        }

        public function userdetail($id){
            $user = User::where('id', $id)->first();
            return view('/userDetail', compact('user'));
        }

        public function edit($id)
        {
            /* Task 15 Laravel CRUD
            $pertanyaan = DB::table('pertanyaan')->where('id', $id)->first(); */
            $user = User::where('id', $id)->first();
            return view('/updateUser', compact('user'));
        }

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
