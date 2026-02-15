<?php

use App\Http\Controllers\admin\adminDashboard;
use App\Models\attributes;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/fetch/category', function () {
    $category = attributes::where('category_id', '1')->get();
    return response()->json($category, 200);
});
Route::get('/fetch/material-type', function () {
    $category = attributes::where('category_id', '2')->get();
    return response()->json($category, 200);
});
Route::get('/fetch/occasion', function () {
    $category = attributes::where('category_id', '3')->get();
    return response()->json($category, 200);
});
Route::get('/fetch/gemstone', function () {
    $category = attributes::where('category_id', '4')->get();
    return response()->json($category, 200);
});
Route::get('/fetch/color', function () {
    $category = attributes::where('category_id', '5')->get();
    return response()->json($category, 200);
});
Route::get('/fetch/style', function () {
    $category = attributes::where('category_id', '6')->get();
    return response()->json($category, 200);
});
Route::get('/fetch/tags', function () {
    $category = attributes::where('category_id', '7')->get();
    return response()->json($category, 200);
});
Route::post('/add_product', function (Request $request) {
    return response()->json($request, 200);
    if ($request->hasFile('img')) {
        foreach ($request->file('img') as $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
        }
        return response()->json(['success' => 'Files uploaded successfully']);
    } else {
        return response()->json(['error' => 'No files found'], 400);
    }
});
Route::get('/fetch/totalproduct/draft', function () {
    $draft = products::where('is_draft', 1)->where('is_discard', 0)->count();
    return response()->json(['count' => $draft], 200);
})->name('api.fetch.totalproduct.draft');
Route::get('/fetch/totalproduct/published', function () {
    $publish = products::where('is_draft', 0)->where('is_discard', 0)->count();
    return response()->json(['count' => $publish], 200);
})->name('api.fetch.totalproduct.published');
Route::get('/fetch/totalproduct/ondiscount', function () {
    $discount = products::where('discount', '>', 0)->where('is_draft', 0)->where('is_discard', 0)->count();
    return response()->json(['count' => $discount], 200);
})->name('api.fetch.totalproduct.ondiscount');
Route::get('/fetch/totalproduct', function () {
    $total = products::count();
    return response()->json(['count' => $total], 200);
})->name('api.fetch.totalproduct');
