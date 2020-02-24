<h1>Add Category</h1>
    <form action='insert_category.php' method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="" class="offset-sm-1 col-sm-2 control-label">Category</label>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="category" placeholder="enter Category name" required/>
            </div>
        </div>
            <div class="form-group text-center">
                <button class="btn btn-success" type="submit" name="submit">save</button>
                <button class="btn btn-danger" type="reset">reset</button>
            </div>
    </form>
