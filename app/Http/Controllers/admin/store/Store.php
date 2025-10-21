<?php

namespace App\Http\Controllers\admin\store;

use App\Http\Controllers\Controller;
use App\Models\attributes;
use App\Models\products;
use App\Models\products_imgs;
use Illuminate\Support\Facades\DB as FacadesDB;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class Store extends Controller
{
    public function add_product_page()
    {
        $checkIfExistDefaultPage = products::latest('id')->first();
        if (isset($checkIfExistDefaultPage)) {
            if ($checkIfExistDefaultPage->is_draft == 1 && $checkIfExistDefaultPage->is_discard == 1) {
                $id = $checkIfExistDefaultPage->id;
                $data = compact('id');
                return view('e-commerce.admin.store.add-product')->with($data);
            }
        }
        // create draft data
        $add_draft = new products;
        $add_draft->title = 'Untitled Product';
        $add_draft->description = 'No description yet.';
        $add_draft->price = 0;
        $add_draft->discount = null;
        $add_draft->discount_start = null;
        $add_draft->discount_end = null;
        $add_draft->delivery_charges = 0;
        $add_draft->stock_quantity = 0;
        $add_draft->sale_quantity = 0;
        $add_draft->category = 'Uncategorized';
        $add_draft->material_type = 'Not specified';
        $add_draft->color = 'Not specified';
        $add_draft->style = 'Not specified';
        $add_draft->occasion = 'General';
        $add_draft->gemstone = null;
        $add_draft->tag = null;
        $add_draft->is_draft = true;
        $add_draft->is_discard = true;
        $add_draft->save();

        // select last id
        $view_id = products::latest('id')->first();
        $id = $view_id->id;
        $data = compact('id');
        return view('e-commerce.admin.store.add-product')->with($data);
    }
    public function add_product_pics(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg|max:7048',
        ]);

        // img upload code
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        // add img path into database 
        $addimg = new products_imgs;
        $addimg->product_id = $request->input('product_id');
        $addimg->img_path = $imageName;
        $addimg->save();
        return response()->json(['success' => 200,'image_id' => $addimg->id]);
    }
    public function deleteImage($id)
    {
        $image = products_imgs::find($id);

    if ($image) {
        $path = public_path('images/' . $image->img_path);

        if (file_exists($path)) {
            unlink($path); 
        }

        $image->is_active = 0;
        $image->save();


        return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
    }

    return response()->json(['error' => 'Image not found'], 404);
    }
    public function add_product(Request $request)
    {
        $request->validate([
            'product_id'             => 'required|integer|min:1|',
            'product_title'             => 'required|string|max:255',
            'product_discription'       => 'required|string',
            'product_price'             => 'required|integer|min:0',
            'discount_applicable'          => 'nullable|boolean',
            'quantity'    => 'required|integer|min:0',
            'Delivery_charges'  => 'required|integer|min:0',
            'category'          => 'required|string|max:255',
            'material_type'     => 'required|string|max:255',
            'color'             => 'required|string|max:255',
            'style'             => 'required|string|max:255',
            'occasion'          => 'required|string|max:255',
            'gemstone'          => 'nullable|string|max:255',
            'tag'          => 'nullable|string|max:255',
        ]);
        $product = products::find($request->product_id);
        $product->title = $request->product_title;
        $product->description = $request->product_discription;
        $product->price = $request->product_price;
        $product->stock_quantity = $request->quantity;
        $product->delivery_charges = $request->Delivery_charges;
        $product->category = $request->category;
        $product->material_type = $request->material_type;
        $product->color = $request->color;
        $product->style = $request->style;
        $product->occasion = $request->occasion;
        $product->gemstone = $request->has('gemstone') ? $request->gemstone : null;
        $product->tag = $request->has('tag') ? $request->tag : null;
        $product->is_draft = 0;
        $product->is_discard = 0;
        if ($request->has('discount_applicable')) {
            $request->validate([
                'discount_percentage'          => 'required|integer|min:0',
                'isactive_discount_duration'    => 'nullable|boolean',
            ]);
            $product->discount = $request->has('discount_percentage') ? $request->discount_percentage : null;
        }
        if ($request->has('isactive_discount_duration')) {
            $request->validate([
                'time_range'    => 'required',
            ]);
            [$startDate, $endDate] = explode(' to ', $request->time_range);
            // Convert to Y-m-d if needed
            $start = Carbon::createFromFormat('d/m/y', trim($startDate))->format('Y-m-d');
            $end   = Carbon::createFromFormat('d/m/y', trim($endDate))->format('Y-m-d');
            $product->discount_start = $start;
            $product->discount_end = $end;
        }
        $product->save();
        echo 'done';
        // return redirect('/admin/product');
    }
    public function draft_product(Request $request)
    {
        $request->validate([
            'product_id'             => 'required|integer|min:1|',
            'product_title'             => 'required|string|max:255',
            'product_discription'       => 'required|string',
            'product_price'             => 'required|integer|min:0',
            'discount_applicable'          => 'nullable|boolean',
            'quantity'    => 'required|integer|min:0',
            'Delivery_charges'  => 'required|integer|min:0',
            'category'          => 'required|string|max:255',
            'material_type'     => 'required|string|max:255',
            'color'             => 'required|string|max:255',
            'style'             => 'required|string|max:255',
            'occasion'          => 'required|string|max:255',
            'gemstone'          => 'nullable|string|max:255',
            'tag'          => 'nullable|string|max:255',
        ]);
        $product = products::find($request->product_id);
        $product->title = $request->product_title;
        $product->description = $request->product_discription;
        $product->price = $request->product_price;
        $product->stock_quantity = $request->quantity;
        $product->delivery_charges = $request->Delivery_charges;
        $product->category = $request->category;
        $product->material_type = $request->material_type;
        $product->color = $request->color;
        $product->style = $request->style;
        $product->occasion = $request->occasion;
        $product->gemstone = $request->has('gemstone') ? $request->gemstone : null;
        $product->tag = $request->has('tag') ? $request->tag : null;
        $product->is_draft = 1;
        $product->is_discard = 0;
        if ($request->has('discount_applicable')) {
            $request->validate([
                'discount_percentage'          => 'required|integer|min:0',
                'isactive_discount_duration'    => 'nullable|boolean',
            ]);
            $product->discount = $request->has('discount_percentage') ? $request->discount_percentage : null;
        }
        if ($request->has('isactive_discount_duration')) {
            $request->validate([
                'time_range'    => 'required',
            ]);
            [$startDate, $endDate] = explode(' to ', $request->time_range);
            // Convert to Y-m-d if needed
            $start = Carbon::createFromFormat('d/m/y', trim($startDate))->format('Y-m-d');
            $end   = Carbon::createFromFormat('d/m/y', trim($endDate))->format('Y-m-d');
            $product->discount_start = $start;
            $product->discount_end = $end;
        }
        $product->save();
        echo 'done';
        // return redirect('/admin/product');
    }
    public function discard_product(Request $request)
    {
        $product = products::find($request->product_id);
        $product->is_discard = 1;
        $product->is_draft = 0;
        $product->save();

        $product_img = products_imgs::where('product_id', $request->product_id)->get();
        foreach ($product_img as $pro_img) {
            $filePath = public_path("images/$pro_img->img_path");
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $pro_img->is_active = 0;
            $pro_img->save();
        }
        echo 'done';
        // return redirect('/admin/product');
    }
    public function product()
    {
        return view('e-commerce.admin.store.products');
    }

    public function fetch_product_all(Request $request)
    {
        if ($request->ajax()) {
            $query = products::select('products.*', FacadesDB::raw('(SELECT img_path FROM products_imgs WHERE products_imgs.product_id = products.id && products_imgs.is_active = 1 LIMIT 1) as img_path'))
                ->where('is_discard', '=', 0);

            switch ($request->productType) {
                case 'publish':
                    $query->where('is_draft', 0);
                    break;
                case 'draft':
                    $query->where('is_draft', 1);
                    break;
                default:
                    $query->whereIn('is_draft', [0, 1]);
                    break;
            }

            return DataTables::of($query)
                ->filter(function ($q) use ($request) {
                    if (!empty($request->search['value'])) {
                        $search = $request->search['value'];
                        $q->where(function ($sub) use ($search) {
                            $sub->where('title', 'like', "%{$search}%")
                                ->orWhere('category', 'like', "%{$search}%")
                                ->orWhere('tag', 'like', "%{$search}%")
                                ->orWhere('price', 'like', "%{$search}%")
                                ->orWhere(FacadesDB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"), 'like', "%{$search}%");
                        });
                    }
                })
                ->addColumn('image', function ($row) {
                    if ($row->img_path) {
                        return '<img src="' . asset("images/" . $row->img_path) . '" width="30" height="30" class="rounded" alt="Product Image">';
                    }
                    return '<img src="' . asset("assets/img/default-img/C101307_Image_01.jpg") . '" width="30" height="30" class="rounded" alt="No Image Found">';
                })
                ->addColumn('product', fn($product) => $product->title)
                ->addColumn('price', fn($product) => '$' . $product->price)
                ->addColumn('category', fn($product) => $product->category)
                ->addColumn('tags', fn($product) => $product->tag)
                ->addColumn('published_on', fn($product) => $product->created_at->format('M d, h:i A'))
                ->addColumn('action', function ($product) {
                    $url = route('admin.products.edit', ['id' => $product->id]);
                    return '<a href="' . $url . '">
                    <button class="btn btn-phoenix-info me-1 mb-1 rounded-pill" type="button">Edit</button>
                </a>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('e-commerce.admin.store.products');
    }
    public function edit_product($id)
    {
        $product = products::findOrFail($id);
        $images = products_imgs::where('product_id', $id)->get();

        return view('e-commerce.admin.store.add-product', compact('product', 'images','id'));
    }
    public function customer_details()
    {
        return view('e-commerce.admin.store.customer-details');
    }
    public function customer()
    {
        return view('e-commerce.admin.store.customers');
    }
    public function order_details()
    {
        return view('e-commerce.admin.store.order-details');
    }
    public function order()
    {
        return view('e-commerce.admin.store.orders');
    }
    public function refund()
    {
        return view('e-commerce.admin.store.refund');
    }
}
