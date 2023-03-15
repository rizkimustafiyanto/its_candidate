<?php
$sppd_id = '';
$lppd_id = '';
$employee_id = '';
$employee_name = '';
$bank = '';
$no_rekening = '';
$nama_rekening = '';
$tujuan_kota_id = '';
$keperluan = '';
$beban_biaya_company_id = '';
$beban_biaya_division_id = '';
$beban_biaya_lainnya_id = '';
$description = '';
$sppd_status_id = '';
$sppd_status_name = '';
$creation_datetime = '';
$creation_user_id = '';
$creation_user_name = '';
$department_name = '';
$level_name = '';
$jabatan = '';
$start_date = '';
$finish_date = '';
$amount = '';
$zone_type = '';
$beban_biaya_type = '';
$company_brand_id = '';
$regional_id = '';
$level_id = '';
$currency = '';

if (!empty($SPPDRecords)) {
    foreach ($SPPDRecords as $row) {
        $sppd_id = $row->sppd_id;
        $lppd_id = $row->lppd_id;
        $employee_id = $row->employee_id;
        $employee_name = $row->employee_name;
        $bank = $row->bank;
        $no_rekening = $row->no_rekening;
        $nama_rekening = $row->nama_rekening;
        $tujuan_kota_id = $row->tujuan_kota_id;
        $keperluan = $row->keperluan;
        $beban_biaya_company_id = $row->beban_biaya_company_id;
        $beban_biaya_division_id = $row->beban_biaya_division_id;
        $beban_biaya_lainnya_id = $row->beban_biaya_lainnya_id;
        $description = $row->description;
        $sppd_status_id = $row->sppd_status_id;
        $sppd_status_name = $row->sppd_status_name;
        $creation_datetime = $row->creation_datetime;
        $creation_user_id = $row->creation_user_id;
        $creation_user_name = $row->creation_user_name;
        $department_name = $row->department_name;
        $level_name = $row->level_name;
        $jabatan = $row->jabatan;
        $start_date = $row->start_date;
        $finish_date = $row->finish_date;
        $amount = $row->amount;
        $zone_type = $row->zone_type;
        $beban_biaya_type = $row->beban_biaya_type;
        $company_brand_id = $row->company_brand_id;
        $regional_id = $row->regional_id;
        $level_id = $row->level_id;
        $currency = $row->currency;
    }
}
?>

