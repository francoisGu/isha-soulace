{{ HTML::style('css/plugins/bootstrap.css') }}
{{ HTML::style('css/bootstrap-responsive.css') }}
<style>
.alert-message
{
    margin: 20px 0;
    padding: 20px;
    border-left: 3px solid #eee;
}
.alert-message h4
{
    margin-top: 0;
    margin-bottom: 5px;
}
.alert-message p:last-child
{
    margin-bottom: 0;
}
.alert-message code
{
    background-color: #fff;
    border-radius: 3px;
}
.alert-message-danger
{
    background-color: #fdf7f7;
    border-color: #d9534f;
}
.alert-message-danger h4
{
    color: #d9534f;
}
</style>

<div class="row">
               <div class="col-sm-8 col-md-8">
            <div class="alert-message alert-message-danger">
                <h4>{{$name}}</h4>
                <p>Thank you for your support!</p>
                <p>We will try to contact you on {{$contact_date}}.</p>
                <p style="margin-left:10px;">Regards,</p>
                <p><STRONG>Isha SoulAce</STRONG>
            </div>
        </div>
    </div>


