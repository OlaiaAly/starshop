@php
$id=Auth::user()->id;
$promoterId=App\Models\User::find($id);
$status=$promoterId->status;
@endphp

<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">StarShop</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
			<li>
					<a href="{{route('promoter.dashboard')}}">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Painel De Controle</div>
					</a>
				</li>
				@if($status==='active')

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Gerir Ticket</div>
					</a>
					<ul>
						<li> <a href="{{route('vendor.all.product')}}"><i class="bx bx-right-arrow-alt"></i>Todos Produtos</a>
						</li>
						<li> <a href="{{route('vendor.add.product')}}"><i class="bx bx-right-arrow-alt"></i>Adcionar Produto</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Todos Pedidos</div>
					</a>
					<ul>
						<li> <a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Email</a>
						</li>
						<li> <a href="app-chat-box.html"><i class="bx bx-right-arrow-alt"></i>Chat Box</a>
						</li>
						
					</ul>
				</li>
				
				@else
				@endif
			
				<li>
					<a href="" target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>