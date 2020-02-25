<?php /** @var array $data */ ?>
<div class="row m-5">
    <div class="col-md-8">
        <form class="form-horizontal" role="form" method="post">
            <h1>Log in</h1>
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label">User name* </label>
                <div class="col-sm-9">
                    <input type="text" id="username" placeholder="User name" class="form-control" name="username"
                           value="<?php echo Arr::get($data, 'username'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password*</label>
                <div class="col-sm-9">
                    <input type="password" id="password" placeholder="Password" class="form-control" name="password"
                           value="<?php echo Arr::get($data, 'password'); ?>">
                </div>
            </div>
            <div class="form-check mb-3">
                <div class="col-sm-9">
                    <input type="checkbox" id="remember" class="form-check-input" name="remember">
                    <label for="remember" class="form-check-label">Keep me logged in</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary btn-block col-sm-9 col-sm-offset-3">Login</button>
                    <input type="hidden" name="submit" value="submit">
                </div>
            </div>
        </form>
    </div>
</div>