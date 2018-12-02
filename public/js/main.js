var last_search_word;

search_word( $('#search_bar').val() );

function search_word(word) {

  if(word.length >= 2) {
    var request = $.ajax({
      url: "search/word",
      type: "GET",
      data: {word : word},
      dataType: "json"
    });

    request.done(function(data) {
      last_search_word = word;
      update_pages(data);
      display_search(data, word);
    });

    request.fail(function(jqXHR, textStatus) {
      console.log( "Request failed: " + textStatus );
    });

  }

}

function search_page(page, word) {

  console.log(word);
  if( typeof word == "undefined") {word = last_search_word;}

  var request = $.ajax({
    url: "search/page",
    type: "GET",
    data: {page: page},
    dataType: "json"
  });

  request.done(function(data) {
    display_page(data, word);
  });

  request.fail(function(jqXHR, textStatus) {
    console.log( "Request failed: " + textStatus );
  });

}

function display_page(lines, word) {
  $( "#search_results" ).html("");
  $( "#search_results" ).append( "<div class='page_text'><p>"+lines[0].text+"</p></div>" );
  if(word){ $('#search_results').highlight(word); }

  //Set the page selected class on the page currently beng viewed
  $( ".page_selected" ).each(function( index ) {
    $( this ).removeClass( "page_selected" );
  });
  $( ".page_" + lines[0].page_num ).addClass( "page_selected" );

  //Jump viewer to page
  $("#page_viewer").animate({
    scrollTop: $('#page_viewer').scrollTop() + $(".page_" + lines[0].page_num).parent().offset().top - $("#title_bar").height()
  }, 150);
}

function display_search(pages, word) {
  $( "#search_results" ).html("");
  $( "#search_results" ).append("<div class='search_results_title'><p>"+pages.length+" results found for '"+word+"':</p></div>");
  pages.forEach(function(page){
    $( "#search_results" ).append( "<div class='search_result'><p>\""+page.text+"\"</p><p class='search_result_info'><span onclick='search_page("+page.page_num+")'>Page: "+page.page_num+"</span> | Line: "+page.line_num+"</p></div>" );
  });
}

function update_pages(pages) {

  //Unset the selected class
  $( ".selected" ).each(function( index ) {
    $( this ).removeClass( "selected" );
  });

  //Set the selected class on new pages
  if(pages[0]) {

    $("#page_viewer").animate({
      scrollTop: $('#page_viewer').scrollTop() + $(".page_" + pages[0].page_num).parent().offset().top - $("#title_bar").height()
    }, 150);

    pages.forEach(function(page){
      $( ".page_" + page.page_num ).addClass( "selected" );
    });

  }
  else {
    $("#page_viewer").animate({
      scrollTop: 0
    }, 150);
  }

}
