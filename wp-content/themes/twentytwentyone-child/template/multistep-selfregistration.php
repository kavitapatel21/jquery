<?php

/**
 * Template Name:   multistep-selfregistration
 * Template Post Type:post,page,my-post-type;
 */
//get_header();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Multistep Form In Jquery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style type="text/css">
        #multistep_form fieldset:not(:first-of-type) {
            display: none;
        }
    </style>
</head>

<body>
    <h3 class="text-success" align="center">Multistep Form In Jquery</h3><br>
    <div class="container">
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">Multistep Form In Jquery</div>
                <form class="form-horizontal" method="POST" action="" id="multistep_form">
                    <fieldset id="account">
                        <div class="panel-body">
                            <h4>Step 1: Create your account</h4><br>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="fname">First Name:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="fname" name="fname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="lname">Last Name:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="lname" name="lname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="address">Address:</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="address" id="address"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="mobno">Mobile Number:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="mobno" name="mobno">
                                </div>
                            </div>

                            <input type="button" name="password" class="next btn btn-info" value="Next" id="next1" />
                        </div>
                    </fieldset>

                    <fieldset id="personal">
                        <div class="panel-body">
                            <h4>Step 2: Personnel Details</h4><br>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="currentcompany">Current Company:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="currentcompany" name="currentcompany">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="currentposition">Current Position:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="currentposition" name="currentposition">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="experience">Experience:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="experience" name="experience">
                                </div>
                            </div>

                            <input type="button" name="previous" class="previous btn btn-warning" value="Previous" id="previous1" />
                            <input type="button" name="next" class="next btn btn-info" value="Next" id="next2" />
                        </div>
                    </fieldset>

                    <fieldset id="contact">
                        <div class="panel-body">
                            <h4>Step 3: Documents</h4><br>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="photo">Passport:</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="aadhar">Aadhar:</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control" id="aadhar" name="aadhar">
                                </div>
                            </div>
                            <input type="button" name="previous" class="previous btn btn-warning" value="Previous" id="previous2" />
                            <!--<input type="button" name="next" class="next btn btn-info" value="Next" id="next3" />-->
                            <input type="button" name="submit" class="submit btn btn-success" value="Submit" id="next4" />
                        </div>
                    </fieldset>

                    <fieldset id="thankyou">
                        <div class="panel-body">
                            <h2>Step 4: Thanks</h2><br>
                            <h4 id='hidden'></h4>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            var form_count = 1,
                form_count_form, next_form, total_forms;
            total_forms = $("fieldset").length;
            //alert(total_forms);
            $(".next").click(function() {

                let previous = $(this).closest("fieldset").attr('id');
                //alert(previous);
                let next = $('#' + this.id).closest('fieldset').next('fieldset').attr('id');
                //alert(next);
                $('#' + next).show();
                $('#' + previous).hide();
                setProgressBar(++form_count);

            });

            $(".previous").click(function() {

                let current = $(this).closest("fieldset").attr('id');
                //alert(current);
                let previous = $('#' + this.id).closest('fieldset').prev('fieldset').attr('id');
                //alert(previous);
                $('#' + previous).show();
                $('#' + current).hide();
                setProgressBar(--form_count);
            });
            setProgressBar(form_count);

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / total_forms) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
                    .html(percent + "%");
            }

            $(".submit").click(function() {
                var fname = jQuery('#fname').val();
                var lname = jQuery('#lname').val();
                let result = fname.concat(" ", lname);
                $("#hidden").html(result);
                let previous = $(this).closest("fieldset").attr('id');
                //alert(previous);
                let next = $('#' + this.id).closest('fieldset').next('fieldset').attr('id');
                //alert(next);
                $('#' + next).show();
                $('#' + previous).hide();
                setProgressBar(++form_count);
            });
        });
    </script>
</body>

</html>
<?php
//get_footer();
?>