<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function throwAndGoBack($e)
    {
        $message = sprintf(
            "Error - Message: %s File: %s Line: %s",
            $e->getMessage(),
            $e->getFile(),
            $e->getLine()
        );
        Log::error($message);
        return redirect()->back()->withError("There was a problem loading the event.");
    }
}
