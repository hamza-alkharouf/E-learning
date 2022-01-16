<?php

use CodeIgniter\Pager\PagerRenderer;
/**
 * @var PagerRenderer $pager
 */

?>

<?php if ($pager->getPageCount()>1) : ?>
	<div class="list-group text-center border-white "  >

		<?php foreach ($pager->links() as $index => $link) : ?>
			<button type="button"   <?= $link['active'] ? 'class="list-group-item list-group-item-secondary "' : 'disabled' ?>>
				<a class="page-link border-white rounded-2"  href="<?= $link['uri'] ?>">
				<span><?=$data[$index]['name'] ?> </span><small class="text-muted">-<?=$data[$index]['videoDuration'] ?>m</small>
				
				</a>
			</button>
		
			<?php endforeach ?>
		

			</div>
<?php endif ?>



