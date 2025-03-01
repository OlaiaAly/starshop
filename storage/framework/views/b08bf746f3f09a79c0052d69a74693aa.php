
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
								<li class="breadcrumb-item active" aria-current="page">Todas Categorias</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="<?php echo e(route('add.category')); ?>" class="btn btn-primary">Adcionar Categoria</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Nome Da Categoria</th>
										<th>Imagem Da Categoria</th>
										<th>Acção </th>
										
									</tr>
								</thead>
								<tbody>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($key+1); ?></td>
										<td><?php echo e($item->category_name); ?></td>
										<td>
										<?php echo e($item->getFirstMedia('categories')?->img()?->attributes(["style" =>'width:70px; height:40px;'])); ?>	
										<td>
                                        <a href="<?php echo e(route('edit.category',$item->id)); ?>" class="btn btn-info">Editar</a>
                                        <a href="<?php echo e(route('delete.category',$item->id)); ?>" id="delete" class="btn btn-danger">Eliminar</a>
                                        </td>
										
									</tr>
									
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
								<tfoot>
									<tr>
                                    <th>Sl</th>
										<th>Nome Da Categoria</th>
										<th>Imagem Da Categoria</th>
										<th>Acção </th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				
			</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Cuata\Desktop\laravel10\resources\views/backend/category/category_all.blade.php ENDPATH**/ ?>