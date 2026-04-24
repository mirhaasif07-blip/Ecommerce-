@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-sm">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Admin Panel</h1>
        <p class="text-gray-600 dark:text-gray-300 mt-2">View tables for products, orders, order items, users, admins, and contact messages.</p>
        <a href="{{ route('admin.upload-image') }}" class="bg-blue-500 dark:bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-600 dark:hover:bg-blue-500 transition mt-2 inline-block">Upload Product Image</a>
    </div>

    <div class="flex flex-wrap gap-2 mb-6">
        <button class="tab-button bg-gray-900 dark:bg-gray-700 text-white px-4 py-2 rounded-lg" data-tab="all">All</button>
        <button class="tab-button bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition" data-tab="products">Products</button>
        <button class="tab-button bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition" data-tab="orders">Orders</button>
        <button class="tab-button bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition" data-tab="order-items">Order Items</button>
        <button class="tab-button bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition" data-tab="users">Users</button>
        <button class="tab-button bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition" data-tab="admins">Admins</button>
        <button class="tab-button bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition" data-tab="messages">Messages</button>
    </div>

    <div class="overflow-x-auto">
        <div id="products-filters" class="mb-4 hidden">
            <form id="products-filter-form" class="flex flex-wrap gap-2 items-end">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label for="price_min" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Min Price</label>
                    <input type="number" name="price_min" id="price_min" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label for="price_max" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Max Price</label>
                    <input type="number" name="price_max" id="price_max" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label for="stock_min" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Min Stock</label>
                    <input type="number" name="stock_min" id="stock_min" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label for="stock_max" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Max Stock</label>
                    <input type="number" name="stock_max" id="stock_max" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Filter</button>
                <button type="button" id="clear-filters" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Clear</button>
            </form>
        </div>
        <table id="products-table" class="display w-full" style="width:100%"></table>
        <table id="orders-table" class="display w-full" style="width:100%"></table>
        <table id="order-items-table" class="display w-full" style="width:100%"></table>
        <table id="users-table" class="display w-full" style="width:100%"></table>
        <table id="admins-table" class="display w-full" style="width:100%"></table>
        <table id="messages-table" class="display w-full" style="width:100%"></table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const tables = {
        'products': {
            selector: '#products-table',
            ajax: {
                url: '{{ route('admin.data', ['table' => 'products']) }}',
                data: function(d) {
                    d.name = $('#products-filter-form input[name=name]').val();
                    d.price_min = $('#products-filter-form input[name=price_min]').val();
                    d.price_max = $('#products-filter-form input[name=price_max]').val();
                    d.stock_min = $('#products-filter-form input[name=stock_min]').val();
                    d.stock_max = $('#products-filter-form input[name=stock_max]').val();
                }
            },
            columns: [
                { title: 'ID', data: 'id' },
                { title: 'Name', data: 'name' },
                { title: 'Slug', data: 'slug' },
                { title: 'Price', data: 'price' },
                { title: 'Stock', data: 'stock' },
                { title: 'Created', data: 'created_at' },
            ]
        },
        'orders': {
            selector: '#orders-table',
            ajax: '{{ route('admin.data', ['table' => 'orders']) }}',
            columns: [
                { title: 'ID', data: 'id' },
                { title: 'Name', data: 'name' },
                { title: 'Email', data: 'email' },
                { title: 'Total', data: 'total' },
                { title: 'Status', data: 'status' },
                { title: 'Created', data: 'created_at' },
            ]
        },
        'order-items': {
            selector: '#order-items-table',
            ajax: '{{ route('admin.data', ['table' => 'order-items']) }}',
            columns: [
                { title: 'ID', data: 'id' },
                { title: 'Order ID', data: 'order_id' },
                { title: 'Product ID', data: 'product_id' },
                { title: 'Quantity', data: 'quantity' },
                { title: 'Price', data: 'price' },
                { title: 'Created', data: 'created_at' },
            ]
        },
        'users': {
            selector: '#users-table',
            ajax: '{{ route('admin.data', ['table' => 'users']) }}',
            columns: [
                { title: 'ID', data: 'id' },
                { title: 'Name', data: 'name' },
                { title: 'Email', data: 'email' },
                { title: 'Admin', data: 'is_admin' },
                { title: 'Created', data: 'created_at' },
            ]
        },
        'admins': {
            selector: '#admins-table',
            ajax: '{{ route('admin.data', ['table' => 'admins']) }}',
            columns: [
                { title: 'ID', data: 'id' },
                { title: 'Name', data: 'name' },
                { title: 'Email', data: 'email' },
                { title: 'Created', data: 'created_at' },
            ]
        },
        'messages': {
            selector: '#messages-table',
            ajax: '{{ route('admin.data', ['table' => 'messages']) }}',
            columns: [
                { title: 'ID', data: 'id' },
                { title: 'Name', data: 'name' },
                { title: 'Email', data: 'email' },
                { title: 'Message', data: 'message' },
                { title: 'Reply', data: 'reply' },
                { title: 'Replied At', data: 'replied_at' },
                { title: 'Created', data: 'created_at' },
                {
                    title: 'Actions',
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return '<a href="/admin/messages/' + row.id + '/reply" class="bg-blue-500 text-white px-2 py-1 rounded text-sm hover:bg-blue-600">Reply</a>';
                    }
                }
            ]
        },
    };

    const instances = {};
    Object.entries(tables).forEach(([key, config]) => {
        instances[key] = $(config.selector).DataTable({
            processing: true,
            serverSide: true,
            ajax: config.ajax,
            columns: config.columns,
            pageLength: 10,
            ordering: true,
            searching: true,
        });
    });

    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('bg-gray-900', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            button.classList.remove('bg-gray-200', 'text-gray-700');
            button.classList.add('bg-gray-900', 'text-white');
            const selected = button.dataset.tab;
            if (selected === 'all') {
                document.querySelectorAll('table').forEach(table => table.classList.remove('hidden'));
                document.getElementById('products-filters').classList.add('hidden');
                Object.values(instances).forEach(instance => instance.columns.adjust().draw(false));
            } else {
                document.querySelectorAll('table').forEach(table => table.classList.add('hidden'));
                document.querySelector(tables[selected].selector).classList.remove('hidden');
                if (selected === 'products') {
                    document.getElementById('products-filters').classList.remove('hidden');
                } else {
                    document.getElementById('products-filters').classList.add('hidden');
                }
                instances[selected].columns.adjust().draw(false);
            }
        });
    });

    $('#products-filter-form').on('submit', function(e) {
        e.preventDefault();
        instances['products'].draw();
    });

    $('#clear-filters').on('click', function() {
        $('#products-filter-form input').val('');
        instances['products'].draw();
    });
</script>
@endpush
