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

<div class="cotainer">
    <h3 class="text-center">Menu Utama</h3><hr>
    <a class=" z-depth-5" href="admin_kelola_buku.vanray">
        <div class="card">
            <div class="card-content">
                <img src="gambar/stack_of_books.jpg">
                <h2 style="color: #FFF; text-transform: uppercase;"><b>Kelola</b> Buku</h2>
                  </div> 
        </div>
    </a>
    
    <a class="modal-trigger" href="#akun">
        <div class="card  z-depth-5">
            <div class="card-content">
                <img src="gambar/stack_of_books.jpg">
                <h2 style="color: #FFF; text-transform: uppercase;"><b>Kelola</b> Akun</h2>
                  </div> 
        </div>
    </a>
    
    <a class="z-depth-5" href="admin_kelola_pinjam.vanray">
        <div class="card">
            <div class="card-content">
                <img src="gambar/stack_of_books.jpg">
                <h2 style="color: #FFF; text-transform: uppercase;"><b>Kelola</b>Peminjaman</h2>
                  </div> 
        </div>
    </a>
    
        <a href="admin_kelola_laporan.vanray">
        <div class="card z-depth-5">
            <div class="card-content">
                <img src="gambar/stack_of_books.jpg">
                <h2 style="color: #FFF; text-transform: uppercase;">Laporan</h2>
                  </div> 
        </div>
    </a>
    
    <div class="modal" id="akun">
        <div class="col s12">
            <div class="row">
        <h3 class="text-center" style="text-transform: uppercase;">pilih Salah Satu</h3><hr>
        <!-- laporan buku -->
        <a class="col s6" href="admin_kelola_akun_mahasiswa.vanray">
            <div class="card">
                <div class="card-content" style="height: 150px;">
                    <img src="gambar/lecture3.jpg">
                    <h2 style="color: whitesmoke; text-transform: uppercase;"><b>Akun Mahasiswa</b></h2>
                </div> 
            </div>
        </a>
        
        <a class="col s6" href="admin_kelola_akun_dosen.vanray">
            <div class="card">
                <div class="card-content" style="height: 150px;">
                    <img src="gambar/akun/festLecture2012_Loening.jpg">
                    <h2 style="color: #FFF; text-transform: uppercase; color: #000;">Akun Dosen</h2>
                </div> 
            </div>
        </a>  
            </div></div>
    </div>
</div>