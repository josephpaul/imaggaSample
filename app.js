var app=angular.module('ipro',[]);

app.controller('appController',['$scope','$http','$location','$window',appController]);


function appController($scope, $http, $location, $window)
{

	$scope.loading=false;

	if($location.search().image!="")
	{
		$scope.image=$location.search().image;
		pro();
	}

	$scope.process=function()
	{
		$location.search({image:$scope.image});
		pro();
	}


	function pro()
	{
		$scope.loading=true;
		$scope.data={};

		$http({
			url:'pro.php',
			method:'POST',
			params:{pic:$scope.image}
		}).then(function(response)
		{
		    $scope.loading=false;

			 console.log(JSON.parse(response.data.msg));
			$scope.data=JSON.parse(response.data.msg);
			$scope.data=$scope.data.results[0];

		},function()
		{
		    $scope.loading=false;

		})


	}
}