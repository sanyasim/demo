<?php
namespace App\Repositories;

use App\Voucher;

class VoucherRepository
{
    //public function create($userId, $name, $redirect, $personalAccess = false, $password = false)
    public function create($discount, $startDate = null, $endDate = null)
    {
        $voucher = (new Voucher())->forceFill([
            'start_date' => $startDate,
            'end_date' => $endDate,
            'discount' => $discount,
        ]);
        
        $voucher->save();
        
        return $voucher;
    }
    
    public function find($id)
    {
        return Voucher::find($id);
    }
    
    public function all()
    {
        //return Product::all();
        //return Product::with('vouchers')->get();
        
        return Voucher::all();
        
        //$books = App\Book::with('author')->get();
    }


    
}