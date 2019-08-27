$("#get-another-quote-button").on("click", function(e) {
  e.preventDefault();

  $.ajax({
    url: "/wp-json/wp/v2/posts/?orderby=rand",

    success: function(data) {
      var post = data.shift(); // The data is an array of posts. Grab the first one.

      console.log(post);

      $("#quote-title").text(post.title.rendered);
      $("#quote-content").html(post.content.rendered);

      // If the Source is available, use it. Otherwise hide it.
      if (
        typeof post.custom_meta !== "undefined" &&
        typeof post.custom_meta.Source !== "undefined"
      ) {
        $("#quote-source").html("Source: " + post.custom_meta.Source);
      } else {
        $("#quote-source").text("");
      }

      window.history.replaceState({}, "", post.link);
      window.document.title = "Quotes on Design";
    },

    cache: false
  });
});
