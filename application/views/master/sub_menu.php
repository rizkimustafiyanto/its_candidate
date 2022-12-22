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
                  <h4>Sub Menu</h4>
                </div>
                <div class="col-sm-6">
                  <div class="col-xs-12 text-right">
                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-sub-menu">
                      <i class="fa fa-plus"></i> Add Sub Menu
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

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sub Menu Id</th>
                    <th>Sub Menu Name</th>
                    <th>Menu Name</th>
                    <th>Sub Menu Url</th>
                    <th>Sub Menu Icon</th>
                    <th>Creation</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($SubMenuRecords)) {
                    foreach ($SubMenuRecords as $record) {
                  ?>
                      <tr>
                        <td><?php echo $record->sub_menu_id ?></td>
                        <td><?php echo $record->sub_menu_name ?></td>
                        <td><?php echo $record->menu_name ?></td>
                        <td><?php echo $record->sub_menu_url ?></td>
                        <td><?php echo $record->sub_menu_icon ?></td>
                        <td><?php echo $record->creation_user_name ?></td>
                        <td><?php echo $record->change_datetime ?></td>
                        <td class="text-center">

                          <a id="btnSelect" class="btn btn-xs btn-primary" data-submenuname="<?= $record->sub_menu_name ?>" data-submenuurl="<?= $record->sub_menu_url ?>" data-menuid="<?= $record->menu_id ?>" data-submenuid="<?= $record->sub_menu_id ?>" data-submenuicon="<?= $record->sub_menu_icon ?>" data-toggle="modal" data-target="#modal-sub-menu-update"><i class="fa fa-pen"></i></a>

                          <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteSubMenu/' . $record->sub_menu_id; ?>"><i class="fa fa-trash"></i></a>
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

  <!-- Modal -->

  <div class="modal fade" id="modal-sub-menu">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input Sub Menu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="<?php echo base_url() ?>InsertSubMenu" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <label for="submenuname">Sub Menu Name</label>
                <input class="form-control" id="sub_menu_name" placeholder="Sub Menu Name" name="sub_menu_name" maxlength="50" required>
                <br>
                <label>Menu Name</label>
                <select class="form-control select2bs4" name="menu_id">
                  <?php foreach ($MenuRecords as $row) : ?>
                    <option value="<?php echo $row->menu_id; ?>"><?php echo $row->menu_name; ?></option>
                  <?php endforeach; ?>
                </select>
                <br>
                <label for="submenuurl">Sub Menu Url</label>
                <input class="form-control" id="sub_menu_url" placeholder="Sub Menu Url" name="sub_menu_url" maxlength="50" required>
                <br>
                <label for="counterformatno">Sub Menu Icon</label>
                <input class="form-control" id="sub_menu_icon" placeholder="Sub Menu Icon" name="sub_menu_icon" maxlength="50" required>
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


  <div class="modal fade" id="modal-sub-menu-update">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Sub Menu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="<?php echo base_url() ?>UpdateSubMenu" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <input type="hidden" value="" name="sub_menu_id_update" id="sub_menu_id_update" />
                <label for="submenuname">Sub Menu Name</label>
                <input class="form-control" id="sub_menu_name_update" placeholder="Sub Menu Name" name="sub_menu_name_update" maxlength="50" required>
                <br>
                <label>Menu Name</label>
                <select id="menu_id_update" class="form-control select2bs4" name="menu_id_update">
                  <?php foreach ($MenuRecords as $row) : ?>
                    <option value="<?php echo $row->menu_id; ?>"><?php echo $row->menu_name; ?></option>
                  <?php endforeach; ?>
                </select>
                <br>
                <label for="submenuurl">Sub Menu Url</label>
                <input class="form-control" id="sub_menu_url_update" placeholder="Sub Menu Url" name="sub_menu_url_update" maxlength="50" required>
                <br>
                <label for="counterformatno">Sub Menu Icon</label>
                <input class="form-control" id="sub_menu_icon_update" placeholder="Sub Menu Icon" name="sub_menu_icon_update" maxlength="50" required>
              </div>

            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <input type="submit" id="btnUpdate" class="btn btn-primary" value="Update" />
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
  $(document).on("click", "#btnSelect", function() {
    //Counter
    var sub_menu_name = $(this).data("submenuname");
    var sub_menu_url = $(this).data("submenuurl");
    var sub_menu_icon = $(this).data("submenuicon");
    var sub_menu_id = $(this).data("submenuid");
    var menu_id = $(this).data("menuid");

    $("#sub_menu_name_update").val(sub_menu_name);
    $("#sub_menu_url_update").val(sub_menu_url);
    $("#sub_menu_icon_update").val(sub_menu_icon);

    $("#sub_menu_id_update").val(sub_menu_id);
    $("#menu_id_update").val(menu_id).trigger("change");;

  });

  $(document).on("click", "#btnAdd", function() {
    // Counter
    $("#sub_menu_name").val("");
    $("#sub_menu_url").val("");
    $("#sub_menu_icon").val("");

  });
</script>