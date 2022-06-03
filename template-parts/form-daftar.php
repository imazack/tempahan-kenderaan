<?php
   /*@package STK
      -Daftar Form

      */
?>


<form id="stkDaftarAkauan" action="#" method="post" class="form" data-url="<?php echo admin_url('admin-ajax.php') ?>">
           <div class="inputfield">
              <label>Nama Penuh</label>
              <input type="text" class="input" placeholder="Nama Sendiri" id="nama">
           </div>
           <div class="inputfield">
              <label>Nombor Telefon</label>
              <input type="text" class="input" placeholder="No. Telefon" id="nomTel">
           </div>
           <div class="inputfield">
            <label>Alamat Emel</label>
            <input type="email" class="input" placeholder="Emel Rasmi" id="email">
</div>
          <div class="inputfield">
            <input id="input-submit" type="submit" class="btn">
</div>
</form>