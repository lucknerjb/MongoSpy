var MongoSpy = window.MongoSpy || {};

MongoSpy.Collections.DatabaseCollections = Backbone.Collection.extend({
  model: MongoSpy.Models.DatabaseCollection,

  initialize: function(options) {
    this.querystring_array = [];
    this.querystring = '';
    if (options.database) {
      this.querystring_array.push('database=' + options.database);
    }

    // Build query string
    if (this.querystring_array.length > 0) {
      this.querystring = '?' + this.querystring_array.join('&');
    }
  },

  url: function() {
    return '/api/collections.php' + this.querystring;
  },

  parse: function(data) {
    return data.data;
  }
});
