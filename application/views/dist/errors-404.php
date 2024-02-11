<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
              You Have No Right to Access this Page on Raw!, Go Back, Mind your own bussiness
            </div>
            <div class="page-search">
              <div class="mt-3">
                <a href="#" onclick="goBack()">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
    function goBack() {
      window.history.back();
      return false; // Prevent the default anchor behavior
    }
  </script>

  <?php $this->load->view('dist/_partials/js'); ?>