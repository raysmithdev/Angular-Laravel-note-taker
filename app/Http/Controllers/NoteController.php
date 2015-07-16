<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Note;
use Input;
use Response;

class NoteController extends Controller
{
    /**
    * Send back all notes as JSON
    *
    * @return Response
    */
    public function index()
    {
        return Response::json(Note::orderBy('created_at', 'DESC')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public static function store()
    {
        $note = new Note;
        $note->note = Input::get('note');
        $note->subject = Input::get('subject');
        $note->save();

        return Response::json(array('success' => true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Note::destroy($id);

        return Response::json(array('success' => true));
    }

}
