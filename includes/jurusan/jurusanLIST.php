
<script>
$(document).ready(function() {
	$('#tabelData').dataTable({
		"ordering": false
	});
	$('.pagination').addClass('pagination-sm');
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
			<div class="table-responsive col-md-12">
			    <table class="table table-condensed" id="tabelData">
			        <thead>
			            <th>No</th>
			            <th>Kode</th>
			            <th>Nama Jurusan</th>
			            <th>Kampus</th>
			            <th>More</th>
			        </thead>
			        <tbody>
			            <?php
			            # Query
			            $no = 1;
			            $Sql = " SELECT * FROM tbl_jurusan
			            		 INNER JOIN tbl_kampus ON (tbl_kampus.kodekampus = tbl_jurusan.kodekampus) ";

			            $sth = $database->pdo->prepare($Sql);
			            $sth->execute();
			            while($row = $sth->fetch())
			            {
			                echo
			                "
			                <tr>
			                    <td>$no</td>
			                    <td>$row[kodejurusan]</td>
			                    <td>$row[namajurusan]</td>
			                    <td>$row[namakampus]</td>
			                    <td>
									<div class='btn-group'>
										<a class='btn btn-default btn-xs' href='?page=$arr[prefix]&act=tambah&id=$row[kodejurusan]'>
											<span class='glyphicon glyphicon-edit'></span>
										</a>
										<a class='btn btn-danger btn-xs' href='$aksi?act=hapus&id=$row[kodejurusan]' onClick=\"return confirm('Hapus data $row[kodejurusan] ?')\">
										<span class='glyphicon glyphicon-remove'></span></a>
									</div>
			                    </td>
			                </tr>
			                ";
			                $no++;
			            }
			            ?>
			        </tbody>
			    </table>
			</div>
		</div>
		<div class="box-footer">
			<a class="btn btn-default" href="?page=home"><span class="fa fa-backward"></span> KEMBALI</a>
			<a class="btn btn-danger" href="?page=<?= $arr['prefix'] ?>&act=tambah"><span class="fa fa-plus"></span> TAMBAH</a>
		</div>
	</div>
</div>