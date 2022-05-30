<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Brand Produk</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_brand_produk',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_brand_produk]'>
                    <tr><th width='120px' scope='row'>Nama Brand</th>    <td><input type='text' class='form-control' name='a' value='$rows[nama_brand]' required></td></tr>
                    <tr><th scope='row'>Foto Brand</th>                     <td><input type='file' id='fileupload' class='form-control' name='userfile[]' multiple>Multiple Upload, Allowed File : .gif, jpg, png
                                                                                  <div id='dvPreview'></div>";
                                                                               if ($rows['gambar'] != ''){ echo "<i style='color:red'>Gambar Saat ini : </i><a target='_BLANK' href='".base_url()."asset/foto_produk/$rows[gambar_brand]'>$rows[gambar]</a>"; } echo "</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";