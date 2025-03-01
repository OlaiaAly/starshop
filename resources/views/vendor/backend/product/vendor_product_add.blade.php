@extends('vendor.vendor_dashboard')
@section('vendor')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>


<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Adcionar Produto</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Adcionar Novo Produto</li>
                </ol>
            </nav>
        </div>
       
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Adcionar Novo Produto</h5>
            <hr/>

            <form method="post" id="myForm" action="{{route('vendor.store.product')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-body mt-4">
            <div class="row">
                <div class="col-lg-8">
                <div class="border border-3 p-4 rounded">
                <div class="mb-3 form-group">
                    <label for="inputProductTitle" class="form-label">Nome Do Produto</label>
                    <input type="text" name="product_name" class="form-control" id="inputProductTitle" placeholder="Enter product title">
                    </div>

                    <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Tags</label>
                    <input type="text" name="product_tags" class="form-control visually-hidden" data-role="tagsinput" value="Novas">              
                    </div>

                    <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Tamanho</label>
                    <input type="text" name="product_size" class="form-control visually-hidden" data-role="tagsinput" value="Pequenho, Medio, Grande">                    </div>

                    <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Cor</label>
                    <input type="text" name="product_color" class="form-control visually-hidden" data-role="tagsinput" value="Vermelho, Azul, Verde, Branco, Preto">                    
                </div>

      




                    <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Mini Descricao</label>
                    <textarea name= "short_descp"class="form-control" id="inputProductDescription" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Descricao</label>
                    <textarea id="mytextarea" name="long_descp">Hello, World!</textarea>
                    </div>

                    <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Imagem de Destaque</label>
                    <input class="form-control" name="product_thambnail" type="file" id="formFile" onChange="mainThamUrl(this)">
                    
                    <img src="" id="mainThmb"  />    
                
                </div>


                    <div class="mb-3">
                    <label for="inputProductTitle" class="form-label"> Imagens  Do Produto</label>
                    <input class="form-control" name="multi_img[]" type="file" id="multiImg" multiple="">                   
                    
                    <div class="row" id="preview_img"></div>
                
                    </div>
                    
                </div>
                </div>
                <div class="col-lg-4">
                <div class="border border-3 p-4 rounded">
                    <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputPrice" class="form-label">Preço</label>
                        <input type="text" name="selling_price" class="form-control" id="inputPrice" placeholder="00.00">
                        </div>
                        <div class="col-md-6">
                        <label for="inputCompareatprice" class="form-label">Preço com Desconto</label>
                        <input type="text" name="discount_price" class="form-control" id="inputCompareatprice" placeholder="00.00">
                        </div>
                        <div class="col-md-6">
                        <label for="inputCostPerPrice" class="form-label">Codigo de Produto</label>
                        <input type="twxt" name="product_code" class="form-control" id="inputCostPerPrice" placeholder="00.00">
                        </div>
                        <div class="col-md-6">
                        <label for="inputStarPoints" class="form-label">Quantidade</label>
                        <input type="text" name="product_qty" class="form-control" id="inputStarPoints" placeholder="00.00">
                        </div>
                        <div class="col-12">
                        <label for="inputProductType" class="form-label">Marca</label>
                        <select class="form-select" name="brand_id" id="inputProductType">
                        <option selected disabled>Selecione a Marca</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                        <label for="inputVendor" class="form-label">Categoria</label>
                        <select class="form-select" name="category_id"id="inputVendor">
                        <option selected disabled>Selecione a Categoria</option>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                        <label for="inputCollection" class="form-label">SubCategoria</label>
                        <select class="form-select" name="subcategory_id"id="inputCollection">
                        <option selected disabled>Selecione a subcategoria</option>
                    
                            </select>
                        </div>

                    


                        <div class="col-12">

                        
                        <!-- <div class="row g-3">
                        
                                <div class="col-md-6">
                                <div class="form-check">
									<input class="form-check-input" name="hot_deals" type="checkbox" value="1" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">Hot deals</label>        
                                </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-check">
									<input class="form-check-input" name="featured" type="checkbox" value="1" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">Hot Featured</label>        
                                </div>
                                </div>
                                    <hr>
                                <div class="col-md-6">
                                <div class="form-check">
									<input class="form-check-input" name="special_offer" type="checkbox" value="1" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">special Offer</label>        
                                </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-check">
									<input class="form-check-input" name="special_deals" type="checkbox" value="1" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">special deals</label>        
                                </div>
                                </div>
                        
                        
                            </div>
                        
                        
                        </div> -->

                            <hr>

                        <div class="col-12">
                            <div class="d-grid">
                            <input type="submit" class="btn btn-primary px-4" value="Salvar" />
                            </div>
                        </div>
                    </div> 
                </div>
                </div>
            </div><!--end row-->
        </div>
        </div>
    </div>

</form>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $("#myForm").validate({
            rules: {
                product_name: {
                    required: true,
                    minlength: 3
                },
                selling_price: {
                    required: true,
                    number: true
                },
                product_qty: {
                    required: true,
                    digits: true
                },
                product_thambnail: {
                    required: true,
                    extension: "jpg|jpeg|png"
                },
                brand_id: {
                    required: true
                },
                category_id: {
                    required: true
                },
                subcategory_id: {
                    required: true
                },
                short_descp: {
                    required: true
                },
                long_descp: {
                    required: true
                }
            },
            messages: {
                product_name: {
                    required: "Por favor, insira o nome do produto",
                    minlength: "O nome do produto deve ter pelo menos 3 caracteres"
                },
                selling_price: {
                    required: "Por favor, insira o preço",
                    number: "Por favor, insira um valor numérico válido"
                },
                product_qty: {
                    required: "Por favor, insira a quantidade",
                    digits: "Por favor, insira um número inteiro válido"
                },
                product_thambnail: {
                    required: "Por favor, faça o upload da imagem do produto",
                    extension: "A imagem deve estar nos formatos jpg, jpeg ou png"
                },
                brand_id: {
                    required: "Por favor, selecione uma marca"
                },
                category_id: {
                    required: "Por favor, selecione uma categoria"
                },
                subcategory_id: {
                    required: "Por favor, selecione uma subcategoria"
                },
                short_descp: {
                    required: "Por favor, insira uma min descrição do Produto"
                },
                long_descp: {
                    required: "Por favor, insira uma  descrição do Produto"
                }
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
            }
        });
    });
</script>



<script  type ="text/javascript">
function mainThamUrl(input){
    
    if(input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
        $('#mainThmb').attr('src', e.target.result).width(80).height(80);
    };

    reader.readAsDataURL(input.files[0]);
}






}


</script>


<script> 
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{url('/vendor/subcategory/ajax')}}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subcategory_id"]').empty(); // Limpa as opções anteriores
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
<script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>


@endsection