<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Note;
use Validator;
use App\Http\Resources\Note as NoteResource;
use App\Http\Controllers\API\BaseController as BaseController;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();
        return $this->sendResponse(NotetResource::collection($notes),('All notes sent');
    }



    public function store(Request $request)
    {
        $input = $request->all();
       $validator = Validator::make($input , [
        'title'=> 'required',
        'content'=> 'required',

       ]);

       if ($validator->fails()) {
        return $this->sendError('Please validate error' ,$validator->errors() );
          }
    $note = Note::create($input);
    return $this->sendResponse(new NoteResource($note) ,'Note created successfully' );
    }



    public function show($id)
    {
        $note = Note::find($id);
        if ( is_null($note) ) {
            return $this->sendError('Product not found'  );
              }
              return $this->sendResponse(new NoteResource($note) ,'Note found successfully' );

    }





    public function update(Request $request, Note $note)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
         'title'=> 'required',
         'content'=> 'required'

        ]);

        if ($validator->fails()) {
         return $this->sendError('Please validate error' ,$validator->errors() );
           }
     $note->title = $input['title'];
     $note->content = $input['content'];
     $note->save();

     return $this->sendResponse(new NoteResource($note) ,'Note updated successfully' );
    }




    public function destroy($id)
    {
        $note->delete();
        return $this->sendResponse(new NoteResource($note) ,'Note deleted successfully' );

    }
}
