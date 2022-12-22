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
                  <h4>Approval Matrix</h4>
                </div>
                <div class="col-sm-6">
                  <div class="col-xs-12 text-right">
                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-approval-matrix">
                      <i class="fa fa-plus"></i> Add Approval Matrix
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
              <table id="approval_matrix_table" class="table table-bordered  table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <!-- <th>Approval ID</th> -->
                    <th>Approval Matrix</th>
                    <th>Approval Matrix Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  if (!empty($ApprovalMatrixRecords)) {
                    foreach ($ApprovalMatrixRecords as $record) {
                  ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <!-- <td><?php echo $record->approval_matrix_id ?></td> -->
                        <td><?php echo $record->approval_matrix ?></td>
                        <td><?php echo $record->approval_matrix_name ?></td>
                        <td class="text-center">
                          <a id="btnSelect" class="btn btn-xs btn-primary" data-approvalmatrixid="<?= $record->approval_matrix_id ?>" data-approvalmatrix="<?= $record->approval_matrix ?>" data-approvalmatrixname="<?= $record->approval_matrix_name ?>" data-toggle="modal" data-target="#modal-approval-matrix-update">
                            <i class="fa fa-pen"></i></a>
                          <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteApprovalMatrix/' . $record->approval_matrix_id; ?>"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="modal-approval-matrix">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Insert Approval Matrix</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>InsertApprovalMatrix" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label for="approvalmatrix">Approval Matrix ID/Unik</label>
              <input class="form-control" id="approval_matrix" placeholder="Approval Matrix" name="approval_matrix" maxlength="50" required>
              <br>
              <label for="approvalmatrixname">Approval Matrix Name</label>
              <input class="form-control" id="approval_matrix_name" placeholder="Approval Matrix Name" name="approval_matrix_name" maxlength="50" required>
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

<div class="modal fade" id="modal-approval-matrix-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Approval Matrix</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>UpdateApprovalMatrix" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <input class="form-control" id="approval_matrix_id_update" placeholder="Approval Matrix ID" name="approval_matrix_id_update" value="<?= $record->approval_matrix_id; ?>" hidden>
              <label>Approval Matrix ID/Unik</label>
              <input class="form-control" id="approval_matrix_update" placeholder="Approval Matrix" name="approval_matrix_update" value="<?= $record->approval_matrix; ?>" maxlength="50" required>
              <br>
              <label>Approval Matrix Name</label>
              <input class="form-control" id="approval_matrix_name_update" placeholder="Approval Matrix Name" name="approval_matrix_name_update" value="<?= $record->approval_matrix_name; ?>" maxlength="50" required>
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

    var approval_matrix_id = $(this).data("approvalmatrixid");
    var approval_matrix = $(this).data("approvalmatrix");
    var approval_matrix_name = $(this).data("approvalmatrixname");


    $("#approval_matrix_id_update").val(approval_matrix_id);
    $("#approval_matrix_update").val(approval_matrix);
    $("#approval_matrix_name_update").val(approval_matrix_name);

  });


  $(document).on("click", "#btnAdd", function() {
    // dealer

  });
</script>