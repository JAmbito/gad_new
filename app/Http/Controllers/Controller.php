<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Activitylogs;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    public function setLog($title, $action, $details) {
        $data = array(
            "title" => $title,
            "action" => $action,
            "details" => $details,
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id
        );

        Activitylogs::create($data);

        return "Logs Added";
    }
}
