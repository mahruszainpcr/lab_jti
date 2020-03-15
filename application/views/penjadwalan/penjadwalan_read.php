<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Penjadwalan Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Nama Matakuliah</td><td><?php echo $nama_matakuliah; ?></td></tr>
	    <tr><td>Hari</td><td><?php echo $hari; ?></td></tr>
	    <tr><td>Jam Mulai</td><td><?php echo $jam_mulai; ?></td></tr>
	    <tr><td>Jam Selesai</td><td><?php echo $jam_selesai; ?></td></tr>
	    <tr><td>Dosen</td><td><?php echo $dosen; ?></td></tr>
	    <tr><td>Ail</td><td><?php echo $ail; ?></td></tr>
	    <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penjadwalan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>