<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Note;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Note as NoteResources;
use App\Http\Controllers\API\BaseController as BaseController;

class NoteController extends BaseController
{

    public function index()
    {
        $notes = Note::where('id', Auth::id())->get();
        return $this->sendResponse(NoteResources::collection($notes), 'All notes');
    }


    public function store(Request $request)
    {
        $input = $request->all();
       $validator=Validator::make($input , [
        'title'=> 'required',
        'content'=> 'required',

       ]);

       if ($validator->fails()) {
        return $this->sendError('Please validate error' ,$validator->errors() );
          }
    $note = Note::create($input);
    return $this->sendResponse(new NoteResources($note) ,'Note created successfully' );
    }



    public function show($id)
    {
        $note = Note::find($id);
        if ( is_null($note) ) {
            return $this->sendError('Note not found');
              }
              return $this->sendResponse(new NoteResources($note) ,'Note founded successfully' );

    }





    public function update(Request $request, Note $note)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
         'title'=> 'required',
         'content'=> 'required',

        ]);

        if ($validator->fails()) {
         return $this->sendError('Please validate error' ,$validator->errors() );
           }
     $note->title = $input['title'];
     $note->content = $input['content'];
     $note->save();

     return $this->sendResponse(new NoteResources($note) ,'Note updated successfully' );
    }


    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
        return $this->sendResponse(new NoteResources($note) ,'Note deleted successfully' );

    }
}
