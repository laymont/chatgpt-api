<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatGptController extends Controller
{
    public function generate(Request $request)
    {
        $input = $request->input('input'); // El texto de entrada desde tu PC

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/engines/davinci-codex/completions', [
            'prompt' => $input,
            'max_tokens' => 100
        ]);

        return response()->json($response->json());
    }
}
