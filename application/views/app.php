<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>CPM</title>

    <link rel="canonical" href="<?= base_url('') ?>">


    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/bootstrap.min.css') ?>" rel="stylesheet" crossorigin="anonymous">
    <link href="<?= base_url('assets/fontawesome/css/all.min.css') ?>" rel="stylesheet">

    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .table>:not(:first-child) {
            border-top: none;
        }
    </style>


</head>

<body>

    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                        <circle cx="12" cy="13" r="4" />
                    </svg>
                    <strong>Critical Path Method</strong>
                </a>
            </div>
        </div>
    </header>

    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Critical Path Method</h1>
                    <p class="lead text-muted">Critical Path Method Adalah ... </p>
                </div>
            </div>
        </section>
        <section class="py-5 container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Kegiatan</h3>
                    <form action="">
                        <table class="table table-bordered table-form">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">Kode</th>
                                    <th>Deskripsi</th>
                                    <th>Durasi</th>
                                    <th>Bergantung</th>
                                    <th class="text-end" style="width:1px">
                                        <button class="btn btn-sm btn-success tambah" type="button">Tambah</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($input->get('kode') ?? []) > 0) {
                                    foreach ($input->get('kode') as $index => $row) {
                                ?>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="kode[]" value="<?= $row ?>">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="deskripsi[]" value="<?= $input->get('deskripsi')[$index] ?>">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="durasi[]" value="<?= $input->get('durasi')[$index] ?>">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="bergantung[]" placeholder="Contoh:A,B,C" value="<?= $input->get('bergantung')[$index] ?>">
                                            </td>
                                            <td class="text-end">
                                                <?= ($index > 0) ? '<button class="btn btn-sm btn-danger hapus" type="button">Hapus</button>' : '' ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="kode[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="deskripsi[]">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="durasi[]">
                                        </td>
                                        <td class="text-end">
                                            <input type="text" class="form-control" name="bergantung[]" placeholder="Contoh:A,B,C">
                                        </td>
                                        <td></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tbody class="append">
                </div>
                </table>
                <div class="form-group text-end">
                    <button class="btn btn-primary">Generate</button>
                </div>
                </form>
            </div>
            <?php
            if (count($input->get('kode') ?? []) > 0) {
            ?>
                <div class="col-md-12">
                    <h3>Hasil</h3>
                    <p>
                        Dari data kegiatan diatas <b class="text-danger">jalur kritis</b> nya adalah
                        <b><?= $critical_path_formated ?></b>
                        dengan total <b><?= $total_days ?></b> hari
                    </p>
                    <div class="row">
                        <?php
                        foreach ($critical_path as $critical_path_index => $critical_path_row) {
                        ?>
                            <div class="col-md-2 mb-5">
                                <div class="row">
                                    <div class="col-auto pt-5 <?= ($critical_path_index == 0)? 'opacity-0': '' ?>">
                                        <i class="fa fa-arrow-right fa-2x"></i>
                                    </div>
                                    <div class="col">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-center"><?= $critical_path_row['es'] ?></td>
                                                <td class="text-center"><?= $critical_path_row['d'] ?></td>
                                                <td class="text-center"><?= $critical_path_row['ef'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="3">
                                                    <?= $critical_path_row['kode'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><?= $critical_path_row['ls'] ?></td>
                                                <td class="text-center"><?= $critical_path_row['tf'] ?></td>
                                                <td class="text-center"><?= $critical_path_row['lf'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div> 
                    <p>
                        Dan kegiatan yang boleh molor adalah
                        <b><?= $float_path_formated ?></b>
                    </p>
                    <div class="row">
                        <?php
                        foreach ($float_path as $float_path_index => $float_path_row) {
                        ?>
                            <div class="col-md-2 mb-5">
                                <div class="row">
                                    <div class="col-auto pt-5 opacity-0">
                                        <i class="fa fa-arrow-right fa-2x"></i>
                                    </div>
                                    <div class="col">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-center"><?= $float_path_row['es'] ?></td>
                                                <td class="text-center"><?= $float_path_row['d'] ?></td>
                                                <td class="text-center"><?= $float_path_row['ef'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="3">
                                                    <?= $float_path_row['kode'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><?= $float_path_row['ls'] ?></td>
                                                <td class="text-center"><?= $float_path_row['tf'] ?></td>
                                                <td class="text-center"><?= $float_path_row['lf'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div> 
                </div>
            <?php
            }
            ?>
            </div>
        </section>

    </main>

    <div id="blueprint">
    </div>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.1/getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>


    <script src="<?= base_url('assets/bootstrap.bundle.min.js') ?>" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/jquery.min.js') ?>" crossorigin="anonymous"></script>

    <script>
        let row = `<tr>
            <td>
                <input type="text" class="form-control" name="kode[]">
            </td>
            <td>
                <input type="text" class="form-control" name="deskripsi[]">
            </td>
            <td>
                <input type="number" class="form-control" name="durasi[]">
            </td>
            <td>
                <input type="text" class="form-control" name="bergantung[]" placeholder="Contoh:A,B,C">
            </td>
            <td class="text-end">
                <button class="btn btn-sm btn-danger hapus" type="button">Hapus</button>
            </td>
        </tr>`

        $(document).ready(function() {

            /**
             * menambahkan baris
             */
            $(document).on('click', '.tambah', function() {
                var table = $('.table-form');
                table.find('tbody.append').append(row);
            });

            /**
             * menghapus baris
             */
            $(document).on('click', '.hapus', function() {
                var current_row = $(this).parents('tr');
                current_row.remove();
            });
        });
    </script>


</body>

</html>