<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?>assets\css\laundry\style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>CleanLaundry</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <a href="thriftshirtku.html">
                <h1>Clean<span>Laundry</span></h1>
            </a>
            <a href="#">
                <h3>Admin</h3>
            </a>
            <div class="main">
                <ul>
                    <li><a class="active" href="<?= base_url(), 'Crud_peserta/index'; ?>">Data Pelanggan</a></li>
                    <li><a href="<?= base_url(), 'Crud_instruktur/index'; ?>">Data Admin</a></li>
                    <li><a href="datatrans.html">Riwayat Transaksi</a></li>
                </ul>
            </div>
        </header>