<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComenntsController extends Controller
{
    
    public function destroy($id) {

        $comment = Comment::findOrFail($id);

        if(Auth::id() !== $comment->user->id){
            return redirect()->route('index')
                        ->with('error', '許可されていない操作です');
        }
        
        $comment -> delete();
        return redirect()->route('index');
    
    }
        
}
