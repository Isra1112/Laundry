<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">
    <div class="row justify-content-center">

        <div class="col-xl-12 col-lg-12 col-md-12">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-6 pl-0">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <form class="user" action="<?= url_to('register') ?>" method="post">
                                    <?= csrf_field() ?>

                                    <div class="form-group">
                                        <label class="pl-1" for="email"><?= lang('Auth.email') ?></label>
                                        <input type="email" name="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                        <small class="pl-1" id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="pl-1" for="username"><?= lang('Auth.username') ?></label>
                                        <input type="text" name="username" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="pl-1" for="password"><?= lang('Auth.password') ?></label>
                                            <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">

                                            <label class="pl-1" for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                            <input type="password" name="pass_confirm" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                        </div>
                                    </div>

                                    <br>

                                    <button type="submit" class="btn btn-primary btn-user btn-block"><?= lang('Auth.register') ?></button>
                                </form>
                                <hr>
                                <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>