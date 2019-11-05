<?php

namespace App\Http\Controllers;

use App\Events\PreorderAdded;
use App\Preorder;
use Illuminate\Http\Request;

class PreorderController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'name'     => 'required',
            'email'     => 'required',
        ]);
        $new_preorder = $request->only('name', 'email');
        $preorder = new Preorder( $new_preorder );
        $preorder->save();
        event(new PreorderAdded($preorder));
    }
}
