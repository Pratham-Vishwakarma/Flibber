<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessedPaper extends Model
{

	 protected $fillable = [
        	'research_paper_id',  // Assuming this is a foreign key
        	'extracted_text',     // Add the field to the fillable array
    	];

	public function researchPaper()
	{
	    return $this->belongsTo(ResearchPaper::class);
	}

}
