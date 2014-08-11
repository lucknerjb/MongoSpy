var MongoSpy = window.MongoSpy || {};

MongoSpy.Collections.CollectionRecords = Backbone.Collection.extend({
  model: MongoSpy.Models.CollectionRecord,

  initialize: function(options) {
    this.querystring_array = [];
    this.querystring = '';
    if (options.database) {
      this.querystring_array.push('database=' + options.database);
    }

    if (options.collection) {
      this.querystring_array.push('collection=' + options.collection);
    }

    // Build query string
    if (this.querystring_array.length > 0) {
      this.querystring = '?' + this.querystring_array.join('&');
    }
  },

  url: function() {
    return '/api/records.php' + this.querystring;
  },

  parse: function(data) {
    return data.data;
  }
});
