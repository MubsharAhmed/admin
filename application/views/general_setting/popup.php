<style>
    .w-100{
        width: 100%;
        border-radius: 10px;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-edit"></i>Popup</h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- Static Section -->
            <div class="col-md-12">
                <h3>Popup Section</h3>
                <form action="<?= base_url('general/updatePopup') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Heading First Line</label>
                                <input type="text" name="heading_1_line" class="form-control" value="<?= isset($popUp->heading_1_line) ? $popUp->heading_1_line : '' ?>">
                            </div>
                            <div class="form-group">
                                <label>Heading Second Line</label>
                                <input type="text" name="heading_2_line" class="form-control" value="<?= isset($popUp->heading_2_line) ? $popUp->heading_2_line : '' ?>">
                            </div>
                            <div class="form-group">
                                <label>Text First Line</label>
                                <input type="text" name="text_1_line" class="form-control" value="<?= isset($popUp->text_1_line) ? $popUp->text_1_line : '' ?>">
                            </div>
                            <div class="form-group">
                                <label>Text Second Line</label>
                                <input type="text" name="text_2_line" class="form-control" value="<?= isset($popUp->text_2_line) ? $popUp->text_2_line : '' ?>">
                            </div>
                            <div class="form-group">
                                <label>Text Third Line</label>
                                <input type="text" name="text_3_line" class="form-control" value="<?= isset($popUp->text_3_line) ? $popUp->text_3_line : '' ?>">
                            </div>       
                        </div>
                        <div class="col-md-4">
                            <div class="form-group d-flex flex-column">
                                <label>Image</label>
                                <?php if (isset($popUp->popup_image)): ?>
                                    
                                    <img src="<?= base_url('uploads/popup/' . $popUp->popup_image) ?>" alt="Image" class="img-thumbnail d-block mx-auto img-fluid w-100">
                                <?php endif; ?>
                                <input type="file" name="popup_image" class="form-control">

                            </div>

                        </div>
                      <div class="col-md-12">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-6">
                            <button type="submit" class="btn btn-primary w-100" style="margin-bottom: 30px;">Update Popup</button>
                            </div>
                        </div>
                      </div>
                    </div>
                </form>
            </div>      

            <hr class="hr2">
        </div>
    </section>
</div>