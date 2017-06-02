<?php
namespace App\Http\Controllers\Api;

use App\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherCreateRequest;
use App\Http\Requests\VoucherUpdateRequest;

use App\Scopes\BetweenStartEndScope;

class VouchersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Voucher::withoutGlobalScope(BetweenStartEndScope::class)->get();
        
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @return \Illuminate\Http\Response
     */
    public function store(VoucherCreateRequest $request)
    {
        $voucher = Voucher::create($request->postFillData());
        
        return $voucher;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Voucher $voucher            
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voucher = Voucher::withoutGlobalScope(BetweenStartEndScope::class)->findOrFail($id);
        
        return $voucher;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @param \App\Voucher $voucher            
     * @return \Illuminate\Http\Response
     */
    public function update(VoucherCreateRequest $request, $id)
    {
        $voucher = Voucher::withoutGlobalScope(BetweenStartEndScope::class)->findOrFail($id);
        $voucher->fill($request->postFillData());
        $voucher->save();
        
        return $voucher;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Voucher $voucher            
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voucher = Voucher::withoutGlobalScope(BetweenStartEndScope::class)->findOrFail($id);
        $voucher->delete();
        
        return $voucher;
    }
}
