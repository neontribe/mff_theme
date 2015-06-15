<?php
$photosOnRow = isset($photosOnRow)?$photosOnRow:3;
$thumbPresent = isset($thumbPresent)?$thumbPresent:"fotogalerie-list";
$photos = isset($photos)?$photos:$node->field_fotogalerie_fotky;

$count = count($photos);
$open = false;
$counter = 0;



foreach ($photos as $foto):
    if($counter % $photosOnRow == 0):
        
         if($open):
         $open = false;
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
        <a href="<?=imagecache_create_url("w800", $foto["filepath"])?>" title="<?=check_plain($foto["data"]["description"])?>"
			onclick="return hs.expand(this, config1 )">
            <?=theme("imagecache","fotogalerie-list",$foto["filepath"])?>
            <span><?=$foto["data"]["description"]?></span>
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
