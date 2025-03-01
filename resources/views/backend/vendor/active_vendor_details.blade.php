@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Detalhes Do Artista Inactivo</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Detalhes Do Artista Inactivo</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							
							<div class="col-lg-12">
								<div class="card">
                                    <form method="post" action="{{route('inactive.vendor.approve')}}" enctype="multipart/form-data">
                                        @csrf
										<input type="hidden" name="id" value="{{$activeVendorDetails->id}}">
									<div class="card-body">
                                    <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Username</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="{{$activeVendorDetails->username}} " name="Username" />
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Nome Do artista</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="name" class="form-control" value="{{$activeVendorDetails->name}}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="email" class="form-control" value="{{$activeVendorDetails->email}}" disabled />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Telefone Celular</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="phone" placeholder="+258" class="form-control" value="{{$activeVendorDetails->phone}}" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Endereço</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="address" class="form-control" value="{{$activeVendorDetails->address}}" />
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Informacoes Do Artista</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <textarea class="form-control" id="inputAddress" name="vendor_short_info" placeholder="Coloque aqui sua informacao.." rows="3">{{$activeVendorDetails->vendor_short_info}}</textarea>											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Foto Do Artista</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{(!empty($activeVendorDetails->photo)) ? url('upload/vendor_images/'.$activeVendorDetails->photo):url('upload/no_image.jpg')}}" alt="Vendor"  style="width:100px; height:100px">

											</div>
										</div>

                                        


										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-danger px-4" value="Desativar Artista" />
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