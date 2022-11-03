<?= $this->extend('layout/layout') ?>
<?= $this->section('header') ?>
<header>
    <hgroup>
        <h1>RentalBuku.net</h1>
        <h3>Membuat Template Sederhana dengan
            CodeIgniter</h3>
    </hgroup>
    <nav>
        <ul>
            <li><a href=”<?php echo
                            base_url() . 'index.php/web' ?>”>Home</a></li>
            <li><a href=”<?php echo
                            base_url() . 'index.php/web/about' ?>”>About</a></li>
        </ul>
    </nav>
    <div class=”clear”></div>
</header>
<?= $this->endSection() ?>