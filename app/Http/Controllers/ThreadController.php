<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

use App\Comment;
use App\Subject;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'thread.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Subject $subject )
    {
        $subject = Subject::find( $subject->id );

        return view( 'thread.create', compact( 'subject' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = Subject::find( $request[ 'subject_id' ] );

        $new_thread = Thread::create([
            'subject_id' => $subject->id,
            'title' => $request[ 'thread_title' ],
            'description' => $request[ 'thread_description' ],
            'author' => $request[ 'author_id' ]
        ]);

        $new_thread->save();

        return redirect()->route( 'subject.myThreads', compact( 'subject' ) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }

    public function myComments( Thread $thread )
    {
        $thread = Thread::find( $thread->id );

        $comments = Comment::where( 'thread_id', '=', $thread->id )->get();

        return view( 'thread.index', compact( 'thread', 'comments' ) );
    }
}
