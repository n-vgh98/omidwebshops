<?php $__env->startSection('content'); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title',__('generic.reigister_in_site')); ?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('generic.register_new_user')); ?></div>
                <p style="font-size:small;color: red;padding-<?php echo e(__('generic.is_rtl') == 'true' ? 'right' : 'left'); ?>: 5px"><?php echo e(__('generic.required_item')); ?></p>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-<?php echo e(__('generic.is_rtl') == 'true' ? 'right' : 'left'); ?>"><?php echo e(__('profile.name')); ?><span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-<?php echo e(__('generic.is_rtl') == 'true' ? 'right' : 'left'); ?>"><?php echo e(__('profile.age')); ?></label>

                            <div class="col-md-6">
                                <input id="age" type="number" min="10" max="120" class="form-control" name="age">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genere" class="col-md-4 col-form-label text-md-<?php echo e(__('generic.is_rtl') == 'true' ? 'right' : 'left'); ?>"><?php echo e(__('profile.gener')); ?></label>
                            <div class="col-md-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input mx-1" name="gener" value="<?php echo e(__('profile.male')); ?>" checked ><?php echo e(__('profile.male')); ?>

                                    </label>

                                </div>

                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input mx-1" name="gener" value="<?php echo e(__('profile.female')); ?>"><?php echo e(__('profile.female')); ?>

                                    </label>

                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="shoghl" class="col-md-4 col-form-label text-md-<?php echo e(__('generic.is_rtl') == 'true' ? 'right' : 'left'); ?>"><?php echo e(__('profile.work')); ?></label>

                            <div class="col-md-6">
                                <input id="shoghl" type="text" class="form-control" name="shoghl">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tahsilat" class="col-md-4 col-form-label text-md-<?php echo e(__('generic.is_rtl') == 'true' ? 'right' : 'left'); ?>"><?php echo e(__('profile.dgree')); ?></label>

                            <div class="col-md-6">
                                <input id="tahsilat" type="text" class="form-control" name="tahsilat">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mahalZendegi" class="col-md-4 col-form-label text-md-<?php echo e(__('generic.is_rtl') == 'true' ? 'right' : 'left'); ?>"><?php echo e(__('profile.address')); ?></label>

                            <div class="col-md-6">
                                <input id="mahalZendegi" type="text" class="form-control" name="mahalZendegi">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="mahalTavalod" class="col-md-4 col-form-label text-md-<?php echo e(__('generic.is_rtl') == 'true' ? 'right' : 'left'); ?>"><?php echo e(__('profile.address')); ?></label>

                            <div class="col-md-6">
                                <input id="mahalTavalod" type="text" class="form-control" name="mahalTavalod">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-<?php echo e(__('generic.is_rtl') == 'true' ? 'right' : 'left'); ?>"><?php echo e(__('profile.mobile')); ?></label>

                            <div class="col-md-6">
                                <input id="mobile" type="tel" class="form-control" name="mobile">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-<?php echo e(__('generic.is_rtl') == 'true' ? 'right' : 'left'); ?>"><?php echo e(__('profile.email')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>"  autocomplete="email">

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-<?php echo e(__('generic.is_rtl') == 'true' ? 'right' : 'left'); ?>"><?php echo e(__('profile.password')); ?><span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-<?php echo e(__('generic.is_rtl') == 'true' ? 'right' : 'left'); ?>"><?php echo e(__('profile.repeat_password')); ?><span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                  <?php echo e(__('profile.register')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/auth/register.blade.php ENDPATH**/ ?>