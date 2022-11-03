<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css');?>">
    <title>Library</title>
</head>

<body>
    <div id="wrapper">
        <header>
            <hgroup>
                <h1>RentalBuku.net</h1>
                <h3>Membuat Template Sederhana dengan
                    CodeIgniter</h3>
            </hgroup>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url('home')?>">Home</a></li>
                    <li><a href="<?php echo base_url('home/about')?>">About</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </header>
        <section>
        <?= $this->renderSection('header') ?>
        <?= $this->renderSection('content') ?>
        </section>
        <footer>
            <a href="http://www.RentalBuku.com">RentalBuku</a>
        </footer>
    </div>
</body>

</html>