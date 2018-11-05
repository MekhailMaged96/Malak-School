<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalCenterTitle">Edit Course</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="form-data" name="form-data">
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input type="text"  class="form-control" id="name" value="">
                        </div>
                    </div>
                   
                </form>
            </div>
            <div class="modal-footer" id="modal-edit">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btn-save">Save changes</button>
              <input type="hidden" id="course_id" name="course_id" value="0">
            </div>
          </div>
        </div>
     </div>
                 
       