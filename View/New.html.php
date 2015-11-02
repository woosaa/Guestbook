<form action="/new" method="POST">
  <div class="form-group">
    <label for="titleInput">Title:</label>
    <input type="text" class="form-control" id="titleInput" name="title" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="contentInput">Message:</label>
    <textarea class="form-control" id="contentInput" rows="3" name="content" placeholder="Message"></textarea>
  </div>
  <button type="submit" name="save" class="btn btn-primary">Save</button>
  <a class="btn btn-danger" href="/list" role="button">Cancel</a>
</form>