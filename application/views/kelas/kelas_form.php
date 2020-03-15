<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Kelas <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kelas <?php echo form_error('nama_kelas') ?></label>
            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" value="<?php echo $nama_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Prodi <?php echo form_error('prodi') ?></label>
            <input type="text" class="form-control" name="prodi" id="prodi" placeholder="Prodi" value="<?php echo $prodi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tahun Akademik <?php echo form_error('tahun_akademik') ?></label>
            <input type="text" class="form-control" name="tahun_akademik" id="tahun_akademik" placeholder="Tahun Akademik" value="<?php echo $tahun_akademik; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Angkatan <?php echo form_error('angkatan') ?></label>
            <input type="text" class="form-control" name="angkatan" id="angkatan" placeholder="Angkatan" value="<?php echo $angkatan; ?>" />
        </div>
	    <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kelas') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>