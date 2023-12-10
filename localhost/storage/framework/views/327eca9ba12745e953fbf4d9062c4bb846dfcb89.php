<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-6 offset-3">
            <form action="{{}}" method="post">
                <h1>Добавление альбома</h1>
                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Введите название альбома</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Введите исполнителя альбома</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Введите описание альбома</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Обложка альбома</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text">
                    </div>
                </div>

                <button type="submit" class="btn-primary btn">Добавить</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/red_album.blade.php ENDPATH**/ ?>