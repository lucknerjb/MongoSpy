var MongoSpy = window.MongoSpy || {};
MongoSpy.Views.Main = MongoSpy.Views.Main || {};

MongoSpy.Views.Main.Sidebar = Backbone.Marionette.CollectionView.extend({
  tagName: 'ul',
  className: 'nav nav-sidebar',
  childView: MongoSpy.Views.Main.SidebarItem,

  initialize: function(options) {
    MongoSpy.sidebar_view_type = options.type;
  }
});
