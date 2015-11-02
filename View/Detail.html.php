<div class="row" style="margin-top: 25px;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo $this->getEntry()->getTitle(); ?></a></h3>
    </div>
    <div class="panel-body">
      <?php echo $this->getEntry()->getContent(); ?>
    </div>
  </div>
  <a class="btn btn-danger" href="/list" role="button">Back</a>
</div>


