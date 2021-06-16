<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Product;
use App\Models\Category;
use Session;
use DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function create(){
        return view('insertProduct') 
        ->with('languages',Language::all())
        ->with('categories',Category::all());;
    }

    public function store() {
        $r=request();
        $image=$r->file('product-image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();

        $addProduct=Product::create([
            'bookName'=>$r->bookName,
            'author'=>$r->author,
            'publisher'=>$r->publisher,
            'publishDate'=>$r->publishDate,
            'description'=>$r->description,
            'dimensions'=>$r->dimensions,   
            'categoryID'=>$r->category,
            'languageID'=>$r->language,
            'price'=>$r->price,
            'quantity'=>$r->quantity,
            'pages'=>$r->pages,
            'image'=>$imageName,
        ]);

        

        return redirect()->route('showProduct');
    }

    public function show() {
        $products=Product::paginate(12);
        return view('showProduct')->with('products',$products);
    }

    public function edit($id) {
        $products=Product::all()->where('id',$id);
        return view('editProduct')->with('products',$products)
                                ->with('languages',Language::all())
                                ->with('categories',Category::all());;
    }

    public function delete($id) {
        $products=Product::find($id);
        $products->delete();
        return redirect()->route('showProduct');
    }

    public function update() {
        $r=request();
        $products=Product::find($r->ID);
        if($r->file('product-image')!='') {
            $image=$r->file('product-image');
            $image->move('images',$image->getClientOriginalName());
            $imageName=$image->getClientOriginalName();
            $products->image=$imageName;
        }
        $products->bookName=$r->bookName;
        $products->author=$r->author;
        $products->publisher=$r->publisher;
        $products->publishDate=$r->publishDate;
        $products->description=$r->description;
        $products->dimensions=$r->dimensions;
        $products->languageID=$r->language;
        $products->categoryID=$r->category;
        $products->price=$r->price;
        $products->quantity=$r->quantity;
        $products->pages=$r->pages;
        $products->save();
        return redirect()->route('showProduct');
    }

    public function search() {
        $r=request();
        $keyword=$r->searchProduct;
        $products=DB::table('products')
        ->leftjoin('categories','categories.id','=','products.categoryID')
        ->select('categories.name as catname','categories.id as catid','products.*')
        ->where('products.name','like','%'.$keyword.'%')
        ->orWhere('products.description','like','%'.$keyword.'%')
        ->paginate(3);
        
        return view('/products')->with('products',$products);
    }

    public function showProducts() {
        $products=Product::paginate(12);
        return view('products')->with('products',$products);
    }

    public function showProductDetail($id) {
        $products=Product::all()->where('id',$id);
        return view('productDetail')->with('products',$products)
                                    ->with('categories',Category::all());
    }
}