<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Product;

class ProductIndex
{
    // use Dispatchable, Queueable;
    use SerializesModels;

    private $sortBy = 'id';

    private $sortDir = 'desc';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(?array $data)
    {
        $this->sortBy = $data['sortBy'] ?? 'id';
        $this->sortDir = $data['sortDir'] ?? 'desc';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $products = Product::with('vouchers')->orderBy($this->sortBy, $this->sortDir)->get();
        
        return $products;
    }
}
