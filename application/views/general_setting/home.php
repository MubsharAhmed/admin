<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" aria-hidden="true"></i> Home Page Sections
            <small>Control panel</small>
        </h1>
    </section>

    <style>
        .hr1 {

            border-top: 1px solid black;

        }

        .hr2 {

            border-top: .5px solid black;

            width: 500px;
            

        }
        .form-group {
            padding: 10px;
        }
    </style>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url('general/homeUpdate') ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <!-- Section 1 -->
                        <div class="section">
                            <h1 class="text-center">Section 1</h1>
                            <div class="form-group">
                                <label for="section_1_small_h">Section 1 Small Heading</label>
                                <input type="text" class="form-control" id="section_1_small_h" name="section_1_small_h"
                                    value="<?= isset($home['section_1_small_h']) ? $home['section_1_small_h'] : '' ?>"
                                    placeholder="Enter Section 1 Small Heading">
                            </div>

                            <div class="form-group">
                                <label for="section_1_heading">Section 1 Heading</label>
                                <input type="text" class="form-control" id="section_1_heading" name="section_1_heading"
                                    value="<?= isset($home['section_1_heading']) ? $home['section_1_heading'] : '' ?>"
                                    placeholder="Enter Section 1 Heading">
                            </div>

                            <div class="form-group">
                                <label for="section_1_short_desc">Section 1 Short Description</label>
                                <textarea class="form-control" id="section_1_short_desc" name="section_1_short_desc"
                                    placeholder="Enter Section 1 Short Description" rows="3"><?= isset($home['section_1_short_desc']) ? $home['section_1_short_desc'] : '' ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="section_1_long_desc">Section 1 Long Description</label>
                                <textarea class="form-control" id="section_1_long_desc" name="section_1_long_desc"
                                    placeholder="Enter Section 1 Long Description" rows="4"><?= isset($home['section_1_long_desc']) ? $home['section_1_long_desc'] : '' ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="section_1_image_1">Section 1 Image 1</label>
                                <input type="file" class="form-control-file" id="section_1_image_1" name="section_1_image_1">
                                <?php if (isset($home['section_1_image_1'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_1_image_1']) ?>" alt="Image 1 Preview" class="img-thumbnail" width="300">
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="section_1_image_2">Section 1 Image 2</label>
                                <input type="file" class="form-control-file" id="section_1_image_2" name="section_1_image_2">
                                <?php if (isset($home['section_1_image_2'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_1_image_2']) ?>" alt="Image 2 Preview" class="img-thumbnail" width="350">
                                <?php endif; ?>
                            </div>
                        </div>

                        <hr>
                        <hr>
                        <hr class="hr1">
                        <hr>
                        <hr>

                        <!-- Section 2 -->
                        <div class="section">
                            <h1 class="text-center">Section 2</h1>
                            <div class="form-group">
                                <label for="section_2_heading">Section 2 Heading</label>
                                <input type="text" class="form-control" id="section_2_heading" name="section_2_heading"
                                    value="<?= isset($home['section_2_heading']) ? $home['section_2_heading'] : '' ?>"
                                    placeholder="Enter Section 2 Heading">
                            </div>

                            <div class="form-group">
                                <label for="section_2_text">Section 2 Text</label>
                                <textarea class="form-control" id="section_2_text" name="section_2_text"
                                    placeholder="Enter Section 2 Text" rows="3"><?= isset($home['section_2_text']) ? $home['section_2_text'] : '' ?></textarea>
                            </div>


                            <div class="form-group">
                                <label for="section_2_imagee">Section 2 Image</label>
                                <input type="file" class="form-control-file" id="section_2_imagee" name="section_2_imagee">
                                <?php if (isset($home['section_2_imagee'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_2_imagee']) ?>" alt="Image 1 Preview" class="img-thumbnail" width="350">
                                <?php endif; ?>
                            </div>
                        </div>

                        <hr>
                        <hr>
                        <hr class="hr1">
                        <hr>
                        <hr>

                        <!-- Section 3 -->
                        <div class="section">
                            <h1 class="text-center">Section 3</h1>
                            <div class="form-group">
                                <label for="section_3_small_h">Section 3 Small Heading</label>
                                <input type="text" class="form-control" id="section_3_small_h" name="section_3_small_h"
                                    value="<?= isset($home['section_3_small_h']) ? $home['section_3_small_h'] : '' ?>"
                                    placeholder="Enter Section 3 Small Heading">
                            </div>
                            
                            <hr>

                            <div class="form-group">
                                <label for="section_3_heading">Section 3 Heading</label>
                                <input type="text" class="form-control" id="section_3_heading" name="section_3_heading"
                                    value="<?= isset($home['section_3_heading']) ? $home['section_3_heading'] : '' ?>"
                                    placeholder="Enter Section 3 Heading">
                            </div>
                            <hr>
                            <hr class="hr2">
                            <hr>
                            <!-- Column 1 -->
                            <div class="form-group">
                                <label for="section_3_c1_image">Card 1 Image</label>
                                <input type="file" class="form-control-file" id="section_3_c1_image" name="section_3_c1_image">
                                <?php if (isset($home['section_3_c1_image'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_3_c1_image']) ?>" alt="Column 1 Image Preview" class="img-thumbnail" width="200">
                                <?php endif; ?>
                            </div>

                            <hr>
                            

                            <div class="form-group">
                                <label for="section_3_c1_icon">Card 1 Icon</label>
                                <input type="file" class="form-control-file" id="section_3_c1_icon" name="section_3_c1_icon">
                                <?php if (isset($home['section_3_c1_icon'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_3_c1_icon']) ?>" alt="Column 1 Icon Preview" class="img-thumbnail" width="50">
                                <?php endif; ?>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="section_3_c1_h">Card 1 Heading</label>
                                <input type="text" class="form-control" id="section_3_c1_h" name="section_3_c1_h"
                                    value="<?= isset($home['section_3_c1_h']) ? $home['section_3_c1_h'] : '' ?>"
                                    placeholder="Enter Section 3 Column 1 Heading">
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="section_3_c1_text">Card 1 Text</label>
                                <textarea class="form-control" id="section_3_c1_text" name="section_3_c1_text"
                                    placeholder="Enter Section 3 Column 1 Text" rows="2"><?= isset($home['section_3_c1_text']) ? $home['section_3_c1_text'] : '' ?></textarea>
                            </div>
                            <hr>
                            <hr class="hr2">
                            <hr>

                            <!-- Column 2 -->
                            <div class="form-group">
                                <label for="section_3_c2_image">Card 2 Image</label>
                                <input type="file" class="form-control-file" id="section_3_c2_image" name="section_3_c2_image">
                                <?php if (isset($home['section_3_c2_image'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_3_c2_image']) ?>" alt="Column 2 Image Preview" class="img-thumbnail" width="200">
                                <?php endif; ?>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="section_3_c2_icon">Card 2 Icon</label>
                                <input type="file" class="form-control-file" id="section_3_c2_icon" name="section_3_c2_icon">
                                <?php if (isset($home['section_3_c2_icon'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_3_c2_icon']) ?>" alt="Column 2 Icon Preview" class="img-thumbnail" width="50">
                                <?php endif; ?>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="section_3_c2_h">Card 2 Heading</label>
                                <input type="text" class="form-control" id="section_3_c2_h" name="section_3_c2_h"
                                    value="<?= isset($home['section_3_c2_h']) ? $home['section_3_c2_h'] : '' ?>"
                                    placeholder="Enter Section 3 Column 2 Heading">
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="section_3_c2_text">Card 2 Text</label>
                                <textarea class="form-control" id="section_3_c2_text" name="section_3_c2_text"
                                    placeholder="Enter Section 3 Column 2 Text" rows="2"><?= isset($home['section_3_c2_text']) ? $home['section_3_c2_text'] : '' ?></textarea>
                            </div>

                            <hr>
                            <hr class="hr2">
                            <hr>

                            <!-- Column 3 -->
                            <div class="form-group">
                                <label for="section_3_c3_image">Card 3 Image</label>
                                <input type="file" class="form-control-file" id="section_3_c3_image" name="section_3_c3_image">
                                <?php if (isset($home['section_3_c3_image'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_3_c3_image']) ?>" alt="Column 3 Image Preview" class="img-thumbnail" width="200">
                                <?php endif; ?>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label for="section_3_c3_icon">Card 3 Icon</label>
                                <input type="file" class="form-control-file" id="section_3_c3_icon" name="section_3_c3_icon">
                                <?php if (isset($home['section_3_c3_icon'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_3_c3_icon']) ?>" alt="Column 3 Icon Preview" class="img-thumbnail" width="50">
                                <?php endif; ?>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label for="section_3_c3_h">Card 3 Heading</label>
                                <input type="text" class="form-control" id="section_3_c3_h" name="section_3_c3_h"
                                    value="<?= isset($home['section_3_c3_h']) ? $home['section_3_c3_h'] : '' ?>"
                                    placeholder="Enter Section 3 Column 3 Heading">
                            </div>

                            <hr>
                            <div class="form-group">
                                <label for="section_3_c3_text">Card 3 Text</label>
                                <textarea class="form-control" id="section_3_c3_text" name="section_3_c3_text"
                                    placeholder="Enter Section 3 Column 3 Text" rows="2"><?= isset($home['section_3_c3_text']) ? $home['section_3_c3_text'] : '' ?></textarea>
                            </div>
                        </div>
                        <hr>
                        <hr class="hr2">
                        <hr>

                        <hr>
                        <hr>
                        <hr class="hr1">
                        <hr>
                        <hr>

                        <!-- Section 4 -->
                        <div class="section">
                            <h1 class="text-center">Section 4</h1>
                            <div class="form-group">
                                <label for="section_4_image">Section 4 Image</label>
                                <input type="file" class="form-control-file" id="section_4_image" name="section_4_image">
                                <?php if (isset($home['section_4_image'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_4_image']) ?>" alt="Section 4 Image Preview" class="img-thumbnail" width="300">
                                <?php endif; ?>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label for="section_4_small_h">Section 4 Small Heading</label>
                                <input type="text" class="form-control" id="section_4_small_h" name="section_4_small_h"
                                    value="<?= isset($home['section_4_small_h']) ? $home['section_4_small_h'] : '' ?>"
                                    placeholder="Enter Section 4 Small Heading">
                            </div>

                            <div class="form-group">
                                <label for="section_4_heading">Section 4 Heading</label>
                                <input type="text" class="form-control" id="section_4_heading" name="section_4_heading"
                                    value="<?= isset($home['section_4_heading']) ? $home['section_4_heading'] : '' ?>"
                                    placeholder="Enter Section 4 Heading">
                            </div>

                            <hr>
                            <hr class="hr2">
                            <hr>
                            <!-- Icons and Texts -->
                            <div class="form-group">
                                <label for="section_4_icon_1">Icon 1</label>
                                <input type="file" class="form-control-file" id="section_4_icon_1" name="section_4_icon_1">
                                <?php if (isset($home['section_4_icon_1'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_4_icon_1']) ?>" alt="Icon 1 Preview" class="img-thumbnail" width="50">
                                <?php endif; ?>
                            </div>
                            
                            <hr>

                            <div class="form-group">
                                <label for="icon_1_text">Icon 1 Text</label>
                                <input type="text" class="form-control" id="icon_1_text" name="icon_1_text"
                                    value="<?= isset($home['icon_1_text']) ? $home['icon_1_text'] : '' ?>"
                                    placeholder="Enter Icon 1 Text">
                            </div>
                            <hr>
                            <hr class="hr2">
                            <hr>

                            <div class="form-group">
                                <label for="section_4_icon_2">Icon 2</label>
                                <input type="file" class="form-control-file" id="section_4_icon_2" name="section_4_icon_2">
                                <?php if (isset($home['section_4_icon_2'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_4_icon_2']) ?>" alt="Icon 2 Preview" class="img-thumbnail" width="50">
                                <?php endif; ?>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="icon_2_text">Icon 2 Text</label>
                                <input type="text" class="form-control" id="icon_2_text" name="icon_2_text"
                                    value="<?= isset($home['icon_2_text']) ? $home['icon_2_text'] : '' ?>"
                                    placeholder="Enter Icon 2 Text">
                            </div>
                            <hr>
                            <hr class="hr2">
                            <hr>

                            <div class="form-group">
                                <label for="section_4_icon_3">Icon 3</label>
                                <input type="file" class="form-control-file" id="section_4_icon_3" name="section_4_icon_3">
                                <?php if (isset($home['section_4_icon_3'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_4_icon_3']) ?>" alt="Icon 3 Preview" class="img-thumbnail" width="50">
                                <?php endif; ?>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="icon_3_text">Icon 3 Text</label>
                                <input type="text" class="form-control" id="icon_3_text" name="icon_3_text"
                                    value="<?= isset($home['icon_3_text']) ? $home['icon_3_text'] : '' ?>"
                                    placeholder="Enter Icon 3 Text">
                            </div>
                            <hr>
                            <hr class="hr2">
                            <hr>

                            <div class="form-group">
                                <label for="section_4_icon_4">Icon 4</label>
                                <input type="file" class="form-control-file" id="section_4_icon_4" name="section_4_icon_4">
                                <?php if (isset($home['section_4_icon_4'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_4_icon_4']) ?>" alt="Icon 4 Preview" class="img-thumbnail" width="50">
                                <?php endif; ?>
                            </div>
                            
                            <hr>

                            <div class="form-group">
                                <label for="icon_4_text">Icon 4 Text</label>
                                <input type="text" class="form-control" id="icon_4_text" name="icon_4_text"
                                    value="<?= isset($home['icon_4_text']) ? $home['icon_4_text'] : '' ?>"
                                    placeholder="Enter Icon 4 Text">
                            </div>
                            <hr>
                            <hr class="hr2">
                            <hr>

                            <div class="form-group">
                                <label for="section_4_icon_5">Icon 5</label>
                                <input type="file" class="form-control-file" id="section_4_icon_5" name="section_4_icon_5">
                                <?php if (isset($home['section_4_icon_5'])): ?>
                                    <img src="<?= base_url('uploads/home/' . $home['section_4_icon_5']) ?>" alt="Icon 5 Preview" class="img-thumbnail" width="50">
                                <?php endif; ?>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="icon_5_text">Icon 5 Text</label>
                                <input type="text" class="form-control" id="icon_5_text" name="icon_5_text"
                                    value="<?= isset($home['icon_5_text']) ? $home['icon_5_text'] : '' ?>"
                                    placeholder="Enter Icon 5 Text">
                            </div>
                            <hr>
                            <hr class="hr2">
                            <hr>

                            <div class="form-group">
                                <label for="section_4_desc">Section 4 Description</label>
                                <textarea class="form-control" id="section_4_desc" name="section_4_desc" rows="4"
                                    placeholder="Enter Section 4 Description"><?= isset($home['section_4_desc']) ? $home['section_4_desc'] : '' ?></textarea>
                            </div>
                        </div>

                        <hr>
                        <hr>
                        <hr class="hr1">
                        <hr>
                        <hr>

                        <!-- Section 5 -->
                        <div class="section">
                            <h1 class="text-center">Section 5</h1>
                            <div class="form-group">
                                <label for="section_5_heading">Section 5 Heading</label>
                                <input type="text" class="form-control" id="section_5_heading" name="section_5_heading"
                                    value="<?= isset($home['section_5_heading']) ? $home['section_5_heading'] : '' ?>"
                                    placeholder="Enter Section 5 Heading">
                            </div>

                            <div class="form-group">
                                <label for="section_5_video_url">Section 5 Video URL</label>
                                <input type="text" class="form-control" id="section_5_video_url" name="section_5_video_url"
                                    value="<?= isset($home['section_5_video_url']) ? $home['section_5_video_url'] : '' ?>"
                                    placeholder="Enter Section 5 Video URL">
                            </div>
                        </div>

                        <hr>
                        <hr>
                        <hr class="hr1">
                        <hr>
                        <hr>

                        <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>

            <script>
                document.getElementById('imageUpload').addEventListener('change', function(event) {
                    var previewContainer = document.getElementById('imagePreviews');
                    previewContainer.innerHTML = ''; // Clear existing previews

                    Array.from(event.target.files).forEach(file => {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var img = document.createElement('img');
                            img.src = e.target.result;
                            img.classList.add('img-thumbnail');
                            img.style.width = '150px';
                            var div = document.createElement('div');
                            div.classList.add('image-preview');
                            div.appendChild(img);
                            previewContainer.appendChild(div);
                        };

                        reader.readAsDataURL(file);
                    });
                });
            </script>


        </div>
</div>
</section>
</div>