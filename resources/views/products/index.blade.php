@extends('layouts.app')

@section('content')
<div class="fixed-table-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

				<table class="table">
					<thead>
						<tr>
							<th> 
								<a href="/products?sortByName"><div class="th-inner sortable both">Name</div></a>
							</th>
							<th>
								<a href="/products?sortByPrice"><div class="th-inner sortable both">Price</div></a>
							</th>
							<th>Price with discount</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

                    @foreach ($products as $product)
    					<tr>
    						<td>{{ $product->name }}</td>
    						<td>{{ $product->price / 100 }}</td>
    						<td>
    							@include('products.discount')
    						</td>
    						<td>
    							<form action="{!! route('products.destroy', $product->id) !!}" method="POST">
        							{{ method_field('DELETE') }}
        							{{ csrf_field() }}
        							<button type="submit">Purchase</button>
    							</form>    						
    						</td>    						
    					</tr>
                    @endforeach
					
					</tbody>
				</table>

				<div class="panel-body">
                    @if(session()->has('status'))
	                    {{ session()->get('status') }}
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
