<?php include("inc/headermahasiswa.php");?>
    <div class="container mt-4">
        <?= anchor ("coadmin/dashboard",   "KEMBALI", ['class' => 'buttons']);?>
        <h1>DATA MAHASISWA 
        
        </h1>
        
        <!-- Tampilan untuk ADMIN ketika berhasil login -->
        
        <hr>
        <div class="row my-6">
        <div class="col-md-12">
            <h3>LIST FAKULTAS DAN DATA MAHASISWA</h3>

            <table class="table table-striped mt-5">
            <thead>
                <tr>
                <th scope="col">NO </th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Nama Fakultas</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php
            $no=1;
                foreach ($mahasiswa as $mhs){?>
                <!-- Kalau ada error undefined array $mahasiswa bisa jadi dia belum ditambahkan diadmin
                ditambahin jadi kaya gini:
                
                public function viewMahasiswa($college_id){//viewCollege
                // $college_id : menggunakan parameter id college
                $this->load->model('queries');
                $allfakultas = $this->queries->AllFakultas();
                $this->load->view('viewMahasiswa',['allfakultas' => $allfakultas]);
                }

                 -->
                <tr>

                    <td><?= $no++;?></td>
                    <td><?= $mhs->namasiswa;?></td>
                    <td><?= $mhs->namafakultas;?></td>
                    <td><?= $mhs->program_studi;?></td>
                    <td><?= $mhs->email;?></td>
                    <td><?= $mhs->gender;?></td>

                    <td> 
                        <!-- <?= anchor ("coadmin/editMahasiswa/{$mhs->id}",   "EDIT", ['class' => 'buttons']);?> -->
                        <?= anchor ("coadmin/hapusMahasiswa/{$mhs->id}",   "HAPUS", ['class' => 'buttons']);?>
                        
                        <!-- $fakulta->college_id = dia kaya biar sesuai dengan idnya gitu, biar idnya kepanggil dulu -->
                    </td>
                </tr>

                <?php }               
                ?>
            </tbody>
            </table>

        </div>
    </div>
        

    </div>
<?php include ("inc/footer.php");?>
