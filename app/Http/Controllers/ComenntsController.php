<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComenntsController extends Controller
{
    
    public function destroy($id) {
        $comment = Comment::findOrFail($id);

        if(Auth::id() == $comment->user->id){
            $comment -> delete();

            return redirect()->route('index');
        }
    }

}
