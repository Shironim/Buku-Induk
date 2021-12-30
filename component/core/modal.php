<script>
function refresh() {
    location.reload();
}
</script>
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color:black">Hapus</h4>
              </div>
              <div class="modal-body">
               <iframe src="hapus-karyawan.php?username=<?php  echo $fill['username']; ?>" width="100%" height="100%" scrolling="no" frameborder="0"></iframe>
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-default pull-right" style="color:black; border:1" data-dismiss="modal" onclick="refresh()">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
     
      <!-- /.example-modal -->