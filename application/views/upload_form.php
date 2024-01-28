<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>Your file was not successfully uploaded!</h3>

<ul>

<?php 
for ($i=0; $i < $error; $i++) : 
    if (isset($error[$i])) : ?>
        <div style="color: red;">
            <?php echo $error[$i]; ?>
        </div>
<?php endif;?>
<?php endfor;?>
</ul>

<p><?php echo anchor('dist/beranda', 'Upload Another File!'); ?></p>

</body>
</html>