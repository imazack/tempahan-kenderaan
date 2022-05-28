<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<div class="title">Pendaftaran Akaun</div>


        <form id="stkdaftarakauan" action="#" method="post" class="form" data-url="<?php echo admin_url('admin-ajax.php') ?>">
           <div class="inputfield">
              <label>Nama Sendiri</label>
              <input type="text" class="input" placeholder="Nama Sendiri" id="Fname">
           </div>
           <div class="inputfield">
            <label>Nama Keluarga</label>
            <input type="text" class="input" placeholder="Nama Keluarga" id="Lname">
         </div>
            <div class="inputfield">
              <label>Jawatan</label>
              <input type="text" class="input" placeholder="Nyatakan Jawatan" id="jawatan">
           </div>
            <div class="inputfield">
              <label>Bahagian</label>
              <div class="custom_select" id="bahagian">
                <select>
                    <option selected disabled>Pilih Bahagian</option>
                    <option value="pengurusan_atasan">Pengurusan Atasan (KP,TKP (D), TKP (O)</option>
                    <option value="bkp">Bahagian Khidmat Pengurusan</option>
                    <option value="bkps">Bahagian Keselamatan Personel</option>
                    <option value="bpk">Bahagian Penyelarasan dan Korporat</option>
                    <option value="bkictrr">Bahagian Keselamatan ICT dan Rahsia Rasmi</option>
                    <option value="bipp">Bahagian Inspektoran, Pematuhan dan Pengiktirafan</option>
                    <option value="bkfpt">Bahagian Keselamatan Fizikal dan Penilaian Teknikal</option>
                    <option value="bspkltl">Bahagian Sasaran Penting, Kawasan Larangan dan Tempat Larangan</option>
                    <option value="bah_kompleks">Bahagian Kompleks Pentadbiran Kerajaan Persekutuan</option>
                    <option value="integriti">Unit Integriti</option>
                </select>
              </div>
           </div>
           <div class="inputfield">
              <label>Nombor Telefon</label>
              <input type="text" class="input" placeholder="No. Telefon" id="phone">
           </div>
           <div class="inputfield">
            <label>Alamat Emel</label>
            <input type="email" class="input" placeholder="Emel Rasmi" id="email">
         </div> 
           <div class="inputfield">
            <label>Kata Laluan</label>
            <input type="password" class="input" placeholder="Cipta Kata Laluan" id="pass">
         </div>
           <div class="inputfield">
            <label>Adakah Anda <br>Pentadbir Sistem</label>
            <div class="col-2">
                <div class="p-t-10">
                    <label class="radio-container m-r-45">Ya
                        <input type="radio" id="yes_admin" name="back" value="yes_admin" checked/>
                        <span class="checkmark"></span>
                        </label> <!--/.radio-container.m-r-45-->
                        <label class="radio-container">Tidak
                        <input type="radio" id="no_admin" name="back" value="no_admin"/>
                        <span class="checkmark"></span>
                    </label> <!--/.radio-container-->
                </div> <!--/.p-t-10-->
            </div>
        </div>
          <div class="inputfield">
            <input id="stk_pengguna_akaun_form" type="submit" value="Daftar" class="btn">
          </div>
</form>

</article>