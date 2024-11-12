<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProcessedPaper;
use App\Services\VultrService;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    private $vultrService;

    public function __construct(VultrService $vultrService)
    {
        $this->vultrService = $vultrService;
    }

    public function index()
    {
        return view('chatbot.index');
    }

    public function handleMessage(Request $request)
    {
        $message = $request->input('message');

        $combinedContent = "\nUser Message: " . $message;

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.vultr.key'),
            ])->post('https://api.vultrinference.com/v1/chat/completions', [
                'model' => 'llama2-13b-chat-Q5_K_M',
                'messages' => [['role' => 'user', 'content' => $combinedContent]],
                'max_tokens' => 512,
                'temperature' => 0.6,
            ]);

            return response()->json([
                 'message' => $response->json()['choices'][0]['message']['content'],
                 'timestamp' => now()->format('H:i')
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error processing your request.'], 500);
        }
    }
}
