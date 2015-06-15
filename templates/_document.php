<?php if ($node->field_document_file[0]['filepath']): ?>
	<?php 
		echo $node->field_document_description[0]['safe'];
		$filetype = end(explode(".", $node->field_document_file[0]['filename']));
		$div_class = $filetype == 'pdf' ? 'pdf' : 'pdf ico-default';
	?>
	<div class="<?php echo $div_class ?>"><a href="/<?= $node->field_document_file[0]['filepath']?>"><?= $node->field_document_title[0]['value'] ?></a></div>
<?php endif;?>	