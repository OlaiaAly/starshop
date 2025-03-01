
<?php $__env->startSection('admin'); ?>

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Todas Categorias</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Todas Produtos</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="<?php echo e(route('add.product')); ?>" class="btn btn-primary">Adcionar Produto</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6> Tens <span class="badge rounded-pill bg-danger"><?php echo e(count($products)); ?></span>
				produtos</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
                                        <th>Imagem Do Produto</th>
										<th>Nome Do Produto</th>
                                        <th>Preco Do Produto</th>
										<th>Quantidade Do Produto</th>
										<th>Desconto Do Produto</th>
                                        <th>Status Do Produto</th>
										<th>Acção </th>
										
									</tr>
								</thead>
								<tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($key+1); ?></td>
										<td>
										<?php echo e($item->getFirstMedia('cover')?->img()?->attributes(["style" =>'width:70px; height:40px;'])); ?>	
										</td>
                                        <td><?php echo e($item->product_name); ?></td>
                                        <td><?php echo e($item->selling_price); ?> Mzn</td>
                                        <td><?php echo e($item->product_qty); ?></td>
                                        <td>
											
										<?php if($item->discount_price == NULL): ?>
										<span class="badge rounded-pill bg-info">Sem Disconto</span>
										<?php else: ?>
										<?php
										$amount= $item->selling_price - $item->discount_price;
										$discount= ($amount/$item->selling_price)*100;
										?>
										<span class="badge rounded-pill bg-danger"><?php echo e(round($discount)); ?>%</span>

										<?php endif; ?>
										
									
										</td>



                                        <td>
											<?php if($item->status == 1): ?>
											<span class="badge rounded-pill bg-success">Ativo</span>
											<?php else: ?>
											<span class="badge rounded-pill bg-danger">Desativado</span>

											<?php endif; ?>
										</td>

                                        <td>
                                        <a href="<?php echo e(route('edit.product',$item->id)); ?>" class="btn btn-info" title="Editar dados"><i Class="fa fa-pencil"></i></a>
                                        <a href="<?php echo e(route('delete.product',$item->id)); ?>" id="delete" title="Deletar Dados" class="btn btn-danger"><i Class="fa fa-trash"></i></a>
										<a href="<?php echo e(route('edit.product',$item->id)); ?>" class="btn btn-warning" title="detalhes"><i Class="fa fa-eye"></i></a>
										<?php if($item->status == 1): ?>

										<a href="<?php echo e(route('product.inactive',$item->id)); ?>" class="btn btn-primary" title="Desativar"><i Class="fa-solid fa-thumbs-down"></i></a>
										<?php else: ?>
										<a href="<?php echo e(route('product.active',$item->id)); ?>" class="btn btn-primary" title="Ativar"><i Class="fa-solid fa-thumbs-up"></i></a>
										<?php endif; ?>
									</td>
										
									</tr>
									
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
								<tfoot>
									<tr>
                                        <th>Sl</th>
                                        <th>Imagem Do Produto</th>
										<th>Nome Do Produto</th>
                                        <th>Preco Do Produto</th>
										<th>Quantidade Do Produto</th>
										<th>Desconto Do Produto</th>
                                        <th>Status Do Produto</th>
										<th>Acção </th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				
			</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Cuata\laravel10\resources\views/backend/product/product_all.blade.php ENDPATH**/ ?>