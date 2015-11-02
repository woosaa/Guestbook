<div class="row">
  <a class="btn btn-primary pull-right" href="/new" role="button">New entry</a>
</div>
<div class="row">
  <h1>Guestbook</h1>
  <?php
  if (!$this->isEmpty()) {
    foreach ($this->getEntries() as $entry) {
      ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><a style="text-decoration: underline;" href="<?php echo $entry->getLink(); ?>"><?php echo $entry->getTitle(); ?></a></h3>
        </div>
        <div class="panel-body">
          <?php echo $entry->getContent(); ?>
        </div>
        <div class="panel-footer"><?php echo $entry->getDescription(); ?></div>
      </div>
      <?php
    }
  } else {
    ?>
    <div>No entries yet! Go and create one.</div>
  <?php }
  ?>

</div>

