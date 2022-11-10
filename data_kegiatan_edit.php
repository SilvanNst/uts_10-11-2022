<?php
    include('header.php');
?>
            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4"><b>Kegiatan Paswa 2022</b></h3>
                            <form method="post" action="data_kegiatan_pro_edit.php">
                                <div class="mb-3">
                                    <?php 
                                    include_once("connection.php");
                                    $id = $_GET['id'];
                                    $result_data = mysqli_query($mysqli, "SELECT * FROM tab_kegiatan WHERE id= '$id' ");
                                    
                                    while ($res = mysqli_fetch_array($result_data)) {
                                        $tanggal = $res['tanggal'];
                                        $jam_mulai = $res['jam_mulai'];
                                        $jam_selesai = $res['jam_selesai'];
                                        $kegiatan = $res['nama_kegiatan'];
                                        $narasumber = $res['narasumber'];
                                        $pic = $res['pic'];
                                    }
                                    ?>
                                        <input type="hidden" class="form-control" name="id" placeholder="id" required 
                                        value="<?php echo $_GET['id'];?>"
                                        aria-describedby="emailHelp">
                                    <label  class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" placeholder="Tanggal"required
                                        value="<?php echo $tanggal; ?>"
                                        aria-describedby="emailHelp">
                                    <label  class="form-label">Jam Mulai</label>
                                        <input type="time" class="form-control" name="jam_mulai" placeholder="Jam Mulai"required
                                    value="<?php echo $jam_mulai; ?>"
                                        aria-describedby="emailHelp">
                                    <label  class="form-label">Jam Selesai</label>
                                        <input type="time" class="form-control" name="jam_selesai" placeholder="Jam Selesai"required
                                    value="<?php echo $jam_selesai; ?>"
                                        aria-describedby="emailHelp">
                                    <label  class="form-label">Kegiatan</label>
                                        <input type="text" class="form-control" name="nama_kegiatan" placeholder="Kegiatan"required
                                    value="<?php echo $kegiatan; ?>"
                                        aria-describedby="emailHelp">
                                    <label  class="form-label">Narasumber</label>
                                        <input type="text" class="form-control" name="narasumber" placeholder="Narasumber"required
                                    value="<?php echo $narasumber; ?>"
                                        aria-describedby="emailHelp">
                                        <label  class="form-label">PIC</label>
                                        <input type="text" class="form-control" name="pic" placeholder="PIC"required
                                    value="<?php echo $pic; ?>"
                                        aria-describedby="emailHelp">
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="kelompok.php" class="btn btn-primary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
    
<?php
    include('footer.php');
?>