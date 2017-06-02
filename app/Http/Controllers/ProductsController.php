<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\ProductIndexRequest;
use App\Jobs\ProductIndex;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductIndexRequest $request)
    {
        $sorting = (array) $this->getSorting($request);
        
        $products = $this->dispatch(new ProductIndex($sorting));
        
        return view('products.index', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::purchaseProduct($id);
        
        $request->session()->flash('status', 'Product was purchased');
        
        return redirect()->route('products.index');
    }

    /**
     * Gets sorting from session
     *
     * @param Request $request            
     * @param string $sortBy            
     * @param string $sortDir            
     * @return string[]
     */
    protected function getSorting(Request $request, string $sortBy = 'id', string $sortDir = 'asc')
    {
        $sort = [
            'sortBy' => $sortBy,
            'sortDir' => $sortDir
        ];
        
        if ($request->exists('sortByName') || $request->exists('sortByPrice')) {
            
            if ($request->exists('sortByName')) {
                $sortBy = 'name';
            } elseif ($request->exists('sortByPrice')) {
                $sortBy = 'price';
            }
            
            if ($request->session()->has('sort')) {
                $sortInSession = $request->session()->get('sort');
                
                if ('asc' == $sortInSession['sortDir']) {
                    $sortDir = 'desc';
                } elseif ('desc' == $sortInSession['sortDir']) {
                    $sortDir = 'asc';
                }
            }
            
            $sort = [
                'sortBy' => $sortBy,
                'sortDir' => $sortDir
            ];
            
            $request->session()->put('sort', $sort);
            
            return $sort;
        }
        
        return $sort;
    }
}
