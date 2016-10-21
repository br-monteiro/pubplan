<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Bruno Monteiro">

    <title><?php echo $__env->yieldContent('title'); ?> :: <?php echo e(APPNAM); ?> <?php echo e(APPVER); ?> ::</title>

    <?php echo $__env->make('layout.Common.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</head>

<body>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('layout.Common.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


</body>

</html>

