<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if($id=='create'): ?>
            <div class="col-6 offset-3">
                <?php if(isset($pred)): ?>
                    <?php if($pred): ?>

                    <?php else: ?>
                        <?php echo e(__('No albums found.')); ?>

                    <?php endif; ?>
                <?php endif; ?>
                <form action="<?php echo e(route('create_album')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <h1>Добавление альбома</h1>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Введите название альбома</label>
                        <div class="col-md-6">
                            <input required id="name" name="name" class="form-control" type="text" value="<?php if(isset($pred)): ?><?php if($pred): ?><?php echo e($pred->name); ?><?php endif; ?> <?php endif; ?>">
                            <button onclick="document.getElementById('name2').value=document.getElementById('name').value; document.getElementById('pred').submit()" type="button" class="btn btn-primary">Предзаполнить поля</button>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="author" class="col-md-4 col-form-label text-md-end">Введите исполнителя альбома</label>
                        <div class="col-md-6">
                            <input required id="author" name="author" class="form-control" type="text" value="<?php if(isset($pred)): ?><?php if($pred): ?><?php echo e($pred->artist); ?><?php endif; ?> <?php endif; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Введите описание альбома</label>
                        <div class="col-md-6">
                            <textarea required id="description" name="description" class="form-control" type="text"><?php if(isset($pred)): ?><?php if($pred): ?><?php echo e($descr); ?><?php endif; ?> <?php endif; ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Обложка альбома</label>
                        <div class="col-md-4">
                            <input hidden type="text" id="imgsrc" name="imgsrc">
                            <img id="img2" src="<?php if(isset($pred)): ?> <?php if($pred): ?><?php echo e($img); ?> <?php else: ?> <?php echo e(__('/assets/img/default_album_cover.png')); ?> <?php endif; ?> <?php else: ?> <?php echo e(__('/assets/img/default_album_cover.png')); ?> <?php endif; ?>" class="img-fluid">
                            <button onclick="document.getElementById('img2').src='/assets/img/default_album_cover.png'" type="button" class="btn btn-primary">Сбросить</button>
                        </div>
                    </div>

                    <button onclick="document.getElementById('imgsrc').value=document.getElementById('img2').src"  type="submit" class="btn-primary btn">Добавить</button>
                </form>
                <form id="pred" action="<?php echo e(route('pred',['id'=>$id])); ?>" method="GET">
                    <?php echo csrf_field(); ?>
                    <input hidden type="text" name="name" id="name2">
                </form>
            </div>
        <?php else: ?>
            <div class="col-6 offset-3">
                <form action="<?php echo e(route('red_album',['id'=>$id])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <h1>Редактирование альбома</h1>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Введите новое название альбома</label>
                        <div class="col-md-6">
                            <input required id="name" name="name" class="form-control" type="text" value="<?php echo e($album->name); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="author" class="col-md-4 col-form-label text-md-end">Введите нового исполнителя альбома</label>
                        <div class="col-md-6">
                            <input required id="author" name="author" class="form-control" type="text" value="<?php echo e($album->author); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Введите новое описание альбома</label>
                        <div class="col-md-6">
                            <textarea required id="description" name="description" class="form-control" type="text"><?php echo e($album->description); ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Обложка альбома</label>
                        <div class="col-md-4">
                            <input hidden type="text" id="imgsrc" name="imgsrc">
                            <img id="img2" src="<?php echo e($album->cover); ?>" class="img-fluid">
                            <button onclick="document.getElementById('img2').src='/assets/img/default_album_cover.png'" type="button" class="btn btn-primary">Сбросить</button>
                        </div>
                    </div>

                    <button onclick="document.getElementById('imgsrc').value=document.getElementById('img2').src" type="submit" class="btn-primary btn">Подтвердить</button>
                </form>
            </div>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/album.blade.php ENDPATH**/ ?>