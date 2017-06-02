<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Scopes\BetweenStartEndScope;

class Voucher extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'discount'
    ];

    /**
     * The attributes that are hidden.
     *
     * @var array
     */
    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the products
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        
        static::addGlobalScope(new BetweenStartEndScope());
    }

    /**
     */
    
    /**
     * Find voucher and check that product exists
     *
     * @param int $voucherId            
     * @param int $productId            
     * @return App\Voucher
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public static function findOrFailVoucherWithProductExists(int $voucherId, int $productId)
    {
        $voucher = static::findOrFail($voucherId);
        $exists = $voucher->products()
            ->where('product_id', $productId)
            ->exists();
        
        if (! $exists) {
            throw (new \Illuminate\Database\Eloquent\ModelNotFoundException())->setModel(get_class($voucher), $voucher->id);
        }
        
        return $voucher;
    }
}
