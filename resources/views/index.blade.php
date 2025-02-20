@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">My Inventory</h2>

    <!-- Add Item Button -->
    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-success" onclick="addItem()">
            <i class="fas fa-plus"></i> Add Item
        </button>
    </div>

    <!-- Inventory Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Category ID</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="deleteItem(this)">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- JavaScript for Actions -->
<script>
    function addItem() {
        let table = document.getElementById("inventoryTable").getElementsByTagName('tbody')[0];
        let row = table.insertRow();
        let id = table.rows.length + 1;
        row.innerHTML = `<td>${id}</td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="text" class="form-control"></td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="deleteItem(this)">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </td>`;
    }

    function deleteItem(button) {
        let row = button.parentElement.parentElement;
        row.remove();
    }
</script>

<!-- Add FontAwesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
