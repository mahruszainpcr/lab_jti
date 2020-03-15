<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
	function generate_sidemenu()
	{
		return '<li>
		<a href="'.site_url('dosen').'"><i class="fa fa-list fa-fw"></i> Dosen</a>
	</li><li>
		<a href="'.site_url('kelas').'"><i class="fa fa-list fa-fw"></i> Kelas</a>
	</li><li>
		<a href="'.site_url('lab').'"><i class="fa fa-list fa-fw"></i> Lab</a>
	</li><li>
		<a href="'.site_url('log_book').'"><i class="fa fa-list fa-fw"></i> Log book</a>
	</li><li>
		<a href="'.site_url('mahasiswa').'"><i class="fa fa-list fa-fw"></i> Mahasiswa</a>
	</li><li>
		<a href="'.site_url('mahasiswa_pc').'"><i class="fa fa-list fa-fw"></i> Mahasiswa pc</a>
	</li><li>
		<a href="'.site_url('matakuliah').'"><i class="fa fa-list fa-fw"></i> Matakuliah</a>
	</li><li>
		<a href="'.site_url('peminjaman_lab').'"><i class="fa fa-list fa-fw"></i> Peminjaman lab</a>
	</li><li>
		<a href="'.site_url('penjadwalan').'"><i class="fa fa-list fa-fw"></i> Penjadwalan</a>
	</li><li>
		<a href="'.site_url('prodi').'"><i class="fa fa-list fa-fw"></i> Prodi</a>
	</li><li>
		<a href="'.site_url('tahun_akademik').'"><i class="fa fa-list fa-fw"></i> Tahun akademik</a>
	</li>';
	}
