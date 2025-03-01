@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Todas Categorias</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Todas Tickets</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{route('add.ticket')}}" class="btn btn-primary">Adcionar Ticket</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6> Tens <span class="badge rounded-pill bg-danger">{{count($tickets)}}</span>
				Tickets</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
                                        <th>Imagem Do Ticket</th>
										<th>Nome Do Ticket</th>
                                        <th>Preco Do Ticket</th>
										<th>Quantidade Do Ticket</th>
                                        <th>Status Do Ticket</th>
										<th>Acção </th>
										
									</tr>
								</thead>
								<tbody>
                                    @foreach($tickets as $key=> $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>
										{{ $item->getFirstMedia('ticket')?->img()?->attributes(["style" =>'width:70px; height:40px;']) }}	
										</td>
                                        <td>{{$item->event_name}}</td>
                                        <td>{{$item->selling_price}} Mzn</td>
                                        <td>{{$item->product_qty}}</td>
                                        <td>
	
										</td>



                                        <td>
											@if($item->status == 1)
											<span class="badge rounded-pill bg-success">Ativo</span>
											@else
											<span class="badge rounded-pill bg-danger">Desativado</span>

											@endif
										</td>

                                        <td>
                                        <a href="{{route('edit.ticket',$item->id)}}" class="btn btn-info" title="Editar dados"><i Class="fa fa-pencil"></i></a>
                                        <a href="{{route('delete.ticket',$item->id)}}" id="delete" title="Deletar Dados" class="btn btn-danger"><i Class="fa fa-trash"></i></a>
										<a href="{{route('edit.ticket',$item->id)}}" class="btn btn-warning" title="detalhes"><i Class="fa fa-eye"></i></a>
										@if($item->status == 1)

										<a href="{{route('product.inactive',$item->id)}}" class="btn btn-primary" title="Desativar"><i Class="fa-solid fa-thumbs-down"></i></a>
										@else
										<a href="{{route('product.active',$item->id)}}" class="btn btn-primary" title="Ativar"><i Class="fa-solid fa-thumbs-up"></i></a>
										@endif
									</td>
										
									</tr>
									
								@endforeach
								</tbody>
								<tfoot>
									<tr>
                                        <th>Sl</th>
                                        <th>Imagem Do Ticket</th>
										<th>Nome Do Ticket</th>
                                        <th>Preco Do Ticket</th>
										<th>Quantidade Do Ticket</th>
                                        <th>Status Do Ticket</th>
										<th>Acção </th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				
			</div>

@endsection