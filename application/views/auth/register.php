<?php /** @var array $data */ ?>
<div class="row m-5">
    <div class="col-md-8">
        <form class="form-horizontal" role="form" method="post">
            <h2>Registration</h2>
            <!--div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-9">
                    <input type="text" id="firstName" placeholder="First Name" class="form-control" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" id="lastName" placeholder="Last Name" class="form-control" autofocus>
                </div>
            </div-->
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label">User name* </label>
                <div class="col-sm-9">
                    <input type="text" id="username" placeholder="User name" class="form-control" name="username" value="<?php echo  Arr::get($data, 'username'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email* </label>
                <div class="col-sm-9">
                    <input type="email" id="email" placeholder="Email" class="form-control" name="email" value="<?php echo  Arr::get($data, 'email'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password*</label>
                <div class="col-sm-9">
                    <input type="password" id="password" placeholder="Password" class="form-control" name="password" value="<?php echo  Arr::get($data, 'password'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirm" class="col-sm-3 control-label">Confirm Password*</label>
                <div class="col-sm-9">
                    <input type="password" id="password_confirm" placeholder="Confirm Password" class="form-control"
                           name="password_confirm" value="<?php echo  Arr::get($data, 'password_confirm'); ?>">
                </div>
            </div>
            <!--div class="form-group">
                <label for="birthDate" class="col-sm-3 control-label">Date of Birth*</label>
                <div class="col-sm-9">
                    <input type="date" id="birthDate" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                <div class="col-sm-9">
                    <input type="phoneNumber" id="phoneNumber" placeholder="Phone number" class="form-control">
                    <span class="help-block">Your phone number won't be disclosed anywhere </span>
                </div>
            </div>
            <div class="form-group">
                <label for="Height" class="col-sm-3 control-label">Height* </label>
                <div class="col-sm-9">
                    <input type="number" id="height" placeholder="Please write your height in centimetres" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="weight" class="col-sm-3 control-label">Weight* </label>
                <div class="col-sm-9">
                    <input type="number" id="weight" placeholder="Please write your weight in kilograms" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Gender</label>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" id="femaleRadio" value="Female">Female
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" id="maleRadio" value="Male">Male
                            </label>
                        </div>
                    </div>
                </div>
            </div--> <!-- /.form-group -->
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Required fields</span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block col-sm-9 col-sm-offset-3">Register</button>
            <input type="hidden" name="submit" value="submit" >
        </form> <!-- /form -->
    </div>
</div>