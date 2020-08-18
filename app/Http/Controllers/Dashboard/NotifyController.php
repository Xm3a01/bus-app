<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function getnotify()
    {
        $notify = \Auth::user()->unreadnotifications;
        return $notify;
    }

    public function date(Request $request)
    {
        $noty = \Auth::user()->unreadnotifications()->find($request->date);
        return ''.$noty->created_at->diffForHumans();
    }
}
