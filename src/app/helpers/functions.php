<?php

function render_header($title = '') {
  include __DIR__ . '/../templates/_header.php';
}

function render_sidebar() {
  include __DIR__ . '/../templates/_sidebar.php';
}

function render_footer() {
  include __DIR__ . '/../templates/_footer.php';
}