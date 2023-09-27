<div class="pagination">
	<ul>
		<li><?= $this->Paginator->first('<< ' . __('first')) ?></li>
		<li><?= $this->Paginator->prev('< ' . __('previous')) ?></li>
		<li><?= $this->Paginator->numbers() ?></li>
		<li><?= $this->Paginator->next(__('next') . ' >') ?></li>
		<li><?= $this->Paginator->last(__('last') . ' >>') ?></li>
	</ul>
	<p><?= $this->Paginator->counter() ?></p>
</div>