
<div class="row-fluid">
  <div class="span3">
    <div class="panel panel-success" style="min-height:200px;">
      <div class="panel-heading">
        <h3 class="panel-title">
          Welcome, <?php echo $user->first_name ?>
        </h3>
      </div>
      <ul class="list-group">
        <a id="profilePage" href="profile" class="list-group-item active">Profile</a>
            <a id="advertiseWSPage" href="advertise" class="list-group-item">Advertise a new workshop</a>
            <a id="myWorkshopsPage" href="workshops" class="list-group-item">My workshops</a>
            <a id="reviewPage" href="review" class="list-group-item">Review the website</a>
            <a id="ClientsPage" href="clients" class="list-group-item">Clients</a>
      </ul>
    </div>
  </div><!--span3-->
  <div class="span9">
    <div id="step1Form" class="panel panel-success" style="min-height:100px;">
      <div class="panel-heading">
        <h3 class="panel-title">
          Profile<a id="edit" style="float:right;margin-right:30px;cursor:pointer;" onclick="inputChange()">Edit</a>
        </h3>                  
      </div>

      @if(! $serviceProvider->verified)
        <h4 style="color:red;">
            Please wait for verifying. 
        </h4>

      @endif

      {{Former::open()->method('POST')->class('form-horizontal')->url('account/profile')}}
        <fieldset id="forms" disabled="disabled">
          <!-- Form Name -->
          <legend></legend>
          <!-- Text input-->

        {{ Former::text('firstname','first name')->value($user->first_name)->class('input-large inputHeight form-control')->placeholder('First Name')->required() }}

        {{ Former::text('lastname','last name')->value($user->last_name)->class('input-large inputHeight form-control')->placeholder('Last Name')->required() }}


        {{ Former::inline_radios('identity')->value($serviceProvider->identity)->radios(array('Individual' =>array( 'name'=>'identity'), 'Company' => array('name'=>'identity'))) }}

        {{ Former::text('companyname','company name')->value($serviceProvider->companyname)->class('input-xlarge inputHeight form-control')->placeholder('Company Name')}}
    
        {{ Former::text('ACN')->value($serviceProvider->acn)->class('input-medium inputHeight form-control')->placeholder('ACN') }}

        {{ Former::text('ABN')->value($serviceProvider->abn)->class('input-medium inputHeight form-control')->placeholder('ABN') }}

        {{ Former::text('address')->value($serviceProvider->address)->class('input-xxlarge inputHeight form-control')->placeholder('Address')->required() }}

        {{ Former::number('phone')->value($serviceProvider->phone)->class('input-medium inputHeight form-control')->placeholder('Phone Number')->required() }}

        {{ Former::number('mobile')->value($serviceProvider->mobile)->class('input-medium inputHeight form-control')->placeholder('Mobile') }}

        {{ Former::inline_radios('mode')->radios(array('hourly' =>array( 'name'=>'mode','checked'=>'checked'), 'session' => array('name'=>'mode', 'checked'=>''))) }}

        {{ Former::number('price')->value($serviceProvider->price)->class('input-medium inputHeight form-control')->required() }}

         <div class="control-group controls">
          {{ Form::submit('Submit', array('class'=>'btn btn-success', 'id'=>'submit', 'style'=>'display:none;'))}}
          {{ Form::button('Cancel', array('class'=>'btn btn-success', 'id'=>'cancel', 'style'=>'display:none;', 'onclick'=>'cancelForm()'))}}
        </div> 
        </fieldset>
      {{ Former::close()}}
    </div>
  </div>
</div>

<script type="text/javascript">
function submitForm() {
  document.getElementById("forms").disabled = "disabled";
  document.getElementById("submit").style.display = "none";
  document.getElementById("cancel").style.display = "none";
  document.getElementById("edit").style.display = "";
}
function cancelForm() {
  window.location.reload();
}
function inputChange() {
  document.getElementById("forms").disabled = "";
  document.getElementById("submit").style.display = "";
  document.getElementById("cancel").style.display = "";
  document.getElementById("edit").style.display = "none";
}
</script>
