<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Список альбомов</h1>
        <?php if($albums->count()): ?>
            <?php if(auth()->guard()->guest()): ?>

            <?php else: ?>
                <form action="<?php echo e(route('album',['id'=>'create'])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button id="btn" class="btn btn-primary" type="submit">Добавить альбом</button>
                </form>
            <?php endif; ?>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Обложка</th>
                        <th scope="col">Название</th>
                        <th scope="col">Исполнитель</th>
                        <th scope="col">Описание</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($album->id_album); ?></th>
                            <td style="width: 100px"><img class="img-fluid" src="<?php echo e($album->cover); ?>" alt=""></td>
                            <td><?php echo e($album->name); ?></td>
                            <td><?php echo e($album->author); ?></td>
                            <td><?php echo e($album->description); ?></td>
                            <td>
                                <?php if(auth()->guard()->guest()): ?>

                                <?php else: ?>
                                    <form action="<?php echo e(route('album',['id'=>$album->id_album])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-primary btn-sm" type="submit">Ред.</button>
                                    </form>
                                    <form action="<?php echo e(route('del_album',['id'=>$album->id_album])); ?>" method="POST" class="mt-3">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger btn-sm" type="submit">X</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
        <?php else: ?>
            <?php if(auth()->guard()->guest()): ?>
                <label>Пока тут пусто, что бы добавить альбом авторизуйтесь</label>
            <?php else: ?>
                <form action="<?php echo e(route('album',['id'=>'create'])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <label for="btn">Пока тут пусто</label>
                    <br>
                    <button id="btn" class="btn btn-primary" type="submit">Добавить альбом</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/index.blade.php ENDPATH**/ ?>