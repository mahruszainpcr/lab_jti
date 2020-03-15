<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Peminjaman lab Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Level</td><td><?php echo $level; ?></td></tr>
	    <tr><td>Id Lab</td><td><?php echo $id_lab; ?></td></tr>
	    <tr><td>Tanggal Peminjaman</td><td><?php echo $tanggal_peminjaman; ?></td></tr>
	    <tr><td>Tanggal Mulai</td><td><?php echo $tanggal_mulai; ?></td></tr>
	    <tr><td>Tanggal Akhir</td><td><?php echo $tanggal_akhir; ?></td></tr>
	    <tr><td>Keperluan</td><td><?php echo $keperluan; ?></td></tr>
	    <tr><td>Daftar Nama</td><td><?php echo $daftar_nama; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Ketua Kegiatan</td><td><?php echo $ketua_kegiatan; ?></td></tr>
	    <tr><td>Nim Ketua</td><td><?php echo $nim_ketua; ?></td></tr>
	    <tr><td>Id Prodi</td><td><?php echo $id_prodi; ?></td></tr>
	    <tr><td>Kontak Ketua</td><td><?php echo $kontak_ketua; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('peminjaman_lab') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>