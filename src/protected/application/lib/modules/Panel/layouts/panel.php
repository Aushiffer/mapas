<?php $this->part('header', $render_data); ?>
<?php $this->part('main-header', $render_data) ?>
<article class="panel">
    <aside class="panel__sidebar">
        <?php $this->part('panel/nav', $render_data); ?>
    </aside>
    <main class="panel__main">
        <?= $TEMPLATE_CONTENT ?>
    </main>
</article>
<?php $this->part('main-footer', $render_data) ?>
<?php $this->part('footer', $render_data); ?>