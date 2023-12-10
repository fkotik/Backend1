<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Каталог</h1>
        <div class="row">
                <div class="col-4" style="height: 500px; ">
                    <div class="card" >
                        <img src="<?php echo e($product->url_img); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($product->name); ?></h5>
                            <p class="card-text">
                                Цена: <?php echo e($product->cost); ?> <br>
                                Страна: <?php echo e($product->country); ?> <br>
                                Год: <?php echo e($product->year); ?> <br>
                                Модель: <?php echo e($product->model); ?> <br>
                                Категория: <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($cate->id_category==$product->id_category): ?> <?php echo e($cate->name); ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/product.blade.php ENDPATH**/ ?>