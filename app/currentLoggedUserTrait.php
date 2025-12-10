<?php

namespace App;

use Illuminate\Support\Facades\Request;

trait currentLoggedUserTrait
{
    public function currentLoggedUserId()
    {
        return $request->user()->id;
    }

    public function currentLoggedUserName()
    {
        return $request->user()->name;
    }
}
