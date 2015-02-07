angular.module('app', []).config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});

function ChannelsController($scope, $http) {

    $http.get('/channels').success(function (channels) {
        $scope.channels = channels;
    });

    $scope.join = false;
    $scope.withdraw = true;

    //search for a channel
    $scope.search = function () {

        $scope.join = false;
        $scope.withdraw = true;

        var channel = {
            name: $scope.name
        }

        $http.post("channels/search", channel).success(function (channels) {

            $scope.channels = channels;

        });

    };

    //join channel
    $scope.joinChannel = function(channel)
    {
        $http.post("channels/join", channel).success(function (channels) {

            var index =$scope.channels.indexOf(channel);
            $scope.channels.splice(index,1);

        });

    }
    $scope.withdrawChannel = function(channel)
    {
        console.log(channel);
        $http.post("channel/withdraw", channel).success(function (channels) {


                $scope.channels = channels;


        });

    }

    //user channels
    $scope.myChannels = function () {

        $scope.join = true;
        $scope.withdraw = false;

        $http.get("/user/channels").success(function (channels) {

            $scope.channels = channels;

        });

    };
    //first 100 public channel
    $scope.allChannels = function () {
        $scope.join = false;
        $scope.withdraw = true;

        $http.get("channels").success(function (channels) {

            $scope.channels = channels;

        });

    };


    $scope.createChannel = function() {

        $scope.channel= {
            name : $scope.createName,
            description : $scope.createDescription,
            public : $scope.createPublic
        }


        $http.post("channels/", $scope.channel).success(function () {

            alert('Channel added');
        });

    }


}