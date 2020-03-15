<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Dosen <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Dosen <?php echo form_error('nama_dosen') ?></label>
            <input type="text" class="form-control" name="nama_dosen" id="nama_dosen" placeholder="Nama Dosen" value="<?php echo $nama_dosen; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Inisial <?php echo form_error('inisial') ?></label>
            <input type="text" class="form-control" name="inisial" id="inisial" placeholder="Inisial" value="<?php echo $inisial; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
        </div>
	    <input type="hidden" name="id_dosen" value="<?php echo $id_dosen; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dosen') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>