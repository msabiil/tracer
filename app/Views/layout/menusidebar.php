<?php if (session()->get('akses') == 1) { ?>
  <li class="menu-header">Main Menu</li>
  <li><a class="nav-link" href="<?= site_url('') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
  <li><a class="nav-link" href="<?= site_url('alumni') ?>"><i class="fas fa-user-graduate"></i> <span>Alumni</span></a></li>
  <li><a class="nav-link" href="<?= site_url('blast') ?>"><i class="fas fa-broadcast-tower"></i> <span>Blast</span></a></li>

<?php } ?>



<li class="menu-header">Tracer </li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Survey</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link" href="<?= site_url('survei') ?>">Kuisioner</a></li>
    <?php if (session()->get('akses') == 1) { ?>
      <li><a class="nav-link" href="<?= site_url('hasilsurvei') ?>">Hasil Survey</a></li>
    <?php } ?>

  </ul>
</li>