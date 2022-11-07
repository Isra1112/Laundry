<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-11 col-lg-12 col-md-9">
			<?php if (session()->getFlashdata('msg')) : ?>
				<div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
			<?php endif; ?>
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<?= view('Myth\Auth\Views\_message_block') ?>
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block center py-4">
							<img src="<?php echo base_url('img/Modern and Minimalist Laundry Business Logo.png'); ?>" alt="">
						</div>
						<div class="col-lg-6">
							<div class="p-5 my-4">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
								</div>
								<hr>
								<form class="user" method="post" action="<?= url_to('login') ?>">

									<?= csrf_field() ?>

									<?php if ($config->validFields === ['email']) : ?>
										<div class="form-group">
										<label for="login"><?=lang('Auth.email')?></label>
											<input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
											<div class="invalid-feedback">
												<?= session('errors.login') ?>
											</div>
										</div>
									<?php else : ?>
										<div class="form-group">
										<label for="login"><?=lang('Auth.emailOrUsername')?></label>
											<input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
											<div class="invalid-feedback">
												<?= session('errors.login') ?>
											</div>
										</div>
									<?php endif; ?>
									<div class="form-group">
										<label for="password"><?= lang('Auth.password') ?></label>
										<input type="password" name="password" class="form-control  form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
										<div class="invalid-feedback">
											<?= session('errors.password') ?>
										</div>
									</div>


									
									<button class="btn btn-primary btn-user btn-block">
										<?= lang('Auth.loginAction') ?>
									</button type="submit">
								</form>
								<hr>
								<?php if ($config->allowRegistration) : ?>
									<p class="text-center"><a class="small" href=" <?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
								<?php endif; ?>
								<?php if ($config->activeResetter) : ?>
									<p class="text-center"><a class="small" href=" <?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>
<?= $this->endSection() ?>