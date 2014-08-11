var MongoSpy = window.MongoSpy || {};

var tpl = '<div id="app-content"></div>';

MongoSpy.Views.Layouts.Main = Backbone.Marionette.LayoutView.extend({
  // template: Handlebars.compile('main/layout'),
  template: Handlebars.compile( MongoSpy.Templates.Main.Layout ),
  regions: {
    'content': '#app-content',
    'sidebar': '#sidebar'
  }
});
