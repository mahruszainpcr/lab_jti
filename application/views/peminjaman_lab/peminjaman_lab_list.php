<?php $this->load->view('templates/header');?>
        <div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Peminjaman lab List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
				<div style="margin-top:20px;">
                <?php echo anchor(site_url('peminjaman_lab/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div></div>
        </div>
        <table class="table table-bordered table-striped table-condensed" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>Level</th>
		    <th>Lab</th>
		    <th>Tanggal Peminjaman</th>
		    <th>Tanggal Mulai</th>
		    <th>Tanggal Akhir</th>
		    <th>Keperluan</th>
		    <th>Ketua Kegiatan</th>
		    <th>Nim Ketua</th>
		    <th>Prodi</th>
		    <th>Kontak Ketua</th>
		    <th>Status</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table><?php $this->load->view('templates/footer'); ?><script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "peminjaman_lab/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_peminjaman_lab",
                            "orderable": false
                        },{"data": "level"},{"data": "id_lab"},{"data": "tanggal_peminjaman"},{"data": "tanggal_mulai"},{"data": "tanggal_akhir"},{"data": "keperluan"},{"data": "ketua_kegiatan"},{"data": "nim_ketua"},{"data": "id_prodi"},{"data": "kontak_ketua"},{"data": "status"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>