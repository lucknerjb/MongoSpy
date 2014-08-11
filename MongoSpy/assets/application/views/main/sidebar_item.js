var MongoSpy = window.MongoSpy || {};
MongoSpy.Views.Main = MongoSpy.Views.Main || {};

MongoSpy.Views.Main.SidebarItem = Backbone.Marionette.ItemView.extend({
  tagName: 'li',
  template: Handlebars.compile( MongoSpy.Templates.Main.SidebarItem ),

  events: {
    'click a': 'selectItem'
  },

  selectItem: function() {
    var type = MongoSpy.sidebar_view_type;
    if (type === 'database') {
      return this.selectDatabase();
    } else if (type === 'collection') {
      return this.selectCollection();
    }
  },

  selectDatabase: function(event) {
    event = event || window.event;
    event.preventDefault();

    var db_name = $(event.target).html();

    // Get collections for this databaes
    var collection = new MongoSpy.Collections.DatabaseCollections({ database: this.model.get('name') });
    collection.fetch({
      success: function(models) {
        // Create view and render
        var view = new MongoSpy.Views.Main.Sidebar({ collection: collection, type: 'collection' });
        MongoSpy.layout.sidebar.show( view );
      },
      error: function(error) {
        alert('Unable to load databases');
      }
    });
  },

  selectCollection: function(event) {
    event = event || window.event;
    event.preventDefault();

    var coll_name = $(event.target).html();

    // Get collections for this databaes
    var collection = new MongoSpy.Collections.CollectionRecords({ database: this.model.get('database'), collection: this.model.get('name') });
    collection.fetch({
      success: function(models) {
        // Create view and render
        // var view = new MongoSpy.Views.Main.Sidebar({ collection: collection, type: 'collection' });
        // MongoSpy.layout.sidebar.show( view );
      },
      error: function(error) {
        alert('Unable to load databases');
      }
    });
  }
});
