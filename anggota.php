<?php
  if (isset($_GET['update'])) {
    include('koneksi.php');
    $id = $_GET['id_anggota'];
    $nis = $_GET['nis'];
    $nama = $_GET['nama'];
    $kelas = $_GET['kelas'];q2  sd 
    $jurusan = $_GET['jurusan'];
    $tgl_lahir = $_GET['tgl_lahir'];
    $no_telepon = $_GET['no_telepon'];
    $alamat = $_GET['alamat'];
    $jenis_kelamin = $_GET['jenis_kelamin'];
    $query_update = mysqli_query($koneksi,"UPDATE anggota 
     SET nis = '$nis',
        nama = '$nama',
        kelas = '$kelas',
        jurusan = '$jurusan',
        tgl_lahir = '$tgl_lahir',
        no_telepon = '$no_telepon',
        alamat = '$alamat',
        jenis_kelamin = '$jenis_kelamin'
    WHERE id_anggota = '$id'
    ");
    if ($query_update) {
     
?>
<?php
// Proses Delete Data
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $query_delete = mysqli_query($koneksi,"DELETE FROM anggota WHERE id_anggota = '$id'");

    //Jika query delete berhasil maka munculkan notifikasi dan refresh halaman
    if ($query_delete) {
        ?>
        <div class="alert alert-success">
            Data Berhasil DIHAPUS !!!!!!!!!!
        </div>
        <?php
        header('Refresh:1; URL=http://localhost/14_mywebsite_XIIRPL2/admin.php?page=anggota');
    }
}
// end of proses delete

// Proses Insert Tambah Data
if(isset($_POST['simpan']))
{
    $nis            = $_POST['nis'];
    $nama           = $_POST['nama'];
    $kelas          = $_POST['kelas'];
    $jurusan        = $_POST['jurusan'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $no_telpon      = $_POST['no_telpon'];
    $alamat         = $_POST['alamat'];
    $jk             = $_POST['jenis_kelamin'];

    $query_insert = mysqli_query($koneksi,"INSERT INTO anggota VALUES('$nis','$nama','$kelas','$jurusan','$tanggal_lahir','$no_telpon','$alamat','$jk')");

    // Membuat notifikasi jika berhasil/tidak disimpn datany
    if($query_insert) 
    {
        ?>
            <div class="alert alert-success">
                Data Berhasil Disimpan !!!
            </div>
        <?php
        header('Refresh:1; URL=http://localhost/14_mywebsite_XIIRPL2/admin.php?page=anggota');
    }
    else
    {
        ?>
            <div class="alert alert-danger">
                Data GAGAL Disimpan !!!
            </div>
        <?php
    }

}
//
?>
<center><h4 class="mt-4 mb-3">Data Anggota</h4></center>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#inputdata">
    <b>Tambah Data</b>
</button>
<!-- ------- -->
<table class="table table-striped table-hover">
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Tanggal Lahir</th>
        <th>Telepon</td>
        <th>Alamat</th>
        <th>Jenis kelamin</th>
        <th>--Action--</th>
    </tr>
    <?php
        $query = mysqli_query($koneksi,"SELECT * FROM anggota");
        $no = 1;
        foreach ($query as $row) {
    ?>
    <tr>
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td valign="middle"><?php echo $row['nis']; ?></td>
        <td valign="middle"><?php echo $row['nama']; ?></td>
        <td valign="middle"><?php echo $row['kelas']; ?></td>
        <td valign="middle">
        <?php
            if ($row['jurusan']=='RPL') {
                echo "Rekayasa Perangkat Lunak";
            }elseif($row['jurusan']=='TAV'){
                echo "Teknik Audio Video";
            }elseif($row['jurusan']=='TKR'){
                echo "Teknik Kendaraan Ringan";
            }else{
                echo "Teknik Instalasi Tenaga Listrik";
            }
        ?>
            <?php echo $row['jurusan']; ?>
        </td>
        <td valign="middle"><?php echo $row['tanggal_lahir']; ?></td>
        <td valign="middle"><?php echo $row['no_telpon']; ?></td>
        <td valign="middle"><?php echo $row['alamat']; ?></td>
        <td align="center" valign="middle">
            <?php
               if $row['jenis_kelamin']=='L') {
                    echo "Laki-Laki ";
                }else {
                    echo "Perempuan ";
            }
            ?>
         <td>   
        <a href="?page=anggota&delete&id=<?php echo $row['id_anggota'];?>">
        <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
        </a>
        <a href="?page=anggota&edit&id=<?php echo $row['id_anggota'];?>">
        <button  class="btn btn-warning"><i class="fas fa-edit"></i></button>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>
<!--  -------------------------------------------------------------------------  -->


<!-- Modal Input Data -->
<div class="modal fade" id="inputdata" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="inputModalLabel">Tambah Data Anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
      <form action="" method="post">
      <div class="form-group mb-2">
      <input class="form-control" type="text" name="nis" placeholder="Nomor Induk Siswa" required>
      </div>
      <div class="form-group mb-2">
      <input class="form-control" type="text" name="nama" placeholder="Nama Siswa" required>
      </div>
      <div class="input-group mb-2">
      <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
      <select class="form-control" name="kelas" id="inputGroupSelect01" required>\
          <option value="">Pilih Kelas</option>
          <option value="X">X</option>
          <option value="XI">XI</option>
          <option value="XII">XII</option>
      </select>
      </div>
      <div class="input-group mb-2">
      <label class="input-group-text" for="inputGroupSelect01">Jurusan</label>
      <select class="form-control" name="jurusan" id="inputGroupSelect01" required>\
          <option value="">Pilih Jurusan</option>
          <option value="RPL">Rekayasa Perangkat Lunak</option>
          <option value="TKR">Teknik Kendaraan Ringan</option>
          <option value="TAV">Teknik Audio Video</option>
          <option value="TITL">Teknik Instalasi Tenaga Listrik</option>
      </select>
      </div>
      <div class="input-group mb-2">
      <span class="input-group-text"> Tanggal Lahir</span>
      <input class="form-control" type="date" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
      </div>
      <div class="form-group mb-2"> 
        <input class="form-control" type="text" name="no_telepon" placeholder="Masukan No Telepon">
      </div>
      <div class="form-floating mb-2">
  <textarea  name="alamat" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Alamat</label>
  </div>
      <div class="form-group">
      <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
        <select class="form-control" name="jenis_kelamin" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="P">Perempuan</option>
            <option value="L">Laki-Laki</option>
        </select>
      </div>
      </div>
        <!-- ---------------------------------------------------------------------------- -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-success mt-2" type="submit" name="simpan">Simpan</button>
        </div>
            <!-- tag tutup formnya pinda ke sini -->
            </form>
            <!-- ------------------------------- -->
        </div>
    </div>
</div>
</table>
<!-- End of modal input data -->


<!-- Modal Edit Data -->
 <?php
if (isset($_GET['edit'])) {
    $id = $_GET['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota = '$id'");
  foreach ($query as $row ) {
?>
<script>
	$(document).ready(function(){
		$("#edit-modal").modal('show');
	});
</script>
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <!-- Form Edit Anggota -------------------------------------------------------- -->
            <form action="" method="post">
                <div class="form-group">
                    <input values="<?php echo $row['nis'];?>" class="form-control" type="text" name="nis" placeholder="NIS" required>
                </div>
                <div class="form-group mt-2">
                    <input values="<?php echo $row['nama'];?>" class="form-control" type="text" name="nama" placeholder="Nama Siswa" required>
                </div>
                <div class="form-group mt-2">
                    <select values="<?php echo $row['kelas'];?>" class="form-control" name="kelas">
                        <option value="">--Pilih Kelas--</option>
                        <option value="XIIRPL1">XII RPL 1</option>
                        <option value="XIIRPL2">XII RPL 2</option>
                        <option value="XIIRPL3">XII RPL 3</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <select values="<?php echo $row['jurusan'];?>" class="form-control" name="jurusan">
                        <option value="">--Pilih Jurusan--</option>
                        <option value="RPL">Rekayasa Perangkat Lunak</option>
                        <option value="TAV">Teknik Audio Video</option>
                        <option value="TKR">Teknik Kendaraan Ringan</option>
                        <option value="TITL">Teknik Instalasi Tenaga Listrik</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <div class="input-group">
                        <span class="input-group-text" >Tanggal Lahir</span>
                        <input values="<?php echo $row['tanggal_lahir'];?>"class="form-control" type="date" name="tanggal_lahir">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <input values="<?php echo $row['no_telpon'];?>" class="form-control" type="text" name="no_telepon" placeholder="No Telepon">
                </div>
                <div class="form-group mt-2">
                    <textarea  values="<?php echo $row['alamat'];?>" class="form-control" name="alamat" placeholder="Alamat Lengkap"></textarea>
                </div>
                <div class="form-group mt-2">
                    <select values="<?php echo $row['jenis_kelamin'];?>" class="form-control" name="jenis_kelamin">
                        <option value="">--Pilih Gender--</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
        <!-- ---------------------------------------------------------------------------- -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-success mt-2" type="submit" name="simpan">Simpan</button>
        </div>
            <!-- tag tutup formnya pinda ke sini -->
            </form>
            <!-- ------------------------------- -->
        </div>
    </div>
</div>
<?php
}
?>
