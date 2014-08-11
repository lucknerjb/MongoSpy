var MongoSpy = window.MongoSpy || {};

MongoSpy.Views.Layouts.Dashboard = Backbone.Marionette.LayoutView.extend({
  template: Handlebars.compile( MongoSpy.Templates.Dashboard.Layout )
});
