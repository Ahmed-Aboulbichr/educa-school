

<div class="form-group row">
    <input name="userid" class="form-control form-control-sm "  type="hidden" id="userid">
    <label for="firstName" class=" col-md-3">@lang('manageUsers.prenom')</label>
    <div class="col-md-9">
        <input name="firstName" class="form-control form-control-sm" type="text" id="firstName">
    </div>
</div>
<div class="form-group row">
    <label for="lastName" class=" col-md-3">@lang('manageUsers.nom')</label>
    <div class="col-md-9">
        <input name="lastName" class="form-control form-control-sm" type="text" id="lastName">
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-md-3">@lang('manageUsers.email')</label>
    <div class="col-md-9">
        <input name="email" class="form-control form-control-sm" type="text" id="email">
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-3">@lang('manageUsers.motsdepasse')</label>
    <div class="col-md-9">
        <input type="password"  name="password" class="form-control form-control-sm" required type="text" id="password" placeholder="Enter password">
    </div>
</div>
<div class="form-group row">
    <label for="password-confirm"  class="col-md-3">@lang('manageUsers.confirmationmotsdepasse')</label>
    <div class="col-md-9">
    <input type="password" id="password-confirm" class="form-control form-control-sm" name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter password">
    </div>
</div>