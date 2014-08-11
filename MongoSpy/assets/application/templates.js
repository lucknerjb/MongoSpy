module.exports = function(Handlebars) {

this["MongoSpy"] = this["MongoSpy"] || {};
this["MongoSpy"]["Templates"] = this["MongoSpy"]["Templates"] || {};

this["MongoSpy"]["Templates"]["dashboard/layout"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "";


  return buffer;
  });

this["MongoSpy"]["Templates"]["main/layout"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};



  return "<div id=\"app-content\"></div>\n";
  });

return this["MongoSpy"]["Templates"];

};
