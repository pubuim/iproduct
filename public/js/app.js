var PostService = {
  up: function (id, cb) {
    this.request(id + '/up', {method: 'POST'}, function (post) {
      cb(post.digg_count);
    })
  },

  request: function (path, option, success, fail) {
    if (typeof option === "function") {
      success = option;
      fail = success;
      option = {}
    }

    option = option || {}

    $.ajax({
      url: "/v1/posts/" + path,
      type: option.method || "GET",
      data: option.data,
      dataType: "json"
    })
      .done(success)
      .fail(fail)
  }
}

$(document).ready(function () {
  $(".content [data-action-vote]").on("click", function () {
    var id = $(this).data('action-vote-id');

    PostService.up(id, function (count) {
      $("[data-bind-vote-id='" + id + "']").html(count);
    });
  })
})