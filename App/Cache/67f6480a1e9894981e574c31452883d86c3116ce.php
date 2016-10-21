<?php $__env->startSection('title', 'Área de login'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-lock"></i> Área de login</h3>
                </div>
                <div class="panel-body">
                    <div class="resultado"></div>

                    <form role="form" id="form" action="<?php echo e($controller); ?>autentica" method="post">
                        <?php echo $token; ?>

                        <fieldset>
                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text"
                                       name="username"
                                       id="username"
                                       class="form-control"
                                       placeholder="Login"
                                       required>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <input type="password"
                                       name="password"
                                       id="password"
                                       class="form-control"
                                       placeholder="Senha"
                                       required>
                            </div>
                            <input type="submit" value="Entrar" class="btn btn-lg btn-success btn-block">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.blank', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>