<li class="<?php if($judul == 'dashboard')  echo 'active'; ?>">
    <a href="<?php echo base_url(); ?>index.php/home">
        <span>Dashboard</span>
    </a>
</li>
<li class='<?php if($judul == 'list_wbs' || $judul == 'add_wbs' || $judul == 'edit_wbs' || $judul == 'list_wp' || $judul == 'add_wp' || $judul == 'edit_wp'
    || $judul == 'list_pengguna' || $judul == 'add_pengguna' || $judul == 'edit_pengguna' || $judul == 'list_mitra' || $judul == 'add_mitra' || $judul == 'edit_mitra'
    || $judul == 'list_stkk' || $judul == 'add_stkk' || $judul == 'edit_stkk' || $judul == 'list_dokumen' || $judul == 'add_dokumen' || $judul == 'edit_dokumen') echo 'active' ?>'>
    <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
        <span>Master</span>
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/skpd">SKPD</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/bidang">Bidang</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/subbidang">Sub Bidang</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/pengguna">Pengguna</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/mitra">Mitra</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/dokumen">Dokumen</a>
        </li>
    </ul>
</li>
<li class='<?php if($judul == 'list_agenda'|| $judul == 'kalender') echo 'active' ?>'>
    <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
        <span>Kegiatan</span>
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/agenda">Agenda</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/kalender">Kalender</a>
        </li>
    </ul>
</li>
<li class='<?php if($judul == 'list_topik' || $judul == 'tambah_topik') echo 'active' ?>'>
    <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
        <span>Forum</span>
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/topik">All Topik</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/topik/tambah">Tambah Topik</a>
        </li>
    </ul>
</li>
<li>
    <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
        <span>Laporan</span>
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="#">Daftar Mitra</a>
        </li>
        <li>
            <a href="#">Daftar SKPD</a>
        </li>
        <li>
            <a href="#">Laporan Agenda</a>
        </li>
    </ul>
</li>
<li>
    <ul>
        <form method="POST" accept-charset="utf-8" action="<?php echo base_url('index.php/pencarian'); ?>" class='search-form'>
            <div class="search-pane">
                <input type="text" name="katakunci" autocomplete="off" placeholder="Cari Dokumen/Agenda..." class="input-xxlarge">
                <button type="submit"><i class="icon-search"></i></button>
            </div>
        </form>
    </ul>

</li>
