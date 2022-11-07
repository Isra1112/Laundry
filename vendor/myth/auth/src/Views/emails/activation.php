<h1>Welcome to Laundry Website!</h1>

<p>This is activation email for your account on <?= site_url() ?>.</p>

<p>To activate your account Click Here.</p>


<p><a href="<?= url_to('activate-account') . '?token=' . $hash ?>">Activate</a>.</p>

<br>

<p>If you did not registered on this website, you can safely ignore this email.</p>
