<?php

namespace App\Http\Controllers;

use App\User;
use App\Reply;
use App\Channel;
use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Notifications\NewReplyAdded;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('discussions.index')->with('discussions',Discussion::paginate(5));
    }

    public function reply(Request $request,$id)
    {
        $this->validate($request,[
            'content'   => 'required'
        ]);

        $replies = new Reply;
        $replies->content = $request->content;
        $replies->user_id = Auth::id();
        $replies->discussion_id = $id;
        $replies->save();

        // point
        $replies->user->point += 25;
        $replies->user->save();



        // notification when new reply in discussion being fllow
        $discussion = Discussion::find($id);

        //return array user has watcher
        // so, when user replies discussion, we need send notification to user has watcher
    
        $watchers   = array();

        foreach ($discussion->watchers as $w):  
            // loop user_id has watch push to $watchers
            array_push($watchers,User::find($w->user_id));
        endforeach;

        Notification::send($watchers,new NewReplyAdded($discussion));



        return redirect()->back()->with('status','Reply discussion successfully');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create')->with('channels',Channel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|min:5',
            'channel_id' => 'required',
            'content' => 'required|string|min:10'

        ]);

        $discussion = new Discussion;
        $discussion->user_id = Auth::user()->id;
        $discussion->channel_id = $request->channel_id;
        $discussion->title = $request->title;
        $discussion->slug = str_slug($request->title);
        $discussion->content = $request->content;
        $discussion->save();
        return redirect()->route('forums.index')->with('status','Created discussion successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $discussion = Discussion::where('slug',$slug)->first();
        
        return view('discussions.show')->with('discussion',$discussion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('discussions.edit')->with('channels',Channel::all())
                                         ->with('discussion', Discussion::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Discussion $discussion)
    {
        $this->validate($request,[
            'title' => [
                'required',
                'min:5',
                Rule::unique('discussions')->ignore($discussion->id, 'id'),
            ],
            'channel_id' => 'required',
            'content' => 'required|string|min:10'

        ]);

        $discussion = Discussion::find($discussion->id);
        $discussion->user_id = Auth::user()->id;
        $discussion->channel_id = $request->channel_id;
        $discussion->title = $request->title;
        $discussion->slug = str_slug($request->title);
        $discussion->content = $request->content;
        $discussion->save();
        return redirect()->route('forums.index')->with('status','Created discussion successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Discussion::find($id)->delete();
        return redirect()->route('forums.index')->with('status','Deleleted discussion successfully');
    }
}
