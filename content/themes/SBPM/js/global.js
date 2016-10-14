require.config({
	baseUrl: "content/themes/SBPM/js",
	paths: {
		jquery: "../js/vendor/jquery/dist/jquery"
	}
});

require(['jquery'], function($) {
	console.log('Working!!');
});
