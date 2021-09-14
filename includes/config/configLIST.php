
<script>
$(document).ready(function() {
	$('#tabelData').dataTable({
		"ordering": false
	});
	$('.pagination').addClass('pagination-sm');
	$('.dataTables_length').addClass('hidden');
});
</script>

<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header"><?= $arr['headname'] ?></h1>
	</div>
</div><!--/.row-->

<ul class="breadcrumb">
	<?php
		foreach ($bc as $k => $v) 
		{
		    echo "<li><a href='$v'>$k</a></li>";
		}
	?>
</ul>

<div class="panel panel-default" style="margin-top: 10px;">
	<div class="panel-body">
		<div class="media">
			<div class="media-body">
				<h5 class="media-heading"><?= $arr['headname']; ?></h5>
				<p><?= $arr['description']; ?></p>
			</div>	
		</div>
	</div>
</div>

<?= $fs->ShowFlashMsg(); ?>

<div class="panel panel-default">
	<div class="panel-body">
		<a class="btn btn-primary" href="?page=<?= $arr['prefix'] ?>&act=tambah"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<div class="table-responsive">
		    <table class="table table-condensed" id="tabelData">
		        <thead>
		            <th>No</th>
		            <th>Configurasi</th>
		            <th>Nama</th>
		            <th>More</th>
		        </thead>
		        <tbody>
		            <?php
		            # Query
		            $no = 1;
		            $Sql = " SELECT * FROM tbl_config ";
		    
		            $sth = $database->pdo->prepare($Sql);
		            $sth->execute();
		            while($row = $sth->fetch())
		            {
		                echo
		                "
		                <tr>
		                    <td>$no</td>
		                    <td>$row[configname]</td>
		                    <td>$row[configvalue]</td>
		                    <td>
								<div class='btn-group'>
									<a class='btn btn-default btn-xs' href='?page=$arr[prefix]&act=tambah&id=$row[configname]'>
										<span class='glyphicon glyphicon-edit'></span> Edit
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
		</div>
	</div>
</div>