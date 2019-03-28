<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\User;
use App\Subject;
use Auth;

class NotesController extends Controller
{
    public function getSubjectId($subject_name, $user_id)
    {
        if(Subject::where('name', '=', $subject_name)->exists()){
            $subject_id = Subject::where('name', '=', $subject_name)->first()->id;
        } else {
            $newSubject = Subject::create([
                'name' => $subject_name,
                'user_id' => $user_id,
            ]);
            $subject_id = $newSubject->id;
        }
        return $subject_id;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes  = Note::all();
        return response()->json($notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->middleware('auth');
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');
        $this->validate($request, [
            'subject' => 'required|max:255',
            'theme' => 'required|max:255',
        ]);

        $user_id = Auth::user()->id;
        $isOpen = ($request->isOpen == 'true') ? 1 : 0;

        $subject_id = $this->getSubjectId($request->subject, $user_id);

        $note = Note::create([
            'subject_id' => $subject_id,
            'isOpen' => $isOpen,
            'leftColumn' => $request->leftColumn,
            'rightColumn' =>$request->rightColumn,
            'bottemColumn' => $request->bottemColumn,
            'theme' => $request->theme,
        ]);

        $note->user()->attach($user_id);
        flash('Note had added')->success();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware('auth');
        $user_id =Auth::user()->id;
        $user = User::find($user_id);
        $note = Note::find($id);
        $subjects = $user->subject;

        if(!$note) {
            abort(404, 'Note is not exists');
        }

        foreach ($note->user as $user) {
            if($user->pivot->user_id === $user_id) {
                return view('notes.edit')->with('note', $note)->with('subjects', $subjects)->with('currentSubject', $note->subject->name);
            }
        }

        abort(403, 'Unauthorized action.');
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
        //
        $this->middleware('auth');

        $this->validate($request,  [
            'theme' => 'required',
            'subject' => 'required',
            'isOpen' => 'required'
         ]);

        $user_id =Auth::user()->id;
        $user = User::find($user_id);
        $note = Note::find($id);
        $isOpen = ($request->isOpen == 'true') ? 1 : 0;

        if(!$note) {
            abort(404);
        }

        $subject_id = $this->getSubjectId($request->subject, $user_id);

        foreach ($note->user as $user) {
            if($user->pivot->user_id === $user_id) {
                $note->isOpen = $isOpen;
                $note->theme = $request->theme;
                $note->leftColumn = $request->leftColumn;
                $note->rightColumn = $request->rightColumn;
                $note->bottemColumn = $request->bottemColumn;
                $note->subject_id = $subject_id;
                $note->save();
                flash('Note had changed')->success();
                return redirect()->route('home');
            }
        }

        abort(403, 'Unauthorized action.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
