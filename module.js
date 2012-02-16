(function() {

  M.block_twitter_search || (M.block_twitter_search = {});

  M.block_twitter_search.init = function(Y, search_terms, num_tweets, inst_id) {
    return Y.use('node-load', function() {
      return Y.all('.block_twitter_search').each(function(e, i, nl) {
        return e.one('.block_twitter_search_refresh').on('click', function() {
          e.one('.block_twitter_search_refresh').hide();
          return e.one('.block_twitter_search_tweets').load(e.one('.block_twitter_search_refresh').get('href'), function() {
            return e.one('.block_twitter_search_refresh').show();
          });
        });
      });
    });
  };

}).call(this);
