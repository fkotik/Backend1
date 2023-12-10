<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">Добавление категории</h5>
                <form action="<?php echo e(route('addCategory')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <label>Введите название категории</label>
                    <input name="cat" type="text">

                    <button class="btn btn-primary" type="submit">Добавить</button>
                    <?php echo e(session('messageadd')); ?>

                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Удаление категории</h5>
                <form action="<?php echo e(route('delCategory')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <label>Выберите категорию</label>
                    <select name="cat">
                        <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cate->id_category); ?>"><?php echo e($cate->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <button class="btn btn-primary" type="submit">Удалить</button>
                    <?php echo e(session('messagedel')); ?>

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/admin.blade.php ENDPATH**/ ?>