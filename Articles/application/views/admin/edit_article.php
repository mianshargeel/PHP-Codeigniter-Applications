<?php include_once('admin_header.php'); ?>

<div class="container">

	<?php echo form_open("admin/update_article/" . $article->id , ['class' =>'form-horizontal']); ?>
	<!-- we are passing this concatinated id in update_article in admin.php to know which row we are updating see in url  -->
  <fieldset>
    <legend style="font-size: 25px; color: blue">Edit Articles</legend>

    <div class="form-group">
      <label for="title" class="col-lg-2 control-label">Artilcle Title</label>
      <div class="col-lg-10">
        <input type="text" name="title" class="form-control" placeholder="Please Enter Your Article Title..." 
        value="<?php echo set_value('title',$article->title);?>" > 

        <div> <?php echo form_error("title");?></div>

      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-lg-2 control-label">Article Body</label>
      <div class="col-lg-10">
        <!-- <textarea rows="8" type="text" name="body" class="form-control" placeholder="Please Enter Your Article Body..." 
        value="<?php //echo set_value('body',$article->body);?>" > </textarea> -->
        <?php echo form_textarea(['name'=>'body','class'=>'form-control',
        'value'=>set_value('body',$article->body)]); ?>

        <div> <?php echo form_error("body");?> </div>

    </div>
  	</div> <!-- end of form-group -->
  
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-primary">Update</button> 
        <!-- <input type="submit" name="submit" value="Submit" class="btn btn-primary"> -->
      </div>
    </div>
  </fieldset>
</form>

</div>

<?php include_once('admin_footer.php'); ?>