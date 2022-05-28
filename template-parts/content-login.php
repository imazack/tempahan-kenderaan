<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<div class="title">Log Masuk STK</div>


        <form id="stkdaftarakauan" action="#" method="post" class="form" data-url="<?php echo admin_url('admin-ajax.php') ?>">
           <div class="inputfield">
           <label>ID Pengguna</label>
              <input type="text" class="input" placeholder="Emel Rasmi">
           </div> 
           <div class="inputfield">
              <label>Kata Laluan</label>
              <input type="password" class="input" placeholder="Kata Laluan">
           </div>
          <div class="inputfield">
            <input type="submit" value="Log Masuk" class="btn">
          </div>
          <div>
            <center><a href="content-page.php">Daftar Akaun</a> <br>
            <a href="permohonan.html">One Time User</a></center>
            </div>
          </div>
</form>

</article>