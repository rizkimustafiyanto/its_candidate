<div class="content-wrapper">
  <div style="height: 20px;"></div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-sm card-default">
            <div class="card-header">
              <div class="row ">
                <div class="col-sm-6">
                  <h4>FORMULIR APLIKASI CALON KARYAWAN
                  </h4>
                </div>
                <div class="col-sm-6">
                </div>
              </div>
            </div>
          </div>

          <?php if ($this->session->flashdata('success')) : ?>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
            <?= $this->session->unset_userdata('success'); ?>
          <?php endif; ?>
          <?php if ($this->session->flashdata('error')) : ?>
            <div class="flash-data1" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
            <?= $this->session->unset_userdata('error'); ?>
          <?php endif; ?>

          <?php print_r($CandidateAttachmentRecords); ?>
          <br>
          <br>
          <form role="form" action="<?php echo base_url() ?>InsertCandidateHeader#1" method="post" enctype="multipart/form-data">
            <?php if ($CandidateHeaderRecords->flag_accordion_open == '1') { ?>
              <div id="1" class="card card-primary card-outline">
              <?php } else { ?>
                <div id="1" class="card card-primary card-outline collapsed-card">
                <?php } ?>
                <div class="card-header">
                  <h3 class="card-title">DATA PRIBADI</h3>
                  <div class="card-tools">
                    <input type="submit" id="btnSubmit" class="btn btn-sm btn-primary" value="Save" />
                    <?php if (
                      $CandidateHeaderRecords->candidate_family_open ==  NULL
                    ) { ?>
                      <button type="submit" class="btn btn-sm btn-warning" formaction="<?php echo base_url() . 'CandidateHeaderNext' ?>#2" formmethod="POST" enctype="multipart/form-data">Next</button>
                    <?php } ?>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" readonly hidden></input>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Untuk Penempatan PT</label>
                      <select data-width="100%" class="form-control select2bs4" name="company_id" id="company_id" disabled>
                        <option disabled selected value="">--Select--</option>
                        <?php
                        foreach ($CompanyRecords as $row) {
                          $selected = ($row->company_id == $CandidateHeaderRecords->company_id) ? 'selected' : '';
                        ?>
                          <option value="<?= $row->company_id; ?>" <?= $selected; ?> class=""><?= $row->company_name; ?></option>
                        <?php } ?>
                      </select>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Tanggal Lamaran</label>
                      <div class="input-group date" id="datetime4" data-target-input="nearest">
                        <input required type="text" id="application_date" name="application_date" value="<?php echo $CandidateHeaderRecords->application_date; ?>" class="form-control datetimepicker-input" data-target="#datetime4" disabled />
                        <div class="input-group-append" data-target="#datetime4" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Posisi Yang Dilamar</label>
                      <select data-width="100%" class="form-control select2bs4" name="position_detail_id" id="position_detail_id" disabled>
                        <option disabled selected value="">--Select--</option>
                        <?php
                        foreach ($PositionDetailRecords as $row) {
                          $selected = ($row->position_detail_id == $CandidateHeaderRecords->position_detail_id) ? 'selected' : '';
                        ?>
                          <option value="<?= $row->position_detail_id; ?>" <?= $selected; ?> class=""><?= $row->position_detail_name; ?></option>
                        <?php } ?>
                      </select>
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Nama Lengkap</label>
                      <input class="form-control" id="full_name" name="full_name" value="<?php echo $CandidateHeaderRecords->full_name; ?>" readonly>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Tempat Lahir</label>
                      <input class="form-control" id="place_of_birth" placeholder="Tempat Lahir" name="place_of_birth" value="<?php echo $CandidateHeaderRecords->place_of_birth; ?>" required>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Tanggal Lahir</label>
                      <div class="input-group date" id="datetime5" data-target-input="nearest">
                        <input required type="text" id="date_of_birth" name="date_of_birth" class="form-control datetimepicker-input" data-target="#datetime5" value="<?php echo $CandidateHeaderRecords->date_of_birth; ?>" />
                        <div class="input-group-append" data-target="#datetime5" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Agama</label>
                      <select class="form-control select2bs4" name="religion_id" required>
                        <option disabled selected value="">--Select--</option>
                        <?php
                        foreach ($ReligionRecords as $row) {
                          $selected = ($row->variable_id == $CandidateHeaderRecords->religion_id) ? 'selected' : '';
                        ?>
                          <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                        <?php } ?>
                      </select>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Kewarganegaraan</label>
                      <select class="form-control select2bs4" name="citizen_id" required>
                        <option disabled selected value="">--Select--</option>
                        <?php
                        foreach ($CitizenStatusRecords as $row) {
                          $selected = ($row->variable_id == $CandidateHeaderRecords->citizen_id) ? 'selected' : '';
                        ?>
                          <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                        <?php } ?>
                      </select>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Email</label>
                      <input class="form-control" id="email" name="email" value="<?php echo $CandidateHeaderRecords->email; ?>">
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Telepon / WA</label>
                      <input class="form-control" id="phone_no" name="phone_no" placeholder="Telepon / WA" value="<?php echo $CandidateHeaderRecords->phone_no; ?>" required type="number">
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Status Perkawinan</label>
                      <select class="form-control select2bs4" name="marital_status_id" required>
                        <option disabled selected value="">--Select--</option>
                        <?php
                        foreach ($MaritalStatusRecords as $row) {
                          $selected = ($row->variable_id == $CandidateHeaderRecords->marital_status_id) ? 'selected' : '';
                        ?>
                          <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                        <?php } ?>
                      </select>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Jenis Kelamin</label>
                      <select class="form-control select2bs4" name="gender_id" required>
                        <option disabled selected value="">--Select--</option>
                        <?php
                        foreach ($GenderRecords as $row) {
                          $selected = ($row->variable_id == $CandidateHeaderRecords->gender_id) ? 'selected' : '';
                        ?>
                          <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                        <?php } ?>
                      </select>
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Tinggi Badan</label>
                      <input class="form-control" id="heigh" placeholder="Tinggi Badan" name="heigh" type="number" value="<?php echo $CandidateHeaderRecords->heigh; ?>" required>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Berat Badan</label>
                      <input class="form-control" id="weight" placeholder="Berat Badan" name="weight" type="number" value="<?php echo $CandidateHeaderRecords->weight; ?>" required>
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>NO KTP</label>
                      <input class="form-control" id="identity_number" placeholder="Berat Badan" name="identity_number" type="number" value="<?php echo $CandidateHeaderRecords->identity_number; ?>" required>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Masa Berlaku</label>
                      <div class="input-group date" id="datetime6" data-target-input="nearest">
                        <input required type="text" id="identity_period_validity" name="identity_period_validity" placeholder="Masa Berlaku" class="form-control datetimepicker-input" data-target="#datetime6" value="<?php echo $CandidateHeaderRecords->identity_period_validity; ?>" />
                        <div class="input-group-append" data-target="#datetime6" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <div class="col-md-8">
                        <input type="checkbox" id="identity_period_validity" name="identity_period_validity" value="<?= 'Seumur Hidup' ?>">
                        <label>Seumur Hidup</label>
                      </div>
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>NO SIM</label>
                      <input class="form-control" id="driving_license_number" placeholder="Berat Badan" name="driving_license_number" value="<?php echo $CandidateHeaderRecords->driving_license_number; ?>" type="number">
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Jenis SIM</label>
                      <select class="form-control select2bs4" name="driving_license_type_id">
                        <option disabled selected value="">--Select--</option>
                        <?php
                        foreach ($DrivingLicenseTypeRecords as $row) {
                          $selected = ($row->variable_id == $CandidateHeaderRecords->driving_license_type_id) ? 'selected' : '';
                        ?>
                          <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                        <?php } ?>
                      </select>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Masa Berlaku</label>
                      <div class="input-group date" id="datetime7" data-target-input="nearest">
                        <input type="text" id="driving_license_period_validity" name="driving_license_period_validity" placeholder="Masa Berlaku" class="form-control datetimepicker-input" data-target="#datetime7" value="<?php echo $CandidateHeaderRecords->driving_license_period_validity; ?>" />
                        <div class="input-group-append" data-target="#datetime7" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>NO NPWP</label>
                      <input class="form-control" id="tax_id_number" placeholder="NO NPWP" name="tax_id_number" type="number" value="<?php echo $CandidateHeaderRecords->tax_id_number; ?>">
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Tanggal Terdaftar</label>
                      <div class="input-group date" id="datetime8" data-target-input="nearest">
                        <input type="text" id="tax_id_registered_date" name="tax_id_registered_date" placeholder="Tanggal Terdaftar" class="form-control datetimepicker-input" data-target="#datetime8" value="<?php echo $CandidateHeaderRecords->tax_id_registered_date; ?>" />
                        <div class="input-group-append" data-target="#datetime8" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Kendaraan (Jenis)</label>
                      <select class="form-control select2bs4" name="vehicle_type_id">
                        <option disabled selected value="">--Select--</option>
                        <?php
                        foreach ($VehicleTypeRecords as $row) {
                          $selected = ($row->variable_id == $CandidateHeaderRecords->vehicle_type_id) ? 'selected' : '';
                        ?>
                          <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                        <?php } ?>
                      </select>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>No Plat</label>
                      <input class="form-control" id="vehicle_police_no" placeholder="No Plat" name="vehicle_police_no" value="<?php echo $CandidateHeaderRecords->vehicle_police_no; ?>">
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Kepemilikan Kendaraan</label>
                      <select class="form-control select2bs4" name="vehicle_ownership_status_id">
                        <option disabled selected value="">--Select--</option>
                        <?php
                        foreach ($VehicleOwnershipStatusRecords as $row) {
                          $selected = ($row->variable_id == $CandidateHeaderRecords->vehicle_ownership_status_id) ? 'selected' : '';
                        ?>
                          <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                        <?php } ?>
                      </select>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Status Tempat Tinggal</label>
                      <select class="form-control select2bs4" name="status_of_residence_id" required>
                        <option disabled selected value="">--Select--</option>
                        <?php
                        foreach ($StatusofResidenceRecords as $row) {
                          $selected = ($row->variable_id == $CandidateHeaderRecords->status_of_residence_id) ? 'selected' : '';
                        ?>
                          <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                        <?php } ?>
                      </select>
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Alamat KTP (Lengkap)</label>
                      <textarea class="form-control" id="identity_residence_address" placeholder="Alamat KTP (Lengkap)" name="identity_residence_address" required><?php echo $CandidateHeaderRecords->identity_residence_address; ?></textarea>
                      <br>
                    </div>
                    <div class="col-md-4">
                      <label>Alamat Tinggal Saat Ini (Lengkap)</label>
                      <textarea class="form-control" id="current_residence_address" placeholder="Alamat Tinggal Saat Ini (Lengkap)" name="current_residence_address" required><?php echo $CandidateHeaderRecords->current_residence_address; ?></textarea>
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Foto Diri</label>
                      <input type="hidden" id="candidate_image_url" name="candidate_image_url" value="<?php echo $CandidateHeaderRecords->candidate_image_url; ?>">
                      <?php if ($CandidateHeaderRecords->candidate_image_url == null) { ?>
                        <input required class="form-control" type="file" name="image" id="image" accept=".jpeg,.jpg,.png,.pdf">
                      <?php } else { ?>
                        <input class="form-control" type="file" name="image" id="image" accept=".jpeg,.jpg,.png,.pdf">
                      <?php } ?>
                      <small>
                        <font color="red">Type file : jpeg/jpg/png/pdf, Maks : 2 MB</font>
                      </small>
                      <br>
                      <img src="<?php echo base_url(); ?>upload/<?php echo $CandidateHeaderRecords->candidate_image_url ?>" width="250" height="300" />
                      <br>
                    </div>
                  </div>
                </div>
                </div>
          </form>

          <!-- DIV KE 2 / SUSUNAN KELUARGA -->
          <?php if ($CandidateHeaderRecords->flag_accordion_open == '2') { ?>
            <div id="2" class="card card-primary card-outline">
            <?php } else { ?>
              <div id="2" class="card card-primary card-outline collapsed-card">
              <?php } ?>
              <div class="card-header">
                <h3 class="card-title">SUSUNAN KELUARGA</h3>
                <div class="card-tools">
                  <?php if (
                    $CandidateHeaderRecords->flag_accordion_open == '2' ||
                    $CandidateHeaderRecords->candidate_family_open ==  'Y'
                  ) { ?>
                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-add-candidate-family">
                      Add
                    </button>
                    <?php if (
                      $CandidateHeaderRecords->candidate_education_history_open ==  NULL && (!empty($CandidateFamilyRecords))
                    ) { ?>
                      <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateFamilyNext' ?>#3">
                        Next
                      </a>
                    <?php } else if ((empty($CandidateFamilyRecords))) { ?>
                      <button type="button" class="btn btn-sm btn-success" id="btnCandidateFamilyError"> Next
                      </button>
                    <?php } ?>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-plus"></i>
                    </button>
                  <?php } ?>
                </div>
              </div>
              <div class="card-body">
                <table id="candidate_family_table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Hubungan Keluarga</th>
                      <th>Nama</th>
                      <th>JK</th>
                      <th>Usia</th>
                      <th>Pendidikan Terakhir</th>
                      <th>Pekerjaan</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    if (!empty($CandidateFamilyRecords)) {
                      foreach ($CandidateFamilyRecords as $record) {
                    ?>
                        <tr>
                          <td><?= $i++; ?></td>
                          <td><?php echo $record->family_realitionship_name ?></td>
                          <td><?php echo $record->name ?></td>
                          <td><?php echo $record->gender_name ?></td>
                          <td><?php echo $record->age ?></td>
                          <td><?php echo $record->last_education_name ?></td>
                          <td><?php echo $record->profession_name ?></td>
                          <td><?php echo $record->description ?></td>
                          <td class="text-center">
                            <a id="btnEditCandidateFamily" class="btn btn-xs btn-primary" data-candidatefamilyid="<?= $record->candidate_family_id ?>" data-requestcandidateid="<?= $record->request_candidate_id ?>" data-familyrealitionshipid="<?= $record->family_realitionship_id ?>" data-name="<?= $record->name ?>" data-genderid="<?= $record->gender_id ?>" data-age="<?= $record->age ?>" data-lasteducationid="<?= $record->last_education_id ?>" data-professionname="<?= $record->profession_name ?>" data-description="<?= $record->description ?>" data-toggle="modal" data-target="#modal-update-candidate-family"><i class="fa fa-pen"></i></a>
                            <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCandidateFamily/' . $record->candidate_family_id; ?>#2"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              </div>

              <!-- DIV KE 3 / RIWAYAT PENDIDIKAN FORMAL & INFORMAL -->
              <?php if ($CandidateHeaderRecords->flag_accordion_open == '3') { ?>
                <div id="3" class="card card-primary card-outline">
                <?php } else { ?>
                  <div id="3" class="card card-primary card-outline collapsed-card">
                  <?php } ?>
                  <div class="card-header">
                    <h3 class="card-title">RIWAYAT PENDIDIKAN FORMAL & INFORMAL</h3>
                    <div class="card-tools">
                      <?php if (
                        $CandidateHeaderRecords->flag_accordion_open == '3' ||
                        $CandidateHeaderRecords->candidate_education_history_open ==  'Y'
                      ) { ?>
                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-add-candidate-education-history">
                          Add
                        </button>
                        <?php if (
                          $CandidateHeaderRecords->candidate_courses_open ==  NULL
                          && (!empty($CandidateEducationHistoryRecords))
                        ) { ?>
                          <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateEducationHistoryNext' ?>#4">
                            Next
                          </a>
                        <?php } else if ((empty($CandidateEducationHistoryRecords))) { ?>
                          <button type="button" class="btn btn-sm btn-success" id="btnCandidateEducationHistoryError"> Next
                          </button>
                        <?php } ?>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-plus"></i>
                        </button>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="card-body">
                    <table id="candidate_education_history_table" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tingkat</th>
                          <th>Dari Tahun</th>
                          <th>Sampai</th>
                          <th>Nama Sekolah</th>
                          <th>Kota</th>
                          <th>Jurusan</th>
                          <th>Berijazah / Tidak</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        if (!empty($CandidateEducationHistoryRecords)) {
                          foreach ($CandidateEducationHistoryRecords as $record) {
                        ?>
                            <tr>
                              <td><?= $i++; ?></td>
                              <td><?php echo $record->education_level_name ?></td>
                              <td><?php echo $record->from_year ?></td>
                              <td><?php echo $record->to_year ?></td>
                              <td><?php echo $record->school_name ?></td>
                              <td><?php echo $record->school_place ?></td>
                              <td><?php echo $record->school_majors ?></td>
                              <td><?php echo $record->school_certified_status_name ?></td>
                              <td class="text-center">
                                <a id="btnEditCandidateEducationHistory" class="btn btn-xs btn-primary" data-candidateeducationhistoryid="<?= $record->candidate_education_history_id ?>" data-requestcandidateid="<?= $record->request_candidate_id ?>" data-educationlevelid="<?= $record->education_level_id ?>" data-fromyear="<?= $record->from_year ?>" data-toyear="<?= $record->to_year ?>" data-schoolname="<?= $record->school_name ?>" data-schoolplace="<?= $record->school_place ?>" data-schoolmajors="<?= $record->school_majors ?>" data-schoolcertifiedstatus="<?= $record->school_certified_status ?>" data-toggle="modal" data-target="#modal-update-candidate-education-history"><i class="fa fa-pen"></i></a>
                                <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCandidateEducationHistory/' . $record->candidate_education_history_id; ?>#3"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                        <?php
                          }
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  </div>

                  <!-- DIV KE 4 / TRAINING -->
                  <?php if ($CandidateHeaderRecords->flag_accordion_open == '4') { ?>
                    <div id="4" class="card card-primary card-outline">
                    <?php } else { ?>
                      <div id="4" class="card card-primary card-outline collapsed-card">
                      <?php } ?>
                      <div class="card-header">
                        <h3 class="card-title">KURSUS / TRAINING</h3>
                        <div class="card-tools">
                          <?php if (
                            $CandidateHeaderRecords->flag_accordion_open == '4' ||
                            $CandidateHeaderRecords->candidate_courses_open ==  'Y'
                          ) { ?>
                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-add-candidate-courses">
                              Add
                            </button>
                            <?php if (
                              $CandidateHeaderRecords->candidate_job_history_open ==  NULL
                            ) { ?>
                              <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateCoursesNext' ?>#5">
                                Next
                              </a>
                            <?php } ?>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="card-body">
                        <table id="candidate_courses_table" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Lama</th>
                              <th>Tahun</th>
                              <th>Bidang / Jenis</th>
                              <th>Penyelenggara</th>
                              <th>Tempat / Kota</th>
                              <th>Dibiayai Oleh</th>
                              <th>Bersetifikat / Tdak</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i = 1;
                            if (!empty($CandidateCoursesRecords)) {
                              foreach ($CandidateCoursesRecords as $record) {
                            ?>
                                <tr>
                                  <td><?= $i++; ?></td>
                                  <td><?php echo $record->courses_old ?></td>
                                  <td><?php echo $record->courses_year ?></td>
                                  <td><?php echo $record->courses_type ?></td>
                                  <td><?php echo $record->courses_organizer ?></td>
                                  <td><?php echo $record->courses_place ?></td>
                                  <td><?php echo $record->courses_funded_by ?></td>
                                  <td><?php echo $record->courses_certified_status_name ?></td>
                                  <td class="text-center">
                                    <a id="btnEditCandidateCourses" class="btn btn-xs btn-primary" data-candidatecoursesid="<?= $record->candidate_courses_id ?>" data-requestcandidateid="<?= $record->request_candidate_id ?>" data-coursesold="<?= $record->courses_old ?>" data-coursesyear="<?= $record->courses_year ?>" data-coursestype="<?= $record->courses_type ?>" data-coursesorganizer="<?= $record->courses_organizer ?>" data-coursesplace="<?= $record->courses_place ?>" data-coursesfundedby="<?= $record->courses_funded_by ?>" data-coursescertifiedstatus="<?= $record->courses_certified_status ?>" data-toggle="modal" data-target="#modal-update-candidate-courses"><i class="fa fa-pen"></i></a>
                                    <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCandidateCourses/' . $record->candidate_courses_id; ?>#4"><i class="fa fa-trash"></i></a>
                                  </td>
                                </tr>
                            <?php
                              }
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                      </div>


                      <!-- DIV KE 5 / RIWAYAT PEKERJAAN -->
                      <?php if ($CandidateHeaderRecords->flag_accordion_open == '5') { ?>
                        <div id="5" class="card card-primary card-outline">
                        <?php } else { ?>
                          <div id="5" class="card card-primary card-outline collapsed-card">
                          <?php } ?>
                          <div class="card-header">
                            <h3 class="card-title">RIWAYAT PEKERJAAN</h3>
                            <div class="card-tools">
                              <?php if (
                                $CandidateHeaderRecords->flag_accordion_open == '5' ||
                                $CandidateHeaderRecords->candidate_job_history_open ==  'Y'
                              ) { ?>
                                <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-add-candidate-job-history">
                                  Add
                                </button>
                                <?php if (
                                  $CandidateHeaderRecords->candidate_company_structure_open ==  NULL
                                ) { ?>
                                  <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateJobHistoryNext' ?>#6">
                                    Next
                                  </a>
                                <?php } ?>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-plus"></i>
                                </button>
                              <?php } ?>
                            </div>
                          </div>
                          <div class="card-body">
                            <table id="candidate_job_history_table" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Perusahaan</th>
                                  <th>Telp. Perusahaan</th>
                                  <th>Mulai Kerja</th>
                                  <th>Sampai</th>
                                  <th>Jabatan</th>
                                  <th>Nama Atasan</th>
                                  <th>Jabatan Atasan</th>
                                  <th>Alasan Pindah / Keluar</th>
                                  <th>Gaji Terakhir</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i = 1;
                                if (!empty($CandidateJobHistoryRecords)) {
                                  foreach ($CandidateJobHistoryRecords as $record) {
                                ?>
                                    <tr>
                                      <td><?= $i++; ?></td>
                                      <td><?php echo $record->company_name ?></td>
                                      <td><?php echo $record->company_phone ?></td>
                                      <td><?php echo $record->working_from ?></td>
                                      <td><?php echo $record->working_to ?></td>
                                      <td><?php echo $record->working_position ?></td>
                                      <td><?php echo $record->direct_leader_name ?></td>
                                      <td><?php echo $record->direct_leader_position ?></td>
                                      <td><?php echo $record->reason_to_leave_work ?></td>
                                      <td><?php echo number_format($record->last_salary, 0, ",", "."); ?></td>
                                      <td class="text-center">
                                        <a id="btnEditCandidateJobHistory" class="btn btn-xs btn-primary" data-candidatejobhistoryid="<?= $record->candidate_job_history_id ?>" data-requestcandidateid="<?= $record->request_candidate_id ?>" data-companyname="<?= $record->company_name ?>" data-companyphone="<?= $record->company_phone ?>" data-workingfrom="<?= $record->working_from ?>" data-workingto="<?= $record->working_to ?>" data-workingposition="<?= $record->working_position ?>" data-directleadername="<?= $record->direct_leader_name ?>" data-directleaderposition="<?= $record->direct_leader_position ?>" data-reasontoleavework="<?= $record->reason_to_leave_work ?>" data-lastsalary="<?= str_replace('-', '', number_format($record->last_salary, 0, ",", ".")) ?>" data-toggle="modal" data-target="#modal-update-candidate-job-history"><i class="fa fa-pen"></i></a>
                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCandidateJobHistory/' . $record->candidate_job_history_id; ?>#5"><i class="fa fa-trash"></i></a>
                                      </td>
                                    </tr>
                                <?php
                                  }
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>
                          </div>

                          <!-- DIV KE 6 / GAMBARKAN STRUKTUR PERUSAHAAN -->
                          <?php if ($CandidateHeaderRecords->flag_accordion_open == '6') { ?>
                            <div id="6" class="card card-primary card-outline">
                            <?php } else { ?>
                              <div id="6" class="card card-primary card-outline collapsed-card">
                              <?php } ?>
                              <div class="card-header">
                                <h3 class="card-title">GAMBARKAN STRUKTUR PERUSAHAAN</h3>
                                <div class="card-tools">
                                  <?php if (
                                    $CandidateHeaderRecords->flag_accordion_open == '6' ||
                                    $CandidateHeaderRecords->candidate_company_structure_open ==  'Y'
                                  ) { ?>
                                    <?php if ($CandidateCompanyStructureRecords !=  NULL) { ?>
                                      <a class="btn btn-sm btn-danger tombol-hapus" id="btnAdd" href="<?php echo base_url() . 'DeleteCandidateCompanyStructure/' . $CandidateCompanyStructureRecords->candidate_company_structure_id . "/" . $CandidateCompanyStructureRecords->structure_image_url; ?>#6">
                                        Delete
                                      </a>
                                    <?php } ?>
                                    <?php if (
                                      $CandidateHeaderRecords->candidate_reference_open ==  NULL
                                    ) { ?>
                                      <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateCompanyStructureNext' ?>#7">
                                        Next
                                      </a>
                                    <?php } ?>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                      <i class="fas fa-plus"></i>
                                    </button>
                                  <?php } ?>
                                </div>
                              </div>
                              <div class="card-body">
                                <h6 class="card-title"><i>(Posisi Anda Terakhir Bekerja)</i></h6>
                                <br>
                                <p>
                                  <font color="grey">Ukuran gambar : Max 2 MB </font>
                                  <br>
                                  <font color="grey">Format : JPG, JPEG, PNG, BMP </font>
                                </p>
                                <br>
                                <?php if ($CandidateCompanyStructureRecords ==  NULL) { ?>
                                  <form role="form" action="<?php echo base_url() ?>InsertCandidateCompanyStructure#6" enctype="multipart/form-data" method="post">
                                    <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                    <div class="col-md-3">
                                      <input class="form-control" type="file" name="image" id="image" accept=".jpeg,.jpg,.png,.pdf" required>
                                      <br>
                                      <input type="submit" id="btnSubmit" class="btn btn-primary" value="Upload Foto" />
                                    </div>
                                  </form>
                                <?php } else { ?>
                                  <img src="<?php echo base_url(); ?>upload/<?php echo $CandidateCompanyStructureRecords->structure_image_url ?>" width="400" height="300" />
                                <?php } ?>
                              </div>
                              </div>

                              <!-- DIV KE 7 / REFERENSI -->
                              <?php if ($CandidateHeaderRecords->flag_accordion_open == '7') { ?>
                                <div id="7" class="card card-primary card-outline">
                                <?php } else { ?>
                                  <div id="7" class="card card-primary card-outline collapsed-card">
                                  <?php } ?>
                                  <div class="card-header">
                                    <h3 class="card-title">REFERENSI</h3>
                                    <div class="card-tools">
                                      <?php if (
                                        $CandidateHeaderRecords->flag_accordion_open == '7' ||
                                        $CandidateHeaderRecords->candidate_reference_open ==  'Y'
                                      ) { ?>
                                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-add-candidate-reference">
                                          </i> Add
                                        </button>
                                        <?php if (
                                          $CandidateHeaderRecords->candidate_emergency_contact_open ==  NULL
                                        ) { ?>
                                          <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateReferenceNext' ?>#8">
                                            Next
                                          </a>
                                        <?php } ?>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                          <i class="fas fa-plus"></i>
                                        </button>
                                      <?php } ?>
                                    </div>
                                  </div>
                                  <div class="card-body">
                                    <table id="candidate_reference_table" class="table table-bordered table-striped">
                                      <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Nama</th>
                                          <th>Posisi / Jabatan</th>
                                          <th>Nama Perusahaan</th>
                                          <th>Hubungan</th>
                                          <th>Alamat</th>
                                          <th>Telepon</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        $i = 1;
                                        if (!empty($CandidateReferenceRecords)) {
                                          foreach ($CandidateReferenceRecords as $record) {
                                        ?>
                                            <tr>
                                              <td><?= $i++; ?></td>
                                              <td><?php echo $record->referee_name ?></td>
                                              <td><?php echo $record->referee_position ?></td>
                                              <td><?php echo $record->company_name ?></td>
                                              <td><?php echo $record->referee_relationship ?></td>
                                              <td><?php echo $record->referee_address ?></td>
                                              <td><?php echo $record->referee_phone_no ?></td>
                                              <td class="text-center">
                                                <a id="btnEditCandidateReference" class="btn btn-xs btn-primary" data-candidatereferenceid="<?= $record->candidate_reference_id ?>" data-requestcandidateid="<?= $record->request_candidate_id ?>" data-refereename="<?= $record->referee_name ?>" data-refereeposition="<?= $record->referee_position ?>" data-companynameref="<?= $record->company_name ?>" data-refereerelationship="<?= $record->referee_relationship ?>" data-refereeaddress="<?= $record->referee_address ?>" data-refereephoneno="<?= $record->referee_phone_no ?>" data-toggle="modal" data-target="#modal-update-candidate-reference"><i class="fa fa-pen"></i></a>
                                                <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCandidateReference/' . $record->candidate_reference_id; ?>#7"><i class="fa fa-trash"></i></a>
                                              </td>
                                            </tr>
                                        <?php
                                          }
                                        }
                                        ?>
                                      </tbody>
                                    </table>
                                  </div>
                                  </div>


                                  <!-- DIV KE 8 / KONTAK DARURAT -->
                                  <?php if ($CandidateHeaderRecords->flag_accordion_open == '8') { ?>
                                    <div id="8" class="card card-primary card-outline">
                                    <?php } else { ?>
                                      <div id="8" class="card card-primary card-outline collapsed-card">
                                      <?php } ?>
                                      <div class="card-header">
                                        <h3 class="card-title">KONTAK DARURAT</h3>
                                        <div class="card-tools">
                                          <?php if (
                                            $CandidateHeaderRecords->flag_accordion_open == '8' ||
                                            $CandidateHeaderRecords->candidate_emergency_contact_open ==  'Y'
                                          ) { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-add-candidate-emergency-contact">
                                              Add
                                            </button>
                                            <?php if (
                                              $CandidateHeaderRecords->candidate_social_activity_open ==  NULL
                                            ) { ?>
                                              <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateEmergencyContactNext' ?>#9">
                                                Next
                                              </a>
                                            <?php } ?>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                              <i class="fas fa-plus"></i>
                                            </button>
                                          <?php } ?>
                                        </div>
                                      </div>
                                      <div class="card-body">
                                        <table id="candidate_emergency_contact_table" class="table table-bordered table-striped">
                                          <thead>
                                            <tr>
                                              <th>No</th>
                                              <th>Nama</th>
                                              <th>Hubungan</th>
                                              <th>Alamat</th>
                                              <th>Telepon</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($CandidateEmergencyContactRecords)) {
                                              foreach ($CandidateEmergencyContactRecords as $record) {
                                            ?>
                                                <tr>
                                                  <td><?= $i++; ?></td>
                                                  <td><?php echo $record->emergency_contact_name ?></td>
                                                  <td><?php echo $record->emergency_contact_relationship ?></td>
                                                  <td><?php echo $record->emergency_contact_address ?></td>
                                                  <td><?php echo $record->emergency_contact_phone_no ?></td>
                                                  <td class="text-center">
                                                    <a id="btnEditCandidateEmergencyContact" class="btn btn-xs btn-primary" data-candidateemergencycontactid="<?= $record->candidate_emergency_contact_id ?>" data-requestcandidateid="<?= $record->request_candidate_id ?>" data-emergencycontactname="<?= $record->emergency_contact_name ?>" data-emergencycontactrelationship="<?= $record->emergency_contact_relationship ?>" data-emergencycontactaddress="<?= $record->emergency_contact_address ?>" data-emergencycontactphoneno="<?= $record->emergency_contact_phone_no ?>" data-toggle="modal" data-target="#modal-update-candidate-emergency-contact"><i class="fa fa-pen"></i></a>
                                                    <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCandidateEmergencyContact/' . $record->candidate_emergency_contact_id; ?>#8"><i class="fa fa-trash"></i></a>
                                                  </td>
                                                </tr>
                                            <?php
                                              }
                                            }
                                            ?>
                                          </tbody>
                                        </table>
                                      </div>
                                      </div>

                                      <!-- DIV KE 9 / AKTIVITAS SOSIAL -->
                                      <?php if ($CandidateHeaderRecords->flag_accordion_open == '9') { ?>
                                        <div id="9" class="card card-primary card-outline">
                                        <?php } else { ?>
                                          <div id="9" class="card card-primary card-outline collapsed-card">
                                          <?php } ?>
                                          <div class="card-header">
                                            <h3 class="card-title">AKTIVITAS SOSIAL</h3>
                                            <div class="card-tools">
                                              <?php if (
                                                $CandidateHeaderRecords->flag_accordion_open == '9' ||
                                                $CandidateHeaderRecords->candidate_social_activity_open ==  'Y'
                                              ) { ?>
                                                <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-add-candidate-social-activity">
                                                  Add
                                                </button>
                                                <?php if (
                                                  $CandidateHeaderRecords->candidate_hobby_open ==  NULL
                                                ) { ?>
                                                  <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateSocialActivityNext' ?>#10">
                                                    Next
                                                  </a>
                                                <?php } ?>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                  <i class="fas fa-plus"></i>
                                                </button>
                                              <?php } ?>
                                            </div>
                                          </div>
                                          <div class="card-body">
                                            <table id="candidate_social_activity_table" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                  <th>No</th>
                                                  <th>Tahun</th>
                                                  <th>Jabatan</th>
                                                  <th>Organisasi / Jenis Kegiatan</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                $i = 1;
                                                if (!empty($CandidateSocialActivityRecords)) {
                                                  foreach ($CandidateSocialActivityRecords as $record) {
                                                ?>
                                                    <tr>
                                                      <td><?= $i++; ?></td>
                                                      <td><?php echo $record->activity_social_year ?></td>
                                                      <td><?php echo $record->activity_social_position ?></td>
                                                      <td><?php echo $record->activity_type_name ?></td>
                                                      <td class="text-center">
                                                        <a id="btnEditCandidateSocialActivity" class="btn btn-xs btn-primary" data-candidatesocialactivityid="<?= $record->candidate_social_activity_id ?>" data-requestcandidateid="<?= $record->request_candidate_id ?>" data-activitysocialyear="<?= $record->activity_social_year ?>" data-activitysocialposition="<?= $record->activity_social_position ?>" data-activitytypename="<?= $record->activity_type_name ?>" data-toggle="modal" data-target="#modal-update-candidate-social-activity"><i class="fa fa-pen"></i></a>
                                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCandidateSocialActivity/' . $record->candidate_social_activity_id; ?>#9"><i class="fa fa-trash"></i></a>
                                                      </td>
                                                    </tr>
                                                <?php
                                                  }
                                                }
                                                ?>
                                              </tbody>
                                            </table>
                                          </div>
                                          </div>

                                          <!-- DIV KE 10 / HOBBY -->
                                          <?php if ($CandidateHeaderRecords->flag_accordion_open == '10') { ?>
                                            <div id="10" class="card card-primary card-outline">
                                            <?php } else { ?>
                                              <div id="10" class="card card-primary card-outline collapsed-card">
                                              <?php } ?>
                                              <div class="card-header">
                                                <h3 class="card-title">HOBBY</h3>
                                                <div class="card-tools">
                                                  <?php if (
                                                    $CandidateHeaderRecords->flag_accordion_open == '10' ||
                                                    $CandidateHeaderRecords->candidate_hobby_open ==  'Y'
                                                  ) { ?>
                                                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-add-candidate-hobby">
                                                      Add
                                                    </button>
                                                    <?php if (
                                                      $CandidateHeaderRecords->candidate_achievement_open ==  NULL
                                                      && (!empty($CandidateHobbyRecords))
                                                    ) { ?>
                                                      <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateHobbyNext' ?>#11">
                                                        Next
                                                      </a>
                                                    <?php } else if ((empty($CandidateHobbyRecords))) { ?>
                                                      <button type="button" class="btn btn-sm btn-success" id="btnCandidateHobbyError"> Next
                                                      </button>
                                                    <?php } ?>
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                      <i class="fas fa-plus"></i>
                                                    </button>
                                                  <?php } ?>
                                                </div>
                                              </div>

                                              <div class="card-body">
                                                <table id="candidate_hobby_table" class="table table-bordered table-striped">
                                                  <thead>
                                                    <tr>
                                                      <th>No</th>
                                                      <th>Nama Hobi</th>
                                                      <th>Action</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <?php
                                                    $i = 1;
                                                    if (!empty($CandidateHobbyRecords)) {
                                                      foreach ($CandidateHobbyRecords as $record) {
                                                    ?>
                                                        <tr>
                                                          <td><?= $i++; ?></td>
                                                          <td><?php echo $record->hobby_name ?></td>
                                                          <td class="text-center">
                                                            <a id="btnEditCandidateHobby" class="btn btn-xs btn-primary" data-candidatehobbyid="<?= $record->candidate_hobby_id ?>" data-requestcandidateid="<?= $record->request_candidate_id ?>" data-hobbyname="<?= $record->hobby_name ?>" data-toggle="modal" data-target="#modal-update-candidate-hobby"><i class="fa fa-pen"></i></a>
                                                            <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCandidateHobby/' . $record->candidate_hobby_id; ?>#10"><i class="fa fa-trash"></i></a>
                                                          </td>
                                                        </tr>
                                                    <?php
                                                      }
                                                    }
                                                    ?>
                                                  </tbody>
                                                </table>
                                              </div>
                                              </div>


                                              <!-- DIV KE 11 / PRESTASI / BEASISWA YANG PERNAH DIDAPAT  -->
                                              <?php if ($CandidateHeaderRecords->flag_accordion_open == '11') { ?>
                                                <div id="11" class="card card-primary card-outline">
                                                <?php } else { ?>
                                                  <div id="11" class="card card-primary card-outline collapsed-card">
                                                  <?php } ?>
                                                  <div class="card-header">
                                                    <h3 class="card-title">PRESTASI / BEASISWA YANG PERNAH DIDAPAT</h3>
                                                    <div class="card-tools">
                                                      <?php if (
                                                        $CandidateHeaderRecords->flag_accordion_open == '11' ||
                                                        $CandidateHeaderRecords->candidate_achievement_open ==  'Y'
                                                      ) { ?>
                                                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-add-candidate-achievement"> Add
                                                        </button>
                                                        <?php if (
                                                          $CandidateHeaderRecords->candidate_language_skill_open ==  NULL
                                                        ) { ?>
                                                          <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateAchievementNext' ?>#12">
                                                            Next
                                                          </a>
                                                        <?php } ?>
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                          <i class="fas fa-plus"></i>
                                                        </button>
                                                      <?php } ?>
                                                    </div>
                                                  </div>
                                                  <div class="card-body">
                                                    <table id="candidate_echievement_table" class="table table-bordered table-striped">
                                                      <thead>
                                                        <tr>
                                                          <th>No</th>
                                                          <th>Tahun</th>
                                                          <th>Jenis Prestasi Yang Didapat</th>
                                                          <th>Tingkat</th>
                                                          <th>Wilayah</th>
                                                          <th>Hasil Prestasi</th>
                                                          <th>Action</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php
                                                        $i = 1;
                                                        if (!empty($CandidateAchievementRecords)) {
                                                          foreach ($CandidateAchievementRecords as $record) {
                                                        ?>
                                                            <tr>
                                                              <td><?= $i++; ?></td>
                                                              <td><?php echo $record->achievement_year ?></td>
                                                              <td><?php echo $record->achievement_type ?></td>
                                                              <td><?php echo $record->achievement_level ?></td>
                                                              <td><?php echo $record->achievement_region ?></td>
                                                              <td><?php echo $record->achievement_result ?></td>
                                                              <td class="text-center">
                                                                <a id="btnEditCandidateAchievement" class="btn btn-xs btn-primary" data-candidateachievementid="<?= $record->candidate_achievement_id ?>" data-requestcandidateid="<?= $record->request_candidate_id ?>" data-achievementyear="<?= $record->achievement_year ?>" data-achievementtype="<?= $record->achievement_type ?>" data-achievementlevel="<?= $record->achievement_level ?>" data-achievementregion="<?= $record->achievement_region ?>" data-achievementresult="<?= $record->achievement_result ?>" data-toggle="modal" data-target="#modal-update-candidate-achievement"><i class="fa fa-pen"></i></a>
                                                                <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCandidateAchievement/' . $record->candidate_achievement_id; ?>#11"><i class="fa fa-trash"></i></a>
                                                              </td>
                                                            </tr>
                                                        <?php
                                                          }
                                                        }
                                                        ?>
                                                      </tbody>
                                                    </table>
                                                  </div>
                                                  </div>

                                                  <!-- DIV KE 12 / KEMAMPUAN BAHASA -->
                                                  <?php if ($CandidateHeaderRecords->flag_accordion_open == '12') { ?>
                                                    <div id="12" class="card card-primary card-outline">
                                                    <?php } else { ?>
                                                      <div id="12" class="card card-primary card-outline collapsed-card">
                                                      <?php } ?>
                                                      <div class="card-header">
                                                        <h3 class="card-title">KEMAMPUAN BAHASA</h3>
                                                        <div class="card-tools">
                                                          <?php if (
                                                            $CandidateHeaderRecords->flag_accordion_open == '12' ||
                                                            $CandidateHeaderRecords->candidate_language_skill_open ==  'Y'
                                                          ) { ?>
                                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-add-candidate-language-skill">
                                                              Add
                                                            </button>
                                                            <?php if (
                                                              $CandidateHeaderRecords->candidate_computer_skill_open ==  NULL
                                                              && (!empty($CandidateLanguageSkillRecords))
                                                            ) { ?>
                                                              <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateLanguageSkillNext' ?>#13">
                                                                Next
                                                              </a>
                                                            <?php } else if ((empty($CandidateLanguageSkillRecords))) { ?>
                                                              <button type="button" class="btn btn-sm btn-success" id="btnCandidateLanguageSkillError"> Next
                                                              </button>
                                                            <?php } ?>
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          <?php } ?>
                                                        </div>
                                                      </div>
                                                      <div class="card-body">
                                                        <table id="candidate_language_skill_table" class="table table-bordered table-striped">
                                                          <thead>
                                                            <tr>
                                                              <th>No</th>
                                                              <th>Macam Bahasa</th>
                                                              <th>Skor Mendengar</th>
                                                              <th>Skor Berbicara</th>
                                                              <th>Skor Membaca</th>
                                                              <th>Skor Menulis</th>
                                                              <th>Action</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            <?php
                                                            $i = 1;
                                                            if (!empty($CandidateLanguageSkillRecords)) {
                                                              foreach ($CandidateLanguageSkillRecords as $record) {
                                                            ?>
                                                                <tr>
                                                                  <td><?= $i++; ?></td>
                                                                  <td><?php echo $record->language_type_name ?></td>
                                                                  <td><?php echo $record->listening_score_name ?></td>
                                                                  <td><?php echo $record->speaking_score_name ?></td>
                                                                  <td><?php echo $record->reading_score_name ?></td>
                                                                  <td><?php echo $record->writing_score_name ?></td>
                                                                  <td class="text-center">
                                                                    <a id="btnEditCandidateLanguageSkill" class="btn btn-xs btn-primary" data-candidatelanguageskillid="<?= $record->candidate_language_skill_id ?>" data-requestcandidateid="<?= $record->request_candidate_id ?>" data-languagetype="<?= $record->language_type ?>" data-listeningscore="<?= $record->listening_score ?>" data-speakingscore="<?= $record->speaking_score ?>" data-readingscore="<?= $record->reading_score ?>" data-writingscore="<?= $record->writing_score ?>" data-toggle="modal" data-target="#modal-update-candidate-language-skill"><i class="fa fa-pen"></i></a>
                                                                    <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCandidateLanguageSkill/' . $record->candidate_language_skill_id; ?>#12"><i class="fa fa-trash"></i></a>
                                                                  </td>
                                                                </tr>
                                                            <?php
                                                              }
                                                            }
                                                            ?>
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                      </div>

                                                      <!-- DIV KE 13 / KEMAMPUAN KOMPUTER -->
                                                      <?php if ($CandidateHeaderRecords->flag_accordion_open == '13') { ?>
                                                        <div id="13" class="card card-primary card-outline">
                                                        <?php } else { ?>
                                                          <div id="13" class="card card-primary card-outline collapsed-card">
                                                          <?php } ?>
                                                          <div class="card-header">
                                                            <h3 class="card-title">KEMAMPUAN KOMPUTER</h3>
                                                            <div class="card-tools">
                                                              <?php if (
                                                                $CandidateHeaderRecords->flag_accordion_open == '13' ||
                                                                $CandidateHeaderRecords->candidate_computer_skill_open ==  'Y'
                                                              ) { ?>
                                                                <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-add-candidate-computer-skill">
                                                                  Add
                                                                </button>
                                                                <?php if (
                                                                  $CandidateHeaderRecords->candidate_understanding_position_open ==  NULL
                                                                ) { ?>
                                                                  <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateComputerSkillNext' ?>#14">
                                                                    Next
                                                                  </a>
                                                                <?php } ?>
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              <?php } ?>
                                                            </div>
                                                          </div>
                                                          <div class="card-body">
                                                            <table id="candidate_computer_skill_table" class="table table-bordered table-striped">
                                                              <thead>
                                                                <tr>
                                                                  <th>No</th>
                                                                  <th>Kemampuan Komputer</th>
                                                                  <th>Skor</th>
                                                                  <th>Action</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                                <?php
                                                                $i = 1;
                                                                if (!empty($CandidateComputerSkillRecords)) {
                                                                  foreach ($CandidateComputerSkillRecords as $record) {
                                                                ?>
                                                                    <tr>
                                                                      <td><?= $i++; ?></td>
                                                                      <td><?php echo $record->computer_skill_type ?></td>
                                                                      <td><?php echo $record->computer_skill_score_name ?></td>
                                                                      <td class="text-center">
                                                                        <a id="btnEditCandidateComputerSkill" class="btn btn-xs btn-primary" data-candidatecomputerskillid="<?= $record->candidate_computer_skill_id ?>" data-requestcandidateid="<?= $record->request_candidate_id ?>" data-computerskilltype="<?= $record->computer_skill_type ?>" data-computerskillscore="<?= $record->computer_skill_score ?>" data-toggle="modal" data-target="#modal-update-candidate-computer-skill"><i class="fa fa-pen"></i></a>
                                                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCandidateComputerSkill/' . $record->candidate_computer_skill_id; ?>#13"><i class="fa fa-trash"></i></a>
                                                                      </td>
                                                                    </tr>
                                                                <?php
                                                                  }
                                                                }
                                                                ?>
                                                              </tbody>
                                                            </table>
                                                          </div>
                                                          </div>

                                                          <!-- DIV KE 14 / PEMAHAMAN JABATAN -->
                                                          <form role="form" action="<?php echo base_url() ?>InsertCandidateUnderstandingPosition#14" method="post">
                                                            <?php if ($CandidateHeaderRecords->flag_accordion_open == '14') { ?>
                                                              <div id="14" class="card card-primary card-outline">
                                                              <?php } else { ?>
                                                                <div id="14" class="card card-primary card-outline collapsed-card">
                                                                <?php } ?>
                                                                <div class="card-header">
                                                                  <h3 class="card-title">PEMAHAMAN JABATAN</h3>
                                                                  <div class="card-tools">
                                                                    <?php if (
                                                                      $CandidateHeaderRecords->flag_accordion_open == '14' ||
                                                                      $CandidateHeaderRecords->candidate_understanding_position_open ==  'Y'
                                                                    ) { ?>
                                                                      <input type="submit" id="btnSubmit" class="btn btn-sm btn-primary" value="Save" />
                                                                      <?php if (
                                                                        $CandidateHeaderRecords->candidate_character_open ==  NULL
                                                                      ) { ?>
                                                                        <button type="submit" class="btn btn-sm btn-warning" formaction="<?php echo base_url() . 'CandidateUnderstandingPositionNext' ?>#15" formmethod="POST">Next</button>
                                                                      <?php } ?>
                                                                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                                        <i class="fas fa-plus"></i>
                                                                      </button>
                                                                    <?php } ?>
                                                                  </div>
                                                                </div>
                                                                <div class="card-body">
                                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                                  <div class="form-group">
                                                                    <label>Deskripsi Jabatan / Posisi Yang Anda Lamar Menurut Pendapat Anda</label>
                                                                    <textarea type="text" class="form-control" id="description_1" name="description_1" required><?php echo $CandidateUnderstandingPositionRecords->description_1; ?></textarea>
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label>Aspek Kemampuan Apakah Menurut Anda Yang Harus Dimiliki Seseorang Untuk Sukses Didalam Jabatan Tersebut</label>
                                                                    <textarea type="text" class="form-control" id="description_2" name="description_2" required><?php echo $CandidateUnderstandingPositionRecords->description_2; ?></textarea>
                                                                  </div>

                                                                </div>
                                                          </form>
                                                        </div>

                                                        <!-- DIV KE 15 / KELEBIHAN DAN KEKURANGAN-->
                                                        <form role="form" action="<?php echo base_url() ?>InsertCandidateCharacter#15" method="post">
                                                          <?php if ($CandidateHeaderRecords->flag_accordion_open == '15') { ?>
                                                            <div id="15" class="card card-primary card-outline">
                                                            <?php } else { ?>
                                                              <div id="15" class="card card-primary card-outline collapsed-card">
                                                              <?php } ?>
                                                              <div class="card-header">
                                                                <h3 class="card-title">KELEBIHAN DAN KEKURANGAN</h3>
                                                                <div class="card-tools">
                                                                  <?php if (
                                                                    $CandidateHeaderRecords->flag_accordion_open == '15' ||
                                                                    $CandidateHeaderRecords->candidate_character_open ==  'Y'
                                                                  ) { ?>
                                                                    <input type="submit" id="btnSubmit" class="btn btn-sm btn-primary" value="Save" />
                                                                    <?php if (
                                                                      $CandidateHeaderRecords->candidate_health_information_open ==  NULL
                                                                    ) { ?>
                                                                      <button type="submit" class="btn btn-sm btn-warning" formaction="<?php echo base_url() . 'CandidateCharacterNext' ?>#16" formmethod="POST">Next</button>
                                                                    <?php } ?>
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                                      <i class="fas fa-plus"></i>
                                                                    </button>
                                                                  <?php } ?>
                                                                </div>
                                                              </div>
                                                              <div class="card-body">
                                                                <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                                <div class="row">
                                                                  <div class="col-md-6">
                                                                    <div class="form-group">
                                                                      <label>Kelebihan Yang Anda Miliki</label>
                                                                      <textarea required type="text" class="form-control" id="kelebihan" name="kelebihan" placeholder="Sebutkan dan jelaskan secara detail..."><?php echo $CandidateCharacterRecords->kelebihan; ?></textarea>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                    <div class="form-group">
                                                                      <label>Kekurangan Yang Anda Miliki</label>
                                                                      <textarea required type="text" class="form-control" id="kekurangan" name="kekurangan" placeholder="Sebutkan dan jelaskan secara detail..."><?php echo $CandidateCharacterRecords->kekurangan; ?></textarea>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                        </form>
                                                    </div>


                                                    <!-- DIV KE 16 / INFO KESEHATAN -->
                                                    <form role="form" action="<?php echo base_url() ?>InsertCandidateHealthInformation#16" method="post">
                                                      <?php if ($CandidateHeaderRecords->flag_accordion_open == '16') { ?>
                                                        <div id="16" class="card card-primary card-outline">
                                                        <?php } else { ?>
                                                          <div id="16" class="card card-primary card-outline collapsed-card">
                                                          <?php } ?>
                                                          <div class="card-header">
                                                            <h3 class="card-title">INFO KESEHATAN</h3>
                                                            <div class="card-tools">
                                                              <?php if (
                                                                $CandidateHeaderRecords->flag_accordion_open == '16' ||
                                                                $CandidateHeaderRecords->candidate_health_information_open ==  'Y'
                                                              ) { ?>
                                                                <input type="submit" id="btnSubmit" class="btn btn-sm btn-primary" value="Save" />
                                                                <?php if (
                                                                  $CandidateHeaderRecords->candidate_salary_open ==  NULL
                                                                ) { ?>
                                                                  <button type="submit" class="btn btn-sm btn-warning" formaction="<?php echo base_url() . 'CandidateHealthInformationNext' ?>#17" formmethod="POST">Next</button>
                                                                <?php } ?>
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              <?php } ?>
                                                            </div>
                                                          </div>
                                                          <div class="card-body">
                                                            <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                            <div class="row">
                                                              <div class="col-md-6">
                                                                <label>Pernahkan Anda Dirawat Di Rumah Sakit</label>
                                                                <input required class="form-control" id="been_hospitalized" name="been_hospitalized" value="<?php echo $CandidateHealthInformationRecords->been_hospitalized; ?>">
                                                                <br>
                                                              </div>
                                                              <div class="col-md-6">
                                                                <label>Jika Pernah, Penyakit Apa Yang Anda Derita</label>
                                                                <input class="form-control" id="illness" name="illness" value="<?php echo $CandidateHealthInformationRecords->illness; ?>" required>
                                                                <br>
                                                              </div>
                                                            </div>
                                                            <div class="row">
                                                              <div class="col-md-6">
                                                                <label>Berapa Lama Anda Dirawat</label>
                                                                <input class="form-control" id="long_treated" name="long_treated" value="<?php echo $CandidateHealthInformationRecords->long_treated; ?>" required>
                                                                <br>
                                                              </div>
                                                              <div class="col-md-6">
                                                                <label>Pernahkah Anda Terlibat Narkoba / Kriminal</label>
                                                                <input class="form-control" id="involved_drugs_or_crime" name="involved_drugs_or_crime" value="<?php echo $CandidateHealthInformationRecords->involved_drugs_or_crime; ?>" required>
                                                                <br>
                                                              </div>
                                                            </div>
                                                          </div>
                                                    </form>
                                                </div>

                                                <!-- DIV KE 17 / PENGUPAHAN -->
                                                <form role="form" action="<?php echo base_url() ?>InsertCandidateSalary#17" method="post">
                                                  <?php if ($CandidateHeaderRecords->flag_accordion_open == '17') { ?>
                                                    <div id="17" class="card card-primary card-outline">
                                                    <?php } else { ?>
                                                      <div id="17" class="card card-primary card-outline collapsed-card">
                                                      <?php } ?>
                                                      <div class="card-header">
                                                        <h3 class="card-title">PENGUPAHAN</h3>
                                                        <div class="card-tools">
                                                          <?php if (
                                                            $CandidateHeaderRecords->flag_accordion_open == '17' ||
                                                            $CandidateHeaderRecords->candidate_salary_open ==  'Y'
                                                          ) { ?>
                                                            <input type="submit" id="btnSubmit" class="btn btn-sm btn-primary" value="Save" />
                                                            <?php if (
                                                              $CandidateHeaderRecords->candidate_question_open ==  NULL
                                                            ) { ?>
                                                              <!-- <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'CandidateSalaryNext' ?>#18">
                                                                Next
                                                              </a> -->
                                                              <button type="submit" class="btn btn-sm btn-warning" formaction="<?php echo base_url() . 'CandidateSalaryNext' ?>#18" formmethod="POST">Next</button>
                                                            <?php } ?>
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          <?php } ?>
                                                        </div>
                                                      </div>
                                                      <div class="card-body">
                                                        <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                        <div class="row">
                                                          <div class="col-md-6">
                                                            <label>Gaji Saat Ini / Terakhir (Pokok)</label>
                                                            <input class="form-control" id="last_salary_c" name="last_salary_c" value="<?php echo $CandidateSalaryRecords->last_salary; ?>" required>
                                                            <br>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <label>Tunjangan Transport</label>
                                                            <input class="form-control" id="transport_allowance" name="transport_allowance" value="<?php echo $CandidateSalaryRecords->transport_allowance; ?>" required>
                                                            <br>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-md-6">
                                                            <label>Tunjangan Uang Makan</label>
                                                            <input class="form-control" id="meal_allowance" name="meal_allowance" value="<?php echo $CandidateSalaryRecords->meal_allowance; ?>" required>
                                                            <br>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <label>Tunjangan Asuransi</label>
                                                            <input class="form-control" id="insurance_allowance" name="insurance_allowance" value="<?php echo $CandidateSalaryRecords->insurance_allowance; ?>" required>
                                                            <br>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-md-6">
                                                            <label>Fasilitas Lainnya</label>
                                                            <input class="form-control" id="other_facility" name="other_facility" value="<?php echo $CandidateSalaryRecords->other_facility; ?>" required>
                                                            <br>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <label>Total Gaji Yang Diharapkan</label>
                                                            <input class="form-control" id="summary_expected_salary" name="summary_expected_salary" value="<?php echo $CandidateSalaryRecords->summary_expected_salary; ?>" required>
                                                            <br>
                                                          </div>
                                                        </div>

                                                      </div>
                                                </form>
                                            </div>

                                            <!-- DIV KE 18 / PERTANYAAN UMUM -->
                                            <form role="form" action="<?php echo base_url() ?>InsertCandidateQuestion#18" method="post">
                                              <?php if ($CandidateHeaderRecords->flag_accordion_open == '18') { ?>
                                                <div id="18" class="card card-primary card-outline">
                                                <?php } else { ?>
                                                  <div id="18" class="card card-primary card-outline collapsed-card">
                                                  <?php } ?>
                                                  <div class="card-header">
                                                    <h3 class="card-title">PERTANYAAN UMUM</h3>
                                                    <div class="card-tools">
                                                      <?php if (
                                                        $CandidateHeaderRecords->flag_accordion_open == '18' ||
                                                        $CandidateHeaderRecords->candidate_question_open ==  'Y'
                                                      ) { ?>
                                                        <input type="submit" id="btnSubmit" class="btn btn-sm btn-primary" value="Save" />
                                                        <?php if (
                                                          $CandidateHeaderRecords->candidate_question_open ==  NULL
                                                        ) { ?>
                                                          <button type="button" class="btn btn-sm btn-success" id="btnCandidateQuestionNext">
                                                            <i class="fa fa-next"></i> Next
                                                          </button>
                                                        <?php } ?>
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                          <i class="fas fa-plus"></i>
                                                        </button>
                                                      <?php } ?>
                                                    </div>
                                                  </div>
                                                  <div class="card-body">
                                                    <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                    <input class="form-control" id="question_7_" name="question_7_" value="<?php echo $CandidateQuestionRecords->question_7; ?>" hidden></input>
                                                    <input class="form-control" id="question_8_" name="question_8_" value="<?php echo $CandidateQuestionRecords->question_8; ?>" hidden></input>
                                                    <input class="form-control" id="question_9_" name="question_9_" value="<?php echo $CandidateQuestionRecords->question_9; ?>" hidden></input>
                                                    <input class="form-control" id="question_10_" name="question_10_" value="<?php echo $CandidateQuestionRecords->question_10; ?>" hidden></input>
                                                    <div class="col-md-8">
                                                      <div class="form-group">
                                                        <label>Berikan penjelasan singkat mengapa Anda tertarik melamar di perusahaan ini ?</label>
                                                        <textarea required type="text" class="form-control" id="question_1" name="question_1"><?php echo $CandidateQuestionRecords->question_1; ?></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="form-group">
                                                        <label>Apakah Anda pernah diberhentikan atau diminta megundurkan diri dari perusahaan sebelumnya ? Apabila iya, oleh siapa dan kapan ?</label>
                                                        <textarea required type="text" class="form-control" id="question_2" name="question_2"><?php echo $CandidateQuestionRecords->question_2; ?></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="form-group">
                                                        <label>Apabila Anda pernah melamar pada perusahaan ini atau salah satu unit dalam Persada Group ?</label>
                                                        <textarea required type="text" class="form-control" id="question_3" name="question_3"><?php echo $CandidateQuestionRecords->question_3; ?></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="form-group">
                                                        <label>Apabila Anda mempunyai keluarga atau kenalan yang berkerja pada unit Persada Group? Cantumkan namanya !</label>
                                                        <textarea required type="text" class="form-control" id="question_4" name="question_4"><?php echo $CandidateQuestionRecords->question_4; ?></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="form-group">
                                                        <label>Kapan Anda bersedia untuk memulai bekerja pada perusahaan kami ?</label>
                                                        <textarea required type="text" class="form-control" id="question_5" name="question_5"><?php echo $CandidateQuestionRecords->question_5; ?></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="form-group">
                                                        <label>Bersediakah Anda ditempatkan diluar kota ? Jelaskan alasannya</label>
                                                        <textarea required type="text" class="form-control" id="question_6" name="question_6"><?php echo $CandidateQuestionRecords->question_6; ?></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <label>Apabila Anda diterima, bersediakah saudara menjalani masa kontrak / training ?</label>
                                                      <br>
                                                      <div class="col-md-8">
                                                        <fieldset id="question_7">
                                                          <div class="row">
                                                            <div class="col-sm">
                                                              <input type="radio" checked name="question_7" value="Y">
                                                              <label>Ya</label>
                                                            </div>
                                                            <div class="col-sm">
                                                              <input type="radio" name="question_7" value="N">
                                                              <label>Tidak</label><br>
                                                            </div>
                                                          </div>
                                                        </fieldset>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <label>Apabila dalam masa kontrak / training Anda melaanggar ketentuan perusahaan dan tidak memenuhi kinerja / prestasi yang ditentukan, bersediakah Anda diberhentikan tanpa pesangon ?</label>
                                                      <br>
                                                      <div class="col-md-8">
                                                        <fieldset id="8">
                                                          <div class="row">
                                                            <div class="col-sm">
                                                              <input type="radio" checked name="question_8" value="Y">
                                                              <label>Ya</label>
                                                            </div>
                                                            <div class="col-sm">
                                                              <input type="radio" name="question_8" value="N">
                                                              <label>Tidak</label><br>
                                                            </div>
                                                          </div>
                                                        </fieldset>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <label>Apabila kemudian hari Anda ingin berhenti dari perusahaan ini, bersediakah Anda memberitahukan tertulis sekurang - kurangnya 1 (satu) bulan dimuka ( pasal 162 UU No.13 thn 2003 ) ?</label>
                                                      <br>
                                                      <div class="col-md-8">
                                                        <fieldset id="question_9">
                                                          <div class="row">
                                                            <div class="col-sm">
                                                              <input type="radio" checked name="question_9" value="Y">
                                                              <label>Ya</label>
                                                            </div>
                                                            <div class="col-sm">
                                                              <input type="radio" name="question_9" value="N">
                                                              <label>Tidak</label><br>
                                                            </div>
                                                          </div>
                                                        </fieldset>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <label>Apabila Anda diterima, bersediakah Anda mentaati segala peraturan dan ketentuan yang berlaku di perusahaan ini ?</label>
                                                      <br>
                                                      <div class="col-md-8">
                                                        <fieldset id="question_10">
                                                          <div class="row">
                                                            <div class="col-sm">
                                                              <input type="radio" checked name="question_10" value="Y">
                                                              <label>Ya</label>
                                                            </div>
                                                            <div class="col-sm">
                                                              <input type="radio" name="question_10" value="N">
                                                              <label>Tidak</label><br>
                                                            </div>
                                                          </div>
                                                        </fieldset>
                                                      </div>
                                                    </div>
                                                  </div>
                                            </form>
                                        </div>

                                        <!-- DIV KE 6 / LAMPIRAN - LAMPIRAN -->
                                        <?php if ($CandidateHeaderRecords->flag_accordion_open == '19') { ?>
                                          <div id="6" class="card card-primary card-outline">
                                          <?php } else { ?>
                                            <div id="6" class="card card-primary card-outline collapsed-card">
                                            <?php } ?>
                                            <div class="card-header">
                                              <h3 class="card-title">LAMPIRAN - LAMPIRAN</h3>
                                              <div class="card-tools">
                                                <?php if (
                                                  $CandidateHeaderRecords->flag_accordion_open == '19' ||
                                                  $CandidateHeaderRecords->candidate_attachment_open ==  'Y'
                                                ) { ?>
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-plus"></i>
                                                  </button>
                                                <?php } ?>
                                              </div>
                                            </div>
                                            <div class="card-body">
                                              <p>
                                                <font color="grey">Ukuran gambar : Max 2 MB </font>
                                                <br>
                                                <font color="grey">Format : JPG, JPEG, PNG, PDF </font>
                                              </p>
                                              <br>
                                              <?php if ($CandidateCompanyStructureRecords ==  NULL) { ?>
                                                <form role="form" action="<?php echo base_url() ?>InsertCandidateAttachment#19" enctype="multipart/form-data" method="post">
                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>Daftar Riwayat Hidup / CV</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image1" value="Attach_01" accept=".jpeg,.jpg,.png,.pdf">
                                                    </div>
                                                    <div class="col-md-3">
                                                      <a href="" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>*KTP</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image2" accept=".jpeg,.jpg,.png,.pdf" required>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>*Ijazah</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image3" accept=".jpeg,.jpg,.png,.pdf" required>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>*Transkrip Nilai</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image4" accept=".jpeg,.jpg,.png,.pdf" required>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>*Kartu Keluarga</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image5" accept=".jpeg,.jpg,.png,.pdf" required>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>Surat Pengalaman Kerja</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image" accept=".jpeg,.jpg,.png,.pdf">
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>Surat Keterangan Sehat</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image" accept=".jpeg,.jpg,.png,.pdf">
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>SIM (jika ada)</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image" accept=".jpeg,.jpg,.png,.pdf">
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>NPWP</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image" accept=".jpeg,.jpg,.png,.pdf">
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>SKCK (Yang masih berlaku)</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image" accept=".jpeg,.jpg,.png,.pdf">
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>Kartu BPJS Kesehatan (jika sudah ada)</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image" accept=".jpeg,.jpg,.png,.pdf">
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>Kartu BPJS Ketenagakerjaan (jika sudah ada)</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image" accept=".jpeg,.jpg,.png,.pdf">
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <label>Buku Tabungan Rekening BCA (jika sudah ada)</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <input class="form-control" type="file" name="files[]" multiple id="image" accept=".jpeg,.jpg,.png,.pdf">
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <input type="submit" id="btnSubmit" class="btn btn-primary" value="Upload All File" />
                                                </form>
                                              <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>upload/<?php echo $CandidateCompanyStructureRecords->structure_image_url ?>" width="400" height="300" />
                                              <?php } ?>
                                            </div>
                                            </div>
                                          </div>
                                    </div>


                                    <!-- ADD CANDIDATE FAMILY -->
                                    <div class="modal fade" id="modal-add-candidate-family">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Tambahkan Data Keluarga</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>InsertCandidateFamily#2" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Hubungan Keluarga</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <select class="form-control select2bs4" id="family_realitionship_id" name="family_realitionship_id" required>
                                                        <option disabled selected value="">--Pilih Hubungan--</option>
                                                        <?php foreach ($CandidateFamilyOptionRecords as $row) : ?>
                                                          <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                                        <?php endforeach; ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="name" name="name" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="gender_id">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="gender_id" value="Y">
                                                            <label>Pria</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="gender_id" value="N">
                                                            <label>Wanita</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Usia</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="age" name="age" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Pendidikan Terakhir</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <select class="form-control select2bs4" id="last_education_id" name="last_education_id" required>
                                                        <option disabled selected value="">--Select--</option>
                                                        <?php foreach ($CandidateEducationHistoryOptionRecords as $row) : ?>
                                                          <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                                        <?php endforeach; ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Perkerjaan & Jabatan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="profession_name" name="profession_name" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Keterangan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <textarea class="form-control" id="description" placeholder="Tambahkan Jika Perlu" name="description" required></textarea>
                                                    </div>
                                                  </div>
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

                                    <!-- UPDATE CANDIDATE FAMILY -->
                                    <div class="modal fade" id="modal-update-candidate-family">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Ubah Data Keluarga</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>UpdateCandidateFamily#2" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="candidate_family_id_update" name="candidate_family_id_update" hidden></input>
                                                  <input class="form-control" id="request_candidate_id_update" name="request_candidate_id_update" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Hubungan Keluarga</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <select class="form-control select2bs4" id="family_realitionship_id_update" name="family_realitionship_id_update" required>
                                                        <option disabled selected value="">--Pilih Hubungan--</option>
                                                        <?php foreach ($CandidateFamilyOptionRecords as $row) : ?>
                                                          <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                                        <?php endforeach; ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="name_update" name="name_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="gender_id_update">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="gender_id_update" value="P">
                                                            <label>Pria</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="gender_id_update" value="W">
                                                            <label>Wanita</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Usia</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="age_update" name="age_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Pendidikan Terakhir</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <select class="form-control select2bs4" id="last_education_id_update" name="last_education_id_update" required>
                                                        <option disabled selected value="">--Select--</option>
                                                        <?php foreach ($CandidateEducationHistoryOptionRecords as $row) : ?>
                                                          <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                                        <?php endforeach; ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Perkerjaan & Jabatan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="profession_name_update" name="profession_name_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Keterangan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <textarea class="form-control" id="description_update" placeholder="Tambahkan Jika Perlu" name="description_update" required></textarea>
                                                    </div>
                                                  </div>
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


                                    <!-- ADD CANDIDATE EDUCATION HISTORY -->
                                    <div class="modal fade" id="modal-add-candidate-education-history">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Tambahkan Riwayat Pendidikan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>InsertCandidateEducationHistory#3" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tingkat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <select class="form-control select2bs4" id="education_level_id" name="education_level_id" required>
                                                        <option disabled selected value="">--Pilih Pendidikan--</option>
                                                        <?php foreach ($CandidateEducationHistoryOptionRecords as $row) : ?>
                                                          <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                                        <?php endforeach; ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Dari Tahun</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="input-group date" id="datetime" data-target-input="nearest">
                                                        <input required type="text" id="from_year" name="from_year" class="form-control datetimepicker-input" data-target="#datetime" />
                                                        <div class="input-group-append" data-target="#datetime" data-toggle="datetimepicker">
                                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Sampai Tahun</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="input-group date" id="datetime1" data-target-input="nearest">
                                                        <input required type="text" id="to_year" name="to_year" class="form-control datetimepicker-input" data-target="#datetime1" />
                                                        <div class="input-group-append" data-target="#datetime1" data-toggle="datetimepicker">
                                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama Sekolah</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="school_name" name="school_name" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tempat / Kota</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="school_place" name="school_place" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jurusan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="school_majors" name="school_majors" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Berijazah / Tidak</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="school_certified_status">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="school_certified_status" value="Y">
                                                            <label>Ya</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="school_certified_status" value="N">
                                                            <label>Tidak</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
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

                                    <!-- UPDATE EDUCATION HISTORY -->
                                    <div class="modal fade" id="modal-update-candidate-education-history">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Ubah Riwayat Pendidikan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>UpdateCandidateEducationHistory#3" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="candidate_education_history_id_update" name="candidate_education_history_id_update" hidden></input>
                                                  <input class="form-control" id="request_candidate_id_update" name="request_candidate_id_update" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tingkat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <select class="form-control select2bs4" id="education_level_id_update" name="education_level_id_update" required>
                                                        <option disabled selected value="">--Pilih Pendidikan--</option>
                                                        <?php foreach ($CandidateEducationHistoryOptionRecords as $row) : ?>
                                                          <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                                        <?php endforeach; ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Dari Tahun</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="input-group date" id="datetime" data-target-input="nearest">
                                                        <input required type="text" id="from_year_update" name="from_year_update" class="form-control datetimepicker-input" data-target="#datetime" />
                                                        <div class="input-group-append" data-target="#datetime" data-toggle="datetimepicker">
                                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Sampai Tahun</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="input-group date" id="datetime1" data-target-input="nearest">
                                                        <input required type="text" id="to_year_update" name="to_year_update" class="form-control datetimepicker-input" data-target="#datetime1" />
                                                        <div class="input-group-append" data-target="#datetime1" data-toggle="datetimepicker">
                                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama Sekolah</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="school_name_update" name="school_name_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tempat / Kota</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="school_place_update" name="school_place_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jurusan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="school_majors_update" name="school_majors_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Berijazah / Tidak</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="school_certified_status_update">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="school_certified_status_update" value="Y">
                                                            <label>Ya</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="school_certified_status_update" value="N">
                                                            <label>Tidak</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
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

                                    <!-- ADD CANDIDATE COURSES -->
                                    <div class="modal fade" id="modal-add-candidate-courses">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Tambahkan Kursus / Training</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>InsertCandidateCourses#4" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Lama Kursus / Training</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="courses_old" name="courses_old" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tahun</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" type="number" id="courses_year" name="courses_year" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Bidang / Jenis</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="courses_type" name="courses_type" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Penyelenggara</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="courses_organizer" name="courses_organizer" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tempat / Kota</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="courses_place" name="courses_place" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Dibiayai Oleh</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="courses_funded_by" name="courses_funded_by" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Bersertifikat / Tidak</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="courses_certified_status">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="courses_certified_status" value="Y">
                                                            <label>Ya</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="courses_certified_status" value="N">
                                                            <label>Tidak</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
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

                                    <!-- UPDATE CANDIDATE FAMILY -->
                                    <div class="modal fade" id="modal-update-candidate-courses">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Ubah Data Kursus</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>UpdateCandidateCourses#4" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="candidate_courses_id_update" name="candidate_courses_id_update" hidden></input>
                                                  <input class="form-control" id="request_candidate_id_update" name="request_candidate_id_update" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Lama Kursus / Training</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="courses_old_update" name="courses_old_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tahun</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" type="number" id="courses_year_update" name="courses_year_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Bidang / Jenis</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="courses_type_update" name="courses_type_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Penyelenggara</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="courses_organizer_update" name="courses_organizer_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tempat / Kota</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="courses_place_update" name="courses_place_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Dibiayai Oleh</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="courses_funded_by_update" name="courses_funded_by_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Bersertifikat / Tidak</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="courses_certified_status_update">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="courses_certified_status_update" value="Y">
                                                            <label>Ya</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="courses_certified_status_update" value="N">
                                                            <label>Tidak</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
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

                                    <!-- ADD CANDIDATE JOB HISTORY -->
                                    <div class="modal fade" id="modal-add-candidate-job-history">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Tambahkan Riwayat Pekerjaan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>InsertCandidateJobHistory#5" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="company_name" name="company_name" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>No. Telepon Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="company_phone" name="company_phone" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Masa Kerja</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="input-group date" id="datetime2" data-target-input="nearest">
                                                        <input required type="text" id="working_from" name="working_from" class="form-control datetimepicker-input" data-target="#datetime2" placeholder="Mulai dari" />
                                                        <div class="input-group-append" data-target="#datetime2" data-toggle="datetimepicker">
                                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div id="workingto">
                                                        <div class="input-group date" id="datetime3" data-target-input="nearest">
                                                          <input type="text" id="working_to" name="working_to" class="form-control datetimepicker-input" data-target="#datetime3" placeholder="Sampai" />
                                                          <div class="input-group-append" data-target="#datetime3" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-4">
                                                    </div>
                                                    <br>
                                                    <?php $date_now = (date('m-Y', time())) ?>
                                                    <div class="col-md-8">
                                                      <input type="checkbox" id="working_to_c" name="working_to" value="<?= $date_now ?>">
                                                      <label>Sampai Saat Ini</label>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jabatan / Posisi</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="working_position" name="working_position" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama Atasan Anda</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="direct_leader_name" name="direct_leader_name" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jabatan Atasan Anda</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="direct_leader_position" name="direct_leader_position" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Alasan Berhenti Kerja</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="reason_to_leave_work" name="reason_to_leave_work" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Gaji Terakhir</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="last_salary" name="last_salary" required></input>
                                                    </div>
                                                  </div>
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

                                    <!-- UPDATE JOB HISTORY -->
                                    <div class="modal fade" id="modal-update-candidate-job-history">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Ubah Riwayat Pekerjaan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>UpdateCandidateJobHistory#5" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="candidate_job_history_id_update" name="candidate_job_history_id_update" hidden></input>
                                                  <input class="form-control" id="request_candidate_id_update" name="request_candidate_id_update" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="company_name_update" name="company_name_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>No. Telepon Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="company_phone_update" name="company_phone_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Masa Kerja</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="input-group date" id="datetime2" data-target-input="nearest">
                                                        <input required type="text" id="working_from_update" name="working_from_update" class="form-control datetimepicker-input" data-target="#datetime2" placeholder="Mulai dari" />
                                                        <div class="input-group-append" data-target="#datetime2" data-toggle="datetimepicker">
                                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div id="workingtoupdate">
                                                        <div class="input-group date" id="datetime3" data-target-input="nearest">
                                                          <input required type="text" id="working_to_update" name="working_to_update" class="form-control datetimepicker-input" data-target="#datetime3" placeholder="Sampai" />
                                                          <div class="input-group-append" data-target="#datetime3" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-4">
                                                    </div>
                                                    <br>
                                                    <?php $date_now = (date('m-Y', time())) ?>
                                                    <div class="col-md-8">
                                                      <input type="checkbox" id="working_to_update_c" name="working_to_update" value="<?= $date_now ?>">
                                                      <label>Sampai Saat Ini</label>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jabatan / Posisi</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="working_position_update" name="working_position_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama Atasan Anda</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="direct_leader_name_update" name="direct_leader_name_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jabatan Atasan Anda</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="direct_leader_position_update" name="direct_leader_position_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Alasan Berhenti Kerja</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="reason_to_leave_work_update" name="reason_to_leave_work_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Gaji Terakhir</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="last_salary_update" name="last_salary_update" required></input>
                                                    </div>
                                                  </div>
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

                                    <!-- ADD CANDIDATE JOB REFERENCE -->
                                    <div class="modal fade" id="modal-add-candidate-reference">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Tambah Referensi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>InsertCandidateReference#7" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="referee_name" name="referee_name" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Posisi / Jabatan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="referee_position" name="referee_position" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="company_name" name="company_name" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Hubungan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="referee_relationship" name="referee_relationship" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="referee_address" name="referee_address" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Telepon</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input type="number" class="form-control" id="referee_phone_no" name="referee_phone_no" required></input>
                                                    </div>
                                                  </div>
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

                                    <!-- UPDATE JOB REFERENCE -->
                                    <div class="modal fade" id="modal-update-candidate-reference">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Ubah Referensi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>UpdateCandidateReference#7" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="candidate_reference_id_update" name="candidate_reference_id_update" hidden></input>
                                                  <input class="form-control" id="request_candidate_id_update" name="request_candidate_id_update" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="referee_name_update" name="referee_name_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Posisi / Jabatan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="referee_position_update" name="referee_position_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="company_name_ref_update" name="company_name_ref_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Hubungan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="referee_relationship_update" name="referee_relationship_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="referee_address_update" name="referee_address_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Telepon</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input type="number" class="form-control" id="referee_phone_no_update" name="referee_phone_no_update" required></input>
                                                    </div>
                                                  </div>
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


                                    <!-- ADD CANDIDATE EMERGENCY CONTACT -->
                                    <div class="modal fade" id="modal-add-candidate-emergency-contact">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Tambah Kontak Darurat</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>InsertCandidateEmergencyContact#8" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="emergency_contact_name" name="emergency_contact_name" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Hubungan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="emergency_contact_relationship" name="emergency_contact_relationship" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="emergency_contact_address" name="emergency_contact_address" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Telepon / HP</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input type="number" class="form-control" id="emergency_contact_phone_no" name="emergency_contact_phone_no" required></input>
                                                    </div>
                                                  </div>
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

                                    <!-- UPDATE EMERGENCY CONTACT -->
                                    <div class="modal fade" id="modal-update-candidate-emergency-contact">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Ubah Kontak Darurat</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>UpdateCandidateEmergencyContact#8" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="candidate_emergency_contact_id_update" name="candidate_emergency_contact_id_update" hidden></input>
                                                  <input class="form-control" id="request_candidate_id_update" name="request_candidate_id_update" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Nama</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="emergency_contact_name_update" name="emergency_contact_name_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Hubungan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="emergency_contact_relationship_update" name="emergency_contact_relationship_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="emergency_contact_address_update" name="emergency_contact_address_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Telepon / HP</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input type="number" class="form-control" id="emergency_contact_phone_no_update" name="emergency_contact_phone_no_update" required></input>
                                                    </div>
                                                  </div>
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

                                    <!-- ADD CANDIDATE SOCIAL ACTIVITY -->
                                    <div class="modal fade" id="modal-add-candidate-social-activity">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Tambah Aktivitas Sosial</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>InsertCandidateSocialActivity#9" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tahun</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input type="number" class="form-control" id="activity_social_year" name="activity_social_year" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jabatan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="activity_social_position" name="activity_social_position" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Organisasi / Jenis Kegiatan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="activity_type_name" name="activity_type_name" required></input>
                                                    </div>
                                                  </div>
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

                                    <!-- UPDATE SOCIAL ACTIVITY -->
                                    <div class="modal fade" id="modal-update-candidate-social-activity">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Ubah Aktivitas Sosial</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>UpdateCandidateSocialActivity#9" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="candidate_social_activity_id_update" name="candidate_social_activity_id_update" hidden></input>
                                                  <input class="form-control" id="request_candidate_id_update" name="request_candidate_id_update" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tahun</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input type="number" class="form-control" id="activity_social_year_update" name="activity_social_year_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jabatan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="activity_social_position_update" name="activity_social_position_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Organisasi / Jenis Kegiatan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="activity_type_name_update" name="activity_type_name_update" required></input>
                                                    </div>
                                                  </div>
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

                                    <!-- ADD CANDIDATE HOBBY -->
                                    <div class="modal fade" id="modal-add-candidate-hobby">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Tambah Hobby</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>InsertCandidateHobby#10" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Hoby</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="hobby_name" name="hobby_name" required></input>
                                                    </div>
                                                  </div>
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

                                    <!-- UPDATE HOBBY -->
                                    <div class="modal fade" id="modal-update-candidate-hobby">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Ubah Hobby</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>UpdateCandidateHobby#10" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="candidate_hobby_id_update" name="candidate_hobby_id_update" hidden></input>
                                                  <input class="form-control" id="request_candidate_id_update" name="request_candidate_id_update" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Hoby</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="hobby_name_update" name="hobby_name_update" required></input>
                                                    </div>
                                                  </div>
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

                                    <!-- ADD CANDIDATE ACHIEVEMENT -->
                                    <div class="modal fade" id="modal-add-candidate-achievement">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Tambah Prestasi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>InsertCandidateAchievement#11" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tahun</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input type="number" class="form-control" id="achievement_year" name="achievement_year" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jenis Prestasi Yang Didapat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="achievement_type" name="achievement_type" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tingkat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="achievement_level" name="achievement_level" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Wilayah</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="achievement_region" name="achievement_region" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Hasil Prestasi</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="achievement_result" name="achievement_result" required></input>
                                                    </div>
                                                  </div>
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

                                    <!-- UPDATE ACHIEVEMENT -->
                                    <div class="modal fade" id="modal-update-candidate-achievement">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Ubah Prestasi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>UpdateCandidateAchievement#11" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="candidate_achievement_id_update" name="candidate_achievement_id_update" hidden></input>
                                                  <input class="form-control" id="request_candidate_id_update" name="request_candidate_id_update" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tahun</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input type="number" class="form-control" id="achievement_year_update" name="achievement_year_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jenis Prestasi Yang Didapat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="achievement_type_update" name="achievement_type_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tingkat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="achievement_level_update" name="achievement_level_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Wilayah</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="achievement_region_update" name="achievement_region_update" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Hasil Prestasi</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="achievement_result_update" name="achievement_result_update" required></input>
                                                    </div>
                                                  </div>
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


                                    <!-- ADD CANDIDATE LANGUAGE SKILL -->
                                    <div class="modal fade" id="modal-add-candidate-language-skill">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Skor Bahasa</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>InsertCandidateLanguageSkill#12" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jenis Bahasa</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <select class="form-control select2bs4" id="language_type" name="language_type" required>
                                                        <option disabled selected value="">--Pilih Bahasa--</option>
                                                        <?php foreach ($LanguageTypeRecords as $row) : ?>
                                                          <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                                        <?php endforeach; ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Kemampuan Mendengarkan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="listening_score">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="listening_score" value="B">
                                                            <label>Baik</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="listening_score" value="C">
                                                            <label>Cukup</label><br>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="listening_score" value="K">
                                                            <label>Kurang</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>

                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Kemampuan Berbicara</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="speaking_score">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="speaking_score" value="B">
                                                            <label>Baik</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="speaking_score" value="C">
                                                            <label>Cukup</label><br>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="speaking_score" value="K">
                                                            <label>Kurang</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Kemampuan Membaca</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="reading_score">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="reading_score" value="B">
                                                            <label>Baik</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="reading_score" value="C">
                                                            <label>Cukup</label><br>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="reading_score" value="K">
                                                            <label>Kurang</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Kemampuan Menulis</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="writing_score">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="writing_score" value="B">
                                                            <label>Baik</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="writing_score" value="C">
                                                            <label>Cukup</label><br>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="writing_score" value="K">
                                                            <label>Kurang</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
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

                                    <!-- UPDATE LANGUAGE SKILL -->
                                    <div class="modal fade" id="modal-update-candidate-language-skill">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Ubah Skor Bahasa</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>UpdateCandidateLanguageSkill#12" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="candidate_language_skill_id_update" name="candidate_language_skill_id_update" hidden></input>
                                                  <input class="form-control" id="request_candidate_id_update" name="request_candidate_id_update" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jenis Bahasa</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <select class="form-control select2bs4" id="language_type_update" name="language_type_update" required>
                                                        <option disabled selected value="">--Pilih Bahasa--</option>
                                                        <?php foreach ($LanguageTypeRecords as $row) : ?>
                                                          <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                                        <?php endforeach; ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Kemampuan Mendengarkan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="listening_score_update">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="listening_score_update" value="B">
                                                            <label>Baik</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="listening_score_update" value="C">
                                                            <label>Cukup</label><br>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="listening_score_update" value="K">
                                                            <label>Kurang</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>

                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Kemampuan Berbicara</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="speaking_score_update">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="speaking_score_update" value="B">
                                                            <label>Baik</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="speaking_score_update" value="C">
                                                            <label>Cukup</label><br>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="speaking_score_update" value="K">
                                                            <label>Kurang</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Kemampuan Membaca</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="reading_score_update">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="reading_score_update" value="B">
                                                            <label>Baik</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="reading_score_update" value="C">
                                                            <label>Cukup</label><br>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="reading_score_update" value="K">
                                                            <label>Kurang</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Kemampuan Menulis</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="writing_score_update">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="writing_score_update" value="B">
                                                            <label>Baik</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="writing_score_update" value="C">
                                                            <label>Cukup</label><br>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="writing_score_update" value="K">
                                                            <label>Kurang</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
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


                                    <!-- ADD CANDIDATE COMPUTER SKILL -->
                                    <div class="modal fade" id="modal-add-candidate-computer-skill">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Kemampuan Kompter</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>InsertCandidateComputerSkill#13" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="request_candidate_id" name="request_candidate_id" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jenis Kemampuan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="computer_skill_type" name="computer_skill_type" placeholder="Contoh : Ms.Word, Excel, Power Point, dll"></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tingkat Kemampuan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="computer_skill_score">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="computer_skill_score" value="B">
                                                            <label>Baik</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="computer_skill_score" value="C">
                                                            <label>Cukup</label><br>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="computer_skill_score" value="K">
                                                            <label>Kurang</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
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

                                    <!-- UPDATE COMPUTER SKILL -->
                                    <div class="modal fade" id="modal-update-candidate-computer-skill">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Ubah Kemampuan Kompter</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form role="form" action="<?php echo base_url() ?>UpdateCandidateComputerSkill#13" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <input class="form-control" id="candidate_computer_skill_id_update" name="candidate_computer_skill_id_update" hidden></input>
                                                  <input class="form-control" id="request_candidate_id_update" name="request_candidate_id_update" value="<?php echo $this->session->userdata('request_candidate_id') ?>" hidden></input>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jenis Kemampuan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <input class="form-control" id="computer_skill_type_update" name="computer_skill_type_update" placeholder="Contoh : Ms.Word, Excel, Power Point, dll" required></input>
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Tingkat Kemampuan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <fieldset id="computer_skill_score_update">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <input type="radio" name="computer_skill_score_update" value="B">
                                                            <label>Baik</label>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="computer_skill_score_update" value="C">
                                                            <label>Cukup</label><br>
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="radio" name="computer_skill_score_update" value="K">
                                                            <label>Kurang</label><br>
                                                          </div>
                                                        </div>
                                                      </fieldset>
                                                    </div>
                                                  </div>
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

  </section>
</div>

<script>
  //EDIT CANDIDATE FAMILY
  $(document).on("click", "#btnEditCandidateFamily", function() {

    var candidate_family_id = $(this).data("candidatefamilyid");
    var request_candidate_id = $(this).data("requestcandidateid");
    var family_realitionship_id = $(this).data("familyrealitionshipid");
    var name = $(this).data("name");
    var gender_id = $(this).data("genderid");
    var age = $(this).data("age");
    var last_education_id = $(this).data("lasteducationid");
    var profession_name = $(this).data("professionname");
    var description = $(this).data("description");


    $("#candidate_family_id_update").val(candidate_family_id);
    $("#request_candidate_id_update").val(request_candidate_id);
    $("#family_realitionship_id_update").val(family_realitionship_id);
    $("#family_realitionship_id_update").val(family_realitionship_id).trigger("change");
    $("#name_update").val(name);
    $("input:radio[name=gender_id_update][value='" + gender_id + "']").prop('checked', true);
    $("#age_update").val(age);
    $("#last_education_id_update").val(last_education_id);
    $("#last_education_id_update").val(last_education_id).trigger("change");
    $("#profession_name_update").val(profession_name);
    $("#description_update").val(description);

  });

  //EDIT CANDIDATE EDUCATION HISTORY
  $(document).on("click", "#btnEditCandidateEducationHistory", function() {

    var candidate_education_history_id = $(this).data("candidateeducationhistoryid");
    var request_candidate_id = $(this).data("requestcandidateid");
    var from_year = $(this).data("fromyear");
    var to_year = $(this).data("toyear");
    var education_level_id = $(this).data("educationlevelid");
    var school_name = $(this).data("schoolname");
    var school_place = $(this).data("schoolplace");
    var school_majors = $(this).data("schoolmajors");
    var school_certified_status = $(this).data("schoolcertifiedstatus");


    $("#candidate_education_history_id_update").val(candidate_education_history_id);
    $("#request_candidate_id_update").val(request_candidate_id);
    $("#from_year_update").val(from_year);
    $("#to_year_update").val(to_year);
    $("#education_level_id_update").val(education_level_id);
    $("#education_level_id_update").val(education_level_id).trigger("change");
    $("#school_name_update").val(school_name);
    $("#school_place_update").val(school_place);
    $("#school_majors_update").val(school_majors);
    $("input[name='school_certified_status_update'][value='" + school_certified_status + "']").prop("checked", true);

  });


  //EDIT CANDIDATE COURSES
  $(document).on("click", "#btnEditCandidateCourses", function() {

    var candidate_courses_id = $(this).data("candidatecoursesid");
    var request_candidate_id = $(this).data("requestcandidateid");
    var courses_old = $(this).data("coursesold");
    var courses_year = $(this).data("coursesyear");
    var courses_type = $(this).data("coursestype");
    var courses_organizer = $(this).data("coursesorganizer");
    var courses_place = $(this).data("coursesplace");
    var courses_funded_by = $(this).data("coursesfundedby");
    var courses_certified_status = $(this).data("coursescertifiedstatus");


    $("#candidate_courses_id_update").val(candidate_courses_id);
    $("#request_candidate_id_update").val(request_candidate_id);
    $("#courses_old_update").val(courses_old);
    $("#courses_year_update").val(courses_year);
    $("#courses_type_update").val(courses_type);
    $("#courses_organizer_update").val(courses_organizer);
    $("#courses_place_update").val(courses_place);
    $("#courses_funded_by_update").val(courses_funded_by);
    $("input[name='courses_certified_status_update'][value='" + courses_certified_status + "']").prop("checked", true);

  });


  //EDIT CANDIDATE JOB HISTORY
  $(document).on("click", "#btnEditCandidateJobHistory", function() {

    var candidate_job_history_id = $(this).data("candidatejobhistoryid");
    var request_candidate_id = $(this).data("requestcandidateid");
    var company_name = $(this).data("companyname");
    var company_phone = $(this).data("companyphone");
    var working_from = $(this).data("workingfrom");
    var working_to = $(this).data("workingto");
    var working_position = $(this).data("workingposition");
    var direct_leader_name = $(this).data("directleadername");
    var direct_leader_position = $(this).data("directleaderposition");
    var reason_to_leave_work = $(this).data("reasontoleavework");
    var last_salary = $(this).data("lastsalary");
    // var checkoutHistory = document.getElementById('working_to_update_c');

    $("#candidate_job_history_id_update").val(candidate_job_history_id);
    $("#request_candidate_id_update").val(request_candidate_id);
    $("#company_name_update").val(company_name);
    $("#company_phone_update").val(company_phone);
    $("#working_from_update").val(working_from);
    $("#working_to_update").val(working_to);
    $("#working_position_update").val(working_position);
    $("#direct_leader_name_update").val(direct_leader_name);
    $("#direct_leader_position_update").val(direct_leader_position);
    $("#reason_to_leave_work_update").val(reason_to_leave_work);
    $("#last_salary_update").val(last_salary);
    // $("input[name='working_to_update'][value='" + working_to + "']").prop("checked", true);

    $(document).ready(function() {
      $("input:checkbox").change(function() {
        if ($('#working_to_update_c').is(":checked")) {
          // alert('i m here');
          $('#workingtoupdate').hide();
        } else {
          $('#workingtoupdate').show();

        }
      })
    });
  });


  //EDIT CANDIDATE REFERENCE
  $(document).on("click", "#btnEditCandidateReference", function() {

    var candidate_reference_id = $(this).data("candidatereferenceid");
    var request_candidate_id = $(this).data("requestcandidateid");
    var referee_name = $(this).data("refereename");
    var referee_position = $(this).data("refereeposition");
    var company_name = $(this).data("companynameref");
    var referee_relationship = $(this).data("refereerelationship");
    var referee_address = $(this).data("refereeaddress");
    var referee_phone_no = $(this).data("refereephoneno");


    $("#candidate_reference_id_update").val(candidate_reference_id);
    $("#request_candidate_id_update").val(request_candidate_id);
    $("#referee_name_update").val(referee_name);
    $("#referee_position_update").val(referee_position);
    $("#company_name_ref_update").val(company_name);
    $("#referee_relationship_update").val(referee_relationship);
    $("#referee_address_update").val(referee_address);
    $("#referee_phone_no_update").val(referee_phone_no);

  });

  //EDIT CANDIDATE EMERGENCY CONTACT
  $(document).on("click", "#btnEditCandidateEmergencyContact", function() {

    var candidate_emergency_contact_id = $(this).data("candidateemergencycontactid");
    var request_candidate_id = $(this).data("requestcandidateid");
    var emergency_contact_name = $(this).data("emergencycontactname");
    var emergency_contact_relationship = $(this).data("emergencycontactrelationship");
    var emergency_contact_address = $(this).data("emergencycontactaddress");
    var emergency_contact_phone_no = $(this).data("emergencycontactphoneno");


    $("#candidate_emergency_contact_id_update").val(candidate_emergency_contact_id);
    $("#request_candidate_id_update").val(request_candidate_id);
    $("#emergency_contact_name_update").val(emergency_contact_name);
    $("#emergency_contact_relationship_update").val(emergency_contact_relationship);
    $("#emergency_contact_address_update").val(emergency_contact_address);
    $("#emergency_contact_phone_no_update").val(emergency_contact_phone_no);

  });

  //EDIT CANDIDATE SOCIAL ACTIVITY
  $(document).on("click", "#btnEditCandidateSocialActivity", function() {

    var candidate_social_activity_id = $(this).data("candidatesocialactivityid");
    var request_candidate_id = $(this).data("requestcandidateid");
    var activity_social_year = $(this).data("activitysocialyear");
    var activity_social_position = $(this).data("activitysocialposition");
    var activity_type_name = $(this).data("activitytypename");

    $("#candidate_social_activity_id_update").val(candidate_social_activity_id);
    $("#request_candidate_id_update").val(request_candidate_id);
    $("#activity_social_year_update").val(activity_social_year);
    $("#activity_social_position_update").val(activity_social_position);
    $("#activity_type_name_update").val(activity_type_name);

  });

  //EDIT CANDIDATE HOBBY
  $(document).on("click", "#btnEditCandidateHobby", function() {

    var candidate_hobby_id = $(this).data("candidatehobbyid");
    var request_candidate_id = $(this).data("requestcandidateid");
    var hobby_name = $(this).data("hobbyname");

    $("#candidate_hobby_id_update").val(candidate_hobby_id);
    $("#request_candidate_id_update").val(request_candidate_id);
    $("#hobby_name_update").val(hobby_name);

  });

  //EDIT CANDIDATE ACHIEVEMENT 
  $(document).on("click", "#btnEditCandidateAchievement", function() {

    var candidate_achievement_id = $(this).data("candidateachievementid");
    var request_candidate_id = $(this).data("requestcandidateid");
    var achievement_year = $(this).data("achievementyear");
    var achievement_type = $(this).data("achievementtype");
    var achievement_level = $(this).data("achievementlevel");
    var achievement_region = $(this).data("achievementregion");
    var achievement_result = $(this).data("achievementresult");


    $("#candidate_achievement_id_update").val(candidate_achievement_id);
    $("#request_candidate_id_update").val(request_candidate_id);
    $("#achievement_year_update").val(achievement_year);
    $("#achievement_type_update").val(achievement_type);
    $("#achievement_level_update").val(achievement_level);
    $("#achievement_region_update").val(achievement_region);
    $("#achievement_result_update").val(achievement_result);

  });


  //EDIT CANDIDATE LANGUAGE SKILL 
  $(document).on("click", "#btnEditCandidateLanguageSkill", function() {

    var candidate_language_skill_id = $(this).data("candidatelanguageskillid");
    var request_candidate_id = $(this).data("requestcandidateid");
    var language_type = $(this).data("languagetype");
    var listening_score = $(this).data("listeningscore");
    var speaking_score = $(this).data("speakingscore");
    var reading_score = $(this).data("readingscore");
    var writing_score = $(this).data("writingscore");


    $("#candidate_language_skill_id_update").val(candidate_language_skill_id);
    $("#request_candidate_id_update").val(request_candidate_id);
    $("#language_type_update").val(language_type);
    $("#language_type_update").val(language_type).trigger("change");
    $("input:radio[name=listening_score_update][value='" + listening_score + "']").prop('checked', true);
    $("input:radio[name=speaking_score_update][value='" + speaking_score + "']").prop('checked', true);
    $("input:radio[name=reading_score_update][value='" + reading_score + "']").prop('checked', true);
    $("input:radio[name=writing_score_update][value='" + writing_score + "']").prop('checked', true);

  });


  //EDIT CANDIDATE COMPUTER SKILL 
  $(document).on("click", "#btnEditCandidateComputerSkill", function() {

    var candidate_computer_skill_id = $(this).data("candidatecomputerskillid");
    var request_candidate_id = $(this).data("requestcandidateid");
    var computer_skill_type = $(this).data("computerskilltype");
    var computer_skill_score = $(this).data("computerskillscore");


    $("#candidate_computer_skill_id_update").val(candidate_computer_skill_id);
    $("#request_candidate_id_update").val(request_candidate_id);
    $("#computer_skill_type_update").val(computer_skill_type);
    $("input:radio[name=computer_skill_score_update][value='" + computer_skill_score + "']").prop('checked', true);

  });
</script>

<script>
  $(document).ready(function() {
    $('#last_salary').mask('#.##0', {
      reverse: true
    });
  })
  $(document).ready(function() {
    $('#last_salary_update').mask('#.##0', {
      reverse: true
    });
  })

  $(document).ready(function() {
    $('#last_salary_c').mask('#.##0', {
      reverse: true
    });
  })

  $(document).ready(function() {
    $('#transport_allowance').mask('#.##0', {
      reverse: true
    });
  })

  $(document).ready(function() {
    $('#meal_allowance').mask('#.##0', {
      reverse: true
    });
  })
  $(document).ready(function() {
    $('#insurance_allowance').mask('#.##0', {
      reverse: true
    });
  })
  $(document).ready(function() {
    $('#summary_expected_salary').mask('#.##0', {
      reverse: true
    });
  })

  $(document).ready(function() {
    $("input:checkbox").change(function() {
      if ($('#working_to_c').is(":checked")) {
        // alert('i m here');
        $('#workingto').hide();
      } else {
        $('#workingto').show();

      }
    })
  });

  $(document).ready(function() {
    var question7 = $("#question_7_").val();
    var question8 = $("#question_8_").val();
    var question9 = $("#question_9_").val();
    var question10 = $("#question_10_").val();

    $("input:radio[name=question_7][value='" + question7 + "']").prop('checked', true);
    $("input:radio[name=question_8][value='" + question8 + "']").prop('checked', true);
    $("input:radio[name=question_9][value='" + question9 + "']").prop('checked', true);
    $("input:radio[name=question_10][value='" + question10 + "']").prop('checked', true);

    console.log(question7);
  })

  $("#btnCandidateQuestionNext").on('click', function(e) {

    var requestcandidateid = $("#request_candidate_id").val();

    $.ajax({
      url: '<?php echo base_url() ?>CandidateQuestionNext',
      data: {
        request_candidate_id: requestcandidateid
      },
      type: 'post',
      async: true,
      dataType: 'json',
      cache: false,
      success: function(response) {

        if (response != null) {
          window.location.href = "<?php echo base_url() ?>ApplicationForm";
        } else {}
      }
    })

  });
</script>