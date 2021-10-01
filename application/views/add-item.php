<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>VH21-Streak | Monthly Expense Analysis | Add Bills</title>
</head>
<?php $this->load->view('template/cdn') ?>
<link rel="stylesheet" href="../../assets/css/style.css">
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 33px !important;
    }

    .select2-container .select2-selection--single {
        height: 33px !important;
    }
</style>

<body>
    <?php $this->load->view('template/navbar') ?>
    <div class="container-fluid pt-4 shadow">
        <div class="row">
            <div class="col-md-6">
                <div class="text-center mb-3">
                    <h2>Add your Bills Manually.</h2>
                </div>
                <form class="row g-3 needs-validation p-3 w-75 m-auto" novalidate>
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <label for="validationCustom01" class="form-label">Document No.</label>
                            <input type="text" class="form-control" id="validationCustom01" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="validationCustom02" class="form-label">Bill Date</label>
                            <input type="date" class="form-control" id="validationCustom02" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <label for="validationCustom01" class="form-label">Category</label>
                            <select class="category-select2 form-control">
                                <option selected="selected">orange</option>
                                <option>white</option>
                                <option>purple</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="validationCustom02" class="form-label">Total Amount</label>
                            <input type="number" class="form-control" id="validationCustom02" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button class="btn btn-outline-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="text-center mb-3">
                    <h2>Upload your Bills.</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <figure class="figure text-center">
                        <div class="wrapper">
                            <div class="container">

                                <div class="upload-container">
                                    <div class="border-container">
                                        <div class="icons fa-4x">
                                            <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                                            <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
                                            <i class="fas fa-file-pdf" data-fa-transform="shrink-3 down-2 right-6 rotate-45"></i>
                                        </div>
                                        <!--<input type="file" id="file-upload">-->
                                        <p>Drag and drop files here, or
                                            <a href="#" id="file-browser">browse</a> your computer.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <figcaption class="figure-caption text-center">A caption for the above image.</figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        $('document').ready(function() {
            $(".category-select2").select2({
                tags: true
            });
        })
    </script>
</body>

</html>