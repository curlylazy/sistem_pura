
<script>
$(document).ready(function() {
	$('#tabelData').dataTable({
		"ordering": false
	});
	$('.pagination').addClass('pagination-sm');
	// $('.dataTables_length').addClass('hidden');
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
		<span class="info-box-icon bg-green"><i class="fa <?= $FAicon; ?>"></i></span>
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
	<div class="box box-success">
		<div class="box-body">
			<div class="table-responsive col-md-12">
			    <table class="table table-condensed" id="tabelData">
			        <thead>
			            <th>No</th>
			            <th>User</th>
			            <th>Password</th>
			            <th>Nama</th>
			            <th>Akses</th>
			            <th>Date Add</th>
			            <th>Date update</th>
			            <th>More</th>
			        </thead>
			        <tbody>
			            <?php
			            # Query
			            $no = 1;
			            $Sql = " SELECT * FROM tbl_user";
			            $sth = $database->pdo->prepare($Sql);
			            $sth->execute();
			            while($row = $sth->fetch())
			            {
			                echo
			                "
			                <tr>
			                    <td>$no</td>
			                    <td>$row[username]</td>
			                    <td>$row[password]</td>
			                    <td>$row[namauser]</td>
			                    <td>$row[akses]</td>
			                    <td>".date('d F Y', strtotime($row['dateadduser']))."</td>
			                    <td>".date('d F Y', strtotime($row['dateupduser']))."</td>
			                    <td>
									<div class='btn-group'>
										<a class='btn btn-default btn-xs' href='?page=$arr[prefix]&act=tambah&id=$row[kodeuser]'>
											<span class='glyphicon glyphicon-edit'></span>
										</a>
										<a class='btn btn-danger btn-xs' href='$aksi?act=hapus&id=$row[kodeuser]' onClick=\"return confirm('Hapus data $row[username] ?')\">
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
			<a class="btn btn-default" href="?page=home"><span class="glyphicon glyphicon-backward"></span> KEMBALI</a>
			<a class="btn btn-success" href="?page=<?= $arr['prefix'] ?>&act=tambah"><span class="glyphicon glyphicon-plus"></span> TAMBAH</a>
		</div>
	</div>
</div>
