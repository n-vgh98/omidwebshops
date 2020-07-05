<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sale;
use App\Payment;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class pardakhtController extends Controller
{

    public function pardakht(Request $request)
    {
        $request->validate([
            'ostan' => 'required',
            'city' => 'required',
            'neshaniposti' => 'required',
            'kodeposti' => 'required',
            'namegirandeh' => 'required',
            'kodemelli' => 'required',
            'mobile' => 'required',
        ]);

      if($request)
      {

          //save address in session
          if(session()->has('locale'))
              App::setLocale(session('locale'));
          $address = __('generic.province')." : " .$request->ostan ." " . __('generic.city') .":". $request->city ." ".  __('generic.neshan_posti')." : " .$request->neshaniposti ." ". __('generic.pelak'). "  : ".$request->pelak ." ". __('generic.vahed') . "  : " .$request->vahed ." ".  __('generic.code_posti'). " : " . $request->kodeposti ;
          $namegirandeh = $request->namegirandeh;
          $mbile =  $request->mobile;
          $kodemelli = $request->kodemelli;
          session_start();
          $_SESSION['address'] = $address;
          $_SESSION['namegirandeh'] = $namegirandeh;
          $_SESSION['mbile'] = $mbile;
          $_SESSION['kodemelli'] = $kodemelli;
          $_SESSION['pay'] = $request->pay;

          // cahnge mablagh to rial
          $mablagh = $request->pay * 10;
          $objPay = new Payment();
          $res =  $objPay->pay($mablagh);

          //return "pardakht anjam shod";
          // echo  $res->errorMessage;

          return view('sabadKharid')->withErrors($res->errorMessage);
      }
      else
      {
          echo "dobareeeeeeeeeeeeeeeeeeh";
         return redirect()->back();
      }
    }
    public function continuepardakht(Request $request)
    {
        $request->flash();
        return view('continuePardakht');
    }
    public function processAfterPay()
    {
        session_start();
        $objPay = new Payment();
        $res =  $objPay->afterPayProcess();
        if(isset($res->transId))
        {
            $pid = Sale::where('transId',$res->transId)->get();
            if($pid->count() == 0)
            {
                $this->addFactorToDatabase($res);
                $address = $_SESSION['address'];
                $mobile = $_SESSION['mbile'];
                $namegirandeh = $_SESSION['namegirandeh'];
                $pay = $_SESSION['pay'];
                $number = session('numCart');
                session()->forget('cartItem');
                session()->forget('numCart');
                session()->forget('mobile');
                session()->forget('kodemelli');
                session()->forget('address');
                session()->forget('namegirandeh');
                if(session()->has('locale'))
                    App::setLocale(session('locale'));
                return redirect('/finalpardakht')->with([
                    "pardakht" => "<h6>".__('generic.message_for_success_pay_1')." <span class=\"bg-success \">" . __('generic.processing') . "</span>" . __('generic.message_for_success_pay_2') ." </h6>",
                    'result' => $res,
                    'mobile' => $mobile,
                    'namegirandeh' => $namegirandeh ,
                    'number' => $number ,
                    'address' => $address,
                    'mablagh' => $pay ,
                    ]);
            }
            else

            return redirect('/sabadKharid')->with('pardakht','');
        }
        else
        {
            return redirect('/sabadKharid')->with('pardakht',__('generic.error_in_pay'));
        }
    }

    public  function addFactorToDatabase($result)
    {
       if(Auth::check())
       {

           $userid = Auth::id();
            $username = Auth::user()->name;
           foreach (session('cartItem') as $item)
           {
               $sale = new Sale();
               $sale->name = $item['name'];
               $sale->price = $item['price'];
               $sale->number = $item['number'];
               $sale->takhfif = $item['takhfif'];
               $sale->catagory1 = $item['catagory1'];
               $sale->catagory2 = $item['catagory2'];
               $sale->catagory3 = $item['catagory3'];
               $sale->transId = $result->transId;
               $sale->user_id = $userid;
               $sale->product_id = $item['id'];
               $sale->address = $_SESSION['address'];
               $sale->mobile = $_SESSION['mbile'];
               $sale->kodemelli = $_SESSION['kodemelli'];
               $sale->namegirandeh = $_SESSION['namegirandeh'];
               $sale->status = __('generic.processing');
               $sale->save();


               //manupulate number of available products
               $product = Product::find($sale->product_id);
                $product->available = $product->available - $sale->number;
               $product->save();


           }

           $pay = new Payment();
           $pay->mablagh = ( $result->amount)/10;
           $pay->transId = $result->transId;
           $pay->cardNumber = $result->cardNumber;
           $pay->user_id = $userid;
           $pay->user_name = $username;
           $pay->save();
       }

    }
    public function finalpardakht()
    {
        return view('finalpardakht');
    }
}