<div class="content-wrapper">
    <div style="height: 20px;"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row mb-1">
                        <div class="col-sm-12">
                            <strong>
                                <h3><b>Pengajuan Surat Perintah Perjalanan Dinas (SPPD)</b></h3>
                            </strong>
                        </div>
                        <div class="col-lg-12">
                            <ol class="breadcrumb float-sm-left" style="font-size: small; padding-top: 10px;">
                                <li class=" breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Pengajuan SPPD</li>
                                <li class="breadcrumb-item active">
                                    Edit
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- <?php print_r($lppd_id) ?> -->

                    <?php if ($this->session->flashdata('success2')) : ?>
                        <div class="flash-data2" data-flashdata="<?= $this->session->flashdata('success2'); ?>"></div>
                        <?= $this->session->unset_userdata('success2'); ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success3')) : ?>
                        <div class="flash-data3" data-flashdata="<?= $this->session->flashdata('success3'); ?>"></div>
                        <?= $this->session->unset_userdata('success3'); ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success4')) : ?>
                        <div class="flash-data4" data-flashdata="<?= $this->session->flashdata('success4'); ?>"></div>
                        <?= $this->session->unset_userdata('success4'); ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
                        <?= $this->session->unset_userdata('success'); ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="flash-data1" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
                        <?= $this->session->unset_userdata('error'); ?>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="col-xs-12 text-left">
                                <a href="javascript:window.history.go(-1);" class="btn btn-md btn-circle btn-primary">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-xs-12 text-right">
                                <?php if ($sppd_status_id == 'ST-001') { ?>
                                    <button type=" button" class="btn btn-md btn-primary" id="btnUpdateSPPD">
                                        <i class="fa fa-edit"></i> Update
                                    </button>
                                    <?php if (!empty($SPPDDetailRecords)) { ?>
                                        <?php if ($CountSPPDDetailRecords == 1) { ?>
                                            <button type=" button" class="btn btn-md btn-success show-loading" id="btnSubmitSPPD">
                                                <i class="fa fa-paper-plane"></i> Submit
                                            </button>
                                        <?php } else if ($CountSPPDDetailRecords > 1) { ?>
                                            <button type=" button" class="btn btn-md btn-success show-loading" id="btnGenerateSPPUM">
                                                <i class="fa fa-paper-plane"></i> Add SPPUM
                                            </button>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <button type=" button" class="btn btn-md btn-success" id="btnSubmitSPPDError">
                                            <i class="fa fa-paper-plane"></i> Submit
                                        </button>
                                    <?php } ?>
                                <?php } else if ($sppd_status_id == 'ST-009') { ?>
                                    <button type=" button" class="btn btn-md btn-success show-loading" id="btnSubmitSPPD">
                                        <i class="fa fa-paper-plane"></i> Submit
                                    </button>
                                <?php } ?>
                                <?php if ((($this->session->userdata('employee_id') == $SPPDApproverRecords) && ($sppd_status_id == 'ST-003'))) { ?>
                                    <button type="button" class="btn btn-md btn-success" id="btnAdd" data-toggle="modal" data-target="#modal-approval">
                                        <i class="fa fa-check-circle"></i> Approval
                                    </button>
                                <?php } else { ?>
                                <?php } ?>
                                <?php if ($sppd_status_id == 'ST-002' && $amount >= '2') { ?>
                                    <a id="btnSelect" class="btn btn-md btn-primary" href="<?php echo base_url() . 'LPPDDetail/' . $lppd_id . '/' .  $sppd_id . '/' . $zone_type; ?>"><i class="fa fa-eye"></i> Lihat LBPD</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Edit Pengajuan SPPD</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <input class="form-control" id="company_brand_id" name="company_brand_id" value="<?php echo $company_brand_id; ?>" hidden>
                                        <input class="form-control" id="regional_id" name="regional_id" value="<?php echo $regional_id; ?>" hidden>
                                        <input class="form-control" id="level_id" name="level_id" value="<?php echo $level_id; ?>" hidden>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="employeeid">NIK</label>
                                                <input class="form-control" id="employee_id" placeholder="NIK" name="employee_id" value="<?php echo $employee_id; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="employeename">Name</label>
                                                <input class="form-control" id="employee_name" placeholder="Name" name="employee_name" value="<?php echo $employee_name; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="sppdid">Document No</label>
                                            <input class="form-control" id="sppd_id" placeholder="SPPD Id" name="sppd_id" value="<?php echo $sppd_id; ?>" readonly="true" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="sppdstatusid">Status</label>
                                                <input class="form-control" id="sppd_status_id" placeholder="Status" name="sppd_status_id" value="<?php echo $sppd_status_name; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tanggal Diajukan</label>
                                                <input class="form-control" id="creation_datetime" placeholder="Creation Datetime" name="creation_datetime" value="<?php echo $creation_datetime; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Creator</label>
                                            <input class="form-control" id="creation_user_id" placeholder="Creator" name="creation_user_id" value="<?php echo $creation_user_name; ?>" maxlength="50" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Department</label>
                                            <input class="form-control" id="department_id" placeholder="Department Name" name="department_id" value="<?php echo $department_name; ?>" maxlength="50" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jabatan</label>
                                            <input class="form-control" id="jabatan" placeholder="Jabatan" name="jabatan" value="<?php echo $jabatan; ?>" maxlength="50" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Golongan</label>
                                            <input class="form-control" id="level_name" placeholder="Golongan" name="level_name" value="<?php echo $level_name; ?>" maxlength="50" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="amount">Lama Perjalanan</label>
                                                <input readonly type="text" class="form-control" id="amount" value="<?php echo $amount; ?>" name="amount"></input>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="startdate">Berangkat Tanggal</label>
                                                <input readonly type="text" class="form-control" id="start_date" value="<?php echo $start_date; ?>" name="start_date"></input>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="finishdate">Kembali Tanggal</label>
                                                <input readonly type="text" class="form-control" id="finish_date" value="<?php echo $finish_date; ?>" name="finish_date"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Beban Biaya</label>
                                            <?php if ($sppd_status_id == 'ST-001') { ?>
                                                <select class="form-control select2bs4" name="beban_biaya_type" id="beban_biaya_type" required>
                                                    <?php
                                                    foreach ($BebanBiayaTypeRecords as $row) {
                                                        $selected = ($row->variable_id == $beban_biaya_type) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            <?php } else { ?>
                                                <select class="form-control select2bs4" name="beban_biaya_type" id="beban_biaya_type" required disabled>
                                                    <?php
                                                    foreach ($BebanBiayaTypeRecords as $row) {
                                                        $selected = ($row->variable_id == $beban_biaya_type) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            <?php } ?>
                                        </div>
                                        <br>
                                        <?php if ($sppd_status_id == 'ST-001') { ?>
                                            <div class="col-md-4" id="bebanbiayainternal">
                                                <label>Company</label>
                                                <select class="form-control select2bs4" name="beban_biaya_company_id" id="beban_biaya_company_id">
                                                    <?php
                                                    foreach ($Company1Records as $row) {
                                                        $selected = ($row->company_id == $beban_biaya_company_id) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->company_id; ?>" <?= $selected; ?> class=""><?= $row->company_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-md-4" id="bebanbiayainternal2">
                                                <label>Division</label>
                                                <select class="form-control select2bs4" name="beban_biaya_division_id" id="beban_biaya_division_id">
                                                    <option disabled selected value="">--Select Division--</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-md-4" id="bebanbiayaeksternal">
                                                <label>Company</label>
                                                <select class="form-control select2bs4" name="beban_biaya_company_id_2" id="beban_biaya_company_id_2">
                                                    <?php
                                                    foreach ($CompanyRecords as $row) {
                                                        $selected = ($row->company_id == $beban_biaya_company_id) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->company_id; ?>" <?= $selected; ?> class=""><?= $row->company_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-md-4" id="bebanbiayaeksternal2">
                                                <label>Division</label>
                                                <select class="form-control select2bs4" name="beban_biaya_division_id_2" id="beban_biaya_division_id_2">
                                                    <option disabled selected value="">--Select Division--</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4" id="bebanbiayalainnya">
                                                <?php if ($sppd_status_id == 'ST-001') { ?>
                                                    <label>Kepada</label>
                                                    <input class="form-control" id="beban_biaya_lainnya_id" placeholder="Beban Biaya" name="beban_biaya_lainnya_id" value="<?php echo $beban_biaya_lainnya_id; ?>"></input>
                                                <?php } else { ?>
                                                    <label>Kepada</label>
                                                    <input class="form-control" id="beban_biaya_lainnya_id" placeholder="Beban Biaya" name="beban_biaya_lainnya_id" value="<?php echo $beban_biaya_lainnya_id; ?>" readonly></input>
                                                <?php } ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-md-4" id="bebanbiayainternal">
                                                <label>Company</label>
                                                <select class="form-control select2bs4" name="beban_biaya_company_id" id="beban_biaya_company_id" disabled>
                                                    <?php
                                                    foreach ($Company1Records as $row) {
                                                        $selected = ($row->company_id == $beban_biaya_company_id) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->company_id; ?>" <?= $selected; ?> class=""><?= $row->company_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-md-4" id="bebanbiayainternal2">
                                                <label>Division</label>
                                                <select class="form-control select2bs4" name="beban_biaya_division_id" id="beban_biaya_division_id" disabled>
                                                    <option disabled selected value="">--Select Division--</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-md-4" id="bebanbiayaeksternal">
                                                <label>Company</label>
                                                <select class="form-control select2bs4" name="beban_biaya_company_id_2" id="beban_biaya_company_id_2" disabled>
                                                    <?php
                                                    foreach ($CompanyRecords as $row) {
                                                        $selected = ($row->company_id == $beban_biaya_company_id) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->company_id; ?>" <?= $selected; ?> class=""><?= $row->company_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-md-4" id="bebanbiayaeksternal2">
                                                <label>Division</label>
                                                <select class="form-control select2bs4" name="beban_biaya_division_id_2" id="beban_biaya_division_id_2" disabled>
                                                    <option disabled selected value="">--Select Division--</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4" id="bebanbiayalainnya">
                                                <?php if ($sppd_status_id == 'ST-001') { ?>
                                                    <label>Kepada</label>
                                                    <input class="form-control" id="beban_biaya_lainnya_id" placeholder="Beban Biaya" name="beban_biaya_lainnya_id" value="<?php echo $beban_biaya_lainnya_id; ?>"></input>
                                                <?php } else { ?>
                                                    <label>Kepada</label>
                                                    <input class="form-control" id="beban_biaya_lainnya_id" placeholder="Beban Biaya" name="beban_biaya_lainnya_id" value="<?php echo $beban_biaya_lainnya_id; ?>" readonly></input>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Area</label>
                                            <?php if ($sppd_status_id == 'ST-001') { ?>
                                                <select class="form-control select2bs4" name="zone_type" id="zone_type" required>
                                                    <?php
                                                    foreach ($ZoneTypeRecords as $row) {
                                                        $selected = ($row->variable_id == $zone_type) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            <?php } else { ?>
                                                <select class="form-control select2bs4" name="zone_type" id="zone_type" required disabled>
                                                    <?php
                                                    foreach ($ZoneTypeRecords as $row) {
                                                        $selected = ($row->variable_id == $zone_type) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-4" id="tujuankotaprovinsi">
                                            <label>Province</label>
                                            <?php if ($sppd_status_id == 'ST-001') { ?>
                                                <select class="form-control select2bs4" name="tujuan_kota_id" id="tujuan_kota_id">
                                                    <?php
                                                    foreach ($ProvinceZoneRecords as $row) {
                                                        $selected = ($row->province_zone_id == $tujuan_kota_id) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->province_zone_id; ?>" <?= $selected; ?> class=""><?= $row->province_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            <?php } else { ?>
                                                <select class="form-control select2bs4" name="tujuan_kota_id" id="tujuan_kota_id" disabled>
                                                    <?php
                                                    foreach ($ProvinceZoneRecords as $row) {
                                                        $selected = ($row->province_zone_id == $tujuan_kota_id) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->province_zone_id; ?>" <?= $selected; ?> class=""><?= $row->province_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-4" id="tujuankotacountry">
                                            <label>Country</label>
                                            <?php if ($sppd_status_id == 'ST-001') { ?>
                                                <select class="form-control select2bs4" name="tujuan_kota_id_2" id="tujuan_kota_id_2">
                                                    <?php
                                                    foreach ($CountryZoneRecords as $row) {
                                                        $selected = ($row->country_zone_id == $tujuan_kota_id) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->country_zone_id; ?>" <?= $selected; ?> class=""><?= $row->country_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            <?php } else { ?>
                                                <select class="form-control select2bs4" name="tujuan_kota_id_2" id="tujuan_kota_id_2" disabled>
                                                    <?php
                                                    foreach ($CountryZoneRecords as $row) {
                                                        $selected = ($row->country_zone_id == $tujuan_kota_id) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->country_zone_id; ?>" <?= $selected; ?> class=""><?= $row->country_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="keperluan">Keperluan</label>
                                                <?php if ($sppd_status_id == 'ST-001') { ?>
                                                    <input type="text" class="form-control" id="keperluan" value="<?php echo $keperluan; ?>" name="keperluan"></input>
                                                <?php } else { ?>
                                                    <input readonly type="text" class="form-control" id="keperluan" value="<?php echo $keperluan; ?>" name="keperluan"></input>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="description">Keterangan</label>
                                                <?php if ($sppd_status_id == 'ST-001') { ?>
                                                    <textarea type="text" class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                                                <?php } else { ?>
                                                    <textarea readonly type="text" class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- RPD / RENCANA PERJALANAN DINAS -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Rencana Perjalanan Dinas</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <?php if ($sppd_status_id == 'ST-001') { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-sppd-detail">
                                                <i class="fa fa-plus"></i> Add RPD
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-sppd-detail" hidden>
                                                <i class="fa fa-plus"></i> Add RPD
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="sppd_detail_table" class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Acara</th>
                                                <th>Lokasi</th>
                                                <th>Uraian</th>
                                                <?php
                                                if ($sppd_status_id == 'ST-001') {
                                                ?>
                                                    <th>Action</th>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($SPPDDetailRecords)) {
                                                foreach ($SPPDDetailRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo  date('d-m-Y', strtotime($record->sppd_date_time)); ?></td>
                                                        <td><?php echo $record->acara; ?></td>
                                                        <td><?php echo $record->lokasi; ?></td>
                                                        <td><?php echo $record->uraian; ?></td>
                                                        <?php if ($sppd_status_id == 'ST-001') { ?>
                                                            <td class="text-center">
                                                                <a id="btnEditSPPDDetail" class="btn btn-xs btn-primary" data-sppddetailid="<?= $record->sppd_detail_id ?>" data-sppdid="<?= $record->sppd_id ?>" data-sppddatetime="<?= $record->sppd_date_time ?>" data-acara="<?= $record->acara ?>" data-lokasi="<?= $record->lokasi ?>" data-uraian="<?= $record->uraian ?>" data-toggle="modal" data-target="#modal-sppd-detail-update">
                                                                    <i class="fa fa-pen"></i></a>
                                                                <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteSPPDDetail/' . $record->sppd_detail_id . '/' . $record->sppd_id . '/' . $record->zone_type; ?>"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        <?php } else { ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    </tr>
                                                <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- MEMBER -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Member</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <?php if ($sppd_status_id == 'ST-001') { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-sppd-member">
                                                <i class="fa fa-plus"></i> Add Member
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-sppd-member" hidden>
                                                <i class="fa fa-plus"></i> Add Member
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table id="sppd_member_table" class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Name</th>
                                                <?php
                                                if ($sppd_status_id == 'ST-001') {
                                                ?>
                                                    <th>Action</th>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($SPPDMemberRecords)) {
                                                foreach ($SPPDMemberRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo $record->member_name; ?></td>
                                                        <?php if ($sppd_status_id == 'ST-001') { ?>
                                                            <td class="text-center">
                                                                <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteSPPDMember/' . $record->sppd_member_id . '/' . $record->sppd_id . '/' . $record->zone_type; ?>"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        <?php } else { ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    </tr>
                                                <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- RINCIAN PERJALANAN DINAS -->
                            <?php if (!empty($SPPUMRecords)) { ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>
                                            <h4 class="card-title"><b>Rincian Biaya Perjalanan Dinas</b></h4>
                                        </strong>
                                        <div class="card-tools">
                                            <?php if ($sppd_status_id == 'ST-009') { ?>
                                                <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-sppum">
                                                    <i class="fa fa-plus"></i> Add
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-sppum" hidden>
                                                    <i class="fa fa-plus"></i> Add
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <table id="sppd_regional_cost_table" class="table table-bordered  table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kategori</th>
                                                    <th>Nominal</th>
                                                    <th>Qty</th>
                                                    <th>Jumlah</th>
                                                    <?php if ($sppd_status_id == 'ST-009') { ?>
                                                        <th>Action</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if (!empty($SPPUMRecords)) {
                                                    foreach ($SPPUMRecords as $record) {
                                                ?>
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td><?php echo $record->cost_name; ?></td>
                                                            <td><?php echo number_format($record->nominal, 0, ",", "."); ?></td>
                                                            <td><?php echo $record->qty; ?></td>
                                                            <td><?php echo number_format($record->total, 0, ",", "."); ?></td>
                                                            <?php if ($sppd_status_id == 'ST-009') { ?>
                                                                <td class="text-center">
                                                                    <?php if ($record->editable == 'ETB-001') { ?>
                                                                        <a id="btnEditSPPUM" class="btn btn-xs btn-primary" data-sppumid="<?= $record->sppum_id ?>" data-sppdid="<?= $record->sppd_id ?>" data-nominal="<?= str_replace('-', '', number_format($record->nominal, 0, ",", ".")) ?>" data-qty="<?= $record->qty ?>" data-costid="<?= $record->cost_id ?>" data-costname="<?= $record->cost_name ?>" data-toggle="modal" data-target="#modal-sppum-update">
                                                                            <i class="fa fa-pen"></i></a>
                                                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteSPPUM/' . $record->sppum_id . '/' . $record->sppd_id . '/' . $record->zone_type; ?>"><i class="fa fa-trash"></i></a>
                                                                    <?php } else { ?>
                                                                        <?= 'Not Editable' ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                                </td>
                                                            <?php } ?>
                                                        </tr>
                                                    <?php
                                                }
                                                    ?>
                                            </tbody>
                                            <tfoot align="left">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Total</th>
                                                    <th><?php echo $currency . " " . number_format($SPPUMTotalRecords, 2, ",", ".") ?> </th>
                                                    <?php if ($sppd_status_id == 'ST-009') { ?>
                                                        <th></th>
                                                    <?php } ?>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <!-- RESUME RINCIAN PERJALANAN DINAS / SPPUM -->
                                <div class="card">
                                    <div class="card-header">
                                        <strong>
                                            <h4 class="card-title"><b>Resume Rincian Perjalanan Dinas / SPPUM</b></h4>
                                        </strong>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="row-sm-10">
                                                <div class="form-group">
                                                    <strong>
                                                        <h1 class="card-title"><b>Total Biaya
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = </b></h1>
                                                    </strong>
                                                </div>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="row-sm-6">
                                                <div class="form-group">
                                                    <strong>
                                                        <h1 class="card-title"><b> <?php echo $currency . " " . number_format($SPPUMTotalRecords, 2, ",", ".") ?></b></h1>
                                                    </strong>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="row-sm-10">
                                                <div class="form-group">
                                                    <strong>
                                                        <?php if ((($company_brand_id == 'BR-0004') && ($level_id == 'EL-001')) || (($company_brand_id == 'BR-0004') && ($level_id == 'EL-002')) ||
                                                            (($company_brand_id == 'BR-0004') && ($level_id == 'EL-003')) || (($company_brand_id == 'BR-0010') && ($level_id == 'EL-001')) || (($company_brand_id == 'BR-0010') && ($level_id == 'EL-002')) ||
                                                            (($company_brand_id == 'BR-0010') && ($level_id == 'EL-003'))
                                                        ) { ?>
                                                            <h1 class="card-title"><b> Uang Muka 100 % = </b></h1>
                                                        <?php } else { ?>
                                                            <h1 class="card-title"><b> Uang Muka 75 % = </b></h1>
                                                        <?php } ?>
                                                    </strong>
                                                </div>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="row-sm-6">
                                                <div class="form-group">
                                                    <strong>
                                                        <h1 class="card-title"><b> <?php echo $currency  . " " . number_format($SPPUMTotal75Records, 2, ",", ".") ?> </b></h1>
                                                    </strong>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="bank">Bank</label>
                                                    <?php if ($bank == null) { ?>
                                                        <input readonly type="text" class="form-control" id="bank" name="bank" value="<?php echo '-'; ?>"></input>
                                                    <?php } else { ?>
                                                        <input readonly type="text" class="form-control" id="bank" name="bank" value="<?php echo $bank; ?>"></input>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="no_rekening">No Rekening</label>
                                                    <?php if ($no_rekening == null) { ?>
                                                        <input readonly type="text" class="form-control" id="no_rekening" name="no_rekening" value="<?php echo '-'; ?>"></input>
                                                    <?php } else { ?>
                                                        <input readonly type="text" class="form-control" id="no_rekening" name="no_rekening" value="<?php echo $no_rekening; ?>"></input>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="nama_rekening">Nama Rekening</label>
                                                    <?php if ($nama_rekening == null) { ?>
                                                        <input readonly type="text" class="form-control" id="nama_rekening" name="nama_rekening" value="<?php echo '-'; ?>"></input>
                                                    <?php } else { ?>
                                                        <input readonly type="text" class="form-control" id="nama_rekening" name="nama_rekening" value="<?php echo $nama_rekening; ?>"></input>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- APPROVAL TABLE -->
                            <?php if (!empty($SPPDApprovalRecords)) { ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>
                                            <h4 class="card-title"><b>Approval</b></h4>
                                        </strong>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="approval_table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Line No</th>
                                                    <th>Approver</th>
                                                    <th>Comment</th>
                                                    <th>Status</th>
                                                    <th>Approval Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if (!empty($SPPDApprovalRecords)) {
                                                    foreach ($SPPDApprovalRecords as $record) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $record->line_no; ?></td>
                                                            <td>
                                                                <?php echo $record->approver_name; ?>
                                                            </td>
                                                            <?php if ($record->comment != null) { ?>
                                                                <td>
                                                                    <?php echo $record->comment; ?>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td> -</td>
                                                            <?php } ?>
                                                            <?php if ($record->status_name != null) { ?>
                                                                <td>
                                                                    <?php echo $record->status_name; ?>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td> -</td>
                                                            <?php } ?>
                                                            <?php if ($record->change_datetime != null) { ?>
                                                                <td>
                                                                    <?php echo $record->change_datetime; ?>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td> -</td>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        </tr>
                                                    <?php
                                                }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
    </section>

    <div class="modal fade" id="modal-sppd-detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Rencana Perjalanan Dinas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertSPPDDetail" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" hidden>
                                <label for="sppdid">Document No</label>
                                <input class="form-control" id="sppd_id" value="<?php echo $sppd_id; ?>" name="sppd_id" readonly>
                                <br>
                                <div class="form-group">
                                    <label for="sppddatetime">Tanggal</label>
                                    <div class="input-group date" id="datetime28" data-target-input="nearest">
                                        <input type="text" id="sppd_date_time" placeholder="SPPD Date Time" name="sppd_date_time" class="form-control datetimepicker-input" data-target="#datetime28" required />
                                        <div class="input-group-append" data-target="#datetime28" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label for="acara">Acara</label>
                                <input class="form-control" id="acara" placeholder="Acara" name="acara" required></input>
                                <br>
                                <label for="lokasi">Lokasi</label>
                                <input class="form-control" id="lokasi" placeholder="Lokasi" name="lokasi" required></input>
                                <br>
                                <label for="uraian">Penjelasan/Uraian</label>
                                <textarea class="form-control" id="uraian" placeholder="Uraian" name="uraian" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-sppd-detail-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Rencana Perjalanan Dinas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateSPPDDetail" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <input class="form-control" id="sppd_detail_id_update" name="sppd_detail_id_update" hidden>
                                <label for="sppdid">Document No</label>
                                <input class="form-control" id="sppd_id_update" value="<?php echo $sppd_id; ?>" name="sppd_id_update" readonly>
                                <br>
                                <div class="form-group">
                                    <label for="sppddatetime">Tanggal</label>
                                    <div class="input-group date" id="datetime29" data-target-input="nearest">
                                        <input type="text" id="sppd_date_time_update" placeholder="SPPD Date Time" name="sppd_date_time_update" class="form-control datetimepicker-input" data-target="#datetime29" required disabled />
                                        <div class="input-group-append" data-target="#datetime29" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label for="acara">Acara</label>
                                <input class="form-control" id="acara_update" placeholder="Acara" name="acara_update" required></input>
                                <br>
                                <label for="lokasi">Lokasi</label>
                                <input class="form-control" id="lokasi_update" placeholder="Lokasi" name="lokasi_update" required></input>
                                <br>
                                <label for="uraian">Penjelasan/Uraian</label>
                                <textarea class="form-control" id="uraian_update" placeholder="Uraian" name="uraian_update" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" name="btnSubmit" id="btnSubmit" value="Update" class="btn btn-primary" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SPPD MEMBER -->
    <div class="modal fade" id="modal-sppd-member">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input SPPD Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertSPPDMember" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <label for="sppdid">Document No</label>
                                <input class="form-control" id="sppd_id" value="<?php echo $sppd_id; ?>" name="sppd_id" readonly>
                                <br>
                                <label>Employee</label>
                                <select class="form-control select2bs4" name="member_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($EmployeeRecords as $row) : ?>
                                        <option value="<?php echo $row->employee_id; ?>"><?php echo $row->employee_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ADD SPPUM -->
    <div class="modal fade" id="modal-sppum">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Rincian Perjalanan Dinas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertSPPUM" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <input class="form-control" id="regional_id" name="regional_id" value="<?php echo $regional_id; ?>" hidden>
                                <input class="form-control" id="level_id" name="level_id" value="<?php echo $level_id; ?>" hidden>
                                <label for="sppdid">Document No</label>
                                <input class="form-control" id="sppd_id" value="<?php echo $sppd_id; ?>" name="sppd_id" readonly>
                                <br>
                                <label>Cost</label>
                                <select class="form-control select2bs4" name="cost_id" id="cost_id">
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($CostRecords as $row) : ?>
                                        <option value="<?php echo $row->cost_id; ?>"><?php echo $row->cost_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div id="nominal1">
                                    <label for="nominal">Nominal</label>
                                    <input type="text" class="form-control" id="nominal_1" placeholder="Nominal" name="nominal_1"></input>
                                </div>
                                <div id="nominal2">
                                    <label for="nominal">Nominal</label>
                                    <select class="form-control select2bs4" name="nominal_2" id="nominal_2">
                                        <option disabled selected value=""></option>
                                    </select>
                                </div>
                                <br>
                                <label for="qty">Qty</label>
                                <input type="number" class="form-control" id="qty" placeholder="Qty" name="qty" required></input>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="btn btn-primary" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- UPDATE SPPUM -->
    <div class="modal fade" id="modal-sppum-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Rincian Perjalanan Dinas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateSPPUM" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <input class="form-control" id="sppum_id_update" name="sppum_id_update" hidden>
                                <label for="sppdid">Document No</label>
                                <input class="form-control" id="sppd_id_update" value="<?php echo $sppd_id; ?>" name="sppd_id_update" readonly>
                                <br>
                                <label>Kategori</label>
                                <input class="form-control" id="cost_name_update" placeholder="Kategori" name="cost_name_update" readonly></input>
                                <br>
                                <label for="nominal">Nominal</label>
                                <input type="text" class="form-control" id="nominal_update" placeholder="Nominal" name="nominal_update" required></input>
                                <br>
                                <label for="qty">Qty</label>
                                <input type="number" class="form-control" id="qty_update" placeholder="Qty" name="qty_update" required></input>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" name="btnSubmit" id="btnSubmit" value="Update" class="btn btn-primary" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL APPROVAL -->
    <div class="modal fade" id="modal-approval">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Approval</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateSPPDApproval" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" maxlength="50" hidden>
                                <input class="form-control" id="regional_id" name="regional_id" value="<?php echo $regional_id; ?>" hidden>
                                <input class="form-control" id="level_id" name="level_id" value="<?php echo $level_id; ?>" hidden>
                                <label for="sppdid">Document No</label>
                                <input class="form-control" id="sppd_id" value="<?php echo $sppd_id; ?>" name="sppd_id" readonly>
                                <br>
                                <label for="sppdstatusid">Status *</label>
                                <select class="form-control select2bs4" name="status_id" id="status_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($SPPDApprovalStatusRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <label for="comment">Comment *</label>
                                <textarea class="form-control" id="comment" placeholder="Comment" name="comment" required>-</textarea>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" id="btnSubmit" class="btn btn-primary show-loading" value="Submit" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // UPDATE SPPD
    $(document).ready(function() {
        $("#btnUpdateSPPD").click(function() {

            var sppdid = $("#sppd_id").val();
            var employeeid = $("#employee_id").val();
            var keperluan = $("#keperluan").val();
            var description = $("#description").val();
            var zonetype = $("#zone_type").val();
            var bebanbiayatype = $("#beban_biaya_type").val();
            var sppdstatusid = 'ST-001';
            var companybrandid = $("#company_brand_id").val();
            var regionalid = $("#regional_id").val();
            var levelid = $("#level_id").val();


            if (zonetype == 'ZT-001') {
                var tujuankotaid = $("#tujuan_kota_id").val();
            } else {
                var tujuankotaid = $("#tujuan_kota_id_2").val();
            }

            if (bebanbiayatype == 'BB-001') {
                var bebanbiayacompanyid = $("#beban_biaya_company_id").val();
                var bebanbiayadivisionid = $("#beban_biaya_division_id").val();
                var bebanbiayalainnyaid = null;
            } else if (bebanbiayatype == 'BB-002') {
                var bebanbiayacompanyid = $("#beban_biaya_company_id_2").val();
                var bebanbiayadivisionid = $("#beban_biaya_division_id_2").val();
                var bebanbiayalainnyaid = null;
            } else if (bebanbiayatype == 'BB-003') {
                var bebanbiayacompanyid = null;
                var bebanbiayadivisionid = null;
                var bebanbiayalainnyaid = $("#beban_biaya_lainnya_id").val();
            }

            $.ajax({
                url: '<?php echo base_url() ?>UpdateSPPD',
                data: {
                    sppd_id: sppdid,
                    employee_id: employeeid,
                    tujuan_kota_id: tujuankotaid,
                    keperluan: keperluan,
                    beban_biaya_company_id: bebanbiayacompanyid,
                    beban_biaya_division_id: bebanbiayadivisionid,
                    beban_biaya_lainnya_id: bebanbiayalainnyaid,
                    description: description,
                    zone_type: zonetype,
                    beban_biaya_type: bebanbiayatype,
                    sppd_status_id: sppdstatusid,
                    company_brand_id: companybrandid,
                    regional_id: regionalid,
                    level_id: levelid

                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>SPPDDetail/" +
                            sppdid + "/" + zonetype;
                    } else {

                    }
                }
            })
        });
    })

    // SUBMIT SPPD 
    $(document).ready(function() {
        $("#btnSubmitSPPD").click(function() {

            var sppdid = $("#sppd_id").val();
            var employeeid = $("#employee_id").val();
            var keperluan = $("#keperluan").val();
            var description = $("#description").val();
            var zonetype = $("#zone_type").val();
            var bebanbiayatype = $("#beban_biaya_type").val();
            var sppdstatusid = 'ST-003';
            var companybrandid = $("#company_brand_id").val();
            var regionalid = $("#regional_id").val();
            var levelid = $("#level_id").val();


            if (zonetype == 'ZT-001') {
                var tujuankotaid = $("#tujuan_kota_id").val();
            } else {
                var tujuankotaid = $("#tujuan_kota_id_2").val();
            }

            if (bebanbiayatype == 'BB-001') {
                var bebanbiayacompanyid = $("#beban_biaya_company_id").val();
                var bebanbiayadivisionid = $("#beban_biaya_division_id").val();
                var bebanbiayalainnyaid = null;
            } else if (bebanbiayatype == 'BB-002') {
                var bebanbiayacompanyid = $("#beban_biaya_company_id_2").val();
                var bebanbiayadivisionid = $("#beban_biaya_division_id_2").val();
                var bebanbiayalainnyaid = null;
            } else if (bebanbiayatype == 'BB-003') {
                var bebanbiayacompanyid = null;
                var bebanbiayadivisionid = null;
                var bebanbiayalainnyaid = $("#beban_biaya_lainnya_id").val();
            }

            $.ajax({
                url: '<?php echo base_url() ?>SubmitSPPD',
                data: {
                    sppd_id: sppdid,
                    employee_id: employeeid,
                    tujuan_kota_id: tujuankotaid,
                    keperluan: keperluan,
                    beban_biaya_company_id: bebanbiayacompanyid,
                    beban_biaya_division_id: bebanbiayadivisionid,
                    beban_biaya_lainnya_id: bebanbiayalainnyaid,
                    description: description,
                    zone_type: zonetype,
                    beban_biaya_type: bebanbiayatype,
                    sppd_status_id: sppdstatusid,
                    company_brand_id: companybrandid,
                    regional_id: regionalid,
                    level_id: levelid

                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>SPPDDetail/" +
                            sppdid + "/" + zonetype;
                    } else {

                    }
                }
            })
        });
    })

    // GENERATE SPPUM
    $(document).ready(function() {
        $("#btnGenerateSPPUM").click(function() {

            var sppdid = $("#sppd_id").val();
            var employeeid = $("#employee_id").val();
            var keperluan = $("#keperluan").val();
            var description = $("#description").val();
            var zonetype = $("#zone_type").val();
            var bebanbiayatype = $("#beban_biaya_type").val();
            var sppdstatusid = 'ST-009';
            var companybrandid = $("#company_brand_id").val();
            var regionalid = $("#regional_id").val();
            var levelid = $("#level_id").val();


            if (zonetype == 'ZT-001') {
                var tujuankotaid = $("#tujuan_kota_id").val();
            } else {
                var tujuankotaid = $("#tujuan_kota_id_2").val();
            }

            if (bebanbiayatype == 'BB-001') {
                var bebanbiayacompanyid = $("#beban_biaya_company_id").val();
                var bebanbiayadivisionid = $("#beban_biaya_division_id").val();
                var bebanbiayalainnyaid = null;
            } else if (bebanbiayatype == 'BB-002') {
                var bebanbiayacompanyid = $("#beban_biaya_company_id_2").val();
                var bebanbiayadivisionid = $("#beban_biaya_division_id_2").val();
                var bebanbiayalainnyaid = null;
            } else if (bebanbiayatype == 'BB-003') {
                var bebanbiayacompanyid = null;
                var bebanbiayadivisionid = null;
                var bebanbiayalainnyaid = $("#beban_biaya_lainnya_id").val();
            }

            $.ajax({
                url: '<?php echo base_url() ?>GenerateSPPUM',
                data: {
                    sppd_id: sppdid,
                    employee_id: employeeid,
                    tujuan_kota_id: tujuankotaid,
                    keperluan: keperluan,
                    beban_biaya_company_id: bebanbiayacompanyid,
                    beban_biaya_division_id: bebanbiayadivisionid,
                    beban_biaya_lainnya_id: bebanbiayalainnyaid,
                    description: description,
                    zone_type: zonetype,
                    beban_biaya_type: bebanbiayatype,
                    sppd_status_id: sppdstatusid,
                    company_brand_id: companybrandid,
                    regional_id: regionalid,
                    level_id: levelid

                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>SPPDDetail/" +
                            sppdid + "/" + zonetype;

                    } else {

                    }
                }
            })
        });
    })
</script>

<script>
    $("#zone_type").change(function() {
        var zonetype = $("#zone_type").val();

        if (zonetype == "ZT-001") {
            $('#tujuankotaprovinsi').show();
            $('#tujuankotacountry').hide();
        } else {
            $('#tujuankotaprovinsi').hide();
            $('#tujuankotacountry').show();
        }
    });

    $("#beban_biaya_type").change(function() {
        var bebanbiayatype = $("#beban_biaya_type").val();

        if (bebanbiayatype == "BB-001") {
            $('#bebanbiayainternal').show();
            $('#bebanbiayainternal2').show();
            $('#bebanbiayaeksternal').hide();
            $('#bebanbiayaeksternal2').hide();
            $('#bebanbiayalainnya').hide();
        } else if (bebanbiayatype == "BB-002") {
            $('#bebanbiayainternal').hide();
            $('#bebanbiayainternal2').hide();
            $('#bebanbiayaeksternal').show();
            $('#bebanbiayaeksternal2').show();
            $('#bebanbiayalainnya').hide();
        } else {
            $('#bebanbiayainternal').hide();
            $('#bebanbiayainternal2').hide();
            $('#bebanbiayaeksternal').hide();
            $('#bebanbiayaeksternal2').hide();
            $('#bebanbiayalainnya').show();
        }
    });

    $("#cost_id").change(function() {
        var costid = $("#cost_id").val();
        var regionalid = $("#regional_id").val();

        if ((costid == "CS-0003" && regionalid == 'RG-0001') || (costid == "CS-000" && regionalid == 'RG-0002') || (costid == "CS-0003" && regionalid == 'RG-0003')) {
            $('#nominal1').hide();
            $('#nominal2').show();
        } else {
            $('#nominal1').show();
            $('#nominal2').hide();
        }
    });
</script>

<script>
    $(document).ready(function(e) {
        var zonetype = $("#zone_type").val();

        if (zonetype == "ZT-001") {
            $('#tujuankotaprovinsi').show();
            $('#tujuankotacountry').hide();
        } else {
            $('#tujuankotaprovinsi').hide();
            $('#tujuankotacountry').show();
        }
    });

    $(document).ready(function(e) {
        var bebanbiayatype = $("#beban_biaya_type").val();

        if (bebanbiayatype == "BB-001") {
            $('#bebanbiayainternal').show();
            $('#bebanbiayainternal2').show();
            $('#bebanbiayaeksternal').hide();
            $('#bebanbiayaeksternal2').hide();
            $('#bebanbiayalainnya').hide();
        } else if (bebanbiayatype == "BB-002") {
            $('#bebanbiayainternal').hide();
            $('#bebanbiayainternal2').hide();
            $('#bebanbiayaeksternal').show();
            $('#bebanbiayaeksternal2').show();
            $('#bebanbiayalainnya').hide();
        } else {
            $('#bebanbiayainternal').hide();
            $('#bebanbiayainternal2').hide();
            $('#bebanbiayaeksternal').hide();
            $('#bebanbiayaeksternal2').hide();
            $('#bebanbiayalainnya').show();
        }
    });

    $(document).ready(function(e) {
        var costid = $("#cost_id").val();

        if (costid == "CS-0003") {
            $('#nominal1').hide();
            $('#nominal2').show();
        } else {
            $('#nominal1').show();
            $('#nominal2').hide();
        }
    });
</script>

<script>
    //EDIT SPPD DETAIL / RINCIAN PERJALANAN DINAS
    $(document).on("click", "#btnEditSPPDDetail", function() {

        var sppd_detail_id = $(this).data("sppddetailid");
        var sppd_date_time = $(this).data("sppddatetime");
        var acara = $(this).data("acara");
        var lokasi = $(this).data("lokasi");
        var uraian = $(this).data("uraian");

        $("#sppd_detail_id_update").val(sppd_detail_id);
        $("#sppd_date_time_update").val(sppd_date_time);
        $("#acara_update").val(acara);
        $("#lokasi_update").val(lokasi);
        $("#uraian_update").val(uraian);

    });
</script>

<script>
    //EDIT SPPUM
    $(document).on("click", "#btnEditSPPUM", function() {

        var sppum_id = $(this).data("sppumid");
        var sppd_id = $(this).data("sppdid");
        var cost_id = $(this).data("costid");
        var cost_name = $(this).data("costname");
        var nominal = $(this).data("nominal");
        var qty = $(this).data("qty");
        var zone_type = $(this).data("zonetype");


        $("#sppum_id_update").val(sppum_id);
        $("#sppd_id_update").val(sppd_id);
        $("#nominal_update").val(nominal);
        $("#qty_update").val(qty);
        $("#zone_type").val(zone_type);
        $("#cost_name_update").val(cost_name);
        $("#cost_id_update").val(cost_id);
        $("#cost_id_update").val(cost_id).trigger("change");


        if (cost_id == "CS-0003") {
            document.getElementById('nominal_update').readOnly = true;
        }

    });
</script>


<script>
    $(document).ready(function() {

        $("#beban_biaya_company_id").ready(function() {
            var bebanbiayacompanyid = $("#beban_biaya_company_id").val();

            $.ajax({
                url: '../../GetDivisionByCompanyId',
                data: {
                    company_id: bebanbiayacompanyid
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    var html = '';
                    var is = '';
                    if (response != null) {
                        for (is = 0; is < response.length; is++) {
                            html += '<option value=' + response[is].division_id + '>' + response[is].division_name + '</option>';
                        }
                        $("#divDivision").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divDivision").hide();
                    }

                    $('#beban_biaya_division_id').html(html);
                    $("#beban_biaya_division_id").val('<?php echo $beban_biaya_division_id ?>').trigger("change");
                }
            })
        })

        $("#beban_biaya_company_id").change(function() {
            var bebanbiayacompanyid = $("#beban_biaya_company_id").val();

            $.ajax({
                url: '../../GetDivisionByCompanyId',
                data: {
                    company_id: bebanbiayacompanyid
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    var html = '';
                    var is = '';
                    if (response != null) {
                        for (is = 0; is < response.length; is++) {
                            html += '<option value=' + response[is].division_id + '>' + response[is].division_name + '</option>';
                        }
                        $("#divDivision").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divDivision").hide();
                    }
                    $('#beban_biaya_division_id').html(html);
                }
            })
        })

        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                currency: "IDR"
            }).format(number);
        }

        //GET NOMINAL BY COST ID
        $("#cost_id").change(function() {
            var costid = $("#cost_id").val();
            var levelid = $("#level_id").val();
            var regionalid = $("#regional_id").val();

            $.ajax({
                url: '../../GetNominalByCostLevelTujuan',
                data: {
                    cost_id: costid,
                    level_id: levelid,
                    regional_id: regionalid
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    var html = '';
                    var is = '';
                    if (response != null) {
                        for (is = 0; is < response.length; is++) {
                            html += '<option value=' + response[is].nominal + '>' + rupiah(response[is].nominal) + '</option>';
                        }
                    } else {
                        html += '<option value=""></option>';
                    }
                    $('#nominal_2').html(html);
                }
            })
        })
    });
</script>

<script>
    $(document).ready(function() {

        $("#beban_biaya_company_id_2").ready(function() {
            var bebanbiayacompanyid2 = $("#beban_biaya_company_id_2").val();

            $.ajax({
                url: '../../GetDivisionByCompanyId',
                data: {
                    company_id: bebanbiayacompanyid2
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    var html = '';
                    var is = '';
                    if (response != null) {
                        for (is = 0; is < response.length; is++) {
                            html += '<option value=' + response[is].division_id + '>' + response[is].division_name + '</option>';
                        }
                        $("#divDivision").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divDivision").hide();
                    }

                    $('#beban_biaya_division_id_2').html(html);
                    $("#beban_biaya_division_id_2").val('<?php echo $beban_biaya_division_id ?>').trigger("change");
                }
            })
        })

        $("#beban_biaya_company_id_2").change(function() {
            var bebanbiayacompanyid2 = $("#beban_biaya_company_id_2").val();

            $.ajax({
                url: '../../GetDivisionByCompanyId',
                data: {
                    company_id: bebanbiayacompanyid2
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    var html = '';
                    var is = '';
                    if (response != null) {
                        for (is = 0; is < response.length; is++) {
                            html += '<option value=' + response[is].division_id + '>' + response[is].division_name + '</option>';
                        }
                        $("#divDivision").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divDivision").hide();
                    }

                    $('#beban_biaya_division_id_2').html(html);
                }
            })
        })
    });
</script>

<script>
    $("#zone_type").change(function() {

        var sppdid = $("#sppd_id").val();
        var employeeid = $("#employee_id").val();
        var zonetype = $("#zone_type").val();
        var sppdstatusid = 'ST-001';


        if (zonetype == 'ZT-001') {
            var tujuankotaid = $("#tujuan_kota_id").val();
        } else {
            var tujuankotaid = $("#tujuan_kota_id_2").val();
        }


        $.ajax({
            url: '<?php echo base_url() ?>UpdateSPPDZone',
            data: {
                sppd_id: sppdid,
                employee_id: employeeid,
                tujuan_kota_id: tujuankotaid,
                zone_type: zonetype,
                sppd_status_id: sppdstatusid

            },
            type: 'post',
            async: true,
            dataType: 'json',
            cache: false,
            success: function(response) {

                if (response != null) {
                    window.location.href = "<?php echo base_url() ?>SPPDDetail/" +
                        sppdid + "/" + zonetype;
                } else {

                }
            }
        })
    })

    $("#tujuan_kota_id").change(function() {

        var sppdid = $("#sppd_id").val();
        var employeeid = $("#employee_id").val();
        var zonetype = $("#zone_type").val();
        var sppdstatusid = 'ST-001';


        if (zonetype == 'ZT-001') {
            var tujuankotaid = $("#tujuan_kota_id").val();
        } else {
            var tujuankotaid = $("#tujuan_kota_id_2").val();
        }


        $.ajax({
            url: '<?php echo base_url() ?>UpdateSPPDZone',
            data: {
                sppd_id: sppdid,
                employee_id: employeeid,
                tujuan_kota_id: tujuankotaid,
                zone_type: zonetype,
                sppd_status_id: sppdstatusid

            },
            type: 'post',
            async: true,
            dataType: 'json',
            cache: false,
            success: function(response) {

                if (response != null) {
                    window.location.href = "<?php echo base_url() ?>SPPDDetail/" +
                        sppdid + "/" + zonetype;
                } else {

                }
            }
        })
    })

    $("#tujuan_kota_id_2").change(function() {

        var sppdid = $("#sppd_id").val();
        var employeeid = $("#employee_id").val();
        var zonetype = $("#zone_type").val();
        var sppdstatusid = 'ST-001';


        if (zonetype == 'ZT-001') {
            var tujuankotaid = $("#tujuan_kota_id").val();
        } else {
            var tujuankotaid = $("#tujuan_kota_id_2").val();
        }


        $.ajax({
            url: '<?php echo base_url() ?>UpdateSPPDZone',
            data: {
                sppd_id: sppdid,
                employee_id: employeeid,
                tujuan_kota_id: tujuankotaid,
                zone_type: zonetype,
                sppd_status_id: sppdstatusid

            },
            type: 'post',
            async: true,
            dataType: 'json',
            cache: false,
            success: function(response) {

                if (response != null) {
                    window.location.href = "<?php echo base_url() ?>SPPDDetail/" +
                        sppdid + "/" + zonetype;
                } else {

                }
            }
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#nominal_1').mask('#.##0', {
            reverse: true
        });
    })

    $(document).ready(function() {
        $('#nominal_update').mask('#.##0', {
            reverse: true
        });
    })
</script>