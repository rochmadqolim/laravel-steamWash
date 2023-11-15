<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kendaraan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request) {

        $request['tgl_transaksi'] = Carbon::now()->toDateString();
        $count = Kendaraan::where('category_id', $request->category_id)
                      ->whereDate('created_at', Carbon::today())
                      ->count();
    
        $lastTransaction = Kendaraan::where('category_id', $request->category_id)
                                ->whereDate('created_at', Carbon::today())
                                ->latest('created_at')
                                ->first();
    
        $count = $lastTransaction ? intval(substr($lastTransaction->no_transaksi, -4)) : 0;
        $count++;
    
        if ($request->category_id == 1) {
            $code = 'MTR';
        } elseif ($request->category_id == 2) {
            $code = 'MBL';
        } else {
            $code = 'TRC';
        }
    
        $request['no_transaksi'] = $code . Carbon::now()->format('Ymd') . str_pad($count, 4, '0', STR_PAD_LEFT);
        $category = Category::find($request->category_id);

        if ($category) {
            $request['tarif'] = $category->price;
        } else {
            $request['tarif'] = 0;
        }
        
        
    
        Kendaraan::create($request->all());
        return redirect('dashboard');
    }
    


    public function destroy($id){
    
        $order = Kendaraan::find($id);


            $order->delete();
            return redirect('dashboard');
    }
}