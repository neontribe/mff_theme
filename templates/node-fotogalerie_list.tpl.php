<h1><?= $title ?></h1>
<?php
$data = get_photogaleries();
?>

<?php
$photosOnRow = 3;
$thumbPresent = "fotogalerie-list";
$photos = $data;

$count = count($photos);
$open = false;
$counter = 0;

foreach ($photos as $foto):
    
    $fotka = isset($foto->field_fotogalerie_ilustracni[0])?$foto->field_fotogalerie_ilustracni[0]["filepath"]:$foto->field_fotogalerie_fotky[0]["filepath"];


    if($counter % $photosOnRow == 0):

         if($open && (($photosOnRow) != $counter)):
    ?>
        </div>
        <?php
        endif;
        ?>
<div class="photos clr">
    <?php
    $open = true;
    endif;
    ?>

    <div <?php if($counter%$photosOnRow == ($photosOnRow-1)):?>class="l"<?php endif?>>
        <a href="<?=url($foto->path)?>">
            <?=theme("imagecache","fotogalerie-list",$fotka)?>
            <span><?=$foto->title?></span>
        </a>
    </div>
<?php
$counter++;
endforeach;
?>

<?php
if ($open):
    ?>
</div>
<?php
  endif;
?>
