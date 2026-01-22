<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="p-4 bg-blue-500 text-white">Hello CodeIgniter 4 with Tailwind</div>

<?php $color = 'green'; ?>
<div class="mt-4 bg-<?= $color ?>-500 text-white p-3 rounded">Dinamik renk örneği (safelist gerekir)</div>

<?= $this->endSection() ?>
