@extends('vendor.vendor_dashboard')
@section('vendor')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Todas Categorias</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Todas Produtos</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{route('vendor.add.product')}}" class="btn btn-primary">Adcionar Produto</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6> Tens <span class="badge rounded-pill bg-danger">{{count($products)}}</span>
				produtos</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
                                        <th>Imagem Do Produto</th>
										<th>Nome Do Produto</th>
                                        <th>Preco Do Produto</th>
										<th>Quantidade Do Produto</th>
										<th>Desconto Do Produto</th>
                                        <th>Status Do Produto</th>
										<th>Acção </th>
										
									</tr>
								</thead>
								<tbody>
                                    @foreach($products as $key=> $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>
										{{ $item->getFirstMedia('cover')?->img()?->attributes(["style" =>'width:70px; height:40px;']) }}	
										</td>
                                        <td>{{$item->product_name}}</td>
                                        <td>{{$item->selling_price}} Mzn</td>
                                        <td>{{$item->product_qty}}</td>
                                        <td>
											
										@if($item->discount_price == NULL)
										<span class="badge rounded-pill bg-info">Sem Disconto</span>
										@else
										@php
										$amount= $item->selling_price - $item->discount_price;
										$discount= ($amount/$item->selling_price)*100;
										@endphp
										<span class="badge rounded-pill bg-danger">{{round($discount)}}%</span>

										@endif
										
									
										</td>



                                        <td>
											@if($item->status == 1)
											<span class="badge rounded-pill bg-success">Ativo</span>
											@else
											<span class="badge rounded-pill bg-danger">Desativado</span>

											@endif
										</td>

                                        <td>
                                        <a href="{{route('vendor.edit.product',$item->id)}}" class="btn btn-info" title="Editar dados"><i Class="fa fa-pencil"></i></a>
                                        <a href="{{route('delete.category',$item->id)}}" id="delete" title="Deletar Dados" class="btn btn-danger"><i Class="fa fa-trash"></i></a>
										<a href="{{route('edit.category',$item->id)}}" class="btn btn-warning" title="detalhes"><i Class="fa fa-eye"></i></a>
										@if($item->status == 1)

										<a href="{{route('vendor.product.inactive',$item->id)}}" class="btn btn-primary" title="Desativar"><i Class="fa-solid fa-thumbs-down"></i></a>
										@else
										<a href="{{route('vendor.product.active',$item->id)}}" class="btn btn-primary" title="Ativar"><i Class="fa-solid fa-thumbs-up"></i></a>
										@endif
									</td>
										
									</tr>
									
								@endforeach
								</tbody>
								<tfoot>
									<tr>
                                        <th>Sl</th>
                                        <th>Imagem Do Produto</th>
										<th>Nome Do Produto</th>
                                        <th>Preco Do Produto</th>
										<th>Quantidade Do Produto</th>
										<th>Desconto Do Produto</th>
                                        <th>Status Do Produto</th>
										<th>Acção </th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				
			</div>

@endsection