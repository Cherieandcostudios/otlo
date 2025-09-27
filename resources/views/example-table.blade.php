@extends('layouts.admin')
@section('title','Categories')
@section('content')

<!-- Include responsive table CSS -->
<link rel="stylesheet" href="{{ asset('css/responsive-tables.css') }}">

<div style="padding: 20px;">
  <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
    <h2 style="font-size: 24px; font-weight: bold;">Categories</h2>
    <button style="background: #3b82f6; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">New Category</button>
  </div>

  <div style="background: white; border: 1px solid #e5e7eb; border-radius: 8px;">
    <div class="table-responsive">
      <table class="responsive-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Electronics</td>
            <td>Electronic devices and accessories</td>
            <td><span style="background: #10b981; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px;">Active</span></td>
            <td>2024-01-15</td>
            <td>
              <a href="#" style="color: #3b82f6; margin-right: 10px;">Edit</a>
              <a href="#" style="color: #ef4444;">Delete</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Clothing & Fashion</td>
            <td>Apparel and fashion accessories</td>
            <td><span style="background: #10b981; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px;">Active</span></td>
            <td>2024-01-14</td>
            <td>
              <a href="#" style="color: #3b82f6; margin-right: 10px;">Edit</a>
              <a href="#" style="color: #ef4444;">Delete</a>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>Home & Garden</td>
            <td>Home improvement and gardening supplies</td>
            <td><span style="background: #f59e0b; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px;">Inactive</span></td>
            <td>2024-01-13</td>
            <td>
              <a href="#" style="color: #3b82f6; margin-right: 10px;">Edit</a>
              <a href="#" style="color: #ef4444;">Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection