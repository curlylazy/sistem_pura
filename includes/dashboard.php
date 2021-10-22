<?php

$katakunci = $_POST['katakunci'];

?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Pendataan Pura</h1>
                    <span class="subheading">pencarian data pura se Indonesia</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <form id="form1" enctype="multipart/form-data" class="row g-3" action="index.php?page=dashboard" method="post">
                <div class="col-md-6">
                    <label for="katakunci" class="form-label">Katakunci</label>
                    <input type="text" class="form-control" value="<?= $katakunci ?>" id="katakunci" name="katakunci" placeholder="masukkan katakunci">
                </div>
                <div class="col-md-6">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <select type="text" class="form-control" id="provinsi" name="provinsi" placeholder="masukkan provinsi">
                        <?= $fs->DropDownProvinsi(); ?>
                    </select>
                </div>
                <div>
                    <button class="btn btn-primary btn-sm" type="submit">Cari Pura</button>
                </div>
            </form>
        </div>

        <?php

        $Sql = " SELECT * FROM tbl_pura
                 INNER JOIN tbl_user ON (tbl_user.kodeuser = tbl_pura.kodeuser) 
                 WHERE (tbl_pura.namapura LIKE :katakunci OR 
                        tbl_pura.jenispura LIKE :katakunci OR 
                        tbl_pura.alamatpura LIKE :katakunci)";

        $sth = $database->pdo->prepare($Sql);
        $sth->bindValue(':katakunci', "%$katakunci%", PDO::PARAM_STR);
        $sth->execute();
        while($row = $sth->fetch())
        {
            if($row['gambarpura'] == "")
            {
                $img = "https://via.placeholder.com/500x500?text=".urlencode($row['namapura']);
            }
            else
            {
                $img = "admin/data/gambar_upload/$row[gambarpura]";
            }

            $keteranganpura = strip_tags($row['keteranganpura']);
            $keteranganpura = substr($keteranganpura, 0, 100);
            
            echo "
            <div class='col-md-4 mt-3'>
                <div class='card'>
                    <img src='$img' class='card-img-top' alt='$row[namapura]' style='width: 100%; height: 300px;'>
                    <div class='card-body'>
                        <h6 class='card-title' style='margin-bottom: 0.1; letter-spacing: 2px;'>$row[namapura]</h6>
                        <p style='font-size: 10pt;'>
                            Jenis Pura : <b>$row[jenispura]</b><br />
                            Provinsi : : <b>$row[provinsi]</b>, Kabupaten : <b>$row[kabupaten]</b><br />
                            Alamat : $row[alamatpura]<br />
                        </p>
                        <p class='card-text'>$keteranganpura</p>
                        <a href='index.php?page=puradetail&id=$row[kodepura]' class='btn btn-primary btn-sm'>Selengkapnya</a>
                    </div>
                </div>
            </div>
            ";
        }

        ?>

    </div>
        
    <hr class="my-4" />
</div>

<!-- <div class="container px-lg-5">
    <div class="row gx-4 gx-lg-5">
        <div class="col-md-12 col-lg-12 col-xl-7">
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">Man must explore, and this is exploration at its greatest</h2>
                    <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on September 24, 2021
                </p>
            </div>
            <hr class="my-4" />
            <div class="post-preview">
                <a href="post.html"><h2 class="post-title">I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.</h2></a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on September 18, 2021
                </p>
            </div>
            <hr class="my-4" />
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">Science has not yet mastered prophecy</h2>
                    <h3 class="post-subtitle">We predict too much for the next year and yet far too little for the next ten.</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on August 24, 2021
                </p>
            </div>
            <hr class="my-4" />
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">Failure is not an option</h2>
                    <h3 class="post-subtitle">Many say exploration is part of our destiny, but it’s actually our duty to future generations.</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on July 8, 2021
                </p>
            </div>
            <hr class="my-4" />
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
        </div>
    </div>
</div> -->