@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Editar Ticket</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Ticket</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Editar Ticket</h5>
            <hr/>
            <form method="post" id="myForm" action="{{route('update.ticket')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$ticket->id}}">
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3 form-group">
                                    <label for="inputEventName" class="form-label">Nome do Evento</label>
                                    <input type="text" name="event_name" class="form-control" id="inputEventName" value="{{$ticket->event_name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputEventDate" class="form-label">Data do Evento</label>
                                    <input type="datetime-local" name="event_date" class="form-control" id="inputEventDate" value="{{$ticket->event_date}}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputLocation" class="form-label">Local</label>
                                    <input type="text" name="location" class="form-control" id="inputLocation" value="{{$ticket->location}}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputDescription" class="form-label">Descrição</label>
                                    <textarea name="description" class="form-control" id="inputDescription" rows="3">{{$ticket->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputPriceNormal" class="form-label">Preço Normal</label>
                                        <input type="text" name="price_normal" class="form-control" id="inputPriceNormal" value="{{$ticket->price_normal}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPriceVIP" class="form-label">Preço VIP</label>
                                        <input type="text" name="price_vip" class="form-control" id="inputPriceVIP" value="{{$ticket->price_vip}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputQuantityNormal" class="form-label">Quantidade Normal</label>
                                        <input type="number" name="quantity_normal" class="form-control" id="inputQuantityNormal" value="{{$ticket->quantity_normal}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputQuantityVIP" class="form-label">Quantidade VIP</label>
                                        <input type="number" name="quantity_vip" class="form-control" id="inputQuantityVIP" value="{{$ticket->quantity_vip}}">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputPromoter" class="form-label">Escolher Promotor</label>
                                        <select class="form-select" name="vendor_id" id="inputPromoter">
                                            <option selected disabled>Selecione o promotor</option>
                                            @foreach($activePromoters as $promoter)
                                                <option value="{{$promoter->id}}" {{$promoter->id == $ticket->vendor_id ? 'selected' : ''}}>{{$promoter->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <input type="submit" class="btn btn-primary px-4" value="Atualizar Ticket" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#myForm").validate({
        rules: {
            event_name: {
                required: true,
                minlength: 3
            },
            event_date: {
                required: true
            },
            location: {
                required: true
            },
            price_normal: {
                required: true,
                number: true
            },
            quantity_normal: {
                required: true,
                digits: true
            },
            description: {
                required: true
            }
        },
        messages: {
            event_name: {
                required: "Por favor, insira o nome do evento",
                minlength: "O nome do evento deve ter pelo menos 3 caracteres"
            },
            event_date: {
                required: "Por favor, insira a data do evento"
            },
            location: {
                required: "Por favor, insira o local do evento"
            },
            price_normal: {
                required: "Por favor, insira o preço normal",
                number: "Por favor, insira um valor numérico válido"
            },
            quantity_normal: {
                required: "Por favor, insira a quantidade normal",
                digits: "Por favor, insira um número inteiro válido"
            },
            description: {
                required: "Por favor, insira uma descrição do evento"
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
@endsection
