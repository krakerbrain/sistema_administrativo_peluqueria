<?php

$rutainicio = isset($indice) && $indice != "clientes" ? $_ENV['URL_INICIO'] : "#";  

?>
<style>
  .navbar{
    background-color: #ff6096;
  }

  
</style>
<nav class="navbar navbar-dark">
  <!-- <a class="navbar-brand" href="<?= $rutainicio ?>">Hola, <?= ucfirst($_SESSION['usuario']) ?></a> -->
  <a class="navbar-brand" href=" <?= $rutainicio ?> "><?= $titulo_pagina ?></a>
    <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
      aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
        <span class="dark-blue-text">
            <i class="fas fa-bars fa-1x"></i>
        </span>
    </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent1">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link <?= $indice == 'clientes' ? 'active' : '' ?>" style="font-size:14px" href="<?= $rutainicio ?>">Registro Clientes<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $indice == 'estadisticas' ? 'active' : '' ?>" style="font-size:14px"href="<?= $_ENV['URL_ESTADISTICAS'] ?>">Estadísticas de Servicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="font-size:14px"href="<?= $_ENV['URL_ESTILISTAS'] ?>">Estilistas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="font-size:14px"href="<?= $_ENV['URL_PRODUCTOS'] ?>">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="font-size:14px"href="<?= $_ENV['URL_GASTOSFIJOS'] ?>">Gastos Fijos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="font-size:14px"href="<?= $_ENV['URL_FORMULAS'] ?>">Fórmulas</a>
      </li>
      <!-- <li class="nav-item">
        <a class="navbar-brand" style="font-size:14px"href="<?= $_ENV['URL_SESSION'] ?>">Cerrar Sesión</a>
      </li> -->
    </ul>
  </div>
</nav>