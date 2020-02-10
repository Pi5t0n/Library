<div class="form_book_insert">
<hr>
<h2>New book registration!</h2>
<small id="emailHelp" class="form-text text-muted">Inputs with character "*" are required!</small>
    <form method="post" action="DataBase/db_book_insert.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Title book to add:*</label>
      <input type="text" class="form-control" name="title" required>
    </div>
    <div class="form-group">
      <label for="isbn">isbn book to add:*</label>
      <input type="text" class="form-control" name="isbn" required>
    </div>
    <div class="form-group">
      <label for="author">Author book to add:*</label>
      <input type="text" class="form-control" name="author" required>
    </div>
    <div class="form-group">
      <label for="editorial">Editorial book to add:</label>
      <input type="text" class="form-control" name="editorial">
    </div>
    <div class="form-group">
      <label for="category">Category book to add:</label>
      <input type="text" class="form-control" name="category">
     </div>
    <div class="form-group">
      <label for="language">Language book to add:</label>
      <input type="text" class="form-control" name="language">
    </div>
    <div class="form-group">
      <label for="created">Data created book to add:</label>
      <input type="date" class="form-control" name="created">
     </div>
    <div class="form-group">
      <label for="location">ID location book to add:*</label>
      <input type="number" class="form-control" name="location" min="1" max="240" required><br>
    </div>
    <div class="form-group">
      <label for="fileToUpload">Book Image:</label>
      <input type="file" class="form-control" name="fileToUpload"><br>
    </div>
      <input type="submit"  class="btn btn-outline-secondary" name="book_insert" value="Insert a new Book!">
    </form>
</div>