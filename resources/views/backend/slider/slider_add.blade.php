@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Adcionar Slider</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Adcionar Slider</li>
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
                                    <form method="post" id="myForm" action="{{route('store.slider')}}" enctype="multipart/form-data">
                                        @csrf

									<div class="card-body">
                                    

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Titulo Da Slider</h6>
											</div>
											<div class=" form-group col-sm-9 text-secondary">
												<input type="text" name="slider_title" class="form-control"/>
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Subtitulo Da Slider</h6>
											</div>
											<div class=" form-group col-sm-9 text-secondary">
												<input type="text" name="short_title" class="form-control"/>
											</div>
										</div>
										

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Adcionar Imagem do Slider</h6>
											</div>
											<div class=" col-sm-9 text-secondary">
												<input type="file" name="slider_image" class="form-control" id="image"/>
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0"></h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{url('upload/no_image.jpg')}}" alt="Admin"  style="width:100px; height:100px">

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

			<script type="text/javascript">
    $(document).ready(function() {
        $("#myForm").validate({
            rules: {
                category_name: {
                    required: true,
                },
            },
            messages: {
                caregory_name: {
                    required: 'Insira o nome da Categoria',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function(){

        $('#image').change(function(e){

            var reader = new FileReader();
            reader.onload = function (e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
        
    });

</script>
@endsection