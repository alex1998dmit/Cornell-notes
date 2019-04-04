<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\User;
use App\Subject;
use Auth;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function create(Request $request)
    {
        //
        $user_id =Auth::user()->id;
        $user = User::find($user_id);
        $subjects = $user->subject;
        $currentSubject = ($request->subject_name) ? $request->subject_name : '';
        return view('notes.create')->with('subjects', $subjects)->with('currentSubject', $currentSubject);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:255',
            'theme' => 'required|max:255',
        ]);

        $user_id = Auth::user()->id;
        $isOpen = ($request->isOpen == 'true') ? 1 : 0;

        $subject_id = $this->getSubjectId($request->subject, $user_id);

        $note = Note::create([
            'subject_id' => $subject_id,
            'leftColumn' => ($request->leftColumn) ? $request->leftColumn : 'Здесь ваши вопросы и замечания по ходу лекции',
            'rightColumn' =>($request->rightColumn) ? $request->rightColumn : 'Здесь ваша основная лекция',
            'bottemColumn' => ($request->bottemColumn) ? $request->rightColumn : 'Здесь ваши выводы по работе',
            'theme' => $request->theme,
        ]);

        $note->user()->attach($user_id);
        flash('Запись добавлена')->success();

        return redirect()->route('user', ['id' => $user_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        return view('notes.single')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $this->validate($request,  [
            'theme' => 'required',
            'subject' => 'required',
         ]);

        $user_id =Auth::user()->id;
        $user = User::find($user_id);
        $note = Note::find($id);

        if(!$note) {
            abort(404);
        }

        $subject_id = $this->getSubjectId($request->subject, $user_id);

        foreach ($note->user as $user) {
            if($user->pivot->user_id === $user_id) {
                $note->theme = $request->theme;
                $note->leftColumn = $request->leftColumn;
                $note->rightColumn = $request->rightColumn;
                $note->bottemColumn = $request->bottemColumn;
                $note->subject_id = $subject_id;
                $note->save();
                flash('Запись успешно изменена')->success();
                return redirect()->route('user', ['id' => $user_id]);
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
        $user_id =Auth::user()->id;
        $note = Note::find($id);
        $note->delete();
        flash('Запись успешно удалена')->success();
        return redirect()->route('user', ['id' => $user_id]);
    }
}
