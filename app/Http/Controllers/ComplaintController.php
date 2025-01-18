<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Category;
use Illuminate\Http\Request;
use PDF;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = auth()->user()->complaints()->latest()->paginate(10);
        return view('complaints.index', compact('complaints'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('complaints.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'location' => 'required|string',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('complaints', 'public');
        }

        $data['user_id'] = auth()->id();
        $complaint = Complaint::create($data);

        return redirect()
            ->route('complaints.show', $complaint)
            ->with('success', 'Complaint submitted successfully!');
    }

    public function show(Complaint $complaint)
    {
        return view('complaints.show', compact('complaint'));
    }

    public function exportPdf()
    {
        $complaints = auth()->user()->complaints;
        $pdf = PDF::loadView('complaints.pdf', compact('complaints'));
        return $pdf->download('complaints.pdf');
    }
}
