
<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-<?= $row[0]['kd_suplier']; ?>">
    <i class="fa fa-edit"></i> Edit
</button>

<div id="edit-<?= $row[0]['kd_suplier']; ?>" class="modal modal-adminpro-general modal-zoomInDown fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#" style="background-color:orange;"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <div class="modal-login-form-inner">
                    <div class="row">
                        <div class="col-lg-12">
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="all-form-element-inner">
                                                    <?= form_open(base_url('admin/suplier/edit_suplier')); ?>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-9">
                                                                    <input type="hidden" class="form-control" value="<?= $row[0]['kd_suplier'] ?>" name="kd_suplier" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-2">
                                                                    <label class="login2 pull-right pull-right-pro">Suplier</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <input type="text" class="form-control" id="suplier" name="suplier" value="<?= $row[0]['nm_suplier'] ?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-2">
                                                                    <label class="login2 pull-right pull-right-pro">Email</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <input type="email" class="form-control" id="email" name="email" value="<?= $row[0]['email'] ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-2">
                                                                    <label class="login2 pull-right pull-right-pro">Phone</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <input type="text" class="form-control input-medium bfh-phone" id="telepon" name="telepon" value="<?= $row[0]['telepon'] ?>" data-format="+1 (ddd) ddd-dddd"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-2 col-md-4 col-sm-8 col-xs-4">
                                                                    <label class="login2 pull-right pull-right-pro">Material</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-8 col-sm-4 col-xs-8">
                                                                    <div class="inline-checkbox-cs">
                                                                    <label class="checkbox-inline i-checks pull-left">
                                                                            <input type="checkbox" name="material[]" value="mtr-001" id="inlineCheckbox1" <?= (isset($row[0]['kd_material']['mtr-001']) == 'mtr-001') ? 'checked' : '' ?> > Batu bara </label>
                                                                        <label class="checkbox-inline i-checks pull-left">
                                                                            <input type="checkbox" name="material[]" value="mtr-002" id="inlineCheckbox2" <?= (isset($row[0]['kd_material']['mtr-002']) == 'mtr-002') ? 'checked' : '' ?>> Silica </label>
                                                                        <label class="checkbox-inline i-checks pull-left">
                                                                            <input type="checkbox" name="material[]" value="mtr-003" id="inlineCheckbox3" <?= (isset($row[0]['kd_material']['mtr-003']) == 'mtr-003') ? 'checked' : '' ?>> Gypsum </label><br><br>
                                                                        <label class="checkbox-inline i-checks pull-left">
                                                                            <input type="checkbox" name="material[]" value="mtr-004" id="inlineCheckbox4" <?= (isset($row[0]['kd_material']['mtr-004']) == 'mtr-004') ? 'checked' : '' ?>> Clay </label>
                                                                        <label class="checkbox-inline i-checks pull-left">
                                                                            <input type="checkbox" name="material[]" value="mtr-005" id="inlineCheckbox5" <?= (isset($row[0]['kd_material']['mtr-005']) == 'mtr-005') ? 'checked' : '' ?>> Chipping </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-2">
                                                                    <label class="login2 pull-right pull-right-pro">Alamat</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <textarea class="form-control" name="alamat" id="alamat" cols="5" rows="5"><?= $row[0]['alamat']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-7"></div>
                                                                    <div class="col-lg-5">
                                                                        <div class="login-horizental cancel-wp pull-left">
                                                                            <button class="btn btn-m btn-white" data-dismiss="modal" type="button">Batal</button>
                                                                            <button class="btn btn-m btn-warning " type="submit">Update</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?= form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Form End-->
        </div>
    </div>
</div>