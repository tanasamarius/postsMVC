<?php require APPROOT . '/views/inc/header.php';?>
<div class="card card-body bg-light mt-5">
    <h2>add post</h2>
    <p>create a post with this form</p>
    <form action="<?php echo URLROOT; ?>/posts/add" method="post">
        <div class="form-group">
            <label for="title">title: <sup>*</sup></label>
            <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title'] ?>">
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="body">body: <sup>*</sup></label>
            <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
        </div>
        <a href="<?php echo URLROOT; ?>/posts" class="btn bg-info"><i class="fa fa-backward text-light"> Back</i></a>
        <input type="submit" value="Submit" class="btn btn-success">
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>