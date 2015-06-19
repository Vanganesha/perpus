<?php

/* 
 * The MIT License
 *
 * Copyright 2014 GEROBAKJEN Inc. by Van Ray Hosea 
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

?>
  <div class="cotainer" style="width:95%">
                  <div class="col s12 m6">
                      <div class="card">
                          <div class="card-content">
                              <img src="gambar/google_instalaciones_003.jpg">
                              <h1>Kelola Akun</h1>
                              <p>Halaman ini digunakan untuk mengelola akun dosen dan mahasiswa</p>
                          </div> 
                          
                          <div class="card-footer">
                              <div class="row">  
                                  <?php $ch=$_GET[akun];
                                    
                                    if ($ch=='Mahasiswa'){ ?>
                                  <!-- MAHASISWA -->
                                  <div class="col s12">
                                      <div class="col s6">
                                      <!-- Tambah Data Mahasiswa -->
                                      <h3>Tambahkan Mahasiswa</h3> <hr>
                                  <form class="col s12" method="post" action="aksi.php?as=tambahuser&ux=mahasiswa">
                                      <div class="row">
                                          <label for="username">Username</label>
                                          <input required placeholder="username" class="input-field col s12" name="username" type="text">
                                      </div>
                                      <div class="row">
                                          <label for="password">Password</label>
                                          <input required type="text" placeholder="password" class="input-field col s12" name="password">
                                      </div><br>
                                      
                                      <div class="row col s2 offset-s4">
                                          <button type="submit" class="waves-effect waves-light btn">Tambah</button>
                                      </div>
                                  </form></div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>                       
                                      <div class="row">
                                          <div class="col s12">
                                              <?php 
                                            connect();
                                            $da=  query("SELECT * FROM mahasiswa WHERE username IS NOT NULL OR PASSWORD IS NOT NULL ORDER BY nama ASC");
                                            $jb=  mysql_num_rows($da);
                                            if ($jb==0){
                                                echo " <h2>Belum Ada Mahasiswa yang punya Username dan password </h2>";
                                            }else {
                                                echo " <h3>Daftar Mahasiswa Yang Sudah Terdaftar Dalam Database</h3><hr>";
                                            $no=1; ?>
                                              <table class="hoverable">
                                                  <thead>
                                                      <tr>
                                                          <th>No</th>
                                                          <th>Nama</th>
                                                          <th>Usename</th>
                                                          <th>Password</th>
                                                          <th class="text-center">Aksi</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php
                                                      while ($arm=  mysql_fetch_array($da)){
                                                      echo "
                                                   
                                                <tr>
                                                <td>$no</td>
                                                <td>$arm[nama]</td>
                                                <td>$arm[username]</td>
                                                <td>$arm[password]</td>
                                                <td style='width:90px;'><a title='Edit'  href='#editmahasiswa$arm[idmahasiswa]' class='btn-floating modal-trigger'><i class='mdi-image-edit'></i></a> <a title='Hapus' href='aksi.php?as=hapususer&ux=mahasiswa&id=$arm[idmahasiswa]' class='btn-floating' style='background-color: red;'><i class='mdi-action-delete'></i></a> </td>
                                            </tr> " ; $no++; }} ?>
                                                  </tbody>
                                              </table>
                                            </div>
                                      </div>
                                  <?php 
                                  $edm=  query("SELECT * FROM mahasiswa WHERE username IS NOT NULL OR PASSWORD IS NOT NULL ORDER BY nama ASC");
                                  
                                  while ($dedm=  mysql_fetch_array($edm)){ ?>
                                  
                                  <div id="editmahasiswa<?php echo $dedm[idmahasiswa]?>" class="modal">
                                      <h4>Edit Data <?php echo $dedm[nama]?></h4>
                                  <form class="col s12" method="post" action="aksi.php?as=updateuser&ux=mahasiswa&id=<?php echo $dedm[idmahasiswa]?>">
                                      <div class="row">
                                          <label for="username">Username</label>
                                          <input required value="<?php echo $dedm[username]?>" placeholder="username" class="input-field col s12" name="username" type="text">
                                      </div>
                                      <div class="row">
                                          <label for="password">Password</label>
                                          <input required value="<?php echo $dedm[password]?>" type="text" placeholder="password" class="input-field col s12" name="password">
                                      </div><br>
                                      
                                      <div class="row col s6 offset-s4">
                                          <button type="submit" class="waves-effect waves-light btn">Simpan</button> <button type="button" href="#" class="waves-effect waves-light btn modal_close">Batal</button>
                                      </div>
                                  </form>    
                                  </div>
                                  <?php }?>
                                    </div> <?php } elseif($ch=='Dosen'){?>
                                  <!-- ------------------------------------------------------- -->
                                  
                                  
                                  <!-- DOSEN -->
                                  <div class="col s12">
                                      <div class="col s6">
                                      <h3>Tambahkan Dosen</h3> <hr>
                                  <form method="post" action="aksi.php?as=tambahuser&ux=dosen">
                                      <div class="row">
                                            <div class="select-wrapper col s6">
                                                <label>Nama Dosen</label>
                                                <select class="disabled" name="nama">
                                                    <option disabled selected>Daftar Dosen Belum Punya Username</option>
                                                    <?php connect();
                                                    $dosen=  query("SELECT * FROM dosen WHERE username IS NULL OR PASSWORD IS NULL ORDER BY nama ASC");
                                                    while ($ardos= mysql_fetch_array($dosen)){?>
                                                    <option value="<?php echo $ardos[iddosen];?>"><?php echo $ardos[nama];?></option><?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                      
                                      <div class="row">
                                          <label for="username">Username</label>
                                          <input required placeholder="username" class="input-field col s12" name="username" type="text">
                                      </div>
                                      <div class="row">
                                          <label for="password">Password</label>
                                          <input required type="text" placeholder="password" class="input-field col s12" name="password">
                                      </div><br>
                                      
                                      <div class="row col s2 offset-s4">
                                          <button type="submit" class="waves-effect waves-light btn">Tambah</button>
                                      </div>
                                  </form></div>
                                      
                                      
                                      
                                      
                                      <br><br>
                                      
                                      <div class="row"><br>
                                          <div class="col s12">
                                              <?php 
                                            connect();
                                            $data=  query("SELECT * FROM dosen WHERE username IS NOT NULL OR PASSWORD IS NOT NULL ORDER BY nama ASC");
                                            $jb=  mysql_num_rows($data);
                                            if ($jb==0){
                                                echo " <h2>Belum Ada Dosen yang punya Username dan password </h2>";
                                            }else {
                                                echo " <h3>Daftar Dosen Yang Sudah Terdaftar Dalam Database</h3><hr>";
                                            $no=1; ?>
                                              <table class="hoverable">
                                                  <thead>
                                                      <tr>
                                                          <th>No</th>
                                                          <th>Nama</th>
                                                          <th>Usename</th>
                                                          <th>Password</th>
                                                          <th class="text-center">Aksi</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php
                                                      while ($ar=  mysql_fetch_array($data)){
                                                      echo "
                                                   
                                                <tr>
                                                <td>$no</td>
                                                <td>$ar[nama]</td>
                                                <td>$ar[username]</td>
                                                <td>$ar[password]</td>
                                                <td style='width:90px;'><a title='Edit' href='#editdosen$ar[iddosen]' class='modal-trigger btn-floating'><i class='mdi-image-edit'></i></a> <a title='Hapus' href='aksi.php?as=hapususer&ux=dosen&id=$ar[iddosen]' class='btn-floating' style='background-color: red;'><i class='mdi-action-delete'></i></a> </td>
                                            </tr> "; $no++; }}?>
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div> 
                                  
                                  <?php 
                                  $pl=  query("SELECT * FROM dosen ");
                                  
                                  while ($dem=  mysql_fetch_array($pl)){ ?>
                                  
                                  <div id="editdosen<?php echo $dem[iddosen]?>" class="modal">
                                      <h4>Edit Data <?php echo $dem[nama]?></h4>
                                  <form method="post" action="aksi.php?as=updateuser&ux=dosen&id=<?php echo $dem[iddosen]?>">
                                      <div class="row">
                                          <label for="username">Username</label>
                                          <input required value="<?php echo $dem[username]?>" placeholder="username" class="input-field col s12" name="username" type="text">
                                      </div>
                                      <div class="row">
                                          <label for="password">Password</label>
                                          <input required value="<?php echo $dem[password]?>" type="text" placeholder="password" class="input-field col s12" name="password">
                                      </div><br>
                                      
                                      <div class="row col s6 offset-s4">
                                          <button type="submit" class="waves-effect waves-light btn">Simpan</button> <button type="button" href="#" class="waves-effect waves-light btn modal_close">Batal</button>
                                      </div>
                                  </form>    
                                  </div>
                                    <?php }}?>
                                  
                                  </div> 
                              </div>
                              
                              
                              
                          </div>
                      </div>
                  </div>