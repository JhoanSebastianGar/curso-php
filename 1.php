<?php
$name="sebas";
$age=33;
//$isOld=$age>30;
define('LOGO','https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Codigo_php.jpg/320px-Codigo_php.jpg');
?>



<?= "HOLA \"".$name."\"" ?>
<h1>
<?php 
//echo $isOld ? "VIEJO" : "JOVEN";
$outputAge=match (true) {
    $age<2 => "BEBE",
    $age<18 => "JOVEN",
    $age>18 => "ADULTO",
    default => "VIEJO",
};

$arreglo=[1,2,3];
?>

<?= $outputAge ?>
</h1>

<ul>
    <?php foreach ($arreglo as $numero): ?>
    <li><?= $numero ?></li>
    <?php endforeach ?>
</ul>
<style>
    :root{
        color-scheme: light dark;
    }
    body{
        display: grid;
        place-content: center;
    }
</style>


