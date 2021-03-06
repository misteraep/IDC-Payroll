<script src="<?php echo base_url()?>static/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>static/js/jquery.number.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>static/js/form.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#riwayat_kerja_dari").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			maxDate: '-1d',
			showAnim: 'fold'
		});
		$("#riwayat_kerja_sampai").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			maxDate: '-1d',
			showAnim: 'fold'
		});
		$("#form_info-<?php echo $form?>").show();
		$("#form<?php echo $form?>").validate();
	});

	function submit_form ()
	{
		$('#form').ajaxSubmit({
			target : '#error_console',
			dataType : 'json',
			beforeSubmit    : show_loading,
			//error           : function (){alert("Error calling ajax");hide_loading();},
			success         : function (response){
			    if (response.status == 2 ){
				$('#error_console').html(response.text).addClass('error').fadeIn('slow');
			    }
			    else{
				$('#error_console').html(response.text).addClass('info').fadeIn('slow');
				ajax_link('<?php echo base_url().$module[0] ; ?>/employee_edit_ajax/<?php echo $this->uri->segment(4)?>/form-<?php echo $form ?>','#info<?php echo $form ?>');
				tb_remove();
			    }
			    hide_loading();   
			}   
		    });
		    return false;
	}

	function show_loading ()
	{
	    setTimeout(function(){
		$('#loading-layer').show();
		$('#loading').show();
	    }, 100);
	}

	function hide_loading(){
	    setTimeout(function(){
		$('#loading-layer').hide();
		$('#loading').hide();
	    }, 400);
	}
</script>

<?php echo form_open(uri_string(),array('class'=>'form','id'=>'form','onSubmit'=>'return submit_form();'))?>
<div id="error_console"></div>
<div id="form_info-2" style="display:none">
<h3>Informasi Keluarga</h3>
<ul>
	<li><?php echo form_input('pi1_nama',@$data->pi1_nama,'placeholder="Nama Lengkap"')?></li>
	<li><?php echo form_dropdown('pi1_jenis_kelamin',array ('L'=>'Laki-laki','P'=>'Perempuan'),(@$data->pi1_jenis_kelamin=='')?'L':@$data->pi1_jenis_kelamin,'class="required"') ?></li>
	<li><?php echo form_input('pi1_umur',@$data->pi1_umur,'placeholder="Umur" size="5px" class="required num"')?></li>
	<li><?php echo form_input('pi1_hubungan',@$data->pi1_hubungan,'placeholder="Hubungan Keluarga"')?></li>
	<li><?php echo form_input('pi1_pendidikan',@$data->pi1_pendidikan,'placeholder="Pendidikan" size="8"')?></li>
	<li><?php echo form_input('pi1_pekerjaan',@$data->pi1_pekerjaan,'placeholder="Pekerjaan"')?></li>
	<li class="form_handle"><?php echo form_submit('save','Save Data', 'class="awesome medium blue"')?> <?php echo form_button('close','Close', 'class="awesome medium blue" onclick="tb_remove()"')?></li>
</ul>
</div>
<div id="form_info-3" style="display:none">
<h3>Informasi Pendidikan Formal</h3>
<ul>
	<li><?php echo form_input('pi2_tingkat',@$data->pi2_tingkat,'placeholder="Tingkat" size="5"')?></li>
	<li><?php echo form_input('pi2_nama_sekolah',@$data->pi2_nama_sekolah,'placeholder="Nama Instansi" class="required"') ?></li>
	<li><?php echo form_input('pi2_tahun_lulus',@$data->pi2_tahun_lulus,'placeholder="Tahun" size="5px"')?></li>
	<li><?php echo form_input('pi2_jurusan',@$data->pi2_jurusan,'placeholder="Jurusan"')?></li>
	<li><?php echo form_input('pi2_sertifikasi',@$data->pi2_sertifikasi,'placeholder="Sertifikasi"')?></li>
	<li class="form_handle"><?php echo form_submit('save','Save Data', 'class="awesome medium blue"')?> <?php echo form_button('close','Close', 'class="awesome medium blue" onclick="tb_remove()"')?></li>
