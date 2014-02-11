$(function() {
	
	jasmine.getEnv().addReporter(new jasmine.TrivialReporter());
	jasmine.getEnv().execute();

	$(".jasmine_reporter").addClass("show-passed");

});