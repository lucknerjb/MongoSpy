var MongoSpy = window.MongoSpy || {};

MongoSpy.Collections.Databases = Backbone.Collection.extend({
  model: MongoSpy.Models.Database,

  url: '/api/databases.php',

  parse: function(data) {
    return data.data;
  }
});
