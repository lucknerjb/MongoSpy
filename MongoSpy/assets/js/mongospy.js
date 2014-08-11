window.MongoSpy = new Backbone.Marionette.Application();
var App = MongoSpy;

MongoSpy.Routers = {};
MongoSpy.Templates = {};
MongoSpy.Collections = {};
MongoSpy.Models = {};
MongoSpy.Views = {
  Layouts: {}
};

// Regions
// MongoSpy.addRegion('content', '#content');

MongoSpy.load_databases = function() {
  var collection = new MongoSpy.Collections.Databases();
  collection.fetch({
    success: function(models) {
      console.log(models);
      // Create view and render
      var view = new MongoSpy.Views.Main.Sidebar({ collection: collection, type: 'database' });
      MongoSpy.layout.sidebar.show( view );
    },
    error: function(error) {
      alert('Unable to load databases');
    }
  });
  // console.log(collection.models);
};

MongoSpy.on('start', function() {
  // Load the layout
  MongoSpy.layout = new MongoSpy.Views.Layouts.Main();
  MongoSpy.layout.render();
  $('#content').html( MongoSpy.layout.render().el );

  // Load databases
  MongoSpy.load_databases();

  new MongoSpy.Routers.Main;

  if (Backbone.History.started) {
    Backbone.history.stop();
  }

  if (Backbone.history) {
    Backbone.history.start({ pushState: true });
  }
});
