<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    protected function ensureAdmin()
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        if (! Auth::user()->is_admin) {
            abort(403, 'Only admin users may access this page.');
        }
    }

    public function index()
    {
        $response = $this->ensureAdmin();
        if ($response) {
            return $response;
        }

        return view('admin.index');
    }

    public function data(Request $request, $table)
    {
        $response = $this->ensureAdmin();
        if ($response) {
            return $response;
        }

        $allowed = [
            'products' => Product::query(),
            'orders' => Order::with('items'),
            'order-items' => OrderItem::with(['order', 'product']),
            'users' => User::query(),
            'admins' => User::where('is_admin', true),
            'messages' => ContactMessage::query(),
        ];

        if (! isset($allowed[$table])) {
            abort(404);
        }

        if ($table === 'products') {
            $query = $allowed[$table];
            if ($request->filled('name')) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            if ($request->filled('price_min')) {
                $query->where('price', '>=', $request->price_min);
            }
            if ($request->filled('price_max')) {
                $query->where('price', '<=', $request->price_max);
            }
            if ($request->filled('stock_min')) {
                $query->where('stock', '>=', $request->stock_min);
            }
            if ($request->filled('stock_max')) {
                $query->where('stock', '<=', $request->stock_max);
            }
            $allowed[$table] = $query;
        }

        return DataTables::of($allowed[$table])->toJson();
    }

    public function showReply(ContactMessage $message)
    {
        $response = $this->ensureAdmin();
        if ($response) {
            return $response;
        }

        return view('admin.reply', compact('message'));
    }

    public function storeReply(Request $request, ContactMessage $message)
    {
        $response = $this->ensureAdmin();
        if ($response) {
            return $response;
        }

        $data = $request->validate([
            'reply' => 'required|string|max:2000',
        ]);

        $message->update([
            'reply' => $data['reply'],
            'replied_at' => now(),
        ]);

        return redirect()->route('admin.index')->with('success', 'Reply sent successfully.');
    }

    public function showUploadImage()
    {
        $response = $this->ensureAdmin();
        if ($response) {
            return $response;
        }

        $products = Product::all();
        return view('admin.upload-image', compact('products'));
    }

    public function storeUploadImage(Request $request)
    {
        $response = $this->ensureAdmin();
        if ($response) {
            return $response;
        }

        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::find($data['product_id']);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $product->update(['image_url' => 'images/' . $imageName]);

        return redirect()->route('admin.upload-image')->with('success', 'Image uploaded successfully.');
    }
}
