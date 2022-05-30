<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Gudang</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_lokasi',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='130px' scope='row'>Nama</th>                     <td><input class='form-control' type='text' name='nm'></td></tr>
                    <tr><th width='130px' scope='row'>Batas Kapasitas</th>                     <td><input class='form-control' type='number' name='bk'></td></tr>
                    <tr><th width='130px' scope='row'>Biaya Sewa (hari)</th>                     <td><input class='form-control' type='number' name='bs'></td></tr>
                    <tr><th width='130px' scope='row'>Gratis Biaya (hari)</th>                     <td><input class='form-control' type='number' name='gb'></td></tr>
                    <tr><th scope='row'>Provinsi</th>               <td><select class='form-control' name='pv' id='state_reseller' required>
                                                                      <option value=''>- Pilih -</option>";
                                                                      foreach ($negara as $rows) {
                                                                          echo "<option value='$rows[provinsi_id]'>$rows[nama_provinsi]</option>";
                                                                      }
                                                                  echo "</select>
                    </td></tr>

                    <tr><th scope='row'>Kota</th>               <td><select class='form-control' name='ko' id='city_reseller' required>
                                                                    <option value=''>- Pilih -</option>
                                                                  </select>
                    </td></tr>

                    

                    <tr><th scope='row'>Kecamatan</th>               <td><select class='form-control' name='ke' id='kecamatan_reseller' required>
                                                                    <option value=''>- Pilih -</option>
                                                                  </select>
                    </td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
