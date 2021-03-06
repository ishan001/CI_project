<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/fileinput.css"/>
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">Add New Staff</h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo base_url(); ?>dashboard">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Add New Staff</a>
                    </li>
                </ul>
                 <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption">
                                <i class="fa fa-reorder"></i>Add New Staff
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" id="staff_form" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button>
                                    New Staff Added Successfully!
                                </div>
                                <div class="alert alert-warning display-hide">
                                    <button class="close" data-close="alert"></button>
                                    Data Submitting Please Wait......
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">First Name
                                    <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="fname" data-required="1" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Last Name
                                    <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
                                       <input type="text" name="lname" data-required="1" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Sales ID
                                    <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input name="sales_id" type="text" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Staff Type
                                    <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="staff_type">
                                            <option value="">Select...</option>
                                            <?php  foreach($staff_types as $row) { ?>  
                                            <option value="<?=$row->id?>"><?=$row->type?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">No of Working days (per Week)</label>
                                    <div class="col-md-4">
                                        <input name="working_days" type="text" class="form-control number max['7']" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Profile Picture
                                    </label>
                                    <div class="col-md-4">
                                        <input id="profile_picture" name="profile_picture" class="file" type="file"  data-show-upload="false" data-preview-file-type="any" data-overwrite-initial="false">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/fileinput.js"></script>
<script>
    $("#profile_picture").fileinput({
            uploadUrl: "<?php echo base_url(); ?>staff/upload", // you must set a valid URL here else you will get an error
            allowedFileExtensions : ['jpg', 'png','gif'],
            uploadAsync: true,
	});
jQuery(document).ready(function() {    

        
        
    var staff_form = $('#staff_form');
    var error = $('.alert-danger', staff_form);
    var success = $('.alert-success', staff_form);
    var warning = $('.alert-warning' ,staff_form );



    staff_form.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            fname: {
                minlength: 2,
                required: true
            },
            lname: {
                minlength: 2,
                required: true
            },
            sales_id: {
                required: true
            },
            staff_type: {
                required: true
            },


        },

        messages: { // custom messages for radio buttons and checkboxes
            staff_type: {
                required: "Please select a Staff type"
            },
        },

        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.parent(".input-group").size() > 0) {
                error.insertAfter(element.parent(".input-group"));
            } else if (element.attr("data-error-container")) {
                error.appendTo(element.attr("data-error-container"));
            } else if (element.parents('.radio-list').size() > 0) {
                error.appendTo(element.parents('.radio-list').attr("data-error-container"));
            } else if (element.parents('.radio-inline').size() > 0) {
                error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
            } else if (element.parents('.checkbox-list').size() > 0) {
                error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
            } else if (element.parents('.checkbox-inline').size() > 0) {
                error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
            } else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit
            success.hide();
            error.show();
            App.scrollTo(error, -200);
        },

        highlight: function (element) { // hightlight error inputs
           $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function (form) {
            error.hide();
            success.hide();
            warning.show();
            dataString = $("#staff_form").serialize(); 
             $.ajax({
               type: "POST",
               url: "<?php echo base_url(); ?>staff/create",
               data: dataString,

               success: function(data){
                   success.show();
                   warning.hide();
                   error.hide();
               }

             });            
            return false;  //stop the actual form post !important!
            
        }
         
        

    });


});
</script>