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
                  <h4>Announcement</h4>
                </div>
                <div class="col-sm-6">
                  <div class="col-xs-12 text-right">
                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-announcement">
                      <i class="fa fa-plus"></i> Add Announcement
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
              <table id="announcement_table" class="table table-bordered  table-striped table-responsive">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  if (!empty($AnnouncementRecords)) {
                    foreach ($AnnouncementRecords as $record) {
                  ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?php echo $record->announcement_title ?></td>
                        <td><?php echo $record->description ?></td>
                        <td><img src="<?php echo base_url(); ?>upload/<?php echo $record->image_url ?>" class="img-thumbnail" />
                        </td>
                        <td class="text-center">
                          <a id="btnSelect" class="btn btn-xs btn-primary" data-announcementid="<?= $record->announcement_id ?>" data-announcementtitle="<?= $record->announcement_title ?>" data-description="<?= $record->description ?>" data-imageurl="<?= $record->image_url ?>" data-toggle="modal" data-target="#modal-announcement-update">
                            <i class="fa fa-pen"></i></a>
                          <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteAnnouncement/' . $record->announcement_id; ?>"><i class="fa fa-trash"></i></a>
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
  <div class="modal fade" id="modal-announcement">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Insert Announcement</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="<?php echo base_url() ?>InsertAnnouncement" enctype="multipart/form-data" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <label for="announcementtitle">Announcement Title</label>
                <input class="form-control" id="announcement_title" placeholder="Announcement Title" name="announcement_title" required>
                <br>
                <label for="description">Description</label>
                <textarea class="form-control" id="description" placeholder="Description" name="description" required></textarea>
                <br>
                <label for="imageurl">Image</label>
                <input class="form-control" type="file" name="image" id="image" required accept=".jpeg,.jpg,.png,.pdf">
                <small>
                  <font color="red">Type file : jpeg/jpg/png/pdf</font>
                </small>
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

  <div class="modal fade" id="modal-announcement-update">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Announcement</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="<?php echo base_url() ?>UpdateAnnouncement" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <input class="form-control" id="announcement_id_update" placeholder="Announcement ID" name="announcement_id" value="<?= $record->announcement_id; ?>" hidden>
                <label for="announcementtitle">Announcement Title</label>
                <input class="form-control" id="announcement_title_update" placeholder="Announcement Title" name="announcement_title" required>
                <br>
                <label for="description">Description</label>
                <textarea class="form-control" id="description_update" placeholder="Description" name="description" required></textarea>
                <br>
                <label for="imageurl">Image</label>
                <input class="form-control" type="file" name="image" id="image_update" accept=".jpeg,.jpg,.png,.pdf">
                <input type="hidden" id="image_url" name="image_url">
                <small>
                  <font color="red">Type file : jpeg/jpg/png/pdf</font>
                </small>
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
  $(document).on("click", "#btnSelect", function() {

    var announcement_id = $(this).data("announcementid");
    var announcement_title = $(this).data("announcementtitle");
    var description = $(this).data("description");
    var image_url = $(this).data("imageurl");

    $("#announcement_id_update").val(announcement_id);
    $("#announcement_title_update").val(announcement_title);
    $("#description_update").val(description);
    $("#image_url").val(image_url);

  });


  $(document).on("click", "#btnAdd", function() {


  });
</script>