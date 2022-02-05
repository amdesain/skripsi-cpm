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
                                    <th>Kode</th>
                                    <th>Deskripsi</th>
                                    <th>Bergantung</th>
                                    <th class="text-end" style="width:1px">
                                        <button class="btn btn-sm btn-success tambah" type="button">Tambah</button>
                                    </th>
                                </tr>
                            </thead> 
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="kode[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="deskripsi[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="bergantung[]" placeholder="eg:A,B,C">
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody> 
                            <tbody class="append"></div> 
                        </table>
                        <div class="form-group text-end">
                            <button class="btn btn-primary">Generate</button>
                        </div>
                    </form>
                </div>
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
                <input type="text" class="form-control" name="bergantung[]" placeholder="eg:A,B,C">
            </td>
            <td class="text-end ">
                <button class="btn btn-sm btn-danger hapus" type="button">Hapus</button>
            </td>
        </tr>`

        $(document).ready(function () {

            /**
             * menambahkan baris
             */
            $(document).on('click', '.tambah', function () {
                var table = $('.table-form');
                table.find('tbody.append').append(row);
            });

            /**
             * menghapus baris
             */
            $(document).on('click', '.hapus', function () {
                var current_row = $(this).parents('tr');
                current_row.remove();
            });
        });
    </script>


</body>

</html>