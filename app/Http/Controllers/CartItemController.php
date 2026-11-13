<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Resources\CartItemResource;

class CartItemController extends Controller
{
    public function index(Request $request)
    {
        return CartItemResource::collection(
            CartItem::with(['user', 'product'])
                ->where('user_id', $request->user()->id)
                ->get()
        );
    }

    public function store(Request $request)
    {
        $cartItem = CartItem::create([
            'user_id' => $request->user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return (new CartItemResource(
            $cartItem->load(['user', 'product'])
        ))->response()->setStatusCode(201);
    }

    public function show(Request $request, CartItem $cartItem)
    {
        abort_if($cartItem->user_id !== $request->user()->id, 403);

        return new CartItemResource(
            $cartItem->load(['user', 'product'])
        );
    }

    public function update(Request $request, CartItem $cartItem)
    {
        abort_if($cartItem->user_id !== $request->user()->id, 403);

        $cartItem->update([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return new CartItemResource(
            $cartItem->load(['user', 'product'])
        );
    }

    public function destroy(Request $request, CartItem $cartItem)
    {
        abort_if($cartItem->user_id !== $request->user()->id, 403);

        $cartItem->delete();

        return response()->json([
            'message' => 'Cart item deleted successfully'
        ]);
    }
}