<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view customers', ['only' => ['index', 'data']]);
        $this->middleware('permission:edit customers', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete customers', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('admin.customers.index');
    }

    public function data(Request $request)
    {
        $query = Customer::query();
        
        return DataTables::of($query)
            ->addColumn('actions', function(Customer $customer) {
                $actions = '<div class="flex space-x-2">';
                if (auth()->user()->can('edit customers')) {
                    $actions .= '<a href="'.route('admin.customers.edit', $customer).'" class="px-3 py-1 bg-blue-500 text-white rounded text-sm hover:bg-blue-600">Edit</a>';
                }
                if (auth()->user()->can('delete customers')) {
                    $actions .= '<form method="POST" action="'.route('admin.customers.destroy', $customer).'" class="inline">
                        '.csrf_field().
                        method_field('DELETE').
                        '<button type="submit" class="px-3 py-1 bg-red-500 text-white rounded text-sm hover:bg-red-600 delete-customer">Delete</button>
                    </form>';
                }
                $actions .= '</div>';
                return $actions;
            })
            ->editColumn('created_at', function(Customer $customer) {
                return $customer->created_at->format('M d, Y');
            })
            ->editColumn('date_of_birth', function(Customer $customer) {
                return $customer->date_of_birth ? $customer->date_of_birth->format('M d, Y') : null;
            })
            ->rawColumns(['actions'])
            ->toJson();
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15|unique:customers,mobile,'.$customer->id,
            'email' => 'nullable|email|unique:customers,email,'.$customer->id,
            'date_of_birth' => 'required|date|before:today'
        ]);

        $customer->update($validated);
        return redirect()->route('admin.customers.index')->with('status', 'Customer updated successfully');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back()->with('status', 'Customer deleted successfully');
    }
}