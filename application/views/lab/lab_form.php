<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Lab <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Lab <?php echo form_error('nama_lab') ?></label>
            <input type="text" class="form-control" name="nama_lab" id="nama_lab" placeholder="Nama Lab" value="<?php echo $nama_lab; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Pjs <?php echo form_error('pjs') ?></label>
            <input type="text" class="form-control" name="pjs" id="pjs" placeholder="Pjs" value="<?php echo $pjs; ?>" />
        </div>
	    <input type="hidden" name="id_lab" value="<?php echo $id_lab; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('lab') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>