<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchPaper;

class CommunityController extends Controller
{
    public function index()
    {
        // Get paginated research papers with associated user data
        $papers = ResearchPaper::with('user')->latest()->paginate(10);

        return view('community.index', compact('papers'));
    }
}
