@extends('layouts.admin')

@section('title', 'Customers')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b flex justify-between items-center">
        <h2 class="text-xl font-semibold">Customers</h2>
        <div class="text-sm text-gray-600">
            Total: <span class="font-semibold">{{ \App\Models\Customer::count() }}</span>
        </div>
    </div>
    
    <div class="p-6">
        <div class="table-responsive">
            <table id="customersTable" class="w-full border-collapse display" style="width:100%">
                <thead>
                    <tr class="border-b bg-gray-50">
                        <th class="text-left p-3 font-medium">ID</th>
                        <th class="text-left p-3 font-medium">Name</th>
                        <th class="text-left p-3 font-medium">Email</th>
                        <th class="text-left p-3 font-medium">Mobile</th>
                        <th class="text-left p-3 font-medium">Date of Birth</th>
                        <th class="text-left p-3 font-medium">Joined</th>
                        <th class="text-left p-3 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- DataTable will populate this -->
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $('#customersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('admin.customers.data') }}',
            type: 'GET'
        },
        columns: [
            { 
                data: 'id', 
                name: 'id',
                width: '60px'
            },
            { 
                data: 'name', 
                name: 'name'
            },
            { 
                data: 'email', 
                name: 'email',
                render: function(data) {
                    return data || '<span class="text-gray-400">Not provided</span>';
                }
            },
            { 
                data: 'mobile', 
                name: 'mobile'
            },
            { 
                data: 'date_of_birth', 
                name: 'date_of_birth',
                render: function(data) {
                    return data ? new Date(data).toLocaleDateString() : '<span class="text-gray-400">Not provided</span>';
                }
            },
            { 
                data: 'created_at', 
                name: 'created_at',
                render: function(data) {
                    return new Date(data).toLocaleDateString();
                }
            },
            { 
                data: 'actions', 
                name: 'actions', 
                orderable: false, 
                searchable: false,
                width: '120px'
            }
        ],
        responsive: true,
        pageLength: 25,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        order: [[0, 'desc']],
        language: {
            processing: 'Loading customers...',
            emptyTable: 'No customers found',
            zeroRecords: 'No matching customers found'
        },
        dom: '<"flex flex-col sm:flex-row justify-between items-center mb-4"<"mb-2 sm:mb-0"l><"mb-2 sm:mb-0"f>>rtip',
        initComplete: function() {
            // Style the search input
            $('.dataTables_filter input').addClass('px-3 py-2 border rounded-lg text-sm');
            $('.dataTables_length select').addClass('px-3 py-2 border rounded-lg text-sm');
        }
    });
    
    // Handle delete action
    $(document).on('click', '.delete-customer', function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete this customer?')) {
            const form = $(this).closest('form');
            form.submit();
        }
    });
});
</script>
@endpush
@endsection