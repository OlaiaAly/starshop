@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Adicionar Ticket</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Adicionar Novo Ticket</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Adicionar Novo Ticket</h5>
            <hr/>
            <form method="post" id="myForm" action="{{ route('store.ticket') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-body mt-4">
        <div class="row">
            <!-- Coluna Principal -->
            <div class="col-lg-8">
                <div class="border border-3 p-4 rounded">
                    <div class="mb-3 form-group">
                        <label for="inputTicketTitle" class="form-label">Nome do Evento</label>
                        <input type="text" name="event_name" class="form-control" id="inputTicketTitle" placeholder="Digite o nome do evento" required>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="inputLocation" class="form-label">Local do Evento</label>
                        <input type="text" name="location" class="form-control" id="inputLocation" placeholder="Digite o local do evento" required>
                    </div>
                    
                    <!-- Data e Hora do Evento -->
                    <div class="mb-3 form-group">
                        <label for="inputEventDate" class="form-label">Data e Hora do Evento</label>
                        <input type="datetime-local" name="event_date" class="form-control" id="inputEventDate" 
                               value="{{ old('event_date', now()->format('Y-m-d\TH:i')) }}" required>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="inputTicketDescription" class="form-label">Descrição do Evento</label>
                        <textarea name="description" class="form-control" id="inputTicketDescription" rows="3" required></textarea>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="inputTicketImage" class="form-label">Imagem do Evento</label>
                        <input class="form-control" name="ticket_image" type="file" id="inputTicketImage" accept="image/*" required>
                    </div>
                </div>
            </div>

            <!-- Coluna Secundária -->
            <div class="col-lg-4">
                <div class="border border-3 p-4 rounded">
                    <h5>Preços e Quantidades</h5>
                    <hr/>

                    <!-- Preço e Quantidade Normal -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="inputPriceNormal" class="form-label">Preço Normal</label>
                            <input type="text" name="price_normal" class="form-control" id="inputPriceNormal" placeholder="Ex.: 100.00" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputQuantityNormal" class="form-label">Quantidade Normal</label>
                            <input type="number" name="quantity_normal" class="form-control" id="inputQuantityNormal" placeholder="Ex.: 200" required min="0">
                        </div>
                    </div>

                    <!-- Preço e Quantidade VIP -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="inputPriceVIP" class="form-label">Preço VIP</label>
                            <input type="text" name="price_vip" class="form-control" id="inputPriceVIP" placeholder="Ex.: 150.00">
                        </div>
                        <div class="col-md-6">
                            <label for="inputQuantityVIP" class="form-label">Quantidade VIP</label>
                            <input type="number" name="quantity_vip" class="form-control" id="inputQuantityVIP" placeholder="Ex.: 50" min="0">
                        </div>
                    </div>

                    <!-- Tipo de Evento -->
                    <div class="mb-3">
                        <label for="inputEventType" class="form-label">Tipo de Evento</label>
                        <select name="event_type" id="inputEventType" class="form-select" required>
                            <option value="SHOW">Show</option>
                            <option value="FESTIVAL">Festival</option>
                            <option value="CONCERTO">Concerto</option>
                            <option value="KARAOKE">Karaoke</option>
                            <option value="BANDA">Banda</option>
                        </select>
                    </div>

                    <!-- Categoria
                    <div class="mb-3">
                        <label for="inputCategory" class="form-label">Categoria</label>
                        <select class="form-select" name="category_id" id="inputCategory" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                    </div> -->

                    <!-- Escolher Promotor -->
                    <div class="mb-3">
                        <label for="inputVendorPromoter" class="form-label">Escolher Promotor</label>
                        <select class="form-select" name="vendor_id" id="inputVendorPromoter" required>
                            @foreach($activePromoters as $promoter)
                                <option value="{{ $promoter->id }}">{{ $promoter->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr/>

                    <!-- Botão para salvar -->
                    <div>
                        <button type="submit" class="btn btn-primary">Salvar Ticket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

            </div> 
        </div> 
    </div>

    <!-- JavaScript para prévia da imagem -->
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#multiImg').on('change', function() {
                if (window.File && window.FileReader && window.FileList && window.Blob) {
                    var data = $(this)[0].files;
                    $.each(data, function(index, file) {
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) {
                            var fRead = new FileReader();
                            fRead.onload = (function(file) {
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result)
                                        .width(100).height(80);
                                    $('#preview_img').append(img);
                                };
                            })(file);
                            fRead.readAsDataURL(file);
                        }
                    });
                } else {
                    alert("Seu navegador não suporta a API File!");
                }
            });
        });
    </script>

@endsection
