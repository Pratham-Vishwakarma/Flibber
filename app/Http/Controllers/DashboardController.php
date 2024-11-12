<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchPaper;

class DashboardController extends Controller
{

	public function index()
{
    // Fetch the user's uploaded papers
    $papers = Paper::where('user_id', auth()->id())->get(); // Assuming papers are associated with users

    // Pass papers data to the dashboard view
    return view('dashboard', compact('papers'));
}

}
