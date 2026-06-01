<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatMessage;
use App\Services\GeminiService;

class ChatController extends Controller
{
    public function index()
    {
        // 1. All records for the stream
        $messages = ChatMessage::latest()->get()->reverse();
        
        // 2. ADVANCED PIPELINE: Real-time dynamic system state aggregates
        $totalRequests = ChatMessage::count();
        
        // Count how many times optimization modes were triggered
        $sqlOptimizations = ChatMessage::where('system_instruction', 'like', '%Inventory%')->count();
        $businessModels = ChatMessage::where('system_instruction', 'like', '%Software House%')->count();

        return view('chat', compact('messages', 'totalRequests', 'sqlOptimizations', 'businessModels'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'system_instruction' => 'nullable|string'
        ]);

        $systemInstruction = $request->input('system_instruction') ?? "You are OmniAgent, a helpful AI assistant.";

        // Execute service execution layer
        $ai = new GeminiService();
        $aiResponse = $ai->generateResponse($request->message, $systemInstruction);

        // Core persistence
        ChatMessage::create([
            'user_message'       => $request->message,
            'system_instruction' => $systemInstruction,
            'ai_response'        => $aiResponse
        ]);

        return redirect()->back();
    }
}