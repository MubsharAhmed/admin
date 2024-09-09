<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" aria-hidden="true"></i> General Setting
            <small>Control panel</small>
        </h1>
    </section>

    <style>
        .photoCard {
            border: 2px dashed #ccc;
            border-radius: 10px;
            height: auto;
            width: 100%;
            cursor: pointer;
            transition: border-color 0.3s;
            overflow: hidden;
        }

        .photoCard1 {
            border: 2px dashed #ccc;
            border-radius: 10px;
            height: auto;
            width: 300px;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .photoCard:hover {
            border-color: #28a745;
        }

        .UplCard img {
            max-width: 100px;
        }

        .UplCard p {
            font-size: 1.2rem;
            color: #666;
        }

        #logo_preview img {

            max-width: 300px;
            height: auto;
            border-radius: 10px;
        }

        #slider_preview1 img,
        #slider_preview2 img,
        #slider_preview3 img {
            max-width: 500px;
            height: auto;
            border-radius: 10px;
        }

        .form-group {
            overflow: hidden;
        }
    </style>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">General Settings</h3>
                    </div>
                    <form action="<?= base_url('general/update') ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <!-- Address Input -->
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="<?= isset($settings['address']) ? $settings['address'] : '' ?>"
                                    placeholder="Enter address" required>
                            </div>

                            <!-- Email Input -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= isset($settings['email']) ? $settings['email'] : '' ?>"
                                    placeholder="Enter email" required>
                            </div>

                            <!-- Phone Input -->
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="<?= isset($settings['phone']) ? $settings['phone'] : '' ?>"
                                    placeholder="Enter phone number" required>
                            </div>

                            <!-- Logo Image Upload with Preview -->
                            <div class="form-group">
                                <label for="logo_image">Logo Image</label>
                                <input type="file" id="logo_image" name="logo_image" class="d-none" onchange="previewImage(this, 'logo_preview')">
                                <label for="logo_image" class="photoCard1 d-flex justify-content-center align-items-center UplCard">
                                    <div id="logo_preview" class="text-center">
                                        <!-- Conditionally show the default image or the uploaded image -->
                                        <?php if (isset($settings['logo_image']) && $settings['logo_image'] != ''): ?>
                                            <img src="<?= base_url('uploads/logo/' . $settings['logo_image']) ?>" style="background-color: black;" alt="Logo" class="img-fluid" id="current_logo_image">
                                        <?php else: ?>
                                            <img id="image_placeholder1" class="d-block mx-auto" src="./assets/images/upload.png" alt="" width="100">
                                            <p class="fss1 mb-0">Upload Logo</p>
                                        <?php endif; ?>
                                    </div>
                                </label>
                            </div>

                            <!-- Slider Image 1 Upload with Preview -->
                            <div class="form-group">
                                <label for="s_image_1">Slider Image 1</label>
                                <input type="file" id="s_image_1" name="s_image_1" class="d-none" onchange="previewImage(this, 'slider_preview1')">
                                <label for="s_image_1" class="photoCard d-flex justify-content-center align-items-center UplCard">
                                    <div id="slider_preview1" class="text-center">
                                        <!-- Conditionally show the default image or the uploaded image -->
                                        <?php if (isset($settings['s_image_1']) && $settings['s_image_1'] != ''): ?>
                                            <!-- Image from the database -->
                                            <img src="<?= base_url('uploads/slider_images/' . $settings['s_image_1']) ?>" class="img-fluid" alt="Slider Image 1" width="350" height="250" id="current_slider_image1">
                                        <?php else: ?>
                                            <!-- Default placeholder image -->
                                            <img id="image_placeholder2" class="d-block mx-auto" src="./assets/images/upload.png" alt="" width="100">
                                            <p class="fss1 mb-0">Upload Slider Image 1</p>
                                        <?php endif; ?>
                                    </div>
                                </label>
                            </div>


                            <!-- Slider Image 2 Upload with Preview -->
                            <div class="form-group">
                                <label for="s_image_2">Slider Image 2</label>
                                <input type="file" id="s_image_2" name="s_image_2" class="d-none" onchange="previewImage(this, 'slider_preview2')">
                                <label for="s_image_2" class="photoCard d-flex justify-content-center align-items-center UplCard">
                                    <div id="slider_preview2" class="text-center">
                                        <!-- Conditionally show the default image or the uploaded image -->
                                        <?php if (isset($settings['s_image_2']) && $settings['s_image_2'] != ''): ?>
                                            <!-- Image from the database -->
                                            <img src="<?= base_url('uploads/slider_images/' . $settings['s_image_2']) ?>" class="img-fluid" alt="Slider Image 2" width="350" height="250" id="current_slider_image2">
                                        <?php else: ?>
                                            <!-- Default placeholder image -->
                                            <img id="image_placeholder2" class="d-block mx-auto" src="./assets/images/upload.png" alt="" width="100">
                                            <p class="fss1 mb-0">Upload Slider Image 2</p>
                                        <?php endif; ?>
                                    </div>
                                </label>
                            </div>

                            <!-- Slider Image 3 Upload with Preview -->
                            <div class="form-group">
                                <label for="s_image_3">Slider Image 3</label>
                                <input type="file" id="s_image_3" name="s_image_3" class="d-none" onchange="previewImage(this, 'slider_preview3')">
                                <label for="s_image_3" class="photoCard d-flex justify-content-center align-items-center UplCard">
                                    <div id="slider_preview3" class="text-center">
                                        <!-- Conditionally show the default image or the uploaded image -->
                                        <?php if (isset($settings['s_image_3']) && $settings['s_image_3'] != ''): ?>
                                            <!-- Image from the database -->
                                            <img src="<?= base_url('uploads/slider_images/' . $settings['s_image_3']) ?>" class="img-fluid" alt="Slider Image 3" width="350" height="250" id="current_slider_image3">
                                        <?php else: ?>
                                            <!-- Default placeholder image -->
                                            <img id="image_placeholder3" class="d-block mx-auto" src="./assets/images/upload.png" alt="" width="100">
                                            <p class="fss1 mb-0">Upload Slider Image 3</p>
                                        <?php endif; ?>
                                    </div>
                                </label>
                            </div>


                            <!-- About Company Text Area -->
                            <div class="form-group">
                                <label for="about_company">About Company</label>
                                <textarea class="form-control" id="about_company" name="about_company"
                                    placeholder="Enter details about the company" rows="4" required><?= isset($settings['about_company']) ? $settings['about_company'] : '' ?></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script>
        function previewImage(input, previewId) {
            const file = input.files[0];
            const previewContainer = document.getElementById(previewId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Hide placeholder and existing image, show uploaded image
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
                    imgElement.classList.add("img-fluid");
                    imgElement.style.width = "350px";
                    imgElement.style.height = "250px";

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



</div>