<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-edit"></i> Case Studies</h1>
    </section>

    <style>
        .card {
            padding: 20px;
        }

        .rowFlex {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem
        }

        .colW {
            width: 48%;
            background-color: whitesmoke;
        }

        .hr2 {

            border-top: .5px solid black;

            width: 500px;


        }
        .text-area{
            margin-bottom: 20px;
            /* height: 500px; */
            max-width: 1060px;
        }
        .img-thumbnail {
            background-color: black;
        }
    </style>

    <section class="content">
        <div class="container">
            <form action="updateCaseStudies" method="post" enctype="multipart/form-data" class="form-horizontal">

                <!-- Section 1 -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Section 1</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="section1_main_content" class="form-label">Main Content:</label>
                            <textarea rows="8" name="section1_main_content" id="section1_main_content" class="form-control text-area"><?= isset($case['section1_main_content']) ? $case['section1_main_content'] : '' ?></textarea>
                        </div>

                        <div class="rowFlex">
                            <?php for ($i = 1; $i <= 4; $i++) : ?>
                                <div class="colW mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Card <?= $i ?></h5>
                                            <div class="mb-3">
                                                <label for="section1_card<?= $i ?>_heading" class="form-label">Heading:</label>
                                                <input type="text" name="section1_card<?= $i ?>_heading" id="section1_card<?= $i ?>_heading" class="form-control" value="<?= isset($case['section1_card' . $i . '_heading']) ? $case['section1_card' . $i . '_heading'] : '' ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="section1_card<?= $i ?>_description" class="form-label">Description:</label>
                                                <textarea name="section1_card<?= $i ?>_description" id="section1_card<?= $i ?>_description" class="form-control" rows="8"><?= isset($case['section1_card' . $i . '_description']) ? $case['section1_card' . $i . '_description'] : '' ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="section1_card<?= $i ?>_image" class="form-label">Image:</label>
                                                <input type="file" name="section1_card<?= $i ?>_image" id="section1_card<?= $i ?>_image" class="form-control">

                                                <?php if (!empty($case['section1_card' . $i . '_image'])): ?>
                                                    <div class="mt-2">
                                                        <img src="<?= base_url('uploads/casestudies/' . $case['section1_card' . $i . '_image']) ?>" alt="Image <?= $i ?>" class="img-thumbnail mt-2" style="max-width: 200px;">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

                <hr class="hr2">

                <!-- Section 2 -->
                <div class="card mb-4">
                    <div class="card-header  bg-primary text-white">
                        <h3 class="card-title">Section 2</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="section2_main_content" class="form-label">Main Content:</label>
                            <textarea rows="8" name="section2_main_content" id="section2_main_content" class="form-control text-area"><?= isset($case['section2_main_content']) ? $case['section2_main_content'] : '' ?></textarea>
                        </div>

                        <div class="rowFlex">
                            <?php for ($i = 1; $i <= 4; $i++) : ?>
                                <div class="colW mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Card <?= $i ?></h5>
                                            <div class="mb-3">
                                                <label for="section2_card<?= $i ?>_heading" class="form-label">Heading:</label>
                                                <input type="text" name="section2_card<?= $i ?>_heading" id="section2_card<?= $i ?>_heading" class="form-control" value="<?= isset($case['section2_card' . $i . '_heading']) ? $case['section2_card' . $i . '_heading'] : '' ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="section2_card<?= $i ?>_description" class="form-label">Description:</label>
                                                <textarea rows="8" name="section2_card<?= $i ?>_description" id="section2_card<?= $i ?>_description" class="form-control"><?= isset($case['section2_card' . $i . '_description']) ? $case['section2_card' . $i . '_description'] : '' ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="section2_card<?= $i ?>_image" class="form-label">Image:</label>
                                                <input type="file" name="section2_card<?= $i ?>_image" id="section2_card<?= $i ?>_image" class="form-control">

                                                <?php if (!empty($case['section2_card' . $i . '_image'])): ?>
                                                    <div class="mt-2">
                                                        <img src="<?= base_url('uploads/casestudies/' . $case['section2_card' . $i . '_image']) ?>" alt="Image <?= $i ?>" class="img-thumbnail mt-2" style="max-width: 200px;">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

                <hr class="hr2">


                <!-- Section 3 -->
                <div class="card mb-4">
                    <div class="card-header  bg-primary text-white">
                        <h3 class="card-title">Section 3</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="section3_main_content" class="form-label">Main Content:</label>
                            <textarea rows="8" name="section3_main_content" id="section3_main_content" class="form-control text-area"><?= isset($case['section3_main_content']) ? $case['section3_main_content'] : '' ?></textarea>
                        </div>

                        <div class="rowFlex">
                            <?php for ($i = 1; $i <= 4; $i++) : ?>
                                <div class="colW mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Card <?= $i ?></h5>
                                            <div class="mb-3">
                                                <label for="section3_card<?= $i ?>_heading" class="form-label">Heading:</label>
                                                <input type="text" name="section3_card<?= $i ?>_heading" id="section3_card<?= $i ?>_heading" class="form-control" value="<?= isset($case['section3_card' . $i . '_heading']) ? $case['section3_card' . $i . '_heading'] : '' ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="section3_card<?= $i ?>_description" class="form-label">Description:</label>
                                                <textarea rows="8" name="section3_card<?= $i ?>_description" id="section3_card<?= $i ?>_description" class="form-control"><?= isset($case['section3_card' . $i . '_description']) ? $case['section3_card' . $i . '_description'] : '' ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="section3_card<?= $i ?>_image" class="form-label">Image:</label>
                                                <input type="file" name="section3_card<?= $i ?>_image" id="section3_card<?= $i ?>_image" class="form-control">
                                                <?php if (isset($case['section3_card' . $i . '_image']) && !empty($case['section3_card' . $i . '_image'])): ?>
                                                    <img src="<?= base_url('uploads/casestudies/' . $case['section3_card' . $i . '_image']) ?>" alt="Card <?= $i ?> Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

                <hr class="hr2">

                <!-- Section 4 -->
                <div class="card mb-4">
                    <div class="card-header  bg-primary text-white">
                        <h3 class="card-title">Section 4</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="section4_main_content" class="form-label">Main Content:</label>
                            <textarea rows="8" name="section4_main_content" id="section4_main_content" class="form-control text-area"><?= isset($case['section4_main_content']) ? $case['section4_main_content'] : '' ?></textarea>
                        </div>

                        <div class="rowFlex">
                            <?php for ($i = 1; $i <= 4; $i++) : ?>
                                <div class="colW mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Card <?= $i ?></h5>
                                            <div class="mb-3">
                                                <label for="section4_card<?= $i ?>_heading" class="form-label">Heading:</label>
                                                <input type="text" name="section4_card<?= $i ?>_heading" id="section4_card<?= $i ?>_heading" class="form-control" value="<?= isset($case['section4_card' . $i . '_heading']) ? $case['section4_card' . $i . '_heading'] : '' ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="section4_card<?= $i ?>_description" class="form-label">Description:</label>
                                                <textarea rows="8" name="section4_card<?= $i ?>_description" id="section4_card<?= $i ?>_description" class="form-control"><?= isset($case['section4_card' . $i . '_description']) ? $case['section4_card' . $i . '_description'] : '' ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="section4_card<?= $i ?>_image" class="form-label">Image:</label>
                                                <input type="file" name="section4_card<?= $i ?>_image" id="section4_card<?= $i ?>_image" class="form-control">
                                                <?php if (isset($case['section4_card' . $i . '_image']) && !empty($case['section4_card' . $i . '_image'])): ?>
                                                    <img src="<?= base_url('uploads/casestudies/' . $case['section4_card' . $i . '_image']) ?>" alt="Card <?= $i ?> Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>


                <!-- Submit Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </section>

</div>