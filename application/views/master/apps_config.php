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
                  <h4>Apps Config</h4>
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

          <!-- <?php print_r($ApprovalMatrixRecords); ?> -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="shift_table" class="table table-bordered  table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Apps Name</th>
                    <th>Apps OS</th>
                    <th>Apps Version</th>
                    <th>Apps Status</th>
                    <th>Apps Update Link</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  if (!empty($AppsConfigRecords)) {
                    foreach ($AppsConfigRecords as $record) {
                  ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?php echo $record->apps_name ?></td>
                        <td><?php echo $record->apps_os ?></td>
                        <td><?php echo $record->apps_version ?></td>
                        <td><?php echo $record->apps_status ?></td>
                        <td><?php echo $record->apps_update_link ?></td>
                        <td class="text-center">
                          <a id="btnSelect" class="btn btn-xs btn-primary" data-appsconfigid="<?= $record->apps_config_id ?>" data-appsname="<?= $record->apps_name ?>" data-appsos="<?= $record->apps_os ?>" data-appsversion="<?= $record->apps_version ?>" data-appsstatus="<?= $record->apps_status ?>" data-appsupdatelink="<?= $record->apps_update_link ?>" data-toggle="modal" data-target="#modal-apps-config-update">
                            <i class="fa fa-pen"></i></a>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="modal-apps-config-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Apps Config</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>UpdateAppsConfig" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <input class="form-control" id="apps_config_id_update" placeholder="Apps Config ID" name="apps_config_id_update" hidden required>
              <label>Apps Name</label>
              <input class="form-control" id="apps_name_update" placeholder="Apps Name" name="apps_name_update" required readonly>
              <br>
              <label>Apps OS</label>
              <input class="form-control" id="apps_os_update" placeholder="Apps OS" name="apps_os_update" required readonly>
              <br>
              <label>Apps Version</label>
              <input class="form-control" id="apps_version_update" placeholder="Apps Version" name="apps_version_update" required>
              <br>
              <label>Apps Status</label>
              <input class="form-control" id="apps_status_update" placeholder="Apps Name" name="apps_status_update" required>
              <br>
              <label>Apps Update Link</label>
              <textarea class="form-control" id="apps_update_link_update" placeholder="Apps Update Link" name="apps_update_link_update" required></textarea>
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
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  $(document).on("click", "#btnSelect", function() {

    var apps_config_id = $(this).data("appsconfigid");
    var apps_name = $(this).data("appsname");
    var apps_os = $(this).data("appsos");
    var apps_version = $(this).data("appsversion");
    var apps_status = $(this).data("appsstatus");
    var apps_update_link = $(this).data("appsupdatelink");

    $("#apps_config_id_update").val(apps_config_id);
    $("#apps_name_update").val(apps_name);
    $("#apps_os_update").val(apps_os);
    $("#apps_version_update").val(apps_version);
    $("#apps_status_update").val(apps_status);
    $("#apps_update_link_update").val(apps_update_link);

  });


  $(document).on("click", "#btnAdd", function() {
    // dealer

  });
</script>