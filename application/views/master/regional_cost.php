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
                  <h4>Regional Cost</h4>
                </div>
                <div class="col-sm-6">
                  <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                    <div class="col-xs-12 text-right">
                      <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-regional-cost">
                        <i class="fa fa-plus"></i> Add Regional Cost
                      </button>
                    </div>
                  <?php } ?>
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

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="paid_leave_level_table" class="table table-bordered  table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Regional Cost ID</th>
                    <th>Regional</th>
                    <th>Cost Name</th>
                    <th>Level</th>
                    <th>Nominal</th>
                    <th>Description</th>
                    <th>Editable</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  if (!empty($RegionalCostRecords)) {
                    foreach ($RegionalCostRecords as $record) {
                  ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?php echo $record->regional_cost_id ?></td>
                        <td><?php echo $record->regional_name ?></td>
                        <td><?php echo $record->cost_name ?></td>
                        <td><?php echo $record->level_name ?></td>
                        <td><?php echo number_format($record->nominal, 0, ",", "."); ?></td>
                        <!-- <td><?php echo $record->nominal; ?></td> -->
                        <td><?php echo $record->description ?></td>
                        <td><?php echo $record->editable_status ?></td>
                        <td class="text-center">
                          <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                            <a id="btnSelect" class="btn btn-xs btn-primary" data-regionalcostid="<?= $record->regional_cost_id ?>" data-regionalid="<?= $record->regional_id ?>" data-regionalname="<?= $record->regional_name ?>" data-costid="<?= $record->cost_id ?>" data-costname="<?= $record->cost_name ?>" data-levelid="<?= $record->level_id ?>" data-levelname="<?= $record->level_name ?>" data-nominal="<?= $record->nominal ?>" data-description="<?= $record->description ?>" data-editable="<?= $record->editable ?>" data-toggle="modal" data-target="#modal-regional-cost-update">
                              <i class="fa fa-pen"></i></a>
                            <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteRegionalCost/' . $record->regional_cost_id; ?>"><i class="fa fa-trash"></i></a>
                          <?php } ?>
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
<div class="modal fade" id="modal-regional-cost">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Insert Regional Cost</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>InsertRegionalCost" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <input class="form-control" id="regional_cost_id" placeholder="Regional Cost ID" name="regional_cost_id" value="<?= $kode; ?>" required readonly hidden>
              <br>
              <label>Regional</label>
              <select class="form-control select2bs4" name="regional_id" id="regional_id" required>
                <option disabled selected value="">--Select--</option>
                <?php foreach ($RegionalRecords as $row) : ?>
                  <option value="<?php echo $row->regional_id; ?>"><?php echo $row->regional_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label>Cost</label>
              <select class="form-control select2bs4" name="cost_id" id="cost_id" required>
                <option disabled selected value="">--Select--</option>
                <?php foreach ($CostRecords as $row) : ?>
                  <option value="<?php echo $row->cost_id; ?>"><?php echo $row->cost_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label>Level</label>
              <select class="form-control select2bs4" name="level_id" id="level_id" required>
                <option disabled selected value="">--Select--</option>
                <?php foreach ($EmployeeLevelRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label for="nominal">Nominal</label>
              <input type="number" class="form-control" id="nominal" placeholder="Nominal" name="nominal" maxlength="50" required>
              <br>
              <label>Editable</label>
              <select class="form-control select2bs4" name="editable" id="editable" required>
                <option disabled selected value="">--Select--</option>
                <?php foreach ($EditableRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                <?php endforeach; ?>
              </select>
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

<div class="modal fade" id="modal-regional-cost-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Regional Cost</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>UpdateRegionalCost" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label for="regionalcostid">Regional Cost ID</label>
              <input class="form-control" id="regional_cost_id_update" placeholder="Regional Cost ID" name="regional_cost_id_update" value="<?= $record->regional_cost_id; ?>" maxlength="50" readonly required>
              <br>
              <div class="form-group">
                <label>Regional</label>
                <select class="form-control select2bs4" id="regional_id_update" name="regional_id_update">
                  <?php
                  foreach ($RegionalRecords as $row) {
                    $selected = ($row->regional_id == $record->regional_id) ? 'selected' : '';
                  ?>
                    <option value="<?= $row->regional_id; ?>" <?= $selected; ?> class=""><?= $row->regional_name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Cost</label>
                <select class="form-control select2bs4" name="cost_id_update" id="cost_id_update">
                  <?php
                  foreach ($CostRecords as $row) {
                    $selected = ($row->cost_id == $cost_id) ? 'selected' : '';
                  ?>
                    <option value="<?= $row->cost_id; ?>" <?= $selected; ?> class=""><?= $row->cost_name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <label for="levelid">Level</label>
              <select class="form-control select2bs4" name="level_id_update" id="level_id_update">
                <?php
                foreach ($EmployeeLevelRecords as $row) {
                  $selected = ($row->variable_id == $level_id) ? 'selected' : '';
                ?>
                  <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                <?php } ?>
              </select>
              <br>
              <label for="nominal">Nominal</label>
              <input type="number" class="form-control" id="nominal_update" placeholder="Nominal" name="nominal_update" value="<?= $record->nominal; ?>" maxlength="50" required>
              <br>
              <label for="editable">Editable</label>
              <select class="form-control select2bs4" name="editable_update" id="editable_update">
                <?php
                foreach ($EditableRecords as $row) {
                  $selected = ($row->variable_id == $editable) ? 'selected' : '';
                ?>
                  <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                <?php } ?>
              </select>
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
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  $(document).on("click", "#btnSelect", function() {

    var regional_cost_id = $(this).data("regionalcostid");
    var regional_id = $(this).data("regionalid");
    var regional_name = $(this).data("regionalname");
    var cost_id = $(this).data("costid");
    var cost_name = $(this).data("costname");
    var level_id = $(this).data("levelid");
    var level_name = $(this).data("levelname");
    var nominal = $(this).data("nominal");
    var description = $(this).data("description");
    var editable = $(this).data("editable");

    $("#regional_cost_id_update").val(regional_cost_id);
    $("#regional_id_update").val(regional_id).trigger("change");
    $("#cost_id_update").val(cost_id).trigger("change");
    $("#level_id_update").val(level_id).trigger("change");
    $("#editable_update").val(editable).trigger("change");
    $("#level_name_update").val(level_name);
    $("#cost_name_update").val(cost_name);
    $("#regional_name_update").val(regional_name);
    $("#nominal_update").val(nominal);
    $("#description_update").val(description);
    $("#editable_update").val(editable);

  });


  $(document).on("click", "#btnAdd", function() {
    // dealer

  });
</script>