<?php

namespace App\Http\Controllers\admin\settings;

use App\Http\Controllers\Controller;
use App\Models\attributes;
use Illuminate\Http\Request;

class Settings extends Controller
{
    public function add_new_category_page()
    {
        return view('e-commerce.admin.settings.add-new-category');
    }
    public function add_new_category(Request $request)
    {
        $request->validate([
            'attribute_type' => ['required', 'array', 'min:1'],
            'attribute_name' => ['required', 'array', 'min:1'],
            'attribute_type.*' => ['required', 'integer'],
            'attribute_name.*' => ['required', 'string', 'regex:/^[A-Za-z\s]+$/'],
        ], [
            'attribute_name.*.required' => 'attribute_name field is required.',
            'attribute_name.*.alpha' => 'The attribute_name may only contain letters.',
        ]);

        $alreadyValExist = false;
        for ($i = 0; $i < count($request->attribute_name); $i++) {
            if (isset($request->attribute_type[$i]) && isset($request->attribute_name[$i])) {
                $checkifexistattr = attributes::where('category_id', $request->attribute_type[$i])->where('attribute_name', $request->attribute_name[$i])->first();
                if (!isset($checkifexistattr)) {
                    $newAttribute = new attributes;
                    $newAttribute->category_id = $request->attribute_type[$i];
                    $newAttribute->attribute_name = $request->attribute_name[$i];
                    $newAttribute->save();
                } else {
                    $alreadyValExist = true;
                }
            }
        }
        if ($alreadyValExist) {
            $msg1 = 'Success: attributes updated successfully & Some values already exist, so they were not added.';
        } else {
            $msg1 = 'Success: Add Attributes successfully!';
        }
        $data = compact('msg1');
        return view('e-commerce.admin.settings.add-new-category')->with($data);
    }
}
