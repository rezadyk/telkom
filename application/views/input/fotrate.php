<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <div class="form-group row">
                <label for="nik" class="col-sm-2 col-form-label">Nomor Tiket</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_tiket" name="nomor_tiket" value="<?= $nomor_tiket; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-7">
                            <img src="<?= base_url('assets/img/laporan/') . $laporan['image']; ?>" class="img-thumbnail" alt="Responsive image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">URL Rating</div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" name="url" value="<?= base_url('/rating/') . $penilaian['token']; ?>" readonly>
                    <button onclick="myFunction()" onmouseout="outFunc()" class="btn btn-secondary">
                        <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->