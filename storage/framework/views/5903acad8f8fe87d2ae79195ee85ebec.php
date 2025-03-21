<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Botão para fechar o modal -->
            <button type="button" class="btn-close" id="x" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <!-- Seção da galeria de imagens -->
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon">
                                <i class="fi-rs-search"></i>
                            </span>
                            <!-- Imagem principal -->
                            <div id="pimage">
                                
                            </div>
                        </div>
                    </div>

                    <!-- Seção de informações do produto -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <!-- Nome do produto -->
                            <h5 class="title-detail">
                                <a href="" id="pname" class="text-heading"></a>
                            </h5>
                            <br>

                            <!-- Seção de tamanhos -->
                            <div class="attr-detail attr-size mb-30" id="sizeArea" >
                                <strong class="mr-10">Tamanho:</strong>
                                <select id="size"  class="form-control unicase-form-control" name="size">
                                    <option value="">Escolha o Tamanho</option>
                                </select>
                            </div>

                            <!-- Seção de cores -->
                            <div class="attr-detail attr-color mb-30" id="colorArea">
                                <strong class="mr-10" style="width:70px;">Cor:</strong>
                                <select id="color" class="form-control unicase-form-control" name="color">
                                    <option value="">Escolha a Cor</option>
                                </select>
                            </div>

                            <!-- Preço do produto -->
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand" id="pprice">Mzn</span>
                                    <span>
                                        <span class="old-price font-md ml-15" id="oldprice">Mzn</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Seção para quantidade e botão de adicionar ao carrinho -->
                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="qty" id="qty" class="qty-val" value="1" min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <input type="hidden" id="product_id">
                                    <button type="submit" class="button button-add-to-cart" onClick="addToCart()">
                                        <i class="fi-rs-shopping-cart"></i> Adicionar ao carrinho
                                    </button>
                                </div>
                            </div>

                            <!-- Detalhes adicionais do produto -->
                            <div class="row">
                                <!-- Informações de marca e categoria -->
                                <div class="col-md-6">
                                    <div class="font-xs">
                                        <ul>
                                            <li class="mb-5">Marca: <span class="text-brand" id="pbrand"></span></li>
                                            <li class="mb-5">Categoria: <span class="text-brand" id="pcategory"></span></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Informações de código e estoque -->
                                <div class="col-md-6">
                                    <div class="font-xs">
                                        <ul>
                                            <li class="mb-5">Código do produto: <span class="text-brand" id="pcode"></span></li>
                                            <li class="mb-5">
                                                Estoque:
                                                <span class="badge badge-pill badge-success" id="aviable" style="background:green; color: white;"></span>
                                                <span class="badge badge-pill badge-danger" id="stockout" style="background:red; color: white;"></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fim das informações do produto -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Cuata\Desktop\ALY\starshop\resources\views/frontend/body/quickview.blade.php ENDPATH**/ ?>