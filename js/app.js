jQuery(document).ready(function( $ ) {

  $(document).foundation();

  // $(function() { FastClick.attach(document.body); });
  
   $('.entry-content').fitVids();
  
  
  // Get Latest Feed
   
  if (document.getElementById('at-latest')) {
    get_at_latest();
  }
    
  function get_at_latest() {
   $.ajax({
      url: 'http://aussietheatre.com.au/wp-json/wp/v2/posts',
      data: {
          filter: {
          'posts_per_page': 5,
          }
      },
      dataType: 'json',
      type: 'GET',
      success: function(data) {
        parse_atContent(data);
      },
      error: function() {
        $('#at-latest p.loading').html('Loading Failed');
      }
    });
  }

  function parse_atContent(data) {
    var latestContent;
    latestContent = '<section>';
    for(var i=0; i<data.length; i++) {
      var item = data[i];
      
      //alert(item.link);
      
       latestContent += '<article class="at-link">';
       latestContent += '<a href="'+item.link+'" target="_blank">';
       latestContent += item.title.rendered;
       latestContent += '</a>';
       latestContent += '</article>';

    };
    latestContent += '</section>';
    $('#at-latest').html(latestContent);
  }
  
  
    // Get TAG Feed
  
    if (document.getElementById('at-feed')) {
      var tag = $('#at-feed').data('tag');
      get_at_tag_feed(tag);
    }

      function get_at_tag_feed(tag) {
   $.ajax({
      url: 'http://aussietheatre.com.au/wp-json/wp/v2/posts',
      data: {
          filter: {
          'posts_per_page': 5,
          'tag': tag
          }
      },
      dataType: 'json',
      type: 'GET',
      success: function(data) {
        if(data == '') {
          $('#at-feed').parent().remove();
        } else {
          parse_atTag(data);
        }
      },
      error: function() {
        $('#at-feed').html('<p>Loading Failed</p>');
      }
    });
  }

  function parse_atTag(data) {
    var latestContent;
    latestContent = '<section>';
    for(var i=0; i<data.length; i++) {
      var item = data[i];
      
      //alert(item.link);
      
       latestContent += '<article class="at-link">';
       latestContent += '<a href="'+item.link+'" target="_blank">';
       latestContent += item.title.rendered;
       latestContent += '</a>';
       latestContent += '</article>';

    };
    latestContent += '</section>';
    $('#at-feed').html(latestContent);
  }
  
  
   $("#filter").keyup(function(){
 
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;
 
        // Loop through the comment list
        $("a.media-object").each(function(){
 
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
 
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                count++;
            }
        });
 
        // Update the count
        var numberItems = count;
        $("#filter-count").text("Number of People = "+count);
    });

   
});