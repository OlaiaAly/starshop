<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <figure class="border-radius-10">
                                <img src="" id="pimage" alt="Imagem do Ticket" style="width:100%; height:auto;">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <h5 class="title-detail"><a href="#" id="pname" class="text-heading"></a></h5>
                            <br>

                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand" id="pprice">Mzn</span>
                                    <span id="ticket-type"></span> <!-- Para exibir o tipo de ticket -->
                                </div>
                            </div>

                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="qty" id="qty" class="qty-val" value="1" min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart" onClick="addToCart()"><i class="fi-rs-shopping-cart"></i>Adicionar ao carrinho</button>
                                </div>
                            </div>

                            <!-- Informações adicionais -->
                            <h6>Informações do Ticket</h6>
                            <ul>
                                <li>Código do Ticket: <span id="pcode"></span></li>
                                <li>Estoque: <span id="aviable" style="color: green;">Disponível</span></li> <!-- Ajuste conforme necessário -->
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Função para abrir o modal e preencher os dados do ticket
function openQuickView(ticket) {
    // Preencher os dados do ticket no modal
    document.getElementById('pname').innerText = ticket.event_name;
    document.getElementById('pprice').innerText = ticket.price_normal; // ou ticket.price_vip dependendo da escolha
    document.getElementById('ticket-type').innerText = ticket.type; // 'Normal' ou 'VIP'
    document.getElementById('pcode').innerText = ticket.id; // Código do ticket
    document.getElementById('pimage').src = ticket.image_url; // URL da imagem do ticket

    // Exibir o modal
    $('#quickViewModal').modal('show');
}
</script>
