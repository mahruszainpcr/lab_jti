<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Prodi <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Prodi <?php echo form_error('nama_prodi') ?></label>
            <input type="text" class="form-control" name="nama_prodi" id="nama_prodi" placeholder="Nama Prodi" value="<?php echo $nama_prodi; ?>" />
        </div>
	    <input type="hidden" name="id_prodi" value="<?php echo $id_prodi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('prodi') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>