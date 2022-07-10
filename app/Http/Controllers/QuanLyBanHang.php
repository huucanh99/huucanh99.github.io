<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slide;
use App\Models\products;
use App\Models\type_products;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\customer;
use App\Models\bills;
use App\Models\bill_detail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class QuanLyBanHang extends Controller
{
    public function getIndex()
    {
        $sl = slide::all();
        $new_products = products::where("new",1)->paginate(4);
        $pro_products = products::where("promotion_price","!=", 0)->paginate(8);
        // return response()->json($new_products);
        return view("website.TrangChu", compact("sl", "new_products", "pro_products"));

    }
    public function getLoaisanpham($loai)
    {
        $sp_theoloai = products::where("id_type", "=", $loai )->get();
        $tenloai = type_products::where("id", "=", $loai )->get();
        $sp_khac = products::where("promotion_price", "!=", 0 )->paginate(6);
        $loai_sp = type_products::All();
        return view("website.loai_sanpham", compact("sp_theoloai", "tenloai", "sp_khac","loai_sp"));
    }
    public function getChitietsanpham($id)
    {
        $chitietsp = products :: where("id","=", $id)->first();
        $motasp = type_products::where("id", $chitietsp->id_type )->first();
        $sp_tuongtu = products:: where("id_type", $chitietsp->id_type)->paginate(6);
        return view("website.chitiet_sanpham", compact("chitietsp", "sp_tuongtu","motasp"));
    }
    public function getLienhe()
    {
        return view("website.lienhe");
    }
    public function getGioithieu()
    {
        return view("website.gioithieu");
    }

    public function getAddtoCart(Request $req,$id)
    {
        $product = products::find($id);
        $oldcart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDelItemCart($id)
    {
        $oldcart=Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout()
    {
        return view("website.dathang");
    }
    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');
        
        $cus = new customer;
        $cus->name = $req->name;
        $cus->gender = $req->gender;
        $cus->email = $req->email;
        $cus->address = $req->address;
        $cus->phone_number = $req->phone_number;
        $cus->note = $req->notes;
        $cus->save();

        $bill = new bills;
        $bill->id_customer = $cus->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach($cart->items as $key => $value)
        {
            $bd = new bill_detail;
            $bd->id_bill = $bill->id;
            $bd->id_product = $key;
            $bd->quantity = $value["qty"];
            $bd->unit_price = ($value["price"]/$value["qty"]);
            $bd->save();
        }
        Session::forget('cart');
        
        return view("website.thongbao");
    }
    public function getDangnhap(){
        return view("website.dangnhap");
    }

    public function postDangnhap(Request $rq)
    {
        $messege = [
            'name.required'=>'Tên kh được để trống!',
            'password.required'=>'password kh đc để trống!',
        ];
        $validator = Validator::make($rq->all(), [
            'name' => 'required',
            'password' => 'required',
        ],$messege);
        if ($validator->fails()) 
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        else 
        { 
            if(Auth::attempt(['username'=>$rq->name,'password'=>$rq->password]))
            {
                 
                return redirect()->back()->with('messege','tai khoan hoac mat khau khong dung');
                // if(Auth::users()->status!=1){
                //     return redirect()->back()->with('messege','tai khoan hoac mat khau khong dung');
                // }
                // else{
                //     return redirect()->route('TrangChu');
                // }
            }
            else{
                return redirect('/');
            }    
                   
        }
    }

    public function getSearch(Request $rq ){
        if($rq->key=="khuyen mai"){
            $product = products::where("promotion_price",">",0)->paginate(8);
        }
        else if($rq->key=="khong khuyen mai")
            $product = products::where("promotion_price",0)->paginate(8);
        else
            $product = products::where("name", "like", "%", $rq->key)
                                ->orwhere("unit_price", $rq->key)
                                ->orwhere("promotion_price", $rq->key)
                                ->paginate(8);
        return view("website.search", compact("product"));
    }

    public function getdangky(){
        return view('website.dangky');
    }
    public function postdangky(Request $rq){
        $messege = [
            'name.required'=>'Tên kh được để trống!',
            'name.max'=>'tên không quá 20 kí tự',
            'name.unique'=>'tên đăng nhập đã tồn tại!',
            'password.required'=>'password kh đc để trống!',
        ];
        $validator = Validator::make($rq->all(), [
            'name' => 'required|max:20|unique:users,username',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ],$messege);
        if ($validator->fails()) 
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else 
        {
            $user = new User;
            $user->username = $rq -> name;
            $user->password = $rq -> password;
            $user->save();
            return redirect()->back()->with('success', 'Đăng ký thành công');
        }              
        

}
  
}
