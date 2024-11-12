<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ResearchPaperController;
use App\Http\Controllers\CommunityController;

Route::middleware(['auth'])->group(function () {
    Route::post('/get-research-paper-details', [ChatbotController::class, 'getResearchPaperDetails']);
    Route::post('/chat-response', [ChatbotController::class, 'handleMessage']);
    Route::get('/community', [CommunityController::class, 'index'])->name('community');
    Route::delete('/papers/{paper}', [ResearchPaperController::class, 'destroy'])->name('papers.destroy');
    Route::get('/papers', [ResearchPaperController::class, 'index'])->name('papers.index');
    Route::post('/upload-paper', [ResearchPaperController::class, 'upload'])->name('papers.upload');
    Route::get('/upload-paper', [ResearchPaperController::class, 'showUploadForm'])->name('papers.uploadForm');
    Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot');
    Route::post('/chatbot/message', [ChatbotController::class, 'handleMessage']);
    Route::get('/api/vultr-key', function () {
        return response()->json(['vultr_key' => env('VULTR_API_KEY')]);
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
});

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
