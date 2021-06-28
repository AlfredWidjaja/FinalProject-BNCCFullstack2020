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

        //Show all thread available
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

        //create Thread
        public function create()
        {
            return view ('/newThread');
        }

        //Create reply
        public function createrep($id)
        {
            $threads = Thread::where('id', $id)->first();
            return view('/newReply', compact('threads'));
        }

        //Create reply to reply other
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

        //Store created thread
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

        //Store created reply
        public function storerep(Request $request, $id){

            $threads = Thread::where('id', $id)->first();
            Reply::create([
                'title' => $request->title,
                'user_id' => $request->user_id,
                'thread_id' => $threads->id,
                'description' => $request->description,
                'time' => date('Y-m-d H:i:s')
            ]);
            return redirect(url("/threadList/$threads->id"));
        }

        //Store created reply to reply
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
            $threads = Thread::where('id', $reply->thread_id)->first();
            return redirect(url("threadList/$threads->id"));
        }
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */

        //to Show reply detail
        public function show($id)
        {
            $threads = Thread::where('id', $id)->first();
            $reply = Reply::all();
            return view('/showThread', compact('threads', 'reply'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */

        //To open edit page for thread
        public function edit($id)
        {
            $threads = Thread::where('id', $id)->first();
            $threads->close="";
            return view('/updateThread', compact('threads'));
        }

        //To open edit page for reply
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

        //Store update thread data
        public function update(Request $request, $id)
        {
            $threads = Thread::where('id', $id)->first();
            $threads->title = $request->title;
            $threads->description = $request->description;
            $threads->close = $request->close;
            $threads->save();
            return redirect('/threadList');
        }

        //Store update reply data
        public function updaterep(Request $request, $id)
        {
            $reply = Reply::where('id', $id)->first();
            $reply->title = $request->title;
            $reply->description = $request->description;
            $reply->save();
            $threads = Thread::where('id', $reply->thread_id)->first();
            return redirect("/threadList/$threads->id");
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */

        //Delete thread data
        public function destroy($id)
        {
            DB::table('reply')->where('thread_id', $id)->delete();
            Thread::find($id)->delete();
            return redirect('/threadList');
        }

        //Delete reply data
        public function destroyrep($id)
        {
            $reply = Reply::where('id', $id)->first();
            Reply::find($id)->delete();
            $threads = Thread::where('id', $reply->thread_id)->first();
            return redirect("/threadList/$threads->id");
        }
    }
?>
