<?php
$lppd_id = '';
$sppd_id = '';
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
$lppd_status_id = '';
$lppd_status_name = '';
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
$bank_company = '';
$no_rekening_company = '';
$nama_rekening_company = '';

if (!empty($LPPDRecords)) {
    foreach ($LPPDRecords as $row) {
        $lppd_id = $row->lppd_id;
        $sppd_id = $row->sppd_id;
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
        $lppd_status_id = $row->lppd_status_id;
        $lppd_status_name = $row->lppd_status_name;
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
        $bank_company = $row->bank_company;
        $no_rekening_company = $row->no_rekening_company;
        $nama_rekening_company = $row->nama_rekening_company;
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
                                <h3><b>Laporan Biaya Perjalanan Dinas (LBPD)</b></h3>
                            </strong>
                        </div>
                        <div class="col-lg-12">
                            <ol class="breadcrumb float-sm-left" style="font-size: small; padding-top: 10px;">
                                <li class=" breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">LBPD</li>
                                <li class="breadcrumb-item active">
                                    Edit
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- <?php print_r($LPPDDetailRecords) ?> -->

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
                                <a id="btnSelect" class="btn btn-md btn-primary" href="<?php echo base_url() . 'SPPDDetail/' . $sppd_id . '/' . $zone_type; ?>"><i class="fa fa-eye"></i> Lihat SPPD</a>
                                <?php if (($lppd_status_id == 'ST-001') && ($employee_id == $this->session->userdata('employee_id'))) { ?>
                                    <?php if (!empty($LPPDDetailRecords)) { ?>
                                        <button type=" button" class="btn btn-md btn-success show-loading" id="btnSubmitLPPD">
                                            <i class="fa fa-paper-plane"></i> Submit
                                        </button>
                                    <?php } else { ?>
                                        <button type=" button" class="btn btn-md btn-success" id="btnSubmitLPPDError">
                                            <i class="fa fa-paper-plane"></i> Submit
                                        </button>
                                    <?php } ?>
                                <?php } ?>

                                <?php if (($lppd_status_id == 'ST-010') && ($employee_id == $this->session->userdata('employee_id'))) { ?>
                                    <button type=" button" class="btn btn-md btn-success show-loading" id="btnReSubmitLPPD">
                                        <i class="fa fa-paper-plane"></i> Submit
                                    </button>
                                <?php } ?>


                                <?php if ((($this->session->userdata('employee_id') == $LPPDApproverRecords) && ($lppd_status_id == 'ST-003'))) { ?>
                                    <button type="button" class="btn btn-md btn-success" id="btnAdd" data-toggle="modal" data-target="#modal-approval">
                                        <i class="fa fa-check-circle"></i> Approval
                                    </button>
                                <?php } else { ?>
                                <?php } ?>
                                <?php if ($lppd_status_id == 'ST-002') { ?>
                                    <button type="button" class="btn btn-md btn-warning" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
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
                                        <h4 class="card-title"><b>Detail LBPD</b></h4>
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
                                                <label>LBPD No</label>
                                                <input class="form-control" id="lppd_id" placeholder="LPPD No" name="lppd_id" value="<?php echo $lppd_id; ?>" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="sppdid">SPPD No</label>
                                            <input class="form-control" id="sppd_id" placeholder="SPPD Id" name="sppd_id" value="<?php echo $sppd_id; ?>" readonly="true" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="employeename">Name</label>
                                                <input class="form-control" id="employee_name" placeholder="Name" name="employee_name" value="<?php echo $employee_name; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="sppdstatusid">Status</label>
                                                <input class="form-control" id="lppd_status_id" placeholder="Status" name="lppd_status_id" value="<?php echo $lppd_status_name; ?>" maxlength="50" readonly="true" required>
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
                                                <label for="amount">Pengajuan Lama Perjalanan</label>
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
                                            <div class="form-group">
                                                <label for="description">Keterangan</label>
                                                <textarea readonly type="text" class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="keperluan">Keperluan</label>
                                                <input readonly type="text" class="form-control" id="keperluan" value="<?php echo $keperluan; ?>" name="keperluan"></input>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tanggal Pengajuan SPPD</label>
                                                <input class="form-control" id="creation_datetime" placeholder="Creation Datetime" name="creation_datetime" value="<?php echo $creation_datetime; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Beban Biaya</label>
                                            <select data-width="100%" class="form-control select2bs4" name="beban_biaya_type" id="beban_biaya_type" required disabled>
                                                <?php
                                                foreach ($BebanBiayaTypeRecords as $row) {
                                                    $selected = ($row->variable_id == $beban_biaya_type) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="col-md-4" id="bebanbiayainternal">
                                            <label>Company</label>
                                            <select data-width="100%" class="form-control select2bs4" name="beban_biaya_company_id" id="beban_biaya_company_id" disabled>
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
                                            <select data-width="100%" class="form-control select2bs4" name="beban_biaya_division_id" id="beban_biaya_division_id" disabled>
                                                <option disabled selected value="">--Select Division--</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="col-md-4" id="bebanbiayaeksternal">
                                            <label>Company</label>
                                            <select data-width="100%" class="form-control select2bs4" name="beban_biaya_company_id_2" id="beban_biaya_company_id_2" disabled>
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
                                            <select data-width="100%" class="form-control select2bs4" name="beban_biaya_division_id_2" id="beban_biaya_division_id_2" disabled>
                                                <option disabled selected value="">--Select Division--</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4" id="bebanbiayalainnya">
                                            <?php if ($lppd_status_id == 'ST-001') { ?>
                                                <label>Kepada</label>
                                                <input class="form-control" id="beban_biaya_lainnya_id" placeholder="Beban Biaya" name="beban_biaya_lainnya_id" value="<?php echo $beban_biaya_lainnya_id; ?>"></input>
                                            <?php } else { ?>
                                                <label>Kepada</label>
                                                <input class="form-control" id="beban_biaya_lainnya_id" placeholder="Beban Biaya" name="beban_biaya_lainnya_id" value="<?php echo $beban_biaya_lainnya_id; ?>" readonly></input>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Area</label>
                                            <select data-width="100%" class="form-control select2bs4" name="zone_type" id="zone_type" required disabled>
                                                <?php
                                                foreach ($ZoneTypeRecords as $row) {
                                                    $selected = ($row->variable_id == $zone_type) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4" id="tujuankotaprovinsi">
                                            <label>Province</label>
                                            <select data-width="100%" class="form-control select2bs4" name="tujuan_kota_id" id="tujuan_kota_id" disabled>
                                                <?php
                                                foreach ($ProvinceZoneRecords as $row) {
                                                    $selected = ($row->province_zone_id == $tujuan_kota_id) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->province_zone_id; ?>" <?= $selected; ?> class=""><?= $row->province_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div data-width="100%" class="col-md-4" id="tujuankotacountry">
                                            <label>Country</label>
                                            <select class="form-control select2bs4" name="tujuan_kota_id_2" id="tujuan_kota_id_2" disabled>
                                                <?php
                                                foreach ($CountryZoneRecords as $row) {
                                                    $selected = ($row->country_zone_id == $tujuan_kota_id) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->country_zone_id; ?>" <?= $selected; ?> class=""><?= $row->country_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <!-- LPPD DETAIL  -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Laporan Perjalanan Dinas</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <?php if ((($lppd_status_id == 'ST-001') && ($employee_id == $this->session->userdata('employee_id'))) || (($lppd_status_id == 'ST-010') && ($employee_id == $this->session->userdata('employee_id')))) { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-lppd-detail">
                                                <i class="fa fa-plus"></i> Add
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="lpd_table" class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Uraian</th>
                                                <th>Kesimpulan</th>
                                                <?php if ((($lppd_status_id == 'ST-001') && ($employee_id == $this->session->userdata('employee_id'))) || (($lppd_status_id == 'ST-010') && ($employee_id == $this->session->userdata('employee_id')))) { ?>
                                                    <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($LPPDDetailRecords)) {
                                                foreach ($LPPDDetailRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo  date('d-m-Y', strtotime($record->lppd_detail_date)); ?></td>
                                                        <td><?php echo $record->uraian; ?></td>
                                                        <td><?php echo $record->kesimpulan; ?></td>
                                                        <?php if (($lppd_status_id == 'ST-001' && ($employee_id == $this->session->userdata('employee_id'))) || (($lppd_status_id == 'ST-010') && ($employee_id == $this->session->userdata('employee_id')))) { ?>
                                                            <td class="text-center">
                                                                <a id="btnEditLPPDDetail" class="btn btn-xs btn-primary" data-lppddetailid="<?= $record->lppd_detail_id ?>" data-lppdid="<?= $record->lppd_id ?>" data-sppdid="<?= $record->sppd_id ?>" data-lppddetaildate="<?= $record->lppd_detail_date ?>" data-uraian="<?= $record->uraian ?>" data-kesimpulan="<?= $record->kesimpulan ?>" data-toggle="modal" data-target="#modal-lppd-detail-update">
                                                                    <i class="fa fa-pen"></i></a>
                                                                <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteLPPDDetail/' . $record->lppd_detail_id . '/' . $record->lppd_id . '/' . $record->sppd_id . '/' . $record->zone_type; ?>"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- LPPD COST  -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Laporan Biaya Perjalanan Dinas</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <?php if ((($lppd_status_id == 'ST-001') && ($employee_id == $this->session->userdata('employee_id'))) || (($lppd_status_id == 'ST-010') && ($employee_id == $this->session->userdata('employee_id')))) { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAddCost" data-toggle="modal" data-target="#modal-lppd-cost">
                                                <i class="fa fa-plus"></i> Add
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } else { ?>
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
                                                <th>Tanggal</th>
                                                <th>Attachment</th>
                                                <th>Description</th>
                                                <?php if ((($lppd_status_id == 'ST-001') && ($employee_id == $this->session->userdata('employee_id'))) || (($lppd_status_id == 'ST-010') && ($employee_id == $this->session->userdata('employee_id')))) { ?>
                                                    <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($LPPDCostRecords)) {
                                                foreach ($LPPDCostRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo $record->cost_name; ?></td>
                                                        <td><?php echo number_format($record->nominal, 0, ",", "."); ?></td>
                                                        <td><?php echo $record->qty; ?></td>
                                                        <td><?php echo number_format($record->total, 0, ",", "."); ?></td>
                                                        <?php if ($record->lppd_cost_date == null) { ?>
                                                            <td><?= '-' ?></td>
                                                        <?php } else { ?>
                                                            <td><?php echo $record->lppd_cost_date; ?></td>
                                                        <?php } ?>
                                                        <td>
                                                            <?php if ($record->lppd_cost_attachment_url == null) { ?>
                                                                <?php echo 'Generated by System' ?>
                                                            <?php } else { ?>
                                                                <a id="btnDownload" class="btn btn-xs btn-success" href="<?php echo base_url() . 'DownloadSickLeaveAttachment/' . $record->lppd_cost_attachment_url . '/' . $record->lppd_id; ?>"><i class="fa fa-download"></i></a>
                                                                <a href="<?= base_url('upload/' . $record->lppd_cost_attachment_url); ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></a>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo $record->description; ?></td>
                                                        <?php if (($lppd_status_id == 'ST-001' && ($employee_id == $this->session->userdata('employee_id'))) || (($lppd_status_id == 'ST-010') && ($employee_id == $this->session->userdata('employee_id')))) { ?>
                                                            <td class="text-center">
                                                                <?php if ($record->editable == 'ETB-001') { ?>
                                                                    <a id="btnEditLPPDCost" class="btn btn-xs btn-primary" data-lppdcostid="<?= $record->lppd_cost_id ?>" data-sppdid="<?= $record->sppd_id ?>" data-nominal="<?= str_replace('-', '', number_format($record->nominal, 0, ",", ".")) ?>" data-qty="<?= $record->qty ?>" data-costid="<?= $record->cost_id ?>" data-lppdcostdate="<?= $record->lppd_cost_date ?>" data-costname="<?= $record->cost_name ?>" data-lppdcostattachmenturl="<?= $record->lppd_cost_attachment_url ?>" data-description="<?= $record->description ?>" data-toggle="modal" data-target="#modal-lppd-cost-update">
                                                                        <i class="fa fa-pen"></i></a>
                                                                    <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteLPPDCost/' . $record->lppd_cost_id . '/' . $record->lppd_id . '/' . $record->sppd_id . '/' . $record->zone_type; ?>"><i class="fa fa-trash"></i></a>
                                                                <?php } else { ?>
                                                                    <?= 'Not Editable' ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                        </tbody>
                                        <tfoot align="left">
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Total</th>
                                                <th><?php echo $currency . " " . number_format($TotalLPPDCostRecords, 2, ",", ".") ?></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <?php if ((($lppd_status_id == 'ST-001') && ($employee_id == $this->session->userdata('employee_id'))) || (($lppd_status_id == 'ST-010') && ($employee_id == $this->session->userdata('employee_id')))) { ?>
                                                    <th></th>
                                                <?php } ?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <!-- TABLE COST REVIEW -->
                            <?php if ($lppd_status_id != 'ST-001' && $lppd_status_id != 'ST-010') { ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>
                                            <h4 class="card-title"><b>Cost Review</b></h4>
                                        </strong>
                                        <div class="card-tools">
                                            <?php if (
                                                (($ApproverHRD == $this->session->userdata('employee_id'))
                                                    && ($this->session->userdata('role_id') == '2') &&
                                                    ($lppd_status_id == 'ST-003')) ||
                                                (($ApproverHRD == $this->session->userdata('employee_id'))
                                                    && ($this->session->userdata('role_id') == '5') &&
                                                    ($lppd_status_id == 'ST-003')) ||
                                                (($ApproverFAD == $this->session->userdata('employee_id'))
                                                    && ($this->session->userdata('role_id') == '12') &&
                                                    ($lppd_status_id == 'ST-003'))
                                            ) { ?>
                                                <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-a-hrd">
                                                    <i class="fa fa-plus"></i> Add
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="a_hrd_table" class="table table-bordered  table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kategori</th>
                                                    <th>Type</th>
                                                    <th>Nominal</th>
                                                    <th>Description</th>
                                                    <th>Created By</th>
                                                    <?php if ($lppd_status_id != 'ST-002') { ?>
                                                        <th>Action</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if (!empty($LPPDAdjustmentRecords)) {
                                                    foreach ($LPPDAdjustmentRecords as $record) {
                                                ?>
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td><?php echo $record->cost_name; ?></td>
                                                            <td><?php echo $record->adjustment_type_name; ?></td>
                                                            <td><?php echo number_format($record->nominal, 0, ",", "."); ?></td>
                                                            <td><?php echo $record->description; ?></td>
                                                            <td><?php echo $record->creation_user_name; ?></td>
                                                            <?php if ($lppd_status_id != 'ST-002') { ?>
                                                                <td class="text-center">
                                                                    <?php
                                                                    if (
                                                                        (($ApproverHRD == $this->session->userdata('employee_id'))
                                                                            && ($this->session->userdata('role_id') == '2') &&
                                                                            ($lppd_status_id == 'ST-003') && ($record->creation_user_id == $this->session->userdata('employee_id'))) ||
                                                                        (($ApproverHRD == $this->session->userdata('employee_id'))
                                                                            && ($this->session->userdata('role_id') == '5') &&
                                                                            ($lppd_status_id == 'ST-003') && ($record->creation_user_id == $this->session->userdata('employee_id'))) ||
                                                                        (($ApproverFAD == $this->session->userdata('employee_id'))
                                                                            && ($this->session->userdata('role_id') == '12') &&
                                                                            ($lppd_status_id == 'ST-003') && ($record->creation_user_id == $this->session->userdata('employee_id')))
                                                                    ) { ?>
                                                                        <a id="btnEditLPPDAdjustment" class="btn btn-xs btn-primary" data-lppdadjustmentid="<?= $record->lppd_adjustment_id ?>" data-sppdid="<?= $record->sppd_id ?>" data-nominal="<?= str_replace('-', '', number_format($record->nominal, 0, ",", ".")) ?>" data-costid="<?= $record->cost_id ?>" data-costname="<?= $record->cost_name ?>" data-adjustmenttype="<?= $record->adjustment_type ?>" data-adjustmenttypename="<?= $record->adjustment_type_name ?>" data-description="<?= $record->description ?>" data-toggle="modal" data-target="#modal-lppd-adjustment-update">
                                                                            <i class="fa fa-pen"></i></a>
                                                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteLPPDAdjustment/' . $record->lppd_adjustment_id . '/' . $record->lppd_id . '/' . $record->sppd_id . '/' . $record->zone_type; ?>"><i class="fa fa-trash"></i></a>

                                                                    <?php } ?>
                                                                </td>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        </tr>
                                                    <?php } ?>
                                            </tbody>
                                            <tfoot align="left">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Total</th>
                                                    <th><?php echo $currency . " " . number_format($TotalLPPDAdjustmentRecords, 2, ",", ".") ?></th>
                                                    <th></th>
                                                    <th></th>
                                                    <?php if ($lppd_status_id != 'ST-002') { ?>
                                                        <th></th>
                                                    <?php } ?>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <!-- CARD PERHITUNGAN AKHIR -->
                                <div class="card">
                                    <div class="card-header">
                                        <strong>
                                            <h4 class="card-title"><b>Resume Biaya Perjalanan Dinas</b></h4>
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
                                                        <!-- Kondisi untuk Alat Berat -->
                                                        <?php if ((($company_brand_id == 'BR-0004') && ($level_id == 'EL-001')) || (($company_brand_id == 'BR-0004') && ($level_id == 'EL-002')) ||
                                                            (($company_brand_id == 'BR-0004') && ($level_id == 'EL-003')) || (($company_brand_id == 'BR-0010') && ($level_id == 'EL-001')) || (($company_brand_id == 'BR-0010') && ($level_id == 'EL-002')) ||
                                                            (($company_brand_id == 'BR-0010') && ($level_id == 'EL-003'))
                                                        ) { ?>
                                                            <h1 class="card-title"><b> Uang Muka 100 % = </b></h1>
                                                        <?php } else { ?>
                                                            <h1 class="card-title"><b> Uang Muka 75 % &nbsp;&nbsp; = </b></h1>
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
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="row-sm-10">
                                                <div class="form-group">
                                                    <strong>
                                                        <h1 class="card-title"><b>Pengeluaran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = </b></h1>
                                                    </strong>
                                                </div>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="row-sm-6">
                                                <div class="form-group">
                                                    <strong>
                                                        <h1 class="card-title"><b> <?php echo $currency . " " . number_format($LPPDTotalAdjustRecord, 2, ",", ".") ?></b></h1>
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
                                                        <?php if ($SPPUMTotal75Records < $LPPDTotalAdjustRecord) { ?>
                                                            <h1 class="card-title"><b>Kekurangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = </b></h1>
                                                        <?php } else { ?>
                                                            <h1 class="card-title"><b>Kelebihan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = </b></h1>
                                                        <?php } ?>
                                                    </strong>
                                                </div>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="row-sm-6">
                                                <div class="form-group">
                                                    <strong>
                                                        <h1 class="card-title"><b>
                                                                <th><?php echo $currency . " " . number_format($FinalRecord, 2, ",", ".") ?></th>
                                                            </b></h1>
                                                    </strong>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <?php if ($SPPUMTotal75Records < $LPPDTotalAdjustRecord) { ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Bank Karyawan</label>
                                                        <?php if ($bank == null) { ?>
                                                            <input readonly type="text" class="form-control" id="bank" name="bank" value="<?php echo '-'; ?>"></input>
                                                        <?php } else { ?>
                                                            <input readonly type="text" class="form-control" id="bank" name="bank" value="<?php echo $bank; ?>"></input>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>No Rekening Karyawan</label>
                                                        <?php if ($no_rekening == null) { ?>
                                                            <input readonly type="text" class="form-control" id="no_rekening" name="no_rekening" value="<?php echo '-'; ?>"></input>
                                                        <?php } else { ?>
                                                            <input readonly type="text" class="form-control" id="no_rekening" name="no_rekening" value="<?php echo $no_rekening; ?>"></input>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nama Rekening Karyawan</label>
                                                        <?php if ($nama_rekening == null) { ?>
                                                            <input readonly type="text" class="form-control" id="nama_rekening" name="nama_rekening" value="<?php echo '-'; ?>"></input>
                                                        <?php } else { ?>
                                                            <input readonly type="text" class="form-control" id="nama_rekening" name="nama_rekening" value="<?php echo $nama_rekening; ?>"></input>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Bank Company</label>
                                                        <?php if ($bank_company == null) { ?>
                                                            <input readonly type="text" class="form-control" id="bank_company" name="bank_company" value="<?php echo '-'; ?>"></input>
                                                        <?php } else { ?>
                                                            <input readonly type="text" class="form-control" id="bank_company" name="bank_company" value="<?php echo $bank_company; ?>"></input>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>No Rekening Company</label>
                                                        <?php if ($no_rekening_company == null) { ?>
                                                            <input readonly type="text" class="form-control" id="no_rekening_company" name="no_rekening_company" value="<?php echo '-'; ?>"></input>
                                                        <?php } else { ?>
                                                            <input readonly type="text" class="form-control" id="no_rekening_company" name="no_rekening_company" value="<?php echo $no_rekening_company; ?>"></input>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nama Rekening Company</label>
                                                        <?php if ($nama_rekening_company == null) { ?>
                                                            <input readonly type="text" class="form-control" id="nama_rekening_company" name="nama_rekening_company" value="<?php echo '-'; ?>"></input>
                                                        <?php } else { ?>
                                                            <input readonly type="text" class="form-control" id="nama_rekening_company" name="nama_rekening_company" value="<?php echo $nama_rekening_company; ?>"></input>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- LPPD APPROVAL -->
                            <?php if (!empty($LPPDApprovalRecords)) { ?>
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
                                                if (!empty($LPPDApprovalRecords)) {
                                                    foreach ($LPPDApprovalRecords as $record) {
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

    <!-- ADD LPPD DETAIL -->
    <div class="modal fade" id="modal-lppd-detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Laporan Perjalanan Dinas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertLPPDDetail" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" hidden>
                                <input class="form-control" id="regional_id" name="regional_id" value="<?php echo $regional_id; ?>" hidden>
                                <input class="form-control" id="level_id" name="level_id" value="<?php echo $level_id; ?>" hidden>
                                <input class="form-control" id="sppd_id" name="sppd_id" value="<?php echo $sppd_id; ?>" hidden>
                                <label for="sppdid">Document No</label>
                                <input class="form-control" id="lppd_id" value="<?php echo $lppd_id; ?>" name="lppd_id" readonly>
                                <br>
                                <div class="form-group">
                                    <label for="lppddetaildate">Tanggal</label>
                                    <div class="input-group date" id="datetime32" data-target-input="nearest">
                                        <input type="text" id="lppd_detail_date" placeholder="Date" name="lppd_detail_date" class="form-control datetimepicker-input" data-target="#datetime32" required />
                                        <div class="input-group-append" data-target="#datetime32" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label for="uraian">Uraian</label>
                                <textarea class="form-control" id="uraian" placeholder="Uraian" name="uraian"></textarea>
                                <br>
                                <label for="kesimpulan">Kesimpulan</label>
                                <textarea class="form-control" id="kesimpulan" placeholder="Kesimpulan" name="kesimpulan"></textarea>
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

    <!-- UPDATE LPPD DETAIL -->
    <div class="modal fade" id="modal-lppd-detail-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Laporan Perjalanan Dinas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateLPPDDetail" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <input class="form-control" id="sppd_id" name="sppd_id" value="<?php echo $sppd_id; ?>" hidden>
                                <input class="form-control" id="lppd_detail_id_update" name="lppd_detail_id_update" hidden>
                                <label>Document No</label>
                                <input class="form-control" id="lppd_id" value="<?php echo $lppd_id; ?>" name="lppd_id" readonly>
                                <br>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group date" id="datetime33" data-target-input="nearest">
                                        <input type="text" id="lppd_detail_date_update" placeholder="Date" name="lppd_detail_date_update" class="form-control datetimepicker-input" data-target="#datetime33" required disabled />
                                        <div class="input-group-append" data-target="#datetime33" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label>Uraian</label>
                                <textarea class="form-control" id="uraian_update" placeholder="Uraian" name="uraian_update"></textarea>
                                <br>
                                <label>Kesimpulan</label>
                                <textarea class="form-control" id="kesimpulan_update" placeholder="Kesimpulan" name="kesimpulan_update"></textarea>
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

    <!-- ADD LPPD COST -->
    <div class="modal fade" id="modal-lppd-cost">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Laporan Biaya Perjalanan Dinas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" id="formInputLPPDCost" action="<?php echo base_url() ?>InsertLPPDCost" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <input class="form-control" id="regional_id" name="regional_id" value="<?php echo $regional_id; ?>" hidden>
                                <input class="form-control" id="level_id" name="level_id" value="<?php echo $level_id; ?>" hidden>
                                <input class="form-control" id="sppd_id" name="sppd_id" value="<?php echo $sppd_id; ?>" hidden>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" hidden>
                                <label for="sppdid">Document No</label>
                                <input class="form-control" id="lppd_id" value="<?php echo $lppd_id; ?>" name="lppd_id" readonly>
                                <br>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group date" id="datetime34" data-target-input="nearest">
                                        <input type="text" id="cost_date" placeholder="Date" name="cost_date" class="form-control datetimepicker-input" data-target="#datetime34" required />
                                        <div class="input-group-append" data-target="#datetime34" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label>Kategori *</label>
                                <select class="form-control select2bs4" name="cost_id_input" id="cost_id_input" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($CostRecords as $row) : ?>
                                        <option value="<?php echo $row->cost_id; ?>"><?php echo $row->cost_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div id="nominal1">
                                    <label for="nominal">Nominal *</label>
                                    <input type="text" class="form-control" id="nominal" placeholder="Nominal" name="nominal" required></input>
                                </div>
                                <br>
                                <label for="qty">Qty *</label>
                                <input type="number" class="form-control" id="qty" placeholder="Qty" name="qty" required></input>
                                <br>
                                <label>Attachment *</label>
                                <input class="form-control" type="file" name="image" id="image" required accept=".jpeg,.jpg,.png,.pdf">
                                <small>
                                    <font color="red">Type file : jpeg/jpg/png/pdf</font>
                                </small>
                                <br>
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" placeholder="Description" name="description"></textarea>
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

    <!-- UPDATE LPPD COST -->
    <div class="modal fade" id="modal-lppd-cost-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Laporan Biaya Perjalanan Dinas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateLPPDCost" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <input class="form-control" id="sppd_id" name="sppd_id" value="<?php echo $sppd_id; ?>" hidden>
                                <input class="form-control" id="lppd_cost_id_update" name="lppd_cost_id_update" hidden>
                                <label>Document No</label>
                                <input class="form-control" id="lppd_id" value="<?php echo $lppd_id; ?>" name="lppd_id" readonly>
                                <br>
                                <label>Cost</label>
                                <select class="form-control select2bs4" name="cost_id_update" id="cost_id_update" disabled>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($CostRecords as $row) : ?>
                                        <option value="<?php echo $row->cost_id; ?>"><?php echo $row->cost_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group date" id="datetime34" data-target-input="nearest">
                                        <input type="text" id="cost_date_update" placeholder="Date" name="cost_date_update" class="form-control datetimepicker-input" data-target="#datetime34" disabled />
                                        <div class="input-group-append" data-target="#datetime34" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label for="nominal">Nominal</label>
                                <input type="text" class="form-control" id="nominal_update" placeholder="Nominal" name="nominal_update" required></input>
                                <br>
                                <label for="qty">Qty</label>
                                <input type="number" class="form-control" id="qty_update" placeholder="Qty" name="qty_update" required></input>
                                <br>
                                <label>Document</label>
                                <a id="hrefurl" href="" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></a>
                                <input class="form-control" type="file" name="image" id="image_update" accept=".jpeg,.jpg,.png,.pdf">
                                <input type="hidden" id="lppd_cost_attachment_url_update" name="lppd_cost_attachment_url_update">
                                <small>
                                    <font color="red">Type file : jpeg/jpg/png/pdf</font>
                                </small>
                                <br>
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description_update" placeholder="Description" name="description_update"></textarea>
                                <br>
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

    <!-- UPDATE LPPD ADJUSTMENT -->
    <div class="modal fade" id="modal-lppd-adjustment-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Cost Review</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateLPPDAdjustment" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <input class="form-control" id="sppd_id" name="sppd_id" value="<?php echo $sppd_id; ?>" hidden>
                                <input class="form-control" id="lppd_adjustment_id_update" name="lppd_adjustment_id_update" hidden>
                                <label>Document No</label>
                                <input class="form-control" id="lppd_id" value="<?php echo $lppd_id; ?>" name="lppd_id" readonly>
                                <br>
                                <label>Cost</label>
                                <select class="form-control select2bs4" name="cost_id_update_2" id="cost_id_update_2" disabled>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($CostLPPDRecords as $row) : ?>
                                        <option value="<?php echo $row->cost_id; ?>"><?php echo $row->cost_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Type *</label>
                                        <select class="form-control select2bs4" name="adjustment_type_update" id="adjustment_type_update" required>
                                            <?php foreach ($TypeCostReviewRecords as $row) : ?>
                                                <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nominal">Nominal</label>
                                        <input type="text" class="form-control" id="nominal_update_2" placeholder="Nominal" name="nominal_update_2" required></input>
                                    </div>
                                </div>
                                <br>
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description_update_2" placeholder="Description" name="description_update_2" required></textarea>
                                <br>
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
                <form role="form" action="<?php echo base_url() ?>UpdateLPPDApproval" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" maxlength="50" hidden>
                                <input class="form-control" id="sppd_id" name="sppd_id" value="<?php echo $sppd_id; ?>" hidden>
                                <label for="sppdid">Document No</label>
                                <input class="form-control" id="lppd_id" value="<?php echo $lppd_id; ?>" name="lppd_id" readonly>
                                <br>
                                <label for="sppdstatusid">Status *</label>
                                <select class="form-control select2bs4" name="status_id" id="status_id" required>
                                    <?php if ($ApproverLineNo1 < $ApproverLineNoKrg1) { ?>
                                        <option value="AOP-001">Approved</option>
                                        <option value="RCK-001">Re-Check</option>
                                    <?php } else { ?>
                                        <option value="AOP-001">Approved</option>
                                    <?php } ?>
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

    <!-- INPUT ADJUSTMENT HRD -->
    <div class="modal fade" id="modal-a-hrd">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Cost Review</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" id="formInputCostReview" action="<?php echo base_url() ?>InsertLPPDAdjustment" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="zone_type" name="zone_type" value="<?php echo $zone_type; ?>" hidden>
                                <input class="form-control" id="regional_id" name="regional_id" value="<?php echo $regional_id; ?>" hidden>
                                <input class="form-control" id="level_id" name="level_id" value="<?php echo $level_id; ?>" hidden>
                                <input class="form-control" id="sppd_id" name="sppd_id" value="<?php echo $sppd_id; ?>" hidden>
                                <label for="sppdid">Document No</label>
                                <input class="form-control" id="lppd_id" value="<?php echo $lppd_id; ?>" name="lppd_id" readonly>
                                <br>
                                <label>Kategori *</label>
                                <select class="form-control select2bs4" name="cost_id" id="cost_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($CostHRDRecords as $row) : ?>
                                        <option value="<?php echo $row->cost_id; ?>"><?php echo $row->cost_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Type *</label>
                                        <select class="form-control select2bs4" name="adjustment_type" id="adjustment_type" required>
                                            <?php foreach ($TypeCostReviewRecords as $row) : ?>
                                                <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nominal">Nominal *</label>
                                        <input data-width="50%" type="text" class="form-control" id="nominal_3" placeholder="Nominal" name="nominal_3" required></input>
                                    </div>
                                </div>
                                <br>
                                <label for="description">Description *</label>
                                <textarea class="form-control" id="description" placeholder="Description" name="description" required></textarea>
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
</div>

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
    //EDIT LPPD Detail
    $(document).on("click", "#btnEditLPPDDetail", function() {

        var lppd_detail_id = $(this).data("lppddetailid");
        var lppd_id = $(this).data("lppdid");
        var sppd_id = $(this).data("sppdid");
        var zone_type = $(this).data("zonetype");
        var lppd_detail_date = $(this).data("lppddetaildate");
        var uraian = $(this).data("uraian");
        var kesimpulan = $(this).data("kesimpulan");


        $("#lppd_id").val(lppd_id);
        $("#sppd_id").val(sppd_id);
        $("#zone_type").val(zone_type);
        $("#lppd_detail_id_update").val(lppd_detail_id);
        $("#lppd_detail_date_update").val(lppd_detail_date);
        $("#uraian_update").val(uraian);
        $("#kesimpulan_update").val(kesimpulan);
    });
</script>

<script>
    //EDIT LPPD Adjustment
    $(document).on("click", "#btnEditLPPDAdjustment", function() {

        var lppd_adjustment_id = $(this).data("lppdadjustmentid");
        var lppd_id = $(this).data("lppdid");
        var sppd_id = $(this).data("sppdid");
        var cost_id = $(this).data("costid");
        var cost_name = $(this).data("costname");
        var nominal = $(this).data("nominal");
        var zone_type = $(this).data("zonetype");
        var description = $(this).data("description");
        var adjustment_type = $(this).data("adjustmenttype");
        var adjustment_type_name = $(this).data("adjustmenttypename");


        $("#lppd_id").val(lppd_id);
        $("#sppd_id").val(sppd_id);
        $("#zone_type").val(zone_type);
        $("#lppd_adjustment_id_update").val(lppd_adjustment_id);
        $("#nominal_update_2").val(nominal);
        $("#description_update_2").val(description);
        $("#cost_id_update_2").val(cost_id);
        $("#cost_id_update_2").val(cost_id).trigger("change");
        $("#adjustment_type_update").val(adjustment_type);
        $("#adjustment_type_update").val(adjustment_type).trigger("change");

    });
</script>

<script>
    //EDIT LPPD Cost
    $(document).on("click", "#btnEditLPPDCost", function() {

        var lppd_cost_id = $(this).data("lppdcostid");
        var lppd_id = $(this).data("lppdid");
        var sppd_id = $(this).data("sppdid");
        var cost_id = $(this).data("costid");
        var cost_name = $(this).data("costname");
        var lppd_cost_date = $(this).data("lppdcostdate");
        var nominal = $(this).data("nominal");
        var qty = $(this).data("qty");
        var zone_type = $(this).data("zonetype");
        var lppd_cost_attachment_url = $(this).data("lppdcostattachmenturl");
        var description = $(this).data("description");

        $("#lppd_id").val(lppd_id);
        $("#sppd_id").val(sppd_id);
        $("#zone_type").val(zone_type);
        $("#lppd_cost_id_update").val(lppd_cost_id);
        $("#nominal_update").val(nominal);
        $("#qty_update").val(qty);
        $("#cost_name_update").val(cost_name);
        $("#description_update").val(description);
        $("#cost_id_update").val(cost_id);
        $("#cost_id_update").val(cost_id).trigger("change");
        $("#cost_date_update").val(lppd_cost_date);
        $("#lppd_cost_attachment_url_update").val(lppd_cost_attachment_url);
        $("#hrefurl").attr("href", '../../../upload/' + lppd_cost_attachment_url);
    });
</script>

<script>
    // SUBMIT LPPD 
    $(document).ready(function() {
        $("#btnSubmitLPPD").click(function() {

            var lppdid = $("#lppd_id").val();
            var sppdid = $("#sppd_id").val();
            var employeeid = $("#employee_id").val();
            var zonetype = $("#zone_type").val();
            var lppdstatusid = 'ST-003';
            var companybrandid = $("#company_brand_id").val();

            $.ajax({
                url: '<?php echo base_url() ?>SubmitLPPD',
                data: {
                    lppd_id: lppdid,
                    sppd_id: sppdid,
                    employee_id: employeeid,
                    zone_type: zonetype,
                    lppd_status_id: lppdstatusid,
                    company_brand_id: companybrandid

                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>LPPDDetail/" + lppdid +
                            "/" + sppdid + "/" + zonetype;
                    } else {

                    }
                }
            })
        });
    })

    // RE SUBMIT LPPD 
    $(document).ready(function() {
        $("#btnReSubmitLPPD").click(function() {

            var lppdid = $("#lppd_id").val();
            var sppdid = $("#sppd_id").val();
            var employeeid = $("#employee_id").val();
            var zonetype = $("#zone_type").val();
            var lppdstatusid = 'ST-003';
            var companybrandid = $("#company_brand_id").val();

            $.ajax({
                url: '<?php echo base_url() ?>ReSubmitLPPD',
                data: {
                    lppd_id: lppdid,
                    sppd_id: sppdid,
                    employee_id: employeeid,
                    zone_type: zonetype,
                    lppd_status_id: lppdstatusid,
                    company_brand_id: companybrandid

                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>LPPDDetail/" + lppdid +
                            "/" + sppdid + "/" + zonetype;
                    } else {

                    }
                }
            })
        });
    })
</script>

<script>
    $(document).ready(function() {

        $("#beban_biaya_company_id").ready(function() {
            var bebanbiayacompanyid = $("#beban_biaya_company_id").val();

            $.ajax({
                url: '../../../GetDivisionByCompanyId',
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

    });
</script>

<script>
    $(document).ready(function() {

        $("#beban_biaya_company_id_2").ready(function() {
            var bebanbiayacompanyid2 = $("#beban_biaya_company_id_2").val();

            $.ajax({
                url: '../../../GetDivisionByCompanyId',
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

    });
</script>


<script>
    $(document).ready(function() {
        $('#nominal').mask('#.##0', {
            reverse: true
        });
    })
</script>

<script>
    $(document).ready(function() {
        $('#nominal_3').mask('#.##0', {
            reverse: true
        });
    })

    $(document).ready(function() {
        $('#nominal_update_2').mask('#.##0', {
            reverse: true
        });
    })

    $(document).ready(function() {
        $('#nominal_update').mask('#.##0', {
            reverse: true
        });
    })

    //Untuk mencegah data ganda
    $('#formInputCostReview').one('submit', function() {
        $(this).find('input[type="submit"]').attr('disabled', 'disabled');
    });

    $('#formInputLPPDCost').one('submit', function() {
        $(this).find('input[type="submit"]').attr('disabled', 'disabled');
    });
</script>