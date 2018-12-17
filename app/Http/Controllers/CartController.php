<?php

namespace App\Http\Controllers;

use AllInOne;
use Auth;
use DeviceType;
use ExtraPaymentInfo;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Mockery\CountValidator\Exception;
use PaymentMethod;
use PaymentMethodItem;

class CartController extends Controller
{
    private $serviceURL = "http://payment-stage.allpay.com.tw/Cashier/AioCheckOut";//https://payment.allpay.com.tw/Cashier/AioCheckOut
    private $hashKey = "5294y06JbISpM5x9";//nsOQhWb14WUyJCjc
    private $hashIv = "v77hoKGq4kWxNNIS";//t9AtJmc5GrdqF1KM
    private $merchanID = "2000132";//1030455
    public function __construct()
    {
        $this->middleware('auth',['only'=>['payment']]);
        $this->middleware('order_owner',['only'=>['cartdone']]);
        $this->middleware('authCheck',['only'=>['orderList','delOrder']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    Cart::destroy();
        $cart = Cart::content();
        $subtotal = 0;
        foreach($cart as $row){
            $subtotal += $row->subtotal;
        }
        debug($cart);
        return view("cart.cart",compact('cart','subtotal'));
    }

    public function addCart(Request $request)
    {
        debug($request->all());
        $optArr= json_decode($request->optionJson,true);
        Cart::add(array('id' => $request->id, 'name' => $request->name,
            'qty' => (int)$request->qty, 'price' => (int)$request->price,
            'options' => $optArr));
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->rowid);
        echo "OK";
    }

    public function updateCart(Request $request)
    {
        Cart::update($request->rowid,array('qty' => $request->qty));
        echo "OK";
    }

    public function cartProduct(Request $request ,$productId,$cartId)
    {
        $productData = App\Product::findOrFail($productId);
        $cart = Cart::get($cartId);
        //debug($cart,$productData);
        return view("cart.cartproduct",compact('productData','cart'));
    }

    public function updateCartAll(Request $request)
    {
        $optArr= json_decode($request->optionJson,true);
        Cart::update($request->rowid,array('id' => $request->id, 'name' => $request->name,
            'qty' => (int)$request->qty, 'price' => (int)$request->price,
            'options' => $optArr));
        echo "OK";
    }

    public function payment()
    {
        if(\Cookie::get('key')=="payment"){
            \Cookie::queue(\Cookie::forget('key'));
        }

        //復製cart內容給cookie，因為cart套件在order時 刪除有bug...
        $cart = Cart::content();
        \Cookie::queue('cart', $cart, 10);

        //清空購物車
        //$cart = \Cart::destroy();
        return view('cart.payment');
    }

    public function order(Request $request)
    {
        \Cookie::queue(\Cookie::forget('cart'));
        $cart = \Cookie::get('cart');
        //$cart = Cart::content();
        $subtotal = 0;
        foreach($cart as $row){
            $subtotal += $row->subtotal;
        }
        $returnURL = env('BASE_URL', 'localhost')."/cutestore/pay";
        $merchantTradeNo = "A".date("YmdHis", time());
        $clientBackURL = env('BASE_URL', 'localhost')."/cutestore/cartdone/".$merchantTradeNo;
        $merchantTradeDate = date('Y/m/d H:i:s');
        $totalAmount = $subtotal+60;
        $tradeDesc = "cutestore";
        $choosePayment = $request->pay_type;
        if($choosePayment=="ATM"){
            $paymentInfoURL = env('BASE_URL', 'localhost')."/cutestore/atm";
        }elseif($choosePayment=="CVS"||$choosePayment=="BARCODE"){
            $paymentInfoURL = env('BASE_URL', 'localhost')."/cutestore/cvs";
        }else{
            $paymentInfoURL = "";
        }
        $remark = $request->remark;
        $email = $request->email;
        $phoneNo = $request->phone;
        $userName = $request->name;
        $address = $request->address;

        if($choosePayment=="Credit"){
            $paytype=1;
        }elseif($choosePayment=="WebATM"){
            $paytype=2;
        }elseif($choosePayment=="ATM"){
            $paytype=3;
        }elseif($choosePayment=="CVS"){
            $paytype=4;
        }elseif($choosePayment=="BARCODE"){
            $paytype=5;
        }elseif($choosePayment=="Alipay"){
            $paytype=6;
        }

        //add order to database
        $order = App\Order::create(['ordno'=>$merchantTradeNo,'order_date'=>$merchantTradeDate,
            'order_price'=>$totalAmount,'order_memo'=>$remark,'pay_type'=>$paytype,'email'=>$email,'phone'=>$phoneNo,
            'name'=>$userName,'address'=>$address,'user_id'=> Auth::user()->id]);

        //產品資訊
        $items=[];
        foreach($cart as $cartKey => $cartValue){
            $op = "";
            foreach($cartValue->options as $opKey => $opValue){
                if($opKey!="src"){
                    $op .= "|".$opValue;
                }
            }
            array_push($items,array("Name"=>$cartValue->name.$op,"Price"=>(int)$cartValue->price,
                'Currency'=>'NT','Quantity'=>(int)$cartValue->qty,'URL'=>""));
            //add order-details database
            $orderDetail = App\OrderDetail::create(['order_id'=>$order->id,'product_id'=>$cartValue->id,
                'product_name'=>$cartValue->name,'product_options'=>$cartValue->options->toJson(),
                'product_pricy'=>$cartValue->price,'product_qty'=>$cartValue->qty,'product_src'=>$cartValue->options->src,
                'product_subtotal'=>$cartValue->subtotal]);
        };
        array_push($items,array("Name"=>"運費","Price"=>60,"Currency"=>"NT","Quantity"=>1,"URL"=>""));

        //傳值內容
        require_once(__DIR__.'/../../libs/AllPay.Payment.Integration.php');
        try{
            $oPayment = new AllInOne();
            $oPayment->ServiceURL = $this->serviceURL;
            $oPayment->HashKey = $this->hashKey;
            $oPayment->HashIV = $this->hashIv;
            $oPayment->MerchantID = $this->merchanID;
            /* 基本參數 */
            $oPayment->Send['ReturnURL'] = $returnURL;
            $oPayment->Send['ClientBackURL'] = $clientBackURL;
            $oPayment->Send['OrderResultURL'] = $clientBackURL;
            $oPayment->Send['MerchantTradeNo'] = $merchantTradeNo;
            $oPayment->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');
            $oPayment->Send['TotalAmount'] = $totalAmount;
            $oPayment->Send['TradeDesc'] = $tradeDesc;
            $oPayment->Send['ChoosePayment'] = $choosePayment;
            $oPayment->Send['Remark'] = $remark;
            $oPayment->Send['ChooseSubPayment'] = PaymentMethodItem::None;
            $oPayment->Send['NeedExtraPaidInfo'] = ExtraPaymentInfo::No;
            $oPayment->Send['DeviceSource'] = DeviceType::PC;
            $oPayment->Send['Items'] = $items;

            //延伸參數
            $oPayment->SendExtend['PaymentInfoURL'] = $paymentInfoURL;
            $oPayment->SendExtend["Email"] = $email;
            $oPayment->SendExtend["PhoneNo"] = $phoneNo;
            $oPayment->SendExtend["UserName"] = $userName;

            $oPayment->CheckOut();
            $szHtml = $oPayment->CheckOutString();
        }catch(Exception $e)
        {
            dd($e);
            throw $e;
        };

    }


    public function pay()
    {
        require_once(__DIR__.'/../../libs/AllPay.Payment.Integration.php');
        try {
            $oPayment = new AllInOne();
            /* 服務參數 */
            $oPayment->HashKey = $this->hashKey;
            $oPayment->HashIV = $this->hashIv;
            $oPayment->MerchantID = $this->merchanID;
            /* 取得回傳參數 */
            $arFeedback = $oPayment->CheckOutFeedback();
            /* 檢核與變更訂單狀態 */
            if (sizeof($arFeedback) > 0) {
                foreach ($arFeedback as $key => $value) {
                    switch ($key) {
                        /* 支付後的回傳的基本參數 */
                        case "MerchantID": $szMerchantID = $value;break;
                        case "MerchantTradeNo": $szMerchantTradeNo = $value; break;
                        case "PaymentDate": $szPaymentDate = $value; break;
                        case "PaymentType": $szPaymentType = $value; break;
                        case "PaymentTypeChargeFee": $szPaymentTypeChargeFee = $value; break;
                        case "RtnCode": $szRtnCode = $value; break;
                        case "RtnMsg": $szRtnMsg = $value; break;
                        case "SimulatePaid": $szSimulatePaid = $value; break;
                        case "TradeAmt": $szTradeAmt = $value; break;
                        case "TradeDate": $szTradeDate = $value; break;
                        case "TradeNo": $szTradeNo = $value; break;
                        default: break;
                    }
                }
                $memo = "付款日期:".$szPaymentDate;
                $order = App\Order::where('ordno', $szMerchantTradeNo)
                    ->update(['ispay'=>1,'pay_memo'=>$memo]);
                print '1|OK';
            } else {
                print '0|Fail';
            }
        }catch(Exception $e)
        {
            throw $e;
        };
    }
    public function cvs()
    {
//        $order = App\Order::where('ordno', 'A20160318091358')
//            ->update(['pay_type' => 1,'pay_memo'=>'who in']);
        require_once(__DIR__.'/../../libs/AllPay.Payment.Integration.php');
        try
        {
            $oPayment = new AllInOne();
            /* 服務參數 */
            $oPayment->HashKey = $this->hashKey;
            $oPayment->HashIV = $this->hashIv;
            /* 取得回傳參數 */
            $arFeedback = $oPayment->CheckOutFeedback();
            /* 檢核與變更訂單狀態 */
            if (sizeof($arFeedback) > 0) {
                foreach ($arFeedback as $key => $value) {
                    switch ($key)
                    {
                        /* 使用 CVS/BARCODE 交易時回傳的參數 */
                        case "MerchantID": $szMerchantID = $value; break;
                        case "MerchantTradeNo": $szMerchantTradeNo = $value; break;
                        case "RtnCode": $szRtnCode = $value; break;
                        case "RtnMsg": $szRtnMsg = $value; break;
                        case "TradeNo": $szTradeNo = $value; break;
                        case "TradeAmt": $szTradeAmt = $value; break;
                        case "PaymentType": $szPaymentType = $value; break;
                        case "TradeDate": $szTradeDate = $value; break;
                        case "PaymentNo": $szPaymentNo = $value; break;
                        case "Barcode1": $szBarcode1 = $value; break;
                        case "Barcode2": $szBarcode2 = $value; break;
                        case "Barcode3": $szBarcode3 = $value; break;
                        case "ExpireDate": $szExpireDate = $value; break;
                        default: break;
                    }
                }
                $memo = "繳費代碼:".$szPaymentNo.",條碼1:".$szBarcode1.",條碼2:".$szBarcode2.",條碼3:".$szBarcode3.",繳款期限:".$szExpireDate;
                $order = App\Order::where('ordno', $szMerchantTradeNo)
                    ->update(['pay_memo'=>$memo]);
                print '1|OK';
            } else {
                print '0|Fail';
            }
        }catch(Exception $e)
        {
            dd($e);
            throw $e;
        };
    }

    public function atm()
    {
        require_once(__DIR__.'/../../libs/AllPay.Payment.Integration.php');
        try
        {
            $oPayment = new AllInOne();
            /* 服務參數 */
            $oPayment->HashKey = $this->hashKey;
            $oPayment->HashIV = $this->hashIv;
            /* 取得回傳參數 */
            $arFeedback = $oPayment->CheckOutFeedback();
            /* 檢核與變更訂單狀態 */
            if (sizeof($arFeedback) > 0) {
                foreach ($arFeedback as $key => $value) {
                    switch ($key)
                    {
                        /* 使用 ATM 交易時回傳的參數 */
                        case "MerchantID": $szMerchantID = $value; break;
                        case "MerchantTradeNo": $szMerchantTradeNo = $value; break;
                        case "RtnCode": $szRtnCode = $value; break;
                        case "RtnMsg": $szRtnMsg = $value; break;
                        case "TradeNo": $szTradeNo = $value; break;
                        case "TradeAmt": $szTradeAmt = $value; break;
                        case "PaymentType": $szPaymentType = $value; break;
                        case "TradeDate": $szTradeDate = $value; break;
                        case "BankCode": $szBankCode = $value; break;
                        case "vAccount": $szVirtualAccount = $value; break;
                        case "ExpireDate": $szExpireDate = $value; break;
                        default: break;
                    }
                }
                $order = App\Order::where('ordno', 'A20160318091358')
                    ->update(['pay_type' => 1,'pay_memo'=>$szPaymentType]);
                $memo = "編號:".$szMerchantTradeNo.",金額:".$szTradeAmt.",銀行代碼:".$szBankCode.",帳號:".
                    $szVirtualAccount.",繳款期限:".$szExpireDate;
                $order = App\Order::where('ordno', $szMerchantTradeNo)
                    ->update(['pay_memo'=>$memo]);
                print '1|OK';
            } else {
                print '0|Fail';
            }
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }

    public function cartdone($orderNo)
    {
        $order = App\Order::where('ordno', $orderNo)
            ->get();
        //$order2 = App\Order::find(70)->orderDetails()->get();
        $orderDetails = App\OrderDetail::where('order_id',$order[0]->id)
            ->get();
//        debug($orderDetails);
	    debug($orderDetails);
        return view('order.orderdone',compact('order','orderDetails'));
    }

    public function orderList(Request $request){
        $item = 10;
        $order = App\Order::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate($item);
        debug($order);
        return view('order.orderlist',compact('order','item'));
    }

    public function delOrder(Request $request,$orderId)
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $order = App\Order::where('user_id', $request->user()->id)
            ->where('id',$orderId)->delete();
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        return redirect('/cutestore/orderlist');
    }

    public function saveOrder(Request $request)
    {
        $uid = $request->user()->id;
        $saveOrder = App\SaveOrder::where('user_id',$uid)->get();
        if(count($saveOrder)==0){
            App\SaveOrder::create(['name'=>$request->name,'phone'=>$request->phone,
                'email'=>$request->email,'address'=>$request->address,'user_id'=>$uid]);
        }else{
            App\SaveOrder::where('user_id', $uid)
                ->update(['name'=>$request->name,'phone'=>$request->phone,
                    'email'=>$request->email,'address'=>$request->address,'user_id'=>$uid]);
        }
        echo "OK";
    }

    public function loadOrder(Request $request){
        $saveOrder = App\SaveOrder::where('user_id',$request->user()->id)->get();
        echo $saveOrder->toJson();
    }

    public function delCart(Request $request){
        //清空購物車
        $cart = \Cart::destroy();
        echo "OK";
    }

}
