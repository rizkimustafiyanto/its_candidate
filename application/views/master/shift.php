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
                  <h4>Shift</h4>
                </div>
                <div class="col-sm-6">
                  <div class="col-xs-12 text-right">
                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-shift">
                      <i class="fa fa-plus"></i> Add Shift
                    </button>
                  </div>
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
                    <!-- <th>Approval ID</th> -->
                    <th>Shift ID</th>
                    <th>Shift Name</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  if (!empty($ShiftRecords)) {
                    foreach ($ShiftRecords as $record) {
                  ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?php echo $record->shift_id ?></td>
                        <td><?php echo $record->shift_name ?></td>
                        <td><?php echo $record->description ?></td>
                        <td class="text-center">
                          <!-- <a id="btnSelect" class="btn btn-xs btn-primary" data-shiftid="<?= $record->shift_id ?>" data-shiftname="<?= $record->shift_name ?>" data-description="<?= $record->description ?>" data-toggle="modal" data-target="#modal-shift-update">
                            <i class="fa fa-pen"></i></a> -->
                          <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'ShiftDetail/' . $record->shift_id; ?>"><i class="fa fa-pen"></i></a>
                          <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteShift/' . $record->shift_id; ?>"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="modal-shift">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Insert Shift</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>InsertShift" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label for="shiftid">Shift ID/Unik</label>
              <input class="form-control" id="shift_id" placeholder="Shift ID" name="shift_id" maxlength="50" required>
              <br>
              <label for="shiftname">Shift Name</label>
              <input class="form-control" id="shift_name" placeholder="Shift Name" name="shift_name" maxlength="50" required>
              <br>
              <label for="description">Description</label>
              <textarea class="form-control" id="description" placeholder="Description" name="description"></textarea>
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
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-shift-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Shift</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>UpdateShift" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label>Shift ID/Unik</label>
              <input class="form-control" id="shift_id_update" placeholder="Shift ID" name="shift_id_update" value="<?= $record->shift_id; ?>" maxlength="50" readonly>
              <br>
              <label>Shift Name</label>
              <input class="form-control" id="shift_name_update" placeholder="Shift Name" name="shift_name_update" value="<?= $record->shift_name; ?>" maxlength="50" required>
              <br>
              <label>Description</label>
              <textarea class="form-control" id="description" placeholder="Description" name="description"><?php echo $record->description; ?></textarea>
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

    var shift_id = $(this).data("shiftid");
    var shift_name = $(this).data("shiftname");
    var description = $(this).data("description");


    $("#shift_id_update").val(shift_id);
    $("#shift_name_update").val(shift_name);
    $("#description_update").val(description);

  });


  $(document).on("click", "#btnAdd", function() {
    // dealer

  });
</script>