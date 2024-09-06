<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" aria-hidden="true"></i> About Us
            <small>Control panel</small>
        </h1>
    </section>

    <style>
        .hr1{
            /* color: black; */
            border-top: 1px solid black;

        }
    </style>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url('general/updateAboutUs') ?>" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <!-- Section 1 Text -->
                        <div class="form-group">
                            <h1 class="text-center">Section 1</h1>
                            <label for="section_1_text">Section 1 heading</label>
                            <!-- <textarea class="form-control" id="section_1_text" name="section_1_text" rows="4" placeholder="Enter Section 1 text" required><?= isset($about['section_1_text']) ? $about['section_1_text'] : '' ?></textarea> -->
                            <input type="text" class="form-control" id="section_1_text" name="section_1_text" value="<?= isset($about['section_1_text']) ? $about['section_1_text'] : '' ?>" placeholder="Enter Section 1 Heading" required>
                        </div>

                        <hr><hr class="hr1"><hr>

                        <!-- Section 2 Heading 1 -->
                        <div class="form-group">
                        <h1 class="text-center">Section 2</h1>
                            <label for="section_2_h1">Section 2 Heading 1</label>
                            <input type="text" class="form-control" id="section_2_h1" name="section_2_h1" value="<?= isset($about['section_2_h1']) ? $about['section_2_h1'] : '' ?>" placeholder="Enter Section 2 Heading 1" required>
                        </div>

                        <!-- Section 2 Heading 2 -->
                        <div class="form-group">
                            <label for="section_2_h2">Section 2 Heading 2</label>
                            <input type="text" class="form-control" id="section_2_h2" name="section_2_h2" value="<?= isset($about['section_2_h2']) ? $about['section_2_h2'] : '' ?>" placeholder="Enter Section 2 Heading 2" required>
                        </div>

                        <!-- Section 2 Text -->
                        <div class="form-group">
                            <label for="section_2_text">Section 2 Text</label>
                            <textarea class="form-control" id="section_2_text" name="section_2_text" rows="4" placeholder="Enter Section 2 text" required><?= isset($about['section_2_text']) ? $about['section_2_text'] : '' ?></textarea>
                        </div>

                        <!-- Section 2 Image -->
                        <div class="form-group">
                            <label for="section_2_image">Section 2 Image</label>
                            <input type="file" id="section_2_image" name="section_2_image" class="d-none" onchange="previewImage(this, 'section_2_preview')">
                            <!-- <label for="section_2_image" class="photoCard1 d-flex justify-content-center align-items-center UplCard"> -->
                                <div id="section_2_preview" class="text-center">
                                    <?php if (isset($about['section_2_image']) && $about['section_2_image'] != ''): ?>
                                        <img src="<?= base_url('uploads/about_us/' . $about['section_2_image']) ?>" alt="Section 2 Image" class="img-fluid" id="current_section_2_image">
                                    <?php else: ?>
                                        <!-- <img id="image_placeholder2" class="d-block mx-auto" src="./assets/images/upload.png" alt="" width="100"> -->
                                        <p class="fss1 mb-0">Upload Section 2 Image</p>
                                    <?php endif; ?>
                                </div>
                            </label>
                        </div>

                        <hr><hr class="hr1"><hr>

                        <!-- Section 3 Heading -->
                        <div class="form-group">
                        <h1 class="text-center">Section 3</h1>
                            <label for="section_3_heading">Section 3 Heading</label>
                            <input type="text" class="form-control" id="section_3_heading" name="section_3_heading" value="<?= isset($about['section_3_heading']) ? $about['section_3_heading'] : '' ?>" placeholder="Enter Section 3 Heading" required>
                        </div>

                        <!-- Section 3 Text -->
                        <div class="form-group">
                            <label for="section_3_text">Section 3 Text</label>
                            <textarea class="form-control" id="section_3_text" name="section_3_text" rows="4" placeholder="Enter Section 3 text" required><?= isset($about['section_3_text']) ? $about['section_3_text'] : '' ?></textarea>
                        </div>
                        <!-- Section 3 Image -->
                        <div class="form-group">
                            <label for="section_3_image">Section 3 Image</label>
                            <input type="file" id="section_3_image" name="section_3_image" class="d-none" onchange="previewImage(this, 'section_3_preview')">
                            <!-- <label for="section_3_image" class="photoCard1 d-flex justify-content-center align-items-center UplCard"> -->
                                <div id="section_3_preview" class="text-center">
                                    <?php if (isset($about['section_3_image']) && $about['section_3_image'] != ''): ?>
                                        <img src="<?= base_url('uploads/about_us/' . $about['section_3_image']) ?>" alt="Section 3 Image" class="img-fluid" width="500" id="current_section_3_image">
                                    <?php else: ?>
                                        <!-- <img id="image_placeholder3" class="d-block mx-auto" src="./assets/images/upload.png" alt="" width="100"> -->
                                        <p class="fss1 mb-0">Upload Section 3 Image</p>
                                    <?php endif; ?>
                                </div>
                            </label>
                        </div>

                        <hr><hr class="hr1"><hr>

                        <!-- Section 4 Heading -->
                        <div class="form-group">
                        <h1 class="text-center">Section 4</h1>
                            <label for="section_4_heading">Section 4 Heading</label>
                            <input type="text" class="form-control" id="section_4_heading" name="section_4_heading" value="<?= isset($about['section_4_heading']) ? $about['section_4_heading'] : '' ?>" placeholder="Enter Section 4 Heading" required>
                        </div>

                        <!-- Section 4 Text -->
                        <div class="form-group">
                            <label for="section_4_text">Section 4 Text</label>
                            <textarea class="form-control" id="section_4_text" name="section_4_text" rows="4" placeholder="Enter Section 4 text" required><?= isset($about['section_4_text']) ? $about['section_4_text'] : '' ?></textarea>
                        </div>

                        <!-- Section 4 Image -->
                        <div class="form-group">
                            <label for="section_4_image">Section 4 Image</label>
                            <input type="file" class="form-control-file" id="section_4_image" name="section_4_image" onchange="previewImage(this, 'section_4_preview')">
                            <div id="section_4_preview" class="text-center mt-2">
                                <?php if (isset($about['section_4_image']) && $about['section_4_image'] != ''): ?>
                                    <img src="<?= base_url('uploads/about_us/' . $about['section_4_image']) ?>" alt="Section 4 Image" class="img-fluid" width="500" id="current_section_4_image">
                                <?php else: ?>
                                    <!-- <img src="./assets/images/upload.png" alt="Section 4 Image Placeholder" class="img-thumbnail" width="150"> -->
                                    <p class="fss1 mb-0">Upload Section 4 Image</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <hr><hr class="hr1"><hr>

                        <!-- Section 5 Heading -->
                        <div class="form-group">
                        <h1 class="text-center">Section 5</h1>
                            <label for="section_5_heading">Section 5 Heading</label>
                            <input type="text" class="form-control" id="section_5_heading" name="section_5_heading" value="<?= isset($about['section_5_heading']) ? $about['section_5_heading'] : '' ?>" placeholder="Enter Section 5 Heading" required>
                        </div>

                        <!-- Section 5 Text -->
                        <div class="form-group">
                            <label for="section_5_text">Section 5 Text</label>
                            <textarea class="form-control" id="section_5_text" name="section_5_text" rows="4" placeholder="Enter Section 5 text" required><?= isset($about['section_5_text']) ? $about['section_5_text'] : '' ?></textarea>
                        </div>

                        <!-- Section 5 Image -->
                        <div class="form-group">
                            <label for="section_5_image">Section 5 Image</label>
                            <input type="file" class="form-control-file" id="section_5_image" name="section_5_image" onchange="previewImage(this, 'section_5_preview')">
                            <div id="section_5_preview" class="text-center mt-2">
                                <?php if (isset($about['section_5_image']) && $about['section_5_image'] != ''): ?>
                                    <img src="<?= base_url('uploads/about_us/' . $about['section_5_image']) ?>" alt="Section 5 Image" class="img-fluid" width="500" id="current_section_5_image">
                                <?php else: ?>
                                    <!-- <img src="./assets/images/upload.png" alt="Section 5 Image Placeholder" class="d-block mx-auto" width="150"> -->
                                    <p class="fss1 mb-0">Upload Section 5 Image</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update About Us</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>

<script>
    function previewImage(input, previewId) {
        const file = input.files[0];
        const previewContainer = document.getElementById(previewId);

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const placeholder = previewContainer.querySelector('img[src*="upload.png"]');
                const currentImage = previewContainer.querySelector('img[id^="current_"]');

                if (placeholder) {
                    placeholder.style.display = 'none';
                }
                if (currentImage) {
                    currentImage.style.display = 'none';
                }

                const imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.classList.add("img-thumbnail");
                imgElement.style.width = "150px";
                imgElement.style.height = "auto";

                // Remove old preview image if exists
                const existingPreviewImage = previewContainer.querySelector('.imgUploaded');
                if (existingPreviewImage) {
                    existingPreviewImage.remove();
                }

                imgElement.classList.add("imgUploaded");
                previewContainer.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
        }
    }
</script>