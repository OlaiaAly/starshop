@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Adcionar SubCategoria</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Adcionar subCategoria</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							
							<div class="col-lg-10">
								<div class="card">
                                    <form method="post" id="myForm" action="{{route('store.subcategory')}}" enctype="multipart/form-data">
                                        @csrf

									<div class="card-body">
                                    

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Nome Da Categoria</h6>
											</div>
											<div class=" form-group col-sm-9 text-secondary">
											<select name="category_id" class="form-select mb-3" aria-label="Default select example">
												<option selected="">Selecina a Categoria</option>
												@foreach($categories as $category)
												<option value="{{$category->id}}">{{$category->category_name}}</option>
												@endforeach
												
											</select>
											</div>
										</div>
										

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Nome Da SubCategoria</h6>
											</div>
											<div class=" form-group col-sm-9 text-secondary">
												<input type="text" name="subcategory_name" class="form-control"/>
											</div>
										</div>
										

                                       

										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" value="Salvar" />
											</div>
										</div>
									</div>
                                    </form>
                                
                                </div>
								
							</div>
						</div>
					</div>
				</div>
			</div>




@endsection