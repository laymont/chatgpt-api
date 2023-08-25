<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatGptController extends Controller
{
    public function generate(Request $request)
    {
        $input = $request->input('input'); // El texto de entrada desde tu PC

        $response = Http::post('https://api.openai.com/v1/engines/davinci-codex/completions', [
            'prompt' => $input,
            'max_tokens' => 100
        ], [
            'Authorization' => 'Bearer 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'
        ]);

        return response()->json($response->json());
    }
}
