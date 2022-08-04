<?php
/*
Template Name: form-submit-without-database
Template Post Type: post, page, my-post-type;
*/

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    var count=1;
    $(document).ready(function() {
        $("#btn-1").click(function() {
            var fname = jQuery("#firstname").val();
            var lname = jQuery("#lastname").val();
            var contactno = jQuery("#contactno").val();
            var email = jQuery("#email").val();
            var password = jQuery("#password").val();
            $("tbody").append("<tr><td>"+ count +"</td><td>" + fname + "</td><td>" + lname + "</td><td>" + contactno + "</td><td>" + email + "</td><td>" + password + "</td></tr>");  
            count++;
        });
    });
</script>
<div style="width:50%;margin-left: 389px;margin-top: 80px">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label for="contactno">Contact no</label>
            <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact No">
        </div>
        <div class="form-group">
            <label for="email">E-mail<span>(required)</span></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button id="btn-1" class="btn btn-primary" name="submit">Submit</button>
</div>


<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>