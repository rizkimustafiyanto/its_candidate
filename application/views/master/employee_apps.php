<div class="content-wrapper">
  <div style="height: 20px;"></div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-sm card-default">
            <div class="card-header">
              <div class="row ">
                <div class="col-sm-6">
                  <h4>Employee Apps</h4>
                </div>
                <div class="col-sm-6">
                  <!-- <?php if ($this->session->userdata('role_id') == '1') { ?>
                    <div class="col-xs-12 text-right">
                      <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-employee-apps">
                        <i class="fa fa-plus"></i> Add Employee Apps
                      </button>
                    </div>
                  <?php } ?> -->
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

          <!-- <?php print_r($ApprovalMatrixRecords); ?> -->
          <div class="card">
            <div class="card-body">
              <table id="shift_table" class="table table-bordered  table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Employee Name</th>
                    <th>FCM Token</th>
                    <th>Version Apps</th>
                    <th>Mobile OS</th>
                    <th>OS Version</th>
                    <!-- <th>Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  if (!empty($EmployeeAppsRecords)) {
                    foreach ($EmployeeAppsRecords as $record) {
                  ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?php echo $record->employee_name ?></td>
                        <td><?php echo $record->fcm_token ?></td>
                        <td><?php echo $record->version_apps ?></td>
                        <td><?php echo $record->mobile_os ?></td>
                        <td><?php echo $record->os_version ?></td>
                        <!-- <td class="text-center">
                          <a id="btnSelect" class="btn btn-xs btn-primary" data-employeeappsid="<?= $record->employee_apps_id ?>" data-employeeid="<?= $record->employee_id ?>" data-fcmtoken="<?= $record->fcm_token ?>" data-versionapps="<?= $record->version_apps ?>" data-mobileos="<?= $record->mobile_os ?>" data-osversion="<?= $record->os_version ?>" data-toggle="modal" data-target="#modal-employee-apps-update">
                            <i class="fa fa-pen"></i></a>
                          <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteEmployeeApps/' . $record->employee_apps_id; ?>"><i class="fa fa-trash"></i></a>
                        </td> -->
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="modal-employee-apps">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Insert Employee Apps</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>InsertEmployeeApps" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label>Employee Name</label>
              <!-- <input class="form-control" id="apps_name" placeholder="Apps Name" name="apps_name" required> -->
              <br>
              <label>FCM Token</label>
              <input class="form-control" id="fcm_token" placeholder="FCM Token" name="fcm_token" required>
              <br>
              <label>Version Apps</label>
              <input class="form-control" id="version_apps" placeholder="Version Apps" name="version_apps" required>
              <br>
              <label>Mobile OS</label>
              <input class="form-control" id="mobile_os" placeholder="Mobile OS" name="mobile_os" required>
              <br>
              <label>OS Version</label>
              <textarea class="form-control" id="os_version" placeholder="OS Version" name="apps_update_link"></textarea>
              <br>
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

<div class="modal fade" id="modal-employee-apps-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Employee Apps</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>UpdateEmployeeApps" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <input class="form-control" id="employee_apps_id_update" placeholder="Employee Apps ID" name="employee_apps_id_update" hidden required>
              <label>Employee Name</label>
              <!-- <input class="form-control" id="apps_name_update" placeholder="Apps Name" name="apps_name_update" required> -->
              <br>
              <label>FCM Token</label>
              <input class="form-control" id="fcm_token_update" placeholder="FCM Token" name="fcm_token_update" required>
              <br>
              <label>Version Apps</label>
              <input class="form-control" id="version_apps_update" placeholder="Version Apps" name="version_apps_update" required>
              <br>
              <label>Mobile OS</label>
              <input class="form-control" id="mobile_os_update" placeholder="Mobile OS" name="mobile_os_update" required>
              <br>
              <label>OS Version</label>
              <textarea class="form-control" id="os_version_update" placeholder="OS Version" name="os_version" required></textarea>
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

<script>
  $(document).on("click", "#btnSelect", function() {

    var employee_apps_id = $(this).data("employeeappsid");
    var employee_id = $(this).data("employeeid");
    var fcm_token = $(this).data("fcmtoken");
    var version_apps = $(this).data("versionapps");
    var mobile_os = $(this).data("mobileos");
    var os_version = $(this).data("osversion");

    $("#employee_apps_id_update").val(employee_apps_id);
    $("#employee_id_update").val(employee_id);
    $("#fcm_token_update").val(fcm_token);
    $("#version_apps_update").val(version_apps);
    $("#mobile_os_update").val(mobile_os);
    $("#os_version_update").val(os_version);

  });
</script>