
  <div class="row-fluid">
    <div class="span6">
      <div id="step1Form" class="panel panel-success" style="min-height:200px;">
        <div class="panel-heading">
          <h3 class="panel-title">
            Log in</h3>
          </div>
          {{ Form::open(array('url'=>'users/login', 'class'=>'form-horizontal')) }}
          <!-- Form Name -->
          <legend></legend>
          <!-- Text input-->

          <div class="control-group">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
              {{ Form::text('email', null, array('class'=>'input-xlarge form-control', 'placeholder'=>'Email Address')) }}
            </div>
          </div>

          <!-- Password input-->
          <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
              {{ Form::password('password', array('class'=>'input-xlarge form-control', 'placeholder'=>'Password')) }}
              <a class="help-block">Forget password?</a>
            </div>
          </div>
           @if(Session::has('message'))
          <p style="color:red; margin-left: 100px;">{{ Session::get('message') }}</p>
          @endif
          <div class="control-group">
            <label class="control-label" for="checkboxes"></label>
            <div class="controls">
              <label class="checkbox inline" for="checkboxes-0">
                {{ Form::checkbox('rememberme', 'Remember me.', false)}}
                Remember me
              </label>
            </div>
          </div>
          <ul>
          @foreach($errors->all() as $error)
          <li style="color:red;">{{ $error }}</li>
          @endforeach
        </ul>
          <div class="control-group">
            <label class="control-label" for="submit"></label>
            <div class="controls">
              {{ Form::submit('Login', array('class'=>'btn btn-success'))}}
            </div>
          </div>
          {{ Form::close() }}

      </div>
    </div><!--span12-->
  </div>
