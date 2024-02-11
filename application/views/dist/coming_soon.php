<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!-- Main Content -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coming Soon</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/bd-coming-soon.css">
</head>

<body class="min-vh-100 d-flex flex-column">

    <header>
        <div class="container">
            <nav class="navbar navbar-dark bg-transparenet">
                <a class="navbar-brand" href="#">
                    <img src="<?=base_url('assets/images/logo.svg'); ?>" alt="logo">
                </a>
            </nav>
        </div>
    </header>
    <main class="my-auto">
        <div class="container">
            <h1 class="page-title">This Feature Cooming Soon</h1>
            <a href="<?=base_url('dist/features_post_create');?>" class="stretched-link text-decoration-none page-title" >Go Back</a>
        </div>
    </main>
</body>

</html>