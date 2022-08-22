<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

    <!-- BEGIN: Content-->
            
                <!-- Blog Edit -->
                <div class="blog-edit-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <!-- Form -->
                                    <form method="post" action="../admin/artikel/simpan_artikel.php" enctype="multipart/form-data" >
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-2">
                                                    <label class="form-label" for="Judul">Judul</label>
                                                    <input type="text" id="blog-edit-title" class="form-control" name="judul" placeholder="Judul Artikel"/>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 col-12">
                                                <div class="mb-2">
                                                    <label class="form-label" for="status">Status</label>
                                                    <select class="form-select" id="status" name="status">
                                                        <option value="Published">Published</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Draft">Draft</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <label class="form-label" for="isi">Isi Konten</label>
                                                    <div id="blog-editor-wrapper">
                                                        <div id="blog-editor-container">
                                                            <textarea class="editor form-control" id="isi" name="isi"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-12 mb-2">
                                                <div class="border rounded p-2">
                                                    <h4 class="mb-1">Image</h4>
                                                    <div class="d-flex flex-column flex-md-row">
                                                       
                                                        <div class="featured-info">
                                                            <small class="text-muted">Required image jpeg, jpg, png, and image size 10mb or lower</small>
                                                            </br>
                                                            <div class="d-inline-block">
                                                            <input type="file" name="fileToUpload" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-50">
                                                <button type="submit" class="btn btn-primary me-1"  name="submit" value="Save" >Save Changes</button>
                                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ Form -->
                                </div>
                            </div>
                        </div>
                    </div>
              
                <!--/ Blog Edit -->

            </div>
   
    <!-- END: Content-->

  
    

    <!-- BEGIN: Page Vendor JS-->
    <script src="../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../app-assets/vendors/js/editors/quill/katex.min.js"></script>
    <script src="../app-assets/vendors/js/editors/quill/highlight.min.js"></script>
    <script src="../app-assets/vendors/js/editors/quill/quill.min.js"></script>
    <!-- END: Page Vendor JS-->

  
    
</body>
<!-- END: Body-->

</html>