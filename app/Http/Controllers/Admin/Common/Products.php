<?php
namespace App\Http\Controllers\Admin\Common;
use App\Model\Common\Author;
use App\Model\Common\Country;
use App\Model\Common\Brand;
use App\Model\Common\Category;
use App\Model\Common\Attribute;
use App\Model\Common\Publisher;
use App\Model\Common\Unit;
use App\Http\Controllers\Controller;
use App\SM\SM;
use App\Model\Common\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Products extends Controller
{
    public function index()
    {
        $data['rightButton']['iconClass'] = 'fa fa-plus';
        $data['rightButton']['text'] = 'Add Product';
        

      
        return view("nptl-admin/common/products/index", $data);
    }


      public function index22(Request $request){
        
        $edit = SM::check_this_method_access('products', 'edit') ? 1 : 0;
        $status_update = SM::check_this_method_access('products', 'status_update') ? 1 : 0;
        $delete = SM::check_this_method_access('products', 'destroy') ? 1 : 0;
        $per = $edit + $delete;
        $columns = array(
            0 => 'id',
            1 => 'title',
        );
        $totalData = Product::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        
        if (empty($request->input('search.value'))) {

            $products = Product::offset($start)
                ->limit($limit)
                //->orderBy($order, $dir)
                ->orderBy('id', 'desc')
                ->orderBy('title', 'desc')
                ->get();
            $totalFiltered = Product::count();
        } else {

            $search = $request->input('search.value');
            $products = Product::where('title', 'like', "%{$search}%")
                //                ->orWhere('branch', 'like', "%{$search}%")
                //                ->orWhere('account_no', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                //->orderBy($order, $dir)
                ->orderBy('id', 'desc')
                ->get();
            $totalFiltered = Product::where('title', 'like', "%{$search}%")->orderBy('id', 'DESC')->count();
        }
       $data = array();       

        if ($products) {
            foreach ($products as $product) {
                $nestedData['checkbox'] = '<label><input name="multi_select_product[]" type="checkbox" class="sub_chk" data-id="' . $product->id . '"></label>';
                $nestedData['id'] = $product->id;
                $nestedData['title'] = '<strong>' . $product->title . '</strong><br>SKU: ' . $product->sku . '<br>Qty: ' . $product->product_qty . '<br>Alert Qty: ' . $product->alert_quantity;
                if ($product->product_type == 2) {
                    if (count($product->attributeProduct) > 0) {
                        $attribute_data = '';
                        foreach ($product->attributeProduct as $attribute) {
                            $attribute_data .= $attribute->attribute->title . ', ' . $attribute->colorName->title . ', ' . $attribute->attribute_qty . ', ' . $attribute->attribute_price . '<br>';
                        }
                    }
                    if (!empty($attribute_title)) {
                        $nestedData['attributes'] = $attribute_title;
                        $nestedData['attributes'] = rtrim($attribute_title, ', ');
                    } else {
                        $nestedData['attributes'] = '';
                    }
                } else {
                    if (!empty($product->unit_id)) {
                        $unit = $product->unit->title;
                    } else {
                        $unit = '';
                    }
                    $nestedData['attributes'] = $product->product_weight . ' ' . $unit;
                }
                $nestedData['author'] = $product->author->title;
                $nestedData['image'] = '<img class="img-product" src="' . SM::sm_get_the_src($product->image, 80, 80) . '">';
                $sale_price = '';
                if ($product->sale_price > 0) {
                    $sale_price = '<br>Sale Price =' . $product->sale_price;
                }
                $nestedData['price'] = 'Regular Price =' . $product->regular_price . $sale_price;





                // if ($product->status == 1) {
                //     $selected1 = "Selected";
                // } else {
                //     $selected1 = '';
                // }
                // if ($product->status == 2) {
                //     $selected2 = "Selected";
                // } else {
                //     $selected2 = "";
                // }
                // if ($product->status == 3) {
                //     $selected3 = "Selected";
                // } else {
                //     $selected3 = "";
                // }
                // if ($product_status_update != 0) {
                //     $nestedData['status'] = '<select class="form-control change_status"
                //                             route="' . config('constant.smAdminSlug') . '/product_status_update' . '"
                //                             post_id="' . $product->id . '">
                //                         <option value="1" ' . $selected1 . '>Published </option>
                //                         <option value="2" ' . $selected2 . '>Pending </option>
                //                         <option value="3" ' . $selected3 . '>Canceled </option>
                //                         </select>';
                // }







                 
                if ($per != 0) {                   
                    if ($edit != 0) {
                        $edit_data = '<a href="'.route('editproduct',$product->id).'" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>';
                    } else {
                        $edit_data = '';
                    }
                    if ($delete != 0) {
                        $delete_data = '<a href="' . route('deleteproduct',$product->id). '" title="Delete" class="btn btn-xs btn-default delete_data_row" delete_message="Are you sure to delete this data?" delete_row="tr_' . $product->id . '"><i class="fa fa-times"></i></a> ';
                    } else {
                        $delete_data = '';
                    }
                    $nestedData['action'] = $edit_data . ' ' . $delete_data;
                } else {
                    $nestedData['action'] = '';
                }
                $data[] = $nestedData;

            }
        }
       
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($json_data);
    }



    public function create()
    {
        $data['rightButton']['iconClass'] = 'fa fa-list';
        $data['rightButton']['text'] = 'Product List';
        $data['rightButton']['link'] = 'products';
        $data["all_categories"] = Category::where("parent_id", 0)->get();
        $data["size_lists"] = Attribute::Size()->orderBy('title')->pluck('title', 'id');
        $data["color_lists"] = Attribute::Color()->orderBy('title')->pluck('title', 'id');
        $data["all_brands"] = Brand::orderBy('title')->pluck('title', 'id');
        $data["all_units"] = Unit::orderBy('title')->pluck('title', 'id');
        $data["author_lists"] = Author::orderBy('title')->pluck('title', 'id');
        $data["publisher_lists"] = Publisher::orderBy('title')->pluck('title', 'id');
        $data["country_lists"] = Country::orderBy('name')->pluck('name', 'id');

// dd($data);
        return view("nptl-admin/common/products/create", $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'title' => 'required',
        ]);

        
        $product = new Product();
        $product->title = $request->input("title");
        $product->short_description = $request->input("short_description", "");
        $product->long_description = $request->input("long_description", "");
       
       
        $product->long_description = $request->long_description;


        $product->sku = $request->input("sku", "");
        $product->stock_status = $request->input("stock_status", "");
        $product->tax_class = $request->input("tax_class", "");
        $product->regular_price = $request->input("regular_price", "");
        $product->sale_price = $request->input("sale_price", "");
        $product->brand_id = $request->input("brand_id", "");
        $product->product_qty = $request->input("product_qty", "");
        $product->alert_quantity = $request->input("alert_quantity", "");
        $product->product_weight = $request->input("product_weight", "");
        $product->unit_id = $request->input("unit_id", "");
        $product->product_model = $request->input("product_model", "");
        $product->product_type = $request->input("product_type", "");
        $product->author_id = $request->input("author_id", "");
        $product->publisher_id = $request->input("publisher_id", "");
        $product->isbn = $request->input("isbn", "");
        $product->edition_date = $request->input("edition_date", "");
        $product->number_of_pages = $request->input("number_of_pages", "");
        $product->country_id = $request->input("country_id", "");
        $product->language = $request->input("language", "");
        $product->seo_title = $request->input("seo_title", "");
        $product->meta_key = $request->input("meta_key", "");
        $product->meta_description = $request->input("meta_description", "");
        // dd($product);
        $product->read_a_little = SM::sm_serialize($request['read_a_little']);
        $slug = (trim($request->slug) != '') ? $request->slug : $request->title;
        $product->slug = SM::create_uri('products', $slug);
        $product->created_by = SM::current_user_id();

        $product->save();


        return redirect('admin/products/allproduct')->with('s_message', 'product create sucessfully!');
        
    }

    public function edit($id)
    
    {
        // dd($id);
        $data["product"] = Product::with("Unit","author")->find($id);
        // dd($data);
        if (!empty($data["product"])) {
            $data['rightButton']['iconClass'] = 'fa fa - list';
            $data['rightButton']['text'] = 'Product List';
            $data['rightButton']['link'] = 'products';
            $data['rightButton4']['iconClass'] = 'fa fa - eye';
            $data['rightButton4']['text'] = 'View';
            $data['rightButton4']['link'] = "products/";
       
            $data["all_categories"] = Category::where("parent_id", 0)->get();
            $data["size_lists"] = Attribute::Size()->orderBy('title')->pluck('title', 'id');
            $data["color_lists"] = Attribute::Color()->orderBy('title')->pluck('title', 'id');
            $data["all_brands"] = Brand::orderBy('title')->pluck('title', 'id');
            $data["all_units"] = Unit::orderBy('title')->pluck('title', 'id');
            $data["author_lists"] = Author::orderBy('title')->pluck('title', 'id');
            $data["publisher_lists"] = Publisher::orderBy('title')->pluck('title', 'id');
            $data["country_lists"] = Country::orderBy('name')->pluck('name', 'id');
            // dd($data);
            return view("nptl-admin.common.products.edit", $data);
        } else {
            return redirect(SM::smAdminSlug("admin/products/allproduct"))->with("w_message", "Product Not Found!");
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        
        $product = Product::find($id);
        $product->title = $request->input("title");
        $product->short_description = $request->input("short_description", "");
        $product->long_description = $request->input("long_description", "");
        $product->sku = $request->input("sku", "");
        $product->stock_status = $request->input("stock_status", "");
        $product->tax_class = $request->input("tax_class", "");
        $product->regular_price = $request->input("regular_price", "");
        $product->sale_price = $request->input("sale_price", "");
        $product->brand_id = $request->input("brand_id", "");
        $product->product_qty = $request->input("product_qty", "");
        $product->alert_quantity = $request->input("alert_quantity", "");
        $product->product_weight = $request->input("product_weight", "");
        $product->unit_id = $request->input("unit_id", "");
        $product->product_model = $request->input("product_model", "");
        $product->product_type = $request->input("product_type", "");
        $product->author_id = $request->input("author_id", "");
        $product->publisher_id = $request->input("publisher_id", "");
        $product->isbn = $request->input("isbn", "");
        $product->edition_date = $request->input("edition_date", "");
        $product->number_of_pages = $request->input("number_of_pages", "");
        $product->country_id = $request->input("country_id", "");
        $product->language = $request->input("language", "");
//        --------------
        $product->seo_title = $request->input("seo_title", "");
        $product->meta_key = $request->input("meta_key", "");
        $product->meta_description = $request->input("meta_description", "");
        // dd($product);
        $product->read_a_little = SM::sm_serialize($request['read_a_little']);
        $slug = (trim($request->slug) != '') ? $request->slug : $request->title;
        $product->slug = SM::create_uri('products', $slug);
        $product->created_by = SM::current_user_id();

        $product->update();


        return redirect('admin/products/allproduct')->with('s_message', 'product create sucessfully!');
    }
    public function destroy($id){
        $product = Product::find($id);
            if (!empty($product)) {
                if ($product->delete() > 0) {
                    return response(1);
                }
            }
    
            return response(0);
        
    }


}