@extends('master')

@section('topScript')
{{ HTML::style('css/semantic/semantic.min.css') }}
@stop

@section('feed')
<div ng-app="app" ng-controller="ChannelsController" id="ctr">

    <div class="ui center aligned  segment">
        <div class="ui fluid  left icon action input ">
            <i class="search icon"></i>
            <input type="text" placeholder="Search for a public channel" ng-model="name">

            <div class="ui blue submit button" ng-click="search()">Search</div>
        </div>
        <div class="ui horizontal divider">
            Or
        </div>

        <div class="positive ui button" ng-click="allChannels()">All channels</div>

        <div class="ui teal labeled icon button" onclick="pupit()">
            Create New channel
            <i class="add icon"></i>
        </div>
        <div class="negative ui button" ng-click="myChannels()">My channels</div>
    </div>


    <div class="ui cards">
        <div class="card" style="width: 47%;" ng-repeat="channel in channels" >
            <div class="content">
                <div class="header"> {[{channel.name}]}</div>
                <div class="description">
                    {[{channel.description}]}.
                </div>
            </div>
            <div class="ui bottom attached button" data-ng-init="btnId='asd';"  ng-click="joinChannel(channel)" ng-hide="join">
                <i class="add icon"></i>
                Join the channel
            </div>
            <div class="ui bottom attached button" data-ng-init="btnId='asd';"  ng-click="withdrawChannel(channel)" ng-hide="withdraw">
                <i class="minus icon"></i>
                Withdraw
            </div>
        </div>
    </div>



    <div class="ui modal">
        <i class="close icon"></i>
        <div class="header">
            Add new channel
        </div>
        <div class="content ui fluid  left icon action input">
            <input type="text" placeholder="Channel name" ng-model="createName" >
            <div class="ui horizontal divider">

            </div>
            <textarea placeholder="description" ng-model="createDescription"></textarea>
            <div class="ui horizontal divider">

            </div>


            <select ng-model="createPublic">
                <option value="1"selected>Public</option>
                <option value="0" >Private</option>
            </select>





        </div>
        <div class="actions">

            <div class="ui button ok"  >Create</div>

        </div>
    </div>
</div>

@stop

@section('bottom-script')
{{ HTML::script('js/semantic.min.js') }}
{{ HTML::script('https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular.min.js') }}
{{ HTML::script('js/channels.js') }}

@stop

<script>
    function pupit(){
        $('.ui.modal')
            .modal('show').on('click','.ui.button',function(){
                angular.element($("#ctr").scope().createChannel())
            });
        ;}
</script>