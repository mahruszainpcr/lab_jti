<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Log book Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Penjadwalan</td><td><?php echo $penjadwalan; ?></td></tr>
	    <tr><td>Mahasiswa</td><td><?php echo $mahasiswa; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Kondisi</td><td><?php echo $kondisi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('log_book') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>