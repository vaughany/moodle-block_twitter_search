M.block_twitter_search ||= {}

M.block_twitter_search.init = (Y,search_terms,num_tweets,inst_id) ->
  Y.use 'node-load', ->
    Y.all('.block_twitter_search').each (e,i,nl) ->
      e.one('.block_twitter_search_refresh').on 'click', ->
        e.one('.block_twitter_search_refresh').hide()
        e.one('.block_twitter_search_tweets').
          load e.one('.block_twitter_search_refresh').get('href'), ->
            e.one('.block_twitter_search_refresh').show()
