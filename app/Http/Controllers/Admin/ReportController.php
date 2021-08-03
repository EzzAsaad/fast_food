<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\addones;
use App\Models\address;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportController extends Controller
{
    public function index(){
        $done_orders = Order::where('status',3)->get();
        foreach ($done_orders as $order) {
            $order->item = DB::table('products_orders')->where('order_id', $order->id)->get();
            $order->customer = DB::table('users')->where('id', $order->user_id)->get()->first();
            $order->addons = DB::table('addones_order')->where('order_id', $order->id)->get();
//        $order->addons = DB::table('bills')->where('id', $order->id)->get();
        }
        return view('admin.report.index',compact('done_orders'));
    }

    public function export(){

//            $spreadsheet = new Spreadsheet();
//            $sheet = $spreadsheet->getActiveSheet();
//            $sheet->setCellValue('A1', 'Hello World !');
//
//            $writer = new Xlsx($spreadsheet);
//            $writer->save('hello world.xlsx');

        $done_orders = Order::where('status',3)->get();
        foreach ($done_orders as $order) {
            $order->item = DB::table('products_orders')->where('order_id', $order->id)->get();
            //dd($order->item);
            $order->customer = DB::table('users')->where('id', $order->user_id)->get()->first();
            $order->addons = DB::table('addones_order')->where('order_id', $order->id)->get();
//        $order->addons = DB::table('bills')->where('id', $order->id)->get();
        }
        //dd($done_orders);

        $spreadsheet =  new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', '#');
        $sheet->setCellValue('B1', __('order.clientname'));
        $sheet->setCellValue('C1', __('order.phone'));
        $sheet->setCellValue('D1', __('order.price'));
        $sheet->setCellValue('E1', __('order.products'));
        $sheet->setCellValue('F1', __('order.addons'));
        $sheet->setCellValue('G1', __('order.address'));
        $sheet->setCellValue('H1', __('order.shipfees'));
        $sheet->setCellValue('I1', __('order.status'));
        $i = 2;
        foreach($done_orders as $order) {
            $price = 0;
            $nameP = '';
            $nameA = '';
            foreach ($order->item as $prod){
                $product = Product::find($prod->product_id)->first();
                $price += $product->new_price;
                $tempName = '';
                if(App::isLocale('ar')){
                    $nameP = $nameP.json_decode($product->name)->ar.",";
                }else{
                    $nameP = $nameP.json_decode($product->name)->en.",";
                }

            }
            foreach ($order->addons as $addon){

                $_addon = addones::where('id',$addon->addon_id)->first();
//                dd($price.' '.$addon->addon_id);
                $price  = $price + $_addon->price;
                if(App::isLocale('ar')){
                    $nameA = $nameA.json_decode($product->name)->ar.",";
                }else{
                    $nameA = $nameA.json_decode($product->name)->en.",";
                }
                //$nameA  = $nameA.$_addon->name.",";
            }
            $address = address::find($order->address_id)->first();
            $sheet->setCellValue('A'.$i, $order->id);
            $sheet->setCellValue('B'.$i, $order->name);
            $sheet->setCellValue('C'.$i, $order->phone);
            $sheet->setCellValue('D'.$i, $price);
            $sheet->setCellValue('E'.$i, $nameP);
            $sheet->setCellValue('F'.$i, $nameA);
            $sheet->setCellValue('G'.$i, $address->new_address);
            $sheet->setCellValue('H'.$i, $order->ship_fees);
            $sheet->setCellValue('I'.$i, __('order.doneorder'));
            $i +=1;

        }
        // Redirect output to a client’s web browser (Excel2007)
//        header('Content-Disposition: attachment; filename="Orders.csv"' );
//        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//        header('Content-Transfer-Encoding: binary');
//        header('Cache-Control: must-revalidate');
//        header( "Content-Disposition:  attachment;  filename=sampe.xlsx");
//        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//        header ('Pragma: public'); // HTTP/1.0
//        header ('Cache-Control: cache, must-revalidate');
        $writer = new Xlsx($spreadsheet);
        $writer->save('Orders.xlsx');
        $headers = array('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',);
        return Response::download(public_path().'/Orders.xlsx','Orders.xlsx',$headers);
    }
}