</ul>
</div>
<div id="form_info-4" style="display:none">
<h3>Informasi Pendidikan Informal</h3>
<ul>
	<li><?php echo form_input('pi3_jenis_kursus',@$data->pi3_jenis_kursus,'placeholder="Jenis Kursus"')?></li>
	<li><?php echo form_input('pi3_nama_lembaga',@$data->pi3_nama_lembaga,'placeholder="Nama Lembaga" class="required"') ?></li>
	<li><?php echo form_input('pi3_kualifikasi',@$data->pi3_kualifikasi,'placeholder="Kualifikasi"')?></li>
	<li><?php echo form_input('pi3_tahun',@$data->pi3_tahun,'placeholder="Tahun" size="5"')?></li>
	<li class="form_handle"><?php echo form_submit('save','Save Data', 'class="awesome medium blue"')?> <?php echo form_button('close','Close', 'class="awesome medium blue" onclick="tb_remove()"')?></li>
</ul>
</div>
<div id="form_info-5" style="display:none">
<h3>Informasi Bahasa</h3>
<ul>
	<li><?php echo form_input('pi4_bahasa',@$data->pi4_bahasa,'placeholder="Nama Bahasa"')?></li>
	<li><?php echo form_label('Nilai Bicara')?><?php echo form_input_type('number','pi4_nilai_bicara',(@$data->pi4_nilai_bicara=='')?0:@$data->pi4_nilai_bicara,'min="0" max="5" style="width:50px"')?> dari 5</li>
	<li><?php echo form_label('Nilai Membaca')?><?php echo form_input_type('number','pi4_nilai_membaca',(@$data->pi4_nilai_membaca=='')?0:@$data->pi4_nilai_membaca,'min="0" max="5" style="width:50px"')?> dari 5</li>
	<li><?php echo form_label('Nilai Menulis')?><?php echo form_input_type('number','pi4_nilai_menulis',(@$data->pi4_nilai_menulis=='')?0:@$data->pi4_nilai_menulis,'min="0" max="5" style="width:50px"')?> dari 5</li>
	<li class="form_handle"><?php echo form_submit('save','Save Data', 'class="awesome medium blue"')?> <?php echo form_button('close','Close', 'class="awesome medium blue" onclick="tb_remove()"')?></li>
</ul>
</div>
<div id="form_info-6" style="display:none">
<h3>Informasi Riwayat Pekerjaan</h3>
<ul>
	<li><?php echo form_input('pi5_nama_perusahaan',@$data->pi5_nama_perusahaan,'placeholder="Nama Pekerjaan"')?></li>
	<li><?php echo form_input('pi5_dari',@$data->pi5_dari,'placeholder="Dari" size="12px" id="riwayat_kerja_dari" placeholder="yyyy/mm/dd" class="required datepicker"')?></li>
	<li><?php echo form_input('pi5_sampai',@$data->pi5_sampai,'placeholder="Sampai" size="12px" id="riwayat_kerja_sampai" placeholder="yyyy/mm/dd" class="required datepicker"')?></li>
	<li><?php echo form_input('pi5_jabatan',@$data->pi5_jabatan,'placeholder="Jabatan"')?></li>
	<li><?php echo form_input('pi5_pekerjaan',@$data->pi5_pekerjaan,'placeholder="Pekerjaan"')?></li>
	<li>Rp <?php echo form_input('pi5_gaji',@$data->pi5_gaji,'placeholder="Gaji"')?></li>
	<li class="form_handle"><?php echo form_submit('save','Save Data', 'class="awesome medium blue"')?> <?php echo form_button('close','Close', 'class="awesome medium blue" onclick="tb_remove()"')?></li>
</ul>
</div>
