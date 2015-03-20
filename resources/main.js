
var mrecho = mrecho || {};

mrecho.extend = function(destination, source) {
	var toString = Object.prototype.toString,
		objTest = toString.call({});
	for (var property in source) {
		if (source[property] && objTest == toString.call(source[property])) {
			destination[property] = destination[property] || {};
			mrecho.extend(destination[property], source[property]);
		} else {
			destination[property] = source[property];
		}
	}
	return destination;
};



mrecho.extend(mrecho, {

	settings : {
		moo : "x"
	},

	mainFunction : function(){
		console.log("mrecho.main.mainFunction");
	}
});

mrecho.extend(mrecho, {

	plugin : {
		mainFunctionPlugin : function(){
			console.log("mrecho.plugin.mainFunction");
			console.log(mrecho.settings.moo);
			console.log(mrecho);
		}
	}
});

mrecho.mainFunction();
mrecho.plugin.mainFunctionPlugin();


mrecho.extend(mrecho, {

	plugin2 : {
		 monkey : function(){
			console.log("monkey");
		}
	}
});

mrecho.plugin2.monkey();



/*
var mrecho = function () {

	this.publicFunction = function () {
		console.log("mrecho.publicFuction");
	}


	privateInternalFunction = function () {
		console.log("mrecho.privateInternalFunction");
	}

};

mrecho.plugins('extra', function() {

	this.pluginFunction = function(){
		console.log("mrecho.plugins.pluginFunction");
		mrecho.publicFunction();
	}
});

mrecho.publicFunction();
mrecho.pluginFunction();
*/


