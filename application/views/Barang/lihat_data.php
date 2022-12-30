<style type="text/css">
table,
th,
tr,
td {
    text-align: center;
}

.swal2-popup {
    font-family: inherit;
    font-size: 1.2rem;
}

.btn-group,
.btn-group-vertical {
    position: relative;
    display: initial;
    vertical-align: middle;
}
</style>
<?php if ($this->session->flashdata('message')) { ?>
<div class="col-lg-12 alerts">
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4> <i class="icon fa fa-check"></i>Berhasil</h4>
        <p><?php echo $this->session->flashdata('message'); ?></p>
    </div>
</div>
<?php } else {
} ?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class='box-header  with-border'>
                    <h3 class='box-title'>Data Barang</h3>
                    <div class="pull-right">
                        <?php
						echo anchor('barang/post', 'Tambah data', array('class' => 'btn btn-success'))
						?>
                    </div>
                </div>
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori Barang</th>
                                <th>Ukuran</th>
                                <th>Harga</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
							foreach ($record as $r) { ?>
                            <tr>
                                <td><?php echo ++$no; ?></td>
                                <td><?php echo $r->nama_barang; ?></td>
                                <td><?php echo $r->nama_kategori; ?></td>
                                <td><?php echo $r->nama_ukuran; ?></td>
                                <td>Rp.<?php echo number_format($r->harga); ?></td>
                                <td>
                                    <a href="<?php echo (site_url('uploads/' . $r->foto)); ?>" class="image-link">
                                        <img src="<?php echo (site_url('uploads/' . $r->foto)); ?>" alt=""
                                            style="width:30px;height:30px">
                                    </a>
                                </td>
                                <td><?php
										echo anchor(site_url('barang/edit/' . $r->id_barang), '<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;&nbsp;Edit', array('title' => 'edit', 'class' => 'btn btn-sm btn-warning'));
										echo '&nbsp';
										echo anchor(site_url('barang/hapus/' . $r->id_barang), '<i class="fa fa-trash fa-lg"></i>&nbsp;&nbsp;Hapus', 'title="delete" class="btn btn-sm btn-danger "');
										?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo base_url() ?>assets/app/js/alert.js"></script>
<script>
"fnDrawCallback": function() {
    $('.image-link').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        },
    });
}
});
});
</script>