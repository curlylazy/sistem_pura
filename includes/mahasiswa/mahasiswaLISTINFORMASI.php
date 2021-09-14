<?php
//tampilan mahasiswa buat atase
$statusmahasiswa = $_POST['statusmahasiswa'];

?>

<script>
$(document).ready(function() {
	$('#tabelData').dataTable({
		"ordering": false
	});
	$('.pagination').addClass('pagination-sm');

	$("#statusmahasiswa").val("<?= $statusmahasiswa; ?>");

	$("#cari").click(function() {
        $("#form1").attr("action", "<?= "index.php?page=mahasiswa&act=informasi"; ?>");
        $("#form1").submit();
    });
});
</script>

<div class="col-md-12">
	<section class="content-header">
		<ol class="breadcrumb">
			<?php
				foreach ($bc as $k => $v)
				{
				    echo "<li><a href='$v'>$k</a></li>";
				}
			?>
		</ol>
	</section>

	<div class="info-box">
		<span class="info-box-icon bg-yellow"><i class="fa <?= $FAicon; ?>"></i></span>
		<div class="info-box-content">
			<span class="info-box-number"><?= $arr['headname'] ?></span>
			<p><?= $arr['description']; ?></p>
		</div>
	</div>
</div>

<div class="col-md-12">
	<?= $fs->ShowFlashMsg(); ?>
</div>

<div class="col-md-12">
    <div class="box box-warning">
        <div class="box-body">

            <form id="form1" enctype="multipart/form-data" method="post" autocomplete="off">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status Mahasiswa</label>
                            <select type="text" class="form-control" name="statusmahasiswa" id="statusmahasiswa">
                            	<option value="">Semua Mahasiswa</option>
                            	<option value="0">Pending</option>
                            	<option value="1">Aktif / Masih Kuliah</option>
                            	<option value="2">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="button" id="cari" class="btn btn-default"><span class="fa fa-search"></span> CARI</button>
            </form>

        </div>
    </div>
</div>

<div class="col-md-12">
	<div class="box box-warning">
		<div class="box-body">
			<div class="table-responsive col-md-12">
			    <table class="table table-condensed" id="tabelData">
			        <thead>
			            <th>No</th>
			            <th>NIM</th>
			            <th>Nama</th>
			            <th>Kampus</th>
			            <th>Kabupaten</th>
			            <th>Kecamatan</th>
			            <th>Alamat</th>
			            <th>No Telepon</th>
			            <th>Status</th>
			            <th>More</th>
			        </thead>
			        <tbody>
			            <?php
			            # Query
			            $totalmhs = 0;
			            $total_pending = 0;
			            $total_aktif = 0;
			            $total_tidak_aktif = 0;

			            $no = 1;
			            $Sql = " SELECT * FROM tbl_mahasiswa
			            		 INNER JOIN tbl_kampus ON (tbl_kampus.kodekampus = tbl_mahasiswa.kodekampus)
			            		 WHERE TRUE ";

			            if($statusmahasiswa != "")
			            {
			            	$Sql .= " AND (tbl_mahasiswa.statusmahasiswa = :statusmahasiswa) ";
			            }

			            $sth = $database->pdo->prepare($Sql);
			            if($statusmahasiswa != "")
			            {
			            	$sth->bindValue(":statusmahasiswa", $statusmahasiswa);
			            }
			            $sth->execute();
			            while($row = $sth->fetch())
			            {

			            	$totalmhs = $totalmhs + 1;

			            	if($row['statusmahasiswa'] == 0)
			            		$total_pending = $total_pending + 1;

			            	if($row['statusmahasiswa'] == 1)
			            		$total_aktif = $total_aktif +1;

			            	if($row['statusmahasiswa'] == 2)
			            		$total_tidak_aktif = $total_tidak_aktif +1;

			                echo
			                "
			                <tr>
			                    <td>$no</td>
			                    <td>$row[nim]</td>
			                    <td>$row[namamahasiswa]</td>
			                    <td>$row[namakampus]</td>
			                    <td>$row[kabupatenmahasiswa]</td>
			                    <td>$row[kecamatanmahasiswa]</td>
			                    <td>$row[alamattinggal]</td>
			                    <td>$row[notelepon]</td>
			                    <td>".$fs->GetStatusMahasiswa($row['statusmahasiswa'])."</td>
			                    <td>
									<div class='btn-group'>
										<a class='btn btn-default btn-xs' href='?page=$arr[prefix]&act=detail&id=$row[kodemahasiswa]'>
											<span class='glyphicon glyphicon-edit'></span> detail
										</a>
									</div>
			                    </td>
			                </tr>
			                ";
			                $no++;
			            }
			            ?>
			        </tbody>
			    </table>
			    <hr />
			    
			    <h5>Pending : <b><?= $total_pending ?></b> Mahasiswa</h5>
			    <h5>Aktif : <b><?= $total_aktif ?></b> Mahasiswa</h5>
			    <h5>Tidak Aktif : <b><?= $total_tidak_aktif ?></b> Mahasiswa</h5>
			    <h5>Total Mahasiswa : <b><?= $totalmhs ?></b> Mahasiswa</h5>
			</div>
		</div>
		<div class="box-footer">
			<a class="btn btn-default" href="?page=home"><span class="fa fa-backward"></span> KEMBALI</a>
		</div>
	</div>
</div>
