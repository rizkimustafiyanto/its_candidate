<?php
$shift_id = '';
$shift_name = '';
$description = '';

if (!empty($ShiftRecords)) {
  foreach ($ShiftRecords as $row) {
    $shift_id = $row->shift_id;
    $shift_name = $row->shift_name;
    $description = $row->description;
  }
}
?>


<div class="content-wrapper">
  <div style="height: 20px;"></div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="row mb-1">
            <div class="col-sm-12">
              <strong>
                <h3>Shift Details</h3>
              </strong>
            </div>
            <!-- /.col -->
            <div class="col-lg-12">
              <ol class="breadcrumb float-sm-left" style="font-size: small; padding-top: 10px;">
                <li class=" breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item">Shift Details</li>
                <li class="breadcrumb-item active">
                  Edit
                </li>
              </ol>
            </div>
          </div>

          <!-- <?php print_r($ShiftDetailsRecords); ?> -->


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
                <button type="button" class="btn btn-md btn-primary" id="btnUpdateShift">
                  <i class="fa fa-edit"></i> Update
                </button>
              </div>
            </div>
          </div>
          <br>
          <!-- /.card-header -->

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-header">
                  <strong>
                    <h4 class="card-title"><b>Shift</b></h4>
                  </strong>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <label>Shift ID/Unik</label>
                    <input class="form-control" id="shift_id" placeholder="Shift ID" name="shift_id" value="<?php echo $shift_id; ?>" maxlength="50" readonly>
                    <br>
                    <br>
                    <label>Shift Name</label>
                    <input class="form-control" id="shift_name" placeholder="Shift Name" name="shift_name" value="<?php echo $shift_name; ?>" maxlength="50" required>
                    <br>
                    <br>
                    <label>Description</label>
                    <textarea class="form-control" id="description" placeholder="Description" name="description"><?php echo $description; ?></textarea>
                    <br>
                  </div>
                </div>
              </div>
              <div class="card">
                <!-- card-header -->
                <div class="card-header">
                  <strong>
                    <h4 class="card-title"><b>Shift Details</b></h4>
                  </strong>
                  <div class="card-tools">
                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-shift-details">
                      <i class="fa fa-plus"></i> Add Shift Details
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <table id="shift_details_2_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <!-- <th>Shift Details ID</th> -->
                        <!-- <th>Shift ID</th> -->
                        <!-- <th>Shift Name</th> -->
                        <th>Shift Day</th>
                        <th>Shift Time Start</th>
                        <th>Shift Time Finish</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      if (!empty($ShiftDetailsRecords)) {
                        foreach ($ShiftDetailsRecords as $record) {
                      ?>
                          <tr>
                            <td><?= $i++; ?></td>
                            <!-- <td><?php echo $record->shift_details_id ?></td> -->
                            <!-- <td><?php echo $record->shift_id ?></td> -->
                            <!-- <td><?php echo $record->shift_name ?></td> -->
                            <!-- <td><?php echo $record->shift_day ?></td> -->
                            <?php if ($record->shift_day == 'Monday') { ?>
                              <td><?php echo 'Senin'; ?></td>
                            <?php } else if ($record->shift_day == 'Tuesday') { ?>
                              <td><?php echo 'Selasa'; ?></td>
                            <?php } else if ($record->shift_day == 'Wednesday') { ?>
                              <td><?php echo 'Rabu'; ?></td>
                            <?php } else if ($record->shift_day == 'Thursday') { ?>
                              <td><?php echo 'Kamis'; ?></td>
                            <?php } else if ($record->shift_day == 'Friday') { ?>
                              <td><?php echo 'Jumat'; ?></td>
                            <?php } else if ($record->shift_day == 'Saturday') { ?>
                              <td><?php echo 'Sabtu'; ?></td>
                            <?php } else if ($record->shift_day == 'Sunday') { ?>
                              <td><?php echo 'Minggu'; ?></td>
                            <?php } ?>
                            <td><?php echo $record->shift_time_start ?></td>
                            <td><?php echo $record->shift_time_finish ?></td>
                            <td><?php echo $record->description ?></td>
                            <td class="text-center">
                              <a id="btnSelect" class="btn btn-xs btn-primary" data-shiftdetailsid="<?= $record->shift_details_id ?>" data-shiftid="<?= $record->shift_id ?>" data-shiftname="<?= $record->shift_name ?>" data-shiftday="<?= $record->shift_day ?>" data-shifttimestart="<?= $record->shift_time_start ?>" data-shifttimefinish="<?= $record->shift_time_finish ?>" data-description="<?= $record->description ?>" data-toggle="modal" data-target="#modal-shift-details-update">
                                <i class="fa fa-pen"></i></a>
                              <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteShiftDetails/' . $record->shift_details_id . '/' . $record->shift_id; ?>"><i class="fa fa-trash"></i></a>
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
              <!-- /.card -->
  </section>

  <!-- modal attachemnt overtime-->
  <div class="modal fade" id="modal-shift-details">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input Shift Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="<?php echo base_url() ?>InsertShiftDetails" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <label for="shiftid">Shift ID</label>
                <input class="form-control" id="shift_id" name="shift_id" value="<?php echo $shift_id; ?>" readonly>
                <br>
                <label for="shiftday">Shift Day</label>
                <select class="form-control select2bs4" name="shift_day" required>
                  <option disabled selected value="">--Select--</option>
                  <option value="Monday">Senin</option>
                  <option value="Tuesday">Selasa</option>
                  <option value="Wednesday">Rabu</option>
                  <option value="Thursday">Kamis</option>
                  <option value="Friday">Jumat</option>
                  <option value="Saturday">Sabtu</option>
                  <option value="Sunday">Minggu</option>
                </select>
                <br>
                <div class="form-group">
                  <label for="shifttimestart">Shift Time Start</label>
                  <div class="input-group date" id="datetime18" data-target-input="nearest">
                    <input type="text" id="shift_time_start" placeholder="Shift Time Start" name="shift_time_start" class="form-control datetimepicker-input" data-target="#datetime18" />
                    <div class="input-group-append" data-target="#datetime18" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-clock"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="shifttimefinish">Shift Time Finish</label>
                  <div class="input-group date" id="datetime19" data-target-input="nearest">
                    <input type="text" id="shift_time_finish" placeholder="Shift Time Finish" name="shift_time_finish" class="form-control datetimepicker-input" data-target="#datetime19" />
                    <div class="input-group-append" data-target="#datetime19" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-clock"></i></div>
                    </div>
                  </div>
                </div>
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

  <div class="modal fade" id="modal-shift-details-update">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Shift Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="<?php echo base_url() ?>UpdateShiftDetails" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <input class="form-control" id="shift_details_id_update" name="shift_details_id_update" hidden>
                <label>Shift ID</label>
                <input class="form-control" id="shift_id_update" name="shift_id_update" value="<?php echo $shift_id; ?>" readonly>
                <br>
                <label>Shift Day</label>
                <select class="form-control select2bs4" name="shift_day_update" id="shift_day_update" required>
                  <option disabled selected value="">--Select--</option>
                  <option value="Monday">Senin</option>
                  <option value="Tuesday">Selasa</option>
                  <option value="Wednesday">Rabu</option>
                  <option value="Thursday">Kamis</option>
                  <option value="Friday">Jumat</option>
                  <option value="Saturday">Sabtu</option>
                </select>
                <br>
                <div class="form-group">
                  <label for="shifttimestart">Shift Time Start</label>
                  <div class="input-group date" id="datetime20" data-target-input="nearest">
                    <input type="text" id="shift_time_start_update" placeholder="Shift Time Start" name="shift_time_start_update" class="form-control datetimepicker-input" data-target="#datetime20" />
                    <div class="input-group-append" data-target="#datetime20" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-clock"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="shifttimefinish">Shift Time Finish</label>
                  <div class="input-group date" id="datetime21" data-target-input="nearest">
                    <input type="text" id="shift_time_finish_update" placeholder="Shift Time Finish" name="shift_time_finish_update" class="form-control datetimepicker-input" data-target="#datetime21" />
                    <div class="input-group-append" data-target="#datetime21" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-clock"></i></div>
                    </div>
                  </div>
                </div>
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

</div>

<script>
  $(document).on("click", "#btnAdd", function() {

  });
</script>

<script>
  // Update Shift
  $(document).ready(function() {
    $("#btnUpdateShift").click(function() {

      var shiftid = $("#shift_id").val();
      var shiftname = $("#shift_name").val();
      var description = $("#description").val();

      $.ajax({
        url: '<?php echo base_url() ?>UpdateShift',
        data: {
          shift_id: shiftid,
          shift_name: shiftname,
          description: description,
        },
        type: 'post',
        async: true,
        dataType: 'json',
        cache: false,
        success: function(response) {
          if (response != null) {
            window.location.href = "<?php echo base_url() ?>ShiftDetail/" +
              shiftid;
          } else {}
        }
      })

    });
  })
</script>

<script>
  $(document).on("click", "#btnSelect", function() {

    var shift_details_id = $(this).data("shiftdetailsid");
    var shift_id = $(this).data("shiftid");
    var shift_name = $(this).data("shiftname");
    var shift_day = $(this).data("shiftday");
    var shift_time_start = $(this).data("shifttimestart");
    var shift_time_finish = $(this).data("shifttimefinish");
    var description = $(this).data("description");

    $("#shift_details_id_update").val(shift_details_id);
    $("#shift_id_update").val(shift_id);
    $("#shift_name_update").val(shift_name);
    $("#shift_day_update").val(shift_day).trigger("change");
    $("#shift_time_start_update").val(shift_time_start);
    $("#shift_time_finish_update").val(shift_time_finish);
    $("#description_update").val(description);

  });


  $(document).on("click", "#btnAdd", function() {
    // dealer

  });
</script>