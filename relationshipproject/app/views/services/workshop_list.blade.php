@extends('layouts.main')

@section('main')

{{ HTML::style('css/list.css') }}
<div class="container auth">
    <h1 class="text-center"><span>Here is the list of workshops you may need.</span> </h1>
    <div id="big-form" class="well auth-box">
        <div class="row">
            <div class="col-md-12 " > 
                <!-- options for service type-->            
                <label style="margin-left: 5%;" class="form-inline">Service Type: 
                    <select id="selectWorkshop" class="form-control input-sm">
                        <option value=""></option>
                        <option value ="1">Accommondation</option>
                        <option value ="2">Family Law</option>
                        <option value="3">Financial Advice</option>
                        <option value="4">Fitness & Nutrition</option>
                    </select>
                </label>
                <!-- search by postcode-->
                <label style="margin-left: 5%;" class="form-inline">Postcode: <input type="text" class="form-control input-sm"><option value=""></option></select></label>
                <a class="btn btn-small btn-success btn-outline">Search</a>
            </div>
            <div style="padding: 50px;">
             <!--list here-->
             <div class="list-group" >
              <a href="#" class="list-group-item">
                <div class="col-md-9">
                    <h4 class="list-group-item-heading"> List group heading </h4>
                    <p class="list-group-item-text"> Qui diam libris ei, vidisse incorrupte at mel. His euismod salutandi dissentiunt eu. Habeo offendit ea mea. Nostro blandit sea ea, viris timeam molestiae an has. At nisl platonem eum. 
                        Vel et nonumy gubergren, ad has tota facilis probatus. Ea legere legimus tibique cum, sale tantas vim ea, eu vivendo expetendis vim. Voluptua vituperatoribus et mel, ius no elitr deserunt mediocrem. Mea facilisi torquatos ad.
                    </p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="stars">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                    </div>
                    <p> Average 4.5 <small> / </small> 5 </p>
                    <button type="button" class="btn btn-default btn-lg btn-block"> Send Email</button>
                </div>
            </a>
            <a href="#" class="list-group-item">
                <div class="col-md-9">
                    <h4 class="list-group-item-heading"> List group heading </h4>
                    <p class="list-group-item-text"> Eu eum corpora torquatos, ne postea constituto mea, quo tale lorem facer no. Ut sed odio appetere partiendo, quo meliore salutandi ex. Vix an sanctus vivendo, sed vocibus accumsan petentium ea. 
                        Sed integre saperet at, no nec debet erant, quo dico incorrupte comprehensam ut. Et minimum consulatu ius, an dolores iracundia est, oportere vituperata interpretaris sea an. Sed id error quando indoctum, mel suas saperet at.                         
                    </p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="stars">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                    </div>
                    <p> Average 3.9 <small> / </small> 5 </p>
                    <button type="button" class="btn btn-default btn-lg btn-block"> Send Email</button>
                </div>
            </a>
            <a href="#" class="list-group-item">
                <div class="col-md-9">
                    <h4 class="list-group-item-heading"> List group heading </h4>
                    <p class="list-group-item-text"> Ut mea viris eripuit theophrastus, cu ponderum accusata consequuntur cum. Suas quaestio cotidieque pro ea. Nam nihil persecuti philosophia id, nam quot populo ea. 
                        Falli urbanitas ei pri, eu est enim volumus, mei no volutpat periculis. Est errem iudicabit cu. At usu vocibus officiis, ad ius eros tibique appellantur.                         
                    </p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="stars">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                    </div>
                    <p> Average 4.1 <small> / </small> 5 </p>
                    <button type="button" class="btn btn-default btn-lg btn-block"> Send Email</button>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="clearfix"></div>
</div>
@stop



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/offcanvas.js') }}

