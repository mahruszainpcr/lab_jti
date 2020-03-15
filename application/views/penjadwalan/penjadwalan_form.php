<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Penjadwalan <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Nama Matakuliah <?php echo form_error('nama_matakuliah') ?></label>
            <input type="text" class="form-control" name="nama_matakuliah" id="nama_matakuliah" placeholder="Nama Matakuliah" value="<?php echo $nama_matakuliah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hari <?php echo form_error('hari') ?></label>
            <input type="text" class="form-control" name="hari" id="hari" placeholder="Hari" value="<?php echo $hari; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Jam Mulai <?php echo form_error('jam_mulai') ?></label>
            <input type="text" class="form-control" name="jam_mulai" id="jam_mulai" placeholder="Jam Mulai" value="<?php echo $jam_mulai; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Jam Selesai <?php echo form_error('jam_selesai') ?></label>
            <input type="text" class="form-control" name="jam_selesai" id="jam_selesai" placeholder="Jam Selesai" value="<?php echo $jam_selesai; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Dosen <?php echo form_error('dosen') ?></label>
            <input type="text" class="form-control" name="dosen" id="dosen" placeholder="Dosen" value="<?php echo $dosen; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Ail <?php echo form_error('ail') ?></label>
            <input type="text" class="form-control" name="ail" id="ail" placeholder="Ail" value="<?php echo $ail; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kelas <?php echo form_error('kelas') ?></label>
            <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" />
        </div>
	    <input type="hidden" name="id_penjadwalan" value="<?php echo $id_penjadwalan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penjadwalan') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>