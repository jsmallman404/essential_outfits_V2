<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReturnRequest;
use App\Models\OrderItem;

class AdminReturnController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter', 'all');

        $returns = ReturnRequest::query()
            ->when($filter === 'requested', fn ($query) => $query->where('status', 'Pending'))
            ->when($filter === 'accepted', fn ($query) => $query->where('status', 'Accepted'))
            ->latest()
            ->paginate(10);

        return view('admin.returnsIndex', compact('returns', 'filter'));
    }

    public function show(ReturnRequest $returnRequest)
    {
        return view('admin.manageReturn', compact('returnRequest'));
    }

    public function accept(ReturnRequest $returnRequest)
    {
        $returnRequest->update(['status' => 'Accepted']);

        return redirect()->route('admin.returns.index')->with('success', 'Return request accepted.');
    }

    public function reject(ReturnRequest $returnRequest)
    {
        $returnRequest->update(['status' => 'Rejected']);

        return redirect()->route('admin.returns.index')->with('success', 'Return request rejected.');
    }
    public function markAsReceived(ReturnRequest $returnRequest)
    {
        if ($returnRequest->status == 'Accepted') {
            $returnRequest->update(['status' => 'Item Received']);

            return redirect()->route('admin.returns.index')->with('success', 'Return marked as received.');
        }

        return redirect()->route('admin.returns.index')->with('error', 'Return must be accepted first.');
    }
}