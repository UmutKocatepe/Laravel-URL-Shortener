<!DOCTYPE html>
<html>

<head>
    <title>URL Shortener</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">URL Shortener</h1>
                <form action="<?php echo e(route('shorten')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="url">Enter URL:</label>
                        <input type="text" class="form-control" id="url" name="url" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Shorten</button>
                </form>
                <?php if(session('shortenedUrl')): ?>
                <div class="alert alert-success mt-3">
                    Shortened URL: <a href="<?php echo e(session('shortenedUrl')); ?>" target="_blank"><?php echo e(session('shortenedUrl')); ?></a>
                </div>
                <?php endif; ?>
                <?php if($errors->any()): ?>
                <div class="alert alert-danger mt-3">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\url-shortener\resources\views/welcome.blade.php ENDPATH**/ ?>