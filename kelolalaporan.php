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
<div class="cotainer" style="width: 95%">
    <div class="col s12 m6">
        <div class="card">    
            <div class="card-content">
                <img src="gambar/perpus.jpg">
                <h1>Cetak Laporan</h1>
                <p>Halaman ini digunakan untuk membantu admin dalam mencetak daftar-daftar buku</p>
            </div> 
            
            <div class="card-footer">
                <div class="col s12">
                <div  class="row">
                                      
                    <div class="col s6">
                        <a class="modal-trigger" href="#laporan1">
                            <div class="card" style="background:url('gambar/4.jpg'); background-size: 100%; ">
                                <div class="card-content">
                                    <h2 style="color: #FFF; text-transform: uppercase;">Laporan Daftar Buku</h2>
                                    <p style="color: #FFF; text-transform: uppercase;">untuk Mencetak Laporan Daftar-Daftar Buku yang ada di perpustakaan</p>
                                </div> </div>
                        </a>                        
                        <div class="modal text-center" id="laporan1">;
                            <h3 class="text-center" style="text-transform: uppercase;">pilih Salah Satu</h3><hr>
                            <!-- laporan buku -->
                            <a class="col s4" href="lp.php?data=all">
                                <div style="height: 70px;" class="card red">
                                    <div class="card-content">
                                        <h2 style="color: #FFF; text-transform: uppercase;">Semua</h2>
                                    </div> 
                                </div>
                            </a>
                            
                            <a class="col s4" href="lp.php?data=pp">
                                <div style="height: 70px;" class="card white">
                                    <div class="card-content">
                                        <h2 style="color: #FFF; text-transform: uppercase; color: #000;">Program Profesional</h2>
                                    </div> 
                                </div>
                            </a>  
                            
                            <a class="col s4" href="lp.php?data=kp">
                                <div style="height: 70px;" class="card green">
                                    <div class="card-content">
                                        <h2 style="color: #FFF; text-transform: uppercase;">Kerja Praktek</h2>
                                    </div> 
                                </div>
                            </a> 
                            <a class="col s4" href="lp.php?data=ta">
                                <div class="card" style="eight: 70px;background-color: rgba(8, 3, 54, 1) !important;">
                                    <div class="card-content">
                                        <h2 style="color: #FFF; text-transform: uppercase;">Tugas Akhir</h2>
                                    </div> 
                                </div>
                            </a>
                            <a class="col s4" href="lp.php?data=buku">
                                <div class="card" style="height: 70px; background-color: #ff3d00;">
                                    <div class="card-content">
                                        <h2 style="color: #FFF; text-transform: uppercase;">Buku</h2>
                                    </div> 
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    </div>
           
               
                
                
                
                </div>
        </div>
    </div>
</div>
</div>