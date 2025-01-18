<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $complaints = Complaint::with(['user', 'category'])->latest()->paginate(10);
        return view('admin.dashboard', compact('complaints'));
    }

    public function updateStatus(Request $request, Complaint $complaint)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed'
        ]);

        $complaint->update(['status' => $request->status]);
        return back()->with('success', 'Status updated successfully!');
    }

    public function storeResponse(Request $request, Complaint $complaint)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        Response::create([
            'complaint_id' => $complaint->id,
            'user_id' => auth()->id(),
            'content' => $request->content
        ]);

        return back()->with('success', 'Response added successfully!');
    }
}