<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Matrix\Operators\Subtraction;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Dotenv\Exception\ValidationException;
use SebastianBergmann\LinesOfCode\Exception;
use Symfony\Component\Mime\Message;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;
use LaravelDaily\Invoices\Facades\Invoice;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Buyer;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscription = Subscription::with('user')
            ->paginate(3);;
        return view('subscribe.subscription', [
            'subscription' =>  $subscription
        ]);
        // return view('subscribe.subscription');
    }
    public function subscribe($id)
    {
        $subscription = Subscription::where('id', $id)->first();

        $user = auth()->user();
        $user->subscripton_id = $id;
        

        // c=using carbon
        // $string = explode(' ',  $subscription->validity);
        // $add_param = 'add' . $string[1];
        // return   $expiry = Carbon::now()->$add_param($string[0])->format('Y-m-d H:i:s');
        
        // using php date
        $user->expires = date('Y-m-d H:i:s', strtotime('+' . $subscription->validity));

        $user->save();

        return redirect('invoice')->with('sucess subscription');
        // Log::debug($user);
    }

    
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function mail()
    // {
    //     $data=['name'=>"Hitesh Patil",'data'=>"Hello Hitesh"];
    //     $user['to']='hspatil141106@gmail.com';

    //     Mail::send('mail',$data, function($messages) use ($user){
    //         $messages->to($user['to'])
    //         ->subject('Hello hitesh')
    //         ->attachData($invoice->stream()->getContent(), 'invoice.pdf');
    //     });  
    // }   

    public function invoice()
    {
      $userinfo = auth()->user();
      // dd($userinfo->name);
      $customer = new Buyer([
        'name'          => $userinfo->name,
        'address'          => '401 Ujwal rigalia baner pune 411015',
        'phone'          => $userinfo->phone,
        'custom_fields' => [
            'email' => $userinfo->email,
        ],
        ]);
        $sub_id =  Subscription::find($userinfo->subscripton_id);
        $item = (new InvoiceItem())->title($sub_id->plan)->pricePerUnit($sub_id->price);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(18)
            ->shipping(1.99)
            ->addItem($item);

        
            //Send email
            $data=['name'=>"Hitesh Patil",'data'=>"Hello Hitesh"];
            $user = [];
            $user['to']='hspatil141106@gmail.com';

            Mail::send('mail',$data, function($messages) use ($user, $invoice){
                $messages->to($user['to'])
                ->subject('Hello hitesh')
                ->attachData($invoice->stream()->getContent(), 'invoice.pdf'); 
            }); 
            return redirect('dashboard')->with('success','your PDF send email sucessfully...!');
            // return $invoice->stream();
            //Log::debug($invoice);
        }
    
}
