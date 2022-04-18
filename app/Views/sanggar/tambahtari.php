<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah tari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!--CARD-->
        <div class="card">
            <div class="card-header">
                Data sanggar
            </div>
            <div class="card-body">
                <!--Pencarian-->
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="katakunci" placeholder="Masukan Kata Kunci" aria-label="Masukan Kata Kunci" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                    </div>
                </form>
                <!--Modal-->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Tari
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Tari</h5>
                                <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger error" role="alert" style="display: none;">
                                </div>
                                <div class="alert alert-primary sukses" role="alert" style="display: none;">
                                </div>
                                <!--Form tambah data-->
                                <input type="hidden" id="inputId">
                                <div class="mb-3 row">
                                    <label for="inputSanggar" class="col-sm-2 col-form-label">Sanggar</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSanggar">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputTari" class="col-sm-2 col-form-label">Nama Tari</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputTari">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputHarga" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputHarga">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputDurasi" class="col-sm-2 col-form-label">Durasi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputDurasi">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputGambar" class="col-sm-2 col-form-label">Pilih Gambar</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" id="inputGambar">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="tombolSimpan">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sanggar</th>
                            <th>Nama Tari</th>
                            <th>Harga</th>
                            <th>Durasi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataSanggar as $k => $v) {
                            $nomor = $nomor + 1;
                        ?>
                            <tr>
                                <td><?php echo $nomor ?></td>
                                <td><?php echo $v['sanggar'] ?></td>
                                <td><?php echo $v['tari'] ?></td>
                                <td><?php echo $v['harga'] ?></td>
                                <td><?php echo $v['durasi'] ?></td>
                                <td><?php echo $v['gambar'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus(<?php echo $v['id_tari'] ?>)">Delete</button>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="edit(<?php echo $v['id_tari'] ?>)">Edit</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                $lnkPagination = $pager->links();
                $lnkPagination = str_replace('<li class="active">', '<li class="page-item active">', $lnkPagination);
                $lnkPagination = str_replace('<li>', '<li class="page-item">', $lnkPagination);
                $lnkPagination = str_replace("<a", "<a class='page-link'", $lnkPagination);
                echo $lnkPagination;
                ?>
            </div>
        </div>
    </div>


    <!--Java Scrip -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        function hapus($id) {
            var result = confirm('Yakin mau melakukan proses delete');
            if (result) {
                window.location = "<?php echo site_url("tari/delete") ?>/" + $id;
            }
        }

        function edit($id) {
            $.ajax({
                url: "<?php echo site_url("tari/edit") ?>/" + $id,
                type: "get",
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.id != '') {
                        $('#inputId').val($obj.id);
                        $('#inputSanggar').val($obj.sanggar);
                        $('#inputTari').val($obj.tari);
                        $('#inputHarga').val($obj.harga);
                        $('#inputDurasi').val($obj.durasi);
                    }

                }


            });

        }

        function bersihkan() {
            $('#inputId').val('');
            $('#inputSanggar').val('');
            $('#inputTari').val('');
            $('#inputHarga').val('');
            $('#inputDurasi').val('');

        }

        $('.tombol-tutup').on('click', function() {
            if ($('.sukses').is(":visable")) {
                window.location.href = "<?php echo current_url() . "?" . $_SERVER['QUERY_STRING']
                                        ?>";
            }
            $('.alert').hide();
            bersihkan();
        });


        $('#tombolSimpan').on('click', function() {
            var $id = $('#inputId').val();
            var $sanggar = $('#inputSanggar').val();
            var $tari = $('#inputTari').val();
            var $harga = $('#inputHarga').val();
            var $durasi = $('#inputDurasi').val();
            var $namaGambar = $('#inputGambar').val();

            $.ajax({
                url: "<?php echo site_url("tari/simpan")  ?>",
                type: "POST",
                data: {
                    id_tari: $id,
                    sanggar: $sanggar,
                    tari: $tari,
                    harga: $harga,
                    durasi: $durasi,
                    gambar: $namaGambar
                },
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.sukses == false) {
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html($obj.error);
                    } else {
                        $('.error').hide();
                        $('.sukses').show();
                        $('.sukses').html($obj.sukses);
                    }
                }
            });
            bersihkan();

        });
    </script>

</body>

</html>
<?= $this->endSection(); ?>