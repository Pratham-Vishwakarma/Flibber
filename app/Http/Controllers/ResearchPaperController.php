<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchPaper;
use App\Models\ProcessedPaper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser as PdfParser;

class ResearchPaperController extends Controller
{
    /**
     * Display the research paper upload form.
     *
     * @return \Illuminate\View\View
     */
    public function showUploadForm()
    {
        return view('chatbot.research');
    }

    /**
     * Handle the research paper upload.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf|max:2048',  // Limit file type to PDF and size to 2MB
        ]);

        // Store the uploaded file in the 'public/papers' directory
        $path = $request->file('file')->store('papers', 'public');

        // Create a new research paper record in the database
        $researchPaper = ResearchPaper::create([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'file_path' => $path,
        ]);

        try {
                $parser = new PdfParser();
                $pdf = $parser->parseFile(storage_path('app/public/' . $path));
                $text = $pdf->getText();
        } catch (\Exception $e) {
                return back()->withErrors(['file' => 'Failed to parse the PDF file.']);
        }

        ProcessedPaper::create([
            'research_paper_id' => $researchPaper->id,
            'extracted_text' => $text,
        ]);

        return redirect()->route('papers.uploadForm')->with('success', 'Research paper uploaded successfully!');
    }

    public function index()
    {
        // Get all research papers uploaded by the logged-in user
        $papers = ResearchPaper::where('user_id', auth()->id())->get();

        // Return the view with the list of papers
        return view('papers.index', compact('papers'));
    }

    public function destroy($id)
    {
        $paper = ResearchPaper::findOrFail($id);

    // Delete the paper file if necessary
        Storage::delete($paper->file_path); // Assuming file_path holds the location of the uploaded file

    // Delete the record from the database
        $paper->delete();

        return redirect()->route('papers.index')->with('success', 'Research Paper deleted successfully');
   }

}
