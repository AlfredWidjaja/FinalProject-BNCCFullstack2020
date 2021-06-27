<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use App\Thread;
    use App\Reply;
    use App\User;
    class ThreadController extends Controller
    {

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $threads = Thread::all();
            return view('/threadList', compact('threads'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view ('/newThread');
        }

        public function createrep($id)
        {
            $threads = Thread::where('id', $id)->first();
            return view('/newReply', compact('threads'));
        }

        public function creatererep($id)
        {
            $reply = Reply::where('id', $id)->first();
            return view('/newReplayReplay', compact('reply'));
        }
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            Thread::create([
                'user_id'=>$request->user_id,
                'title' => $request->title,
                'description' => $request->description,
                'tag_id'=>1,
                'time' => date('Y-m-d H:i:s')
            ]);
            return redirect(url('/threadList'));
        }

        //Store in reply
        public function storerep(Request $request, $id){

            $threads = Thread::where('id', $id)->first();
            Reply::create([
                'title' => $request->title,
                'user_id' => $request->user_id,
                'thread_id' => $threads->id,
                'description' => $request->description,
                'time' => date('Y-m-d H:i:s')
            ]);
            return redirect(url('/threadList'));
        }

        public function storererep(Request $request, $id){
            $reply = Reply::where('id', $id)->first();
            Reply::create([
                'title' => $request->title,
                'user_id' => $request->user_id,
                'thread_id' => $reply->thread_id,
                'reply_id' => $reply->id,
                'description' => $request->description,
                'time' => date('Y-m-d H:i:s')
            ]);
            return redirect(url('/threadList'));
        }
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            /* Task 15 Laravel CRUD
            $pertanyaan = DB::table('pertanyaan')->where('id', $id)->first(); */
            $threads = Thread::where('id', $id)->first();
            $reply = Reply::all();
            return view('/showThread', compact('threads', 'reply'));
        }

        public function showrep($id)
        {
            $threads = Thread::where('id', $id)->first();
            $reply = Reply::where('id', $id)->get();
            return view('/showReply', compact('threads','reply'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            /* Task 15 Laravel CRUD
            $pertanyaan = DB::table('pertanyaan')->where('id', $id)->first(); */
            $threads = Thread::where('id', $id)->first();
            $threads->close="";
            return view('/updateThread', compact('threads'));
        }

        public function editrep($id){
            $reply = Reply::where('id', $id)->first();
            return view('/updateReply', compact('reply'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            /* Task 15 Laravel CRUD
            $pertanyaan = DB::table('pertanyaan')->where('id', $id)->update([
                                'id_pengguna' => 1,
                                'judul' => $request->judul,
                                'isi' => $request->isi,
                                'time' => date('Y-m-d H:i:s')
                            ]); */
            $threads = Thread::where('id', $id)->first();
            $threads->title = $request->title;
            $threads->description = $request->description;
            $threads->close = $request->close;
            $threads->save();
            return redirect('/threadList');
        }

        public function updaterep(Request $request, $id)
        {
            $reply = Reply::where('thread_id', $id)->first();
            $reply->title = $request->title;
            $reply->description = $request->description;
            $reply->save();
            return redirect('/threadList');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            DB::table('reply')->where('thread_id', $id)->delete();
            Thread::find($id)->delete();
            return redirect('/threadList');
        }

        public function destroyrep($id)
        {
            Reply::find($id)->delete();
            return redirect('/threadList');
        }

    }

?>
