var MongoSpy = window.MongoSpy || {};

MongoSpy.Routers.Main = Backbone.Router.extend({
  routes: {
    '': 'index'
  },

  // renderBaseLayout: function(options) {
  //   this.layout = new MongoSpy.Views.Layouts.
  // },

  index: function() {
    var view = new MongoSpy.Views.Layouts.Dashboard();
    MongoSpy.layout.content.show( view );
  }
});
