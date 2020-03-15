<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Log book <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Penjadwalan <?php echo form_error('penjadwalan') ?></label>
            <input type="text" class="form-control" name="penjadwalan" id="penjadwalan" placeholder="Penjadwalan" value="<?php echo $penjadwalan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Mahasiswa <?php echo form_error('mahasiswa') ?></label>
            <input type="text" class="form-control" name="mahasiswa" id="mahasiswa" placeholder="Mahasiswa" value="<?php echo $mahasiswa; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Kondisi <?php echo form_error('kondisi') ?></label>
            <input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi" value="<?php echo $kondisi; ?>" />
        </div>
	    <input type="hidden" name="id_log_book" value="<?php echo $id_log_book; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('log_book') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>