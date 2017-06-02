<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Entities\Product;
use App\Events\ProductCreated;
use App\Services\ProductAddService;

class ProductStore
{
    use Dispatchable, SerializesModels;

    private $data = [
        'id' => null,
        'name' => null,
        'price' => null
    ];

    private $productAddService;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(?array $data)
    {
        $this->data['name'] = $data['name'] ?? null;
        $this->data['price'] = $data['price'] ?? null;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ProductAddService $productAddService)
    {
        $this->productAddService = $productAddService;
        
        $data = $this->productAddService->addProduct($this->data);
        
        return $data;
    }
}
