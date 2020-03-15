<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Kelas Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Nama Kelas</td><td><?php echo $nama_kelas; ?></td></tr>
	    <tr><td>Prodi</td><td><?php echo $prodi; ?></td></tr>
	    <tr><td>Tahun Akademik</td><td><?php echo $tahun_akademik; ?></td></tr>
	    <tr><td>Angkatan</td><td><?php echo $angkatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kelas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>