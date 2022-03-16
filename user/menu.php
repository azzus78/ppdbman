<ul class="sidebar-menu">
    <li class="menu-header">Main Menu</li>
    <li><a class="nav-link" href="."><i class="fas fa-home fa-fw"></i> <span>Beranda</span></a></li>

    <?php if ($prestasi) { ?>
    <li><a class="nav-link" href="?pg=prestasi_formulir"><i class="far fa-address-book"></i> <span>Formulir</span></a></li>
    <?php } else { ?>
  		<li><a class="nav-link" href="?pg=formulir"><i class="far fa-address-book"></i> <span>Formulir</span></a></li>
  		<?php if ($testppdb) { ?>
  		<?php } else { ?>
  		    <li><a class="nav-link" href="?pg=pengumuman"><i class="fas fa-chalkboard-teacher"></i> <span>Info Tes PPDB</span></a></li>
  		<?php } ?>
  	<?php } ?>
  	<?php if ($verified) { ?>
     <li><a class="nav-link" href="?pg=bayar"><i class="far fa-credit-card"></i> <span>Pembayaran</span></a></li> 
    <?php } ?>
</ul>