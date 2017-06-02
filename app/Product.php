<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Money;

class Product extends Model
{

    const DISCOUNT_MAX = 60;

    /*
     * The attributes that are mass assignable.
     *
     * relations are excluded from "mass-fillable" feature
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price'
    ];

    protected $hidden = array(
        'created_at',
        'updated_at'
    );

    /**
     * Get the vouchers
     */
    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class);
    }

    // public function getPriceAttribute($value)
    // {
    // //
    // }
    
    // public function setMoneyAttribute(?Money $value)
    // {
    // if (is_null($value)) {
    // $this->attributes['price'] = null;
    // } elseif ($value instanceof Money) {
    // $this->attributes['price'] = $value->getAmount();
    // }
    // }
    
    /**
     * Purchase product
     *
     * @param int $id            
     * @return App\Product
     */
    public static function purchaseProduct(int $id)
    {
        DB::beginTransaction();
        
        $product = static::findOrFail($id);
        $product->vouchers()->detach();
        $product->delete();
        
        // DB::rollBack();
        
        DB::commit();
        return $product;
    }

    /**
     * Calculates discount
     *
     * @param array $vouchers            
     * @param int $price            
     * @return number
     */
    public static function calculateDiscount(array $vouchers, int $price)
    {
        $discount = 0;
        
        $discount = array_reduce($vouchers, function ($carry, $model) {
            $carry += $model['discount'];
            return $carry;
        });
        
        if (self::DISCOUNT_MAX < $discount) {
            $discount = 60;
        }
        
        $discountMoney = intval($price - ($discount / 100 * $price)) / 100;
        
        return $discountMoney;
    }
}
