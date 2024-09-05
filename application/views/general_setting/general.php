<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" aria-hidden="true"></i> General Setting
            <small>Control panel</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">General Settings</h3>
                    </div>
                    <form action="<?= base_url('general/update') ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="<?= isset($settings['address']) ? $settings['address'] : '' ?>"
                                    placeholder="Enter address" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= isset($settings['email']) ? $settings['email'] : '' ?>"
                                    placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="<?= isset($settings['phone']) ? $settings['phone'] : '' ?>"
                                    placeholder="Enter phone number" required>
                            </div>
                            <div class="form-group">
                                <label for="logo_image">Logo Image</label>
                                <input type="file" id="logo_image" name="logo_image">
                                <?php if (isset($settings['logo_image']) && $settings['logo_image'] != ''): ?>
                                    <img src="<?= base_url('uploads/' . $settings['logo_image']) ?>" alt="Logo" width="150" height="150">
                                <?php endif; ?>
                            </div>
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


</div>