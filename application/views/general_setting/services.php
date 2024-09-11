<style>
    .card {
        /* border: 1px solid gray; */
        padding: 20px;
    }

    .card img {
        /* border: 1px solid gray; */
        padding: 5px;
        /* background-color: black; */
    }

    .service-list {
        background-color: white;
    }

    .hr1 {
        border-top: .5px solid black;

        width: 500px;
    }
    .hr2 {
        border: 1px solid black;
        /* padding-top: 30px;
        padding-bottom: 30px; */
        width: 100%;
    }

    .d-flex {
        display: flex;
    }

    .flex-column {
        flex-direction: column;
    }

    .d-block {
        display: block;

    }

    .mx-auto {
        margin-inline: auto;
    }
    .justify-content-center{
        justify-content: center;
    }
    .w-100{
        width: 100%;
        border-radius: 10px;
    }
    .bg {
        background-color: black;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-edit"></i> Services</h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- Static Section -->
            <div class="col-md-12">
                <h3>Static Section</h3>
                <form action="<?= base_url('general/updateStaticSection') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="static_title" class="form-control" value="<?= isset($staticSection->title) ? $staticSection->title : '' ?>">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="static_description" class="form-control" rows="12"><?= isset($staticSection->description) ? $staticSection->description : '' ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group d-flex flex-column">
                                <label>Image</label>
                                <?php if (isset($staticSection->image)): ?>
                                    <img src="<?= base_url('uploads/services/' . $staticSection->image) ?>" alt="Image" class="img-thumbnail d-block mx-auto img-fluid">
                                <?php endif; ?>
                                <input type="file" name="image" class="form-control">

                            </div>

                        </div>
                      <div class="col-md-12">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-6">
                            <button type="submit" class="btn btn-primary w-100" style="margin-bottom: 30px;">Update Static Section</button>
                            </div>
                        </div>
                      </div>
                    </div>
                </form>
            </div>
            <!-- end static section -->

        
        
            <hr class="hr2">
            <!-- add service button -->
            <div class="text-center">
                <button class="btn btn-primary" style="margin-top:40px" data-toggle="modal" data-target="#serviceModal" onclick="openServiceModal1()">Add Services &nbsp;&nbsp;<span class="fa fa-plus"></span></button>
            </div>

            <!-- Consulting Services Section -->
            <div class="col-md-12 text-center">
                <h3>Consulting Services</h3>

                <?php foreach ($consultingServices as $service) : ?>
                    <div class="service-list">
                        <div class="card">
                            <img src="<?= base_url('uploads/services/' . $service->icon_img1); ?>" width="300" alt=""><br>
                            <img class="bg" src="<?= base_url('uploads/services/' . $service->icon_img2); ?>" width="80" alt="">
                            <h4><?= $service->title; ?></h4>
                            <p><?= $service->description; ?></p>
                            <button class="btn btn-warning fa fa-edit" onclick="openServiceModal(<?= $service->id; ?>, 'consulting')"></button>
                            <button class="btn btn-danger fa fa-trash" onclick="deleteService(<?= $service->id ?>)"></button>
                            <hr class="hr1">
                        </div>
                    <?php endforeach; ?>
                    </div>
            </div>

            <!-- Technical Services Section -->
            <div class="col-md-12 text-center">
                <h3>Technical Services</h3>
                <div class="service-list">
                    <?php foreach ($technicalServices as $service) : ?>
                        <div class="card">
                            <img src="<?= base_url('uploads/services/' . $service->icon_img1); ?>" width="300" alt=""><br>
                            <img class="bg" src="<?= base_url('uploads/services/' . $service->icon_img2); ?>" width="80" alt="">
                            <h4><?= $service->title; ?></h4>
                            <p><?= $service->description; ?></p>
                            <button class="btn btn-warning fa fa-edit" onclick="openServiceModal(<?= $service->id; ?>, 'technical')"></button>
                            <button class="btn btn-danger fa fa-trash" onclick="deleteService(<?= $service->id ?>)"></button>
                            <hr class="hr1">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Managed Services Section -->
            <div class="col-md-12 text-center">
                <h3>Managed Services</h3>
                <div class="service-list">
                    <?php foreach ($managedServices as $service) : ?>
                        <!-- <h1><?php  ?></h1> -->
                        <div class="card">
                            <img src="<?= base_url('uploads/services/' . $service->icon_img1); ?>" width="300" alt=""><br>
                            <img class="bg" src="<?= base_url('uploads/services/' . $service->icon_img2); ?>" width="80" alt="">
                            <h4><?= $service->title; ?></h4>
                            <p><?= $service->description; ?></p>
                            <button class="btn btn-warning fa fa-edit" onclick="openServiceModal(<?= $service->id; ?>, 'managed')"></button>
                            <button class="btn btn-danger fa fa-trash" onclick="deleteService(<?= $service->id ?>)"></button>
                            <hr class="hr1">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Modal for Adding/Editing Services -->
            <div id="serviceModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="updateService" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="service_id">
                            <div class="modal-header">
                                <h4 class="modal-title" id="serviceModalTitle">Add Service</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Service Type</label>
                                    <select name="service_type" id="service_type" class="form-control">
                                        <option value="consulting">Consulting</option>
                                        <option value="technical">Technical</option>
                                        <option value="managed">Managed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" id="service_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="service_description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <input type="file" name="icon_img1" id="service_icon_img1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Upload icon</label>
                                    <input type="file" name="icon_img2" id="service_icon_img2" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
    function openServiceModal1(serviceType) {
        document.getElementById('service_type').value = serviceType;
        document.getElementById('service_id').value = '';
        document.getElementById('service_title').value = '';
        document.getElementById('service_description').value = '';
        document.getElementById('service_icon_img1').value = '';
        document.getElementById('service_icon_img2').value = '';
    }

    function openServiceModal(serviceId = null, serviceType = 'consulting') {
        $('#serviceModalTitle').text(serviceId ? 'Edit Service' : 'Add Service');
        $('#service_id').val(serviceId ? serviceId : '');
        $('#service_title').val('');
        $('#service_description').val('');
        $('#service_icon_img1').val('');
        $('#service_icon_img2').val('');
        $('#service_type').val(serviceType);

        if (serviceId) {

            $.ajax({
                url: 'getService/' + serviceId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#service_title').val(data.title);
                    $('#service_description').val(data.description);
                    $('#service_type').val(data.service_type);
                },
                error: function() {
                    alert('Error fetching service details.');
                }
            });
        }
        $('#serviceModal').modal('show');
    }

    function deleteService(serviceId) {
        if (confirm('Are you sure you want to delete this service?')) {
            $.ajax({
                url: 'deleteService/' + serviceId,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Error deleting service.');
                }
            });
        }
    }
</script>