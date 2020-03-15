<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Tahun akademik <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Tahun Akademin <?php echo form_error('nama_tahun_akademin') ?></label>
            <input type="text" class="form-control" name="nama_tahun_akademin" id="nama_tahun_akademin" placeholder="Nama Tahun Akademin" value="<?php echo $nama_tahun_akademin; ?>" />
        </div>
	    <input type="hidden" name="id_tahun_akademik" value="<?php echo $id_tahun_akademik; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tahun_akademik') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>