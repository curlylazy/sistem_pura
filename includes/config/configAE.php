
<?php

$id = $_GET['id'];
$aksiform = "$aksi?act=update";
?>

<script>
$(document).ready(function() {

	var id = "<?= $id; ?>";

	// edit data
	if(id != "")
	{
		<?php

		$Sql = " SELECT * FROM tbl_config 
                 WHERE configname = :configname ";
        
        $sth = $database->pdo->prepare($Sql);
        $sth->bindValue(':configname', $id, PDO::PARAM_STR);
        $sth->execute();
        $row = $sth->fetch();
        
        $configvalue = $row['configvalue'];

        echo 
    	"
    		$('#configname').val('$row[configname]');
    		$('#judulslider').val('$row[judulslider]');
    	";

		?>
	}

	$('.intnumber').number(true, 0);
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

<form class="form-horizontal" method="post" action="<?= $aksiform ?>" enctype="multipart/form-data">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Config Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="configname" name="configname" readonly value="AUTO">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Config Value</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="configvalue" name="configvalue" required="" rows='15'><?= $configvalue; ?></textarea>
				</div>
			</div>		

		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-body">
			<a class="btn btn-primary" href="?page=<?= $arr['prefix']; ?>"><span class="glyphicon glyphicon-backward"></span> Kembali</a>
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		</div>
	</div>

</form>