<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AddRequest;
use App\Http\Requests\Product\EditRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Attribute;
use App\Models\Category_Product;
use App\Models\Images_Product;
use App\Models\Attribute_Product;
use App\Models\Log;
use DateTime,DB,Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->id == 1) {
            $product = Product::select('id','title','sale_price','status','featured','updated_at','user_id')->with(
                [
                    'category' => function ($query) {
                        $query->select('category_id','name');
                    },
                    'user' => function ($query) {
                        $query->select('id','firstname','lastname');
                    }
                ]
            )->orderBy('id','desc')->get()->toArray();
        } else {
            $product = Product::select('id','title','sale_price','status','featured','updated_at','user_id')->with(
                [
                    'category' => function ($query) {
                        $query->select('category_id','name');
                    },
                    'user' => function ($query) {
                        $query->select('id','firstname','lastname');
                    }
                ]
            )->where('user_id',Auth::user()->id)
            ->orderBy('id','desc')->get()->toArray();
        }
        return view('backend.module.product.list',['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$category     = Category::select('id','name','parent_id','position','status')->orderBy('position')->get()->toArray();
		$manufacturer = Manufacturer::select('id','name')->get()->toArray();
        return view('backend.module.product.add',['category' => $category,'manufacturer' => $manufacturer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $product                       = new Product;
        $product->serial               = $request->txtSerial;
        $product->title                = $request->txtTitle;
        $product->import_price         = $request->txtPriceImportDB;
        $product->sale_price           = $request->txtPriceSaleDB;
        $product->intro                = $request->txtIntro;
        $product->content              = $request->txtContent;
        $product->image                = $request->txtImage;
        $product->alt                  = $request->txtAlt;
        $product->viewed               = $request->txtViewed;
        $product->youtube              = $request->txtVideo;
        $product->access               = $request->sltAccess;
        $product->target_open          = $request->sltTarget;
        $product->meta_robot           = $request->sltMetaRobot;
        $product->status               = ($request->chkStatus == "on") ? "on" : "off";
        $product->featured             = ($request->chkFeatured == "on") ? "on" : "off";
        $product->slug                 = $request->txtSlug;
        $product->title_tag            = $request->txtMetaTitle;
        $product->meta_keywords_tag    = $request->txtMetaKeywords;
        $product->meta_description_tag = $request->txtMetaDescription;
        $product->user_id              = Auth::user()->id;
        $product->manufacturer_id      = $request->sltManufacturer;
        $product->created_at           = new DateTime();

        if (env('APP_LANG')) {
            $product->title_en                = $request->txtTitleEn;
            $product->intro_en                = $request->txtIntroEn;
            $product->content_en              = $request->txtContentEn;
            $product->slug_en                 = $request->txtSlugEn;
            $product->title_tag_en            = $request->txtMetaTitleEn;
            $product->meta_keywords_tag_en    = $request->txtMetaKeywordsEn;
            $product->meta_description_tag_en = $request->txtMetaDescriptionEn;
        }

        $check                         = $product->save();

        foreach ($request->chkCategory as $category) {
			$category_product              = new Category_Product;
			$category_product->category_id = $category;
			$category_product->product_id  = $product->id;
			$category_product->save();
        }

        if ($check){
            if (!empty($request->post_image)) {
                foreach ($request->post_image as $image) {
                    if (!empty($image["image"])) {
                        DB::table('images_product')->insert(
                            [
                                'images'     => $image["image"], 
                                'alt'        => $image["alt"],
                                'position'   => $image["sort_order"] , 
                                'product_id' => $product->id
                            ]
                        );
                    }
                }
            }
        }

        if ($check){
            if (!empty($request->post_attribute)) {
                foreach ($request->post_attribute as $attribute) {
                    if (!empty($attribute["id"]) && !empty($attribute["value"])) {
                        DB::table('attribute_product')->insert(
                            [
                                'attribute_id' => $attribute["id"], 
                                'value'        => $attribute["value"], 
                                'product_id'   => $product->id
                            ]
                        );
                    }
                }
            }
        }

        if ($check) {
            $log             = new Log;
            $log->title      = $request->txtTitle . " (".$product->id.")";
            $log->action     = "Add";
            $log->controller = "Product";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        if ($request->btnSave) {
            return redirect()->route('admin.product.create')->with('success', 'Add A Successful Product');
        } else {
            return redirect()->route('admin.product')->with('success', 'Add A Successful Product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$product      = Product::where('id',$id)->with(
            [
                'category' => function ($query) {
                    $query->select('category_id','name');
                },
                'user' => function ($query) {
                    $query->select('id','firstname','lastname');
                },
                'manufacturer' => function ($query) {
                    $query->select('id','name');
                },
                'product_image' => function ($query) {
                    $query->select('product_id','images','alt','position');
                },
                'product_image' => function ($query) {
                    $query->select('product_id','images','alt','position');
                }
            ]
        )->orderBy('id','desc')->firstOrFail()->toArray();

		$attribute      = Attribute_Product::where('product_id',$id)->with(['attribute' => function ($query) {
            $query->select('id','name');
        }])->get()->toArray();

		$name         = $product["title"] . " (". $product["serial"] .")";
		$image        = ($product["image"] == null) ? asset('backend/assets/images/upload.png') : $product["image"];
		$import_price = number_format($product["import_price"],"0",",",".");
		$sale_price   = number_format($product["sale_price"],"0",",",".");
		$intro        = $product["intro"];
		$content      = $product["content"];
		$manufacturer = $product["manufacturer"]["name"];
		if ($product["access"] == 0) {
            $access = "Public";
        } elseif ($product["access"] == 1) {
            $access = "Admin";
        } elseif ($product["access"] == 2) {
            $access = "Member";
        } else {
            $access = "Guest";
        }
		$open         = $product["target_open"];
		$viewed       = $product["viewed"];
		$video       = '<a href="'.$product["youtube"].'" target="_blank">Link</a>';
		$status       = $product["status"];
		$featured     = $product["featured"];
		$robot        = $product["meta_robot"];
		$title        = $product["title_tag"];
		$slug         = $product["slug"];
		$keywords     = $product["meta_keywords_tag"];
		$description  = $product["meta_description_tag"];
		if (empty($product["product_image"])) {
			$image_detail = '<strong>No Image Detail</strong>';
		} else {
			$image_detail = '<table class="table table-bordered">
				<tr>
					<td width="50%">Image</td>
					<td width="30%">Alt</td>
					<td width="10%">Position</td>
				</tr>';
			foreach ($product["product_image"] as $img) {
			$image_detail .= '<tr>
								<td><img src="'.$img["images"].'" class="img-responsive" /></td>
								<td>'.$img["alt"].'</td>
								<td>'.$img["position"].'</td>
							</tr>';
			}				
			$image_detail .= '</table>';
		}

		if (empty($attribute)) {
			$attribute_html = '<strong>No Attribute</strong>';
		} else {
			$attribute_html = '<table class="table table-bordered">
				<tr>
					<td width="50%">Attribute</td>
					<td width="50%">Value</td>
				</tr>';
			foreach ($attribute as $item) {
			$attribute_html .= '<tr>
								<td>'.$item["attribute"]["name"].'</td>
								<td>'.$item["value"].'</td>
							</tr>';
			}				
			$attribute_html .= '</table>';	
		}
		

        $html = '<div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">'.$name.'</h5>
            </div>

            <div class="modal-body">
                <div class="col-md-4">
                    <img class="img-responsive" id="main-image" src="'.$image.'" />
                </div>
                <div class="col-md-8">
                	<p><strong>Manufacturer : </strong>'.$manufacturer.'</p>
                    <p><strong>Import Price : </strong>'.$import_price.' - <strong>Sale Price : </strong>'.$sale_price.'</p>
                    <p><strong>Access : </strong>'.$access.'</p>
                    <p><strong>Target Open : </strong>'.$open.'</p>
                    <p><strong>Viewed : </strong>'.$viewed.'</p>
                    <p><strong>Link Youtube : </strong>'.$video.' </p>
                    <p><strong>Status : </strong>'.$status.'</p>
                    <p><strong>Featured : </strong>'.$featured.'</p>
                </div>
                <div class="col-md-12">
                    <p>'.$intro.'</p>
                    <p>'.$content.'</p>
                    <hr />
                </div>
                
                <div class="col-md-12">
                    <p><strong>Meta Robot : </strong>'.$robot.'</p>
                    <p><strong>URL Friendly : </strong>'.$slug.'</p>
                    <p><strong>Meta Title : </strong>'.$title.'</p>
                    <p><strong>Meta Tags : </strong>'.$keywords.'</p>
                    <p><strong>Meta Description : </strong>'.$description.'</p>
                    <hr />
                </div>
                <div class="col-md-12">
                    '.$image_detail.'
                    <hr />
                </div>
                <div class="col-md-12">
                    '.$attribute_html.'
                    <hr />
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>';
        return $html;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$product = Product::where('id',$id)->with(
    		[
    			'category' => function ($query) {
            		$query->select('category_id','name');
        		},
        		'attribute' => function ($query) {
            		$query->select('attribute_id','value');
        		}
        	]
        )->orderBy('id','desc')->first()->toArray();

        if (Auth::user()->id == 1 || Auth::user()->id == $product["user_id"]) {
            $category     = Category::select('id','name','parent_id','position','status')->orderBy('position')->get()->toArray();
            $manufacturer = Manufacturer::select('id','name')->get()->toArray();
            $images       = Product::find($id)->product_image()->get()->toArray();
            $attribute    = Attribute::select('id','name','parent_id')->get()->toArray();

    		$category_check = array();
            foreach ($product["category"] as $item) {
                $category_check[] = $item["category_id"];
            }
            return view('backend.module.product.edit',['category' => $category,'manufacturer' => $manufacturer,'images' => $images,'product' => $product,'category_check' => $category_check,'attribute' => $attribute]);
        } else {
            return redirect()->route('admin.product')->with('warning','You Do Not Have Level To Edit This Product');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $product                       = Product::findOrFail($id);
        $product->serial               = $request->txtSerial;
        $product->title                = $request->txtTitle;
        $product->import_price         = $request->txtPriceImportDB;
        $product->sale_price           = $request->txtPriceSaleDB;
        $product->intro                = $request->txtIntro;
        $product->content              = $request->txtContent;
        $product->image                = $request->txtImage;
        $product->alt                  = $request->txtAlt;
        $product->viewed               = $request->txtViewed;
        $product->youtube              = $request->txtVideo;
        $product->access               = $request->sltAccess;
        $product->target_open          = $request->sltTarget;
        $product->meta_robot           = $request->sltMetaRobot;
        $product->status               = ($request->chkStatus == "on") ? "on" : "off";
        $product->featured             = ($request->chkFeatured == "on") ? "on" : "off";
        $product->slug                 = $request->txtSlug;
        $product->title_tag            = $request->txtMetaTitle;
        $product->meta_keywords_tag    = $request->txtMetaKeywords;
        $product->meta_description_tag = $request->txtMetaDescription;
        $product->user_id              = Auth::user()->id;
        $product->manufacturer_id      = $request->sltManufacturer;
        $product->updated_at           = new DateTime();

        if (env('APP_LANG')) {
            $product->title_en                = $request->txtTitleEn;
            $product->intro_en                = $request->txtIntroEn;
            $product->content_en              = $request->txtContentEn;
            $product->slug_en                 = $request->txtSlugEn;
            $product->title_tag_en            = $request->txtMetaTitleEn;
            $product->meta_keywords_tag_en    = $request->txtMetaKeywordsEn;
            $product->meta_description_tag_en = $request->txtMetaDescriptionEn;
        }

        $check                         = $product->save();

		if ($check) {
			Category_Product::where('product_id', $id)->delete();
			foreach ($request->chkCategory as $category) {
				$category_product              = new Category_Product;
				$category_product->category_id = $category;
				$category_product->product_id  = $product->id;
				$category_product->save();
	        }
		}
        

        if ($check){
        	Images_Product::where('product_id', $id)->delete();
            if (!empty($request->post_image)) {
                foreach ($request->post_image as $image) {
                    if (!empty($image["image"])) {
                        DB::table('images_product')->insert(
                            [
                                'images'     => $image["image"], 
                                'alt'        => $image["alt"],
                                'position'   => $image["sort_order"], 
                                'product_id' => $product->id
                            ]
                        );
                    }
                }
            }
        }

        if ($check){
        	Attribute_Product::where('product_id', $id)->delete();
            if (!empty($request->post_attribute)) {
                foreach ($request->post_attribute as $attribute) {
                    if (!empty($attribute["id"]) && !empty($attribute["value"])) {
                        DB::table('attribute_product')->insert(
                            [
                                'attribute_id' => $attribute["id"], 
                                'value'        => $attribute["value"], 
                                'product_id'   => $product->id
                            ]
                        );
                    }
                }
            }
        }

        if ($check) {
            $log             = new Log;
            $log->title      = $product["title"]. " (".$product["id"].")";
            $log->action     = "Edit";
            $log->controller = "Product";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        if ($request->btnSave) {
            return redirect()->route('admin.product.edit',['id' => $id])->with('success', 'Update A Successful Product');
        } else {
            return redirect()->route('admin.product')->with('success', 'Update A Successful Product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if (Auth::user()->id == 1 || Auth::user()->id == $product["user_id"]) {
            $check   = $product->delete();
            if ($check) {
                $log             = new Log;
                $log->title      = $product["title"]. " (".$product["id"].")";
                $log->action     = "Delete";
                $log->controller = "Product";
                $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
                $log->created_at = new DateTime();
                $log->save();
            }
            return redirect()->route('admin.product')->with('success','Delete A Successful Product');
        } else {
            return redirect()->route('admin.product')->with('warning','You Do Not Have Level To Delete This Product');
        }
    }
}