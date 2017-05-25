<?php include_once('admin_header.php'); ?>

<div class="container">
<!-- Note if we want to upload any file then we have to open multipart form see doc --> 
	<?php echo form_open_multipart('admin/store_article', ['class' =>'form-horizontal']); ?>

	<?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>
<!-- we need to get user_id field also like as under two more fields title and body see in DB, but in hidden form in above func 1st arg key n value [see SOURCE PAGE]  -->
<?php echo form_hidden('created_at', date('Y-m-d H:i:s')); ?>

  <fieldset>
    <legend style="font-size: 25px; color: blue">Add Articles</legend>

    <div class="form-group">
      <label for="title" class="col-lg-2 control-label">Artilcle Title</label>
      <div class="col-lg-10">
        <input type="text" name="title" class="form-control" placeholder="Please Enter Your Article Title..." 
        value="<?php echo set_value('title');?>" > <!-- set_value() is codeig.. func to keep correct value in field see documentation  -->

        <div> <?php echo form_error("title");?></div>

      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-lg-2 control-label">Article Body</label>
      <div class="col-lg-10">
        <textarea rows="8" type="text" name="body" class="form-control" placeholder="Please Enter Your Article Body..." 
        value="<?php echo set_value('body');?>" > </textarea>
        <div> <?php echo form_error("body");?> </div>
        <br>


        <!-- to file upload -->
    <div class="form-group">
    <div class="row">
      <div class="col-lg-6">
      <label for="userfile" class="col-lg-2 control-label">Upload Image</label>

      <div class="col-lg-6">
      <?php echo form_upload(['name'=>'userfile', 'class'=>'form-control']); ?> 
      <!-- Note userfile is default name of input of COdeigniter but if we want to use custom name i-e 'image' then that name we have to put in do_upload('image') in admin.php --> 
      <div> <?php if(isset($upload_error)) echo $upload_error; //admin/store ?> </div>
      </div>
    </div>
    </div>
    </div>


    </div>
  	</div> <!-- end of form-group -->
  
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-primary">Submit</button> 
        <!-- <input type="submit" name="submit" value="Submit" class="btn btn-primary"> -->
      </div>
    </div>
  </fieldset>
</form>

</div>

<?php include_once('admin_footer.php'); ?>