<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Mahasiswa pc <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Mahasiswa Pc <?php echo form_error('mahasiswa_pc') ?></label>
            <input type="text" class="form-control" name="mahasiswa_pc" id="mahasiswa_pc" placeholder="Mahasiswa Pc" value="<?php echo $mahasiswa_pc; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Penjadwalan <?php echo form_error('penjadwalan') ?></label>
            <input type="text" class="form-control" name="penjadwalan" id="penjadwalan" placeholder="Penjadwalan" value="<?php echo $penjadwalan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">No Pc <?php echo form_error('no_pc') ?></label>
            <input type="text" class="form-control" name="no_pc" id="no_pc" placeholder="No Pc" value="<?php echo $no_pc; ?>" />
        </div>
	    <input type="hidden" name="id_mahasiswa_pc" value="<?php echo $id_mahasiswa_pc; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mahasiswa_pc') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>