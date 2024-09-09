<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-edit"></i> Price & Packages</h1>
    </section>

    <section class="content">
        <div class="container">


   
            <!-- Form to update individual section -->
            <form action="<?php echo base_url('general/UpdateIndividualSection'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($section['title']) ? $section['title'] : ''; ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone_price" class="col-sm-2 control-label">Phone Price</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" id="phone_price" name="phone_price" value="<?php echo isset($section['phone_price']) ? $section['phone_price'] : ''; ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="toll_free_price" class="col-sm-2 control-label">Toll-Free Price</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" id="toll_free_price" name="toll_free_price" value="<?php echo isset($section['toll_free_price']) ? $section['toll_free_price'] : ''; ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="recording_price" class="col-sm-2 control-label">Recording Price</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" id="recording_price" name="recording_price" value="<?php echo isset($section['recording_price']) ? $section['recording_price'] : ''; ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="hold_music_price" class="col-sm-2 control-label">Hold Music Price</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" id="hold_music_price" name="hold_music_price" value="<?php echo isset($section['hold_music_price']) ? $section['hold_music_price'] : ''; ?>" required>
                    </div>
                </div>

                <!-- Hidden field for ID (assuming ID is always 1) -->
                <input type="hidden" name="id" value="1">

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100" style="margin-bottom: 30px; width:300px;border-radius:10px;">Update</button>
                </div>

            </form>
            <!-- End Form -->
           

            <!-- form update options Form -->
            <form action="<?php echo base_url('general/updatePricePackage'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                <?php foreach ($packages as $package): ?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $package['plan_type']; ?> Package</h3>
                        </div>

                        <div class="box-body">

                            <!-- Pricing -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pricing</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="pricing_<?php echo $package['id']; ?>" value="1" <?php echo ($package['pricing'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="pricing_<?php echo $package['id']; ?>" value="0" <?php echo ($package['pricing'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                            <!-- Telephone Number -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Telephone Number</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="telephone_number_<?php echo $package['id']; ?>" value="1" <?php echo ($package['telephone_number'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="telephone_number_<?php echo $package['id']; ?>" value="0" <?php echo ($package['telephone_number'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                            <!-- Unlimited Calls in the US -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Unlimited Calls in the US</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="unlimited_calls_us_<?php echo $package['id']; ?>" value="1" <?php echo ($package['unlimited_calls_us'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="unlimited_calls_us_<?php echo $package['id']; ?>" value="0" <?php echo ($package['unlimited_calls_us'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                            <!-- Voicemail to Email -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Voicemail to Email</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="voicemail_to_email_<?php echo $package['id']; ?>" value="1" <?php echo ($package['voicemail_to_email'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="voicemail_to_email_<?php echo $package['id']; ?>" value="0" <?php echo ($package['voicemail_to_email'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                            <!-- 24/7 Support -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">24/7 Support</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="support_24_7_<?php echo $package['id']; ?>" value="1" <?php echo ($package['support_24_7'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="support_24_7_<?php echo $package['id']; ?>" value="0" <?php echo ($package['support_24_7'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                            <!-- Up to 25 Users -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Up to 25 Users</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="up_to_25_users_<?php echo $package['id']; ?>" value="1" <?php echo ($package['up_to_25_users'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="up_to_25_users_<?php echo $package['id']; ?>" value="0" <?php echo ($package['up_to_25_users'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                            <!-- Internet Fax -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Internet Fax</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="internet_fax_<?php echo $package['id']; ?>" value="1" <?php echo ($package['internet_fax'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="internet_fax_<?php echo $package['id']; ?>" value="0" <?php echo ($package['internet_fax'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                            <!-- Audio Conferencing -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Audio Conferencing</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="audio_conferencing_<?php echo $package['id']; ?>" value="1" <?php echo ($package['audio_conferencing'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="audio_conferencing_<?php echo $package['id']; ?>" value="0" <?php echo ($package['audio_conferencing'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                            <!-- Softphone -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Softphone</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="softphone_<?php echo $package['id']; ?>" value="1" <?php echo ($package['softphone'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="softphone_<?php echo $package['id']; ?>" value="0" <?php echo ($package['softphone'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                            <!-- 3rd Party Integration -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">3rd Party Integration</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="third_party_integration_<?php echo $package['id']; ?>" value="1" <?php echo ($package['third_party_integration'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="third_party_integration_<?php echo $package['id']; ?>" value="0" <?php echo ($package['third_party_integration'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                            <!-- Self Care Portal -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Self Care Portal</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="self_care_portal_<?php echo $package['id']; ?>" value="1" <?php echo ($package['self_care_portal'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="self_care_portal_<?php echo $package['id']; ?>" value="0" <?php echo ($package['self_care_portal'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                            <!-- Auto Attendant -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Auto Attendant</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="auto_attendant_<?php echo $package['id']; ?>" value="1" <?php echo ($package['auto_attendant'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="auto_attendant_<?php echo $package['id']; ?>" value="0" <?php echo ($package['auto_attendant'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                            <!-- Call detail -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Call Details</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="call_detailed_record_<?php echo $package['id']; ?>" value="1" <?php echo ($package['call_detailed_record'] == true) ? 'checked' : ''; ?>> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="call_detailed_record_<?php echo $package['id']; ?>" value="0" <?php echo ($package['call_detailed_record'] == false) ? 'checked' : ''; ?>> No
                                    </label>
                                </div>
                            </div>

                        </div>

                    </div>
                <?php endforeach; ?>

                <!-- Submit Button -->
                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100" style="margin-bottom: 30px; width:300px;border-radius:10px;">Update</button>
                </div>

            </form>
            <!-- End Form -->

        </div>
    </section>
</div>