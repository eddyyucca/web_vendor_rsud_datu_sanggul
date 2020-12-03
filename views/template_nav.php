<header role="banner" id="myheader">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="js-mynavbar-nav-toggle mynavbar-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><strong><?php echo isset($rs->rsakronim) ? $rs->rsakronim : ' '; ?></strong></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    $s = '<li class="dropdown">' .
                            '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informasi <span class="caret"></span></a>' .
                            '<ul class="dropdown-menu">' .
                            '<li><a href="' . base_url('infoantrian') . '">Info Antrian Rawat Jalan</a></li>' .
                            '<li><a href="' . base_url('inforesep') . '">Info Resep Selesai</a></li>' .
                            '<li><a href="' . base_url('infodokter') . '">Info Dokter</a></li>' .
                            '<li><a href="' . base_url('infokamar') . '">Info Kamar</a></li>' .                            
                            '<li><a href="' . base_url('pengumuman') . '">Pengumuman</a></li>' .
                            '<li><a href="' . base_url('infojadwal') . '">Jadwal Poliklinik</a></li>' .
                            '<li><a href="' . base_url('galeri') . '">Galeri</a></li>' .
                            '</ul></li>';

                    $menu = array('home' => '<i class="fa fa-home"></i>',
                        'profile' => 'Profile',
                        'layanan' => 'Layanan',
                        'berita' => 'Berita',
                        'informasi' => $s,
                        'contact' => 'Hubungi Kami');
                    foreach ($menu as $k => $m) {
                        echo $m == $s ? $s : '<li class="'.($nav == $k ? 'active' : '').'"><a href="'.base_url($k).'">'.$m.'</a></li>';
                    }
                    ?> 
                </ul>
            </div>
        </div>
    </nav>
</header>