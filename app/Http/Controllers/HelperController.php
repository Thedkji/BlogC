<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class HelperController extends Controller
{
    public static function handleException(\Throwable $th)
    {
        Log::error($th->getMessage(), [
            'code' => $th->getCode(),
            'file' => $th->getFile(),
            'line' => $th->getLine(),
        ]);

        return back()->with('error', $th->getMessage() . ' ' . $th->getCode() . ' ' . $th->getFile()  . ' ' . $th->getLine());
    }
}
