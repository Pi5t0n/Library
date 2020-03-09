    <form method="post" action="">
        <div class="input-group mb-3">
            <!--<label for="author">Buscar libro:</label>-->
            <input type="text" class="form-control" onkeyup="showResult(this.value)" placeholder="Search book by Author" name="author">
            <div class="input-group-append">
                <input type="submit" name="book_select"  class="btn btn-outline-secondary" value="Search a Book">
            </div>
            
        </div>
        <div id="livesearch"></div>
        
    </form>
 