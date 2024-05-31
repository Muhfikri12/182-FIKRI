<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class FormController extends Controller
{
    public function showForm()
    {
        // return view('');
    }

    public function handleSubmit(Request $request)
    {
        $data = $request->all();

        Log::info('Form Data: ', $data);

        return response()->json($data);
    }



}