<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Note;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller as Controller;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notes = Note::latest()->paginate(4);
        return view('notes.index')->with('notes', $notes)->with('user', Auth::user());

    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request )
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',

            ]);

        $notes = Note::create($request->all());


        return redirect()->route('notes.index')->with('success','Note created successfully');
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }


    public function update(Request $request, Note $note )
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $note->update($request->all());
        $note->save();
        return redirect()->route('notes.index')->with('success', "Note updated successfully");
    }

    public function destroy(Note $note)
    {

        $note->delete();
        return redirect()->route('notes.index')->with('success', "Note deleted successfully");
    }





}
